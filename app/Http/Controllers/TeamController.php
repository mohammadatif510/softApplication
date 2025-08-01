<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;

use App\Models\Project;
use App\Models\RoleCategory;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class TeamController extends Controller
{
    public function __construct()
    {
        session()->put('title', 'Here the list of all available teams.');
    }
    public function index()
    {
        $teams = Team::with('roleCategories', 'roles', 'teamLeader', 'projects')->get();

        return view('team.index', compact('teams'));
    }

    public function create()
    {
        $categories = RoleCategory::all();
        $users = User::all()->reject(function ($user) {
            return $user->hasAnyRole(['admin', 'Team Leader']);
        });

        $projects = Project::all();

        return view('team.models.create', compact('categories', 'users', 'projects'));
    }

    public function getRole($roleCategoryId)
    {
        $roles = Role::where('role_category_id', $roleCategoryId)->get();

        return response()->json([
            'roles' => $roles,
        ]);
    }

    public function getTeamLeader($roleId)
    {
        $teamLeaders = User::whereHas('roles', function ($query) use ($roleId) {
            $query->where('id', $roleId);
        })->get();


        return response()->json([
            'teamLeaders' => $teamLeaders,
        ]);
    }

    public function store(StoreTeamRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();

            $team = Team::create([
                'role_category_id' => $validated['role_category_id'],
                'role_id'          => $validated['role_id'],
                'team_leader_id'   => $validated['team_leader_id'],
                'description'      => $validated['description'],
                'project_id'       => $validated['project_id'],
            ]);

            $team->members()->attach($validated['members']);

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Team created successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }


    public function delete($teamId)
    {
        DB::beginTransaction();
        try {
            $team = Team::with('teamLeader', 'projects')->findOrFail($teamId);

            $team->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Team deleted and email sent successfully'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Team deletion failed: ' . $th->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $th->getMessage(),
            ], 500);
        }
    }

    public function edit($teamId)
    {
        $team = Team::findOrFail($teamId);

        $categories = RoleCategory::all();
        $users = User::all()->reject(function ($user) {
            return $user->hasAnyRole(['admin', 'Team Leader']);
        });

        $projects = Project::all();

        return view('team.models.edit', compact('categories', 'users', 'projects', 'team'));
    }

    public function update(StoreTeamRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $team = Team::findOrFail($validated['teamId']);

            $team->update([
                'role_category_id' => $validated['role_category_id'],
                'role_id'          => $validated['role_id'],
                'team_leader_id'   => $validated['team_leader_id'],
                'description'      => $validated['description'],
                'project_id'       => $validated['project_id'],
            ]);

            $team->members()->sync($validated['members']);

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Team Updated successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }
}

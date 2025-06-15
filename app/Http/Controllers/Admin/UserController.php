<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        session()->put('title', 'User Details');
        if (!Auth::user()->hasRole('admin')) {
            abort(403, 'Only admin have access');
        }
    }

    public function index()
    {
        try {

            $users = User::all();

            return view('admin.user.index', compact('users'));
        } catch (\Throwable $th) {
            Log::error("User index error", $th->getMessage());
            abort(500, 'Something went wrong! please try again');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email'
        ]);

        try {

            $password = rand(1, 8);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($password)
            ]);

            Log::info("User Created {$user->name} By " . Auth::user()->name);

            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            Log::error('User store error: ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to create user. Try again.',
            ], 500);
        }
    }


    public function assignRole($id)
    {
        try {
            $user = User::findOrfail($id);
            $roles = Role::whereNot('name', 'admin')->get();

            return view('admin.user.modals.assignRole', compact('user', 'roles'));
        } catch (\Throwable $th) {
            Log::error('fetching User assign role error: ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch assign role . Try again.',
            ], 500);
        }
    }


    public function storeAssignRole(Request $request)
    {
        try {
            $request->validate([
                'userId' => 'required|exists:users,id',
                'roles' => 'required|array',
                'roles.*' => 'exists:roles,id',
            ]);

            $user = User::findOrFail($request->userId);

            // Convert role IDs to role names
            $roleNames = Role::whereIn('id', $request->roles)->pluck('name')->toArray();

            // Assign roles using names
            $user->syncRoles($roleNames);

            return response()->json([
                'message' => 'Roles assigned successfully!',
            ]);
        } catch (\Throwable $th) {
            Log::error('User assign role error: ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to assign role . Try again.',
            ], 500);
        }
    }
}

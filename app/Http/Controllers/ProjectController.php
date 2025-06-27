<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Services\ProjectService;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    protected $project_service;

    public function __construct(ProjectService $project_service)
    {
        session()->put('title', 'Create Project');

        $this->project_service = $project_service;
    }

    public function index()
    {
        return view('project.index');
    }

    public function create(Request $request)
    {
        return view('project.create');
    }

    public function projectList()
    {
        session()->put('title', 'Project Lists');
        $projectLists = Project::all();

        return view('project.list', compact('projectLists'));
    }

    public function store(StoreProjectRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();

            $client = $this->project_service->storeClient($validated);
            $project = $this->project_service->storeProject($validated, $client->id);
            $budget = $this->project_service->storeBudget($validated, $project->id);

            DB::commit();

            Log::info("Project created Successfully: client " . $client . " project " . $project . " budget " . $budget);

            return response()->json([
                'success' => true,
                'message' => 'Project created successfully',
                'data' => compact('client', 'project', 'budget')
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            Log::error("Project creation failed: " . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Try again.',
            ], 500);
        }
    }
}

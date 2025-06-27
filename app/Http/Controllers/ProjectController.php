<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Services\ProjectService;
use Illuminate\Http\Request;

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

    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();

        $client = $this->project_service->storeClient($validated);
        $project = $this->project_service->storeProject($validated, $client->id);
        $budget = $this->project_service->storeBudget($validated, $project->id);

        return response()->json([
            'success' => true,
            'message' => 'Project created successfully',
            'data' => [
                'client' => $client,
                'project' => $project,
                'budget' => $budget,
            ]
        ]);
    }
}

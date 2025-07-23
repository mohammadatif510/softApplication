<?php

namespace App\Http\Controllers;

use App\Http\Services\ProjectService;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    protected $project_service;

    public function __construct(ProjectService $project_service)
    {

        $this->project_service = $project_service;

        session()->put('title', 'Client Details');
    }


    public function index()
    {
        $clients = Client::all();

        return view('client.index', compact('clients'));
    }

    public function clientProject($id)
    {

        $clientDetail = Client::findOrFail($id);
        $clientProjects = Project::where('client_id', $id)->get();

        session()->put('client', 'Client "' . $clientDetail->name . '" Projects ');

        return view('client.project', compact('clientProjects', 'clientDetail'));
    }

    public function edit($id)
    {
        $client = Client::findOrfail($id);

        return view('client.edit', compact('client'));
    }


    public function update(Request $request)
    {
        DB::beginTransaction();
        try {

            $client = $this->project_service->updateClient($request->all());
            DB::commit();

            Log::info("Client updated Successfully: " . $client);

            return response()->json([
                'success' => true,
                'message' => 'Client updated successfully',
                'data' => compact('client')
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            Log::error("Client updated failed: " . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Try again.',
            ], 500);
        }
    }

    public function showCreateProjectModal($id)
    {
        $clientData = Client::findOrFail($id);
        return view('client.modals.create-project', compact('clientData'));
    }

    public function createProject(Request $request)
    {
        $validated = $request->validate([
           'client_id'     => 'required|exists:clients,id',
            'title'         => 'required|string|max:255',
            'status'        => 'required|in:active,completed,on-hold',
            'description'   => 'required|string|max:1000',
            'deadline'      => 'required|date|after_or_equal:today',
            'budget'        => 'required|numeric|min:0',
        ]);

        $projectId = $this->project_service->storeProject($validated, $clientId = null);
        $budget = $this->project_service->storeBudget($validated, $projectId->id);


        return response()->json([
                'success' => true,
                'message' => 'SProject Created',
            ]);
    }
}

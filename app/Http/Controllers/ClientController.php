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
        $clientProjects = Project::where('client_id', $id)->get();

        return view('client.project', compact('clientProjects'));
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
}

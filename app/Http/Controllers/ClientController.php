<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
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
}

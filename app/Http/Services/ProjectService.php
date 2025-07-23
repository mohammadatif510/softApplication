<?php

namespace App\Http\Services;

use App\Models\Budget;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectService
{
    public function storeClient(array $data)
    {
        return  Client::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'phone'         => $data['mobile_no'],
            'country'       => $data['country'],
            'address'       => $data['address'],
            'company_name'  => $data['company_name'],
            'website'       => $data['website'],
        ]);
    }

    public function storeProject(array $data, $clientId)
    {
        return Project::create([
            'created_by'    => Auth::user()->id,
            'client_id'     => $clientId ?? $data['client_id'],
            'title'         => $data['title'],
            'status'        => $data['status'],
            'description'   => $data['description'],
            'deadline'      => $data['deadline'],
        ]);
    }

    public function storeBudget(array $data, $projectId)
    {
        return Budget::create([
            'project_id'    => $projectId,
            'total_budget'  => $data['budget'],
            'used_budget'   => $data['budget'],
        ]);
    }

    public function updateClient(array $data)
    {
        $client = Client::findOrfail($data['client_id']);

        $client->update([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'phone'         => $data['mobile_no'],
            'country'       => $data['country'],
            'address'       => $data['address'],
            'company_name'  => $data['company_name'],
            'website'       => $data['website'],
        ]);

        return $client;
    }

    public function updateProject(array $data)
    {
        $project = Project::findOrfail($data['project_id']);

        $project->update([
            'created_by'    => Auth::user()->id,
            'title'         => $data['title'],
            'status'        => $data['status'],
            'description'   => $data['description'],
            'deadline'      => $data['deadline'],
        ]);

        return $project;
    }

    public function updateBudget(array $data)
    {
        $budget = Budget::findOrfail($data['project_id']);

        $budget->update([
            'project_id'  => $data['project_id'],
            'total_budget'  => $data['budget'],
            'used_budget'   => $data['budget'],
        ]);

        return $budget;
    }
}

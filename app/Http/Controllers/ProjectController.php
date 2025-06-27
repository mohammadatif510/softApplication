<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        session()->put('title', 'Create Project');
    }

    public function index()
    {
        return view('project.index');
    }

    public function create(Request $request)
    {
        return view('project.create');
    }
}

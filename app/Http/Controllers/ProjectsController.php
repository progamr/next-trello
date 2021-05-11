<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    //
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function store()
    {
        $attributes = request()->validate(['title' => 'required', 'description' => 'required']);

        // You have to be signed in in order to access this method
        auth()->user()->projects()->create($attributes);

        return redirect('projects');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}

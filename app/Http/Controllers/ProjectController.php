<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
    	$projects = Project::with('companies')->filterableQuery()->paginate(10);
    	$data = [
            'title' => 'Projects',
            'projects' => $projects,
        ];

        return view('public_entity::contents.project.index', $data);
    }

    public function show($id)
    {
    	$project = Project::with('companies')->filterableQuery()->findOrFail($id);
        $data = [
            'title' => 'Project',
            'project' => $project,
            'company' => $project->companies->first()
        ];

        return view('public_entity::contents.project.show', $data);
    }
}

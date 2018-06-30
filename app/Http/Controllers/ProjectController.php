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
            'company' => $project->companies->first(),
            'isMobile' => isMobile(),
        ];

        return view('public_entity::contents.project.show', $data);
    }

    public function create()
    {
        // if there are logged in user but not customer, redirect to 404
        if (auth()->user() && auth()->user()->type != 'C') {
            abort(404);
        }

        $company_dropdown = app(\App\Repositories\CompanyRepository::class)->getDropdownByUser()->toArray();
        $company_dropdown[0] = 'Other..';
        $data = [
            'title' => 'Project Registration',
            'company_dropdown' => $company_dropdown,
        ];
        return view('public_entity::contents.project.create', $data);
    }

    public function store(Request $request)
    {
        return $request->all();

        // 1. Validation first

        // 2. Create User with type C

        // 3. Create Project that associated with created user and give company
    }
}

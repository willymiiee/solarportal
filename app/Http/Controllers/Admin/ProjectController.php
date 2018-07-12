<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
	public function index()
	{
		$projects = Project::with('metas', 'companies', 'customers')->orderBy('created_at', 'desc')->paginate(10);
		return view('admin.project.index', compact('projects'));
	}

	public function putVisibility($id, $visibility)
	{
		if (!in_array($visibility, ['visible', 'hidden'])) {
			abort(404);
		}

		$project = Project::findOrFail($id);
		$project->is_shown = $visibility == 'visible' ? 1 : 0;
		$project->save();

		return redirect()->route('admin.projects');
	}
}
<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('metas', 'companies')->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'title' => 'Projects',
            'projects' => $projects,
        ];
        return view('participant::projects.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Rooftop PV Installation',
            'company_dropdown' => app(\App\Repositories\CompanyRepository::class)->getDropdownByUser(auth()->user()['id']),
            'active_page' => 'participant_project',
        ];
        return view('participant::projects.create', $data);
    }

    public function store(Request $request)
    {
        $this->_runValidate($request);
        
        $project = $this->_saveProject((new Project)->newInstance(), $request);
        return redirect()->route('participant.project.index')->withMessage([
            'type' => 'success',
            'message' => 'Project berhasil dibuat!',
        ]);
    }

    public function edit($id, Request $request)
    {
        $project = Project::with('metas', 'companies')->findOrFail($id);
        $project->meta_data = $project->metas->pluck('value', 'key');
        $data = [
            'title' => 'Rooftop PV Installation Edit',
            'company_dropdown' => app(\App\Repositories\CompanyRepository::class)->getDropdownByUser(auth()->user()['id']),
            'active_page' => 'participant_project',
            'project' => $project,
        ];
        return view('participant::projects.edit', $data);
    }

    public function update($id, Request $request)
    {
        $this->_runValidate($request, $id, true);
        
        $project = $this->_saveProject(Project::findOrFail($id), $request);
        return redirect()->route('participant.project.index')->withMessage([
            'type' => 'success',
            'message' => 'Project berhasil diperbarui!',
        ]);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->companies()->detach();
        $project->metas()->delete();
        $project->delete();

        return redirect()->route('participant.project.index')->withMessage([
            'type' => 'success',
            'message' => 'Project berhasil dihapus!',
        ]);
    }

    protected function _runValidate(Request $request, $forgetId = null, $isEdit = false)
    {
        app()->setLocale('id');
        $forgetId = $forgetId ?: 'NULL';
        $rules = [
            'installed_capacity' => 'required|numeric',
            'type_installation' => 'required',
            'type_connection' => 'required',
            'location' => 'required',
            'is_location_allow_public' => 'required',
            'province' => 'required',
            'is_involved_installation' => 'required',
            'image' => 'required|image',

            // metas value
            'meta_data.infoPanel_capacity' => 'nullable|numeric',
            'meta_data.infoPanel_amount' => 'nullable|numeric',

            'meta_data.inverter_capacity' => 'nullable|numeric',

            'meta_data.battery_capacity' => 'nullable|numeric',
            'meta_data.battery_amount' => 'nullable|numeric',
        ];

        if ($isEdit) {
            $rules['image'] = 'image';
        }

        $this->validate($request, $rules, [], [
            'installed_capacity' => __('project.installed_capacity'),
            'type_installation' => __('project.type_installation'),
            'type_connection' => __('project.type_connection'),
            'location' => 'Lokasi',
            'is_location_allow_public' => __('project.is_location_allow_public'),
            'province' => 'Provinsi',
            'is_involved_installation' => __('project.is_involved_installation'),
            'image' => 'Gambar',
        ]);
    }

    protected function _saveProject($project, Request $request)
    {
        DB::beginTransaction();
        try {

            $img_url = object_get($project, 'image', '');
            if ($request->file('image')) {
                $img = uploadToS3($request->file('image'));
                $img_url = $img->url;
            }

            $project = $project->fill($request->except('meta_data'));
            $project->image = $img_url;
            $project->save();

            if (!empty($request->get('meta_data'))) {
                $projectMetas = $this->_saveMetas($project, $request->get('meta_data'));
            }
            $project->companies()->sync($request->get('company_id'));

            DB::commit();

            return $project;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    protected function _saveMetas(Project $project, array $metas)
    {
        $attr_type = Project::META_ATTRIBUTES;
        foreach ($metas as $key => $value) {
            $project->metas()->updateOrCreate([
                'key' => $key,
                'value' => $value,
            ], [
                'key' => $key,
                'value' => $value,
                'type' => $attr_type[$key]
            ]);
        }

        return $project->metas;
    }
}

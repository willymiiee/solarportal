<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    	$project = Project::with(['companies', 'customers'])->filterableQuery()->findOrFail($id);
        $data = [
            'title' => 'Project',
            'project' => $project,
            'company' => $project->companies->first(),
            'customer' => $project->customers->first(),
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
        // 1. Validation first
        $this->validate($request, [
            'installed_capacity' => 'required',
            'type_installation' => 'required',
            'type_connection' => 'required',
            'province' => 'required',
            'location' => 'required',
            'unregistered_company_name' => 'required_if:company_id,0',
            'image' => 'required|array|between:1,5',
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email',
            'user.password' => 'required|confirmed',
        ], [], [
            'installed_capacity' => __('project.installed_capacity'),
            'type_installation' => __('project.type_installation'),
            'type_connection' => __('project.type_connection'),
            'province' => __('project.province'),
            'location' => __('project.location'),
            'unregistered_company_name' => 'Nama Perusahaan/Institusi',
            'user.name' => 'Nama',
            'user.email' => 'Alamat Email',
            'user.password' => 'Password',
            'user.password_confirmation' => 'Ulangi Password',
            'image' => 'Foto'
        ]);

        DB::beginTransaction();
        try {
            // 2. Create User with type C
            $userData = $request->get('user');
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => bcrypt($userData['password']),
                'type' => 'C',
            ]);
            auth()->loginUsingId($user->id);

            // 3. Create Project
            $projectImage = $this->_processImages($request->file('image'));
            $projectData = array_merge($request->except('user'), ['image' => $projectImage]);
            $project = Project::create($projectData);

            // 4. Attach relation project and user and given company
            $project->customers()->attach($user->id, [
                'unregistered_company_name' => $projectData['unregistered_company_name'],
                'company_id' => $projectData['company_id'],
            ]);

            if ($projectData['company_id']) {
                $project->companies()->attach($projectData['company_id']);
            }

            DB::commit();
            return redirect()->route('project.show', $project->id)->withMessage([
                'type' => 'success',
                'message' => 'Project berhasil dibuat!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function _processImages(array $images)
    {
        $result = [];
        foreach ($images as $img) {
            $s3 = uploadToS3($img);
            array_push($result, $s3->url);
        }
        return $result;
    }
}

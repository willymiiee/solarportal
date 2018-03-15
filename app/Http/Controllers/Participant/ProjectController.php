<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {}

    public function create()
    {
        \Debugbar::disable();
        $data = [
            'title' => 'Rooftop PV Installation',
            'company_dropdown' => app(\App\Repositories\CompanyRepository::class)->getDropdownByUser(auth()->user()['id']),
            'active_page' => 'participant_project',
        ];
        return view('participant::projects.create', $data);
    }

    public function store(Request $request)
    {
        // 1. Validate the whole form. Only required for detail utama section
        // 2. Implement DB::transaction()
        // 3. Store Projects first
        // 4. Then following with attach to Company
        // 5. Last save meta data to projectmetas

        return $request->all();
    }
}

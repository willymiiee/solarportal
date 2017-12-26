<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(CompanyRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Company';
        $companies = $this->repo->getPaginateByUser(auth()->user()['id']);
        $data = [
            'title' => $title,
            'content_title' => $title,
            'companies' => $companies,
        ];
        return view('participant::company.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create a company';
        $data = [
            'title' => $title,
            'content_title' => $title,
        ];
        return view('participant::company.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_runValidate($request);

        $this->repo->baseCreate($request->all());

        return redirect()->route('participant.company.index')->withMessage([
            'type' => 'success',
            'message' => 'Company created successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = $this->repo->getDetail($id);
        if (!$company) {
            abort(404, 'Company not found');
        }

        $title = 'Edit a company: ' . $company['name'];
        $data = [
            'title' => $title,
            'content_title' => $title,
            'company' => $company,
        ];
        return view('participant::company.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_runValidate($request, $id);

        $this->repo->baseUpdate($id, $request->all());

        return redirect()->route('participant.company.index')->withMessage([
            'type' => 'success',
            'message' => 'Company updated successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);

        return redirect()->route('participant.company.index')->withMessage([
            'type' => 'success',
            'message' => 'Company deleted successfully!',
        ]);
    }

    protected function _runValidate(Request $request, $forgetId = null)
    {
        $forgetId = $forgetId ?: 'NULL';
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'slug' => 'required|alpha_dash|unique:companies,slug,' . $forgetId,
            'services.*.name' => 'required',
            'services.*.image' => 'image',
        ];

        $this->validate($request, $rules, [], [
            'name' => 'Name',
            'description' => 'Deskripsi',
            'services.*.name' => 'Service Name',
        ]);
    }
}

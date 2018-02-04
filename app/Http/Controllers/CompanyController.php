<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(CompanyRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $data = [
            'title' => 'Perusahaan / Institusi',
            'companies' => $this->repo->basePaginate(5),
        ];

        return view('public_entity::contents.company.index', $data);
    }

    public function show($slug)
    {
        $company = $this->repo->getDetail($slug);
        if (!$company) {
            abort(404);
        }

        $data = [
            'title' => $company['name'],
            'company' => $company,
        ];

        return view('public_entity::contents.company.show', $data);
    }

    public function sendMessage($slug, Request $request)
    {
        app()->setLocale('id');

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:20',
        ], [], []);

        $this->repo->sendMessage($slug, $request->all());

        return redirect()->back()->withMessage(['type' => 'success', 'message' => 'Pesan berhasil terkirim!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
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
        $companies = $this->repo->basePaginate(10);
        if ($filterValue = request('search')) {
            $companies = Company::where('name', 'like', '%'.$filterValue.'%')
                ->orWhere('description', 'like', '%'.$filterValue.'%')
                ->orderBy('verified', 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        $data = [
            'title' => 'Perusahaan / Institusi',
            'companies' => $companies,
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

    public function getByCategory($slug = null)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            abort(404);
        }

        $data = [
            'title' => $category->name,
            'companies' => $category->companies()->paginate(2),
        ];

        return view('public_entity::contents.company.index', $data);
    }
}

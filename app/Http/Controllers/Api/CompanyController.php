<?php

namespace App\Http\Controllers\Api;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{
    public function __construct(CompanyRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $per_page = request('per_page', 10);
        return $this->repo->basePaginate($per_page);
    }
}

<?php

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->truncate();
        DB::table('company_user')->truncate();
        DB::table('company_services')->truncate();

        $participant = User::where('type', 'V')->first();

        $company = factory(Company::class, 5)->create();
        $companyIds = $company->pluck('id')->toArray();

        $participant->companies()->attach($companyIds);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->delete();
        \Excel::load(storage_path('provinces.csv'), function($reader) {
            $reader->noHeading = true;
        })->each(function ($csvLine) {
            DB::table('provinces')->insert([
                'id' => $csvLine[0],
                'name' => $csvLine[1]
            ]);
        });

        DB::table('regencies')->delete();
        \Excel::load(storage_path('regencies.csv'), function($reader) {
            $reader->noHeading = true;
        })->each(function ($csvLine) {
            DB::table('regencies')->insert([
                'id' => $csvLine[0],
                'province_id' => $csvLine[1],
                'name' => $csvLine[2]
            ]);
        });

        DB::table('districts')->delete();
        \Excel::load(storage_path('districts.csv'), function($reader) {
            $reader->noHeading = true;
        })->each(function ($csvLine) {
            DB::table('districts')->insert([
                'id' => $csvLine[0],
                'regency_id' => $csvLine[1],
                'name' => $csvLine[2]
            ]);
        });

        DB::table('villages')->delete();
        \Excel::load(storage_path('villages.csv'), function($reader) {
            $reader->noHeading = true;
        })->each(function ($csvLine) {
            DB::table('villages')->insert([
                'id' => $csvLine[0],
                'district_id' => $csvLine[1],
                'name' => $csvLine[2]
            ]);
        });
    }
}

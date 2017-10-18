<?php

use Illuminate\Database\Seeder;

class LabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->delete();

        $labels = [
            ['name' => 'Media'],
            ['name' => 'Events'],
            ['name' => 'Others'],
        ];

        DB::table('labels')->insert($labels);
    }
}

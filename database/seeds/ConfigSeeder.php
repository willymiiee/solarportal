<?php

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'key' => 'quote_email',
            'value' => 'solar-quote@sejutasuryaatap.com'
        ]);
    }
}

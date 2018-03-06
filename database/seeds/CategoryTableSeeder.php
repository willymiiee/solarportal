<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Pabrikan/Distributor/Retailer Produk Listrik Surya Atap',
            'EPC/Kontraktor Pemasang Listrik Surya Atap',
            'Operasi dan Perawatan Listrik Surya Atap',
            'Training',
            'Non Profit, LSM, Akademisi',
            'Lain-lain',
        ];

        foreach ($data as $key => $d) {
            Category::create([
                'name' => $d,
                'slug' => str_slug($d),
            ]);
        }
    }
}

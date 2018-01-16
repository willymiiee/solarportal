<?php

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->truncate();

        factory(Article::class)->create([
            'title' => 'Tentang GNSSA',
            'slug' => 'tentang-gnssa',
            'created_at' => null,
            'updated_at' => null,
        ]);

        factory(Article::class, 10)->create([
            'type' => 'post',
        ]);
    }
}

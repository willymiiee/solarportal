<?php

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->_seedUsers();
        $this->_seedLabels();
        $this->_seedArticles();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    protected function _seedUsers()
    {
        DB::table('users')->truncate();

        // Admin User
        factory(User::class)->create([
            'name' => 'Arthur',
            'email' => 'arthur.panggabean@improvid.org',
            'type' => 'A',
            'password' => bcrypt('12345678'),
            'confirmed_at' => now(),
        ]);

        // Vendor/Participant User
        factory(User::class)->create([
            'name' => 'John Participant',
            'email' => 'johndoe@improvid.org',
            'type' => 'V',
            'password' => bcrypt('12345678'),
        ]);

        factory(User::class)->create([
            'name' => 'Antoni Putra',
            'email' => 'akiddcode@gmail.com',
            'type' => 'V',
            'password' => bcrypt('secret'),
        ]);

        // Customer/User
        factory(User::class)->create([
            'name' => 'Jane Customer',
            'email' => 'jane@improvid.org',
            'type' => 'C',
            'password' => bcrypt('12345678'),
        ]);
    }

    protected function _seedLabels()
    {
        DB::table('labels')->truncate();

        $labels = [
            ['name' => 'Media'],
            ['name' => 'Events'],
            ['name' => 'Others'],
        ];

        DB::table('labels')->insert($labels);
    }

    protected function _seedArticles()
    {
        DB::table('articles')->truncate();

        $content_about = '<p>Pada 13 September 2017 lalu telah dibuat dan disahkan deklarasi &quot;Gerakan Nasional Sejuta Surya Atap&quot;. Maksud dari Gerakan Nasional ini adalah untuk mendukung Kebijakan Energi Nasional, yaitu tercapainya 23% penggunaan energi baru dan terbarukan pada tahun 2025, dengan cara mendorong dan mempercepat pembangunan pembangkit listrik surya atap di perumahan, fasilitas umum, gedung perkantoran dan pemerintahan, bangunan komersial, dan kompleks industri hingga orde gigawat sebelum tahun 2020.&nbsp;</p>

        <p>Deklarasi ini dihadiri dan ditandatangani oleh perwakilan Direktorat Jenderal Energi Baru Terbarukan dan Konservasi Energi Kementerian Energi dan Sumber Daya Mineral (EBTKE KESDM), Kementerian Perindustrian, &nbsp;Badan Pengkajian dan Penerapan Teknologi (B2TKE BPPT), Masyarakat Energi Terbarukan Indonesia (METI), Konsorsium Kemandirian Industri Fotovoltaik Indonesia, Asosiasi Energi Surya Indonesia (AESI), Asosiasi Pabrikan Modul Surya Indonesia (APAMSI), dan Perkumpulan Pengguna Listrik Surya Atap (PPLSA).&nbsp;<br />
        	&nbsp;</p>';

        factory(Article::class)->create([
            'title' => 'Tentang GNSSA',
            'slug' => 'tentang-gnssa',
            'content' => $content_about,
            'type' => 'page',
            'created_at' => null,
            'updated_at' => null,
        ]);

        factory(Article::class)->create([
            'title' => 'Info Listrik Surya',
            'slug' => 'info-listrik-surya',
            'content' => 'Coming soon...',
            'type' => 'page',
            'created_at' => null,
            'updated_at' => null,
        ]);
    }
}

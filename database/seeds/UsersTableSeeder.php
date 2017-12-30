<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $this->_specialUser();
        factory(User::class, 5)->create();
    }

    protected function _specialUser()
    {
        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'type' => 'A',
            'password' => app('hash')->make('12345678'),
        ]);

        factory(User::class)->create([
            'name' => 'John The Participant',
            'email' => 'johndoe@gmail.com',
            'type' => 'V',
            'password' => app('hash')->make('secret'),
        ]);

        factory(User::class)->create([
            'name' => 'Antoni Putra',
            'email' => 'akiddcode@gmail.com',
            'type' => 'V',
            'password' => app('hash')->make('secret'),
        ]);
    }
}

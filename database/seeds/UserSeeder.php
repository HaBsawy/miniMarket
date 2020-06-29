<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'ahmed',
            'email' => 'ahmed@mail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}

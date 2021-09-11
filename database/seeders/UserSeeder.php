<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'             => 'Nurhakiki',
            'email'            => 'admin@bank.com',
            'password'         => bcrypt('12345678'),
            'role'             => 'admin'
        ]);
        $user->save();

        $user = User::create([
            'name'             => 'Nadia',
            'email'            => 'user@bank.com',
            'password'         => bcrypt('12345678'),
            'role'             => 'user'
        ]);
        $user->save();
    }
}

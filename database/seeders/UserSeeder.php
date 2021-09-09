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
            'name'             => 'admin',
            'email'            => 'admin@admin.com',
            'password'         => bcrypt('password'),
            'role'             => 'admin'
        ]);
        $user->save();

        $user = User::create([
            'name'             => 'user',
            'email'            => 'user@user.com',
            'password'         => bcrypt('password'),
            'role'             => 'user'
        ]);
        $user->save();
    }
}

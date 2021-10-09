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
            'nickname'         => 'Dany',
            'name'             => 'Nurhakiki Romadhony Ikhwandany',
            'email'            => 'admin@admin.com',
            'password'         => bcrypt('password'),
            'role'             => 'admin'
        ]);
        $user->save();

        $user = User::create([
            'nickname'         => 'Nadia',
            'name'             => 'Nadia Irsyan Fadhillah',
            'email'            => 'user@admin.com',
            'password'         => bcrypt('password'),
            'role'             => 'user'
        ]);
        $user->save();
    }
}

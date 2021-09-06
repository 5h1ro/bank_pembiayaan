<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Customer::create([
            'name'             => 'nadia',
            'age'              => '19',
            'jobs'             => 'Designer',
            'address'          => 'Madiun'
        ]);
        $user->save();
    }
}

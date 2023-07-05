<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name'  => 'Fahmi Fauzi Rahman',
            'email' => 'fahmifauzirahman@gmail.com',
            'password'  => '123456',
        ]);

        User::create([
            'id' => 2,
            'name'  => 'Dzaki Dhafir Rahman',
            'email' => 'dzakidhafirrahman@gmail.com',
            'password'  => '123456',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Test01',
                'email' => 'test01@t.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Test02',
                'email' => 'test02@t.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Test03',
                'email' => 'test03@t.com',
                'password' => Hash::make('123'),
            ]
        ]);
    }
}

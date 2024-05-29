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
        foreach (range(1, 10) as $index) {
            User::create([
                'name' => 'User ' . $index,
                'email' => 'user' . $index . '@example.com',
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}

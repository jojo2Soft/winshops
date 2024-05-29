<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wines;
use App\Models\Purchases;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 50) as $index) {
            Purchases::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'wine_id' => Wines::inRandomOrder()->first()->id,
                'quantity' => rand(1, 5),
            ]);
        }
    }
}

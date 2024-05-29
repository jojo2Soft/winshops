<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wines;
use App\Models\Ratings;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 50) as $index) {
            Ratings::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'wine_id' => Wines::inRandomOrder()->first()->id,
                'rating' => rand(1, 5),
                'review' => 'Review for wine ' . $index,
            ]);
        }
    }
}

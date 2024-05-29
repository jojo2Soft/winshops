<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wines;
use Illuminate\Database\Seeder;
use App\Models\BrowsingHistories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrowsingHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 50) as $index) {
            BrowsingHistories::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'wine_id' => Wines::inRandomOrder()->first()->id,
            ]);
        }
    }
}

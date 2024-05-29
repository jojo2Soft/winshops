<?php

namespace Database\Seeders;

use App\Models\Types;
use App\Models\Wines;
use App\Models\Grapes;
use App\Models\Regions;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 30) as $index) {
            Wines::create([
                'name' => 'Wine ' . $index,
                'region_id' => Regions::inRandomOrder()->first()->id,
                'type_id' => Types::inRandomOrder()->first()->id,
                'grape_id' => Grapes::inRandomOrder()->first()->id,
                'year' => rand(1990, 2020),
                'description' => 'Description for wine ' . $index,
                'price' => rand(10, 100),
                'image' => null,
            ]);
        }
    }
}

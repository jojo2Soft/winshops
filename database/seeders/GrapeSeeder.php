<?php

namespace Database\Seeders;

use App\Models\Grapes;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GrapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grapes = ['Cabernet Sauvignon', 'Merlot', 'Pinot Noir', 'Syrah', 'Chardonnay', 'Sauvignon Blanc', 'Riesling', 'Grenache'];
        foreach ($grapes as $grape) {
            Grapes::create(['name' => $grape]);
        }
    }
}

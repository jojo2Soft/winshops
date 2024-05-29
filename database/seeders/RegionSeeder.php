<?php

namespace Database\Seeders;

use App\Models\Regions;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $regions = ['Bordeaux', 'Bourgogne', 'Rhône', 'Loire', 'Alsace', 'Champagne', 'Provence', 'Languedoc-Roussillon'];
        foreach ($regions as $region) {
            Regions::create(['name' => $region]);
        }
    }
}

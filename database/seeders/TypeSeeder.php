<?php

namespace Database\Seeders;

use App\Models\Types;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Rouge', 'Blanc', 'Rosé', 'Pétillant', 'Dessert', 'Fortifié'];
        foreach ($types as $type) {
            Types::create(['name' => $type]);
        }
    }
}

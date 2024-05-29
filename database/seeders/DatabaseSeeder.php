<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\WineSeeder;
use Database\Seeders\GrapeSeeder;
use Database\Seeders\RatingSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\PurchaseSeeder;
use Database\Seeders\BrowsingHistorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RegionSeeder::class,
            TypeSeeder::class,
            GrapeSeeder::class,
            WineSeeder::class,
            UserSeeder::class,
            PurchaseSeeder::class,
            RatingSeeder::class,
            BrowsingHistorySeeder::class,
        ]);
    }
}

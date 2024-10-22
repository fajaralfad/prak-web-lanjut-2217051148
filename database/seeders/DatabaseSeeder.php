<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Call the KelasSeeder first
        $this->call(KelasSeeder::class);
        // Then call the UserSeeder
        $this->call(UserSeeder::class);
    }
}

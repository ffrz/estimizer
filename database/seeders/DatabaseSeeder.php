<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Library\BaseItemCategorySeeder;
use Database\Seeders\Library\BaseItemSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
            BaseItemCategorySeeder::class,
            BaseItemSeeder::class,
        ]);
    }
}

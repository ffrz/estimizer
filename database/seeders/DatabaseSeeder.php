<?php

namespace Database\Seeders;

use Database\Seeders\AhspMgr\TaskCategorySeeder as AhspTaskCategorySeeder;
use Database\Seeders\AhspMgr\TaskGroupSeeder as AhspTaskGroupSeeder;
use Database\Seeders\AhspMgr\BaseItemCategorySeeder;
use Database\Seeders\AhspMgr\BaseItemGroupSeeder;
use Database\Seeders\AhspMgr\BaseItemSeeder;
use Illuminate\Database\Seeder;
use PharIo\Manifest\Library;

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
            BaseItemGroupSeeder::class,
            BaseItemSeeder::class,
            AhspTaskCategorySeeder::class,
            AhspTaskGroupSeeder::class
        ]);
    }
}

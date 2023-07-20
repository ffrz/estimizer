<?php

namespace Database\Seeders\AhspMgr;

use App\Models\AhspMgr\TaskGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaskGroup::create(['id' => 1, 'name'  => 'Estimizer']);
        TaskGroup::create(['id' => 2, 'name'  => 'SNI']);
        TaskGroup::create(['id' => 3, 'name'  => 'PUPR']);
    }
}

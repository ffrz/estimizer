<?php

namespace Database\Seeders\AhspMgr;

use App\Models\AhspMgr\TaskCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaskCategory::create(['id' => 1, 'name'  => 'PEKERJAAN PERSIAPAN']);
        TaskCategory::create(['id' => 2, 'name'  => 'PEKERJAAN TANAH']);
        TaskCategory::create(['id' => 3, 'name'  => 'PEKERJAAN PONDASI']);
        TaskCategory::create(['id' => 4, 'name'  => 'PEKERJAAN BETON']);
        TaskCategory::create(['id' => 5, 'name'  => 'PEKERJAAN DINDING']);
        TaskCategory::create(['id' => 6, 'name'  => 'PEKERJAAN ATAP']);
        TaskCategory::create(['id' => 7, 'name'  => 'PEKERJAAN PLAFOND']);
        TaskCategory::create(['id' => 8, 'name'  => 'PEKERJAAN KUSEN DAN BUKAAN']);
        TaskCategory::create(['id' => 9, 'name'  => 'PEKERJAAN MEP']);
        TaskCategory::create(['id' => 10, 'name'  => 'PEKERJAAN LAIN-LAIN']);
    }
}

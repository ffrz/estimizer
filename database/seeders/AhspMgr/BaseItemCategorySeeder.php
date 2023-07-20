<?php

namespace Database\Seeders\AhspMgr;

use App\Models\AhspMgr\BaseItemCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BaseItemCategory::create([
            'id' => 1,
            'name'  => 'Upah Kerja',
        ]);

        BaseItemCategory::create([
            'id' => 2,
            'name'  => 'Bahan Perekat',
        ]);

        BaseItemCategory::create([
            'id' => 3,
            'name'  => 'Agregat Kasar',
        ]);

        
    }
}

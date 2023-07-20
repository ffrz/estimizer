<?php

namespace Database\Seeders\AhspMgr;

use App\Models\AhspMgr\BaseItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BaseItem::create([
            'id' => 1,
            'name'  => 'Pekerja',
            'uom'  => 'HOK',
            'type' => 1,
            'category_id' => 3,
            'group_id' => 1,
            'brand'  => '-',
            'specification'  => '-',
            'price'  => '100000',
        ]);

        BaseItem::create([
            'id' => 2,
            'name'  => 'Tukang Batu',
            'uom'  => 'HOK',
            'type' => 1,
            'category_id' => 3,
            'group_id' => 1,
            'brand'  => '-',
            'specification'  => '-',
            'price'  => '130000',
        ]);

        BaseItem::create([
            'id' => 3,
            'name'  => 'Semen PC',
            'uom'  => 'zak',
            'type' => 0,
            'category_id' => 1,
            'group_id' => 1,
            'brand'  => 'Tiga Roda',
            'specification'  => '-',
            'price'  => '72000',
        ]);
    }
}

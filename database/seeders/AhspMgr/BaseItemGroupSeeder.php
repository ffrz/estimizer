<?php

namespace Database\Seeders\AhspMgr;

use App\Models\AhspMgr\BaseItemGroup;
use Illuminate\Database\Seeder;

class BaseItemGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BaseItemGroup::create([
            'id' => 1,
            'name'  => 'Estimizer',
        ]);

        BaseItemGroup::create([
            'id' => 2,
            'name'  => 'IKK BPS',
        ]);

        BaseItemGroup::create([
            'id' => 3,
            'name'  => 'Supplier',
        ]);

        BaseItemGroup::create([
            'id' => 4,
            'name'  => 'SHJB',
        ]);
    }
}

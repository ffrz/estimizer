<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'code' => 'PR-001',
            'name' => 'Pembangunan Rumah Tinggal 1 Lantai',
            'owner' => 'Bp. Bara',
            'address' => 'Blok Pangampiran Desa Cicanir Kec. Talaga Kab. Majalengka',
            'year' => '2023',
            'cost' => 0.0,
            'tax' => 11.0,
            'fee' => 10.0,
        ]);

        Project::create([
            'code' => 'PR-002',
            'name' => 'Pembangunan Gedung TK Al-Atsary',
            'owner' => 'Ma\'had Al-Atsary Cikijing',
            'address' => 'Blok Malongpong',
            'year' => '2023',
            'cost' => 0.0,
            'tax' => 11.0,
            'fee' => 10.0,
        ]);

        Project::create([
            'code' => 'PR-003',
            'name' => 'Pembangunan Gedung Banaat Al-Atsary',
            'owner' => 'Ma\'had Al-Atsary Cikijing',
            'address' => 'Blok Malongpong',
            'year' => '2023',
            'cost' => 0.0,
            'tax' => 11.0,
            'fee' => 10.0,
        ]);
    }
}

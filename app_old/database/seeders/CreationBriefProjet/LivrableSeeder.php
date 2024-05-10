<?php

namespace Database\Seeders\CreationBriefProjet;

use App\Models\CreationBriefProjet\Livrable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivrableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Livrable::create([
            'nom' => 'Homepage',
            'description' => 'Completed homepage design and development',
            'brief_projet_id' => 1,
        ]);
    }
}

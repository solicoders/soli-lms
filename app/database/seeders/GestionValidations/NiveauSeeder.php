<?php

namespace Database\Seeders\GestionValidations;
use App\Models\GestionValidations\Niveau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Niveau::create([
            'nom' => 'adapter',
            'description' => 'Description for adapter niveau',
            'note_max' => 100.0,
            'note_min' => 0.0,
        ]);

        Niveau::create([
            'nom' => 'imiter',
            'description' => 'Description for imiter niveau',
            'note_max' => 100.0,
            'note_min' => 0.0,
        ]);

        Niveau::create([
            'nom' => 'transposer',
            'description' => 'Description for transposer niveau',
            'note_max' => 100.0,
            'note_min' => 0.0,
        ]);
    }
}

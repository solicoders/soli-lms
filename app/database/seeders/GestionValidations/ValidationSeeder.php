<?php

namespace Database\Seeders\GestionValidations;;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GestionValidations\Validation;

use App\Models\GestionValidations\Niveau;

class ValidationSeeder extends Seeder
{
    public function run()
    {
        $niveauAdapter = Niveau::where('nom', 'adapter')->first();
        $niveauImiter = Niveau::where('nom', 'imiter')->first();
        $niveauTransposer = Niveau::where('nom', 'transposer')->first();

        Validation::create([
            'note' => 15,
            'niveau_id' => $niveauAdapter->id,
        ]);

        Validation::create([
            'note' => 10,
            'niveau_id' => $niveauImiter->id,
        ]);

        Validation::create([
            'note' => 17,
            'niveau_id' => $niveauTransposer->id,
        ]);
    }
}
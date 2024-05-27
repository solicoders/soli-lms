<?php

namespace Database\Seeders\GestionValidations;;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GestionValidations\Validation;

use App\Models\GestionValidations\Niveaucompetenceformateur;

class ValidationSeeder extends Seeder
{
    public function run()
    {
        $niveauAdapter = Niveaucompetenceformateur::where('nom', 'adapter')->first();
        $niveauImiter = Niveaucompetenceformateur::where('nom', 'imiter')->first();
        $niveauTransposer = Niveaucompetenceformateur::where('nom', 'transposer')->first();

        Validation::create([
            'note' => 15,
            'niveaucompetenceformateur_id' => $niveauAdapter->id,
        ]);

        Validation::create([
            'note' => 10,
            'niveaucompetenceformateur_id' => $niveauImiter->id,
        ]);

        Validation::create([
            'note' => 17,
            'niveaucompetenceformateur_id' => $niveauTransposer->id,
        ]);
    }
}
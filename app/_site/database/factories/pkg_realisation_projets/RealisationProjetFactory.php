<?php

namespace Database\Factories\pkg_realisation_projets;

use App\Models\pkg_realisation_projets\RealisationProjet;
use Illuminate\Database\Eloquent\Factories\Factory;

class RealisationProjetFactory extends Factory
{
    protected $model = RealisationProjet::class;

    public function definition()
    {
        return [
            'date_debut_realisation' => $this->faker->date(),
            'date_fin_realisation' => $this->faker->date(),
            'projet_id' => $this->faker->randomNumber(),
            'etat_realisation_projet_id' => $this->faker->randomNumber(),
            'personne_id' => $this->faker->randomNumber()
        ];
    }
}
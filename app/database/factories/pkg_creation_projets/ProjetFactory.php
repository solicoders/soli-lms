<?php

namespace Database\Factories\pkg_creation_projets;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pkg_creation_projets\Projet>
 */
class ProjetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'travailAFaire' => $this->faker->text,
            'critereDeTravail' => $this->faker->text,
            'dateDebut' => $this->faker->date,
            'dateFin' => $this->faker->date,
        ];
    }
}

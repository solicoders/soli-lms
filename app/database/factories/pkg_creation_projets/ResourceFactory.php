<?php

namespace Database\Factories\pkg_creation_projets;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pkg_creation_projets\Resource>
 */
class ResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'lien' => $this->faker->url,
            'description' => $this->faker->paragraph,
        ];
    }
}

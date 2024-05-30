<?php

namespace Tests\Feature\pkg_creation_projets;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\pkg_creation_projets\Projet;
use App\Repositories\pkg_creation_projets\ProjetRepository;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase; // Add this line

class ProjetRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker, InteractsWithDatabase; // Add InteractsWithDatabase trait

    protected $projetRepo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->projetRepo = new ProjetRepository();
    }

    /**
     * Test creating a projet.
     */
    public function testCreateProjet(): void
    {
        $projetData = Projet::factory()->make()->toArray();
        $createdProjet = $this->projetRepo->create($projetData);
        $this->assertModelExists($createdProjet);
    }

    /**
     * Test finding a projet.
     */
    public function testFindProjet(): void
    {
        $projet = Projet::factory()->create();
        $foundProjet = $this->projetRepo->find($projet->id);
        $this->assertNotNull($foundProjet);
        $this->assertEquals($projet->titre, $foundProjet->titre);
    }

    /**
     * Test updating a projet.
     */
    public function testUpdateProjet(): void
    {
        $projet = Projet::factory()->create();
        $updateData = ['titre' => 'Updated Title'];
        $updatedProjet = $this->projetRepo->update($projet->id, $updateData);
        $this->assertEquals('Updated Title', $updatedProjet->titre);
    }

    /**
     * Test deleting a projet.
     */
    public function testDeleteProjet(): void
    {
        $projet = Projet::factory()->create();
        $deleteResult = $this->projetRepo->delete($projet->id);
        $this->assertTrue($deleteResult);
        $this->assertDeleted($projet); // Add this line
    }
}


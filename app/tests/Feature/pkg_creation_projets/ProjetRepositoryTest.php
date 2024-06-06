<?php

namespace Tests\Feature\pkg_creation_projets;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\pkg_creation_projets\Projet;
use App\Repositories\pkg_creation_projets\ProjetRepository;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use App\Exceptions\pkg_creation_projets\ProjetAlreadyExistException;
use App\Models\pkg_authentification\User;

class ProjetRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker, InteractsWithDatabase;

    protected $projetRepo;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->projetRepo = new ProjetRepository();
        $this->user = User::factory()->create(); // Ensure User factory exists or create one
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
        $projet = Projet::factory()->create([
            'titre' => 'Original Title',
            'description' => 'Original Description',
            // Add other fields as necessary
        ]);
        $updateData = [
            'titre' => 'Updated Title',
        ];
        $updateResult = $this->projetRepo->update($projet->id, $updateData);
        $this->assertTrue($updateResult, 'Update operation failed or project not found.');

        // Retrieve the updated project
        $updatedProjet = Projet::find($projet->id);

        $this->assertEquals('Updated Title', $updatedProjet->titre);
        $this->assertEquals('Original Description', $updatedProjet->description);
        // Add assertions for other fields as necessary
    }

    /**
     * Test deleting a projet.
     */
    public function testDeleteProjet(): void
    {
        $projet = Projet::factory()->create();
        $deleteResult = $this->projetRepo->destroy($projet->id);
        $this->assertTrue($deleteResult);

        // Manually check that the model has been deleted
        $this->assertNull(Projet::find($projet->id));
    }

    /**
     * Test creating a project that already exists.
     */
    public function test_create_project_already_exist()
    {
        $this->actingAs($this->user);

        $project = Projet::factory()->create();
        $projectData = [
            'nom' => $project->nom,
            'description' => 'project create test',
        ];

        try {
            $project = $this->projetRepo->create($projectData);
            $this->fail('Expected ProjetAlreadyExistException was not thrown');
        } catch (ProjetAlreadyExistException $e) {
            $this->assertEquals(__('pkg_creation_projets/projet/message.createProjectException'), $e->getMessage());
        } catch (\Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }

    /**
     * Test pagination of projects.
     */
    public function test_paginate()
    {
        $this->actingAs($this->user);
        $projectData = [
            'nom' => 'project create test',
            'description' => 'project create test',
        ];
        $project = $this->projetRepo->create($projectData);
        $projects = $this->projetRepo->paginate();
        $this->assertNotNull($projects);
    }
}


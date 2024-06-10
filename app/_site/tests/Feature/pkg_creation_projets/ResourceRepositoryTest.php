<?php

namespace Tests\Feature\pkg_creation_projets;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\pkg_creation_projets\Resource;
use App\Models\pkg_creation_projets\Projet;
use App\Repositories\pkg_creation_projets\ResourceRepository;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class ResourceRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker, InteractsWithDatabase;

    protected $resourceRepo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->resourceRepo = new ResourceRepository();
    }

    /**
     * Test creating a resource.
     */
    public function testCreateResource(): void
    {
        $projet = Projet::factory()->create();
        $resourceData = [
            'nom' => $this->faker->word,
            'lien' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'projet_id' => $projet->id
        ];

        $createdResource = $this->resourceRepo->create($resourceData);
        $this->assertModelExists($createdResource);
        $this->assertEquals($resourceData['nom'], $createdResource->nom);
        $this->assertEquals($resourceData['lien'], $createdResource->lien);
        $this->assertEquals($resourceData['description'], $createdResource->description);
        $this->assertEquals($resourceData['projet_id'], $createdResource->projet_id);
    }

    /**
     * Test finding a resource.
     */
    public function testFindResource(): void
    {
        $projet = Projet::factory()->create();  // Create a Projet instance
        $resource = Resource::factory()->create(['projet_id' => $projet->id]);  // Assign the projet_id
        $foundResource = $this->resourceRepo->find($resource->id);
        $this->assertNotNull($foundResource);
        $this->assertEquals($resource->nom, $foundResource->nom);
    }

    /**
     * Test updating a resource.
     */
    public function testUpdateResource(): void
    {
        $projet = Projet::factory()->create();  // Ensure a Projet instance is created
        $resource = Resource::factory()->create(['projet_id' => $projet->id]);  // Include projet_id
        $updateData = [
            'nom' => 'Updated Name',
            'description' => 'Updated Description'
        ];
        $updateResult = $this->resourceRepo->update($resource->id, $updateData);
        $this->assertTrue($updateResult);

        $updatedResource = Resource::find($resource->id);
        $this->assertEquals('Updated Name', $updatedResource->nom);
        $this->assertEquals('Updated Description', $updatedResource->description);
    }

    /**
     * Test deleting a resource.
     */
    public function testDeleteResource(): void
    {
        $projet = Projet::factory()->create();  // Ensure a Projet instance is created
        $resource = Resource::factory()->create(['projet_id' => $projet->id]);  // Include projet_id
        $deleteResult = $this->resourceRepo->destroy($resource->id);
        $this->assertTrue($deleteResult);
        $this->assertNull(Resource::find($resource->id));
    }
}


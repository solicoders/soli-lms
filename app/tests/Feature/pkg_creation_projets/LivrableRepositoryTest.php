<?php

namespace Tests\Feature\pkg_creation_projets;

use App\Exceptions\pkg_creation_projets\LivrableAlreadyExistException;
use App\Models\pkg_creation_projets\NatureLivrable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\pkg_creation_projets\Livrable; // Ensure this model exists
use App\Models\pkg_creation_projets\Projet;
use App\Repositories\pkg_creation_projets\LivrableRepository; // Ensure this repository exists
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class LivrableRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker, InteractsWithDatabase;

    protected $livrableRepo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->livrableRepo = new LivrableRepository();
    }

    /**
     * Test creating a livrable.
     */
    public function testCreateLivrable(): void
    {
        // Create a projet first
        $projet = Projet::factory()->create();

        // Create a nature_livrable first
        $natureLivrable = NatureLivrable::factory()->create();

        // Data for the new livrable
        $livrableData = [
            'titre' => 'Sit qui eveniet aut neque.',
            'lien' => 'http://blanc.com/quia-tenetur-assumenda-et-ut-ab-officiis',
            'description' => 'Provident animi rerum enim nesciunt vel dolorem totam.',
            'projet_id' => $projet->id,
            'nature_livrable_id' => $natureLivrable->id, // Ensure this is included
            'created_at' => now(),
            'updated_at' => now()
        ];

        // Insert the livrable into the database
        $livrable = Livrable::create($livrableData);

        // Assertions to confirm livrable creation
        $this->assertModelExists($livrable);
        $this->assertEquals($projet->id, $livrable->projet_id);
        $this->assertEquals($natureLivrable->id, $livrable->nature_livrable_id);
    }

    /**
     * Test finding a livrable.
     */
    public function testFindLivrable(): void
    {
        $projet = Projet::factory()->create();
        $natureLivrable = NatureLivrable::factory()->create();

        $livrable = Livrable::factory()->create([
            'projet_id' => $projet->id,
            'nature_livrable_id' => $natureLivrable->id
        ]);

        $foundLivrable = $this->livrableRepo->find($livrable->id);
        $this->assertNotNull($foundLivrable);
        $this->assertEquals($livrable->titre, $foundLivrable->titre);
    }

    /**
     * Test updating a livrable.
     */
    public function testUpdateLivrable(): void
    {
        $projet = Projet::factory()->create();
        $natureLivrable = NatureLivrable::factory()->create();

        $livrable = Livrable::factory()->create([
            'projet_id' => $projet->id,
            'nature_livrable_id' => $natureLivrable->id
        ]);

        $updateData = [
            'titre' => 'Updated Title',
            'description' => 'Updated description',
        ];

        $livrable->update($updateData);

        $updatedLivrable = Livrable::find($livrable->id);

        $this->assertEquals('Updated Title', $updatedLivrable->titre);
        $this->assertEquals('Updated description', $updatedLivrable->description);
        $this->assertEquals($projet->id, $updatedLivrable->projet_id);
        $this->assertEquals($natureLivrable->id, $updatedLivrable->nature_livrable_id);
    }

    /**
     * Test deleting a livrable.
     */
    public function testDeleteLivrable(): void
    {
        $projet = Projet::factory()->create();
        $natureLivrable = NatureLivrable::factory()->create();

        $livrable = Livrable::factory()->create([
            'projet_id' => $projet->id,
            'nature_livrable_id' => $natureLivrable->id
        ]);

        $deleteResult = $this->livrableRepo->destroy($livrable->id);
        $this->assertTrue($deleteResult);

        $this->assertNull(Livrable::find($livrable->id));
    }

    public function test_create_livrable_already_exist()
    {
        $projet = Projet::factory()->create();
        $natureLivrable = NatureLivrable::factory()->create();

        $livrable = Livrable::factory()->create([
            'projet_id' => $projet->id,
            'nature_livrable_id' => $natureLivrable->id
        ]);

        $livrableData = [
            'titre' => $livrable->titre,
            'lien' => 'http://example.com', // Add a default or dummy link here
            'description' => 'Livrable create test',
            'projet_id' => $projet->id,
            'nature_livrable_id' => $natureLivrable->id
        ];

        try {
            $livrable = $this->livrableRepo->create($livrableData);
            $this->fail('Expected LivrableAlreadyExistException was not thrown');
        } catch (LivrableAlreadyExistException $e) {
            $this->assertEquals(__('pkg_creation_projets/message.createLivrableException'), $e->getMessage());
        } catch (\Exception $e) {
            $this->fail('Unexpected exception was thrown: ' . $e->getMessage());
        }
    }
}


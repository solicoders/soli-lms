<?php

namespace Tests\Feature\pkg_creation_projets;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\pkg_creation_projets\NatureLivrable;
use App\Repositories\pkg_creation_projets\NatureLivrableRepository;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class NatureLivrableRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker, InteractsWithDatabase;

    protected $natureLivrablesRepo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->natureLivrablesRepo = new NatureLivrableRepository();
    }

    /**
     * Test creating a nature livrable.
     */
    public function testCreateNatureLivrable(): void
    {
        $natureLivrableData = NatureLivrable::factory()->make()->toArray();
        $createdNatureLivrable = $this->natureLivrablesRepo->create($natureLivrableData);
        $this->assertModelExists($createdNatureLivrable);
    }

    /**
     * Test finding a nature livrable.
     */
    public function testFindNatureLivrable(): void
    {
        $natureLivrable = NatureLivrable::factory()->create();
        $foundNatureLivrable = $this->natureLivrablesRepo->find($natureLivrable->id);
        $this->assertNotNull($foundNatureLivrable);
        $this->assertEquals($natureLivrable->nom, $foundNatureLivrable->nom);
    }

    /**
     * Test updating a nature livrable.
     */
    public function testUpdateNatureLivrable(): void
    {
        $natureLivrable = NatureLivrable::factory()->create([
            'nom' => 'Original Name',
            'description' => 'Original Description',
        ]);
        $updateData = [
            'nom' => 'Updated Name',
        ];
        $updateResult = $this->natureLivrablesRepo->update($natureLivrable->id, $updateData);
        $this->assertTrue($updateResult, 'Update operation failed or nature livrable not found.');

        // Retrieve the updated nature livrable
        $updatedNatureLivrable = NatureLivrable::find($natureLivrable->id);

        $this->assertEquals('Updated Name', $updatedNatureLivrable->nom);
        $this->assertEquals('Original Description', $updatedNatureLivrable->description);
    }

    /**
     * Test deleting a nature livrable.
     */
    public function testDeleteNatureLivrable(): void
    {
        $natureLivrable = NatureLivrable::factory()->create();
        $deleteResult = $this->natureLivrablesRepo->destroy($natureLivrable->id);
        $this->assertTrue($deleteResult);

        // Manually check that the model has been deleted
        $this->assertNull(NatureLivrable::find($natureLivrable->id));
    }
}

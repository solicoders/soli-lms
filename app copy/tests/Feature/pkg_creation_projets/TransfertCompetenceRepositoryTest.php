<?php

namespace Tests\Feature\pkg_creation_projets;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\pkg_creation_projets\Projet;
use App\Models\pkg_competences\Competence;
use App\Models\pkg_competences\Appreciation;
use App\Models\pkg_competences\Technologie;
use App\Models\pkg_creation_projets\TransfertCompetence;
use App\Repositories\pkg_creation_projets\TransfertCompetenceRepository;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class TransfertCompetenceRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker, InteractsWithDatabase;

    protected $transfertCompetenceRepo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->transfertCompetenceRepo = new TransfertCompetenceRepository();
    }

    /**
     * Test creating a transfert competence.
     */
    public function testCreateTransfertCompetence(): void
    {
        $projet = Projet::factory()->create();
        $competence = Competence::factory()->create();
        $appreciation = Appreciation::factory()->create();
        $technologie = Technologie::factory()->create();

        $transfertCompetenceData = [
            'projet_id' => $projet->id,
            'competence_id' => $competence->id,
            'appreciation_id' => $appreciation->id,
            'technologie_id' => $technologie->id
        ];

        $createdTransfertCompetence = $this->transfertCompetenceRepo->create($transfertCompetenceData);
        $this->assertModelExists($createdTransfertCompetence);
        $this->assertEquals($transfertCompetenceData['projet_id'], $createdTransfertCompetence->projet_id);
        $this->assertEquals($transfertCompetenceData['competence_id'], $createdTransfertCompetence->competence_id);
        $this->assertEquals($transfertCompetenceData['appreciation_id'], $createdTransfertCompetence->appreciation_id);
        $this->assertEquals($transfertCompetenceData['technologie_id'], $createdTransfertCompetence->technologie_id);
    }

    /**
     * Test finding a transfert competence.
     */
    public function testFindTransfertCompetence(): void
    {
        $projet = Projet::factory()->create();
        $competence = Competence::factory()->create();
        $appreciation = Appreciation::factory()->create();
        $technologie = Technologie::factory()->create();
        $transfertCompetence = TransfertCompetence::factory()->create([
            'projet_id' => $projet->id,
            'competence_id' => $competence->id,
            'appreciation_id' => $appreciation->id,
            'technologie_id' => $technologie->id
        ]);

        $foundTransfertCompetence = $this->transfertCompetenceRepo->find($transfertCompetence->id);
        $this->assertNotNull($foundTransfertCompetence);
        $this->assertEquals($transfertCompetence->projet_id, $foundTransfertCompetence->projet_id);
    }

    /**
     * Test updating a transfert competence.
     */
    public function testUpdateTransfertCompetence(): void
    {
        $projet = Projet::factory()->create();
        $competence = Competence::factory()->create();
        $appreciation = Appreciation::factory()->create();
        $technologie = Technologie::factory()->create();
        $transfertCompetence = TransfertCompetence::factory()->create([
            'projet_id' => $projet->id,
            'competence_id' => $competence->id,
            'appreciation_id' => $appreciation->id,
            'technologie_id' => $technologie->id
        ]);

        $updateData = [
            'competence_id' => Competence::factory()->create()->id,
            'appreciation_id' => Appreciation::factory()->create()->id
        ];

        $updateResult = $this->transfertCompetenceRepo->update($transfertCompetence->id, $updateData);
        $this->assertTrue($updateResult);

        $updatedTransfertCompetence = TransfertCompetence::find($transfertCompetence->id);
        $this->assertEquals($updateData['competence_id'], $updatedTransfertCompetence->competence_id);
        $this->assertEquals($updateData['appreciation_id'], $updatedTransfertCompetence->appreciation_id);
    }

    /**
     * Test deleting a transfert competence.
     */
    public function testDeleteTransfertCompetence(): void
    {
        $projet = Projet::factory()->create();
        $competence = Competence::factory()->create();
        $appreciation = Appreciation::factory()->create();
        $technologie = Technologie::factory()->create();
        $transfertCompetence = TransfertCompetence::factory()->create([
            'projet_id' => $projet->id,
            'competence_id' => $competence->id,
            'appreciation_id' => $appreciation->id,
            'technologie_id' => $technologie->id
        ]);

        $deleteResult = $this->transfertCompetenceRepo->destroy($transfertCompetence->id);
        $this->assertTrue($deleteResult);
        $this->assertNull(TransfertCompetence::find($transfertCompetence->id));
    }
}

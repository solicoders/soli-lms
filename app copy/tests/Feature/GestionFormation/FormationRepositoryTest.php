<?php

namespace Tests\Feature\GestionFormation;

use Tests\TestCase;
use App\Models\pkg_formations\Formation;
use App\Models\pkg_formations\Formateur;
use App\Repositories\pkg_formations\FormationRepository;
use App\Exceptions\GestionFormations\FormationAlreadyExistException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FormationRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /** @var FormationRepository */
    protected $formationRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->formationRepository = new FormationRepository();
    }

    /** @test */
    public function it_can_create_a_formation()
    {
        // Créez un formateur pour l'utiliser dans le test
        $formateur = Formateur::create([
            'nom' => 'Formateur Test',
        ]);

        $data = [
            'nom' => 'Formation Test',
            'description' => 'Description de la formation test',
            'lien' => 'https://example.com/formation',
            'formateur_id' => $formateur->id, // Utilisez l'ID du formateur créé
        ];

        $formation = $this->formationRepository->create($data);

        $this->assertInstanceOf(Formation::class, $formation);
        $this->assertEquals($data['nom'], $formation->nom);
        $this->assertEquals($data['description'], $formation->description);
        $this->assertEquals($data['lien'], $formation->lien);
        $this->assertEquals($data['formateur_id'], $formation->formateur_id);
    }

    
    public function it_throws_exception_if_formation_already_exists()
    {
        $this->expectException(FormationAlreadyExistException::class);

        // Créez un formateur pour l'utiliser dans le test
        $formateur = Formateur::create([
            'nom' => 'Formateur Test',
        ]);

        $data = [
            'nom' => 'Formation Test',
            'description' => 'Description de la formation test',
            'lien' => 'https://example.com/formation',
            'formateur_id' => $formateur->id, // Utilisez l'ID du formateur créé
        ];

        // Créez une formation avec les mêmes données une première fois
        $this->formationRepository->create($data);

        // Essayez de créer la même formation une deuxième fois
        $this->formationRepository->create($data);
    }
     

/** @test */
public function it_can_delete_a_formation()
{
    // Créer un formateur pour l'utiliser dans le test
    $formateur = Formateur::create([
        'nom' => 'Formateur Test',
    ]);

    // Créer une formation à supprimer
    $formation = Formation::create([
        'nom' => 'Formation à Supprimer',
        'description' => 'Description de la formation à supprimer',
        'lien' => 'https://example.com/formation-a-supprimer',
        'formateur_id' => $formateur->id,
    ]);

    // Appeler la méthode pour supprimer la formation
    $this->formationRepository->delete($formation->id);

    // Vérifier que la formation a été supprimée de la base de données
    $this->assertDatabaseMissing('formations', ['id' => $formation->id]);
}

    /** @test */
    public function it_can_update_a_formation()
    {
        // Créez un formateur pour l'utiliser dans le test
        $formateur = Formateur::create([
            'nom' => 'Formateur Test',
        ]);

        // Créez une formation initiale
        $formationInitiale = Formation::create([
            'nom' => 'Formation Initiale',
            'description' => 'Description de la formation initiale',
            'lien' => 'https://example.com/formation-initiale',
            'formateur_id' => $formateur->id,
        ]);

        // Données de mise à jour
        $dataMiseAJour = [
            'nom' => 'Formation Mise à Jour',
            'description' => 'Description de la formation mise à jour',
            'lien' => 'https://example.com/formation-mise-a-jour',
            'formateur_id' => $formateur->id,
        ];

        // Mettre à jour la formation initiale avec les nouvelles données
        $formationMiseAJour = $this->formationRepository->update($formationInitiale->id, $dataMiseAJour);

        // Vérifier que la formation a été mise à jour correctement
        $this->assertInstanceOf(Formation::class, $formationMiseAJour);
        $this->assertEquals($dataMiseAJour['nom'], $formationMiseAJour->nom);
        $this->assertEquals($dataMiseAJour['description'], $formationMiseAJour->description);
        $this->assertEquals($dataMiseAJour['lien'], $formationMiseAJour->lien);
        $this->assertEquals($dataMiseAJour['formateur_id'], $formationMiseAJour->formateur_id);
    }


}

<?php

namespace Tests\Feature\GestionRH;

use Carbon\Carbon;
use App\Models\GestionRH\Ville;
use App\Repositories\GestionRH\GestionVilleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
class VilleTest extends TestCase
{

    // use DatabaseTransactions;
    protected $VilleRepository;
    protected function setUp(): void
    {
        parent::setUp();
        $this->VilleRepository = new GestionVilleRepository(new Ville());
    }
    
    public function test_create_ville()
    {
        $create_ville = $this->VilleRepository->create([
            'nom' => 'Casablanca',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        $this->assertNotNull($create_ville);
    }

    public function test_update_ville()
    {
        $update_ville = $this->VilleRepository->update(1, [
            'nom' => 'Tanger',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        $this->assertNotNull($update_ville);
    }

    public function test_delete_ville()
    {
        $delete_ville = $this->VilleRepository->destroy(6);
        $this->assertNotNull($delete_ville);
    }
}

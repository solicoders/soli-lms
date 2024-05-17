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
            'nom' => 'Marakkech',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        $this->assertNotNull($create_ville);
    }
}

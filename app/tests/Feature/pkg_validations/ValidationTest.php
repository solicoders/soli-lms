<?php

namespace Tests\Feature\pkg_validations;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\pkg_validations\ValidationsRepository;
use App\Models\pkg_validations\Validation;
use App\Models\pkg_validations\Message;
use App\Exceptions\pkg_validations\ValidationAlreadyExistException;

class ValidationTest extends TestCase
{
    use DatabaseTransactions;

    protected $validationsRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->validationsRepository = new ValidationsRepository();
    }

    /**
     * Test creating a validation with an associated message.
     *
     * @return void
     */
    public function test_Create_With_Message()
    {
        $data = [
            'note' => 'Test Note',
            'transfert_competence_id' => 1,
            'appreciation_id' => 2,
            'realisation_projet_id' => 3,
            'message_title' => 'Test Title',
            'message_description' => 'Test Description'
        ];

        $validation = $this->validationsRepository->createWithMessage($data);

        $this->assertDatabaseHas('validations', [
            'note' => 'Test Note',
            'transfert_competence_id' => 1,
            'appreciation_id' => 1,
            'realisation_projet_id' => 1
        ]);

        $this->assertDatabaseHas('messages', [
            'titre' => 'Test Title',
            'description' => 'Test Description',
            'validation_id' => $validation->id
        ]);
    }

    /**
     * Test handling of duplicate validation creation.
     *
     * @return void
     */
    public function testCreateWithMessageThrowsExceptionForDuplicate()
    {
        $data = [
            'note' => 'Duplicate Note',
            'transfert_competence_id' => 2,
            'appreciation_id' => 2,
            'realisation_projet_id' => 2,
            'message_title' => 'Duplicate Title',
            'message_description' => 'Duplicate Description'
        ];

        // First creation should succeed
        $validation = $this->validationsRepository->createWithMessage($data);

        // Attempt to create a duplicate
        $this->expectException(ValidationAlreadyExistException::class);
        $duplicateValidation = $this->validationsRepository->createWithMessage($data);
    }
}

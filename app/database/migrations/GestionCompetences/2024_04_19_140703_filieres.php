<?php
namespace App\Models\GestionCompetences;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Filieres', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('Description');
            $table->unsignedBigInteger('Module_id');
            $table->foreign('Module_id')->references('id')->on('Modules')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filieres');
    }
};

<?php

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
        Schema::create('realisation_projets', function (Blueprint $table) {
            $table->id();
              // TODO : realisation_projets
            // $table->date('date_debut_realisation');
            // $table->date('date_fin_realisation');
            // $table->foreignId('projet_id')->constrained();
            // $table->foreignId('etat_realisation_projet_id')->constrained();
            // $table->foreignId('apprenant_id')->constrained('apprenants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisation_projets');
    }
};

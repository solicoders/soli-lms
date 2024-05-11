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
        Schema::create('realisation_brief_projets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('brief_projet_id');
            $table->foreign('brief_projet_id')->references('id')->on('brief_projets')->onDelete('cascade');
            $table->unsignedBigInteger('livrable_brief_projets_id');
            $table->foreign('livrable_brief_projets_id')->references('id')->on('livrable_brief_projets')->onDelete('cascade');
            $table->unsignedBigInteger('etat_realisations_id');
            $table->foreign('etat_realisations_id')->references('id')->on('etat_realisations')->onDelete('cascade');
            $table->unsignedBigInteger('affectation_competences_id');
            $table->foreign('affectation_competences_id')->references('id')->on('affectation_competences')->onDelete('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisation_brief_projets');
    }
};
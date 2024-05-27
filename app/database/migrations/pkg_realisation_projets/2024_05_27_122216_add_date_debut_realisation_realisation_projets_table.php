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
        Schema::table('realisation_projets', function (Blueprint $table) {
            $table->date('date_debut_realisation');
            $table->date('date_fin_realisation');
            $table->unsignedBigInteger('projet_id');
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
            $table->unsignedBigInteger('etat_realisation_projet_id');
            $table->foreign('etat_realisation_projet_id')->references('id')->on('etats_realisation_projet')->onDelete('cascade');
            $table->unsignedBigInteger('apprenant_id');
            $table->foreign('apprenant_id')->references('id')->on('apprenants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('realisation_projets', function (Blueprint $table) {
            //
        });
    }
};

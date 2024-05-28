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
        Schema::create('nature_livrables', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
<<<<<<<< HEAD:app/database/migrations/pkg_competences/2024_05_27_091013_create_technologies_table.php
            $table->unsignedBigInteger('competence_id');
            $table->foreign('competence_id')->references('id')->on('competences')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_technologie_id');
            $table->foreign('categorie_technologie_id')->references('id')->on('categorie_technologies')->onDelete('cascade');
========
>>>>>>>> 209b0cdf6bac7548ff9c1acc2494f7d7b70fa32e:app/database/migrations/pkg_creation_projets/2024_05_27_092342_create_nature_livrables_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nature_livrables');
    }
};

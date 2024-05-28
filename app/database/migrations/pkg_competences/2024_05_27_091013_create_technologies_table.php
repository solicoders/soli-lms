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
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->unsignedBigInteger('competence_id');
            $table->foreign('competence_id')->references('id')->on('competences')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_technologie_id');
            $table->foreign('categorie_technologie_id')->references('id')->on('categorie_technologies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologies');
    }
};

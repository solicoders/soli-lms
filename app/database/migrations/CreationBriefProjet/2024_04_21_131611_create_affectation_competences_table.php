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
        Schema::create('affectation_competences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brief_projet_id'); 
            $table->foreign('brief_projet_id')->references('id')->on('brief_projets')->onDelete('cascade');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectation_competences');
    }
};

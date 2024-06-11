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
        Schema::create('technologie_competences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technologie_id');
            $table->foreign('technologie_id')->references('id')->on('technologies')->onDelete('cascade');
            $table->unsignedBigInteger('transfert_competence_id');
            $table->foreign('transfert_competence_id')->references('id')->on('transfert_competences')->onDelete('cascade');        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologie_competences');
    }
};

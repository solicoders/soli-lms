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
        Schema::create('apprenant', function (Blueprint $table) {
            $table->id();
            $table->string('cne');
            $table->Date('date_inscription');
            $table->unsignedBigInteger('lieu_naissance_id');
            $table->unsignedBigInteger('nivaeu_scholaire_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('lieu_naissance_id')->references('id')->on('ville')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('nivaeu_scholaire_id')->references('id')->on('nivaeu_scholaire')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprenant');
    }
};

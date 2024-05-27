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
        Schema::create('validations', function (Blueprint $table) {
            $table->id();
            // TODO : validations
            // $table->float('note');
            // $table->unsignedBigInteger('transfert_competence_id');
            // $table->foreign('transfert_competence_id')->references('id')->on('transfert_competences')->onDelete('cascade');
            // $table->unsignedBigInteger('appreciation_id');
            // $table->foreign('appreciation_id')->references('id')->on('appreciations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validations');
    }
};

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
        Schema::create('niveauscompetenceformateur', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description');
            $table->float('note_max');
            $table->float('note_min');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niveauscompetenceformateur');
    }
};

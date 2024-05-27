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
        Schema::create('personnes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('nom_arab');
            $table->string('prenom_arab');
            $table->date('date_naissance');
            $table->string('type');
            $table->string('tele_num');
            $table->string('rue');
            $table->string('cin');
            $table->unsignedBigInteger('ville_id');
            $table->string('profile_image');
            $table->string('cne');
            $table->Date('date_inscription');
            $table->unsignedBigInteger('lieu_naissance_id');
            $table->unsignedBigInteger('nivaeu_scholaire_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id');
            $table->foreign('lieu_naissance_id')->references('id')->on('villes')->onDelete('cascade');
            $table->unsignedBigInteger('specialite_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('nivaeu_scholaire_id')->references('id')->on('niveau_scholaires')->onDelete('cascade');
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('specialite_id')->references('id')->on('specialites')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groupes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnes');
    }
};

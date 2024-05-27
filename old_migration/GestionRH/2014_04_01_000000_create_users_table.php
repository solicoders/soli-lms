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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('nom_arab');
            $table->string('prenom_arab');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_naissance');
            $table->string('tele_num');
            $table->string('rue');
            $table->string('cin');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('ville_id');
            $table->foreign('ville_id')->references('id')->on('ville')->onDelete('cascade');
            // $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_image');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

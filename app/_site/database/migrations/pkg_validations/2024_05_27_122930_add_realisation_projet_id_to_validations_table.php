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
        Schema::table('validations', function (Blueprint $table) {
            $table->float('note')->after('id'); // Add new columns after the id column
            $table->unsignedBigInteger('transfert_competence_id')->after('note');
            $table->foreign('transfert_competence_id')->references('id')->on('transfert_competences')->onDelete('cascade');
            $table->unsignedBigInteger('appreciation_id')->after('transfert_competence_id');
            $table->foreign('appreciation_id')->references('id')->on('appreciations')->onDelete('cascade');
            $table->unsignedBigInteger('realisation_projet_id')->after('appreciation_id');
            $table->foreign('realisation_projet_id')->references('id')->on('realisation_projets')->onDelete('cascade');
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('validations', function (Blueprint $table) {
            $table->dropForeign(['transfert_competence_id']);
            $table->dropForeign(['appreciation_id']);
            $table->dropForeign(['realisation_projet_id']);
            $table->dropColumn(['note', 'transfert_competence_id', 'appreciation_id', 'realisation_projet_id', 'timestamps']);
        });
    }
};

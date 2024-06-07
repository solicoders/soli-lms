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
        Schema::table('messages', function (Blueprint $table) {
            $table->string('titre')->after('id');
            $table->text('description')->after('titre');
            $table->unsignedBigInteger('validation_id');
            $table->foreign('validation_id')->references('id')->on('validations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['validation_id']);
            $table->dropColumn('validation_id');
            $table->dropColumn('titre');
            $table->dropColumn('description');
        });
    }
};

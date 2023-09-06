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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('condominium_id');
            $table->unsignedBigInteger('operations_id');
            $table->timestamps();

            $table->foreign('condominium_id')->references('id')->on('condominiums');
            $table->foreign('operations_id')->references('id')->on('operations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('areas', function (Blueprint $table) {
            $table->dropForeign(['condominium_id']);
            $table->dropForeign(['operations_id']);
        });

        Schema::dropIfExists('areas');
    }
};
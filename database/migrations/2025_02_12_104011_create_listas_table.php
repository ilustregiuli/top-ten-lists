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
        Schema::create('listas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('pos_01');
            $table->string('pos_02');
            $table->string('pos_03');
            $table->string('pos_04');
            $table->string('pos_05');
            $table->string('pos_06');
            $table->string('pos_07');
            $table->string('pos_08');
            $table->string('pos_09');
            $table->string('pos_10');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listas');
    }
};

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
        Schema::table('listas', function (Blueprint $table) {
            $table->string('pos_01')->nullable()->change();
            $table->string('pos_02')->nullable()->change();
            $table->string('pos_03')->nullable()->change();
            $table->string('pos_04')->nullable()->change();
            $table->string('pos_05')->nullable()->change();
            $table->string('pos_06')->nullable()->change();
            $table->string('pos_07')->nullable()->change();
            $table->string('pos_08')->nullable()->change();
            $table->string('pos_09')->nullable()->change();
            $table->string('pos_10')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listas', function (Blueprint $table) {
            $table->string('pos_01')->nullable(false)->change();
            $table->string('pos_02')->nullable(false)->change();
            $table->string('pos_03')->nullable(false)->change();
            $table->string('pos_04')->nullable(false)->change();
            $table->string('pos_05')->nullable(false)->change();
            $table->string('pos_06')->nullable(false)->change();
            $table->string('pos_07')->nullable(false)->change();
            $table->string('pos_08')->nullable(false)->change();
            $table->string('pos_09')->nullable(false)->change();
            $table->string('pos_10')->nullable(false)->change();
        });
    }
};

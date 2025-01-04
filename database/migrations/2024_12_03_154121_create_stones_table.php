<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stones', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name_fa');
            $table->string('name_en');
            $table->string('image');
            $table->string('tensile_strength_fa');
            $table->string('tensile_strength_en');
            $table->string('water_absorption_rate_fa');
            $table->string('water_absorption_rate_en');
            $table->string('compressive_strength_fa');
            $table->string('compressive_strength_en');
            $table->string('abrasion_resistance_fa');
            $table->string('abrasion_resistance_en');
            $table->string('specific_weight_fa');
            $table->string('specific_weight_en');
            $table->string('failure_mode_fa');
            $table->string('failure_mode_en');
            $table->string('porosity_fa');
            $table->string('porosity_en');
            $table->unsignedBigInteger('stone_type_id');
            $table->foreign('stone_type_id')->references('id')->on('stone_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stones');
    }
};

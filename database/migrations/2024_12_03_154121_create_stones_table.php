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
            $table->string('Tensile_Strength_fa');
            $table->string('Tensile_Strength_en');
            $table->string('Water_Absorption_Rate_fa');
            $table->string('Water_Absorption_Rate_en');
            $table->string('Compressive_Strength_fa');
            $table->string('Compressive_Strength_en');
            $table->string('Abrasion_Resistance_fa');
            $table->string('Abrasion_Resistance_en');
            $table->string('Specific_Weight_fa');
            $table->string('Specific_Weight_en');
            $table->string('Failure_Mode_fa');
            $table->string('Failure_Mode_en');
            $table->string('Porosity_fa');
            $table->string('Porosity_en');
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

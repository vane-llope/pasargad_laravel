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
            $table->string('name');
            $table->string('image');
            $table->string('Tensile_Strength');
            $table->string('Water_Absorption_Rate');
            $table->string('Compressive_Strength');
            $table->string('Abrasion_Resistance');
            $table->string('Specific_Weight');
            $table->string('Failure_Mode');
            $table->string('Porosity');
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

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
        Schema::create('quarries', function (Blueprint $table) {
            $table->id();
            $table->string('name_fa');
            $table->string('name_en');
            $table->json('images');
            $table->string('address_fa');
            $table->string('address_en');
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
        Schema::dropIfExists('quarries');
    }
};

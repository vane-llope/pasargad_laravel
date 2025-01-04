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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title_fa');
            $table->string('title_en');
            $table->longText('summary_fa');
            $table->longText('summary_en');
            $table->longText('description_fa');
            $table->longText('description_en');
            $table->json('images');
            $table->longText('tags');
            $table->unsignedBigInteger('project_type_id');
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade'); // Update this line
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->longText('images');
            $table->string('title_fa');
            $table->string('title_en');
            $table->longText('summary_fa');
            $table->longText('summary_en');
            $table->longText('description_fa');
            $table->longText('description_en');
            $table->longText('tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

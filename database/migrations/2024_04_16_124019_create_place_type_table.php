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
        Schema::create('place_type', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('category')->nullable();
            $table->string('address')->nullable();
            $table->string('capacity')->nullable();
            $table->string('price')->nullable();
            $table->longText('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('position')->nullable();
            $table->string('metatitle')->nullable();
            $table->string('metadescription')->nullable();
            $table->enum('on_home_page',['yes','no'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_type');
    }
};

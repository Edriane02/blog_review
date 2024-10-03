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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('banner')->nullable(); // Banner (picture)
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('genre')->nullable();
            $table->integer('pages')->nullable();
            $table->string('publisher')->nullable();
            $table->string('amazon_link')->nullable();
            $table->string('barnes_noble_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

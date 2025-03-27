<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('featured_author', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('img_banner')->nullable();
            $table->string('headline')->nullable();
            $table->text('body_text')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('featured_author');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeReviewerColumnInReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('reviewer')->change(); // Change to unsigned big integer
        });
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('reviewer', 255)->change(); // Revert back to string if needed
        });
    }
}

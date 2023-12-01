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

        Schema::create('movies', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('movie_poster');
            $table->string('movie_name');        
            $table->string('movie_daterelease');
            $table->string('movie_length');
            $table->string('movie_trailer');
            $table->string('movie_description');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};

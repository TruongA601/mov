<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('theaters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->integer('province');
            $table->integer('district');
            $table->integer('ward');
            $table->string('location');
            $table->integer('totalAuditorium');
            $table->integer('status');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('theaters');
    }
};

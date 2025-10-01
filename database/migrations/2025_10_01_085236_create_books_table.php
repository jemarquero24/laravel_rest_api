<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->integer('publication_year');
            $table->integer('copies_owned');
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

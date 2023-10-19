<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('library_buttons', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->string('text')->nullable();
            $table->string('image')->nullable();
            $table->string('url');
            $table->boolean('target');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_buttons');
    }
};

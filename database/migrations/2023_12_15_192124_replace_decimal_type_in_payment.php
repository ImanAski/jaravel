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
        Schema::table('payment', function (Blueprint $table) {
            $table->decimal('amount', 8, 0)->change(); // Change the decimal definition to have 0 decimal places
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->decimal('amount', 8, 2)->change(); // Change it back to 2 decimal places if you ever need to rollback the migration
        });
    }
};

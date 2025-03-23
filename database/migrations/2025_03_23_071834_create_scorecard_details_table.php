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
        Schema::create('scorecard_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scorecard_id')->constrained('scorecards')->onDelete('cascade');
            $table->foreignId('perspective_id')->constrained('perspective')->onDelete('cascade');
            $table->foreignId('objective_id')->constrained('objective')->onDelete('cascade');
            $table->foreignId('kpi_id')->constrained('kpi')->onDelete('cascade');
            $table->float('baseline')->nullable();
            $table->float('target')->nullable();
            $table->float('weight')->nullable();
            $table->float('realization')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scorecard_details');
    }
};

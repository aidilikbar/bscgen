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
        Schema::table('employees', function (Blueprint $table) {
            // Drop old column
            $table->dropColumn('position_title');

            // Add new foreign key column
            $table->foreignId('position_id')
                ->nullable()
                ->after('name')
                ->constrained('positions')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Remove foreign key column
            $table->dropForeign(['position_id']);
            $table->dropColumn('position_id');

            // Restore original column
            $table->string('position_title')->after('name');
        });
    }
};

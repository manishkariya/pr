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
        if (!Schema::hasColumn('salary', 'employee_id')){

            Schema::table('employee', function (Blueprint $table) {
                $table->string('E_number')->after('id'); // Add column
            });

    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee', function (Blueprint $table) {
            $table->dropUnique(['E_number']);

        });
    }
};

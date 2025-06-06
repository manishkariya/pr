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
        if (!Schema::hasColumn('salary', 'employee_id')) {
            Schema::table('salary', function (Blueprint $table) {
                $table->unsignedBigInteger('employee_id')->nullable()->after('salaryid');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salary', function (Blueprint $table) {

            $table->dropColumn('employee_id');
        });
    }
};

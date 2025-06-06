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
        Schema::create('designation', function (Blueprint $table) {
            $table->increments("desig_id");
            $table->integer("department_id")->unsigned();
            $table->foreign("department_id")->references("depart_id")->on("department");
            $table->string("designationname");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designation');
    }
};

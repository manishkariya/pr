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
        Schema::create('experience', function (Blueprint $table) {
            $table->increments("Ex_id");
            $table->integer("empid")->unsigned();
            $table->foreign("empid")->references("id")->on("employee");
            $table->integer("totalexperience");
            $table->text("role");
            $table->text("company_name");
            $table->date("start_date");
            $table->date("end_date");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience');
    }
};

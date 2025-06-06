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
        Schema::create('employee', function (Blueprint $table) {
            $table->increments("id");
            $table->string("firstname");
            $table->text("middlename");
            $table->text("lastname");
            $table->date("birthdate");
            $table->text("age");
            $table->string("department");
            $table->string("designation");
            $table->string("country");
            $table->string("state");
            $table->string("city");

            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

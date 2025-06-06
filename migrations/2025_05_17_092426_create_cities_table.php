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
        Schema::create('cities', function (Blueprint $table) {
            $table->increments("cityid");
            $table->integer("country_id")->unsigned();
            $table->foreign("country_id")->references("cid")->on("countries");

            $table->integer("stateid")->unsigned();
            $table->foreign("stateid")->references("state_id")->on("states");
            $table->text("cityname");
            $table->softDeletes();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};

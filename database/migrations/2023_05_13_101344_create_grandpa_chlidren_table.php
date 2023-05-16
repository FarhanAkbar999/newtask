<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grandpa_chlidren', function (Blueprint $table) {
            $table->id();
            $table->string('children_name');
            $table->unsignedInteger('grandpa_id')->nullable();
            $table->boolean('is_grandpa')->default(0);
            $table->integer('age')->nullable();
            $table->string('veteran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grandpa_chlidren');
    }
};

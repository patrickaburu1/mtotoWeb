<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildImmunizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_immunizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('immunization_id')->unsigned();
            $table->integer('child_id')->unsigned();
            $table->date('given_at');
            $table->date('next_visit');
            $table->timestamps();
            $table->foreign('child_id')->references('id')->on('children');
            $table->foreign('immunization_id')->references('id')->on('immunizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_immunizations');
    }
}

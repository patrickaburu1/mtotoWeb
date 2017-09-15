<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildDevelopmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_developments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('development_id')->unsigned();
            $table->integer('child_id')->unsigned();
            $table->timestamps();
            //foreign keys
            $table->foreign('development_id')->references('id')->on('developments');
            $table->foreign('child_id')->references('id')->on('children');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_developments');
    }
}

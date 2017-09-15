<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->integer('gender'); //1 male and 2 female
            $table->date('dob');
            $table->double('length');
            $table->double('weight');
            $table->integer('mother_id')->unsigned();
            //$table->foreign('mother_id')->references('id')->on('mothers');
            $table->foreign('mother_id')->references('id')->on('mothers');
            $table->timestamps();
            // $table->foreign('mother_id')->references('id')->on('mothers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children');
    }
}

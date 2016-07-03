<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePimgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pimgs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->unsigned();
            $table->foreign('pid')->references('id')->on('products');
            $table->integer('sn');
            $table->string('url');
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
        Schema::drop('pimgs');
    }
}

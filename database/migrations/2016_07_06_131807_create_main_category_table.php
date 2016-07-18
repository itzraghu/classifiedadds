<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_category', function (Blueprint $table) {
            $table->increments('categoty_id');
            $table->integer('main_categoty_id');
            $table->string('categoty_name');
            $table->string('categoty_icon');
            $table->string('categoty_description');
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
        Schema::drop('main_category');
    }
}

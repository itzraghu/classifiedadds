<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adds_info', function (Blueprint $table) {
            $table->increments('adds_id');
            $table->string('adds_title');
            $table->string('adds_description');
            $table->string('adds_type');
            $table->integer('categoty_id');
            $table->decimal('price',5,2);
            $table->string('seller_name');
            $table->string('seller_email');
            $table->string('seller_phone');
            $table->string('location');
            $table->string('city');
            $table->string('premium_type');
            $table->enum('is_payment',[0,1])->default(0);
            $table->dateTime('expiry_date');
            $table->enum('is_approved',[0,1])->default(0);
            $table->integer('user_id');
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
        Schema::drop('adds_info');
    }
}

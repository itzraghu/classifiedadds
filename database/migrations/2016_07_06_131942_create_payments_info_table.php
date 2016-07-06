<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_info', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->string('payment_mode');
            $table->dateTime('payment_date');
            $table->decimal('payment_amount',5,2);
            $table->integer('payment_by');
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
        Schema::drop('payments_info');
    }
}

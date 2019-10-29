<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('invoice_number');
            $table->text('sum');
            $table->text('date_created');
            $table->text('date_paid')->nullable();
            $table->bigInteger('status_id')->unsigned();
            $table->text('telephone_number');
            $table->string('email', 50);
            $table->text('card_number', 16)->nullable();
        });

           Schema::table('payments', function($table) {
       $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->integer('user_id')->unsigned();
            $table->float('total_price')->defaults(0);
            $table->string('invoice_number');
            $table->enum('status', ['SUBMIT', 'PROCESS', 'FINISH', 'CANCEL']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function(Blueprint $table){
            $table->dropForeign('orders_user_id_foreign');
        });

        Schema::dropIfExists('orders');
    }
}

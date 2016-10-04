<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->string('name');
            $table->integer('term');
            $table->integer('domain');
            $table->float('disk');
            $table->float('traffic');
            $table->double('price', 15, 4);
            $table->string('currency');
            $table->float('discount')->default(0);
            $table->boolean('is_provisioned')->default(0);
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('restrict');
            $table->softDeletes();
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
        Schema::drop('web_orders');
    }
}

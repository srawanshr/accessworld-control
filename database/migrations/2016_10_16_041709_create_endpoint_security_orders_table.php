<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndpointSecurityOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endpoint_security_orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->smallInteger('user_count');
            $table->smallInteger('term')->nullable();
            $table->double('price', 15, 4);
            $table->string('currency', 3);
            $table->float('discount')->default(0);
            $table->boolean('is_provisioned')->default(0);
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('restrict');
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
        Schema::dropIfExists('endpoint_security_orders');
    }
}

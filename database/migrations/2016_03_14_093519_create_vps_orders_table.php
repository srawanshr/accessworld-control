<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpsOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vps_orders', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('operating_system_id')->unsigned();
            $table->integer('data_center_id')->unsigned();
            $table->string('name');
            $table->integer('term')->nullable();
            $table->float('cpu');
            $table->float('ram');
            $table->float('disk');
            $table->float('traffic');
            $table->double('price', 15, 4);
            $table->string('currency');
            $table->float('discount')->default(0);
            $table->boolean('is_trial')->default(0);
            $table->boolean('is_managed')->default(0);
            $table->boolean('is_provisioned')->default(0);
            $table->tinyInteger('additional_ip')->default(0);
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('restrict');
            $table->foreign('operating_system_id')
                ->references('id')
                ->on('operating_systems')
                ->onDelete('cascade');
            $table->foreign('data_center_id')
                ->references('id')
                ->on('data_centers')
                ->onDelete('cascade');
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
        Schema::drop('vps_orders');
    }
}

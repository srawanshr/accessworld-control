<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vps_orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('operating_system_id')->unsigned();
            $table->integer('data_center_id')->unsigned();
            $table->integer('invoice_id')->unsigned();
            $table->integer('vps_package_id')->unsigned()->nullable();
            $table->string('name');
            $table->integer('term');
            $table->float('cpu');
            $table->float('ram');
            $table->float('disk');
            $table->float('traffic');
            $table->double('price', 15, 4);
            $table->float('discount')->default(0);
            $table->boolean('is_ssl_certified')->default(0);
            $table->boolean('is_managed')->default(0);
            $table->tinyint('status')->default(0);
            $table->boolean('is_provisioned')->default(0);
            $table->foreign('operating_system_id')
                ->references('id')
                ->on('operating_systems')
                ->onDelete('restrict');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('restrict');
            $table->foreign('data_center_id')
                ->references('id')
                ->on('data_centers')
                ->onDelete('restrict');
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('restrict');
            $table->foreign('vps_package_id')
                ->references('id')
                ->on('vps_packages')
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
        Schema::drop('vps_orders');
    }
}

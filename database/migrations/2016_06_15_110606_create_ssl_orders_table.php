<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSslOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssl_orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('ssl_product_type_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('invoice_id')->unsigned();
            $table->string('name');
            $table->double('price', 15, 4);
            $table->integer('duration');
            $table->date('start_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->boolean('is_provisioned')->default(0);
            $table->foreign('ssl_product_type_id')
                ->references('id')
                ->on('ssl_product_types')
                ->onDelete('restrict');
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('restrict');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
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
        Schema::drop('ssl_orders');
    }
}

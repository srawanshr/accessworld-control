<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('invoice_id')->unsigned();
            $table->integer('email_package_id')->unsigned()->nullable();
            $table->string('name');
            $table->integer('term');
            $table->integer('domain');
            $table->float('disk');
            $table->float('traffic');
            $table->double('price', 15, 4);
            $table->float('discount')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('restrict');
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('restrict');
            $table->foreign('email_package_id')
                ->references('id')
                ->on('email_packages')
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
        Schema::drop('email_orders');
    }
}

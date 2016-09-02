<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSslProvisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssl_provisions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('ssl_product_type_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('term');
            $table->date('start_date');
            $table->date('expiry_date');
            $table->foreign('ssl_product_type_id')
                ->references('id')
                ->on('ssl_product_types')
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
        Schema::drop('ssl_provisions');
    }
}

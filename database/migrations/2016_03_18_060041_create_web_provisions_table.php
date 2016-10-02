<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebProvisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_provisions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');               
            $table->string('name')->unique();
            $table->integer('customer_id')->unsigned();
            $table->integer('web_order_id')->unsigned();
            $table->integer('provisioned_by')->unsigned();
            $table->integer('domain');
            $table->float('disk');
            $table->float('traffic');
            $table->string('connection_string');
            $table->integer('server_domain_id')->nullable();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('restrict');
            $table->foreign('web_order_id')
                ->references('id')
                ->on('web_orders')
                ->onDelete('restrict');
            $table->foreign('provisioned_by')
                ->references('id')
                ->on('users')
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
        Schema::drop('web_provisions');
    }
}

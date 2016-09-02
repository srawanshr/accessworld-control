<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailProvisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_provisions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');               
            $table->string('name')->unique();
            $table->integer('customer_id')->unsigned();
            $table->integer('email_order_id')->unsigned();
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
            $table->foreign('email_order_id')
                ->references('id')
                ->on('email_orders')
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
        Schema::table('email_provisions',function(Blueprint $table){
            $table->dropForeign('email_provisions_customer_id_foreign');
            $table->dropForeign('email_provisions_email_order_id_foreign');
            $table->dropForeign('email_provisions_provisioned_by_foreign');
        });
        Schema::drop('email_provisions');
    }
}

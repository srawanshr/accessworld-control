<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->date('subscribed_date');
            $table->integer('term');
            $table->date('expiry_date');
            $table->integer('subscribable_id')->unsigned();
            $table->string('subscribable_type');
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
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
        Schema::table('subscriptions',function(Blueprint $table){
            $table->dropForeign('subscriptions_invoice_id_foreign');
        });
        Schema::drop('subscriptions');
    }
}

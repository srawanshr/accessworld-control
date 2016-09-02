<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpsRenewalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('vps_renewals', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('invoice_id')->unsigned();
            $table->integer('vps_provision_id')->unsigned();
            $table->integer('provisioned_by')->unsigned()->nullable();
            $table->integer('term');
            $table->double('price', 15, 4);
            $table->float('discount_percent')->default(0);
            $table->boolean('is_provisioned')->default(0);
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('restrict');
            $table->foreign('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onDelete('restrict');
            $table->foreign('provisioned_by')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');
            $table->foreign('vps_provision_id')
                ->references('id')
                ->on('vps_provisions')
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
        Schema::drop('vps_renewals');
    }
}

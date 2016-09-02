<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpsProvisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vps_provisions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('customer_id')->unsigned();
            $table->integer('vps_order_id')->unsigned();
            $table->integer('provisioned_by')->unsigned();
            $table->integer('operating_system_id')->unsigned();
            $table->integer('data_center_id')->unsigned();
            $table->string('virtual_machine');
            $table->boolean('is_managed')->default(0);
            $table->boolean('is_suspended')->default(0);
            $table->string('server_id');
            $table->string('password')->nullable();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('restrict');
            $table->foreign('provisioned_by')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');
            $table->foreign('vps_order_id')
                ->references('id')
                ->on('vps_orders')
                ->onDelete('restrict');
            $table->foreign('operating_system_id')
                ->references('id')
                ->on('operating_systems')
                ->onDelete('restrict');
            $table->foreign('data_center_id')
                ->references('id')
                ->on('data_centers')
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
        Schema::table('vps_provisions',function(Blueprint $table){
            $table->dropForeign('vps_provisions_customer_id_foreign');
            $table->dropForeign('vps_provisions_provisioned_by_foreign');
            $table->dropForeign('vps_provisions_vps_order_id_foreign');
            $table->dropForeign('vps_provisions_operating_system_id_foreign');
            $table->dropForeign('vps_provisions_data_center_id_foreign');
        });
        Schema::drop('vps_provisions');
    }
}

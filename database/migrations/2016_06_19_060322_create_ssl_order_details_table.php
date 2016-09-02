<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSslOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssl_order_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('ssl_order_id')->unsigned();
            $table->text('csr');
            $table->string('osrs_order_id');
            $table->string('domain')->nullable();
            $table->string('admin_first_name');
            $table->string('admin_last_name');
            $table->string('admin_address1');
            $table->string('admin_city');
            $table->string('admin_country');
            $table->string('admin_state');
            $table->string('admin_postal_code');
            $table->string('admin_phone');
            $table->string('admin_email');
            $table->string('organization_first_name');
            $table->string('organization_last_name');
            $table->string('organization_org_name');
            $table->string('organization_address1');
            $table->string('organization_city');
            $table->string('organization_country');
            $table->string('organization_state');
            $table->string('organization_postal_code');
            $table->string('organization_phone');
            $table->string('organization_email');
            $table->string('billing_first_name');
            $table->string('billing_last_name');
            $table->string('billing_address1');
            $table->string('billing_city');
            $table->string('billing_country');
            $table->string('billing_state');
            $table->string('billing_postal_code');
            $table->string('billing_phone');
            $table->string('billing_email');
            $table->string('tech_first_name');
            $table->string('tech_last_name');
            $table->string('tech_address1');
            $table->string('tech_city');
            $table->string('tech_country');
            $table->string('tech_state');
            $table->string('tech_postal_code');
            $table->string('tech_phone');
            $table->string('tech_email');
            $table->string('signer_first_name');
            $table->string('signer_last_name');
            $table->string('signer_address1');
            $table->string('signer_city');
            $table->string('signer_country');
            $table->string('signer_state');
            $table->string('signer_postal_code');
            $table->string('signer_phone');
            $table->string('signer_email');
            $table->foreign('ssl_order_id')
                ->references('id')
                ->on('ssl_orders')
                ->onDelete('restrict');
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
        Schema::drop('ssl_order_details');
    }
}

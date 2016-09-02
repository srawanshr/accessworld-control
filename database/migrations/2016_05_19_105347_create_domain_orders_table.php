<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('invoice_id')->unsigned();
            $table->integer('osrs_order_id')->nullable();
            $table->integer('duration');
            $table->string('domain')->nullable();
            $table->string('owner_first_name');
            $table->string('owner_last_name');
            $table->string('owner_org_name');
            $table->string('owner_address1');
            $table->string('owner_city');
            $table->string('owner_country');
            $table->string('owner_state');
            $table->string('owner_postal_code');
            $table->string('owner_phone');
            $table->string('owner_email');
            $table->string('admin_first_name');
            $table->string('admin_last_name');
            $table->string('admin_org_name');
            $table->string('admin_address1');
            $table->string('admin_city');
            $table->string('admin_country');
            $table->string('admin_state');
            $table->string('admin_postal_code');
            $table->string('admin_phone');
            $table->string('admin_email');
            $table->string('billing_first_name');
            $table->string('billing_last_name');
            $table->string('billing_org_name');
            $table->string('billing_address1');
            $table->string('billing_city');
            $table->string('billing_country');
            $table->string('billing_state');
            $table->string('billing_postal_code');
            $table->string('billing_phone');
            $table->string('billing_email');
            $table->string('tech_first_name');
            $table->string('tech_last_name');
            $table->string('tech_org_name');
            $table->string('tech_address1');
            $table->string('tech_city');
            $table->string('tech_country');
            $table->string('tech_state');
            $table->string('tech_postal_code');
            $table->string('tech_phone');
            $table->string('tech_email');
            $table->string('name_server_1');
            $table->string('name_server_2');
            $table->string('reg_date');
            $table->string('exp_date');
            $table->double('price', 15, 4);
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('restrict');
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
         Schema::drop('domain_orders');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subnets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('subnet')->unique();
            $table->integer('serial');
            $table->integer('lease_time');
            $table->string('gateway');
            $table->string('subnet_mask');
            $table->string('broadcast_address');
            $table->string('ntp_servers')->nullable();
            $table->string('domain_name_servers');
            $table->string('domain_name');
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
        Schema::drop('subnets');
    }
}

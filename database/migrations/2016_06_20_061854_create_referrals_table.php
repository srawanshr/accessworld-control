<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('redemption_id')->unsigned()->nullable();
            $table->integer('verified_by')->unsigned()->nullable();
            $table->string('referred_customer_name');
            $table->string('referred_customer_org');
            $table->string('referred_customer_email')->unique();
            $table->string('referred_customer_phone_1')->unique();
            $table->string('referred_customer_phone_2')->unique();
            $table->string('referred_customer_address');
            $table->string('referred_customer_website');
            $table->string('services');
            $table->string('comment');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('verified_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('redemption_id')->references('id')->on('redemptions')->onDelete('cascade');
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
        Schema::drop('referrals');
    }
}

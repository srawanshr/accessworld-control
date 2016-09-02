<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreeDnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_dns', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('verified_by')->unsigned()->nullable();
            $table->string('domain');
            $table->string('admin_email')->nullable();
            $table->string('ip')->nullable();
            $table->string('mx')->nullable();
            $table->string('verification_code')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_configured')->default(0);
            $table->date('requested_date');
            $table->date('verified_date')->nullable();
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('restrict');
            $table->foreign('verified_by')
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
        Schema::table('free_dns', function (Blueprint $table) {
            $table->dropForeign('free_dns_customer_id_foreign');
            $table->dropForeign('free_dns_verified_by_foreign');
        });
        Schema::drop('free_dns');
    }
}

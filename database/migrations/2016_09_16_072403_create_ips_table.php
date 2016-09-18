<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ips', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('subnet_id')->unsigned()->nullable();
            $table->string('ip')->unique();
            $table->string('mac')->nullable()->unique();
            $table->string('hostname')->nullable();
            $table->boolean('is_used')->default(0);
            $table->foreign('subnet_id')
                ->references('id')
                ->on('subnets')
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
        Schema::dropIfExists('ips');
    }
}

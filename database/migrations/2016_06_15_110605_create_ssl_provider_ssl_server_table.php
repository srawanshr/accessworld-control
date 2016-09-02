<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSslProviderSslServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssl_provider_ssl_server', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('ssl_provider_id')->unsigned();
            $table->integer('ssl_server_id')->unsigned();
            $table->foreign('ssl_provider_id')
                ->references('id')
                ->on('ssl_providers')
                ->onDelete('cascade');
            $table->foreign('ssl_server_id')
                ->references('id')
                ->on('ssl_servers')
                ->onDelete('cascade');
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
        Schema::drop('ssl_provider_ssl_server');
    }
}

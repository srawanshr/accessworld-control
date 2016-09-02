<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSslProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssl_product_types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('ssl_provider_id')->unsigned();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('term');
            $table->string('contact_set');
            $table->float('price');
            $table->boolean('is_vetted')->default(0);
            $table->foreign('ssl_provider_id')
                ->references('id')
                ->on('ssl_providers')
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
        Schema::drop('ssl_product_types');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_service', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->text('description')->nullable();
            $table->boolean('is_published');
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('restrict');
            $table->foreign('service_id')
                ->references('id')
                ->on('services')
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
        Schema::dropIfExists('country_service');
    }
}

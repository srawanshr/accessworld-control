<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubMenusTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menus', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('slug')->unique();
            $table->integer('menu_id')->unsigned()->index();
            $table->string('name');
            $table->text('url');
            $table->integer('order');
            $table->string('icon')->nullable();
            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
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
        Schema::dropIfExists('sub_menus');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_description');
            $table->text('content_raw')->nullable();
            $table->text('content_html')->nullable();
            $table->integer('parent_page_id')->nullable()->unsinged();
            $table->boolean('is_published')->default(0);
            $table->foreign('patent_page_id')
                ->references('id')
                ->on('pages')
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
        Schema::drop('pages');
    }
}

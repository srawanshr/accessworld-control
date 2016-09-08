<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalVpsProvisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_vps_provisions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->integer('provisioned_by')->unsigned();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('operating_system_id')->unsigned();
            $table->integer('data_center_id')->unsigned();
            $table->string('virtual_machine');
            $table->string('uuid');
            $table->float('cpu');
            $table->float('ram');
            $table->float('disk');
            $table->float('traffic');
            $table->string('vdi_uuid');
            $table->string('server_id');
            $table->datetime('start_date');
            $table->datetime('expiry_date')->nullable();
            $table->boolean('is_suspended')->default(0);
            $table->foreign('provisioned_by')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');
            $table->foreign('operating_system_id')
                ->references('id')
                ->on('operating_systems')
                ->onDelete('restrict');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('restrict');
            $table->foreign('data_center_id')
                ->references('id')
                ->on('data_centers')
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
        Schema::dropIfExists('internal_vps_provisions');
    }
}

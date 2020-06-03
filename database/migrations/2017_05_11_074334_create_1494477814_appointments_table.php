<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1494477814AppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('appointments')) {
            Schema::create('appointments', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('salle_id')->unsigned()->nullable();
                $table->foreign('salle_id', '35989_5913ebf64ed0b')->references('id')->on('salles')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '35989_5913ebf652b9b')->references('id')->on('users')->onDelete('cascade');
                $table->datetime('start_time')->nullable();
                $table->datetime('finish_time')->nullable();
                $table->text('comments')->nullable();
                $table->timestamps();
                $table->softDeletes();
                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}

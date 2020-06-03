<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prixes', function (Blueprint $table) {
            $table->increments('id');
                $table->integer('salle_id')->unsigned()->nullable();
                $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade');
                $table->integer('type_id')->unsigned()->nullable();
                $table->foreign('type_id')->references('id')->on('type_entreprises')->onDelete('cascade');
                $table->integer('timing_id')->unsigned()->nullable();
                $table->foreign('timing_id')->references('id')->on('timings')->onDelete('cascade');
                $table->text('titre')->nullable();
                $table->text('prix')->nullable();
                $table->timestamps();
                $table->softDeletes();
                $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prixes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('raisonSociale');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('type_entreprises')->onDelete('cascade');
            $table->string('objetReservation');
            $table->text('description');
            $table->string('email');
            $table->string('tel');
            $table->date('datedebut');
            $table->date('datefin');
            $table->integer('timing_id')->unsigned();
            $table->foreign('timing_id')->references('id')->on('timings')->onDelete('cascade');
            $table->time('heuredebut')->nullable();
            $table->time('heurefin')->nullable();
            $table->integer('salle_id')->unsigned();
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
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
        Schema::dropIfExists('demandes');
    }
}

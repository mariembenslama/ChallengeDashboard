<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->integer('idC');
            $table->integer('idG');
            $table->primary(['idC', 'idG']);

            $table->boolean('codeSubmitted');
            $table->timestamp('submittedAt');
            $table->text('codeParticipant');
            $table->boolean('winner');

            $table->foreign('idG')->references('id')->on('guests');
            $table->foreign('idC')->references('id')->on('challenges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}

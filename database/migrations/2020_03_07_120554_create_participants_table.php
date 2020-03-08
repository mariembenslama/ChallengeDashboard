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
            $table->integer('idGuest');
            $table->integer('idChallenge');
            $table->primary(['idGuest', 'idChallenge']);

            $table->boolean('codeSubmitted');
            $table->timestamp('submittedAt');
            $table->text('codeParticipant');
            $table->boolean('winner');

            $table->foreign('idGuest')->references('idGuest')->on('guests');
            $table->foreign('idChallenge')->references('idChallenge')->on('challenges');
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

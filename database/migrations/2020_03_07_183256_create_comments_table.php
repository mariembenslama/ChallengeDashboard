<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('idNonGuest');
            $table->integer('idChallenge');
            $table->primary(['idNonGuest', 'idChallenge']);

            $table->string('comment');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');

            $table->foreign('idNonGuest')->references('idNonGuest')->on('non_guests');
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
        Schema::dropIfExists('comments');
    }
}

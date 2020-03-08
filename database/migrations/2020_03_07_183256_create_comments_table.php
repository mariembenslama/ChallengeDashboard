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
            $table->increments('idComment');

            $table->string('nameNonGuest');
            $table->string('emailNonGuest')->unique();
            $table->string('comment');

            $table->timestamp('created_at');
            $table->timestamp('updated_at');

            $table->integer('idChallenge');
            $table->foreign('idChallenge')
                  ->references('idChallenge')
                  ->on('challenges')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

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

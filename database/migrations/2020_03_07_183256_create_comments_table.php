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
            $table->increments('id');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('comment');

            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->integer('idC');
            $table->foreign('idC')
                  ->references('id')
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

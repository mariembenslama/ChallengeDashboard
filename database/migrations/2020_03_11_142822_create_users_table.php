<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
            $table->string('email');
            $table->string('password'); 
            $table->rememberToken();
            $table->string('role')->default('Guest');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        
        });
        DB::table('users')->insert(
            array(
                'name' => 'admin',
                'email' => 'admin@domain.com',
                'password' => '$2y$10$mrVUMQ3A0EgO52krioc7m.XXVfkVWjQRbF.F1ilZSrVWB7aKkhOXq',
                'role' => 'Admin'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

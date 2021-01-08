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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
           
            $table->timestamps();
            //$table->bigIncrements('emp_id');
           
            $table->string('last_name');
            $table->string('mobile');
            $table->date('dob');
            $table->string('gender');
            $table->text('address');
            $table->string('city');
            $table->string('user_type')->default("normal");
          
            
            // $table->bigInteger('manager_id')->nullable();
            // $table->foreign('manager_id')->references('id')
            //     ->on('users');

                $table->foreignId('manager_id')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
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

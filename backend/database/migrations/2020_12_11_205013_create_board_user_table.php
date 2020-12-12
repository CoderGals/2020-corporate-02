<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_user', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('board_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('board_id')->references('id')->on('boards');
            $table->enum('role', ['author', 'contributor', 'viewer']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_user');
    }
}

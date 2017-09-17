<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('comments', function (Blueprint $table) {

                $table->integer('ticket_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                 $table->foreign('ticket_id')->references('id')->on('tickets');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

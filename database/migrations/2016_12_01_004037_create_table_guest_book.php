<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGuestBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('guestbook', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('address');
            $table->text('phone');
            $table->text('note');
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
        Schema::drop('guestbook');
    }
}

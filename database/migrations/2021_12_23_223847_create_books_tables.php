<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            //staff
            $table->string('username');
            $table->integer('staff_nip');
            $table->text('installation');

            //book
            $table->date('date_start');
            $table->string('time_start');
            $table->string('time_finish');
            $table->string('topic');
            $table->integer('entrant');
            $table->string('type_meeting');
            $table->integer('room_id');
            $table->boolean('approved')->default(false);
            $table->text('reject_note')->nullable();
            $table->string('color');
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
        Schema::dropIfExists('books');
    }
}

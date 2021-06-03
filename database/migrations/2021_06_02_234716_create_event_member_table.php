<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_member', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');

            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');

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
        Schema::dropIfExists('event_member');
    }
}

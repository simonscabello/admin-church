<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('relationship_status_id')->nullable();
            $table->foreign('relationship_status_id')->references('id')->on('relationship_statuses');

            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id')->references('id')->on('genders');

            $table->string('name');
            $table->string('birth_place');
            $table->date('birth_day');
            $table->string('cpf');
            $table->string('rg');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('conversion_date')->nullable();
            $table->date('baptism_day')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}

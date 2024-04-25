<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();

            $table->string('group_id');

            $table->string('day');
            $table->string('title');
            $table->string('time_start');
            $table->string('time_end');
            $table->string('corps');
            $table->integer('audience');
            $table->string('lesson_type');
            $table->string('teacher');
            $table->softDeletes();
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
        Schema::dropIfExists('timetables');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStdParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('std_parents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id');
            $table->string('name');
            $table->string('job');
            $table->string('parent_type');
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
        Schema::dropIfExists('std_parents');
    }
}

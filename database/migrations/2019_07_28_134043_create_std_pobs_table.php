<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStdPobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('std_pobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id');
            $table->string('village');
            $table->string('district');
            $table->string('commune');
            $table->string('province');
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
        Schema::dropIfExists('std_pobs');
    }
}

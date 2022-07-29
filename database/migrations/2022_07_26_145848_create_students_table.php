<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedBigInteger('school_id');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('school_id')
                ->references('id')
                ->on('schools');
        });
    }
}

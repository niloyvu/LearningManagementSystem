<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('links'); 
            $table->string('description');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('exam_id')->nullable(); 
            $table->unsignedBigInteger('lead_id')->nullable(); 
            $table->unsignedBigInteger('curriculum_id')->nullable();


            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->foreign('curriculum_id')->references('id')->on('curriculums')->onDelete('cascade');

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
        Schema::dropIfExists('notes');
    }
}

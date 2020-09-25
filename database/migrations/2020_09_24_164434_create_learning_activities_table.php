<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->date('start_date');
            $table->date('end_date');
            $table->bigInteger('method_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('method_id')->references('id')->on('methods')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning_activities');
    }
}

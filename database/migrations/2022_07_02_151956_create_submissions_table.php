<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('submissions', function (Blueprint $table) {

            $table->id();
            $table->string('name')->index();
            $table->string('email')->index();
            $table->string('instagram')->nullable();
            $table->string('make')->index();
            $table->string('model')->index();
            $table->string('year')->index();
            $table->string('engine_type')->index();
            $table->string('bumper_position')->index();
            $table->string('bumper_type')->index();
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

        Schema::dropIfExists('submissions');
    }

}

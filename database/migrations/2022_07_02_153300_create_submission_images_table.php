<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionImagesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('submission_images', function (Blueprint $table) {

            $table->id();
            $table->foreignId('submission_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('image_name');
            $table->smallInteger('approved')->index();
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

        Schema::dropIfExists('submission_images');
    }

}

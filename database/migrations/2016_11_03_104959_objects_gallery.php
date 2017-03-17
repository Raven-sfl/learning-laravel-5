<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ObjectsGallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects_gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('object_id')->unsigned();
            $table->string('gallery_img');
            $table->string('gallery_alt');
            $table->string('gallery_title');
            $table->timestamps();

            $table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('objects_gallery');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_attributes', function (Blueprint $table) {
            $table->id();
            $table->uuid('content_id');
            $table->string('type');
            $table->string('attribute')->nullable();
            $table->text('value')->nullable();
            $table->timestamps();

            $table->foreign('content_id')->references('id')->on('pages_contents')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_attributes');
    }
}
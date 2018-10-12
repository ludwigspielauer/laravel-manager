<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('projekt_id')->unsigned();
            $table->string('titel');
            $table->string('url')->nullable();
            $table->text('beschreibung')->nullable();
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
        Schema::dropIfExists('seites');
    }
}

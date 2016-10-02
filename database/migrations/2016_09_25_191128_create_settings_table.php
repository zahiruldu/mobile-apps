<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function(Blueprint $table){
            $table->increments('id');
            $table->string('lang');
            $table->string('home');
            $table->string('words');
            $table->text('about');
            $table->string('search');
            $table->string('more');
            $table->string('default_lang');
            $table->string('feedback');
            $table->string('add_word');
            $table->string('update');
            $table->string('contributors');
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
        Schema::drop('settings');
    }
}

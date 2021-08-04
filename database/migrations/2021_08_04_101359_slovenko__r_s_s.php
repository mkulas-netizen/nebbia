<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SlovenkoRSS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slovenko', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('link');
            $table->text('description');
            $table->string('read')->nullable();
            $table->string('category')->nullable();
            $table->datetime('pubDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

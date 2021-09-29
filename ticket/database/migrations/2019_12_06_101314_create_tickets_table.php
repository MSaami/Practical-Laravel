<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('title');
            $table->text('text');
            $table->tinyInteger('priority')->comment('0 : low, 1: mid, 2: high');
            $table->tinyInteger('status')->comment('0: created, 1: replied, 2: closed');
            $table->string('file_path')->nullable();
            $table->tinyInteger('department')->comment('0: support, 1: tech,2: financial');
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
        Schema::dropIfExists('tickets');
    }
}

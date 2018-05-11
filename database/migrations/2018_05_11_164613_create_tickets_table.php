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
            $table->increments('id');
            $table->unsignedInteger('creator_id');
            $table->unsignedInteger('editor_id');
            $table->unsignedInteger('customer_id');
            $table->string('title');
            $table->text('body');
            $table->timestamps();

            $table->foreign('creator_id')
                ->references('id')
                ->on('users');

            $table->foreign('editor_id')
                ->references('id')
                ->on('users');

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers');
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

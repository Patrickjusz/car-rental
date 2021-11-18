<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('amount')->default(1); //@TODO: remove
            $table->integer('key')->nullable();
            $table->string('type')->nullable();
            $table->enum('state', ['active', 'inactive']);
            $table->softDeletes();
            $table->timestamps();

            /**
             * @TODO Only for the recruitment task (admin ID).
             * $table->integer('user_id');
             * $table->foreign('user_id')->references('id')->on('users');
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

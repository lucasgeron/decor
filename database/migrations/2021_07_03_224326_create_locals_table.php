<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(0);
            $table->string('title', '110')->unique();
            $table->string('address', '255')->nullable();
            $table->integer('number')->nullable();
            $table->string('district', '255')->nullable();
            $table->string('city', '255')->nullable();
            $table->string('cep', '8')->nullable();
            $table->string('phone1', '10')->nullable();
            $table->string('phone2', '11')->nullable();
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
        Schema::dropIfExists('locals');
    }
}

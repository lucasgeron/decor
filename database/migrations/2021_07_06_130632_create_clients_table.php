<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', '255')->unique();
            $table->string('address', '255')->nullable();
            $table->string('number', '15')->nullable();
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
        Schema::dropIfExists('clients');
    }
}

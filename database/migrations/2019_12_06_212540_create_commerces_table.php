<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commerces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->longText('descripcion')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('plan_id');
            $table->enum('state',['0','1','2'])->default('0');
            $table->enum('mp',['0','1'])->default('0');
            $table->enum('sinTACC',['0','1'])->default('0');
            $table->integer('tables')->unsigned();
            $table->string('ubicacion')->nullable();
            $table->string('latitude')->unique();
            $table->string('longitude')->unique();
            $table->string('locality')->nullable();
            $table->string('subAdministrativeArea')->nullable();
            $table->string('logo')->nullable();
            $table->string('portada')->nullable();
            $table->timestamps();

            //llaves foraneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commerces');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('state',['0','1','2'])->default('0');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->longText('descripcion');
            $table->float('precio', 8, 2)->unsigned();
            $table->decimal('descuento',2,0)->unsigned();
            $table->float('precioDescuento', 8, 2)->default(0)->unsigned();
            $table->unsignedBigInteger('commerce_id');
            $table->unsignedBigInteger('category_id');
            

            //llaves foraneas
            $table->foreign('commerce_id')->references('id')->on('commerces')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}

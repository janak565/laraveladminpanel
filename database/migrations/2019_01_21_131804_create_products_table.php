<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('product_name',191);
            $table->string('product_code',191);
            $table->string('product_color',191);
            $table->text('description');
            $table->integer('category_id');
            $table->double('price', 8, 2);
            $table->text('image'); 
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
           //$table->foreign('category_id')->references('id')->on('categories');
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

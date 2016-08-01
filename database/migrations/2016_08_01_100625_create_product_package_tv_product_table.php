<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPackageTvProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_package_tv_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tv_product_id')->unsigned()->index();
            $table->foreign('tv_product_id')->references('id')->on('tv_products')->onDelete('cascade');
            
            $table->integer('product_package_id')->unsigned()->index();
            $table->foreign('product_package_id')->references('id')->on('product_packages')->onDelete('cascade');
            
            $table->decimal('price', 5, 2);
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
        Schema::drop('product_package_tv_product');
    }
}

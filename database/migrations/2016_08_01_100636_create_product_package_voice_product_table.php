<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPackageVoiceProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_package_voice_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voice_product_id')->unsigned()->index();
            $table->foreign('voice_product_id')->references('id')->on('voice_products')->onDelete('cascade');
            
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
        Schema::drop('product_package_voice_product');
    }
}

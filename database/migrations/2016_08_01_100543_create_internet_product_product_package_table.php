<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternetProductProductPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internet_product_product_package', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('internet_product_id')->unsigned()->index();
            $table->foreign('internet_product_id')->references('id')->on('internet_products')->onDelete('cascade');
            
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
        Schema::drop('internet_product_product_package');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementLengthProductPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreement_length_product_package', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('agreement_length_id')->unsigned()->index();
            $table->foreign('agreement_length_id')->references('id')->on('agreement_lengths')->onDelete('cascade');
            
            $table->integer('product_package_id')->unsigned()->index();
            $table->foreign('product_package_id')->references('id')->on('product_packages')->onDelete('cascade');
            
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
        Schema::drop('agreement_length_product_package');
    }
}

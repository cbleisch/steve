<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer');
            $table->integer('product_package_id');
            $table->integer('agreement_length_id');
            $table->integer('internet_product_id');
            $table->integer('tv_product_id');
            $table->integer('voice_product_id');
            $table->integer('static_ip_product_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proposals');
    }
}

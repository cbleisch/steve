<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticIpProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_ip_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->decimal('spp', 5, 2);
            $table->decimal('dpp', 5, 2);
            $table->decimal('tpp', 5, 2);
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
        Schema::drop('static_ip_products');
    }
}

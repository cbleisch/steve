<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->decimal('voice_lines_under_four_price', 5, 2);
            $table->decimal('voice_lines_over_four_price', 5, 2);
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
        Schema::drop('product_packages');
    }
}

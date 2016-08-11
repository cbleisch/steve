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
            $table->decimal('internet_product_price', 5, 2);
            $table->decimal('internet_product_price_extended', 5, 2);
            $table->decimal('modem_rental_price', 5, 2);
            $table->decimal('modem_rental_price_extended', 5, 2);
            $table->integer('static_ip_product_id');
            $table->decimal('static_ip_product_price', 5, 2);
            $table->decimal('static_ip_product_price_extended', 5, 2);
            $table->integer('voice_lines_under_four_qty');
            $table->decimal('voice_lines_under_four_price', 5, 2);
            $table->decimal('voice_lines_under_four_price_extended', 5, 2);
            $table->integer('voice_lines_over_four_qty');
            $table->decimal('voice_lines_over_four_price', 5, 2);
            $table->decimal('voice_lines_over_four_price_extended', 5, 2);
            $table->integer('tv_product_id');
            $table->decimal('tv_product_price', 5, 2);
            $table->decimal('tv_product_price_extended', 5, 2);

            $table->integer('additional_tv_outlets_qty');
            $table->decimal('additional_tv_outlets_price', 5, 2);
            $table->decimal('additional_tv_outlets_price_extended', 5, 2);

            $table->integer('additional_hd_outlets_qty');
            $table->decimal('additional_hd_outlets_price', 5, 2);
            $table->decimal('additional_hd_outlets_price_extended', 5, 2);
            
            $table->decimal('standard_installation_fee_price', 5, 2);
            $table->decimal('standard_installation_fee_price_extended', 5, 2);
            $table->integer('phone_activation_qty');
            $table->decimal('phone_activation_price', 5, 2);
            $table->decimal('phone_activation_price_extended', 5, 2);
            $table->decimal('total_monthly_charges', 5, 2);
            $table->decimal('total_one_time_charges', 5, 2);
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

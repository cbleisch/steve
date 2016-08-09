<?php

use Illuminate\Database\Seeder;

class ProductPackageTableSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        App\Models\ProductPackage::create( [
            'id'                            => '1',
            'name'                          => 'Single Play',
            'voice_lines_under_four_price'  => '64.95',
            'voice_lines_over_four_price'   => '64.95',
            'phone_activation_fee'          => '29.95'
        ]);

        App\Models\ProductPackage::create( [
            'id'                            => '2',
            'name'                          => 'Double Play',
            'voice_lines_under_four_price'  => '29.95',
            'voice_lines_over_four_price'   => '24.95',
            'phone_activation_fee'          => '29.95'
        ]);

        App\Models\ProductPackage::create( [
            'id'                            => '3',
            'name'                          => 'Triple Play',
            'voice_lines_under_four_price'  => '29.95',
            'voice_lines_over_four_price'   => '24.95',
            'phone_activation_fee'          => '29.95'
        ]);
    }
}

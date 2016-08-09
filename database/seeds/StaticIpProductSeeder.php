<?php

use Illuminate\Database\Seeder;

class StaticIpProductTableSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        App\Models\StaticIpProduct::create( [
            'id'          => '1',
            'name'        => '0'
        ]);
        
        App\Models\StaticIpProduct::create( [
            'id'          => '2',
            'name'        => '1'
        ]);

        App\Models\StaticIpProduct::create( [
            'id'          => '3',
            'name'        => '5'
        ]);

        App\Models\StaticIpProduct::create( [
            'id'          => '4',
            'name'        => '13'
        ]);
    }

}

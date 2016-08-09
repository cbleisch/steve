<?php

use Illuminate\Database\Seeder;

class TvProductTableSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        App\Models\TvProduct::create( [
            'id'          => '1',
            'name'        => 'None'
        ]);
        
        App\Models\TvProduct::create( [
            'id'          => '2',
            'name'        => 'Digital Basic'
        ]);

        App\Models\TvProduct::create( [
            'id'          => '3',
            'name'        => 'Digital Select'
        ]);

        App\Models\TvProduct::create( [
            'id'          => '4',
            'name'        => 'Digital Variety'
        ]);

        App\Models\TvProduct::create( [
            'id'          => '5',
            'name'        => 'Digital Standard'
        ]);

        App\Models\TvProduct::create( [
            'id'          => '6',
            'name'        => 'Digital Preferred'
        ]);
    }
}

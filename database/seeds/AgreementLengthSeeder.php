<?php

use Illuminate\Database\Seeder;

class AgreementLengthTableSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        App\Models\AgreementLength::create( [
            'id'          => '1',
            'name'        => '1 Year'
        ]);
        
        App\Models\AgreementLength::create( [
            'id'          => '2',
            'name'        => '2 Years'
        ]);

        App\Models\AgreementLength::create( [
            'id'          => '3',
            'name'        => '3 Years'
        ]);
    }

}

<?php

use Illuminate\Database\Seeder;

class InternetProductTableSeeder extends Seeder {

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        App\Models\InternetProduct::create( [
            'id'                    => '1',
            'name'                  => 'None',
            'modem_rental_price'    => '14.95'
        ]);
        
        App\Models\InternetProduct::create( [
            'id'                    => '2',
            'name'                  => 'Basic: 1.5/0.75',
            'modem_rental_price'    => '14.95'
        ]);

        App\Models\InternetProduct::create( [
            'id'                    => '3',
            'name'                  => 'Starter: 16/3',
            'modem_rental_price'    => '14.95'
        ]);

        App\Models\InternetProduct::create( [
            'id'                    => '4',
            'name'                  => 'Deluxe: 25/10',
            'modem_rental_price'    => '14.95'
        ]);

        App\Models\InternetProduct::create( [
            'id'                    => '5',
            'name'                  => 'Deluxe: 50/10',
            'modem_rental_price'    => '14.95'
        ]);

        App\Models\InternetProduct::create( [
            'id'                    => '6',
            'name'                  => 'Deluxe: 75/15',
            'modem_rental_price'    => '14.95'
        ]);

        App\Models\InternetProduct::create( [
            'id'                    => '7',
            'name'                  => 'Deluxe: 100/20',
            'modem_rental_price'    => '14.95'
        ]);

        App\Models\InternetProduct::create( [
            'id'                    => '8',
            'name'                  => 'Deluxe: 150/20',
            'modem_rental_price'    => '14.95'
        ]);
    }

}

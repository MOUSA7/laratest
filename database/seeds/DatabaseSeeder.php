<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $counteries = ['Palestine','Egypt','Lebanon','Syria'];
        foreach ($counteries as $cou){
            \App\Country::create(['name'=>$cou]);
        }
        $cities = ['jnien','gaza','cairo','Dumshuq'];
        foreach ($cities as $cou){
            \App\City::create(['name'=>$cou,'country_id'=>rand(1,5)]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class levelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = array(
            array('name'=>'NEWBIE' , 'total_deposits' =>  '0', 'bonous_percen'    => '0'),
            array('name'=>'JUNIOR' , 'total_deposits' =>  '1000', 'bonous_percen'    => '2'),
            array('name'=>'ELITE' , 'total_deposits' =>  '2500', 'bonous_percen'    => '3'),
            array('name'=>'FREQUENT' , 'total_deposits' =>  '5000', 'bonous_percen'    => '4'),
            array('name'=>'VIP' , 'total_deposits' =>  '15000', 'bonous_percen'    => '5'),
        );
        foreach($arrays as $con){
            DB::table('levels')->insert([
                'name'          =>  $con['name'],
                'total_deposits' =>  $con['total_deposits'],
                'bonous_percen'    => $con['bonous_percen'],
            ]);
        }
        
    }
}

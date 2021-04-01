<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class CategorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('categorys')->insert([
            'name'       =>  'YouTube Views',
         ]);
         DB::table('categorys')->insert([
            'name'       =>  'YouTube LIVE Viewers | LiveStream | Pre-Premiere',
         ]);
    }
}

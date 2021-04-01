<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $id = 1;
        // for ($i=0; $i < 500; $i++) {
        //     $date = Carbon::now()->subDays(rand(1,7));
        //     DB::table('orders')->insert([
        //         'users_id'    =>  '1',
        //         'total' =>  '75',
        //         'created_at' => $date->format('Y-m-d H:i:s'),
        //         'updated_at' => $date->format('Y-m-d H:i:s')
        //     ]);
        //     DB::table('detail_orders')->insert([
        //         'orders_id'    =>  $id,
        //         'services_id' =>  '1',
        //         'link' =>  '1',
        //         'amount' =>  '50000',
        //         'amount_start' =>  '0',
        //         'price_service'=>'1.5000',
        //         'refund' =>  '0',
        //         'amount_com' =>  '0',
        //         'status'=> rand(1,6),
        //         'services_name'=>'YouTube Views - Google AdWords - Discovery',
        //         'created_at' => $date->format('Y-m-d H:i:s'),
        //         'updated_at' => $date->format('Y-m-d H:i:s')
        //     ]);
        //     $id = $id+1;
        // }

    }
}

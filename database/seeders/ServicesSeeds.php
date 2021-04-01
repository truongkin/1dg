<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class ServicesSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'category_id'=> '1',
            'name'  => 'YouTube Views - Google AdWords - Discovery',
            'price_service'=>1.5,
            'min'=>50000,
            'max'=>1000000,
            'note'=>'<p><span style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;">- Start Time : 12h - 24hrs .Because it take time 24hrs maximum to approved from Youtube .</span></p><p><span style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;">- 100% NON DROP</span></p><p><span style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;">⭐NOTE :</span><br style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;"><span style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;">- No Copyright</span><br style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;"><span style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;">- No Adult</span><br style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;"><span style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;">- No Abusive keyword [Example- fuck]</span><br style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;"><span style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;">- No Naked Images</span><br style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;"><span style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;">- No Punjabi Videos</span><br style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;"><span style="color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 14px;">- No Gun/Drugs/Blood/Politics</span></p>',
            'speed_date'=>'50k+',
            'guarantee'=>'Trọn đời',
            'time_start'=>'12-24h',
            'quality'=>'5'
        ]);
        DB::table('services')->insert([
            'category_id'=> '1',
            'name'  => 'YouTube Views - Google AdWords - True views',
            'price_service'=>1.5,
            'min'=>50000,
            'max'=>1000000,
            'note'=>'tét',
            'speed_date'=>'50k+',
            'guarantee'=>'Trọn đời',
            'time_start'=>'12-24h',
            'quality'=>'5'
        ]);
        DB::table('services')->insert([
            'category_id'=> '2',
            'name'  => 'YouTube Views - Live Stream Views',
            'price_service'=>3,
            'min'=>1000,
            'max'=>100000,
            'note'=>'tét2',
            'speed_date'=>null,
            'guarantee'=>null,
            'time_start'=>'Lập tức',
            'quality'=>'4'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Level;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            levelsSeeder::class,
            CategorysSeeder::class,
            ServicesSeeds::class,
            RechargesSeedwer::class,
            OrderSeeder::class
        ]);
        DB::table('users')->insert([
           'name'       =>  'DEV',
           'email'      =>  'dev@gmail.com',
            'levels_id' =>  Level::where('name','NEWBIE')->first()->id,
            'password'    => Hash::make('1'),
        ]);
        DB::table('admins')->insert([
           'name'       => 'ADMIN',
           'email'      => 'admin@gmail.com',
           'password'   => Hash::make('1'),
        ]);
    }
}

<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MachinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('machines')->delete();
        DB::table('machines')->insert(['device_id'=>1,'name' => 'Candela']);
        DB::table('machines')->insert(['device_id'=>1,'name' => 'Again ']);
    }
}

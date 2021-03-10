<?php

use Illuminate\Database\Seeder;

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

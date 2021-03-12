<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ConsumablesUsedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consumables')->delete();
        DB::table('consumables')->insert(['name' => 'Bed Sheets', 'is_deleted' => 0]);
        DB::table('consumables')->insert(['name' => 'Gown', 'is_deleted' => 0]);
        DB::table('consumables')->insert(['name' => 'Slippers', 'is_deleted' => 0]);
        DB::table('consumables')->insert(['name' => 'Sanitizer', 'is_deleted' => 0]);
        DB::table('consumables')->insert(['name' => 'Air Freshener', 'is_deleted' => 0]);
    }
}

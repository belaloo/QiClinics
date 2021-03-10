<?php

use Illuminate\Database\Seeder;

class TreatedAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trated_areas')->delete();
        DB::table('trated_areas')->insert(['name' => 'Full Body', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Total Body', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Bikini & Underarm', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Bikini Only', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Underarm Only', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Half Arms', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Full Arms', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Half Legs', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Full Legs', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Full Abdomen', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Abdomen Line', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Back', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Half Back', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Half Abdomen', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Chest', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Around Nipple', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Full Face', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Upper Lip', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Chin', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Beard Line', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Front Neck', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Back Neck', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Sideburns', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Hands Only', 'is_deleted' => 0]);
        DB::table('trated_areas')->insert(['name' => 'Feet Only', 'is_deleted' => 0]);
    }
}

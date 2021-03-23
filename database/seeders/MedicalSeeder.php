<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medical_records')->delete();
        DB::table('medical_records')->insert(['name' => 'Acne']);
        DB::table('medical_records')->insert(['name' => 'Allergy']);
        DB::table('medical_records')->insert(['name' => 'Diabetes']);
        DB::table('medical_records')->insert(['name' => 'Endocrine diseases']);
        DB::table('medical_records')->insert(['name' => 'Cortisone medication']);
        DB::table('medical_records')->insert(['name' => 'Vitamins']);
        DB::table('medical_records')->insert(['name' => 'Dietary supplements']);
        DB::table('medical_records')->insert(['name' => 'Athletic supplements']);
        DB::table('medical_records')->insert(['name' => 'Other medications']);
        DB::table('medical_records')->insert(['name' => 'Menstrual irregularity']);
        DB::table('medical_records')->insert(['name' => 'PCOS']);
        DB::table('medical_records')->insert(['name' => 'Cardiovascular disease']);
        DB::table('medical_records')->insert(['name' => 'Electronic implants']);
        DB::table('medical_records')->insert(['name' => 'Anti-immune medication']);
        DB::table('medical_records')->insert(['name' => 'Autoimmune diseases']);
        DB::table('medical_records')->insert(['name' => 'Anesthesia']);
        DB::table('medical_records')->insert(['name' => 'Cancer']);
        DB::table('medical_records')->insert(['name' => 'Surgeries with local anesthesia']);
        DB::table('medical_records')->insert(['name' => 'Surgeries with full anesthesia']);
        DB::table('medical_records')->insert(['name' => 'Vitiligo']);
        DB::table('medical_records')->insert(['name' => 'Psoriasis']);
        DB::table('medical_records')->insert(['name' => 'Warts']);
        DB::table('medical_records')->insert(['name' => 'Rosacea']);
        DB::table('medical_records')->insert(['name' => 'Erythema']);
    }
}

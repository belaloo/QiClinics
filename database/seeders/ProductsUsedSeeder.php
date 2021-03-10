<?php

use Illuminate\Database\Seeder;

class ProductsUsedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_useds')->delete();
        DB::table('products_useds')->insert(['name' => 'Razor', 'is_deleted' => 0]);
        DB::table('products_useds')->insert(['name' => 'Alovera Gel', 'is_deleted' => 0]);
        DB::table('products_useds')->insert(['name' => 'Sunblock', 'is_deleted' => 0]);
        DB::table('products_useds')->insert(['name' => 'Makeup Remover', 'is_deleted' => 0]);
        DB::table('products_useds')->insert(['name' => 'Alcohol Pads', 'is_deleted' => 0]);
        DB::table('products_useds')->insert(['name' => 'Cotton Pads', 'is_deleted' => 0]);
        DB::table('products_useds')->insert(['name' => 'Gauze', 'is_deleted' => 0]);
        DB::table('products_useds')->insert(['name' => 'Tongue Depressor', 'is_deleted' => 0]);
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            \Database\Seeders\TreatedAreasSeeder::class,
            \Database\Seeders\ProductsUsedSeeder::class,
            \Database\Seeders\ConsumablesUsedSeeder::class,
            \Database\Seeders\SkinTypeSeeder::class,
            \Database\Seeders\  HairThicknessSeeder::class,
            \Database\Seeders\ DeviceSeeder::class,
            \Database\Seeders\ MachinesSeeder::class,
            \Database\Seeders\ MedicalSeeder::class,
//            OAuthSeeder::class
        ]);
    }
}

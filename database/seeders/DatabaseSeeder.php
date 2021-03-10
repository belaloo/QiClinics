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
            TreatedAreasSeeder::class,
            ProductsUsedSeeder::class,
            ConsumablesUsedSeeder::class,
            SkinTypeSeeder::class,
            HairThicknessSeeder::class,
            DeviceSeeder::class,
            MachinesSeeder::class,
//            OAuthSeeder::class
        ]);
    }
}

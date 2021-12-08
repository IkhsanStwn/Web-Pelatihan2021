<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Merk;
use App\Models\Car;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Carlo',
            'email' => 'carlo123@mail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Andy',
            'email' => 'Andy123@mail.com',
            'password' => bcrypt('54321')
        ]);

        Merk::create([
            'name' => 'Toyota',
            'slug' => 'toyota',
        ]);
        Merk::create([
            'name' => 'Mitsubishi',
            'slug' => 'mitsubishi',
        ]);

        Merk::create([
            'name' => 'Daihatsu',
            'slug' => 'daihatsu',
        ]);

        Merk::create([
            'name' => 'Suzuki',
            'slug' => 'suzuki',
        ]);

        Merk::create([
            'name' => 'Honda',
            'slug' => 'honda',
        ]);

        Merk::create([
            'name' => 'Nissan',
            'slug' => 'nissan',
        ]);

        Merk::create([
            'name' => 'Mazda',
            'slug' => 'mazda',
        ]);

        Merk::create([
            'name' => 'Wuling',
            'slug' => 'wuling',
        ]);

        Merk::create([
            'name' => 'Isuzu',
            'slug' => 'isuzu',
        ]);

        Merk::create([
            'name' => 'Hyundai',
            'slug' => 'hyundai',
        ]);


        Car::create([
            'merk_id' => 1,
            'user_id' => 1,
            'model' => "Innova Reborn",
            'transmisi' => 'Manual',
            'bbm' => "Diesel",
            'tahun' => 2017,
            'km' => 132500,
            'cc' => 2400,
            'harga' => 297000000,
            'gambar' => ""
        ]);

        Car::create([
            'merk_id' => 2,
            'user_id' => 1,
            'model' => "Xpander",
            'transmisi' => 'Manual',
            'bbm' => "Bensin",
            'tahun' => 2019,
            'km' => 12500,
            'cc' => 1500,
            'harga' => 197000000,
            'gambar' => ""
        ]);

        Car::create([
            'merk_id' => 3,
            'user_id' => 2,
            'model' => "Granmax",
            'transmisi' => 'Manual',
            'bbm' => "Bensin",
            'tahun' => 2017,
            'km' => 132500,
            'cc' => 1500,
            'harga' => 97000000,
            'gambar' => ""
        ]);

        Car::create([
            'merk_id' => 1,
            'user_id' => 1,
            'model' => "Avanza",
            'transmisi' => 'Manual',
            'bbm' => "Bensin",
            'tahun' => 2021,
            'km' => 500,
            'cc' => 1500,
            'harga' => 297000000,
            'gambar' => ""
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $data = [];
        for($i=0; $i<5; $i++)
        $data[] = [
            'judul' => $faker->sentence(mt_rand(3, 5)),
            'penulis' => $faker->name(),
            // 'harga' => ->numberBetween(50000, 200000),
            'tahun_terbit' => $faker->year(),
            'craeted_at' => now(),
            'updated_at' => now(),
            'kategori_id' => 2
        ];

        DB::table('buku')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Categori = [
            [
            'nama_kategori'=>'Pemrograman',
            'created_at'=>now(),
            'updated_at'=>now()
        ],
        [
            'nama_kategori'=>'Multimedia',
            'created_at'=>now(),
            'updated_at'=>now()
        ],
        [
            'nama_kategori'=>'Database Design',
            'created_at'=>now(),
            'updated_at'=>now()
        ]
    ];

        DB::table('categori')->insert($Categori);
    }
}

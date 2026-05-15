<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BookshelfSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
            LoanSeeder::class,
            LoanDetailSeeder::class,
            ReturnSeeder::class,
        ]);
    }
}
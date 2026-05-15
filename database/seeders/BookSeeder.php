<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Book::create([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'year' => $faker->year,
                'publisher' => $faker->company,
                'city' => $faker->city,
                'cover' => $faker->imageUrl(300, 400, 'books', true, 'cover'),
                'bookshelf_id' => rand(1, 10),
            ]);
        }
    }
}
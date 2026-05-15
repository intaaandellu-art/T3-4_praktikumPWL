<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bookshelf;

class BookshelfSeeder extends Seeder
{
    public function run(): void
    {
        $bookshelfs = [
            ['code' => 'A', 'name' => 'Fiksi & Novel'],
            ['code' => 'B', 'name' => 'Sains & Teknologi'],
            ['code' => 'C', 'name' => 'Sejarah & Budaya'],
            ['code' => 'D', 'name' => 'Komik & Manga'],
            ['code' => 'E', 'name' => 'Referensi & Kamus'],
            ['code' => 'F', 'name' => 'Bisnis & Ekonomi'],
            ['code' => 'G', 'name' => 'Agama & Spiritual'],
            ['code' => 'H', 'name' => 'Kesehatan & Medis'],
            ['code' => 'I', 'name' => 'Seni & Desain'],
            ['code' => 'J', 'name' => 'Olahraga & Rekreasi'],
        ];

        foreach ($bookshelfs as $bookshelf) {
            Bookshelf::create($bookshelf);
        }
    }
}
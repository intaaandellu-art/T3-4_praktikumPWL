<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['category' => 'Fiksi'],
            ['category' => 'Non-Fiksi'],
            ['category' => 'Sains'],
            ['category' => 'Teknologi'],
            ['category' => 'Sejarah'],
            ['category' => 'Biografi'],
            ['category' => 'Komik'],
            ['category' => 'Manga'],
            ['category' => 'Referensi'],
            ['category' => 'Pendidikan'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
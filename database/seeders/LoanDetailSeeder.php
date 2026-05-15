<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoanDetail;
use App\Models\Loan;
use App\Models\Book;

class LoanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $loans = \App\Models\Loan::all();
        $books = \App\Models\Book::all();

        for ($i = 0; $i < 50; $i++) {
            LoanDetail::create([ // Gunakan Model, bukan DB::table()
                'loan_id' => $loans->random()->id,
                'book_id' => $books->random()->id,
                'is_return' => rand(0, 1),
            ]);
        }
    }
}
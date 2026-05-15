<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Loan;
use App\Models\User;
use Faker\Factory as Faker;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::all();

        for ($i = 0; $i < 50; $i++) {
            $loanAt = $faker->dateTimeBetween('-6 months', 'now');
            $returnAt = $faker->optional(0.7)->dateTimeBetween($loanAt, '+1 month');

            Loan::create([
                'user_npm' => $users->random()->npm,
                'loan_at' => $loanAt,
                'return_at' => $returnAt,
            ]);
        }
    }
}
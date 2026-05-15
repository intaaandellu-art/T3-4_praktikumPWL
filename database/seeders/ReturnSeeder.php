<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReturnRecord;
use App\Models\LoanDetail;

class ReturnSeeder extends Seeder
{
    public function run(): void
    {
        $loanDetails = LoanDetail::where('is_return', true)->get();

        foreach ($loanDetails as $detail) {
            $hasCharge = rand(0, 1);
            
            ReturnRecord::create([
                'loan_detail_id' => $detail->id,
                'charge' => $hasCharge,
                'amount' => $hasCharge ? rand(5000, 50000) : 0,
            ]);
        }
    }
}
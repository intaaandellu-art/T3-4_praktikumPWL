<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('loanDetails.book')->get();
        return view('loans.index', compact('loans'));
    }
}

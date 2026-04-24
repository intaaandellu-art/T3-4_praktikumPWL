<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    public function index()
    {
        $data = LoanDetail::with('returns', 'book')->get();
        return view('returns.index', compact('data'));
    }
}

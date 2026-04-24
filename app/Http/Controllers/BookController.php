<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('bookshelf')->get();
        return view('books.index', compact('books'));
    }
}

<?php

// use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

// tampil semua buku + relasi rak
Route::get('/books', function () {
    $books = Book::with('bookshelf')->get();
    return view('books.index', compact('books'));
});

// tampil user + pinjaman
Route::get('/users', function () {
    $users = User::with('loans')->get();
    return view('users.index', compact('users'));
});

// tampil loan + detail + buku
Route::get('/loans', function () {
    $loans = Loan::with('loanDetails.book')->get();
    return view('loans.index', compact('loans'));
});

// Route::get('/dashboard', function () {
//     $user = User::first();
//     return view('dashboard', compact('user'));
// });

// Route::get('/beranda', function () {
//     return view('page beranda');
// });

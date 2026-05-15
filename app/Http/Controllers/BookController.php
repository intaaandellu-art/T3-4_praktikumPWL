<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('bookshelf')->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookshelves = Bookshelf::all();
        return view('books.create', compact('bookshelves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'publisher' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bookshelf_id' => 'required|exists:bookshelves,id',
        ]);

        // Handle upload cover
        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->load('bookshelf');
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $bookshelves = Bookshelf::all();
        return view('books.edit', compact('book', 'bookshelves'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'publisher' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bookshelf_id' => 'required|exists:bookshelves,id',
        ]);

        // Handle upload cover baru
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }
            
            // Upload cover baru
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        // Update data buku
        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            // Hapus cover file jika ada
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }

            // Hapus data buku
            $book->delete();

            return redirect()->route('books.index')
                ->with('success', 'Buku berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('books.index')
                ->with('error', 'Gagal menghapus buku. Buku mungkin sedang dipinjam.');
        }
    }
}
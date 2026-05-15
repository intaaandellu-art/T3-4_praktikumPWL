<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = [
        'category',
    ];

    /**
     * Relasi Many-to-Many dengan Book
     * Note: Jika di ERD ada tabel pivot books_categories
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'books_categories');
    }
}
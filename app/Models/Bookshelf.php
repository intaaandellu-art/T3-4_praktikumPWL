<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bookshelf extends Model
{
    protected $fillable = [
        'code',
        'name',
    ];

    /**
     * Relasi ke tabel books (satu rak bisa banyak buku)
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
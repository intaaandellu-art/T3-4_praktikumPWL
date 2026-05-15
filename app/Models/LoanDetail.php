<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LoanDetail extends Model
{
    protected $fillable = [
        'loan_id',
        'book_id',
        'is_return',
    ];

    /**
     * Relasi ke Loan (banyak detail milik satu pinjaman)
     */
    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }

    /**
     * Relasi ke Book (detail meminjam satu buku)
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Relasi ke Return (satu detail bisa punya pengembalian)
     */
    public function returnRecord(): HasOne
    {
        return $this->hasOne(ReturnRecord::class, 'loan_detail_id');
    }
}
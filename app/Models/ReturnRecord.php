<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReturnRecord extends Model
{
    // Tabel bernama 'returns' (karena 'return' keyword PHP)
    protected $table = 'returns';

    protected $fillable = [
        'loan_detail_id',
        'charge',
        'amount',
    ];

    /**
     * Relasi ke LoanDetail (pengembalian untuk satu detail pinjaman)
     */
    public function loanDetail(): BelongsTo
    {
        return $this->belongsTo(LoanDetail::class, 'loan_detail_id');
    }
}
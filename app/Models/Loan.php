<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loan extends Model
{
    protected $fillable = [
        'user_npm',
        'loan_at',
        'return_at',
    ];

    /**
     * Relasi ke User (banyak pinjaman milik satu user)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_npm', 'npm');
    }

    /**
     * Relasi ke LoanDetail (satu pinjaman bisa banyak detail buku)
     */
    public function loanDetails(): HasMany
    {
        return $this->hasMany(LoanDetail::class);
    }
}
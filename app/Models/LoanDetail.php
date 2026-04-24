<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanDetail extends Model
{
    protected $table = 'loan_detail';

    protected $fillable = [
        'loan_id',
        'book_id',
        'is_return',
    ];

    public function loan(){
        return $this->belongsTo(Loan::class, 'loan_id');
    }

    public function book(){
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function returns(){
        return $this->hasOne(Returns::class, 'loan_detail_id');
    }
}

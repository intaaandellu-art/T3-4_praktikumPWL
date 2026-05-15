<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Model
{
    protected $primaryKey = 'npm';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'npm',
        'username',
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Relasi ke tabel loans (satu user bisa banyak pinjaman)
     */
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class, 'user_npm', 'npm');
    }
}
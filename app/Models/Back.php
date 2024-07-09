<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Back extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id',
        'return',
        'status',
    ];

    /**
     * Get the transaction that owns the back.
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}

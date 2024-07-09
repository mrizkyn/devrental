<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'car_id',
        'name',
        'telp',
        'email',
        'ktp',
        'transfer',
        'status',
        'start',
        'end',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

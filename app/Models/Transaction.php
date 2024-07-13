<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car; // Pastikan Anda mengimpor model Car

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
        'status',
        'backs',
        'back_img',
        'address',
        'start',
        'end',
        'img',
        'price', 
    ];

    /**
     * Get the car that owns the transaction.
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

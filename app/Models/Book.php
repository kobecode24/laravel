<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'genre',
        'description',
        'total_copies',
        'available_copies',
    ];


    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

}

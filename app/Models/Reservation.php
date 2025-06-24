<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['projection_id', 'user_id', 'amount'];
    public $timestamps = false;

    public function seats()
    {
        return $this->belongsToMany(Seat::class, 'reservation_seat');
    }
}

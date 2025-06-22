<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projection extends Model
{
    use HasFactory;

    protected $fillable = ['movie_id', 'theater_id', 'start_date'];

    public $timestamps = false;
}

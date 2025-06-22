<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    protected $fillable = ['room_name'];

    protected $table = 'theaters_room';

    public $timestamps = false;

    public function projections()
    {
        return $this->belongsToMany(Movie::class, 'projections', 'theater_id', 'movie_id');
    }
}

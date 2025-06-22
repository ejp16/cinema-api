<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $guard = ['id'];
    protected $fillable = ['title', 'description', 'duration', 'rating', 'genre_id', 'image', 'added_by', 'created_at', 'updated_at'];
    public $timestamps = true;

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function projection()
    {
        return $this->belongsToMany(Theater::class, 'projections');
    }

}

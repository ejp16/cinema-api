<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservacion extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function pelicula(): BelongsTo
    {
        return $this->belongsTo(Pelicula::class);
    }

    public function sala(): BelongsTo
    {
        return $this->belongsTo(Sala::class);
    }
}

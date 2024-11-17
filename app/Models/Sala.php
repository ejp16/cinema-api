<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sala extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public $timestamps = false;

    protected $casts = [
        'desde' => 'datetime:H:i',
        'hasta' => 'datetime:H:i'
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(Usuario::class);
    }
}

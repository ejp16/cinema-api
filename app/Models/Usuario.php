<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Usuario extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public $timestamps = false;

    public function info_usuario(): HasOne
    {
        return $this->hasOne(InfoUsuario::class);
    }

    public function salas(): HasMany
    {
        return $this->hasMany(Sala::class);
    }

}

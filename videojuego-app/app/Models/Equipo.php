<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class Equipo extends Model
{
    use HasFactory;

    public $timestamps=false;

    public function componentes(): BelongsToMany{
        return $this->belongsToMany(User::class,'jugador_equipo');
    }


}
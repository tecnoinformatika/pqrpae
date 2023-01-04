<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pqr extends Model
{
    use HasFactory;
    protected $fillable = [
        'asunto',
        'mensaje',
        'componente',
        'colegio_id',
        'adjunto_id'
    ];

    public function adjunto()
    {
        return $this->hasOne(Adjunto::class);
    }


}

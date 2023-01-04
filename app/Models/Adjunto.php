<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adjunto extends Model
{
    use HasFactory;    
    
    // Declaro los campos que usaré de la tabla 'img_bicicletas' 
    protected $fillable = ['nombre', 'formato', 'pqr_id'];
 
    // Relación Inversa (Opcional)
    public function adjunto()
    {
    	return $this->belongsTo(Pqr::class);
    }

    public function getUrlPathAttribute()
    {
        return \Storage::url($this->nombre);
    }
    
}

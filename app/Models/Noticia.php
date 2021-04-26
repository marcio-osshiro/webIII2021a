<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Noticia extends Model
{
    use HasFactory;
    protected $table = 'noticia';
    public $timestamps = false;
    protected $dates = ['data'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

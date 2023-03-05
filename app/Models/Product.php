<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'categoria_id',
        'stock',
        'precio'
    ];



    // definir que pertenece a categoria
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }
}

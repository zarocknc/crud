<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;


    protected $fillable = ['categoria'];
    protected $table = 'categorias';


    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}

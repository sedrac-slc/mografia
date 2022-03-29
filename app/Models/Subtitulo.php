<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtitulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_id','sub_descricao','prioridade'
    ];

}

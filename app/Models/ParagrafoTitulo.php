<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParagrafoTitulo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','titulo_id','conteudo_tipo_id','nome','descricao','prioridade'];

}

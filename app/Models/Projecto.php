<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','tema_id','nome','acesso','tipo','data_inicio','data_fim','pro_descricao'
    ];
}

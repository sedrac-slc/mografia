<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboracaoProjectos extends Model
{
    use HasFactory;

    protected $fillable = ['projecto_id','colaborador_id'];

}

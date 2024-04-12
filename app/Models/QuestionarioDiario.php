<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionarioDiario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'questionarios_diarios';
    protected $fillable = ['dia', 'usuario_id', 'tristeza', 'choro', 'medo', 'desconcentracao', 'nauseas', 'insonia', 'higiene', 'isolamento'];

}

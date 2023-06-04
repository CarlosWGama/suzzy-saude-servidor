<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsuariosExtras extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'usuarios_extras';

    //Não protege nenhum campo
    protected $guarded = [];

    


}

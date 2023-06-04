<?php

namespace App\Models;

use Carbon\Carbon;
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

    
    public function getDataNascimentoAttribute($value) {
        return Carbon::parse($value)->format('d/m/Y');
    }


}

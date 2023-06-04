<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table = 'usuarios';
    
    //Não protege nenhum campo
    protected $guarded = [];

    //Não exibe esses campos
    protected $hidden = ['senha'];

    public function extras(): HasOne {
        return $this->hasOne(UsuariosExtras::class, 'usuario_id');
    }

    public function contatos(): HasMany {
        return $this->hasMany(Contato::class, 'usuario_id');
    }

}

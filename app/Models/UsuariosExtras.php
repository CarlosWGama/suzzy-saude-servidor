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

    //Adiciona a descrição de genero
    public function getGeneroDescricaoAttribute() {
        //1 - masculino | 2 - feminino | 3 - outros
        switch($this->genero) {
            case 1: return 'Masculino';
            case 2: return 'Feminino';
            case 3: return 'Outros';
            default: return 'Não informado';
        }
    }
    
    //Adiciona a descrição de Zona Residencial
    public function getZonaResidencialDescricaoAttribute() {
        //1 - urbana | 2 - rural
        switch($this->zona_residencial) {
            case 1: return 'Urbana';
            case 2: return 'Rural';
            default: return 'Não informado';
        }
    }
    
    //Adiciona a descrição de Estado Civil
    public function getEstadoCivilDescricaoAttribute() {
        //1 - solteiro | 2 - casado | 3 - separado | 4 - divorciado | 5 - viuvo | 6 - nao_informar
        switch($this->estado_civil) {
            case 1: return 'Solteiro';
            case 2: return 'Casado';
            case 3: return 'Separado';
            case 4: return 'Divorciado';
            case 5: return 'Viúvo';
            default: return 'Não informado';
        }
    }
    
    //Adiciona a descrição de Orientação Sexual
    public function getOrientacaoSexualDescricaoAttribute() {
        //1 - heterossexual | 2 - homossexual | 3 - bissexual | 4 - outros | 5 - nao_informar
        switch($this->orientacao_sexual) {
            case 1: return 'Heterossexual';
            case 2: return 'Homossexual';
            case 3: return 'Bissexual';
            case 4: return 'Outros';
            default: return 'Não informado';
        }
    }

}

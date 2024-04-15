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

    public function getTristezaDescricaoAttribute() {
        return $this->descricao($this->tristeza);
    }
    
    public function getChoroDescricaoAttribute() {
        return $this->descricao($this->choro);
    }
    
    public function getMedoDescricaoAttribute() {
        return $this->descricao($this->medo);
    }
    
    public function getDesconcentracaoDescricaoAttribute() {
        return $this->descricao($this->desconcentracao);
    }
    
    public function getNauseasDescricaoAttribute() {
        return $this->descricao($this->nauseas);
    }
    
    public function getInsoniaDescricaoAttribute() {
        return $this->descricao($this->insonia);
    }
    
    public function getHigieneDescricaoAttribute() {
        return $this->descricao($this->higiene);
    }
    
    public function getIsolamentoDescricaoAttribute() {
        return $this->descricao($this->isolamento);
    }

    private function descricao($valor) {
        switch($valor) {
            case 1: return 'Triste';
            case 2: return 'Mal';
            case 3: return 'Neutro'; 
            case 4: return 'Bem';
            case 5: return 'Feliz';
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
	//Quando o padrão de nomes das migrations é diferente do model
    protected $table = 'desenvolvedores';

    function projetos() {
    	return $this->belongsToMany("App\Projeto", "alocacoes")->withPivot('horas_semanais');    	
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Projeto;
use App\Alocacao;
use App\Desenvolvedor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/desenvolvedor_projeto', function () {
	$desenvolvedores = Desenvolvedor::with('projetos')->get();	
	
	foreach ($desenvolvedores as $d) {
		echo "<p>Nome do Desenvolvedor: " .$d->nome. "</p>";
		echo "<p>Cargo: " .$d->cargo. "</p>";
		if(count($d->projetos) > 0){
			echo "Projetos: <br>";
			echo "<ul>";
			foreach ($d->projetos as $p) {
				echo "<li>";
				echo "Nome: " .$p->nome. " | ";
				echo "Horas do projeto: " .$p->estimativa_horas. " | ";
				echo "Horas trabalhadas: " .$p->pivot->horas_semanais. " | ";
				echo "</li>";
			}
			echo "</ul>";
		}

		echo "<hr>";
	}

});

Route::get('/projeto_desenvolvedores', function () {
	$projetos = Projeto::with('desenvolvedores')->get();

	foreach ($projetos as $proj) {
		echo "<p>Nome do Projeto: " .$proj->nome. "</p>";
		echo "<p>Estimativa: " .$proj->estimativa_horas. "</p>";
		
		if(count($proj->desenvolvedores) > 0) {	
			echo "Desenvolvedores: <br>";			
			echo "<ul>";
			foreach ($proj->desenvolvedores as $d) {
				echo "<li>";
				echo "Nome do Desenvolvedor: ".$d->nome." | ";
				echo "Cargo: ".$d->cargo." | ";
				echo "Horas trabalhadas: ".$d->pivot->horas_semanais." | ";
				echo "</li>";
			}
			echo "</ul>";
		}
		echo "<hr>";
	}

	//return $projetos;
});
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
				echo "Horas: " .$p->estimativa_horas;
				echo "</li>";
			}
			echo "</ul>";
		}

		echo "<hr>";
	}

});

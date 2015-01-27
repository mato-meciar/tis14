<?php
require_once 'core/init.php';
require_once 'functions/functions.php';
$inst = DB::getInstance();

$searchResults = $inst->getSearchRes( ['meno', 'priezvisko'], 
					'osoba',["",'LIKE', '%'. Input::get('vst') . '%' ]);

// print_r($searchResults->results()); 

$resTable = vypisUdaje::createTable($searchResults->results());

$resTable->show();

// foreach ($searchResults->results() as $key) {
	
		/* Sem robit html a css styly. Prislusne premnenne s hodnotami:*/
		// $key->meno;
		// echo $key->priezvisko;
		// echo $key->email;
		// $key->miestnost
		// $key->klapka
		// $key->katedra
		// $key->foto 	: obsahuje relativnu poziciu obrazka, vkladat do <img src="TU!">

// }

?>
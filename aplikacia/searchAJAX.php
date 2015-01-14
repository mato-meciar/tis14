<?php
require_once 'core/init.php';
$inst = DB::getInstance(); 

$searchResults = $inst->getSearchRes( ['meno', 'priezvisko'], 
					'osoba',["",'LIKE', '%'. Input::get('vst') . '%' ]);

//print_r($searchResults-results())

foreach ($searchResults->results as $key) {
	/*
		Sem robit html a css styly. Prislusne premnenne s hodnotami:
		$key->meno
		$key->priezvisko
		$key->email
		$key->miestnost
		$key->klapka
		$key->katedra
		toto je len string
		$key->foto 	: obsahuje relativnu poziciu obrazka, vkladat do <img src="TU!">


	*/

?>	
<?php}?>
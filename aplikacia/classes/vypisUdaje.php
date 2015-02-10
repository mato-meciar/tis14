<?php
	require_once 'functions/functions.php';

	class vypisUdaje{
		private static $_table;

		private function __construct($data){
			self::$_table = '<table border="9" class="_table" align="center" style="font-size:large"; BORDERCOLOR=black>' . "<tr><th>Meno</th><th>email</th><th>Miestnost</th><th>Klapka</th><th>Katedra</th></tr>";
			foreach ($data as $key) {
				self::$_table .= "<tr><td><a href='https://candle.fmph.uniba.sk/ucitelia/".ucfirst($key->meno)."-".ucfirst($key->priezvisko)."' target='_blank'>".ucfirst($key->meno)." ".ucfirst($key->priezvisko)."</td><td>";
				self::$_table .= hideMail($key->email);
				self::$_table .= "</td><td>".$key->miestnost."</td><td>".$key->klapka."</td><td>".katedra($key->katedra)."</td></tr>";
			}
			self::$_table .= "</table>";
		}

		public static function createTable($data){
        	$new_table = new vypisUdaje($data);
      		return $new_table;
    	}

    	public function show() {
    		echo self::$_table;
    	}

    	public function getCSV($data) {
    		header("Content-type: text/csv");
		    header("Content-Disposition: attachment; filename=file.csv");
		    header("Pragma: no-cache");
		    header("Expires: 0");
			$output = fopen('php://output', 'w');

			fputcsv($output, array('priezvisko', 'meno', 'email', 'miestnost', 'klapka', 'katedra'));

			foreach ($data as $key) {
				fputcsv($output, array($key->priezvisko, $key->meno, $key->email, $key->miestnost, $key->klapka, $key->katedra));
			}
			exit();
    	}
	}


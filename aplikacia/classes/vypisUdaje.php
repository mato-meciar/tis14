<?php
	require_once 'functions/functions.php';

	class vypisUdaje{
		private static $_table;

		private function __construct($data){
			$this->_table = '<table border="9" class="_table" align="center" style="font-size:large"; BORDERCOLOR=black>' . "<tr><th>Meno</th><th>email</th><th>Miestnost</th><th>Klapka</th><th>Katedra</th></tr>";
			foreach ($data as $key) {
				$this->_table .= "<tr><td><a href='https://candle.fmph.uniba.sk/ucitelia/".ucfirst($key->meno)."-".ucfirst($key->priezvisko)."' target='_blank'>".ucfirst($key->meno)." ".ucfirst($key->priezvisko)."</td><td>";
				$this->_table .= hideMail($key->email);
				$this->_table .= "</td><td>".$key->miestnost."</td><td>".$key->klapka."</td><td>".katedra($key->katedra)."</td></tr>";
			}
			$this->_table .= "</table>";
		}

		public static function createTable($data){
        	self::$_table = new vypisUdaje($data);
      		return self::$_table;
    	}

    	public function show() {
    		echo $this->_table;
    	}
	}


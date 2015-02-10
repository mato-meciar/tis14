<?php

	class Admin{

		private $_DBInstance;
		private $_error;

		public function __construct($DBInst = null){
			$this->_DBInstance = $DBInst;
		}

		private function checkOldPass(){
			if(Input::get('old_pass')){
				$val = $this->_DBInstance->get('users', ['id', '=', Session::get('admin')]);
				if($val->count() == 1){
					foreach ($val->results() as $key) {
						if(Hash::make(Input::get('old_pass'), $key->salt) == $key->password)
							return true;
					}
				}
			}
			return false;
		}

		private function validate(){

				if( !$this->checkOldPass()){//kontrola stareho hesla
					$this->_error = "Stare heslo sa nenachadza v databaze!";
					return false;

				} else if(strlen(Input::get('new_pass')) < 6){						//kontrola ci dlzka noveho hesla je vacsia alebo roovna 6			
					$this->_error = "Heslo je kratsie ako 6 znakov";
					return false;

				} else if(Input::get('rep_pass') != Input::get('new_pass')){		//kontrola ci sa nove hesla zhoduju 
					$this->_error = "Hesla sa nezhoduju";
					return false;
				}

				return true;
		}


		public function changePassword(){
			if($this->validate()){
				$newSalt = Hash::salt();
				if($this->_DBInstance->update('users', Session::get('admin'),array(
					'password'	=>	Hash::make(Input::get('new_pass'), $newSalt),
					'salt'		=>	$newSalt
					)))
					return true;
			}
			return false;
		}



		public function parse($data){
			return $data;					//sparsovane
		}

		public function vratChybu(){
			if($this->_error) return $this->_error;
		}

		public function pridajOsobu(){
			if($this->_DBInstance->insert('osoba',array(
	  			'priezvisko' 	=> Input::get('priezvisko'),
	  			'meno' 			=> Input::get('meno'),
	  			'email' 		=> Input::get('email'),
	  			'miestnost'		=> Input::get('miestnost'),
	  			'klapka' 		=> Input::get('klapka'),
	  			'katedra' 		=> Input::get('katedra')
  				)))
  				return true;
  			return false;
		}

	}
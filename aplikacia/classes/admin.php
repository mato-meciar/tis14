<?php

	class Admin{

		private $_DBInstance;

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
				if( $this->checkOldPass() && 							//kontrola stareho hesla
					strlen(Input::get('new_pass')) >= 6 &&				//kontrola ci dlzka noveho hesla je vacsia alebo roovna 6
					Input::get('new_pass') == Input::get('rep_pass')	//kontrola ci sa nove hesla zhoduju 
					)
					return true;
				
				return false;
		}


		public function changePassword(){
			if($this->validate()){
				$newSalt = Hash::salt();
				if($this->_DBInstance->update('users', Session::get('admin'),array(
					'password'	=>	Hash::make(Input::get('new_pass'), $newSalt),
					'salt'		=>	$newSalt
					)))
					return true;
				return false;
			}
		}



		public function parse($data){
			return $data;					//sparsovane
		}


	}
<?php
class Hash{
	public static function make($pass, $salt = '') {
		return hash_hmac('sha256', $pass, $salt);
	}

	public static function salt($length = 32) {
		return mcrypt_create_iv($length); 
	}

	public static function unique(){
		return self::make(uniqid());

	}

}
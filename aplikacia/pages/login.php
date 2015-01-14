<?php
	//$dbinst = DB::getInstance();

	if(Token::check(Input::get('token'))){
		if(Input::get('login') && Input::get('password')){
			$admin = $inst->get('users', ['login', '=', Input::get('login')]);		//vytiahnutie usera z db
			if($admin->count() == 1){
				foreach ($admin->results() as $key) {
					if($key->password === Hash::make(Input::get('password'), $key->salt) 
						&& $key->admin == 1){
						Session::put('admin', $key->id);
						header('Location: index.php?page=main');
						die();
					}

				}
			}
		}
	}
	
?>

<form method="post">
	Login name:<br>
	<input type="text" name="login">
	<br>
	Password:<br>
	<input type="password" name="password">
	<br>
	<input type="hidden" name="token" value="<?php echo Token::Generate();?>">
	<input type="submit" name="submit" value="Login">
</form>
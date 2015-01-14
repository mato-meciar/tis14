<?php
  require_once 'core/init.php';
  $inst = DB::getInstance();

  if(Session::exists('admin')){
  	$admin = new Admin($inst);
  }

  //$salt = Hash::salt();					//vytvorenie admina, test
 /* $inst->insert('users',array(
  	'login' 	=> 'admin',
  	'password' 	=> Hash::make('login', $salt),
  	'salt'		=> $salt,
  	'admin'		=> 1
  	));*/
  //unset($inst);
?>


<!DOCTYPE html>
<html>
<head>
	<title>TIS</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	<?php
		// Definovanie nacitavania stranok v tamplate
		$page = Input::Get('page');
		if(empty($page))
			require('pages/main.php');
		else if(file_exists('pages/'.$page.'.php'))
			require('pages/'.$page.'.php');

	?>
		
	
</body>
</html>

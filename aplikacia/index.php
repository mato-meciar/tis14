<?php
  require_once 'core/init.php';
  require_once 'functions/functions.php';
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

<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TIS</title>
	<div class="header">
  <img src="img/logo.png" alt="logo" />
  <h1>Databáza zamestnancov Univerzity Komenského</h1>
  </div>
  
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	<?php
		// Definovanie nacitavania stranok v template
		$page = Input::Get('page');
		if(empty($page))
			require('pages/main.php');
		else if(file_exists('pages/'.$page.'.php'))
			require('pages/'.$page.'.php');

	?>
		
	
</body>
<div id="footer">
    <strong><p align=center>Copyright &copy; 2015 Vrecník, Mečiar, Mendel, Ivan.  All rights reserved.</p></strong>  
</div>
</footer> 
</html>

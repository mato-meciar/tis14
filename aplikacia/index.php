<?php
  require_once 'core/init.php';
  require_once 'functions/functions.php';
  $inst = DB::getInstance();

  if(isset($_GET['miestnost'])) {
    $searchResults = $inst->getSearchRes( ['meno', 'priezvisko', 'miestnost'], 
          'osoba',["",'LIKE', '%'. $_GET['miestnost']. '%' ]);

    $resTable = vypisUdaje::createTable($searchResults->results());

    $resTable->getCSV($searchResults->results());
  }

  if(Session::exists('admin')){
  	$admin = new Admin($inst);

    if(Input::exists())
      if(Input::get('logout')){
        Session::destroy();
      }

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
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script type="text/javascript" src="js/jquery.js"></script>  
</head>
<body>
<header>
  <div class="header">
  <img src="img/logo.png" alt="logo" />
  <h1>Databáza zamestnancov Univerzity Komenského</h1>
  </div>
</header>

<?php 
  if(!Session::exists('admin'))
    echo "<a href='index.php?page=login'><img src='img/login.jpg'></a> ";
  else{
    echo "<a href='index.php'>Hlavná stránka </a>";
    echo "<a href='index.php?page=control_panel'> Control Panel</a> ";

?>
    
    <form method='post' id='logoutForm'>
      <input type="submit" name="logout" value="Logout">
    </form>
   
   <?php
  }
  header('Content-Type: text/html; charset=UTF-8');
?> 
<br>
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

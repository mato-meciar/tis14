<?php 
	if(!Session::exists('admin'))
		echo "<a href='index.php?page=login'><img src='img/login.jpg'></a> ";
	else
		echo "<a href='index.php?page=control_panel'>Control Panel</a> ";
	header('Content-Type: text/html; charset=UTF-8');
?> 
<br>
  <div id="hladaj">
Vyhľadaj: &nbsp 
	   <input type="text" id="vyhladavac">
  </div>
    <br>
	<div id="searchResult">

	<script type="text/javascript" id="searchScript">
		$('#vyhladavac').keyup(function(){			//jquery funkcia pre automaticke vyhladavanie. 
			var input = $.trim($('#vyhladavac').val());
			if(input){	
				$.post('searchAJAX.php',{ vst: input},function(out){			//AJAX
	          		$('#searchResult').html(out);
	        	});
			}else{
				$('#searchResult').html();
			}
		})
	</script>
	</div>
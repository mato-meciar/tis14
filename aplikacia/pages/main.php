<?php 
	if(!Session::exists('admin'))
		echo "<a href='index.php?page=login'>Login</a> ";
	else
		echo "<a href='index.php?page=control_panel'>Control Panel</a> ";
?>
Vyhladaj: &nbsp
	<input type="text" id="vyhladavac">

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
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
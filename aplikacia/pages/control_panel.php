<?php
	if(Session::exists('admin')){

		if(Input::exists()){
			if(Input::get('logout')){
			 	Session::destroy();
			}

			if(Input::get('change_pass')){
				if($admin->changePassword())
					echo 'ano';
			}


		}
?>






Pasword Change: </br></br>
<form method="post">
	<table>
	<tr>
	<td>Old Password :</td>
	<td><input type="password" name="old_pass"></td>
	</tr>
	<tr>
	<td>New Password :</td>
	<td><input type="password" name="new_pass"></br></td>
	</tr><tr>
	<td>Repeat Password :</td>
	<td><input type="password" name="rep_pass"></br></td>
	</tr>
	<tr><td><input type="submit" name="change_pass" value="Change Password"></td></tr>
	</table>
</form>
</br>

<form method="post">
	<input type="submit" name="logout" value="logout">	
</form>


<?php }?>
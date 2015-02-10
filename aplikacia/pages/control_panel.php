<?php
	if(Session::exists('admin')){

		if(Input::exists()){
			
			if(Input::get('change_pass')){
				if($admin->changePassword())
					echo 'Heslo bolo uspesne zmenene!';
				else
					echo $admin->vratChybu();
			}
			if(Input::get('addPerson')){
				if($admin->pridajOsobu())
					echo "Osoba bola úspešne pridaná";
				else
					echo "Nepodarilo sa pridať osobu";
					
			}
		}
?>


<br>
<div id="control_panel">
	<div class="passChange">
		Zmen Heslo: </br>

		<form method="post">
			<table>
			<tr>
			<td>Staré heslo :</td>
			<td><input type="password" name="old_pass"></td>
			</tr>
			<tr>
			<td>Nové heslo :</td>
			<td><input type="password" name="new_pass"></br></td>
			</tr><tr>
			<td>Zopakuj nové heslo :</td>
			<td><input type="password" name="rep_pass"></br></td>
			</tr>
			<tr><td><input type="submit" name="change_pass" value="Zmeň heslo"></td></tr>
			</table>
		</form>
		</br>
	</div>

	<div class="addPerson">
		Pridaj Osobu: 
		<form method="post">
			<table>
			<tr>
			<td>Meno :</td>
			<td><input type="text" name="meno"></td>
			<td>Priezvisko :</td>
			<td><input type="text" name="priezvisko"></td>
			</tr>
			<tr>
			<td>Email :</td>
			<td><input type="text" name="email"></br></td>
			<td>Miestnost :</td>
			<td><input type="text" name="miestnost"></br></td>
			</tr><tr>
			<td>Klapka :</td>
			<td><input type="text" name="klapka"></br></td>
			<td>Katedra :</td>
			<td><select name="katedra">
  						<option value="KAGDM">KAGDM</option>
  						<option value="KAMS">KAMS</option>
  						<option value="KMANM">KMANM</option>
  						<option value="KAFZM">KAFZM</option>
  						<option value="KEF">KEF</option>
  						<option value="KJFB">KJFB</option>
  						<option value="KTFDF">KTFDF</option>
  						<option value="KAI">KAI</option>
  						<option value="KI">KI</option>
  						<option value="KZVI">KZVI</option>
  						<option value="KJP">KJP</option>
  						<option value="KTVS">KTVS</option>
  						<option value="DEK">DEK</option>
  						<option value="VC">VC</option>
  						<option value="KEC">KEC</option>
  						<option value="CPP">CPP</option>
  						<option value="CEF">CEF</option>
  						<option value="VL">VL</option>
  						<option value="SB">SB</option>
				</select>
			</td>
			</tr>
			<tr><td><input type="submit" name="addPerson" value="Pridaj!"></td></tr>
			</table>
		</form>
	</div>
</div>


<?php }?>
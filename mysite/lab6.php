		<form method="POST">
			Название cookie:<br>
			<input type="text" name="cookiename" class="input" required /><br>
			Значение cookie:<br>
			<input type="text" name="cookievalue" class="input" required /><br>
			<br><h3>Время действия cookie:</h3>
			Количество дней:<br>
			<input type="text" name="cookiedays" class="input"/><br>
			Количество часов:<br>
			<input type="text" name="cookiehours" class="input"/><br>
			Количество минут:<br>
			<input type="text" name="cookieminutes" class="input"/><br>
			Количество секунд:<br>
			<input type="text" name="cookieseconds" class="input"/><br>
			<br><input name="setcookie" type="submit" value="Добавить cookie" class="button" />		
		</form>

<?php
	if (count($_COOKIE) != 0) {
  		foreach ($_COOKIE as $key => $value) {      
    		echo '<br><a class="a" href="labs.php?page=lab6&cookiename='.$key.'">Удалить| '.$key." --> ".$value.'</a><br>';
  		}
	}
?>
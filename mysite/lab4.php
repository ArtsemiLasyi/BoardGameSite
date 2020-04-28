<?php

	$arrayRegular = array(
		'green' => '/([A-ZА-ЯЁ][a-zа-яё]*)/u',           // слова с большой буквы
		'blue' => '/([0-9]+)/u',         // целые числа
		'red' => '/([0-9]+[.,][0-9]{1})\d*/u'                 // дроби
	);

	if(isset($_POST['text']) && ($_POST['text'] !== "")) {
    	$text = " " . $_POST['text'] . " ";
    	echo "Исходный текст: " . $text . "<br>";
    	$text = preg_replace($arrayRegular['green'], " <span class=\"green_text\">$0</span> ", $text);
    	$text = preg_replace($arrayRegular['red'], " <span class=\"red_text\">$1</span> ", $text);
    	$text = preg_replace($arrayRegular['blue'], " <span class=\"blue_text\">$0</span> ", $text);
   		echo "Обработанный текст:" . $text . "<br>";
	}
?>

<form method="post" class="form">  
        <textarea name="text" rows="7" cols="50" class="input"></textarea><br>
        <input type="submit" name="submit" value="Найти все" class="button">  
</form>


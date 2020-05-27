<?php

	$flag = true;

	$cookieName = $_POST['cookiename'] ?? "";   // Оператор объединения с null
	if ($cookieName === "")
		$flag = false;

	$cookieValue = $_POST['cookievalue'] ?? "";
	if ($cookieValue === "")
		$flag = false;

	$cookieDays = $_POST['cookiedays'] ?? "";
	if ($cookieDays === "")
		$cookieDays = 0;
	elseif (!is_numeric($cookieDays))
		$flag = false;

	$cookieHours = $_POST['cookiehours'] ?? "";
	if ($cookieHours === "")
		$cookieHours = 0;
	elseif (!is_numeric($cookieHours))
		$flag = false;

	$cookieMinutes = $_POST['cookieminutes'] ?? "";
	if ($cookieMinutes === "")
		$cookieMinutes = 0;
	elseif (!is_numeric($cookieMinutes))
		$flag = false;

	$seconds = $_POST['cookieseconds'] ?? "";
	if ($seconds === "")
		$seconds = 0;
	elseif (!is_numeric($seconds))
		$flag = false;

	$secondsInMinute = 60;
	$secondsInHour = $secondsInMinute * 60;
	$secondsInDay = $secondsInHour * 24;

	$cookieTime = time() + ($cookieDays*$secondsInDay)
					 	+ ($cookieHours*$secondsInHour)
					 	+ ($cookieMinutes*$secondsInMinute)
				     	+ $seconds;

	if ($flag)
		setcookie($cookieName, $cookieValue, $cookieTime);
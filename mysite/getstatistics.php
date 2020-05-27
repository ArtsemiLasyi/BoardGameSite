<?php

	define("host", "127.0.0.1");
    define("root", "root");
    define("password", "***********");
    define("database", "настольные игры");


    function checkMySQL($MySQL) {
        if (!$MySQL) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            return false;
        }
        return true;
    }

    $MySQL = mysqli_connect(host, root, password, database);
    if (!checkMySQL($MySQL))
        exit;
    $MySQL->set_charset('utf8');
	$timestamp =  date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']);
    $SQL = "INSERT INTO `посещение` (`время посещения`) VALUES ('".$timestamp."')";
    $request = mysqli_query($MySQL, $SQL);

    $timePeriod = $_GET['time_period'] ?? 'day';


    switch($timePeriod){
        case 'day':
            $SQL = "SELECT DISTINCT COUNT(*) as count, `время посещения` FROM `посещение` WHERE DATE(`время посещения`) = CURDATE()
                    GROUP BY UNIX_TIMESTAMP(`время посещения`) DIV 300";
            break;
        case 'week':
            $SQL = "SELECT DISTINCT COUNT(*) as count,`время посещения` FROM `посещение` WHERE YEARWEEK(`время посещения`)=YEARWEEK(NOW())
                    GROUP BY DAY(`время посещения`)";
            break;
        case 'month':
            $SQL = "SELECT DISTINCT COUNT(*) as count, `время посещения` FROM `посещение` WHERE MONTH(`время посещения`)=MONTH(NOW())
                    GROUP BY YEARWEEK(`время посещения`)";
            break;
        case 'year':
            $SQL = "SELECT DISTINCT COUNT(*) as count, `время посещения` FROM `посещение` WHERE YEAR(`время посещения`)=YEAR(NOW())
                    GROUP BY MONTH(`время посещения`)";
            break;    
    }

    $rows = array();
    $date = mysqli_query($MySQL, $SQL);
    while ($arrayData = mysqli_fetch_assoc($date)) {
        foreach ($arrayData as $value) {
            $rows[] = $value;
        }
    }

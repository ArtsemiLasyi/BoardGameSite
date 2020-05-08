        <form method="post" class="form">
            Введите количество записей для извлечения:<br>
        <input type="text" name="count" class="input" required><br>
        <input type="submit" class="button" value="Найти записи">
        </form><br>


<?php
    define("host", "127.0.0.1");
    define("root", "root");
    define("password", "не скажу");
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

    function getRandomValue($array) {
        $key = array_rand($array);
        return $array[$key];
    }

    $arrayTables = array();

    $MySQL = mysqli_connect(host, root, password, database);
    if (!checkMySQL($MySQL))
        exit;
    $MySQL->set_charset('utf8');
    $SQL = "SHOW TABLES";
    $request = mysqli_query($MySQL, $SQL);
    while ($arrayData = mysqli_fetch_assoc($request)) {
        foreach ($arrayData as $key => $value) {
            array_push($arrayTables, $value);
        }
    }

    echo '<table border="1" id="table_lab5">';
    foreach ($arrayTables as $key => $value) {
        $SQL = "SELECT * FROM `".$value."`";
        $request = mysqli_query($MySQL, $SQL);
        echo '<table border="2" id="table_lab5">';
        while ($arrayData = mysqli_fetch_assoc($request)) {
            echo '<table border="3" id="table_lab3">';
            foreach ($arrayData as $key => $value) {
                echo '<tr><td  id="file_lab3" width="50%">' . $key;
                echo '<td  id="directory_lab3" width="50%">' . $value;
            }
            echo '</td></tr>';
            echo "</table>";
        }
        echo "</table>";    
    }
    echo "</table>";
    mysqli_close($MySQL);


    if (isset($_POST['count'])) {
        if (intval($_POST['count']) > 0) {
            $MySQL = mysqli_connect(host, root, password, database);
            if (!checkMySQL($MySQL))
                exit;
            $MySQL->set_charset('utf8');
            $SQL = "SELECT DISTINCT * FROM `".getRandomValue($arrayTables)."` ORDER BY RAND() LIMIT ".intval($_POST['count']);
            $request = mysqli_query($MySQL, $SQL);
            while ($arrayData = mysqli_fetch_assoc($request)) {
                foreach ($arrayData as $key => $value) {
                    echo $key.":".$value . "<br>";
                }
            }
            mysqli_close($MySQL);
        } 
        else {
            echo "Необходимо ввести число, большее нуля!";
        }
    }
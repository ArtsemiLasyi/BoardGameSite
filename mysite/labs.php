<?php

   include_once('getstatistics.php');
   include_once('sendmail.php');


   if(isset($_GET['cookiename'])) {
       setcookie($_GET['cookiename'], null, -1);
       header("Location: labs.php?page=lab6");
   }

   if(isset($_POST['setcookie'])){
       include('cookie.php');
       header("Location: labs.php?page=lab6");
   }

?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Главная страница сайта" />
    <meta name="keywords" content="Настольня, настольные игры" />
    <meta
      name="viewport"
      content="width=device-width, height=device-height, initial-scale=1.0"
    />
    <link rel="shortcut icon" href="images/logo.png" type="image/png" />
    <title>Всё и всем про настольные игры</title>
    <?php
      $variant = 4;
      $fileName='';
      $page = 'page';
      $css = 'css/';
      $main = 'index';

      $arrayLabMenu = array(
        'Вторая' => 'lab2',
        'Третья' => 'lab3',
        'Четвертая' => 'lab4',
        'Пятая' => 'lab5',
        'Шестая'=> 'lab6',
        'Седьмая' => 'lab7',
        'Восьмая' => 'lab8'
      );
      $arrayMenu = array(
        'Главная' => $main,
        'Новости' => 'news',
        'Контакты' => 'contacts', 
        'Дополнительно' => 'adding',  
        'Игры' => 'games',
        'Войти' => 'account'
      );


      if (isset($_GET[$page])){
        foreach ($arrayLabMenu as $key => $arrayElement) {
          if ($key === $_GET[$page]){
            $fileName = $arrayElement . '.css';
          }
        }
      }
      else{
        $fileName = "labs.css";
      }
    ?>

    <link rel="stylesheet" type="text/css" href="<?php echo $css . $fileName; ?>">
    <link href="css/common.css" rel="stylesheet" type="text/css">
  </head>
  <body class="body">
    <div class="container">
      <header class="header">
        <img src="images/logo.png" class="logo" />
        <h1 class="title">НАСТОЛЬНЯ<br />Все и всем о настольных играх</h1>
      </header>
      <menu class="menu">
        <?php
          foreach ($arrayMenu as $key => $arrayElement) {
            echo '<form method="get" class = "a" action="index.php">';
            if ((isset($_GET[$page]) && ($key === $_GET[$page]))) {
            ?>
              <input type="submit" name="page" class="active_a" value="<?php echo $key; ?>"> 
            <?php
            }
            else{
            ?>
              <input type="submit" name="page" class="a" value="<?php echo $key; ?>">
            <?php
            }
            echo '</form>';
          }
        ?>
      </menu>
      <content class="content">
        <?php
          foreach ($arrayLabMenu as $key => $arrayElement) {
            if ((isset($_GET[$page])) && ($arrayElement === $_GET[$page])) {
              $fileName = $arrayElement . '.php';
              include $fileName;
              break;
            }
          }
          if (!isset($_GET[$page])) {
            $i = 2;
            foreach ($arrayLabMenu as $key => $arrayElement) {
              ?>
              <a href="<?php echo 'labs.php?page='. $arrayElement;?>" class="news"><?php echo "Лабораторная работа №" . $i . ". Вариант " . $variant;?></a><br>

        <?php
              $i++;
            }
          }
        ?>
      </content>
      <footer class="footer">
        <h4>
          Настольня. Все права защищены. 2020
        </h4>
      </footer>
    </div>
  </body>
</html>

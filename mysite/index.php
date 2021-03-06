<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Главная страница сайта" />
    <meta name="keywords" content="Настольня, настольные игры" />
    <meta http-equiv="refresh" content="60" />
    <meta
      name="viewport"
      content="width=device-width, height=device-height, initial-scale=1.0"
    />
    <link rel="shortcut icon" href="images/logo.png" type="image/png" />
    <title>Всё и всем про настольные игры</title>
    <?php
      $fileName='';
      $page = 'page';
      $css = 'css/';
      $main = 'index';
      $arrayMenu = array(
        'Главная' => $main,
        'Новости' => 'news',
        'Контакты' => 'contacts', 
        'Дополнительно' => 'adding',  
        'Игры' => 'games',
        'Войти' => 'account'
      );
      if (isset($_GET[$page])){
        foreach ($arrayMenu as $key => $arrayElement) {
          if ($key === $_GET[$page]){
            $fileName = $arrayElement . '.css';
          }
        }
      }
      else{
        $fileName = "index.css";
      }
    ?>
    <link rel="stylesheet" type="text/css" href=<?php echo $css . $fileName; ?>>
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
            if ((isset($_GET[$page]) && ($key === $_GET[$page]))||((!isset($_GET[$page]))&&($arrayElement === $main))) {
            ?>
              <input type="submit" name="page" class="active_a" value=<?php echo $key; ?>> 
            <?php
            }
            else{
            ?>
              <input type="submit" name="page" class="a" value=<?php echo $key; ?>>
            <?php
            }
            echo '</form>';
          }
        ?>
      </menu>
      <content class="content">
        <?php
          foreach ($arrayMenu as $key => $arrayElement) {
            if ((isset($_GET[$page]) && ($key === $_GET[$page]))||((!isset($_GET[$page]))&&($arrayElement === $main))) {
              if ($main === $arrayElement){
                $arrayElement = 'main';
              }
              $fileName = $arrayElement . '.php';
              include $fileName;
              break;
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

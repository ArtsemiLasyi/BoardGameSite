        <ul>
          <?php
            $URL = $_SERVER['REQUEST_URI'];
            $navs = array('Для всей семьи', 'На весь вечер', 'Для перерыва', 'Для двоих');
            if(isset($_GET['id']))
              $id = $_GET['id'];
            else 
              $id = 0;
          ?>    
          <?php
            foreach($navs as $key => $nav):
          ?>        
          <li <?php if($key == $id) echo 'class="active_a"';?> >
          <a href="labs.php?page=lab2&id=<?=$key?>" class="a"><?=$nav?></a>
          </li>
          <?php        
            endforeach;
          ?>
        </ul>
        <br>
        <form method="post" class="form">
          <h3>Массив 1:</h3><input type="text" name="arrayFirst" class="input"><br><br>
          <h3>Массив 2:</h3><input type="text" name="arraySecond" class="input"><br><br>
          <input type="Submit" value="Соединить массивы" class="button">
        </form>
        <?php
          if (isset($_POST['arrayFirst']) and isset($_POST['arraySecond']))
          {
            $arrayFirst = str_replace(" ", "", $_POST['arrayFirst']);
            $arraySecond = str_replace(" ", "", $_POST['arraySecond']);
            $arrayFirst = explode(",", $arrayFirst);
            $arraySecond = explode(",", $arraySecond);
        
            foreach($arraySecond as $arrayElement)
              $arrayFirst[] = $arrayElement;
            
            echo "Четные элементы:";    
            foreach($arrayFirst as $evenElement)
              if((intval($evenElement) % 2 == 0) && is_integer($evenElement))
                echo $evenElement . " ";    
          }
        ?>
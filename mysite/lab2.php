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
        <form method="post">
          <b>Массив 1:</b><input type="text" name="arrayFirst"><br>
          <b>Массив 2:</b><input type="text" name="arraySecond"><br>
          <input type="Submit" value="Соединить массивы">
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
              if((intval($evenElement) % 2 == 0))
                echo $evenElement." ";    
          }
        ?>
<?php

function scanDirectory($dir)
{
    error_reporting(0);
    $count = 0;
    $listDirFile = scandir($dir);

    unset($listDirFile[array_search('.', $listDirFile, true)]);      // жесткая ссылка на эту папку
    unset($listDirFile[array_search('..', $listDirFile, true)]);     // жесткая ссылка на родительскую папку 

    if (count($listDirFile) == 0)
        return 0;

    echo '<table border="1" id="table_lab3">';
    foreach ($listDirFile as $elementDirFile) {
        $element = $dir . '/' . $elementDirFile;
        if(is_dir($element))
        {
            echo '<tr><td id="directory_lab3">' . $elementDirFile;
            $count += scanDirectory($element); 
        }
        else if (is_file($element))
        {
            echo '<tr><td id="file_lab3">' . $elementDirFile;
            $count += filesize($element);
        }
        echo '</td></tr>';
    }
    echo '</table>';
    return $count;
}


$condition = (isset($_POST['directory']) && ($_POST['directory'] !== ""));
if ($condition) {
    $count = scanDirectory($_POST['directory']);
    echo "<h3>Размер файлов составляет $count"." байт</h3>";
}

?>

<form  method="POST" class="form">
    <input type="text" name="directory" placeholder="Введите директорию" class="input"/><br><br>
    <input type="submit" value="Сканировать" class="button">
</form>
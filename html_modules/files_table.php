<meta charset="utf-8" />
<link rel="stylesheet" href="../css_modules/files_table_style.css">

<div class="files-table">
    <!--Таблица файлов-->
    <table>
        <!--Заголовки таблицы-->
        <tr>
            <th>Файл</th>
            <th>Расширение</th>
            <th>Размер</th>
            <th>Дата создания</th>
            <th>Действия</th>
        </tr>

        <?php
            //Создаем строки в таблице на основе полученных файлов
            foreach ($files as $file){
                //Убираем точки
                if ($file == "." || $file == "..") continue; 

                //Получаем информацию о файле
                $fileExt = getFileExt($file); //Расширение
                $fileSize = getFilesize($dir.'/'.$file); //Размер
                $fileTime = date("F d Y H:i:s.",filectime($dir.'/'.$file)); //Время создания
                $fileIcon = '../img/ufile_icon.png';
                $fileLink = $dir.'/'.$file;

                //Проверяем является ли директорией
                if (is_dir($dir.'/'.$file)) {
                    $fileLink = '?path='.$dir.'/'.$file;
                    $fileIcon = '../img/folder_icon.png';
                    $fileExt = 'Папка';
                }

                switch ($variable) {
                    case 'value':
                        # code...
                        break;
                    
                    default:
                        # code...
                        break;
                }
                
                echo '<tr>'.'
                <td>'.'<a href="'.$fileLink.'"><img src="'.$fileIcon.'" width="18px"><p>'.$file.'</p></a>'.'</td>'.' 
                <td>'.$fileExt.'</td> 
                <td>'.$fileSize.'</td> 
                <td>'.$fileTime.'</td>'.'
                <td>
                    <div class="actions">
                        <a href="../scripts/deleteFile.php?file='.$dir.'/'.$file.'"><img src="../img/delete_icon.png" width="20px"></a>
                    </div>
                </td>
                </tr>';
            }
        ?>
    </table>
</div>
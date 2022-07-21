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
                $fileIcon = '../img/ftypes_icons/ufile_icon.png';
                $fileLink = $dir.'/'.$file;
                $linkClass = 'ufile';

                //Проверяем является ли директорией
                if (is_dir($dir.'/'.$file)) {
                    $fileLink = '?path='.$dir.'/'.$file;
                    $fileIcon = '../img/ftypes_icons/folder_icon.png';
                    $fileExt = 'Папка';
                    $linkClass = 'folder';
                }

                //Проверяем расширение файла на вариант открытия
                switch (true) {
                    case preg_match('/jpg|jpeg|png/', $fileExt):
                        $linkClass = 'pic lightzoom';
                        break;
                    case preg_match('/txt|html|css|js|php|c|cs|cpp|h|/', $fileExt):
                        $linkClass = 'text';
                        break;
                }

                //Иконки
                switch ($fileExt) {
                    case 'jpg': $fileIcon = '../img/ftypes_icons/ft_jpg_i.png'; break;
                    case 'png': $fileIcon = '../img/ftypes_icons/ft_png_i.png'; break;
                    case 'css': $fileIcon = '../img/ftypes_icons/ft_css_i.png'; break;
                    case 'html': $fileIcon = '../img/ftypes_icons/ft_html_i.png'; break;
                    case 'js': $fileIcon = '../img/ftypes_icons/ft_js_i.png'; break;
                    case 'json': $fileIcon = '../img/ftypes_icons/ft_json_i.png'; break;
                    case 'pdf': $fileIcon = '../img/ftypes_icons/ft_pdf_i.png'; break;
                    case 'png': $fileIcon = '../img/ftypes_icons/ft_png_i.png'; break;
                    case 'txt': $fileIcon = '../img/ftypes_icons/ft_txt_i.png'; break;
                    case 'xml': $fileIcon = '../img/ftypes_icons/ft_xml_i.png'; break;
                    case 'zip': $fileIcon = '../img/ftypes_icons/ft_zip_i.png'; break;
                }
                
                //Вывод таблицы файлов
                echo '<tr>'.'
                <td>'.'<a href="'.$fileLink.'" class="'.$linkClass.'" ><img src="'.$fileIcon.'" width="18px"><p>'.$file.'</p></a>'.'</td>'.' 
                <td>'.$fileExt.'</td> 
                <td>'.$fileSize.'</td> 
                <td>'.$fileTime.'</td>'.'
                <td>
                    <div class="actions">
                        <a title="Удалить" href="../scripts/deleteFile.php?file='.$dir.'/'.$file.'"><img src="../img/delete_icon.png" width="20px"></a>
                        <a title="Скачать" download="" href="'.$fileLink.'"><img src="../img/download_icon.png" width="20px"></a>
                    </div>
                </td>
                </tr>';
            }
        ?>
    </table>
</div>

<script type="text/javascript">
  jQuery('.lightzoom').lightzoom();
</script> 
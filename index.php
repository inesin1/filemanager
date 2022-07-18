<?php 
    session_start();

    include 'data/functions.php'; //Функции
    include 'data/variables.php'; //Переменные

    //Получаем файлы из текущей директории
    if ($_GET['path']) 
        $dir = $_GET['path'];
    else
        $dir = 'storage';
    $files = scandir($dir);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_modules/main.css">
    <title>Сервер neserv | Файловый менеджер</title>
</head>
<body>
    <?php 
    include 'html_modules/header.php';

    if($_SESSION['user']['name']) {
        include 'html_modules/navigation.php';
        include 'html_modules/files_table.php';
        include 'html_modules/view_file.php';
    }
    else {
        include 'html_modules/auth.php';
    }
    ?>
</body>
</html>
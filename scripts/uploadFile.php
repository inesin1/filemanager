<?php
session_start();

$message = ''; 
if (isset($_POST['upload-button']))
{
  if ($_FILES) {
    //Получаем директорию для загрузки
    $dir = $_POST['dir'];

    //Добавляем слеш в конец директории, если нету
    if (substr($dir, -1) != '/') $dir = $dir.'/';

    foreach ($_FILES['uploadedFiles']['error'] as $key => $error) {
      if ($error == UPLOAD_ERR_OK) {
        // Получаем инфу о загруженном файле
        $fileTmpPath = $_FILES['uploadedFiles']['tmp_name'][$key];
        $fileName = $_FILES['uploadedFiles']['name'][$key];
        $fileSize = $_FILES['uploadedFiles']['size'][$key];
        $fileType = $_FILES['uploadedFiles']['type'][$key];
        $fileNameCmps = explode(".", $fileName);
        $fileExt = end($fileNameCmps);

        //Если файл с таким именем уже существует, даем ему новое страшное имя
        if (file_exists($dir . $fileName))
          $newFileName = md5(time() . $fileName) . '.' . $fileExt;
        else
          $newFileName = $fileName;

        //Полный путь к файлу
        $dest_path = $dir . $newFileName;
    
        //Загружаем файл
        if(move_uploaded_file($fileTmpPath, $dest_path)) 
        {
          $message ='Успешно!';
        }
        else 
        {
          $message = 'Ошибка доступа к директории!';
        }
      }
    }
  }
}

$_SESSION['message'] = $message;
header("Location: ../index.php?path=".$dir);
?>
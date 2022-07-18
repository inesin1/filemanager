<?php
session_start();

$message = ''; 
if (isset($_POST['upload-button']))
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // Получаем инфу о загруженном файле
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExt = end($fileNameCmps);

    $dir = $_POST['dir'];

    if (substr($dir, -1) != '/')
      $dir = $dir.'/';
    
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

    if (file_exists($dir . $fileName))
      $newFileName = md5(time() . $fileName) . '.' . $fileExt;
    else
      $newFileName = $fileName;

    if (in_array($fileExt, $allowedfileExtensions))
    {
      $dest_path = $dir . $newFileName;
      print($dest_path);

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='Успешно!';
      }
      else 
      {
        $message = 'Ошибка доступа к директории!';
      }
    }
    else
    {
      $message = 'Ошибка! Доступные типы файлов: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'Ошибка!.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: ../index.php");
?>
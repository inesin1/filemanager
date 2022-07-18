<?php
    $file = '../'.$_GET['file'];

    if(is_dir($file))
        rmdir($file);
    else
        unlink($file);

    header("Location: ../index.php");
?>
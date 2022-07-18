<?php
//user
$u_name = $_SESSION['user']['name'];
$u_perms = $_SESSION['user']['permissions'];

$header_userdata = '<div class="header_user"><p>'.$u_name.'</p><a href="../scripts/logout.php">Выход</a></div>';
$nav_upload_button = '<button class="nav-button" id="upload-button"><img src="../img/upload_icon.png" width="24px"><p>Загрузить</p></button>';
?>
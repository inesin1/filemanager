<?php
session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$json = file_get_contents('../data/users.json');
$users = json_decode($json, true);

foreach ($users as $userId => $userData) {
    if($login == $userData['login'] & $password == $userData['password']) {
        $_SESSION['user'] = [
            'name' => $login,
            'permissions' => $userData['permissions']
        ];

        header("Location: ../index.php");
    }
}

$_SESSION['message'] = 'Неправильный логин или пароль!';
header("Location: ../index.php");
?>
<meta charset="utf-8" />
<link rel="stylesheet" href="../css_modules/auth_style.css">

<form method="post" action="../scripts/checkAuth.php" class="auth-form">
    <p class="auth-form_header">Логин</p>
    <input type="text" name="login" placeholder="Логин" class="auth-form_input">
    <br>
    <p class="auth-form_header">Пароль</p>
    <input type="password" name="password" placeholder="Пароль" class="auth-form_input">
    <input type="submit" value="Войти" class="auth-form_input" id="a_submit">
</form>
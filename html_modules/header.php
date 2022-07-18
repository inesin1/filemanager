<meta charset="utf-8" />
<link rel="stylesheet" href="../css_modules/header_style.css">
<header>
    <div class="header_title">
        <h1>Сервер neserv</h1>
        <h3>Файловый менеджер</h3>
    </div>

    <?php 
    if($_SESSION['user'])
        echo $header_userdata;
    ?>
</header>
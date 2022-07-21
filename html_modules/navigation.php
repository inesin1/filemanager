<meta charset="utf-8" />
<link rel="stylesheet" href="../css_modules/navigation_style.css">

<div class="navigation">
    <a href="?path=<?=substr($dir, 0, strrpos($dir, '/'))?>" id="back-button" class="nav-button"><img src="../img/back_icon.png" width="20px"></a>
    <a href="?path=storage" id="home-button" class="nav-button"><img src="../img/home_icon.png" width="24px"></a>

    <!--Поле с текущим расположением-->
    <form method="get" action="scripts/updatePath.php" class="path-form">
        <input type="text" name="path" id="path-text" value="<?=$dir?>">
        <input type="submit" value="ОК" id="path-button">
    </form>

    <?php
    if($u_perms == 'all')
        echo $nav_upload_button;
    ?>

    <form method="POST" action="../scripts/uploadFile.php" enctype="multipart/form-data" class="upload-form">
        <input type="file" name="uploadedFiles[]" multiple/>
        <input type="hidden" value="../<?=$dir?>/" name="dir"/>
        <input type="submit" name="upload-button" value="ОК" class="nav-button" id="upload-button"/>

        <p><?=$_SESSION['message']?></p>
    </form>

    <script src="../scripts/openUploadForm.js"></script>
</div>
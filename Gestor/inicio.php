<?php
session_start();
if (empty($_SESSION['UseR'])) {
    echo"<script>document.location=('index.php');</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>
    </head>
    <body>
        <?php include_once './mods/nav.html'; ?>
        <div id="Principal">
            <div style="text-align:right;font-size:14px;padding:3px;background-color:#fff;color:#333;">
                <div style=" 
                     background-position:center;
                     background-repeat: no-repeat;margin-left:auto;margin-right:auto;font-size:20px;width:100%;text-align:center;color:#FF9900;"><br /><br />
                    <h1 style="margin-top:20px;width:500px;border:solid 1px #FF6633;border-radius:15px 0px 15px 0px;margin-left:auto;margin-right:auto;padding:8px;box-shadow:0px 0px 5px #999999;"><img src="../img/Logo.png" ><br />Bienvenido</h1>
                </div>
            </div>
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>
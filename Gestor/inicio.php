<?php
session_start();
if (empty($_SESSION['UseR'])) {
    echo"<script>document.location=('index.php');</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Feria Virtual De EducaciónFeria Virtual De Educación</title>

        <link href="../css/estilos-gestor.css" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="../js/jquery-1.11.3.js"></script>


    </head>

    <body>
        <div id="Principal">
           <div style="text-align:right;font-size:14px;padding:3px;background-color:#fff;color:#333;">
                <?php
                if (!empty($_SESSION['UseR'])) {
                    echo "Identificado Como: " . $_SESSION['Name'] . " <a href='index.php' style='margin-left:7px;margin-right:10px; color: #09C;font-size:16px;font-weight:bold'>Cerrar Sesion</a>
					</div>";
                    include("mods/nav.html");
                }
                ?>
                <div style=" 
                     background-position:center;
                     background-repeat: no-repeat;margin-left:auto;margin-right:auto;font-size:20px;width:100%;text-align:center;color:#FF9900;"><br /><br />

                    <h1 style="margin-top:20px;width:500px;border:solid 1px #FF6633;border-radius:15px 0px 15px 0px;margin-left:auto;margin-right:auto;padding:8px;box-shadow:0px 0px 5px #999999;"><img src="../img/Logo.png" ><br />Bienvenido</h1>

                </div>
            </div>
            <?php
            $variable = file_get_contents("mods/pie.html");
            echo $variable;
            ?>
    </body>
</html>
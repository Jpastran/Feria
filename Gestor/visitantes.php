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
        <form class="form-inline">
            <div class="form-group">
                <label for="Inicio">Fecha Inicio</label>
                <input name="Inicio" type="date" class="box form-control" id="Inicio" size="10"/>
            </div>
            <div class="form-group">
                <label for="Final">Fecha Final</label>
                <input name="Final" type="date" class="box form-control" id="Final" size="10"/>
            </div>
            <input type="button" id="Buscar" class="button" value="Generar" />
            <input type="button" id="descargar" class="button" value="Descargar" />
        </form> 
        <div id="contenido">            
        </div>        
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>
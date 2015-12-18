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
            <div id="principal">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="nombre" class="col-sm-3 control-label">Imagen</label>
                        <div class="col-sm-6">
                            <input id="Imagen" type="file" name="Imagen" class="control-label"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="button" name="btnNuevo" id="btnNuevo" class="button" value="Guardar" />
                        </div>
                        <div class="col-sm-5">
                            <span id="respu" class="text-primary"></span>
                        </div>
                    </div>
                </form> 
                <div id="contenido">
                    Cargando por favor espere...
                </div>
            </div>
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>
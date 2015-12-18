<?php
session_start();
if (empty($_SESSION['UseR'])) {
    header('Location: index.php');
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
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="Usuario" class="col-sm-3 control-label">Usuario</label>
                    <div class="col-sm-6">
                        <input name="Usuario" type="text" class="form-control box" id="Usuario" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="Nombre" class="col-sm-3 control-label">Nombre </label>
                    <div class="col-sm-6">
                        <input name="Nombre" type="text" class="form-control box" id="Nombre" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass" class="col-sm-3 control-label">Contraseña</label>
                    <div class="col-sm-6">
                        <input name="pass" type="password" class="form-control box" id="pass" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-4">
                        <input type="button" name="btnNuevo" id="btnNuevo" class="button" value="Guardar" />
                        <input type="button" name="btnEditar" id="btnEditar" class="button" value="Editar" />
                        <input type="button" name="btnCancelar" id="btnCancelar" class="button" value="Cancelar" />
                    </div>
                    <div class="col-sm-5">
                        <input type="hidden" id="Codigo" value=""/>
                        <span id="respu" class="text-primary"></span>
                    </div>
                </div>
            </form> 
            <div id="contenido">
                Cargando, Espere Por Favor...
            </div>
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>
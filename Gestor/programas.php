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
                    <label for="Nombre" class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-6">
                        <input name="Nombre" type="text" class="form-control box" id="Nombre" value=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Descripcion" class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-6">
                        <input name="Descripcion" type="text" class="form-control box" id="Descripcion" value=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Oferta" class="col-sm-3 control-label">Oferta</label>
                    <div class="col-sm-6">
                        <select name='Oferta' id='Oferta' class="form-control">
                            <option value='-1' selected='selected'>Selecccionar...</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Areas" class="col-sm-3 control-label">Areas</label>
                    <div class="col-sm-4">
                        <select name='Areas' id='Areas' class="form-control">
                            <option value='-1' selected='selected'>Selecccionar...</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Imagen" class="col-sm-3 control-label">Imagen</label>
                    <div class="col-sm-4">
                        <input id="Imagen" type="file" name="Imagen" class="control-label"/>
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
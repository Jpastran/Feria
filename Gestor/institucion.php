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
        <form class="form-horizontal">
            <div class="form-group">
                <label for="nombre" class="col-sm-3 control-label">Nombre Intitucion</label>
                <div class="col-sm-6">
                    <input name="nombre" type="text" class="form-control box" id="Nombre"/>
                </div>
            </div>
            <div class="form-group">
                <label for="departamento" class="col-sm-3 control-label">Departamento</label>
                <div class="col-sm-4">   
                    <select name='departamento' id='Departamento' class="form-control" >
                        <option value='-1' selected='selected'>Selecccionar...</option>
                        <option value='Atlantico'>Atlantico</option>
                        <option value='Bolivar'>Bolivar</option>
                        <option value='Cesar'>Cesar</option>
                        <option value='Cordoba'>Cordoba</option>
                        <option value='Guajira'>Guajira</option>
                        <option value='Magdalena'>Magdalena</option>
                        <option value='Sucre'>Sucre</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="categoria" class="col-sm-3 control-label">Categoria</label>
                <div class="col-sm-4">   
                    <select name='categoria' id='Categoria' class="form-control">
                        <option value='-1' selected='selected'>Selecccionar...</option>
                        <option value='Universidades'>Universidades</option>
                        <option value='Instituciones'>Instituciones Para El Trabajo</option>
                        <option value='Idiomas'>Centro De Idiomas</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="logo" class="col-sm-3 control-label">Imagen Logo</label>
                <div class="col-sm-6">
                    <input name="logo" type="file" class="control-label" id="Logo"/>
                </div>
            </div>
            <div class="form-group">
                <label for="banner" class="col-sm-3 control-label">Imagen Banner</label>
                <div class="col-sm-6">
                    <input name="banner" type="file" class="control-label" id="Banner"/>
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
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>
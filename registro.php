<?php
session_start();
if(isset($_SESSION['Nombre'])){
    header('Location: datos.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
        <?php include_once './mods/nav.html'; ?>
        <!--//TODO cambiar los <select> grandes hacia BD-->
        <div id="formRegistro" class="contenido panel panel-warning">
            <form class="registro form-horizontal">
                <h3 id="titu1">INFORMACIÓN BÁSICA</h3>
                <div class="form-group">                    
                    <label for="Identificacion" class="control-label col-sm-2">Numero de ID</label >
                    <div class="col-sm-4">    
                        <input name="Identificacion" type="text" class="box form-control" id="Identificacion" value="" required/>
                    </div>
                    <label for="Tipo" class="control-label col-sm-2">Tipo de ID</label>
                    <div class="col-sm-4">                       
                        <select name="Tipo" id="Tipo" class="form-control">
                            <option value="Tarjeta De Identidad">Tarjeta De Identidad</option>
                            <option value="Registro Civil">Registro Civil</option>
                            <option value="Cedula Ciudadania">Cedula Ciudadania</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Nombres" class="control-label col-sm-2">Nombres</label>
                    <div class="col-sm-4">
                        <input name="Nombres" type="text" class="box form-control" id="Nombres" value="" required/>
                    </div>
                    <label for="Apellidos" class="control-label col-sm-2">Apellidos</label>
                    <div class="col-sm-4">  
                        <input name="Apellidos" type="text" class="box form-control" id="Apellidos" value="" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Tel">Teléfono</label>
                    <div class="col-sm-4">
                        <input name="Tel" type="text" class="box form-control" id="Tel" value="" required/>
                    </div>
                    <label class="control-label col-sm-2" for="Celular">Celular</label>
                    <div class="col-sm-4">
                        <input name="Celular" type="text" class="box form-control" id="Celular"  value="" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Correo">Correo Electrónico</label>
                    <div class="col-sm-4">
                        <input name="Correo" type="text" class="box form-control" id="Correo"  value="" required/>
                    </div>
                    <label class="control-label col-sm-2" for="oCorreo">Correo Alternativo</label>
                    <div class="col-sm-4">
                        <input name="oCorreo" type="text" class="box form-control" id="oCorreo"  value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5 alert-warning" for="Terminos">
                        Al registrarte aceptas las
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#condicion"> Condiciones de servicios</a>
                        y la
                        <a href="#" class="alert-link" data-toggle="modal" data-target="#politica"> Politica de privacidad</a>
                    </label>                      
                    <div class="col-sm-2">
                        <input type="submit" class="button" value="Finalizar Registro" />
                    </div>
                    <div class="col-sm-5">
                        <!--mirar un Dismissible popover-->
                        <div class="alert none" role="alert" id="Resp"></div>
                    </div>
                </div>              
            </form>
        </div>
        <!-- Modals -->
        <div class="modal fade" id="condicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <?php include_once './mods/servicio.html'; ?>
        </div>
        <div class="modal fade" id="politica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <?php include_once './mods/privacidad.html'; ?>
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>

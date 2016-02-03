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
            <form class="form-horizontal" id="formInfo">
                <div class="form-group">
                    <label for="Mision" class="col-sm-3 control-label"><h3>Mision</h3></label>
                    <div class="col-sm-8">
                        <textarea name="Mision" class="box form-control" rows="4" id="Mision"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Vision" class="col-sm-3 control-label"><h3>Vision</h3></label>
                    <div class="col-sm-8">
                        <textarea name="Vision" class="box form-control" rows="4" id="Vision"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Quienes" class="col-sm-3 control-label"><h3>Quienes Somos</h3></label>
                    <div class="col-sm-8">
                        <textarea name="Quienes" class="box form-control" rows="4" id="Quienes"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Objetivos" class="col-sm-3 control-label"><h3>Objetivos</h3></label>
                    <div class="col-sm-8">
                        <textarea name="Objetivos" class="box form-control" rows="4" id="Objetivos" ></textarea>
                    </div>                
                </div>
                <div class="form-group">
                    <label for="Producto" class="col-sm-3 control-label"><h3>Producto</h3></label>
                    <div class="col-sm-8">
                        <textarea name="Producto" class="box form-control" rows="4" id="Producto" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Correos" class="col-sm-3 control-label"><h3>Correos</h3></label>
                    <div class="col-sm-8">
                        <textarea name="Correos" class="box form-control" rows="4" id="Correos" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-8">
                        <input type="button" id="btnEditar" class="button" value="Actualizar Informacion" />      
                        <span id="respu" class="text-primary"></span>
                    </div>
                </div>
            </form>
        </div>       
        <div id="contenido">
            Cargando, Espere Por Favor...
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>
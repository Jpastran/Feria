<?php
session_start();
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
        <div id="formDatos" class="contenido panel panel-warning">
            <form id="actDatos" class="registro form-horizontal">
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
                        <input name="Correo" type="text" class="box form-control" id="Correo"  value="<?php echo $_SESSION['Correo']; ?>" required/>
                    </div>
                    <label class="control-label col-sm-2" for="oCorreo">Correo Alternativo</label>
                    <div class="col-sm-4">
                        <input name="oCorreo" type="text" class="box form-control" id="oCorreo"  value="" />
                    </div>
                </div>               
                <h3 id="titu2">INFORMACIÓN SOCIAL</h3>              
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Dir">Dirección </label>
                    <div class="col-sm-4">
                        <input name="Dir" type="text" class="box form-control" id="Dir" value=""/>
                    </div>
                    <label class="control-label col-sm-2" for="Ciudad">Ciudad</label>
                    <!--//TODO cambiar por un <select>-->
                    <div class="col-sm-3">
                        <input name="Ciudad" type="text" class="box form-control" id="Ciudad" value="" />
                    </div>
                    <!--<label class="control-label col-sm-2" for="Barrio">Barrio </label>
                    <div class="col-sm-4">
                        <input name="Barrio" type="text" class="box form-control" id="Barrio" value="" />
                    </div>-->
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Multiculturalidad">Multiculturalidad</label>
                    <div class="col-sm-4">
                        <select name="Multiculturalidad" id="Multiculturalidad" class="form-control">
                            <option value="Ninguna" selected="selected">Ninguna</option>
                            <option value="Afrodecendiente">Afrodecendiente</option>
                            <option value="Cabeza De Familia">Cabeza De Familia</option>
                            <option value="Desplazado">Desplazado</option>
                            <option value="Indígena">Indígena</option>
                            <option value="Población De Frontera ">Población De Frontera </option>
                            <option value="Población Room">Población Room</option>
                            <option value="Reinsertado">Reinsertado</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <label class="control-label col-sm-2" for="SISBEN">SISBEN</label>
                    <div class="col-sm-3">
                        <select name="SISBEN" id="SISBEN" class="form-control">
                            <option value="-1">Seleccione...</option>
                            <option value="No">No</option>
                            <option value="Si">Si</option>                            
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-8" for="recursos">¿Cuenta con los recursos economicos para pagar sus estudios?</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="recursos" id="recursos">
                            <option value="-1">Seleccione...</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-8" for="Medio">Medio  por el que ingresa a la educación superior</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="Medio" id="Medio" >
                            <option value="-1">Seleccione...</option>
                            <option value="Pago Inmediato">Pago Inmediato</option>
                            <option value="Pago Financiado">Pago Financiado</option>
                            <option value="Credito">Credito</option>
                            <option value="Beca">Beca</option>
                            <option value="Pago">Pago</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-8" for="apoyo">¿Quien es su apoyo económico?</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="apoyo" id="apoyo">
                            <option value="-1">Seleccione...</option>
                            <option value="Padres">Padres</option>
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                            <option value="Tios">Tios</option>
                            <option value="Abuelos">Abuelos</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-6" for="Napoyo">Nombre completo de su apoyo economico</label>
                    <div class="col-sm-5">
                        <input name="Napoyo" type="tel" class="box form-control" id="Napoyo"  value=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-6" for="Tapoyo">Telefono(s) de su apoyo economico</label>
                    <div class="col-sm-5">
                        <input name="Tapoyo" type="text" class="box form-control" id="Tapoyo"  value=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-6" for="Capoyo">Correo(s) de su apoyo economico</label>
                    <div class="col-sm-5">
                        <input name="Capoyo" type="text" class="box form-control" id="Capoyo"  value=""/>
                    </div>
                </div>
                <h3 id="titu3">INFORMACIÓN ACADEMICA</h3>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Colegio">Colegio</label>
                    <div class="col-sm-8">
                        <input name="Colegio" type="text" class="box form-control" id="Colegio" value=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Grado">Grado Actual</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="Grado" id="Grado" >
                            <option value="-1">Seleccione...</option>
                            <option value="11 Grado">11 Grado</option>
                            <option value="10 Grado">10 Grado</option>
                            <option value="9 Grado">9 Grado</option>
                            <option value="Graduado">Graduado</option>
                        </select>
                    </div>
                    <label class="control-label col-sm-2" for="Puntaje">Puntaje ICFES</label>
                    <div class="col-sm-3">
                        <input name="Puntaje" type="text" class="box form-control" id="Puntaje" value=""/>
                    </div>
                    <!--<label class="control-label col-sm-2" for="Puesto">Puesto ICFES</label>
                    <div class="col-sm-3">
                        <input name="Puesto" type="text" class="box form-control" id="Puesto" value=""/>
                    </div>-->
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="Programa1">Programa Preferente</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="Programa1" id="Programa1" >
                            <option value="-1">Seleccione...</option>
                            <option value="Ingenieria Industrial">Ingenieria Industrial</option>
                            <option value="Ingenieria Civil">Ingenieria Civil</option>
                            <option value="Ingenieria De Sistemas">Ingenieria De Sistemas</option>
                            <option value="Ingenieria Ambiental ">Ingenieria Ambiental</option>
                            <option value="Ingenieria Electrica ">Ingenieria Electrica</option>
                            <option value="Administracion De Empresas">Administracion De Empresas</option>
                            <option value="Negocios Internacionales">Negocios Internacionales</option>
                            <option value="Veterinaria">Veterinaria</option>
                            <option value="Derecho">Derecho</option>
                            <option value="Medicina">Medicina</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="Programa2">Segundo programa Preferente</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="Programa2" id="Programa2" >
                            <option value="-1">Seleccione...</option>
                            <option value="Ingenieria Industrial">Ingenieria Industrial</option>
                            <option value="Ingenieria Civil">Ingenieria Civil</option>
                            <option value="Ingenieria De Sistemas">Ingenieria De Sistemas</option>
                            <option value="Ingenieria Ambiental ">Ingenieria Ambiental</option>
                            <option value="Ingenieria Electrica ">Ingenieria Electrica</option>
                            <option value="Administracion De Empresas">Administracion De Empresas</option>
                            <option value="Negocios Internacionales">Negocios Internacionales</option>
                            <option value="Veterinaria">Veterinaria</option>
                            <option value="Derecho">Derecho</option>
                            <option value="Medicina">Medicina</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="fortaleza1">Su fortaleza academica</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="fortaleza1" id="fortaleza1" >
                            <option value="-1">Seleccione...</option>
                            <option value="Matematicas">Matematicas</option>
                            <option value="Ciencias Sociales">Ciencias Sociales</option>
                            <option value="Ciencias">Ciencias</option>
                            <option value="Biologia">Biologia</option>
                            <option value="Idiomas">Idiomas</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5" for="fortaleza2">Segunda fortaleza academica</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="fortaleza2" id="fortaleza2" >
                            <option value="-1">Seleccione...</option>
                            <option value="Matematicas">Matematicas</option>
                            <option value="Ciencias Sociales">Ciencias Sociales</option>
                            <option value="Ciencias">Ciencias</option>
                            <option value="Biologia">Biologia</option>
                            <option value="Idiomas">Idiomas</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-5">
                        <!--mirar un Dismissible popover-->
                        <div class="alert" role="alert" id="Resp"></div>
                    </div>
                    <div class="col-sm-4">
                        <input type="submit" class="button" value="Actualizar Registro"/>
                    </div>
                </div>              
            </form>
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>

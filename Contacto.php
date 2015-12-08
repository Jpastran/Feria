<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>
    </head>
    <body>
        <?php include_once './mods/nav.html'; ?>
        <div class="contenido">
            <div id="panel">
                <p class="panel title">Envíanos tu Pregunta</p>
                <p class="panel subtitle"> Tienes alguna inquitud, escribenos y nos pondremos en contacto.</p>      
                <div class="panel col dos">
                    <div class="col row">
                        <input name="Nombre" type="text" class="box" id="Nombre" placeholder="Tu nombre completo" required/>
                    </div>
                    <div class="col row">
                        <input name="Correo" type="text" class="box" id="Correo" placeholder="Tu correo electronico" required/>
                    </div>
                    <div class="col row">
                        <input name="Telefono" type="text" class="box" id="Telefono" placeholder="Tu numero de telefono" required/>
                    </div>
                </div>
                <div class="panel col dos">
                    <div class="col row">
                        <textarea name="Mensaje" class="box" id="Mensaje" placeholder="Déjanos tu mensaje" required></textarea>
                    </div>
                    <div class="col row">
                        <img src="img/Csend.jpg" class="box img" id="btncontacto"/>
                        <div id="resp"></div>
                    </div>
                </div>
            </div>
            <div class="clean"></div>
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>

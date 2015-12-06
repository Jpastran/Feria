<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Feria Virtual De Educación</title> 
        <link href="css/estilos.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="js/contacto.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#Enviar").click(enviar);
            });
        </script>
    </head>
    <body onLoad="scroll();">
        <div id="nav">
            <div class="nav logo">
                <a href="Index.php" > 
                    <img src="img/Logo.png" />
                </a>
            </div>
            <div class="nav menu">
                <?php
                if (empty($_SESSION['Nombre'])) {
                    echo'
                    <div class="nav menu col">   
                        <a href="Registro.php">
                            <img src="img/LogRegistro.png"  /><br />
                            REGISTRARME</a>
                    </div>';
                }
                ?>
                <div class="nav menu col">   
                    <a href="Nosotros.php">  
                        <img src="img/LogNosotros.png"  /><br />   
                        QUIENES SOMOS  </a>    
                </div>
                <div class="nav menu col">   
                    <a href="Oferta.php">    
                        <img src="img/LogUniversidades.png"  /><br />   
                        OFERTA ACADEMICA</a>
                </div>
                <div class="nav menu col">    
                    <a href="Contacto.php">   
                        <img src="img/LogContacto.png"  /><br />   
                        CONTACTENOS</a>
                </div>
                <?php
                if (empty($_SESSION['Nombre'])) {
                    echo'
                    <div class="nav menu col">    
                        <a href="Login.php" >   
                            <img src="img/LogLogin.png"  /><br />   
                            INICIAR SESION</a>
                    </div>';
                } else {
                    echo' 
                    <div class="nav menu col">    
                        <a href="Datos.php" >   
                            <img src="img/user.png"  /><br />   
                            ' . $_SESSION['Nombre'] . '</a>
                    </div>';
                }
                ?>
            </div>
            <div class="clean"></div>
        </div> 
        <div class="contenido">
            <div id="panel">
                <p class="panel title">Envíanos tu Pregunta</p>
                <p class="panel subtitle"> Tienes alguna inquitud, escribenos y nos pondremos en contacto.</p>      
                <div class="panel col dos">
                    <div class="col row">
                        <input name="Nombre" type="text" class="box" id="Nombre" onkeydown="testForEnter();" value="" placeholder="Tu nombre completo"/>
                    </div>
                    <div class="col row">
                        <input name="Correo" type="text" class="box" id="Correo" onkeydown="testForEnter();" value="" placeholder="Tu correo electronico"/>
                    </div>
                    <div class="col row">
                        <input name="Telefono" type="text" class="box" id="Telefono" onkeydown="testForEnter();" value="" placeholder="Tu numero de telefono"/>
                    </div>
                </div>
                <div class="panel col dos">
                    <div class="col row">
                        <textarea name="Mensaje" class="box" id="Mensaje" placeholder="Déjanos tu mensaje" onkeydown="testForEnter();"></textarea>
                    </div>
                    <div class="col row">
                        <img src="img/Csend.jpg" class="box img" id="Enviar"/>
                    </div>
                </div>
            </div>
            <div class="clean"></div>
        </div>
        <?php
        $variable = file_get_contents("mods/Pie.html");
        echo $variable;
        ?>
    </body>
</html>

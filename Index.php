<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Feria Virtual De Educación</title> 
        <link href="css/estilos.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/bannerRotator.js"></script>
        <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="js/jscroller.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript">
            $(document).ready(function() {
                bannerRotator('#bannerRotator', 500, 3500, true);
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
        <div id="banner">
            <div id="bannerRotator">
                <ul>   
                    <?php
                    require_once("Conexion.php");
                    $consulta = "SELECT nombre FROM banners	";
                    $datos = mysql_query($consulta);
                    while ($row = mysql_fetch_array($datos)) {
                        echo '<li>	
                                <img src="img/banner/' . $row[0] . '" >	
                              </li>';
                    }
                    ?>
                </ul>   
            </div>
            <img id="bannerFoot" src="img/sombra.png" />
        </div>
        <div id="cita">
            "<em>Nunca consideres el estudio como una obligación, sino como una oportunidad para penetrar en el bello y maravilloso mundo del saber.</em>" <br/>- Albert Einstein
        </div>
        <div id="panel">
            <div class="panel col">
                <div class="col head">QUIENES SOMOS</div>
                <img src="img/Intro1.png"/>
                <div class="col body">
                    <?php
                    $consulta = "SELECT quienes FROM configuracion";
                    $datos = mysql_query($consulta);
                    if ($row = mysql_fetch_array($datos)) {
                        echo nl2br(( substr($row[0], 0, 320)));
                    }
                    ?>...

                </div>
                <div class="col ref">
                    <a href="Nosotros.php" >Leer Mas...</a>
                </div>
            </div>
            <div class="panel col">
                <div class="col head">NUESTROS BENEFICIOS</div>
                <img src="img/Intro2.png" />
                <div class="col body">
                    <LI>Descuentos Especiales</LI>
                    <LI>Cupos Seguros</LI>
                    <LI>Membresia Exclusiva</LI>
                    <LI>Cupos Seguros</LI>
                    <LI>Cupos Seguros</LI>
                    <LI>Membresia Exclusiva</LI>
                </div>
            </div>
            <div class="panel col">
                <div class="col head">CONTACTE CON NOSOTROS</div>
                <img src="img/Intro3.png" style="width:90%;margin-top:10px"/>
                <div class="col body">
                    <strong>UNIVERSIDADES - INSTITUCIONES </strong><BR />
                    comuniquese con nosotros para postear su propuesta en nuestra feria virtual de educación<br />
                    <strong>ESTUDIANTES</strong><br />
                    Si desea mayor informacion y/o acceso a la feria virtual, escribanos y le brindaremos informacion personalizada<br />
                </div>
                <div class="col ref">
                    <a href="Contacto.php">Leer Mas...</a>
                </div>
            </div>
        </div>
        <div class="cita foot">
            Regístrate con nosotros y recibe un descuento especial por ser parte de nuestra feria!!!
        </div>
        <?php
        $variable = file_get_contents("mods/Pie.html");
        echo $variable;
        ?>
    </body>
</html>

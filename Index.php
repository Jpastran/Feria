<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>
        <script type="text/javascript" src="js/bannerRotator.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include_once './mods/nav.html'; ?>
        <div id="banner">
            <div id="bannerRotator">
                <ul>   
                    <?php
                    require_once("./db/conectar.php");
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
        <div class="contenido">
            <div id="cita">
                "<em>Nunca consideres el estudio como una obligación, sino como una oportunidad para penetrar en el bello y maravilloso mundo del saber.</em>" <br/>- Albert Einstein
            </div>
            <div id="panel">
                <div class="panel col tres">
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
                <div class="panel col tres">
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
                <div class="panel col tres">
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
        </div>
        <?php include_once 'mods/pie.html'; ?>
    </body>
</html>

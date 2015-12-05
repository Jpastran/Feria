<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>Feria Virtual De Educación</title> 
        <link href="css/estilos.css" rel="stylesheet" type="text/css" />
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
        <?php
        require_once("Conexion.php");
        $consulta = "SELECT mision,vision,quienes,objetivos,producto FROM configuracion	";
        $datos = mysql_query($consulta);
        if ($row = mysql_fetch_array($datos)) {
            ?>
            <div class="contenido">
                <h2>QUIENES SOMOS</h2>
                <div class="texto">
                    <?php echo nl2br(($row[2])); ?>
                </div>
                <h2>NUESTRA MISION </h2>
                <div class="texto">
                    <?php echo nl2br(($row[0])); ?>
                </div>               
                <h2>NUESTRA VISION</h2>
                <div class="texto">
                    <?php echo nl2br(($row[1])); ?>
                </div>
                <h2>OBJETIVOS</h2>
                <div class="texto">
                    <?php echo nl2br(($row[3])); ?>
                </div>
                <h2>NUESTRO PRODUCTO</h2>
                <div class="texto">
                    <?php echo nl2br(($row[4])); ?>
                </div>
            </div>
            <?php
        }
        $variable = file_get_contents("mods/Pie.html");
        echo $variable;
        ?>
    </body>
</html>

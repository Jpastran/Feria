<?php
session_start();
if (empty($_SESSION['Nombre'])) {
    header('Location: login.php');
} else {
    require_once("db/conectar.php");
    $consulta = "insert visitas(fecha,codestudiante,codprograma) values(
	curdate(),
	'" . mysql_real_escape_string($_SESSION['Correo']) . "',
	'" . mysql_real_escape_string($_GET['cod']) . "')";
    $datos = mysql_query($consulta);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>        
    </head>
    <body>
        <?php include_once './mods/nav.html'; ?>     
        <?php echo' <input type="hidden" id="MyCorreo" value="' . $_SESSION['Correo'] . '"/>'; ?>
        <div id="gris">
            <div id="blanco">
            </div>  
            <div id="negro">    
            </div>
        </div>
        <div style="max-width:1100px;margin:auto;width:100%;font-family:Futura;margin-top:30px">
            <center>
                <?php
                if (!empty($_GET['cod'])) {
                    $consulta = "SELECT banner FROM ofertas WHERE codigo='" . mysql_real_escape_string($_GET['cod']) . "'";
                    $datos = mysql_query($consulta);
                    if ($row = mysql_fetch_array($datos)) {
                        echo'<img src="img/' . $row[0] . '"  style="max-width:1000px;width:95%"/>';
                    }
                    ?>
                </center>
                <?php
                $consulta = "SELECT codigo,nombre FROM areas WHERE codoferta='" . mysql_real_escape_string($_GET['cod']) . "'";
                $datos = mysql_query($consulta);
                while ($row = mysql_fetch_array($datos)) {
                    echo'<h3 style="color:#fff;font-family:LetraOswald;padding:5px;font-size:18px;padding-left:10px;margin:7px;background-color:#993300;text-align:center;border-radius:5px;font-weight:normal;margin-top:30px; " id="titu1">' . $row[1] . '</h3>
                    <div style="font-family:Verdana, Geneva, sans-serif;margin-top:5px;color:#333;font-size:10px;line-height:155%;margin-left:40px;">';
                    $consultax = "SELECT codigo,nombre,descripcion,imagen FROM programas WHERE codarea='" . mysql_real_escape_string($row[0]) . "'";
                    $datosx = mysql_query($consultax);
                    while ($rowx = mysql_fetch_array($datosx)) {
                        echo '
                        <a style="text-decoration:none;cursor:pointer;" class="linkProg" name="' . $rowx[3] . '"  title="' . $rowx[0] . '">
                        <div style="margin-top:10px;"> 
                         <img src="img/next.png" style="margin-right:10px;margin-bottom:-3px;"/>' . $rowx[1] . ' (' . $rowx[2] . ')</div>
                        </a>
                        <br />
                        ';
                    }
                    echo '
                    </div>';
                }
                ?>
            </div>
            <?php
        }
        ?>
        <?php include_once './mods/pie.html'; ?>     
    </body>
</html>

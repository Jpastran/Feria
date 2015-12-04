<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>Feria Virtual De Educación</title> 
        <link href="css/estilos.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="margin:0px;"  onLoad="scroll();">       
             <div style="top:0%;background-image:url(img/Foot.jpg) ;width:100%;overflow:auto;border-top:solid 4px #FE9900;border-bottom:solid 4px #FE9900;">
            <div style="max-width:1100px;height:51px;margin:auto;width:100%">
                <a href="Index.php" style="text-decoration:none;color:#FFF"> 
                    <img src="img/Logo.png" style="margin-top:12px;margin-left:15px"/>
                </a>
                <table style="float:right;margin-top:6px;height:113px;">
                    <tr>  
                        <?php if (empty($_SESSION['Nombre'])) { echo'
                        <td valign="middle" class="MenuSuperior">   
                            <a href="Registro.php" style="text-decoration:none;color:#FFF" >
                                <img src="img/LogRegistro.png"  /><br />
                                REGISTRARME</a>
                        </td>'; 
                        }?>
                        <td valign="middle" class="MenuSuperior">   
                            <a href="Nosotros.php" style="text-decoration:none;color:#FFF">  
                                <img src="img/LogNosotros.png"  /><br />   
                                QUIENES SOMOS  </a>    
                        </td>
                        <td valign="middle" class="MenuSuperior">   
                            <a href="Oferta.php" style="text-decoration:none;color:#FFF">    
                                <img src="img/LogUniversidades.png"  /><br />   
                                OFERTA ACADEMICA</a>
                        </td>
                        <td valign="middle" class="MenuSuperior">    
                            <a href="Contacto.php" style="text-decoration:none;color:#FFF">   
                                <img src="img/LogContacto.png"  /><br />   
                                CONTACTENOS</a>
                        </td>
                        <?php if (empty($_SESSION['Nombre'])) { echo'
                        <td valign="middle" class="MenuSuperior">    
                            <a href="Login.php" style="text-decoration:none;color:#FFF">   
                                <img src="img/LogLogin.png"  /><br />   
                                INICIAR SESION</a>
                        </td>';
                        } else { echo' 
                        <td valign="middle" class="MenuSuperior">    
                            <a href="Datos.php" style="text-decoration:none;color:#FFF">   
                                <img src="img/user.png"  /><br />   
                                ' . $_SESSION['Nombre'] . '</a>
                        </td>';
                        }?>
                    </tr>
                </table>
            </div>
        </div>       
        <?php  
        require_once("Conexion.php");
        $consulta = "SELECT mision,vision,quienes,objetivos,producto FROM configuracion	";
        $datos = mysql_query($consulta);
        if ($row = mysql_fetch_array($datos)) {
        ?>
            <div style="max-width:900px;margin:auto;width:100%;margin-top:50px;margin-bottom:150px;">
                <h2 style="font-family:letraOswald;color:#993300">
                    NUESTRA MISION
                </h2>
                <div style="font-size:18px;text-align:justify">
                    <?php echo nl2br(($row[0])); ?>
                </div><BR /><BR />
                <h2 style="font-family:letraOswald;color:#993300">
                    NUESTRA VISION
                </h2>
                <div style="font-size:18px;text-align:justify">
                    <?php echo nl2br(($row[1])); ?>
                </div>
                <BR /><BR />
                <h2 style="font-family:letraOswald;color:#993300">
                    QUIENES SOMOS
                </h2>
                <div style="font-size:18px;text-align:justify">
                    <?php echo nl2br(($row[2])); ?>
                </div>
                <BR /><BR />
                <h2 style="font-family:letraOswald;color:#993300">
                    OBJETIVOS
                </h2>
                <div style="font-size:18px;text-align:justify">
                    <?php echo nl2br(($row[3])); ?>
                </div>
                <BR /><BR />
                <h2 style="font-family:letraOswald;color:#993300">
                    NUESTRO PRODUCTO
                </h2>
                <div style="font-size:18px;text-align:justify">
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

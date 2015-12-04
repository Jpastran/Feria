<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Feria Virtual De Educación</title> 
        <link href="Estilos.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="bannerRotator.js"></script>
        <script type="text/javascript" src="Ext/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="Ext/jscroller.js"></script>
        <link href="style.css" rel="stylesheet" type="text/css">
            <script type="text/javascript">
                $(document).ready(function() {
                    bannerRotator('#bannerRotator', 500, 3500, true);

                });

            </script>


    </head>

    <body style="margin:0px;"  onLoad="scroll();">


        <?php
        if (empty($_SESSION['Nombre'])) {

            echo'

<div style="top:0%;background-image:url(Imagenes/Foot.jpg) ;width:100%;overflow:auto;border-top:solid 4px #FE9900;border-bottom:solid 4px #FE9900;">

<div style="max-width:1100px;height:51px;margin:auto;width:100%">

  <a href="Index.php" style="text-decoration:none;color:#FFF"> 
  <img src="Imagenes/Logo.png" style="margin-top:12px;margin-left:15px"/>
  </a>
    
    
  <table style="float:right;margin-top:6px;height:113px;">
    <tr>   
      
      <td valign="middle" class="MenuSuperior">   
     <a href="Registro.php" style="text-decoration:none;color:#FFF" >
     
         <img src="Imagenes/LogRegistro.png"  /><br />
      REGISTRARME      </a>
      </td>
      <td valign="middle" class="MenuSuperior">   
        <a href="Nosotros.php" style="text-decoration:none;color:#FFF">  
         <img src="Imagenes/LogNosotros.png"  /><br />   
      QUIENES SOMOS  </a>    
      </td>
      <td valign="middle" class="MenuSuperior">   
        <a href="Oferta.php" style="text-decoration:none;color:#FFF">    
       <img src="Imagenes/LogUniversidades.png"  /><br />   
       OFERTA ACADEMICA</a>
       </td>
       
      <td valign="middle" class="MenuSuperior">    
        <a href="Contacto.php" style="text-decoration:none;color:#FFF">   
       <img src="Imagenes/LogContacto.png"  /><br />   
       CONTACTENOS</a>
       </td>
      <td valign="middle" class="MenuSuperior">    
        <a href="Login.php" style="text-decoration:none;color:#FFF">   
       <img src="Imagenes/LogLogin.png"  /><br />   
       INICIAR SESION</a>
       </td>
      
      </tr>
  </table>
  

</div>
</div>
</div>
';
        } else {
            echo'

<div style="top:0%;background-image:url(Imagenes/Foot.jpg) ;width:100%;overflow:auto;border-top:solid 4px #FE9900;border-bottom:solid 4px #FE9900;">

<div style="max-width:1100px;height:51px;margin:auto;width:100%">

  <a href="Index.php" style="text-decoration:none;color:#FFF"> 
  <img src="Imagenes/Logo.png" style="margin-top:12px;margin-left:15px"/>
  </a>
    
    
  <table style="float:right;margin-top:6px;height:113px;">
    <tr>   
  
      <td valign="middle" class="MenuSuperior">   
        <a href="Nosotros.php" style="text-decoration:none;color:#FFF">  
         <img src="Imagenes/LogNosotros.png"  /><br />   
      QUIENES SOMOS  </a>    
      </td>
      <td valign="middle" class="MenuSuperior">   
        <a href="Oferta.php" style="text-decoration:none;color:#FFF">    
       <img src="Imagenes/LogUniversidades.png"  /><br />   
       OFERTA ACADEMICA</a>
       </td>
       
     
      <td valign="middle" class="MenuSuperior">    
        <a href="Contacto.php" style="text-decoration:none;color:#FFF">  
       <img src="Imagenes/LogContacto.png"  /><br />   
       CONTACTENOS</a>
       </td>
      <td valign="middle" class="MenuSuperior">    
        <a href="Datos.php" style="text-decoration:none;color:#FFF">   
       <img src="Imagenes/user.png"  /><br />   
       ' . $_SESSION['Nombre'] . '</a>
       </td>
      
      </tr>
  </table>
  

</div>
</div>
</div>
';
        }


        require_once("Conexion.php");
        $consulta = "SELECT mision,vision,quienes,objetivos,producto FROM configuracion	";
        $datos = mysql_query($consulta);

        if ($row = mysql_fetch_array($datos)) {
            ?>




            <div style="max-width:900px;margin:auto;width:100%;margin-top:50px;margin-bottom:150px;">
                <h2 style="font-family:letraOswald;color:#993300">
                    NUESTRA MISION
                </h2>
                <div style="font-size:18px;text-align:justify"><?php
                    echo nl2br(($row[0]));
                    ?>
                </div><BR /><BR />

                <h2 style="font-family:letraOswald;color:#993300">
                    NUESTRA VISION
                </h2>
                <div style="font-size:18px;text-align:justify"><?php
                    echo nl2br(($row[1]));
                    ?>
                </div>
                <BR /><BR />

                <h2 style="font-family:letraOswald;color:#993300">
                    QUIENES SOMOS
                </h2>
                <div style="font-size:18px;text-align:justify"><?php
                    echo nl2br(($row[2]));
                    ?>
                </div>




                <BR /><BR />

                <h2 style="font-family:letraOswald;color:#993300">
                    OBJETIVOS
                </h2>
                <div style="font-size:18px;text-align:justify">

                    <?php
                    echo nl2br(($row[3]));
                    ?>


                </div>




                <BR /><BR />

                <h2 style="font-family:letraOswald;color:#993300">
                    NUESTRO PRODUCTO
                </h2>
                <div style="font-size:18px;text-align:justify"><?php
                    echo nl2br(($row[4]));
                    ?>
                </div>
            </div>





            <?php
        }
        $variable = file_get_contents("Partes/Pie.html");
        echo $variable;
        ?>



    </body>
</html>

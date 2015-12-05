<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Feria Virtual De Educación</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="bannerRotator.js"></script>
        <script type="text/javascript" src="Ext/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="Ext/jscroller.js"></script>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            $(document).ready(function() {
                bannerRotator('#bannerRotator', 500, 3500, true);

            });

        </script>
    </head>

    <body style="margin:0px;" >


        <?php
        if (empty($_SESSION['Nombre'])) {

            echo'

<div style="top:0%;background-image:url(img/Foot.jpg) ;width:100%;overflow:auto;border-top:solid 4px #FE9900;border-bottom:solid 4px #FE9900;">

<div style="max-width:1100px;height:51px;margin:auto;width:100%">

  <a href="Index.php" style="text-decoration:none;color:#FFF"> 
  <img src="img/Logo.png" style="margin-top:12px;margin-left:15px"/>
  </a>
    
    
  <table style="float:right;margin-top:6px;height:113px;">
    <tr>   
      
      <td valign="middle" class="table td">   
     <a href="Registro.php" style="text-decoration:none;color:#FFF" >
     
         <img src="img/LogRegistro.png"  /><br />
      REGISTRARME      </a>
      </td>
      <td valign="middle" class="table td">   
        <a href="Nosotros.php" style="text-decoration:none;color:#FFF">  
         <img src="img/LogNosotros.png"  /><br />   
      QUIENES SOMOS  </a>    
      </td>
      <td valign="middle" class="table td">   
        <a href="Oferta.php" style="text-decoration:none;color:#FFF">    
       <img src="img/LogUniversidades.png"  /><br />   
       OFERTA ACADEMICA</a>
       </td>
       
      <td valign="middle" class="table td">    
        <a href="Contacto.php" style="text-decoration:none;color:#FFF">   
       <img src="img/LogContacto.png"  /><br />   
       CONTACTENOS</a>
       </td>
      <td valign="middle" class="table td">    
        <a href="Login.php" style="text-decoration:none;color:#FFF">   
       <img src="img/LogLogin.png"  /><br />   
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

<div style="top:0%;background-image:url(img/Foot.jpg) ;width:100%;overflow:auto;border-top:solid 4px #FE9900;border-bottom:solid 4px #FE9900;">

<div style="max-width:1100px;height:51px;margin:auto;width:100%">

  <a href="Index.php" style="text-decoration:none;color:#FFF"> 
  <img src="img/Logo.png" style="margin-top:12px;margin-left:15px"/>
  </a>
    
    
  <table style="float:right;margin-top:6px;height:113px;">
    <tr>   
  
      <td valign="middle" class="table td">   
        <a href="Nosotros.php" style="text-decoration:none;color:#FFF">  
         <img src="img/LogNosotros.png"  /><br />   
      QUIENES SOMOS  </a>    
      </td>
      <td valign="middle" class="table td">   
        <a href="Oferta.php" style="text-decoration:none;color:#FFF">    
       <img src="img/LogUniversidades.png"  /><br />   
       OFERTA ACADEMICA</a>
       </td>
       
     
      <td valign="middle" class="table td">    
        <a href="Contacto.php" style="text-decoration:none;color:#FFF">  
       <img src="img/LogContacto.png"  /><br />   
       CONTACTENOS</a>
       </td>
      <td valign="middle" class="table td">    
        <a href="Datos.php" style="text-decoration:none;color:#FFF">   
       <img src="img/user.png"  /><br />   
       ' . $_SESSION['Nombre'] . '</a>
       </td>
      
      </tr>
  </table>
  

</div>
</div>
</div>
';
        }
        ?>





        <div style="margin:auto;width:100%;font-family:Futura;margin-top:30px;">
            <div style="margin:auto;width:100%;max-width:800px">
                <center>
                    <?php
                    if (!empty($_GET['cod'])) {

                        require_once("Conexion.php");
                        $consulta = "SELECT codigo,imagen FROM ofertas WHERE categoria='Idiomas' AND departamento='" . mysql_real_escape_string($_GET['cod']) . "'";
                        $datos = mysql_query($consulta);
                        $sw = 0;
                        while ($row = mysql_fetch_array($datos)) {
                            echo' <a href="DetalleIdiomas.php?cod=' . $row[0] . '">
		<img src="img/' . $row[1] . '"  class="late" style="float:left" />
		</a>';
                            $sw = 1;
                        }
                        if ($sw == 0) {

                            echo '<h1 style="text-align:center;color:#900;width:900px;">No Tenemos Oferta Disponible Para Este Departamento, Intente Seleccionado Otro...</h1>
<center><a href="Opciones.php?cod=' . $_GET['cod'] . '">	<img src="img/Volver.png"></a></center>
	
	';
                        }
                    } else {
                        echo '<h1 style="text-align:center;color:#900;width:900px;">No Tenemos Oferta Disponible Para Este Departamento, Intente Seleccionado Otro...</h1>
	<center><a href="Opciones.php?cod=' . $_GET['cod'] . '">	<img src="img/Volver.png"></a></center>';
                    }
                    ?>


                </center>
            </div>
            <div style="clear: both"></div>
        </div>




        <?php
        $variable = file_get_contents("mods/Pie.html");
        echo $variable;
        ?>



    </body>
</html>

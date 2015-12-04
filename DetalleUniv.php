<?php
session_start();
if (empty($_SESSION['Nombre'])) {
    echo"<script>alert('Para Ingresar A Este Lugar Debe Iniciar Sesion');document.location='Login.php';</script>";
} else {



    require_once("Conexion.php");
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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Feria Virtual De Educación</title>
        <link href="Estilos.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="bannerRotator.js"></script>
        <script type="text/javascript" src="Ext/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="Ext/jscroller.js"></script>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            $(document).ready(function() {

                Negro1();

                $("#Negro1").click(Negro1);
                $(".linkProg").click(Resize);
                var global = "";
                function Negro1() {
                    $("#DivSobreMG").hide(500);
                }

                function Press() {

                    $("#blanco").html('<center><img src="Imagenes/cargando.gif" ><br><img src="Imagenes/Mensaje.jpg" ></center>');
                    var parametros = {
                        "MyCorreo": $("#MyCorreo").val(),
                        "Programa": global,
                        "Tipo": "Universidades",
                        "Keysave": "#f7641"
                    };
                    $.ajax({
                        data: parametros,
                        url: "EnvioSolicitudes.php",
                        type: "POST",
                        success: function(resp) {
                            Negro1();
                            if (resp == "s") {
                                alert("Ha Sido Registrado Su Interes Hacia Este Programa");
                            } else {
                                alert("No se pudo guardar, verifique su conexión");
                            }

                        }
                    });

                }
                function Resize() {
                    global = $(this).attr("title");
                    $("#DivSobreMG").show(800);
                    $("#blanco").html('<img src="Imagenes/' + $(this).attr("name") + '" width="500"><br><center><img src="Imagenes/Interes.png" id="Press" style="cursor:pointer"></center>');

                    $('html, body').animate({scrollTop: 10}, 650);
                    $("#Press").click(Press);
                }


            });

        </script>
    </head>

    <body style="margin:0px;" >


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
            echo'
<input type="hidden" id="MyCorreo" value="' . $_SESSION['Correo'] . '"/>';
        }
        ?>




        <div id="DivSobreMG">

            <div style="background:#fff;z-index:999999;position:absolute;top:3%;margin-left:50%;width:500px;left:-250px" id="blanco">
            </div>  

            <div style="background:#333;opacity:0.8;position:fixed;z-index:999998;top:0;left:0;width:100%;height:100%" id="Negro1">    
            </div>

        </div>


        <div style="max-width:1100px;margin:auto;width:100%;font-family:Futura;margin-top:30px">
            <center>
                <?php
                if (!empty($_GET['cod'])) {

                    $consulta = "SELECT banner FROM ofertas WHERE codigo='" . mysql_real_escape_string($_GET['cod']) . "'";
                    $datos = mysql_query($consulta);

                    if ($row = mysql_fetch_array($datos)) {
                        echo'<img src="Imagenes/' . $row[0] . '"  style="max-width:1000px;width:95%"/>';
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
 <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>' . $rowx[1] . ' (' . $rowx[2] . ')</div>
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
        $variable = file_get_contents("Partes/Pie.html");
        echo $variable;
        ?>



    </body>
</html>

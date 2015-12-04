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

                    $("#Enviar").click(Enviar);

                    function Enviar() {
                        if ($("#Mensaje").val() != "" && $("#Nombre").val() != "" && $("#Correo").val() != "" && $("#Telefono").val() != "") {
                            var parametros = {
                                "SendMensaje": $("#Mensaje").val(),
                                "SendCorreo": $("#Correo").val(),
                                "SendTelefono": $("#Telefono").val(),
                                "SendNombre": $("#Nombre").val()
                            };

                            $.ajax({
                                data: parametros,
                                url: "EnvioSolicitudes.php",
                                type: "POST",
                                success: function(resp) {
                                    alert("Mensaje Enviado, Nos Pondremos en contacto con usted");
                                    $("#Mensaje").val("");
                                    $("#Correo").val("");
                                    $("#Nombre").val("");
                                    $("#Telefono").val("");
                                },
                                error: function(resp) {
                                    alert("Error Al Conectarse Al Servidor");
                                }
                            });
                        } else {
                            alert("Escriba Nombre,Correo,Telefono y Mensaje");
                            $("#Nombre").focus();
                        }
                    }

                });

            </script>


    </head>

    <body style="margin:0px;background-color:#f2f2f2"  onLoad="scroll();">


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
        ?>



        <div style="background-color:#f2f2f2;width:100%;padding-top:30px">

            <table cellpadding="8" style="width:100%;margin:auto;color:#fff;font-family:Arial, Helvetica, sans-serif;max-width:1100px;padding-bottom:30px;">
                <tr>
                    <td align="left" style="font-size:20px;">
                    </td>
                    <td valign="bottom" align="center">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="center" style="font-size:66px;"><div style="margin-bottom:-25px;font-weight:bold;color:#993300;">BIENVENIDO</div></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" style="font-size:18px;">
                        <div style="text-align:center;color:#993300;line-height:1.4;margin-top:20px;"> 
                            Tienes alguna inquitud, escribenos y nos pondremos en contacto.
                        </div>      
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="top" style="font-size:18px;"><input name="Nombre" type="text" class="box" id="Nombre" onkeydown="testForEnter();" value="" placeholder="Tu Nombre Completo" style="height:40px;width:380px;font-size:16px;background-color:#fff;border:solid #000033 1px"/></td>
                    <td rowspan="3" align="left" valign="top" ><textarea name="Mensaje" class="box" id="Mensaje"  style="width:380px !important;font-size:16px;background-color:#fff;border:solid #000033 1px;height:106px;resize:none" placeholder="Déjanos  Un Mensaje" onkeydown="testForEnter();"></textarea><br />
                        <img src="Imagenes/Csend.jpg" alt="" height="46" width="386" class="Send" id="Enviar" style="margin-top:17px;border:solid 1px #000;cursor:pointer"/></td>
                </tr>
                <tr align="right">
                    <td valign="top" style="font-size:18px;"><input name="Correo" type="text" class="box" id="Correo" onkeydown="testForEnter();" value="" placeholder="Tu Correo Electronico" style="height:40px;width:380px;font-size:16px;background-color:#fff;border:solid #000033 1px" /></td>
                </tr>
                <tr align="right">
                    <td valign="top" style="font-size:18px;"><input name="Telefono" type="text" class="box" id="Telefono" onkeydown="testForEnter();" value="" placeholder="Tu Numero De Telefono"  style="height:40px;width:380px;font-size:16px;background-color:#fff;border:solid #000033 1px"/></td>
                </tr>
            </table>



        </div>




        <?php
        $variable = file_get_contents("Partes/Pie.html");
        echo $variable;
        ?>



    </body>
</html>

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
 $(document).ready(function(){  
 	bannerRotator('#bannerRotator', 500, 3500, true);

 });

</script>

 
</head>

<body style="margin:0px;"  onLoad="scroll();">


<?php
if(empty($_SESSION['Nombre'])){
	
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
}else{
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
       '.$_SESSION['Nombre'].'</a>
       </td>
      
      </tr>
  </table>
  

</div>
</div>
</div>
';
	}

?>


 
<div style="background-color:#1B4D70;width:100%;margin:auto;background-image:url(Imagenes/atras.png);height:350px;">
<div id="bannerRotator">
	
<ul>   
<?php
require_once("Conexion.php");	
	$consulta = "SELECT nombre FROM banners	";
	$datos = mysql_query($consulta);

	while ($row = mysql_fetch_array($datos)){		
	echo ' <li>	
	      <img src="Banner/'.$row[0].'" >	
	  </li>  ';
	
	}
?>
       
       
</ul>   

  
  </div><center>
<img src="Imagenes/sombra.png" style="width:100%;max-width:1100px" /></center>
</div><br />

<div style="font-size:30px;color:#743E01;text-align:center;margin:auto;width:90%;max-width:900px;margin-bottom:30px;margin-top:10px">
"<em>Nunca consideres el estudio como una obligación, sino como una oportunidad para penetrar en el bello y maravilloso mundo del saber.</em>" <br />- Albert Einstein </div>


<div>

<div style="max-width:1100px;margin:auto;width:100%;">

<table cellpadding="8" style="max-width:1100px;margin:auto;width:100%;">
  <tr>
    <td width="33%" valign="top">

<div style="background-color:#E1E8ED;">

<div style="background-color:#B26700;color:#FFF;padding-top:7px;padding-bottom:7px;padding-left:5px;font-family:letraOswald;font-size:18px;">QUIENES SOMOS
</div>


<center>
<img src="Imagenes/Intro1.png" style="width:90%;margin-top:10px"/>
</center>

<div style="width:90%;font-family:letraMyriad;text-align:justify;margin:auto;color:#666;margin-top:10px">

<?php
	$consulta = "SELECT quienes FROM configuracion	";
	$datos = mysql_query($consulta);

	if ($row = mysql_fetch_array($datos)){		

echo nl2br(( substr($row[0], 0, 320)));

	
	}
?>...
<div style="text-align:right;font-size:20px;text-decoration:none;color:#03C;">
<a href="Nosotros.php" style="text-decoration:none;color:#03C;">Leer Mas
...</a></div></div>

</div>



</td>
    <td width="33%" valign="top">
    <div style="background-color:#E1E8ED;">

<div style="background-color:#7F4A00;color:#FFF;padding-top:7px;padding-bottom:7px;padding-left:5px;font-family:letraOswald;font-size:18px;">NUESTROS BENEFICIOS
</div>


<center>
<img src="Imagenes/Intro2.png" style="width:90%;margin-top:10px"/>
</center>

<div style="width:90%;font-family:letraMyriad;text-align:justify;margin:auto;color:#666;margin-top:10px">
<LI>Descuentos Especiales</LI>
<LI>Cupos Seguros</LI>
<LI>Membresia Exclusiva</LI>
<LI>Cupos Seguros</LI>
<LI>Cupos Seguros</LI>
<LI>Membresia Exclusiva</LI></div>

</div>
    
    </td>
    <td width="33%" valign="top">  <div style="background-color:#E1E8ED;">

<div style="background-color:#B26700;color:#FFF;padding-top:7px;padding-bottom:7px;padding-left:5px;font-family:letraOswald;font-size:18px;">CONTACTE CON NOSOTROS
</div>


<center>
<img src="Imagenes/Intro3.png" style="width:90%;margin-top:10px"/>
</center>

<div style="width:90%;font-family:letraMyriad;text-align:justify;margin:auto;color:#666;margin-top:10px">
<strong>UNIVERSIDADES - INSTITUCIONES </strong><BR />
comuniquese con nosotros para postear su propuesta en nuestra feria virtual de educación<br />
<strong>ESTUDIANTES</strong><br />
Si desea mayor informacion y/o acceso a la feria virtual, escribanos y le brindaremos informacion personalizada<br />

<div style="text-align:right;font-size:20px;">
<a href="Contacto.php" style="text-decoration:none;color:#03C;">Leer Mas
...</a></div>
</div>

</div></td>
  </tr>
</table>

</div>




</div>


<div style="margin:auto;background-color:#993300;padding:30px;color:#FFF;font-family:Futura;font-size:24px;text-align:center;margin-top:20PX">
Regístrate con nosotros y recibe un descuento especial por ser parte de nuestra feria!!!
</div>


<!--<div style="max-width:1100px;margin:auto;width:100%;font-family:Futura;margin-top:30px">

<div style="font-size:42px;text-align:center;color:#993300;font-family:letraOswald">UNIVERSIDADES ALIADAS</div>

<table cellpadding="8" style="margin:auto;margin-top:20px">
  <tr>
    <td>
    <a href="Login.php">
    <div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;">
    <center> <img src="Imagenes/Univ1.png" /></center>
    </div></a>
    
    </td>
    <td><a href="Login.php">
    <div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;">  
    <center> <img src="Imagenes/Univ2.png" /></center>
    </div></a>
     
     </td><td>
     <a href="Login.php">
     <div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;">  <center> <img src="Imagenes/Univ3.png" /></center> </div>
     </a>
     </td>
    <td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;"> </div></td>
    <td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;"> </div></td>
  </tr>
  <tr>
    <td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;">   </div></td>
    <td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;">   </div></td><td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;">   </div></td>
    <td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;"> </div></td>
    <td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;"> </div></td>
  </tr>
  <tr>
    <td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;">   </div></td>
    <td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;">   </div></td><td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;">   </div></td>
    <td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;"> </div></td>
    <td><div style=" border: solid 1px #ccc;background-color:#f2f2f2;box-shadow:0px 0px 5px #999;width:100px;height:100px;"> </div></td>
  </tr>
</table>




</div>-->


 
 
<?php

$variable= file_get_contents("Partes/Pie.html");
	echo $variable;

?>


 
</body>
</html>

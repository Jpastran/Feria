<?php
session_start();
unset( $_SESSION['Nombre']);
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
 
$("#btnentrar").click(Enviar);
function Enviar(){
	
if($("#Correo").val()!="") {	
$("#Resp").html("Espere Por Favor...");		  
	var parametros = {
	 "LogeoCorreo" :  $("#Correo").val()
	 
};				
$.ajax({
data:parametros,
url:"EnvioSolicitudes.php",
type:"POST",
	success:function(resp ){
		if(resp!="n"){	
			$("#Resp").html("");
		alert("Bienvenido "+resp);	
		document.location="Datos.php";	
		}else{				
			$("#Resp").html("Correo No Registrado");
		}
	},
	error:function(resp){
		alert("Error Al Conectarse Al Servidor");
	}
});
}else{
	
			$("#Correo").focus();
			$("#Resp").html("Escriba Correo");
}	
}
 });

</script>

 
</head>

<body style="margin:0px;background-color:#f2f2f2"  onLoad="scroll();">


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



  
  <div style="max-width:500px;margin:auto;width:100%;margin-top:50px;margin-bottom:150px;border: solid 1px #ccc;background-color:#fff;box-shadow:0px 0px 5px #999;border-radius:5px;">
  
<table style="max-width:400px;margin:auto;width:100%;margin-top:40px;margin-bottom:40px;" cellpadding="6">
  <tr>
    <td align="right" width="50%">Correo Electronico</td>
    <td><input name="Correo" type="text" class="box" id="Correo" onkeydown="testForEnter();" value="" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" name="btnentrar" id="btnentrar" class="button" value="Iniciar Sesion" />
    
    
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="color:#555;">
    <div id="Resp" style="text-align:center;font-size:14px;color:#06C;"></div>
    
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="color:#555;"><hr />
    ¿Aun No Te HasRegistrado?<br />
   <a style="color:#06C;text-decoration:none;" href="Registro.php"> Registrese Aqui!</a>
    
    </td>
    </tr>
</table>

  
  
  </div>





<?php

$variable= file_get_contents("Partes/Pie.html");
	echo $variable;

?>


 
</body>
</html>

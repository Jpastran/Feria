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
 	bannerRotator('#bannerRotator', 500, 3500, true);
$("#btnEnviar").click(Enviar);

function Enviar(){
	
if($("#Nombres").val()!="" && $("#Apellidos").val()!="" && $("#Correo").val()!="" && $("#Identificacion").val()!=""&& $("#Tel").val()!=""&& $("#Celular").val()!="" ) {	

if($("#Terminos").is(':checked')) {	
$("#Resp").html("Espere Por Favor...");		  
	var parametros = {
	 "EnvioIdentificacion" :  $("#Identificacion").val(),
	 "EnvioTipo" :  $("#Tipo").val(),
	 "EnvioNombres" :  $("#Nombres").val(),
	 "EnvioApellidos" :  $("#Apellidos").val(),
	 "EnvioTel" :  $("#Tel").val(),
	 "EnvioCelular" :  $("#Celular").val(),
	 "EnvioCorreo" :  $("#Correo").val(),
	 "EnviooCorreo" :  $("#oCorreo").val(),
	 "EnvioDir" :  $("#Dir").val(),
	 "EnvioBarrio" :  $("#Barrio").val(),
	 "EnvioGrado" :  $("#Grado").val(),
	 "EnvioColegio" :  $("#Colegio").val(),
	 "EnvioPuntaje" :  $("#Puntaje").val(),
	 "EnvioPuesto" :  $("#Puesto").val(),
	 "Enviorecursos" :  $("#recursos").val(),
	 "EnvioMedio" :  $("#Medio").val(),
	 "Envioapoyo" :  $("#apoyo").val(),
	 "EnvioNapoyo" :  $("#Napoyo").val(),
	 "EnvioTapoyo" :  $("#Tapoyo").val(),
	 "EnvioCapoyo" :  $("#Capoyo").val(),
	 "EnvioMulticulturalidad" :  $("#Multiculturalidad").val(),
	 "EnvioSISBEN" :  $("#SISBEN").val(),
	 "EnvioPrograma1" :  $("#Programa1").val(),
	 "EnvioPrograma2" :  $("#Programa2").val(),
	 "Enviofortaleza1" :  $("#fortaleza1").val(),
	 "Enviofortaleza2" :  $("#fortaleza2").val()
};				
$.ajax({
data:parametros,
url:"EnvioSolicitudes.php",
type:"POST",
	success:function(resp ){
		if(resp=="s"){	
		alert("Registro Completo! Recuerde que su acceso a nuestra feria es su correo electronico");
		document.location="Index.php";	
				
		}else{				
				$("#Resp").html("No Se Puede Registrar, El Correo Electronico Ya Está Vinculado");
		}
	},
	error:function(resp){
		alert("Error Al Conectarse Al Servidor");
	}
});
}else{	
	$("#Resp").html("Acepte Terminos y Condiciones");	
}	
}else{	
	$("#Resp").html("Campos Obligatorios Pendientes");	
}	
}


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



  
  <div style="max-width:1100px;margin:auto;width:100%;">

<table style="max-width:990px;margin:auto;width:100%;margin-top:20px;margin-bottom:150px" cellpadding="6">
  <tr>
    <td colspan="4" align="center">
    <h3 style="color:#fff;font-family:LetraOswald;padding:5px;cursor:pointer;font-size:18px;padding-left:10px;margin:7px;background-color:#993300;text-align:center;border-radius:5px;font-weight:normal;" id="titu1">INFORMACIÓN BÁSICA</h3>

    </td>
    </tr>
  <tr>
    <td align="right" width="25%">*Numero Identificación</td>
    <td align="left" width="25%"><input name="Identificacion" type="text" class="box" id="Identificacion" onkeydown="testForEnter();" value="" style="width:180px;"/></td>
    <td align="right" width="25%">Tipo De Identificación</td>
    <td align="left" width="25%"><select name="Tipo" id="Tipo" style="width:180px;">
        <option value="Tarjeta De Identidad">Tarjeta De Identidad</option>
        <option value="Registro Civil">Registro Civil</option>
        <option value="Cedula Ciudadania">Cedula Ciudadania</option>
        <option value="Otro">Otro</option>
      </select></td>
  </tr>
  <tr>
    <td align="right">*Nombres</td>
    <td align="left"><input name="Nombres" type="text" class="box" id="Nombres" onkeydown="testForEnter();" value="" style="width:180px;"/></td>
    <td align="right">*Apellidos</td>
    <td align="left"><input name="Apellidos" type="text" class="box" id="Apellidos" onkeydown="testForEnter();" value="" style="width:180px;"/></td>
  </tr>
  <tr>
    <td align="right">*Teléfono</td>
    <td align="left"><input name="Tel" type="text" class="box" id="Tel" onkeydown="testForEnter();" value="" style="width:180px;"/></td>
    <td align="right">*Celular</td>
    <td align="left"><input name="Celular" type="text" class="box" id="Celular" onkeydown="testForEnter();" value="" style="width:180px;"/></td>
  </tr>
  <tr>
    <td align="right">*Correo Electrónico</td>
    <td align="left"><input name="Correo" type="text" class="box" id="Correo" onkeydown="testForEnter();" value="" style="width:180px;"/></td>
    <td align="right">Correo Alternativo</td>
    <td align="left"><input name="oCorreo" type="text" class="box" id="oCorreo" onkeydown="testForEnter();" value="" style="width:180px;"/></td>
  </tr>
  <tr>
    <td align="right">Multiculturalidad</td>
    <td align="left"><select name="Multiculturalidad" id="Multiculturalidad" style="width:180px;">
        <option value="Ninguna" selected="selected">Ninguna</option>
        <option value="Afrodecendiente">Afrodecendiente</option>
        <option value="Cabeza De Familia">Cabeza De Familia</option>
        <option value="Desplazado">Desplazado</option>
        <option value="Indígena">Indígena</option>
        <option value="Población De Frontera ">Población De Frontera </option>
        <option value="Población Room">Población Room</option>
        <option value="Reinsertado">Reinsertado</option>
        <option value="Otro">Otro</option>
      </select></td>
    <td align="right">Tiene SISBEN</td>
    <td align="left"><select name="SISBEN" id="SISBEN" style="width:80px;">
      <option value="Si">Si</option>
      <option value="No">No</option>
    </select></td>
  </tr>
  <tr align="right">
    <td colspan="4" align="center"> (*) Campos Obligatorios</td>
  </tr>
  <tr align="right">
    <td colspan="4" align="center">
     
    
    <h3 style="color:#fff;font-family:LetraOswald;padding:5px;cursor:pointer;font-size:18px;padding-left:10px;margin:7px;background-color:#993300;text-align:center;border-radius:5px;font-weight:normal;" id="titu1">INFORMACIÓN SOCIAL</h3>
    </td>
    </tr>
  <tr>
    <td align="right">Dirección Vivienda</td>
    <td align="left"><input name="Dir" type="text" class="box" id="Dir" onkeydown="testForEnter();" value="" style="width:180px;"/></td>
    <td align="right">Barrio Vivienda</td>
    <td align="left"><input name="Barrio" type="text" class="box" id="Barrio" onkeydown="testForEnter();" value="" style="width:180px;"/></td>
  </tr>
  <tr>
    <td align="right">Ultimo Grado Cursado</td>
    <td align="left"><select name="Grado" id="Grado" style="width:180px;">
        <option value="11 Grado">11 Grado</option>
        <option value="10 Grado">10 Grado</option>
        <option value="9 Grado">9 Grado</option>
        <option value="Graduado">Graduado</option>
      </select></td>
    <td align="right">Colegio</td>
    <td align="left"><input name="Colegio" type="text" class="box" id="Colegio" onkeydown="testForEnter();" value="" style="width:180px;"/></td>
  </tr>
  <tr>
    <td align="right">Puntaje ICFES</td>
    <td align="left"><input name="Puntaje" type="text" class="box" id="Puntaje" onkeydown="testForEnter();" value="" style="width:80px;"/></td>
    <td align="right">Puesto ICFES</td>
    <td align="left"><input name="Puesto" type="text" class="box" id="Puesto" onkeydown="testForEnter();" value="" style="width:80px;"/></td>
  </tr>
  <tr>
    <td colspan="2" align="right">¿Cuenta con los recursos economicos para pagar sus estudios?</td>
    <td colspan="2" align="left"><select name="recursos" id="recursos" style="width:80px;">
      <option value="Si">Si</option>
      <option value="No">No</option>
    </select></td>
    </tr>

  <tr>
    <td colspan="2" align="right">Medio  por el que ingresa a la educación superior</td>
    <td colspan="2"><select name="Medio" id="Medio" style="width:180px;">
      <option value="Pago Inmediato">Pago Inmediato</option>
      <option value="Pago Financiado">Pago Financiado</option>
      <option value="Credito">Credito</option>
      <option value="Beca">Beca</option>
      <option value="Pago">Pago</option>
    </select></td>
    </tr>  <tr>
    <td colspan="2" align="right">¿Quien es su apoyo económico?</td>
    <td colspan="2"><select name="apoyo" id="apoyo" style="width:180px;">
      <option value="Padres">Padres</option>
      <option value="Padre">Padre</option>
      <option value="Madre">Madre</option>
      <option value="Tios">Tios</option>
      <option value="Abuelos">Abuelos</option>
      <option value="Otro">Otro</option>
    </select></td>
    </tr>
  <tr>
    <td colspan="2" align="right">Nombre completo de su apoyo economico</td>
    <td colspan="2"><input name="Napoyo" type="tel" class="box" id="Napoyo" onkeydown="testForEnter();" value="" style="width:300px;"/></td>
    </tr>
  <tr>
    <td colspan="2" align="right">Telefono(s) de su apoyo economico</td>
    <td colspan="2"><input name="Tapoyo" type="text" class="box" id="Tapoyo" onkeydown="testForEnter();" value="" style="width:300px;"/></td>
    </tr>
  <tr>
    <td colspan="2" align="right">Correo(s) de su apoyo economico</td>
    <td colspan="2"><input name="Capoyo" type="text" class="box" id="Capoyo" onkeydown="testForEnter();" value="" style="width:300px;"/></td>
    </tr> <tr align="right">
    <td colspan="4" align="center">
     
    
    <h3 style="color:#fff;font-family:LetraOswald;padding:5px;cursor:pointer;font-size:18px;padding-left:10px;margin:7px;background-color:#993300;text-align:center;border-radius:5px;font-weight:normal;" id="titu1">INFORMACIÓN ACADEMICA</h3>
    </td>
    </tr>
  <tr>
    <td align="right">Programa Preferente</td>
    <td align="left"><select name="Programa1" id="Programa1" style="width:180px;">
      <option value="Seleccionar...">Seleccionar...</option>
      <option value="Ingenieria Industrial">Ingenieria Industrial</option>
      <option value="Ingenieria Civil">Ingenieria Civil</option>
      <option value="Ingenieria De Sistemas">Ingenieria De Sistemas</option>
      <option value="Ingenieria Ambiental ">Ingenieria Ambiental</option>
      <option value="Ingenieria Electrica ">Ingenieria Electrica</option>
      <option value="Administracion De Empresas">Administracion De Empresas</option>
      <option value="Negocios Internacionales">Negocios Internacionales</option>
      <option value="Veterinaria">Veterinaria</option>
      <option value="Derecho">Derecho</option>
      <option value="Medicina">Medicina</option>
    </select></td>
    <td align="right">Segundo programa Preferente</td>
    <td align="left"><select name="Programa2" id="Programa2" style="width:180px;">
      <option value="Seleccionar...">Seleccionar...</option>
      <option value="Ingenieria Industrial">Ingenieria Industrial</option>
      <option value="Ingenieria Civil">Ingenieria Civil</option>
      <option value="Ingenieria De Sistemas">Ingenieria De Sistemas</option>
      <option value="Ingenieria Ambiental ">Ingenieria Ambiental</option>
      <option value="Ingenieria Electrica ">Ingenieria Electrica</option>
      <option value="Administracion De Empresas">Administracion De Empresas</option>
      <option value="Negocios Internacionales">Negocios Internacionales</option>
      <option value="Veterinaria">Veterinaria</option>
      <option value="Derecho">Derecho</option>
      <option value="Medicina">Medicina</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">Su fortaleza academica</td>
    <td align="left"><select name="fortaleza1" id="fortaleza1" style="width:180px;">
      <option value="Seleccionar...">Seleccionar...</option>
      <option value="Matematicas">Matematicas</option>
      <option value="Ciencias Sociales">Ciencias Sociales</option>
      <option value="Ciencias">Ciencias</option>
      <option value="Biologia">Biologia</option>
      <option value="Idiomas">Idiomas</option>
    </select></td>
    <td align="right">Segunda fortaleza academica</td>
    <td align="left"><select name="fortaleza2" id="fortaleza2" style="width:180px;">
      <option value="Seleccionar...">Seleccionar...</option>
      <option value="Matematicas">Matematicas</option>
      <option value="Ciencias Sociales">Ciencias Sociales</option>
      <option value="Ciencias">Ciencias</option>
      <option value="Biologia">Biologia</option>
      <option value="Idiomas">Idiomas</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2" align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="right" style="padding-right:50px">

      <input type="checkbox" name="Terminos" id="Terminos" /><label for="Terminos">
      Acepto Terminos  y Condiciones</label></td>
    <td align="left"><input type="button" name="btnEnviar" id="btnEnviar" class="button" value="Finalizar Registro" /></td>
  </tr>
  <tr>
    <td colspan="3" align="right" style="padding-right:50px">&nbsp;</td>
    <td align="left">
    
    <div style="font-size:14px;color:#03C;" id="Resp">
    </div>
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

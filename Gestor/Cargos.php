<?php 
session_start();  
if (empty($_SESSION['ADocumento'])  )           
{           
echo"<script>document.location=('../Inicio.php');</script>";	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cargos</title>

<link href="Estilos.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="Ext/jquery-1.8.3.js"></script>
<script>
 $(document).ready(function(){
	 	function time(){
   setTimeout(function () { $(".mensajes").fadeOut(900); }, 1500);		
		}
$("#mensajesError").hide();	 
$("#mensajesExito").hide();	 
$("#btnEditar").hide();	 
$("#Cancelar").hide();	 
cargar();
$(".delet").click(eliminar);
$(".edit").click(editar);
$("#btnentrar").click(Nuevo);
$("#btnEditar").click(btnEditar);
$("#Cancelar").click(Cancelar);	 

function btnEditar(){
	
if($("#Nombre").val()!="") {	
$("#respu").html("Espere Por Favor...");		  
	var parametros = {
	 "Eoculto" :  $("#oculto").val(),
	 "ENombre" :  $("#Nombre").val()
};				
$.ajax({
data:parametros,
url:"Procesamiento/Cargos.php",
type:"POST",
	success:function(resp ){
		if(resp=="s"){						
			$("#respu").html("");	
			$("#mensajesExito").html("Actualizado Con Exito");
			$("#mensajesExito").show();
			time();			
			Cancelar();
		}else{		
			$("#respu").html("");	
			$("#mensajesError").html("El Codigo Ya Está Registrado");
			$("#mensajesError").show();
			time();
		
		}
	},
	error:function(resp){
		alert("Error Al Conectarse Al Servidor");
	}
});
}else{
	$("#mensajesError").html("Complete Todos Los Campos");
			$("#mensajesError").show();
			time();
}	
}

function Cancelar(){ 
$("#btnEditar").hide();	 
$("#Cancelar").hide();	
$("#btnentrar").show();	
$("#Nombre").val("");	
$("#Contenido").html("<center>Cargando, Espere Por Favor...</center>");	
cargar();	
}
	 
function cargar(){
  
	var parametros = {
	 "Cdocentes" : "X"
};				
$.ajax({
data:parametros,
url:"Procesamiento/Cargos.php",
type:"POST",
	success:function(resp ){
	$("#Contenido").html(resp);	 
	$(".delet").click(eliminar);
	$(".edit").click(editar);
	},
	error:function(resp){
		alert("Error Al Conectarse Al Servidor");
	}
});

}	

function Nuevo(){
if($("#Nombre").val()!="") {	
$("#respu").html("Espere Por Favor...");		  
	var parametros = {
	 "NNombre" :  $("#Nombre").val()
};				
$.ajax({
data:parametros,
url:"Procesamiento/Cargos.php",
type:"POST",
	success:function(resp ){
		if(resp=="s"){						
			$("#respu").html("");	
			$("#mensajesExito").html("Guardado Con Exito");
			$("#mensajesExito").show();
			time();
			$("#Nombre").val("");
			
			cargar();
		}else{		
			$("#respu").html("");	
			$("#mensajesError").html("El Codigo Ya Está Registrado");
			$("#mensajesError").show();
			time();
		
		}
	},
	error:function(resp){
		alert("Error Al Conectarse Al Servidor");
	}
});
}else{
	$("#mensajesError").html("Complete Todos Los Campos");
	$("#mensajesError").show();
	time();
}	
}

function editar(){
	
	var parametros = {
	 "BuscarDocente" :  $(this).val()
};				
$("#oculto").val($(this).val());
	$("#Contenido").html("<center>Cargando, Espere Por Favor...</center>");	
$.ajax({
data:parametros,
url:"Procesamiento/Cargos.php",
type:"POST",
	success:function(resp){			
		 $("#Nombre").val(resp);	
		 
$("#btnEditar").show();	 
$("#Cancelar").show();	 

$("#btnentrar").hide();	
		$("#Contenido").html("");	
	},
	error:function(resp){
		alert("Error Al Conectarse Al Servidor");
	}
});
}


function eliminar(){
if(confirm("¿Esta Seguro Que Desea Eliminar Este Periodo?")) {	
  
	var parametros = {
	 "CodDocente" :  $(this).val()
};				
$.ajax({
data:parametros,
url:"Procesamiento/Cargos.php",
type:"POST",
	success:function(resp ){
		if(resp=="s"){	
		
			$("#mensajesExito").html("Eliminado Con Exito");
			$("#mensajesExito").show();
			time();
	$("#Contenido").html("<center>Cargando, Espere Por Favor...</center>");	 
	cargar();
		}else{
			$("#mensajesError").html("No Se Pudo Eliminar");
			$("#mensajesError").show();
			time();
		
		}
	},
	error:function(resp){
		alert("Error Al Conectarse Al Servidor");
	}
});
}	
}
	 
	  
});
		
</script>

</head>


<body>
<div id="Principal">

<div style="text-align:right;font-size:14px;padding:3px;background-color:#fff;color:#333;">

<?php
if (!empty($_SESSION['ADocumento']))          
{ 
echo "Identificado Como: ".$_SESSION['ANombre']." <a href='../Inicio.php' style='margin-left:7px;margin-right:10px; color: #09C;font-size:16px;font-weight:bold'>Cerrar Sesion</a>";
}
?>
</div>
 <?php   
   if (!empty($_SESSION['ADocumento']))          
{ $variable= file_get_contents("Partes/Opciones.html");
	echo $variable;
}
?>





<div style=" 
background-position:center;
background-repeat: no-repeat;margin-left:auto;margin-right:auto;font-size:20px;width:100%;height:215px;text-align:center;color:#3d5691;"><br /><br />
<table border="0" cellpadding="8" style="margin:auto;margin-bottom:50px;">  <tr>
  <td align="right">Nombre Cargo</td>
  <td align="left"><input name="Nombre" type="text" class="box" id="Nombre" onkeydown="testForEnter();" value="" style="width:300px;"/></td>
</tr>
  <tr>
    <td>
    <input type="hidden" id="oculto" name="oculto" />
    </td>
    <td align="left"><input type="button" name="btnentrar" id="btnentrar" class="button" value="Guardar" />
      <input type="button" name="btnEditar" id="btnEditar" class="button" value="Editar" />
      <input type="button" name="Cancelar" id="Cancelar" class="button" value="Cancelar" />      <span id="respu" style="font-size:12px;margin-left:5px;"></span></td>
  </tr>
</table>
  
</div>
  
  
  <h3></h3>
  
<div id="Contenido" style="max-height:500px;overflow-y: scroll;">
<center>Cargando, Espere Por Favor...</center>
</div>

<div id ="mensajesExito" class="exito mensajes"></div>
   <div id ="mensajesError" class="error mensajes"></div>
  
      <?php 
		$variable= file_get_contents("Partes/Pie.html");
		echo $variable;
    ?>
</div>



</body>
</html>
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
Negro1();

$("#Negro1").click(Negro1);
$(".linkProg").click(Resize);
 
		function Negro1(){
			 $("#DivSobreMG").hide(500);
		}


function Resize(){
	
$("#DivSobreMG").show(800);
$("#blanco").html('<img src="Imagenes/Sobres.png" width="500">');
}

 });

</script>

 
</head>

<body style="margin:0px;"  onLoad="scroll();">


<?php

$variable= file_get_contents("Partes/Superior.html");
	echo $variable;

?>


 

<div id="DivSobreMG">

<div style="background:#fff;z-index:999999;position:fixed;top:10%;margin-left:50%;width:500px;left:-250px" id="blanco">
</div>  
    
<div style="background:#333;opacity:0.8;position:fixed;z-index:999998;top:0;left:0;width:100%;height:100%" id="Negro1">    
</div>

</div>



<div style="max-width:1100px;margin:auto;width:100%;font-family:Futura;margin-top:30px">

<center>
<img src="Imagenes/Banner.jpg"  style="max-width:1000px;width:95%"/>
</center>



<h3 style="color:#fff;font-family:LetraOswald;padding:5px;cursor:pointer;font-size:18px;padding-left:10px;margin:7px;background-color:#993300;text-align:center;border-radius:5px;font-weight:normal;margin-top:30px; " id="titu1">AREA DE SISTEMAS</h3>
<div style="font-family:Verdana, Geneva, sans-serif;margin-top:5px;color:#333;font-size:14px;line-height:155%;margin-left:40px;">


<a style="text-decoration:none;cursor:pointer;" class="linkProg" > <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Técnico Laboral en Auxiliar De Sistemas Informáticos</a>

<br />

<a style="text-decoration:none;cursor:pointer;" class="linkProg" > <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Técnico Laboral En Auxiliar De mantenimiento De Equipos Electronicos</a>

<br />

<a style="text-decoration:none;cursor:pointer;" class="linkProg" > <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Técnico Laboral en Ensamble y Mantenimiento de Computadores</a>

<br />

<a style="text-decoration:none;cursor:pointer;" class="linkProg" > <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Técnico Laboral en Auxiliar En Diseño Y Artes Gráficas</a>

<br />
<a style="text-decoration:none;cursor:pointer;" class="linkProg"> <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Instalador De Redes De Telecomunicaciones</a>

<br />



</div>

<h3 style="color:#fff;font-family:LetraOswald;padding:5px;cursor:pointer;font-size:18px;padding-left:10px;margin:7px;background-color:#993300;text-align:center;border-radius:5px;font-weight:normal;margin-top:30px; " id="titu1">AREA DE SALUD</h3>
<div style="font-family:Verdana, Geneva, sans-serif;margin-top:5px;color:#333;font-size:14px;line-height:155%;margin-left:40px;">
<a style="text-decoration:none;cursor:pointer;" class="linkProg"><img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Auxiliar en Servicios Farmacéuticos</a>

<br />

<a style="text-decoration:none;cursor:pointer;" class="linkProg" > <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Auxiliar en Enfermeríia</a>

<br />

<a style="text-decoration:none;cursor:pointer;" class="linkProg"><img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Auxiliar en Salud Oral </a>

<br />


<a style="text-decoration:none;cursor:pointer;" class="linkProg" ><img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Auxiliar Administrativo en Salud</a>

<br />

<a style="text-decoration:none;cursor:pointer;" class="linkProg"><img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Auxiliar en Salud Pública</a>
</div>


<h3 style="color:#fff;font-family:LetraOswald;padding:5px;cursor:pointer;font-size:18px;padding-left:10px;margin:7px;background-color:#993300;text-align:center;border-radius:5px;font-weight:normal;margin-top:30px; " id="titu1">AREA DE ADMINISTRACION</h3>

<div style="font-family:Verdana, Geneva, sans-serif;margin-top:5px;color:#333;font-size:14px;line-height:155%;margin-left:40px;">
<a style="text-decoration:none;cursor:pointer;" class="linkProg" > <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>
Técnico Laboral en Auxiliar En Operaciones Portuarias
</a><br />


<a style="text-decoration:none;cursor:pointer;" class="linkProg" > <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>
Técnico Laboral en Auxiliar De Compras E Inventarios
</a>

<br />

<a style="text-decoration:none;cursor:pointer;" class="linkProg"> <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Auxiliar Comercio Exterior</a>

<br />
<a style="text-decoration:none;cursor:pointer;" class="linkProg" > <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Técnico Laboral en Auxiliar Contable</a>




<br />

<a style="text-decoration:none;cursor:pointer;" class="linkProg"> <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Auxiliar de Recursos Humanos</a>

<br />


<a style="text-decoration:none;cursor:pointer;" class="linkProg"> <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Técnico Laboral en Auxiliar Administrativo</a>

<br />

<a style="text-decoration:none;cursor:pointer;" class="linkProg" > <img src="Imagenes/next.png" style="margin-right:10px;margin-bottom:-3px;"/>Técnico Laboral en Secretariado Ejecutivo </a>
</div>


</div>


 
 
<?php

$variable= file_get_contents("Partes/Pie.html");
	echo $variable;

?>


 
</body>
</html>

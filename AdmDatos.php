<?php	

header('Content-Type: text/html; charset=UTF-8');
			
	require_once("Conexion.php");
	if(!empty($_POST["EnvioNombres"])){		
	
		$consulta = "update estudiantes set nombre='".mysql_real_escape_string($_POST["EnvioNombres"])."',
		apellido='".mysql_real_escape_string($_POST["EnvioApellidos"])."',
		documento='".mysql_real_escape_string($_POST["EnvioIdentificacion"])."',
		tipodoc='".mysql_real_escape_string($_POST["EnvioTipo"])."',
		telefono='".mysql_real_escape_string($_POST["EnvioTel"])."',
		celular='".mysql_real_escape_string($_POST["EnvioCelular"])."',
		otrocorreo='".mysql_real_escape_string($_POST["EnviooCorreo"])."',
		direccion='".mysql_real_escape_string($_POST["EnvioDir"])."',
		barrio='".mysql_real_escape_string($_POST["EnvioBarrio"])."',
		grado='".mysql_real_escape_string($_POST["EnvioGrado"])."',
		colegio='".mysql_real_escape_string($_POST["EnvioColegio"])."',
		recursos='".mysql_real_escape_string($_POST["Enviorecursos"])."',
		medio='".mysql_real_escape_string($_POST["EnvioMedio"])."',
		apoyo='".mysql_real_escape_string($_POST["Envioapoyo"])."',
		napoyo='".mysql_real_escape_string($_POST["EnvioNapoyo"])."',
		telapoyo='".mysql_real_escape_string($_POST["EnvioTapoyo"])."',
		correoapoyo='".mysql_real_escape_string($_POST["EnvioCapoyo"])."',
		programa1='".mysql_real_escape_string($_POST["EnvioPrograma1"])."',
		programa2='".mysql_real_escape_string($_POST["EnvioPrograma2"])."',
		fortaleza1='".mysql_real_escape_string($_POST["Enviofortaleza1"])."',
		fortaleza2='".mysql_real_escape_string($_POST["Enviofortaleza2"])."',
		icfes='".mysql_real_escape_string($_POST["EnvioPuntaje"])."',
		puesto='".mysql_real_escape_string($_POST["EnvioPuesto"])."',
		multi='".mysql_real_escape_string($_POST["EnvioMulticulturalidad"])."',
		sisbem='".mysql_real_escape_string($_POST["EnvioSISBEN"])."' where		
		correo='".mysql_real_escape_string($_POST["EnvioCorreo"])."'	";			
		if(	$datos=mysql_query($consulta)){
			
				echo "s";
		}else{		
				echo "n";
		}
	}


?>
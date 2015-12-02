<?php


header("Content-Disposition: attachment; filename=Visitantes.xls");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Pragma: no-cache");
header("Expires: 0");




require_once("../Procesamiento/Conexion.php");
	$consulta="select nombre,apellido,documento,tipodoc,telefono,celular,correo,otrocorreo,direccion,barrio,grado,colegio,recursos,medio,apoyo,napoyo,telapoyo,correoapoyo,programa1,programa2,fortaleza1,fortaleza2,icfes,puesto,multi,sisbem,fechainsc from estudiantes WHERE  fechainsc>='".mysql_real_escape_string($_GET["Inicio"])."' and
				fechainsc<='".mysql_real_escape_string($_GET["Final"])."' ";	
				$datos=mysql_query($consulta);		
				
echo'<table BORDER="1" >		
	
	<tr>
<th  bgcolor="#CCCCCC">Nombres</th>
<th  bgcolor="#CCCCCC">Apellidos</th>
<th  bgcolor="#CCCCCC">Documento Identificacion</th>
<th  bgcolor="#CCCCCC">Tipo Documento</th>
<th  bgcolor="#CCCCCC">Telefono</th>
<th  bgcolor="#CCCCCC">Celular</th>
<th  bgcolor="#CCCCCC">Correo</th>
<th  bgcolor="#CCCCCC">Correo Alterno</th>
<th  bgcolor="#CCCCCC">Direccion</th>
<th  bgcolor="#CCCCCC">Barrio</th>
<th  bgcolor="#CCCCCC">Grado</th>
<th  bgcolor="#CCCCCC">Colegio</th>
<th  bgcolor="#CCCCCC">Recursos</th>
<th  bgcolor="#CCCCCC">Medio</th>
<th  bgcolor="#CCCCCC">Apoyo</th>
<th  bgcolor="#CCCCCC">Nombre De Apoyo</th>
<th  bgcolor="#CCCCCC">Telefono De Apoyo</th>
<th  bgcolor="#CCCCCC">Correo De apoyo</th>
<th  bgcolor="#CCCCCC">Programa Opcion 1</th>
<th  bgcolor="#CCCCCC">Programa Opcion 2</th>
<th  bgcolor="#CCCCCC">Fortaleza 1</th>
<th  bgcolor="#CCCCCC">Fortaleza 2</th>
<th  bgcolor="#CCCCCC">Puntaje ICFES</th>
<th  bgcolor="#CCCCCC">Puesto ICFES</th>
<th  bgcolor="#CCCCCC">Multiculturalidad</th>
<th  bgcolor="#CCCCCC">Sisbem</th>
<th  bgcolor="#CCCCCC">Fecha Inscripcion</th>
</tr>';		
						

			
				while($row=mysql_fetch_array($datos)){		
							
					echo '<tr>
						<td>'.($row[0]).'</td>
						<td>'.($row[1]).'</td>
						<td>'.($row[2]).'</td>
						<td>'.($row[3]).'</td>
						<td>'.($row[4]).'</td>
						<td>'.($row[5]).'</td>
						<td>'.($row[6]).'</td>
						<td>'.($row[7]).'</td>
						<td>'.($row[8]).'</td>
						<td>'.($row[9]).'</td>
						<td>'.($row[10]).'</td>
						<td>'.($row[11]).'</td>
						<td>'.($row[12]).'</td>
						<td>'.($row[13]).'</td>
						<td>'.($row[14]).'</td>
						<td>'.($row[15]).'</td>
						<td>'.($row[16]).'</td>
						<td>'.($row[17]).'</td>
						<td>'.($row[18]).'</td>
						<td>'.($row[19]).'</td>
						<td>'.($row[20]).'</td>
						<td>'.($row[21]).'</td>
						<td>'.($row[22]).'</td>
						<td>'.($row[23]).'</td>
						<td>'.($row[24]).'</td>
						<td>'.($row[25]).'</td>
						<td>'.($row[26]).'</td>
						</tr>';
				
		}
				
				
				echo"</table>";	

?>
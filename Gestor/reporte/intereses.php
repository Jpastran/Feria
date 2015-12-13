<?php

header("Content-Disposition: attachment; filename=Intereses.xls");
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Pragma: no-cache");
header("Expires: 0");




require_once("../../db/conectar.php");
$consulta = "SELECT o.departamento,o.categoria,o.nombre,a.nombre,p.nombre,i.fecha,e.nombre,e.apellido,e.documento,e.tipodoc,e.telefono,e.celular,e.correo FROM ((((ofertas o INNER JOIN areas a ON a.codoferta=o.codigo) INNER JOIN programas p ON p.codarea=a.codigo  )INNER JOIN interes i ON i.codprograma=p.codigo)INNER JOIN estudiantes e ON i.codestudiante=e.correo) WHERE  i.fecha>='" . mysql_real_escape_string($_GET["Inicio"]) . "' and
				i.fecha<='" . mysql_real_escape_string($_GET["Final"]) . "' ";
$datos = mysql_query($consulta);

echo'<table BORDER="1" >		
	
	<tr>
<th  bgcolor="#CCCCCC">Departamento</th>
<th  bgcolor="#CCCCCC">Categoria</th>
<th  bgcolor="#CCCCCC">Institucion</th>
<th  bgcolor="#CCCCCC">Area</th>
<th  bgcolor="#CCCCCC">Programa</th>
<th  bgcolor="#CCCCCC">Fecha</th>
<th  bgcolor="#CCCCCC">Estudiante</th>
<th  bgcolor="#CCCCCC">Documento De Identidad</th>
<th  bgcolor="#CCCCCC">Tipo Documento</th>
<th  bgcolor="#CCCCCC">Telefono</th>
<th  bgcolor="#CCCCCC">Celular</th>
<th  bgcolor="#CCCCCC">Correo</th>
</tr>';



while ($row = mysql_fetch_array($datos)) {

    echo '<tr>
						<td>' . ($row[0]) . '</td>
						<td>' . ($row[1]) . '</td>
						<td>' . ($row[2]) . '</td>
						<td>' . ($row[3]) . '</td>
						<td>' . ($row[4]) . '</td>
						<td>' . ($row[5]) . '</td>
						<td>' . ($row[6]) . ' ' . ($row[7]) . '</td>
						<td>' . ($row[8]) . '</td>
						<td>' . ($row[9]) . '</td>
						<td>' . ($row[10]) . '</td>
						<td>' . ($row[11]) . '</td>
						<td>' . ($row[12]) . '</td>
						</tr>';
}


echo"</table>";
?>
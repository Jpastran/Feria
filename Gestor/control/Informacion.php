<?php

require_once ("../../db/conectar.php");

if (!empty($_POST["CodDocente"])) {
	eliminar();
} else {

	if (!empty($_POST["NNombre"])) {
		nuevo();
	} else {
		if (!empty($_POST["Cdocentes"])) {
			lista();
		} else {
			if (!empty($_POST["BuscarDocente"])) {
				buscar();
			} else {
				if (!empty($_POST["Editar"])) {
					Editar();
				} else {

				}
			}
		}
	}
}

function Editar() {
	$consulta = "update configuracion set
				 mision='" . mysql_real_escape_string(($_POST["Mision"])) . "',
				vision='" . mysql_real_escape_string(($_POST["Vision"])) . "',
				quienes='" . mysql_real_escape_string(($_POST["Quienes"])) . "',
				objetivos='" . mysql_real_escape_string(($_POST["Objetivos"])) . "',
				producto='" . mysql_real_escape_string(($_POST["Producto"])) . "',
				email='" . mysql_real_escape_string(($_POST["Correos"])) . "' ";

	if ($datos = mysql_query($consulta)) {
		echo "s";
	} else {
		echo "n";
	}
}

function buscar() {
	$consulta = "SELECT mision,vision,quienes,objetivos,producto,email FROM configuracion	";
	$datos = mysql_query($consulta);

	if ($row = mysql_fetch_array($datos)) {
		echo(($row[0])) . "ô" . (($row[1])) . "ô" . (($row[2])) . "ô" . (($row[3])) . "ô" . (($row[4])) . "ô" . (($row[5]));
	}
}

function lista() {
	$consulta = "SELECT mision,vision,quienes,objetivos,producto,email FROM configuracion	 ";
	$datos = mysql_query($consulta);

	echo '<div class="datagrid" style="border:solid 1px #ccc;margin:auto;width:80%;">
<table style="margin:auto;border:solid 1px #ccc;">
<thead><tr ><th width="100px">Titulo</th><th>Contenido</th></tr></thead><tfoot><tr><td colspan="2"><center><div id="no-paging" ><input type="button" name="Editar" id="Editar" class="button" value="Editar Informacion" style="margin:8px" /></div></center></td></tr></tfoot><tbody>';

	$i = 1;
	while ($row = mysql_fetch_array($datos)) {

		echo '<tr >
						<td><strong>Mision</strong></td>
						<td>' . nl2br(($row[0])) . '</td></tr>
						<tr class="alt">
						<td><strong>Vision</strong></td>
						<td>' . nl2br(($row[1])) . '</td></tr><tr >
						<td><strong>Quienes Somos</strong></td>
						<td>' . nl2br(($row[2])) . '</td></tr>
						<tr class="alt">
						<td><strong>Objetivos</strong></td>
						<td>' . nl2br(($row[3])) . '</td></tr><tr >
						<td><strong>Producto</strong></td>
						<td>' . nl2br(($row[4])) . '</td></tr>
						<tr class="alt">
						<td><strong>Correos</strong></td>
						<td>' . ($row[5]) . '</td></tr>
						';
	}
	echo "</tbody>
</table></div>";
}
?>
<?php

require_once ("../../db/conectar.php");

if (!empty($_POST["Guardar"])) {
	Guardar();
} else {
	if (!empty($_POST["Eliminar"])) {
		Eliminar();
	} else {
		if (!empty($_POST["Carga"])) {
			Carga();
		} else {
			if (!empty($_POST["Editar"])) {
				Editar();
			} else {
				if (!empty($_POST["cargaAreas"])) {
					cargaAreas();
				}
			}
		}
	}
}

function cargaAreas() {

	$consulta = 'SELECT codigo,nombre FROM areas where codoferta="' . $_POST["cargaAreas"] . '" ORDER BY nombre';
	$datos = mysql_query($consulta);

	echo "<select name='Areas' id='Areas' style='width:300px;font-size:14px;padding:3px' >
					<option value='-1' selected='selected'>Seleccionar...</option>";

	while ($row = mysql_fetch_array($datos)) {
		echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
	}
	echo "</select>";
}

function Editar() {
	$consulta = "update programas set nombre='" . mysql_real_escape_string($_POST["Nombre"]) . "',
					 codarea='" . mysql_real_escape_string($_POST["Areas"]) . "', 
					 descripcion='" . mysql_real_escape_string($_POST["Descripcion"]) . "'
					 where codigo='" . mysql_real_escape_string($_POST["Codigo"]) . "'";
	if ($datos = mysql_query($consulta)) {
		echo "s";
	} else {
		echo "n";
	}
}

function Carga() {
	$consulta = "Select p.nombre,a.codoferta,p.descripcion,a.codigo from programas P INNER JOIN areas a on a.codigo= p.codarea  where p.codigo='" . mysql_real_escape_string($_POST["Carga"]) . "'";
	$datos = mysql_query($consulta);

	if ($row = mysql_fetch_array($datos)) {
		echo $row[0] . "ô" . $row[1] . "ô" . $row[2] . "ô" . $row[3];
	}
}

function Eliminar() {
	$consulta = "delete from programas where codigo='" . mysql_real_escape_string($_POST["Eliminar"]) . "'";
	if ($datos = mysql_query($consulta)) {
		echo "s";
	} else {
		echo "n";
	}
}

function Guardar() {
	$sw = 0;
	$ruta = "../../img/gestor/";
	foreach ($_FILES as $key) {

		if ($key['error'] == UPLOAD_ERR_OK) {//Verificamos si se subio correctamente
			$nombre = time() . ".jpg";
			//Obtenemos el nombre del archivo
			$temporal = $key['tmp_name'];
			//Obtenemos el nombre del archivo temporal
			move_uploaded_file($temporal, $ruta . $nombre);
			//Movemos el archivo temporal a la ruta especificada

			$sw = 1;
		}
		if ($sw > 0) {

			$consulta = "
			insert programas(nombre,imagen,codarea,descripcion) 
			values('" . mysql_real_escape_string($_POST["Nombre"]) . "',
			'" . $nombre . "',
			'" . mysql_real_escape_string($_POST["Areas"]) . "',
			'" . mysql_real_escape_string($_POST["Descripcion"]) . "')";

			if ($datos = mysql_query($consulta)) {
				echo "s";
			} else {
				echo "n";
			}
		} else {
			echo "X";
		}
	}
}
?>
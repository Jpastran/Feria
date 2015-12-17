<?php

require_once ("../../db/conectar.php");

if (!empty($_POST["Crear"])) {
    crear();
} elseif (!empty($_POST["Eliminar"])) {
    eliminar();
} elseif (!empty($_POST["Carga"])) {
    Carga();
} elseif (!empty($_POST["Editar"])) {
    editar();
} elseif (!empty($_POST["SelectArea"])) {
    selectAreas();
}

function selectAreas() {
    $consulta = 'SELECT codigo,nombre FROM areas where codoferta="' . $_POST["Oferta"] . '" ORDER BY nombre';
    $datos = mysql_query($consulta);
    echo "<option value='-1' selected='selected'>Seleccionar...</option>";
    while ($row = mysql_fetch_array($datos)) {
        echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
    }
}

function editar() {
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

function eliminar() {
    $consulta = "delete from programas where codigo='" . mysql_real_escape_string($_POST["Eliminar"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function crear() {
    $sw = 0;
    $ruta = "../../img/";
    foreach ($_FILES as $key) {
        if ($key['error'] == UPLOAD_ERR_OK) {//Verificamos si se subio correctamente
            $nombre = time() . ".jpg";
            $temporal = $key['tmp_name'];
            move_uploaded_file($temporal, $ruta . $nombre);
            $sw = 1;
        }
        if ($sw > 0) {
            $consulta = "insert programas(nombre,imagen,codarea,descripcion) 
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
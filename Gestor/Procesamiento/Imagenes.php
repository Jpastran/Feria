<?php

require_once("Conexion.php");


if (!empty($_POST["Guardar"])) {
    Guardar();
} else {
    if (!empty($_POST["Eliminar"])) {
        Eliminar();
    }
}

function Eliminar() {
    $consulta = "delete from banners where nombre='" . mysql_real_escape_string($_POST["Eliminar"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function Guardar() {
    $sw = 0;
    $ruta = "../../Banner/";
    foreach ($_FILES as $key) {



        if ($key['error'] == UPLOAD_ERR_OK) {//Verificamos si se subio correctamente
            $nombre = time() . ".jpg"; //Obtenemos el nombre del archivo
            $temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
            move_uploaded_file($temporal, $ruta . $nombre); //Movemos el archivo temporal a la ruta especificada

            $sw = 1;
        }
        if ($sw > 0) {

            $consulta = "
			insert banners(nombre) 
			values(		'" . $nombre . "')";

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
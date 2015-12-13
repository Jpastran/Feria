<?php

require_once("Conexion.php");


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
            }
        }
    }
}

function Editar() {
    $consulta = "update ofertas set nombre='" . mysql_real_escape_string($_POST["Nombre"]) . "',
						 departamento='" . mysql_real_escape_string($_POST["Departamento"]) . "', 
						 categoria='" . mysql_real_escape_string($_POST["Categoria"]) . "'
						 where codigo='" . mysql_real_escape_string($_POST["Codigo"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function Carga() {
    $consulta = "Select nombre,departamento,categoria from ofertas where codigo='" . mysql_real_escape_string($_POST["Carga"]) . "'";
    $datos = mysql_query($consulta);


    if ($row = mysql_fetch_array($datos)) {
        echo $row[0] . "ô" . $row[1] . "ô" . $row[2];
    }
}

function Eliminar() {
    $consulta = "delete from ofertas where codigo='" . mysql_real_escape_string($_POST["Eliminar"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function Guardar() {
    $sw = 0;
    $ruta = "../../../img/gestor/";
    foreach ($_FILES as $key) {

        if ($sw == 0) {

            if ($key['error'] == UPLOAD_ERR_OK) {//Verificamos si se subio correctamente
                $nombre = time() . ".jpg"; //Obtenemos el nombre del archivo
                $temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
                move_uploaded_file($temporal, $ruta . $nombre); //Movemos el archivo temporal a la ruta especificada

                $sw = 1;
            } else {
                
            }
        } else {
            if ($key['error'] == UPLOAD_ERR_OK) {//Verificamos si se subio correctamente
                $nombre1 = time() . "2.jpg"; //Obtenemos el nombre del archivo
                $temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
                move_uploaded_file($temporal, $ruta . $nombre1); //Movemos el archivo temporal a la ruta especificada

                $sw = 2;
            }
        }
    }


    if ($sw > 0) {

        $consulta = "
			insert ofertas(nombre,imagen,banner,departamento,categoria) 
			values('" . mysql_real_escape_string($_POST["Nombre"]) . "',
			'" . $nombre1 . "',
			'" . $nombre . "',
			'" . mysql_real_escape_string($_POST["Departamento"]) . "',
			'" . mysql_real_escape_string($_POST["Categoria"]) . "')";

        if ($datos = mysql_query($consulta)) {
            echo "s";
        } else {
            echo "n";
        }
    } else {
        echo "X";
    }
}

?>
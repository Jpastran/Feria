<?php

require_once ("../../db/conectar.php");

if (!empty($_POST["Crear"])) {
    crear();
} elseif (!empty($_POST["Borrar"])) {
    eliminar();
} elseif (!empty($_POST["Cargar"])) {
    lista();
} else {
    echo 'No se recibio Informacion';
}

function eliminar() {
    $consulta = "delete from banners where nombre='" . mysql_real_escape_string($_POST["Eliminar"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function crear() {
    $sw = 0;
    $ruta = "../../img/banner/";
    foreach ($_FILES as $key) {
        if ($key['error'] == UPLOAD_ERR_OK) {
            $nombre = time() . ".jpg";
            $temporal = $key['tmp_name'];
            move_uploaded_file($temporal, $ruta . $nombre);
            $sw = 1;
        }
        if ($sw > 0) {
            $consulta = "insert banners(nombre) 
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

function lista() {
    $consulta = "SELECT nombre FROM banners ";
    $datos = mysql_query($consulta);
echo'<div class="datagrid table-responsive">
    <table style="margin:auto;">
        <thead>
            <tr>
                <th>Imagen</th>
                <th width="80">Opciones</th>
            </tr>
        </thead>     
        <tbody>';
            $i = 1;
            while ($row = mysql_fetch_array($datos)) {

            if ($i == 1) {
            echo '<tr>';
                $i = 2;
                } else {
                echo '<tr class="alt">';
                $i = 1;
                }
                echo '
                <td align="center"><img src="../img/banner/' . $row[0] . '" style="max-width:800px"></td>			
                <td align="center">
                    <input type="image" src="../img/gestor/delet.png" class="delet" value="' . $row[0] . '"/>
                </td>
            </tr>';
            }
            echo'
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <div id="no-paging">&nbsp;</div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>';
}

?>
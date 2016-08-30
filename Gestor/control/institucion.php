<?php

require_once ("../../db/conectar.php");

if (!empty($_POST["Lista"])) {
    lista();
} elseif (!empty($_POST["Buscar"])) {
    buscar();
} elseif (!empty($_POST["Crear"])) {
    crear();
} elseif (!empty($_POST["Editar"])) {
    editar();
} elseif (!empty($_POST["Borrar"])) {
    eliminar();
} else {
    echo 'No se recibio nada';
}

function lista() {
    $sql = "SELECT * FROM ofertas";
    $query = mysql_query($sql);
    $num_total_registros = mysql_num_rows($query);

    include '../mods/paginar_init.php';
    
    $consulta = "SELECT codigo,nombre,categoria,departamento,imagen FROM ofertas ORDER BY nombre LIMIT " . $inicio . "," . $TAMANO_PAGINA;
    $datos = mysql_query($consulta);
    echo'
    <div class="datagrid table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Departamento</th>
                    <th>Logo</th>
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
        echo '  <td>' . $row[1] . '</td>
                <td>' . $row[2] . '</td>
                <td>' . $row[3] . '</td>
                <td align="center"><img src="../img/' . $row[4] . '" style="max-width:150px"></td>			
                <td align="center">
                    <input type="image" src="../img/gestor/edit.png" class="edit" value="' . $row[0] . '"/>
                    <input type="image" src="../img/gestor/delet.png" class="delet" value="' . $row[0] . '"/>
                </td>
            </tr>';
    }
    echo'</tbody>';
    
    $url = 'Institucion.php';
    $colspan = 5;

    include '../mods/paginar_gen.php';
    
    echo '
        </table>
    </div>';   
}

function buscar() {
    $consulta = "Select nombre,departamento,categoria from ofertas where codigo='" . mysql_real_escape_string($_POST["Codigo"]) . "'";
    $datos = mysql_query($consulta);
    if ($row = mysql_fetch_array($datos)) {
        echo $row[0] . "ô" . $row[1] . "ô" . $row[2];
    }
}

function crear() {
    $sw = 0;
    $ruta = "../../img/";
    foreach ($_FILES as $key) {
        if ($sw == 0) {
            if ($key['error'] == UPLOAD_ERR_OK) {
                $nombre = "banner" . date('His') . "." . end(explode(".", $key['name']));
                $temporal = $key['tmp_name'];
                move_uploaded_file($temporal, $ruta . $nombre);
                $sw = 1;
            }
        } else {
            if ($key['error'] == UPLOAD_ERR_OK) {
                $nombre1 = "logo" . date('His') . "." . end(explode(".", $key['name']));
                $temporal = $key['tmp_name'];
                move_uploaded_file($temporal, $ruta . $nombre1);
                $sw = 2;
            }
        }
    }
    if ($sw > 0) {
        $consulta = "insert ofertas(nombre,imagen,banner,departamento,categoria) 
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

function editar() {
    $consulta = "update ofertas set 
                    nombre='" . mysql_real_escape_string($_POST["Nombre"]) . "',
                    departamento='" . mysql_real_escape_string($_POST["Departamento"]) . "', 
                    categoria='" . mysql_real_escape_string($_POST["Categoria"]) . "'
                    where codigo='" . mysql_real_escape_string($_POST["Codigo"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function eliminar() {
    $consulta = "delete from ofertas where codigo='" . mysql_real_escape_string($_POST["Eliminar"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

?>
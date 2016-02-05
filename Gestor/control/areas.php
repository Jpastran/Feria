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
} elseif (!empty($_POST["SelectOferta"])) {
    selectOferta();
} else {
    echo 'No se recibio nada';
}

function lista() {
    $consulta = "Select g.codigo,g.nombre,o.nombre,o.departamento,o.categoria from areas g inner join ofertas o on o.codigo=g.codoferta order by g.nombre ";
    $datos = mysql_query($consulta);
    echo '
    <div class="datagrid table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Categoria</th>
                    <th>Oferta</th>
                    <th>Area</th>
                    <th width="80">Opciones</th>
                </tr>
            </thead>
            <tbody>
        ';
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
                <td>' . $row[3] . '</td>
                <td>' . $row[4] . '</td>
                <td>' . $row[2] . '</td>
                <td>' . $row[1] . '</td>
                <td align="center">
                    <input type="image" src="../img/gestor/edit.png" class="edit" value="' . $row[0] . '"/>
                    <input type="image" src="../img/gestor/delet.png" class="delet" value="' . $row[0] . '"/>
                </td></tr>
            ';
    }
    echo '
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <div id="no-paging">&nbsp;</div>
                    </td>
                </tr>
            </tfoot>
            </table>
        </div>
        ';
}

function buscar() {
    $consulta = "Select nombre,codoferta from areas where codigo='" . mysql_real_escape_string($_POST["Codigo"]) . "'";
    $datos = mysql_query($consulta);
    if ($row = mysql_fetch_array($datos)) {
        echo $row[0] . "ô" . $row[1];
    }
}

function crear() {
    $consulta = "insert areas(nombre,codoferta) values('" . mysql_real_escape_string($_POST["Nombre"]) . "','" . mysql_real_escape_string($_POST["Oferta"]) . "')";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function editar() {
    $consulta = "update areas set nombre='" . mysql_real_escape_string($_POST["Nombre"]) . "',
				codoferta='" . mysql_real_escape_string($_POST["Oferta"]) . "' 				
				where codigo='" . mysql_real_escape_string($_POST["Codigo"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function eliminar() {
    $consulta = "Delete from areas where codigo='" . mysql_real_escape_string($_POST["Codigo"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function selectOferta() {
    $consulta = 'SELECT codigo,departamento,categoria,nombre FROM ofertas ORDER BY departamento,categoria,nombre';
    $datos = mysql_query($consulta);
    echo ' <option value="-1" selected="selected">Seleccionar...</option>';
    while ($row = mysql_fetch_array($datos)) {
        echo "<option value='" . $row[0] . "'>" . $row[1] . " / " . $row[2] . " / " . $row[3] . "</option>";
    }
}

?>
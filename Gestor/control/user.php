<?php

require_once ("../../db/conectar.php");

if (!empty($_POST["Borrar"])) {
    eliminar();
} elseif (!empty($_POST["Crear"])) {
    crear();
} elseif (!empty($_POST["Cargar"])) {
    lista();
} else if (!empty($_POST["Buscar"])) {
    buscar();
} elseif (!empty($_POST["Editar"])) {
    editar();
} else {
    echo 'No se recibio nada';
}

function editar() {
    $consulta = "update usuarios set nombre='" . mysql_real_escape_string($_POST["Nombre"]) . "',
                                usuario='" . mysql_real_escape_string($_POST["Usuario"]) . "', 
				pass='" . mysql_real_escape_string($_POST["pass"]) . "' 				
				where usuario='" . mysql_real_escape_string($_POST["oculto"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function buscar() {
    $consulta = "Select usuario,nombre,pass from usuarios where usuario='" . mysql_real_escape_string($_POST["Codigo"]) . "'";
    $datos = mysql_query($consulta);
    if ($row = mysql_fetch_array($datos)) {
        echo $row[0] . "ô" . $row[1] . "ô" . $row[2];
    }
}

function lista() {
    $consulta = "Select g.usuario,g.nombre from usuarios g  order by g.nombre ";
    $datos = mysql_query($consulta);
    echo '<div class="datagrid table-responsive">
            <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
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
        echo '<td>' . $row[0] . '</td>
              <td>' . $row[1] . '</td>
              <td align="center">
		<input type="image" src="../img/gestor/edit.png" class="edit" value="' . $row[0] . '"/>
		<input type="image" src="../img/gestor/delet.png" class="delet" value="' . $row[0] . '"/>
              </td>
           </tr>';
    }echo'
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <div id="no-paging">&nbsp;</div>
                    </td>
                </tr>
            </tfoot>
        </table>        
    </div>';
}

function crear() {
    $consulta = "insert usuarios(nombre,usuario,pass) values('" . mysql_real_escape_string($_POST["Nombre"]) . "','" . mysql_real_escape_string($_POST["Usuario"]) . "','" . mysql_real_escape_string($_POST["pass"]) . "')";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function eliminar() {
    $consulta = "Delete from usuarios where usuario='" . mysql_real_escape_string($_POST["Codigo"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

?>
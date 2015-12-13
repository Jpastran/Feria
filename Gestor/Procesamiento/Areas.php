<?php

require_once("Conexion.php");


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
                if (!empty($_POST["Eoculto"])) {
                    Editar();
                } else {
                    if (!empty($_POST["BuscarGestores"])) {
                        BuscarGestores();
                    } else {
                        
                    }
                }
            }
        }
    }
}

function Editar() {
    $consulta = "update areas set nombre='" . mysql_real_escape_string($_POST["ENombre"]) . "',
				codoferta='" . mysql_real_escape_string($_POST["EOferta"]) . "' 				
				where codigo='" . mysql_real_escape_string($_POST["Eoculto"]) . "'";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function buscar() {
    $consulta = "Select nombre,codoferta from areas where codigo='" . mysql_real_escape_string($_POST["BuscarDocente"]) . "'";
    $datos = mysql_query($consulta);


    if ($row = mysql_fetch_array($datos)) {
        echo $row[0] . "ô" . $row[1];
    }
}

function lista() {
    $consulta = "Select g.codigo,g.nombre,o.nombre,o.departamento,o.categoria from areas g inner join ofertas o on o.codigo=g.codoferta order by g.nombre ";
    $datos = mysql_query($consulta);

    echo'<div class="datagrid" style="border:solid 1px #ccc;margin:auto;width:80%;">
<table style="margin:auto;border:solid 1px #ccc;">
<thead><tr ><th>Departamento</th><th>Categoria</th><th>Oferta</th><th>Area</th><th width="80">Opciones</th></tr></thead><tfoot><tr><td colspan="5"><div id="no-paging">&nbsp;</div></td></tr></tfoot><tbody>';

    $i = 1;
    while ($row = mysql_fetch_array($datos)) {

        if ($i == 1) {
            echo '<tr>';
            $i = 2;
        } else {
            echo '<tr class="alt">';
            $i = 1;
        }

        echo '<td>' . $row[3] . '</td><td>' . $row[4] . '</td><td>' . $row[2] . '</td><td>' . $row[1] . '</td><td align="center">
			<input type="image" src="../img/gestor/edit.png" class="edit" value="' . $row[0] . '"/>
			<input type="image" src="../img/gestor/delet.png" class="delet" value="' . $row[0] . '"/>
			</td></tr>';
    }
    echo"</tbody>
</table></div>";
}

function nuevo() {

    $consulta = "insert areas(nombre,codoferta) values('" . mysql_real_escape_string($_POST["NNombre"]) . "','" . mysql_real_escape_string($_POST["NOferta"]) . "')";
    if ($datos = mysql_query($consulta)) {
        echo "s";
    } else {
        echo "n";
    }
}

function eliminar() {

    $consulta = "Delete from areas where codigo='" . mysql_real_escape_string($_POST["CodDocente"]) . "'";
    if ($datos = mysql_query($consulta)) {

        echo "s";
    } else {
        echo "n";
    }
}

?>
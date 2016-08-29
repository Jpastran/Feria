<?php

require_once ("../../db/conectar.php");

if (!empty($_POST["Crear"])) {
    crear();
} elseif (!empty($_POST["Eliminar"])) {
    eliminar();
} elseif (!empty($_POST["Buscar"])) {
    buscar();
} elseif (!empty($_POST["Editar"])) {
    editar();
} elseif (!empty($_POST["SelectArea"])) {
    selectAreas();
} elseif (!empty($_POST["Lista"])) {
    lista();
} else {
    echo 'No se recibio Informacion';
}


function lista() {
    $sql = "SELECT * FROM ((programas p INNER JOIN areas a ON a.codigo=p.codarea)INNER JOIN ofertas f ON f.codigo=a.codoferta)";
    $query = mysql_query($sql);
    $num_total_registros = mysql_num_rows($query);

    //Limito la busqueda
    $TAMANO_PAGINA = 15;

    //examino la página a mostrar y el inicio del registro a mostrar
    if (!isset($_POST["Pagina"])) {
        $inicio = 0;
        $pagina = 1;
    } else {
        $pagina = $_POST["Pagina"];
        $inicio = ($pagina - 1) * $TAMANO_PAGINA;
    }

    $consulta = "SELECT p.codigo,f.categoria,f.departamento,f.nombre,a.nombre,p.nombre,p.imagen,p.descripcion FROM ((programas  p INNER JOIN areas a ON a.codigo=p.codarea)INNER JOIN ofertas f ON f.codigo=a.codoferta) ORDER BY f.categoria,f.departamento,f.nombre,a.nombre,p.nombre LIMIT " . $inicio . "," . $TAMANO_PAGINA;
    $datos = mysql_query($consulta);

    echo'
    <div class="datagrid table-responsive">
        <table style="margin:auto;">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Departamento</th>
                    <th>Oferta</th>
                    <th>Area</th>
                    <th>Programa</th>
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
        echo '  <td>' . $row[1] . '</td>
                <td>' . $row[2] . '</td>
                <td>' . $row[3] . '</td>
                <td>' . $row[4] . '</td>
                <td>' . $row[5] . '</td>
                <td align="center"><img src="../img/' . $row[6] . '" style="max-width:100px"></td>			
                <td align="center">
                    <input type="image" src="../img/gestor/edit.png" class="edit" value="' . $row[0] . '"/>
                    <input type="image" src="../img/gestor/delet.png" class="delet" value="' . $row[0] . '"/>
                </td>
            </tr>';
    }echo'
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">  
                        <nav aria-label="Page navigation" id="no-paging">
                            <ul class="pagination">';
    
    $url = 'Programas.php';
    //calculo el total de páginas
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    
    if ($total_paginas > 1) {
        if ($pagina != 1) {
            echo '<li><a href="' . $url . '?pag=' . ($pagina - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
        }
        for ($i = 1; $i <= $total_paginas; $i++) {
            if ($pagina == $i) {
                //si muestro el índice de la página actual, no coloco enlace
                echo '<li class="active"><a href="#">' . $pagina . ' <span class="sr-only">(current)</span></a></li>';
            } else {
                //si el índice no corresponde con la página mostrada actualmente,
                //coloco el enlace para ir a esa página
                echo '<li><a href="' . $url . '?pag=' . $i . '">' . $i . '</a></li>';
            }
        }
        if ($pagina != $total_paginas) {
            echo '<li><a href="' . $url . '?pag=' . ($pagina + 1) . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a><li>';
        }
    }
    echo '                  </ul>
                        </nav>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>';
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

function buscar() {
    $consulta = "Select p.nombre,a.codoferta,p.descripcion,a.codigo from programas p INNER JOIN areas a on a.codigo= p.codarea  where p.codigo='" . mysql_real_escape_string($_POST["Codigo"]) . "'";
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
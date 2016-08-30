<?php

//Agregar previamente antes del include los siguientes valores para obtener $num_total_registros
//
//    $sql = "SELECT * FROM (xxxxxxx)"; //Apartir de la consulta.
//    $query = mysql_query($sql);
//    $num_total_registros = mysql_num_rows($query);
//    
//Limito la busqueda, variable global.
$TAMANO_PAGINA = 15;

//Examino la página a mostrar y el inicio del registro a mostrar.
//Determino si exite el post desde ajax sino toma valor inicial.
if (!isset($_POST["Pagina"])) {
    $inicio = 0;
    $pagina = 1;
} else {
    $pagina = $_POST["Pagina"];
    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
}

//Agregar a la consulta siguiente esta sentencia al final.
//
// LIMIT " . $inicio . "," . $TAMANO_PAGINA;
<?php

require_once './conectar.php';

$busqueda = $_POST["buscar"];
//DEBO PREPARAR LOS TEXTOS QUE VOY A BUSCAR si la cadena existe
if ($busqueda <> '') {
    //CUENTA EL NUMERO DE PALABRAS
    $trozos = explode(" ", $busqueda);
    $numero = count($trozos);
    if ($numero == 1) {
        //SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
        $cadbusca = "SELECT o.codigo, o.categoria, o.nombre, o.departamento, p.nombre AS programa, p.codigo AS idprog "
                . " FROM ofertas o INNER JOIN areas a ON a.codoferta = o.codigo INNER JOIN programas p ON a.codigo = p.codarea "
                . " WHERE p.nombre LIKE '%$busqueda%' ORDER BY o.codigo ASC LIMIT 20 ";
    } elseif ($numero > 1) {
        //SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
        //busqueda de frases con mas de una palabra y un algoritmo especializado
        $cadbusca = "SELECT o.codigo, o.categoria, o.nombre, o.departamento, p.nombre AS programa, p.codigo AS idprog, MATCH (p.nombre) AGAINST ('$busqueda'  IN BOOLEAN MODE) AS Score "
                . " FROM ofertas o INNER JOIN areas a ON a.codoferta=o.codigo INNER JOIN programas p ON a.codigo=p.codarea "
                . " WHERE MATCH (p.nombre) AGAINST ('$busqueda'  IN BOOLEAN MODE) ORDER BY Score DESC, o.codigo ASC LIMIT 20";
    }
    $result = mysql_query($cadbusca) or die(mysql_error());

//    $depart = ["Atlantico", "Bolivar", "Cesar", "Cordoba", "Guajira", "Magdalena", "Sucre"];
//
//    foreach ($depart as $name) {
//        echo '<div>
//                <h4>' . $name . ' </h4> ';
//         while ($row = mysql_fetch_object($result)) {
//             if ($row->departamento == $name){
//                 echo "" . $row->programa . " - " . $row->nombre . "<br>";
//             }
//         }
//        echo '</div>';
//    }
    echo '<div class="list-group">';
    while ($row = mysql_fetch_object($result)) {
        echo '<a class="list-group-item group-url" href="';
        if ($row->categoria == "Universidades") {
            echo '../feria/detalleUniv.php?cod=' . $row->codigo . '&busca=' . $row->idprog;
        }
        echo '">' . $row->programa . " - " . $row->nombre . '</a>';
    }
    echo '</div>';
}
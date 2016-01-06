<?php

require_once ("../../db/conectar.php");

if (!empty($_POST["Login"])) {
    logearse();
}

function logearse() {
    $consulta = "SELECT usuario,nombre from usuarios where 
	usuario='" . mysql_real_escape_string($_POST["Enteruser"]) . "' and
	pass='" . mysql_real_escape_string($_POST["Enterpass"]) . "'";
    $datos = mysql_query($consulta);
    if ($row = mysql_fetch_array($datos)) {
        if (@session_start() == false) {
            session_destroy();
            session_start();
        }
        $_SESSION['Name'] = $row[1];
        $_SESSION['UseR'] = $row[0];
        echo "s";
    } else {
        echo "n";
    }
}

?>
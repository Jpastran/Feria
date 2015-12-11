<?php

header('Content-Type: text/html; charset=UTF-8');

if (!empty($_POST["SendNombre"])) {

    $destinatario = "xxxx@xxxxxxxx.com.co";
    $asunto = "Mensaje Enviado Desde La Pagina Web";
    $cuerpo = ' 
	 <html> 
	 <head> 
		<title>Mensaje Enviado Desde La Pagina Web</title> 
	 </head> 
	 <body> 	
	 <div style="font-size:16px;">
	 Informacion enviada desde la pagina web:<br> 
	  <b>Nombre: </b>' . $_POST["SendNombre"] . '<br>
	  <b>Telefono:</b>' . $_POST["SendTelefono"] . '<br>
	  <b>Correo: </b>' . $_POST["SendCorreo"] . '<br>
	  <b>Mensaje:</b> ' . $_POST["SendMensaje"] . '<br><br>	 
	 </div>	
	  </body> 
	 </html> 
	 ';
    //para el envío en formato HTML 
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //dirección del remitente 
    $headers .= "From: FeriaVirtual.com";
    mail($destinatario, $asunto, $cuerpo, $headers);
} else {
    require_once("../db/conectar.php");
    if (!empty($_POST["EnvioNombres"])) {

        $consulta = "INSERT estudiantes(nombre,apellido,documento,tipodoc,telefono,celular,correo,otrocorreo,direccion,barrio,grado,colegio,recursos,medio,apoyo,napoyo,telapoyo,correoapoyo,programa1,programa2,fortaleza1,fortaleza2,icfes,puesto,multi,sisbem,fechainsc)	values(
		'" . mysql_real_escape_string($_POST["EnvioNombres"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioApellidos"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioIdentificacion"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioTipo"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioTel"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioCelular"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioCorreo"]) . "',
		'" . mysql_real_escape_string($_POST["EnviooCorreo"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioDir"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioBarrio"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioGrado"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioColegio"]) . "',
		'" . mysql_real_escape_string($_POST["Enviorecursos"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioMedio"]) . "',
		'" . mysql_real_escape_string($_POST["Envioapoyo"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioNapoyo"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioTapoyo"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioCapoyo"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioPrograma1"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioPrograma2"]) . "',
		'" . mysql_real_escape_string($_POST["Enviofortaleza1"]) . "',
		'" . mysql_real_escape_string($_POST["Enviofortaleza2"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioPuntaje"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioPuesto"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioMulticulturalidad"]) . "',
		'" . mysql_real_escape_string($_POST["EnvioSISBEN"]) . "',curdate())";
        if ($datos = mysql_query($consulta)) {

            if (@session_start() == false) {
                session_destroy();
                session_start();
            }

            $_SESSION['Nombre'] = $_POST["EnvioNombres"];
            $_SESSION['Correo'] = $_POST["EnvioCorreo"];
            echo "s";
        } else {
            echo "n";
        }
    } else {

        if (!empty($_POST["LogeoCorreo"])) {
            $consulta = "SELECT nombre,correo from estudiantes where correo='" . mysql_real_escape_string($_POST["LogeoCorreo"]) . "'";
            $datos = mysql_query($consulta);
            if ($row = mysql_fetch_array($datos)) {

                if (@session_start() == false) {
                    session_destroy();
                    session_start();
                }

                $_SESSION['Nombre'] = $row[0];
                $_SESSION['Correo'] = $row[1];

                echo
                $_SESSION['Nombre'];
            } else {
                echo "n";
            }
        } else {

            if (!empty($_POST["Load"])) {

                $consulta = "Select nombre,apellido,documento,tipodoc,telefono,celular,correo,otrocorreo,direccion,barrio,grado,colegio,recursos,medio,apoyo,napoyo,telapoyo,correoapoyo,programa1,programa2,fortaleza1,fortaleza2,icfes,puesto,multi,sisbem from estudiantes where correo='" . mysql_real_escape_string($_POST["Load"]) . "'";
                $datos = mysql_query($consulta);
                if ($row = mysql_fetch_array($datos)) {

                    echo $row[0] . "ô" . $row[1] . "ô" . $row[2] . "ô" . $row[3] . "ô" . $row[4] . "ô" . $row[5] . "ô" . $row[6] . "ô" . $row[7] . "ô" . $row[8] . "ô" . $row[9] . "ô" . $row[10] . "ô" . $row[11] . "ô" . $row[12] . "ô"
                    . $row[13] . "ô" . $row[14] . "ô" . $row[15] . "ô" . $row[16] . "ô" . $row[17] . "ô" . $row[18] . "ô" . $row[19] . "ô" . $row[20] . "ô" . $row[21] . "ô" . $row[22] . "ô" . $row[23] . "ô" . $row[24] . "ô" . $row[25];
                }
            } else {
                if (!empty($_POST["Keysave"])) {

                    $consulta = "INSERT interes(categoria,codprograma,fecha,codestudiante) VALUES(
							'" . mysql_real_escape_string($_POST["Tipo"]) . "',
							'" . mysql_real_escape_string($_POST["Programa"]) . "',
							curdate(),
							'" . mysql_real_escape_string($_POST["MyCorreo"]) . "');";
                    if ($datos = mysql_query($consulta)) {
                        echo "s";
                    } else {
                        echo "n";
                    }
                } else {
                    
                }
            }
        }
    }
}
?>
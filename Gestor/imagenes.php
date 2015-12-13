<?php
session_start();
if (empty($_SESSION['UseR'])) {
    echo"<script>document.location=('index.php');</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Feria Virtual De Educación</title>

        <link href="../css/estilos-gestor.css" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
            <script>
                $(document).ready(function() {


                    $("#Guardar").click(Nuevo);
                    $(".delet").click(Eliminar);




                    function Nuevo() {
                        if ($("#Imagen").val() != "") {

                            $("#respu").html("<img src='../img/gestor/load.gif' style='margin-right:7px;margin-bottom:-10px'><span style='font-size:16px'>Cargando, Espere Por Favor...<span>");
                            var archivos = document.getElementById("Imagen");//Damos el valor del input tipo file
                            var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo	do de arreglo		

                            var parametros = new FormData();

                            parametros.append('Imagen', archivo[0]);
                            parametros.append('Guardar', "Key");
                            $.ajax({
                                url: 'control/Imagenes.php', //Url a donde la enviaremos
                                type: 'POST', contentType: false, data: parametros, processData: false, cache: false
                            }).done(function(resp) {
                                if (resp == "s") {

                                    $("#respu").html("<center><blink>Actualizando...</blink></center>");
                                    alert("Guardado Con Exito");
                                    document.location = "Imagenes.php";
                                } else {
                                    $("#respu").html("");
                                    alert("no Se Pudo Guardar, Verifique Su Conexion");
                                }
                            }
                            );


                        } else {
                            alert("Complete Todos Los Campos");
                        }
                    }


                    function Eliminar() {
                        if (confirm("¿Esta Seguro Que Desea Eliminar Este Registro?")) {

                            var parametros = {
                                "Eliminar": $(this).val()
                            };
                            $.ajax({
                                data: parametros,
                                url: "control/Imagenes.php",
                                type: "POST",
                                success: function(resp) {

                                    if (resp == "s") {
                                        alert("Eliminado Con Exito");
                                        document.location = "Imagenes.php"

                                    } else {

                                        alert("no Se Pudo Eliminar, Verifique Su Conexion");
                                    }
                                },
                                error: function(resp) {
                                    alert("Error Al Conectarse Al Servidor");
                                }
                            });
                        }
                    }



                });

            </script>

    </head>


    <body>
        <div id="Principal">

            <div style="text-align:right;font-size:14px;padding:3px;background-color:#fff;color:#333;">

                <?php
                if (!empty($_SESSION['UseR'])) {
                    echo "Identificado Como: " . $_SESSION['Name'] . " <a href='index.php' style='margin-left:7px;margin-right:10px; color: #09C;font-size:16px;font-weight:bold'>Cerrar Sesion</a>
</div>";
                    include("mods/nav.html");
                }
                ?>
                <div style="margin:auto;font-size:14px;width:100%;padding-top:30px">

                    <input type="hidden" id="Codigo" value="">

                        <table cellpadding="7" style="margin:auto">
                            <tr>
                                <td align="right">Imagen</td>
                                <td>    <input id="Imagen" type="file" name="Imagen[]" multiple="multiple"/></td>
                            </tr>
                            <tr>
                                <td  align="left"></td>
                                <td align="left">
                                    <input type="button" name="Guardar" id="Guardar" class="button" value="Guardar" />
                                    <span id="respu" style="font-size:12px;margin-left:5px;"></span></td>
                            </tr>
                        </table>




                        <div style="margin:auto;font-size:14px;width:100%;padding-top:30px">


                            <?php
                            require_once("../db/conectar.php");

                            $consulta = "SELECT nombre FROM banners ";
                            $datos = mysql_query($consulta);

                            echo'<div class="datagrid" style="border:solid 1px #ccc;margin:auto;width:80%;"><table style="margin:auto;"><thead><tr><th>Imagen</th><th width="80">Opciones</th></tr></thead><tfoot><tr><td colspan="2"><div id="no-paging">&nbsp;</div></td></tr></tfoot><tbody>';
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
			</td></tr>';
                            }
                            echo"</tbody></table></div>";
                            ?>
                        </div>











                        <br /><br />












                </div>
            </div>

            <?php
            $variable = file_get_contents("mods/pie.html");
            echo $variable;
            ?>



    </body>
</html>
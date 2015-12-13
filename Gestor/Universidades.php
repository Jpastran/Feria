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
        <title>Feria Virtual De EducaciónFeria Virtual De Educación</title>

        <link href="../css/estilos-gestor.css" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
            <script>
                $(document).ready(function() {


                    $("#Editar").hide();
                    $("#Cancelar").hide();

                    $("#Editar").click(Editar);
                    $("#Cancelar").click(Cancelar);
                    $("#Guardar").click(Nuevo);

                    $(".delet").click(Eliminar);
                    $(".edit").click(Carga);

                    function Cancelar() {

                        document.location = "Universidades.php";

                    }


                    function Editar() {
                        if ($("#Nombre").val() != "" && $("#Departamento").val() != "" && $("#Categoria").val() != "") {


                            var parametros = {
                                "Nombre": $("#Nombre").val(),
                                "Departamento": $("#Departamento").val(),
                                "Categoria": $("#Categoria").val(),
                                "Codigo": $("#Codigo").val(),
                                "Editar": "324324",
                            };
                            $.ajax({
                                data: parametros,
                                url: "Procesamiento/Universidades.php",
                                type: "POST",
                                success: function(resp) {

                                    if (resp == "s") {
                                        alert("Actualizado Con Exito");
                                        document.location = "Universidades.php"

                                    } else {

                                        alert("no Se Pudo Actualizar, Verifique Su Conexion");
                                    }
                                },
                                error: function(resp) {
                                    alert("Error Al Conectarse Al Servidor");
                                }
                            });
                        } else {
                            alert("Complete Todos Los Campos");
                        }
                    }




                    function Nuevo() {
                        if ($("#Nombre").val() != "" && $("#Departamento").val() != "" && $("#Categoria").val() != "" && $("#Logo").val() != "" && $("#Banner").val() != "") {

                            $("#respu").html("<img src='../img/gestor/load.gif' style='margin-right:7px;margin-bottom:-10px'><span style='font-size:16px'>Cargando, Espere Por Favor...<span>");
                            var archivos = document.getElementById("Banner");//Damos el valor del input tipo file
                            var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo		
                            var archivos1 = document.getElementById("Logo");//Damos el valor del input tipo file
                            var archivo1 = archivos1.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo		

                            var parametros = new FormData();

                            parametros.append('Nombre', $("#Nombre").val());
                            parametros.append('Departamento', $("#Departamento").val());
                            parametros.append('Categoria', $("#Categoria").val());
                            parametros.append('archivo', archivo[0]);
                            parametros.append('archivo1', archivo1[0]);
                            parametros.append('Guardar', "Key");
                            $.ajax({
                                url: 'Procesamiento/Universidades.php', //Url a donde la enviaremos
                                type: 'POST', contentType: false, data: parametros, processData: false, cache: false
                            }).done(function(resp) {
                                if (resp == "s") {

                                    $("#respu").html("<center><blink>Actualizando...</blink></center>");
                                    alert("Guardado Con Exito");
                                    document.location = "Universidades.php";
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
                                url: "Procesamiento/Universidades.php",
                                type: "POST",
                                success: function(resp) {

                                    if (resp == "s") {
                                        alert("Eliminado Con Exito");
                                        document.location = "Universidades.php"

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

                    function Carga() {

                        $("#Codigo").val($(this).val());
                        var parametros = {
                            "Carga": $(this).val()
                        };
                        $.ajax({
                            data: parametros,
                            url: "Procesamiento/Universidades.php",
                            type: "POST",
                            success: function(resp) {

                                $("#Editar").show();
                                $("#Cancelar").show();
                                $("#Guardar").hide();

                                var datos = resp.split("ô");
                                $("#Nombre").val(datos[0]);
                                $("#Departamento").val(datos[1]);
                                $("#Categoria").val(datos[2]);
                                $("#Contenido").html("");
                                $("#Logo").prop('disabled', true);
                                ;
                                $("#Banner").prop('disabled', true);
                                ;

                            },
                            error: function(resp) {
                                alert("Error Al Conectarse Al Servidor");
                            }
                        });

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
                    include("Partes/Opciones.html");
                }
                ?>
                <div style="margin:auto;font-size:14px;width:100%;padding-top:30px">

                    <input type="hidden" id="Codigo" value="">

                        <table cellpadding="7" style="margin:auto">
                            <tr>
                                <td align="right">Nombre</td>
                                <td colspan="3">
                                    <input name="Nombre" type="text" class="box" id="Nombre" onkeydown="testForEnter();" value="" style="width:300px;"/>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Logo</td>
                                <td>    <input id="Logo" type="file" name="Logo[]" multiple="multiple"/></td>
                                <td align="right">Banner</td>
                                <td><input id="Banner" type="file" name="Banner[]" multiple="multiple"/></td>
                            </tr>
                            <tr>
                                <td align="right">Departamento</td>
                                <td>

                                    <select name='Departamento' id='Departamento' style='width:200px;font-size:14px' >
                                        <option value='' selected='selected'>Selecccionar...</option>
                                        <option value='Atlantico'>Atlantico</option>
                                        <option value='Bolivar'>Bolivar</option>
                                        <option value='Cesar'>Cesar</option>
                                        <option value='Cordoba'>Cordoba</option>
                                        <option value='Guajira'>Guajira</option>
                                        <option value='Magdalena'>Magdalena</option>
                                        <option value='Sucre'>Sucre</option>
                                    </select>






                                </td>
                                <td align="right">Categoria</td>
                                <td>
                                    <select name='Categoria' id='Categoria' style='width:200px;font-size:14px' >
                                        <option value='' selected='selected'>Selecccionar...</option>
                                        <option value='Universidades'>Universidades</option>
                                        <option value='Instituciones'>Instituciones Para El Trabajo</option>
                                        <option value='Idiomas'>Centro De Idiomas</option>
                                    </select>
                            </tr>
                            <tr>
                                <td  align="left"></td>
                                <td colspan="3" align="left">
                                    <input type="button" name="Guardar" id="Guardar" class="button" value="Guardar" />
                                    <input type="button" name="Editar" id="Editar" class="button" value="Editar" />
                                    <input type="button" name="Cancelar" id="Cancelar" class="button" value="Cancelar" />
                                    <span id="respu" style="font-size:12px;margin-left:5px;"></span></td>
                            </tr>
                        </table>




                        <div style="margin:auto;font-size:14px;width:100%;padding-top:30px" id="Contenido">


                            <?php
                            require_once("Procesamiento/Conexion.php");

                            $consulta = "SELECT codigo,nombre,categoria,departamento,imagen FROM ofertas ORDER BY nombre";
                            $datos = mysql_query($consulta);

                            echo'<div class="datagrid" style="border:solid 1px #ccc;margin:auto;width:80%;"><table style="margin:auto;"><thead><tr><th>Nombre</th><th>Categoria</th><th>Departamento</th><th>Logo</th><th width="80">Opciones</th></tr></thead><tfoot><tr><td colspan="5"><div id="no-paging">&nbsp;</div></td></tr></tfoot><tbody>';
                            $i = 1;

                            while ($row = mysql_fetch_array($datos)) {

                                if ($i == 1) {
                                    echo '<tr>';
                                    $i = 2;
                                } else {
                                    echo '<tr class="alt">';
                                    $i = 1;
                                }

                                echo '<td>' . $row[1] . '</td>
			<td  >' . $row[2] . '</td>
			<td >' . $row[3] . '</td>
			<td align="center"><img src="../img/' . $row[4] . '" style="max-width:150px"></td>			
			<td align="center">
			<input type="image" src="../img/gestor/edit.png" class="edit" value="' . $row[0] . '"/>
		<input type="image" src="../img/gestor/delet.png" class="delet" value="' . $row[0] . '"/>
			</td></tr>';
                            }
                            echo"</tbody>
</table></div>";
                            ?>
                        </div>






















                </div>
            </div>

            <?php
            $variable = file_get_contents("Partes/Pie.html");
            echo $variable;
            ?>



    </body>
</html>
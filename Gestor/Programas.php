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

        <link href="Estilos.css" rel="stylesheet" type="text/css">
            <script type="text/javascript" src="Ext/jquery-1.8.3.js"></script>
            <script>
                $(document).ready(function() {
                    $("#Editar").hide();
                    $("#Cancelar").hide();
                    $("#Editar").click(Editar);
                    $("#Cancelar").click(Cancelar);
                    $("#Guardar").click(Nuevo);
                    $("#Oferta").change(cambioOferta);
                    $(".delet").click(Eliminar);
                    $(".edit").click(Carga);
                    function Cancelar() {
                        document.location = "Programas.php";
                    }
                    function cambioOferta() {

                        if ($("#Oferta").val() != "") {
                            $("#DivAreas").html(" <select name='Areas' id='Areas' style='width:300px;font-size:14px;padding:3px' ><option value='-1' selected='selected'>Cargado, Espere...</option></select>");
                            var parametros = {
                                "cargaAreas": $(this).val()
                            };
                            $.ajax({
                                data: parametros,
                                url: "Procesamiento/Programas.php",
                                type: "POST",
                                success: function(resp) {
                                    $("#DivAreas").html(resp);
                                },
                                error: function(resp) {
                                    alert("Error Al Conectarse Al Servidor");
                                }
                            });
                        } else {
                            $("#DivAreas").html(" <select name='Areas' id='Areas' style='width:300px;font-size:14px;padding:3px' ><option value='-1' selected='selected'>Seleccionar...</option></select>");
                        }
                    }
                    function Editar() {
                        if ($("#Nombre").val() != "" && $("#Oferta").val() != "" && $("#Areas").val() != "" && $("#Descripcion").val() != "") {
                            var parametros = {
                                "Nombre": $("#Nombre").val(),
                                "Oferta": $("#Oferta").val(),
                                "Areas": $("#Areas").val(),
                                "Descripcion": $("#Descripcion").val(),
                                "Codigo": $("#Codigo").val(),
                                "Editar": "324324",
                            };
                            $.ajax({
                                data: parametros,
                                url: "Procesamiento/Programas.php",
                                type: "POST",
                                success: function(resp) {

                                    if (resp == "s") {
                                        alert("Actualizado Con Exito");
                                        document.location = "Programas.php"

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
                        if ($("#Oferta").val() != "" && $("#Areas").val() != "" && $("#Nombre").val() != "" && $("#Imagen").val() != "" && $("#Descripcion").val() != "") {

                            $("#respu").html("<img src='Imagenes/load.gif' style='margin-right:7px;margin-bottom:-10px'><span style='font-size:16px'>Cargando, Espere Por Favor...<span>");
                            var archivos = document.getElementById("Imagen");//Damos el valor del input tipo file
                            var archivo = archivos.files; //Obtenemos el valor del input (los arcchivos) en modo de arreglo	do de arreglo		

                            var parametros = new FormData();

                            parametros.append('Areas', $("#Areas").val());
                            parametros.append('Nombre', $("#Nombre").val());
                            parametros.append('Descripcion', $("#Descripcion").val());
                            parametros.append('Imagen', archivo[0]);
                            parametros.append('Guardar', "Key");
                            $.ajax({
                                url: 'Procesamiento/Programas.php', //Url a donde la enviaremos
                                type: 'POST', contentType: false, data: parametros, processData: false, cache: false
                            }).done(function(resp) {
                                if (resp == "s") {

                                    $("#respu").html("<center><blink>Actualizando...</blink></center>");
                                    alert("Guardado Con Exito");
                                    document.location = "Programas.php";
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
                                url: "Procesamiento/Programas.php",
                                type: "POST",
                                success: function(resp) {

                                    if (resp == "s") {
                                        alert("Eliminado Con Exito");
                                        document.location = "Programas.php"

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
                            url: "Procesamiento/Programas.php",
                            type: "POST",
                            success: function(resp) {

                                $("#Editar").show();
                                $("#Cancelar").show();
                                $("#Guardar").hide();

                                var datos = resp.split("ô");
                                $("#Nombre").val(datos[0]);
                                $("#Oferta").val(datos[1]);
                                $("#Descripcion").val(datos[2]);
                                $("#Contenido").html("");
                                $("#Imagen").prop('disabled', true);


                                var parametros = {
                                    "cargaAreas": datos[1]
                                };
                                $.ajax({
                                    data: parametros,
                                    url: "Procesamiento/Programas.php",
                                    type: "POST",
                                    success: function(resp) {

                                        $("#DivAreas").html(resp);
                                        $("#Areas").val(datos[3]);

                                    },
                                    error: function(resp) {
                                        alert("Error Al Conectarse Al Servidor");
                                    }
                                });




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
                                <td align="right"  style="text-align:right !important;padding:8px;">Oferta</td>
                                <td align="left" style="padding:8px;">

                                    <?php
                                    require_once("Procesamiento/Conexion.php");
                                    $consulta = 'SELECT codigo,departamento,categoria,nombre FROM ofertas ORDER BY departamento,categoria,nombre';
                                    $datos = mysql_query($consulta);
                                    echo"<select name='Oferta' id='Oferta' style='width:300px;font-size:14px;padding:3px' >
					<option value='' selected='selected'>Seleccionar...</option>";

                                    while ($row = mysql_fetch_array($datos)) {
                                        echo"<option value='" . $row[0] . "'>" . $row[1] . " / " . $row[2] . " / " . $row[3] . "</option>";
                                    }
                                    echo"</select>";
                                    ?>

                                </td>
                            </tr>

                            <tr>
                                <td align="right"  style="text-align:right !important;padding:8px;">Areas</td>
                                <td align="left" style="padding:8px;">
                                    <div id="DivAreas">

                                        <select name='Areas' id='Areas' style='width:300px;font-size:14px;padding:3px' >
                                            <option value='-1' selected='selected'>Selecccionar...</option>    
                                        </select>

                                    </div>
                                </td>
                            </tr> 

                            <tr>
                                <td align="right">Nombre</td>
                                <td>
                                    <input name="Nombre" type="text" class="box" id="Nombre" onkeydown="testForEnter();" value="" style="width:300px;"/>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Imagen</td>
                                <td>    <input id="Imagen" type="file" name="Imagen[]" multiple="multiple"/></td>
                            </tr> <tr>
                                <td align="right">Descripcion</td>
                                <td>
                                    <input name="Descripcion" type="text" class="box" id="Descripcion" onkeydown="testForEnter();" value="" style="width:300px;"/>
                                </td>
                            </tr>
                            <tr>
                                <td  align="left"></td>
                                <td align="left">
                                    <input type="button" name="Guardar" id="Guardar" class="button" value="Guardar" />
                                    <input type="button" name="Editar" id="Editar" class="button" value="Editar" />
                                    <input type="button" name="Cancelar" id="Cancelar" class="button" value="Cancelar" />
                                    <span id="respu" style="font-size:12px;margin-left:5px;"></span></td>
                            </tr>
                        </table>




                        <div style="margin:auto;font-size:14px;width:100%;padding-top:30px" id="Contenido">


                            <?php
                            $consulta = "SELECT p.codigo,f.categoria,f.departamento,f.nombre,a.nombre,p.nombre,p.imagen,p.descripcion FROM ((programas  p INNER JOIN areas a ON a.codigo=p.codarea)INNER JOIN ofertas f ON f.codigo=a.codoferta) ORDER BY f.categoria,f.departamento,f.nombre,a.nombre,p.nombre";
                            $datos = mysql_query($consulta);

                            echo'<div class="datagrid" style="border:solid 1px #ccc;margin:auto;width:80%;"><table style="margin:auto;"><thead><tr><th>Categoria</th><th>Departamento</th><th>Oferta</th><th>Area</th><th>Programa</th><th>Imagen</th><th width="80">Opciones</th></tr></thead><tfoot><tr><td colspan="7"><div id="no-paging">&nbsp;</div></td></tr></tfoot><tbody>';
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
			<td >' . $row[4] . '</td>
			<td >' . $row[5] . '</td>
			<td align="center"><img src="../img/' . $row[6] . '" style="max-width:200px"></td>			
			<td align="center">
			<input type="image" src="Imagenes/edit.png" class="edit" value="' . $row[0] . '"/>
		<input type="image" src="Imagenes/delet.png" class="delet" value="' . $row[0] . '"/>
			</td></tr>';
                            }
                            echo"</tbody></table></div>";
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
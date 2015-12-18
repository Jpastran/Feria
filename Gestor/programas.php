<?php
session_start();
if (empty($_SESSION['UseR'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>
    </head>
    <body>
        <?php include_once './mods/nav.html'; ?>
        <div id="Principal">
            <input type="hidden" id="Codigo" value=""/>
            <table cellpadding="7" style="margin:auto">
                <tr>
                    <td align="right"  style="text-align:right !important;padding:8px;">Oferta</td>
                    <td align="left" style="padding:8px;">
                        <select name='Oferta' id='Oferta'>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right"  style="text-align:right !important;padding:8px;">Areas</td>
                    <td align="left" style="padding:8px;">
                        <select name='Areas' id='Areas'>
                            <option value='-1' selected='selected'>Selecccionar...</option>
                        </select>
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
                        <input type="button" name="Guardar" id="btnNuevo" class="button" value="Guardar" />
                        <input type="button" name="Editar" id="btnEditar" class="button" value="Editar" />
                        <input type="button" name="Cancelar" id="btnCancelar" class="button" value="Cancelar" />
                        <span id="respu" ></span></td>
                </tr>
            </table>
            <div id="contenido">
                Cargando, Espere Por Favor...
            </div>
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>
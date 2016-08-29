<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once './mods/head.html'; ?>
    </head>
    <body>
        <?php include_once './mods/nav.html'; ?>          
        <div class="contenido">
            <div class="row">
                <form class="form-inline" id="formOferta">
                    <h2 class="text-center"><label for="buscar">Escriba el nombre de la carrera buscada.</label></h2>
                    <div class="form-group input-group input-group-lg col-sm-11 col-sm-offset-1">
                        <input type="text" class="form-control" id="buscar" placeholder=""></input>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
                        </span>
                    </div>
                </form>
                <div id="resultado"></div>
            </div>
            <div class="">
                <h2 class="text-center"><b>Seleccine el departamento en que desea estudiar.</b></h2>
                <div class="table-responsive " >
                    <table width="584" class="center-block">
                        <!-- fwtable fwsrc="Ubicacion.png" fwpage="Página 1" fwbase="Ubicacion.png" fwstyle="Dreamweaver" fwdocid = "107092166" fwnested="0" -->
                        <tr>
                            <td><img src="img/map/spacer.gif" width="59" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="34" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="50" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="8" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="26" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="8" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="26" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="31" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="3" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="31" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="43" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="34" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="36" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="34" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="161" height="1" border="0" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="1" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td colspan="15"><img name="Ubicacion_r1_c1" src="img/map/Ubicacion_r1_c1.png" width="584" height="125" border="0" id="Ubicacion_r1_c1" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="125" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="2" colspan="13"><img name="Ubicacion_r2_c1" src="img/map/Ubicacion_r2_c1.png" width="389" height="55" border="0" id="Ubicacion_r2_c1" alt="" /></td>
                            <td><a href="opciones.php?cod=Guajira" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r2_c14',
                                            '', 'img/map/Ubicacion_r2_c14_f2.png', 1);"><img name="Ubicacion_r2_c14" src="img/map/Ubicacion_r2_c14.png" width="34" height="34" border="0" id="Ubicacion_r2_c14" alt="" /></a></td>
                            <td rowspan="14"><img name="Ubicacion_r2_c15" src="img/map/Ubicacion_r2_c15.png" width="161" height="445" border="0" id="Ubicacion_r2_c15" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="34" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="13"><img name="Ubicacion_r3_c14" src="img/map/Ubicacion_r3_c14.png" width="34" height="411" border="0" id="Ubicacion_r3_c14" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="21" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="9" colspan="3"><img name="Ubicacion_r4_c1" src="img/map/Ubicacion_r4_c1.png" width="143" height="269" border="0" id="Ubicacion_r4_c1" alt="" /></td>
                            <td colspan="2"><a href="opciones.php?cod=Atlantico" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r4_c4',
                                            '', 'img/map/Ubicacion_r4_c4_f2.png', 1);"><img name="Ubicacion_r4_c4" src="img/map/Ubicacion_r4_c4.png" width="34" height="34" border="0" id="Ubicacion_r4_c4" alt="" /></a></td>
                            <td rowspan="2" colspan="8"><img name="Ubicacion_r4_c6" src="img/map/Ubicacion_r4_c6.png" width="212" height="38" border="0" id="Ubicacion_r4_c6" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="34" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="5" colspan="2"><img name="Ubicacion_r5_c4" src="img/map/Ubicacion_r5_c4.png" width="34" height="154" border="0" id="Ubicacion_r5_c4" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="4" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="4" colspan="2"><img name="Ubicacion_r6_c6" src="img/map/Ubicacion_r6_c6.png" width="34" height="150" border="0" id="Ubicacion_r6_c6" alt="" /></td>
                            <td colspan="2"><a href="opciones.php?cod=Magdalena" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r6_c8',
                                            '', 'img/map/Ubicacion_r6_c8_f2.png', 1);"><img name="Ubicacion_r6_c8" src="img/map/Ubicacion_r6_c8.png" width="34" height="34" border="0" id="Ubicacion_r6_c8" alt="" /></a></td>
                            <td rowspan="2" colspan="4"><img name="Ubicacion_r6_c10" src="img/map/Ubicacion_r6_c10.png" width="144" height="55" border="0" id="Ubicacion_r6_c10" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="34" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="5" colspan="2"><img name="Ubicacion_r7_c8" src="img/map/Ubicacion_r7_c8.png" width="34" height="170" border="0" id="Ubicacion_r7_c8" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="21" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="4" colspan="2"><img name="Ubicacion_r8_c10" src="img/map/Ubicacion_r8_c10.png" width="74" height="149" border="0" id="Ubicacion_r8_c10" alt="" /></td>
                            <td><a href="opciones.php?cod=Cesar" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r8_c12',
                                            '', 'img/map/Ubicacion_r8_c12_f2.png', 1);"><img name="Ubicacion_r8_c12" src="img/map/Ubicacion_r8_c12.png" width="34" height="34" border="0" id="Ubicacion_r8_c12" alt="" /></a></td>
                            <td rowspan="8"><img name="Ubicacion_r8_c13" src="img/map/Ubicacion_r8_c13.png" width="36" height="297" border="0" id="Ubicacion_r8_c13" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="34" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="7"><img name="Ubicacion_r9_c12" src="img/map/Ubicacion_r9_c12.png" width="34" height="263" border="0" id="Ubicacion_r9_c12" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="61" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="6"><img name="Ubicacion_r10_c4" src="img/map/Ubicacion_r10_c4.png" width="8" height="202" border="0" id="Ubicacion_r10_c4" alt="" /></td>
                            <td colspan="2"><a href="opciones.php?cod=Sucre" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r10_c5',
                                            '', 'img/map/Ubicacion_r10_c5_f2.png', 1);"><img name="Ubicacion_r10_c5" src="img/map/Ubicacion_r10_c5.png" width="34" height="34" border="0" id="Ubicacion_r10_c5" alt="" /></a></td>
                            <td rowspan="6"><img name="Ubicacion_r10_c7" src="img/map/Ubicacion_r10_c7.png" width="26" height="202" border="0" id="Ubicacion_r10_c7" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="34" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="5" colspan="2"><img name="Ubicacion_r11_c5" src="img/map/Ubicacion_r11_c5.png" width="34" height="168" border="0" id="Ubicacion_r11_c5" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="20" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="4"><img name="Ubicacion_r12_c8" src="img/map/Ubicacion_r12_c8.png" width="31" height="148" border="0" id="Ubicacion_r12_c8" alt="" /></td>
                            <td rowspan="2" colspan="2"><a href="opciones.php?cod=Bolivar" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r12_c9',
                                            '', 'img/map/Ubicacion_r12_c9_f2.png', 1);"><img name="Ubicacion_r12_c9" src="img/map/Ubicacion_r12_c9.png" width="34" height="34" border="0" id="Ubicacion_r12_c9" alt="" /></a></td>
                            <td rowspan="4"><img name="Ubicacion_r12_c11" src="img/map/Ubicacion_r12_c11.png" width="43" height="148" border="0" id="Ubicacion_r12_c11" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="27" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="3"><img name="Ubicacion_r13_c1" src="img/map/Ubicacion_r13_c1.png" width="59" height="121" border="0" id="Ubicacion_r13_c1" alt="" /></td>
                            <td rowspan="2"><a href="opciones.php?cod=Cordoba" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r13_c2',
                                            '', 'img/map/Ubicacion_r13_c2_f2.png', 1);"><img name="Ubicacion_r13_c2" src="img/map/Ubicacion_r13_c2.png" width="34" height="34" border="0" id="Ubicacion_r13_c2" alt="" /></a></td>
                            <td rowspan="3"><img name="Ubicacion_r13_c3" src="img/map/Ubicacion_r13_c3.png" width="50" height="121" border="0" id="Ubicacion_r13_c3" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="7" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td rowspan="2" colspan="2"><img name="Ubicacion_r14_c9" src="img/map/Ubicacion_r14_c9.png" width="34" height="114" border="0" id="Ubicacion_r14_c9" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="27" border="0" alt="" /></td>
                        </tr>
                        <tr>
                            <td><img name="Ubicacion_r15_c2" src="img/map/Ubicacion_r15_c2.png" width="34" height="87" border="0" id="Ubicacion_r15_c2" alt="" /></td>
                            <td><img src="img/map/spacer.gif" width="1" height="87" border="0" alt="" /></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php include_once './mods/pie.html'; ?>
    </body>
</html>

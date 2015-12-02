<?php 
session_start();  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feria Virtual De Educación</title>
<link href="Estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="bannerRotator.js"></script>
<script type="text/javascript" src="Ext/jquery-1.8.3.js"></script>
<script type="text/javascript" src="Ext/jscroller.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
 $(document).ready(function(){  
 	bannerRotator('#bannerRotator', 500, 3500, true);

 });

</script>
<style type="text/css">
td img {}
</style>
</head>

<body style="margin:0px;"  onload="MM_preloadImages('Imagenes/img/Ubicacion_r2_c14_f2.png','Imagenes/img/Ubicacion_r4_c4_f2.png','Imagenes/img/Ubicacion_r6_c8_f2.png','Imagenes/img/Ubicacion_r8_c12_f2.png','Imagenes/img/Ubicacion_r10_c5_f2.png','Imagenes/img/Ubicacion_r12_c9_f2.png','Imagenes/img/Ubicacion_r13_c2_f2.png');">


<?php

if(empty($_SESSION['Nombre'])){
	
	echo'

<div style="top:0%;background-image:url(Imagenes/Foot.jpg) ;width:100%;overflow:auto;border-top:solid 4px #FE9900;border-bottom:solid 4px #FE9900;">

<div style="max-width:1100px;height:51px;margin:auto;width:100%">

  <a href="Index.php" style="text-decoration:none;color:#FFF"> 
  <img src="Imagenes/Logo.png" style="margin-top:12px;margin-left:15px"/>
  </a>
    
    
  <table style="float:right;margin-top:6px;height:113px;">
    <tr>   
      
      <td valign="middle" class="MenuSuperior">   
     <a href="Registro.php" style="text-decoration:none;color:#FFF" >
     
         <img src="Imagenes/LogRegistro.png"  /><br />
      REGISTRARME      </a>
      </td>
      <td valign="middle" class="MenuSuperior">   
        <a href="Nosotros.php" style="text-decoration:none;color:#FFF">  
         <img src="Imagenes/LogNosotros.png"  /><br />   
      QUIENES SOMOS  </a>    
      </td>
      <td valign="middle" class="MenuSuperior">   
        <a href="Oferta.php" style="text-decoration:none;color:#FFF">    
       <img src="Imagenes/LogUniversidades.png"  /><br />   
       OFERTA ACADEMICA</a>
       </td>
       
      <td valign="middle" class="MenuSuperior">    
        <a href="Contacto.php" style="text-decoration:none;color:#FFF">   
       <img src="Imagenes/LogContacto.png"  /><br />   
       CONTACTENOS</a>
       </td>
      <td valign="middle" class="MenuSuperior">    
        <a href="Login.php" style="text-decoration:none;color:#FFF">   
       <img src="Imagenes/LogLogin.png"  /><br />   
       INICIAR SESION</a>
       </td>
      
      </tr>
  </table>
  

</div>
</div>
</div>
';
}else{
	echo'

<div style="top:0%;background-image:url(Imagenes/Foot.jpg) ;width:100%;overflow:auto;border-top:solid 4px #FE9900;border-bottom:solid 4px #FE9900;">

<div style="max-width:1100px;height:51px;margin:auto;width:100%">

  <a href="Index.php" style="text-decoration:none;color:#FFF"> 
  <img src="Imagenes/Logo.png" style="margin-top:12px;margin-left:15px"/>
  </a>
    
    
  <table style="float:right;margin-top:6px;height:113px;">
    <tr>   
  
      <td valign="middle" class="MenuSuperior">   
        <a href="Nosotros.php" style="text-decoration:none;color:#FFF">  
         <img src="Imagenes/LogNosotros.png"  /><br />   
      QUIENES SOMOS  </a>    
      </td>
      <td valign="middle" class="MenuSuperior">   
        <a href="Oferta.php" style="text-decoration:none;color:#FFF">    
       <img src="Imagenes/LogUniversidades.png"  /><br />   
       OFERTA ACADEMICA</a>
       </td>
       
      <td valign="middle" class="MenuSuperior">    
        <a href="Contacto.php" style="text-decoration:none;color:#FFF">  
       <img src="Imagenes/LogContacto.png"  /><br />   
       CONTACTENOS</a>
       </td>
      <td valign="middle" class="MenuSuperior">    
        <a href="Datos.php" style="text-decoration:none;color:#FFF">   
       <img src="Imagenes/user.png"  /><br />   
       '.$_SESSION['Nombre'].'</a>
       </td>
      
      </tr>
  </table>
  

</div>
</div>
</div>
';
	}

?>


 
<script language="JavaScript1.2" type="text/javascript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

//-->
</script>



<div style="max-width:1100px;margin:auto;width:100%;font-family:Futura;margin-top:30px">


<center>
<h1 style="text-align:center;color:#900;">¿En Que Departamento Desea Estudiar? </h1	>


<table border="0" cellpadding="0" cellspacing="0" width="584">
<!-- fwtable fwsrc="Ubicacion.png" fwpage="Página 1" fwbase="Ubicacion.png" fwstyle="Dreamweaver" fwdocid = "107092166" fwnested="0" -->
  <tr>
   <td><img src="Imagenes/img/spacer.gif" width="59" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="34" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="50" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="8" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="26" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="8" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="26" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="31" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="3" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="31" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="43" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="34" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="36" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="34" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="161" height="1" border="0" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td colspan="15"><img name="Ubicacion_r1_c1" src="Imagenes/img/Ubicacion_r1_c1.png" width="584" height="125" border="0" id="Ubicacion_r1_c1" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="125" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="2" colspan="13"><img name="Ubicacion_r2_c1" src="Imagenes/img/Ubicacion_r2_c1.png" width="389" height="55" border="0" id="Ubicacion_r2_c1" alt="" /></td>
   <td><a href="Opciones.php?cod=Guajira" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r2_c14','','Imagenes/img/Ubicacion_r2_c14_f2.png',1);"><img name="Ubicacion_r2_c14" src="Imagenes/img/Ubicacion_r2_c14.png" width="34" height="34" border="0" id="Ubicacion_r2_c14" alt="" /></a></td>
   <td rowspan="14"><img name="Ubicacion_r2_c15" src="Imagenes/img/Ubicacion_r2_c15.png" width="161" height="445" border="0" id="Ubicacion_r2_c15" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="34" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="13"><img name="Ubicacion_r3_c14" src="Imagenes/img/Ubicacion_r3_c14.png" width="34" height="411" border="0" id="Ubicacion_r3_c14" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="21" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="9" colspan="3"><img name="Ubicacion_r4_c1" src="Imagenes/img/Ubicacion_r4_c1.png" width="143" height="269" border="0" id="Ubicacion_r4_c1" alt="" /></td>
   <td colspan="2"><a href="Opciones.php?cod=Atlantico" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r4_c4','','Imagenes/img/Ubicacion_r4_c4_f2.png',1);"><img name="Ubicacion_r4_c4" src="Imagenes/img/Ubicacion_r4_c4.png" width="34" height="34" border="0" id="Ubicacion_r4_c4" alt="" /></a></td>
   <td rowspan="2" colspan="8"><img name="Ubicacion_r4_c6" src="Imagenes/img/Ubicacion_r4_c6.png" width="212" height="38" border="0" id="Ubicacion_r4_c6" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="34" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="5" colspan="2"><img name="Ubicacion_r5_c4" src="Imagenes/img/Ubicacion_r5_c4.png" width="34" height="154" border="0" id="Ubicacion_r5_c4" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="4" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="4" colspan="2"><img name="Ubicacion_r6_c6" src="Imagenes/img/Ubicacion_r6_c6.png" width="34" height="150" border="0" id="Ubicacion_r6_c6" alt="" /></td>
   <td colspan="2"><a href="Opciones.php?cod=Magdalena" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r6_c8','','Imagenes/img/Ubicacion_r6_c8_f2.png',1);"><img name="Ubicacion_r6_c8" src="Imagenes/img/Ubicacion_r6_c8.png" width="34" height="34" border="0" id="Ubicacion_r6_c8" alt="" /></a></td>
   <td rowspan="2" colspan="4"><img name="Ubicacion_r6_c10" src="Imagenes/img/Ubicacion_r6_c10.png" width="144" height="55" border="0" id="Ubicacion_r6_c10" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="34" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="5" colspan="2"><img name="Ubicacion_r7_c8" src="Imagenes/img/Ubicacion_r7_c8.png" width="34" height="170" border="0" id="Ubicacion_r7_c8" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="21" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="4" colspan="2"><img name="Ubicacion_r8_c10" src="Imagenes/img/Ubicacion_r8_c10.png" width="74" height="149" border="0" id="Ubicacion_r8_c10" alt="" /></td>
   <td><a href="Opciones.php?cod=Cesar" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r8_c12','','Imagenes/img/Ubicacion_r8_c12_f2.png',1);"><img name="Ubicacion_r8_c12" src="Imagenes/img/Ubicacion_r8_c12.png" width="34" height="34" border="0" id="Ubicacion_r8_c12" alt="" /></a></td>
   <td rowspan="8"><img name="Ubicacion_r8_c13" src="Imagenes/img/Ubicacion_r8_c13.png" width="36" height="297" border="0" id="Ubicacion_r8_c13" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="34" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="7"><img name="Ubicacion_r9_c12" src="Imagenes/img/Ubicacion_r9_c12.png" width="34" height="263" border="0" id="Ubicacion_r9_c12" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="61" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="6"><img name="Ubicacion_r10_c4" src="Imagenes/img/Ubicacion_r10_c4.png" width="8" height="202" border="0" id="Ubicacion_r10_c4" alt="" /></td>
   <td colspan="2"><a href="Opciones.php?cod=Sucre" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r10_c5','','Imagenes/img/Ubicacion_r10_c5_f2.png',1);"><img name="Ubicacion_r10_c5" src="Imagenes/img/Ubicacion_r10_c5.png" width="34" height="34" border="0" id="Ubicacion_r10_c5" alt="" /></a></td>
   <td rowspan="6"><img name="Ubicacion_r10_c7" src="Imagenes/img/Ubicacion_r10_c7.png" width="26" height="202" border="0" id="Ubicacion_r10_c7" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="34" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="5" colspan="2"><img name="Ubicacion_r11_c5" src="Imagenes/img/Ubicacion_r11_c5.png" width="34" height="168" border="0" id="Ubicacion_r11_c5" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="20" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="4"><img name="Ubicacion_r12_c8" src="Imagenes/img/Ubicacion_r12_c8.png" width="31" height="148" border="0" id="Ubicacion_r12_c8" alt="" /></td>
   <td rowspan="2" colspan="2"><a href="Opciones.php?cod=Bolivar" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r12_c9','','Imagenes/img/Ubicacion_r12_c9_f2.png',1);"><img name="Ubicacion_r12_c9" src="Imagenes/img/Ubicacion_r12_c9.png" width="34" height="34" border="0" id="Ubicacion_r12_c9" alt="" /></a></td>
   <td rowspan="4"><img name="Ubicacion_r12_c11" src="Imagenes/img/Ubicacion_r12_c11.png" width="43" height="148" border="0" id="Ubicacion_r12_c11" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="27" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="3"><img name="Ubicacion_r13_c1" src="Imagenes/img/Ubicacion_r13_c1.png" width="59" height="121" border="0" id="Ubicacion_r13_c1" alt="" /></td>
   <td rowspan="2"><a href="Opciones.php?cod=Cordoba" onmouseout="MM_swapImgRestore();" onmouseover="MM_swapImage('Ubicacion_r13_c2','','Imagenes/img/Ubicacion_r13_c2_f2.png',1);"><img name="Ubicacion_r13_c2" src="Imagenes/img/Ubicacion_r13_c2.png" width="34" height="34" border="0" id="Ubicacion_r13_c2" alt="" /></a></td>
   <td rowspan="3"><img name="Ubicacion_r13_c3" src="Imagenes/img/Ubicacion_r13_c3.png" width="50" height="121" border="0" id="Ubicacion_r13_c3" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="7" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="2" colspan="2"><img name="Ubicacion_r14_c9" src="Imagenes/img/Ubicacion_r14_c9.png" width="34" height="114" border="0" id="Ubicacion_r14_c9" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="27" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="Ubicacion_r15_c2" src="Imagenes/img/Ubicacion_r15_c2.png" width="34" height="87" border="0" id="Ubicacion_r15_c2" alt="" /></td>
   <td><img src="Imagenes/img/spacer.gif" width="1" height="87" border="0" alt="" /></td>
  </tr>
</table>
</center>


</div>


 
 
<?php

$variable= file_get_contents("Partes/Pie.html");
	echo $variable;

?>


 
</body>
</html>

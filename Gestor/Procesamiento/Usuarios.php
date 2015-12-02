<?php
require_once("Conexion.php");

	if(!empty($_POST["Enteruser"])){
				logearse();								
	}else{
		if(!empty($_POST["Cdocentes"])){			
					lista();								
			}else{
				if(!empty($_POST["NNombre"])){			
						nuevo();								
				}
			}
	}	
						
		
		
				
	function nuevo(){
		
		$consulta = "insert usuarios(documento,nombre) values('".mysql_real_escape_string($_POST["NNombre"])."')";			
		if(	$datos=mysql_query($consulta)){
				echo "s";
		}else{		
				echo "n";
		}
	}	
		
function lista(){
	$consulta="SELECT u.documento,u.nombre,u.correo,u.estado FROM (usuarios u INNER JOIN cargos c ON c.codigo=u.codcargo) WHERE u.estado='Activo' ORDER BY U.nombre DESC";	
				$datos=mysql_query($consulta);		
				
echo'<div class="datagrid" style="border:solid 1px #ccc;margin:auto;width:80%;"><table style="margin:auto;"><thead><tr><th>Documento</th><th>Nombre</th><th>Correo</th><th>Estado</th><th width="80">Opciones</th></tr></thead><tfoot><tr><td colspan="5"><div id="no-paging">&nbsp;</div></td></tr></tfoot><tbody>';		
				$i=1;
				
				while($row=mysql_fetch_array($datos)){		
							
								if($i==1){
			echo '<tr><td style="width:100px;">'.$row[0].'</td>
			<td>'.$row[1].'</td>
			<td  >'.$row[2].'</td>
			<td style="width:50px;">'.$row[3].'</td>
			
			<td align="center">
			<input type="image" src="Imagenes/edit.png" class="edit" value="'.$row[0].'"/>
			<input type="image" src="Imagenes/delet.png" class="delet" value="'.$row[0].'"/>
			</td></tr>';
									$i=0;
								}else{									
		echo '<tr class="alt"><td style="width:100px;">'.$row[0].'</td>		
			<td >'.$row[1].'</td>
			<td >'.$row[2].'</td>
			<td style="width:50px;" >'.$row[3].'</td>
			<td align="center">
			<input type="image" src="Imagenes/edit.png" class="edit" value="'.$row[0].'"/>
		<input type="image" src="Imagenes/delet.png" class="delet" value="'.$row[0].'"/>
		</td></tr>';
		$i=1;
								}

				}
				echo"</tbody>
</table></div>";	
				
		}	
		
		
						
function logearse(){
	$consulta = "SELECT usuario,nombre from usuarios where 
	usuario='".mysql_real_escape_string($_POST["Enteruser"])."' and
	pass='".mysql_real_escape_string($_POST["Enterpass"])."'";
	$datos = mysql_query($consulta);
	
	if ($row = mysql_fetch_array($datos)){
			
			if(@session_start()==false){
			session_destroy();
			session_start();
			}	
			
			$_SESSION['Name']=$row[1];
			$_SESSION['UseR']=$row[0];
			echo "s";
						
	}else{		
			echo "n";
	}
	
	
}

?>
<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("../../../sis.php");
include("$path/class/poolConnection.php");
include("$path/class/CargaInvFisico.php");
$row=0;
$rowA=0;
$rowI=0;
if (isset($_FILES["fileCVS"]) && is_uploaded_file($_FILES['fileCVS']['tmp_name']))
{

	$FliexGridCVS="";
	$fp = fopen($_FILES['fileCVS']['tmp_name'], "r");
	while ($data = fgetcsv ($fp, 1000, ";"))
	{
		$num = count($data);
		$row++;
		for ($c=0; $c < $num; $c++)
		{
		//echo $data[$c] . "<br />\n";
			$ArrayValores = split(',',$data[$c]);
			if(!empty($ArrayValores[0]))
					{
					    
						$Cambs = trim(str_replace('"','',$ArrayValores[0]));
						$UA =trim(str_replace('"','',$ArrayValores[1]));
						$FechaRegistro = trim(str_replace('"','',$ArrayValores[2]));
						$CboUser=trim(str_replace('"','',$ArrayValores[3]));
						$IdBien=trim(str_replace('"','',$ArrayValores[4]));
						$Estado= trim(str_replace('"','',$ArrayValores[5]));
						
						
						//Pregunta mos si es una actulizacion o una insercion
						$insertar="Si";
					    $objBuscar = new  poolConnection();
					    $con=$objBuscar->Conexion();
					    $objBuscar->BaseDatos();
					    $sql="Select Id_ConsecutivoInv from sa_inventario Where Id_CABMS='$Cambs'";
					    
					    $RSet=$objBuscar->Query($sql);
					    while($fila = mysql_fetch_array($RSet))
					    {
					    	$insertar="No";
					    }
					    mysql_free_result($RSet);
					    $objBuscar->Cerrar($con);
						if($insertar=="Si")
						{
							$Sql="insert into sa_inventario values(+0+,+$Cambs+,+$IdBien+,+0+,+0+,+0+,+0+,+0+,+0000-00-00+,+$Estado+,+$FechaRegistro+,+0000-00-00+,+-1+,+-1+,+-1+,+$CboUser+)";
							$rowI++;
							$tipo='I';
							
						}
						else {
							$Sql="Update sa_inventario set  Id_TipoBien=+$IdBien+,dFechaModRegistro=+$FechaRegistro+,Id_EdoBien=+$Estado+  where Id_CABMS=+$Cambs+";
							$rowA++;
							$tipo='A';
						}
						
						$i++;
						/*$FliexGridCVS.="
						<tr>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">
						<input type='checkbox' name='Validar[$i]' value='Si'/>
						<input type='hidden' name='TextSql[$i]' value='$Sql'/>
						</td>
						
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$Cambs</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$FechaRegistro</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$IdBien</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$Estado</td>
						</tr>";*/
						$FliexGridCVS.="
						
						<tr>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">
								<input type='checkbox' name='Validar[$i]' value='Si'/>
								<input type='hidden' name='TextSql[$i]' value='$Sql'/>
								<input type='hidden' name='TextCambs[$i]' value='$Cambs'/>
								<input type='hidden' name='TextUA[$i]' value='$UA'/>
								<input type='hidden' name='TextFechaRegistro[$i]' value='$FechaRegistro'/>
								<input type='hidden' name='TextCboUser[$i]' value='$CboUser'/>
								<input type='hidden' name='TextEstadoDes[$i]' value='$EstadoDes'/>
								<input type='hidden' name='TextEstado[$i]' value='$Estado'/>
								<input type='hidden' name='TextIdBien[$i]' value='$IdBien'/>
								<input type='hidden' name='TextTipo[$i]' value='$tipo'/>
								</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Por Asignar</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$Cambs</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$UA</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$FechaRegistro</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$CboUser</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$IdBien</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$Estado</td>
			           	  		
			           	  		</tr>
						";
					    
					}
		}
	}
		fclose ($fp);
	}
	if($_POST[EjecutarGrid]=="Si")
	{
		
		$ArraySql = $_POST[TextSql];
		$ArrayValidar = $_POST[Validar];
		$ArrayCambs=$_POST[TextCambs];
		$ArrayUA=$_POST[TextUA];
		$ArrayFechaRegistro=$_POST[TextFechaRegistro];
		$ArrayCboUser=$_POST[TextCboUser];
		$ArrayEstadoDes=$_POST[TextEstadoDes];
		$ArrayEstado=$_POST[TextEstado];
		$ArrayIdBien=$_POST[TextIdBien];
		$ArrayTipo = $_POST[TextTipo];
		$movimiento = new CargaInvFisico();
		foreach($ArrayValidar as $key => $Value)
		{
			if(!empty($Value))
			{
				$search="+";
				$replace="'";
				if($ArrayTipo[$key]=="I")
				{
					
					$FliexGridI_.="<tr>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayCambs[$key]</td>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayUA[$key]</td>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayFechaRegistro[$key]</td>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayCboUser[$key]</td>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayIdBien[$key]</td>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayEstado[$key]</td>
					
					</tr>";
					$rowI++;
					$sql = str_replace($search, $replace, $ArraySql[$key]);
					$objEjecutar = new poolConnection();
					$con=$objEjecutar->Conexion();
					$objEjecutar->BaseDatos();
					$objEjecutar->Query($sql);
					$Id_ConsecutivoInv=mysql_insert_id();
					$objEjecutar->Cerrar($con);
					
					$info->Id_CABMS=$ArrayCambs[$key];
					$info->Id_ConsecutivoInv=$Id_ConsecutivoInv;
					$info->Resguardante1=$ArrayCboUser[$key];
					$info->Id_TipoMovimiento="";
					$info->Id_Unidad=$ArrayUA[$key];
					$info->dFechaResguardo=$ArrayFechaRegistro[$key];
					$info->dFechaMovRegistro="0000-00-00";
					$info->Accion="Insertar";
					$movimiento->movimeintoinv($info);
				}
				else{
					$FliexGridA_.="<tr>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayCambs[$key]</td>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayUA[$key]</td>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayFechaRegistro[$key]</td>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayCboUser[$key]</td>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayIdBien[$key]</td>
					<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayEstado[$key]</td>
					
					</tr>";
					$rowA++;
					//optenemos consecutivo 
					$objConsecutivo = new  poolConnection();
					$conC=$objConsecutivo->Conexion();
					$objConsecutivo->BaseDatos();
					$sqlConsecutivo="Select Id_ConsecutivoInv from sa_inventario Where Id_CABMS='$ArrayCambs[$key]'";
					
					$RSetC=$objConsecutivo->Query($sqlConsecutivo);
					while($fila = mysql_fetch_array($RSetC))
					{
						$Id_ConsecutivoInv=$fila[Id_ConsecutivoInv];
					}
					mysql_free_result($RSetC);
					$objConsecutivo->Cerrar($conC);
					
					
					$sql = str_replace($search, $replace, $ArraySql[$key]);
					$objEjecutar = new poolConnection();
					$con=$objEjecutar->Conexion();
					$objEjecutar->BaseDatos();
					$objEjecutar->Query($sql);
					$objEjecutar->Cerrar($con);
					$D=date(d);
					$M=date(m);
					$Y=date(Y);
					$FechaModifcacion = "$Y-$M-$D";
					$info->Id_CABMS=$ArrayCambs[$key];
					$info->Id_ConsecutivoInv=$Id_ConsecutivoInv;
					$info->Resguardante1=$ArrayCboUser[$key];
					$info->Id_TipoMovimiento="";
					$info->Id_Unidad=$ArrayUA[$key];
					$info->dFechaResguardo=$ArrayFechaRegistro[$key];
					$info->dFechaMovRegistro="$FechaModifcacion";
					$info->Accion="Actualizar";
					 $movimiento->movimeintoinv($info);
				}
				
				//echo "$sql<br>";
				
				
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <?php 
      if(!empty($_SESSION[IdActivo]))
      {
          
      }
      else
      {
          echo "<script>
                      top.location.href='$url/index.php';
                      window.location.href='$url/index.php';
                </script>";
      }
      
    ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SACI : Procesos</title>
 <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
 <!-- Smoke -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
<script src="<?php Echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
<link id="theme" rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/dark.css" type="text/css" media="screen" />
<!-- End Smoke -->
<!-- Grid -->
<link rel="stylesheet" type="text/css" href="<?php Echo $url; ?>/js/flexigrid/css/flexigrid/flexigrid.css"/>
<script type="text/javascript" src="<?php Echo $url; ?>/js/flexigrid/flexigrid.js"></script>
<!-- End Grid -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/jq_ui/css/smoothness/jquery-ui-1.9.1.custom.min.css" />
<script src="<?php Echo $url; ?>/js/jq_ui/js/jquery-ui-1.9.1.custom.min.js"></script>  
  
<style type="text/css">
body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
}
body {
	background-image: url(../../../interfaz/background.jpg);
	background-repeat: repeat;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
#apDiv1 {
	position:absolute;
	left:0px;
	top:0px;
	width:1000px;
	height:53px;
	z-index:1;
}
</style>
<link href="css/modulos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv2 {
	position:absolute;
	left:0px;
	top:-1px;
	width:232px;
	height:51px;
	z-index:2;
}
</style>
<link href="css/t_procesos.css" rel="stylesheet" type="text/css" />
<link href="../../../css/textos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv3 {
	position:absolute;
	left:519px;
	top:2px;
	width:457px;
	height:45px;
	z-index:1;
}
#apDiv11 {
	position:absolute;
	left:146px;
	top:22px;
	width:667px;
	height:21px;
	z-index:8;
}
#apDiv4 {
	position:absolute;
	left:850px;
	top:0px;
	width:68px;
	height:22px;
	z-index:9;
}
#apDiv5 {
	position:absolute;
	left:0px;
	top:59px;
	width:1000px;
	height:698px;
	z-index:10;
	background-color: #FFFFFF;
}
#apDiv6 {
	position:absolute;
	left:0px;
	top:759px;
	width:1000px;
	height:70px;
	z-index:11;
	background-color: #C0C2C7;
}
#apDiv7 {
	position:absolute;
	left:867px;
	top:771px;
	width:48px;
	height:38px;
	z-index:12;
}
#apDiv8 {
	position:absolute;
	left:745px;
	top:771px;
	width:54px;
	height:20px;
	z-index:13;
}
#apDiv9 {
	position:absolute;
	left:746px;
	top:771px;
	width:54px;
	height:25px;
	z-index:14;
}
#apDiv10 {
	position:absolute;
	left:625px;
	top:892px;
	width:81px;
	height:28px;
	z-index:15;
}
#apDiv12 {
	position:absolute;
	left:746px;
	top:771px;
	width:46px;
	height:26px;
	z-index:16;
}
#apDiv13 {
	position:absolute;
	left:625px;
	top:771px;
	width:54px;
	height:24px;
	z-index:17;
}
#apDivPlantilla {
	position:absolute;
	left:503px;
	top:771px;
	width:54px;
	height:24px;
	z-index:17;
}
</style>
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

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
function saver_Order()
{
       document.frmOrderGrid.submit();
}
$(function() {  
    $("#dialog1").dialog({
                        autoOpen: false,
                        width: 750,
                        height: 400
                });
    $("#dialog2").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      });
            });
</script>
</head>
<body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/cargar_over.jpg','../../interfaz_modulos/botones/limpiar_over.jpg','../../interfaz_modulos/botones/agregar_over.jpg','../../interfaz_modulos/botones/eliminar_over.jpg')">
<?php 
if($_POST[EjecutarGrid]=="Si")
{
  echo "
         <script>
              smoke.signal('Operacion terminda con exito.');
         </script>
       ";
}	
?>
<div style="width:1006px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div class="txt_titulo_secciones" id="apDiv11"> / Inventariables / Carga de Inventario Fisico por Archivo</div>
<div id="apDiv4"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
<div id="apDiv5">
<center>
    <div id="DivTrabajo">
    	<form name="frmArchivoCVS" id="frmArchivoCVS" action=""  method="post" enctype="multipart/form-data">
       			<br>
       			<fieldset>
                	<legend class="txt_titulos_bold"  >Archivo</legend>
                     <input type="file" name="fileCVS" id="fileCVS" />
                     <br><br>
                     (solo archivos CVS)
           		</fieldset>   
           		<br>
       </form>  
       <fieldset>
                <table>
                       <tr>
                             <td><div id="DivLeedios">Registro Leidos:<?php echo $row; ?></div></td>
                              <td>&nbsp;&nbsp;&nbsp;</td>
                              <td><div id="DviActualizar" onclick="$('#dialog2').dialog('open');" style="cursor:pointer">Registro Actualizar:<?php echo $rowA; ?></div></td>
                              <td>&nbsp;&nbsp;&nbsp;</td>
                              <td><div id="DivInsertados" onclick="$('#dialog1').dialog('open');" style="cursor:pointer">Registro Insertados:<?php echo $rowI; ?></div></td>
                       </tr>
                </table>	
       </fieldset> 	
       <br>	
           		<?php 
		           		$FliexGrid = "<form action='' name='frmOrderGrid' method='post'>
		           		              <table class=\"flexme1\">
		           		<tbody>";
		           		if (isset($_FILES["fileCVS"]) && is_uploaded_file($_FILES['fileCVS']['tmp_name']))
		           		{
		           			$FliexGrid.=$FliexGridCVS;
		           			
		           		}
		           	  else
		           	  {
			           	  
			           	  		 
			           	  		$FliexGrid.="<tr>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">--</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Consecutivo</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">CAMBS</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">U.Administrativa</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Fecha</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Cve. User</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Agregado</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Estado Agregado</td>
			           	  		</tr>";
			           	  	
		           	  }	
		           		$FliexGrid.="       </tbody>
		           		</table><script>$('.flexme1').flexigrid({
		           		title: '',
		           		colModel : [
		           		{display: 'Validar', name : 'Validar', width :120, sortable :false, align: 'center'},
		           		{display: 'Consecutivo', name : 'Consecutivo', width :150, sortable :false, align: 'center'},
		           		{display: 'Cambs', name : 'Cambs', width :350, sortable :false, align: 'center'},
		           		{display: 'U.Administrativa', name: 'U.Administrativa', width :150, sortable :false, align: 'center'},
		           		{display: 'Fecha', name: 'Fecha', width :150, sortable :false, align: 'center'},
		           		{display: 'Cve .User', name: 'Cve .User', width :150, sortable :false, align: 'center'},
		           		{display: 'Agregado', name: 'Agregado', width :150, sortable :false, align: 'center'},
		           		{display: 'Estado Agrgado', name: 'Estado Agrgado', width :150, sortable :false, align: 'center'}
		           		],
		           		buttons : [
		           		{name: '',onpress:saver_Order},
		           		{separator: true}
		           		],
		           		width: 930,
		           		height: 200
		           		}
		           		
		           		);</script><input type=\"hidden\"  name=\"EjecutarGrid\" value=\"Si\"></form>";
           		        echo $FliexGrid;
           		        if (isset($_FILES["fileCVS"]) && is_uploaded_file($_FILES['fileCVS']['tmp_name']))
           		        {
		           		        echo "<br><br>
		           		        <img src=\"../../interfaz_modulos/botones/guardar.jpg\" name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"saver_Order();\"/>
		           		        ";
           		        }
           		?>    
    </div>
 </center>
</div>
<div id="apDiv6"></div>
<div id="apDiv7"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div id="apDiv9"><img src="../../interfaz_modulos/botones/limpiar.jpg" name="Image6" width="120" height="45" border="0" id="Image6"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../../interfaz_modulos/botones/limpiar_over.jpg',1)"  style="cursor:pointer" onclick="javascript:window.location.href='../../menu_procesos.php'"/></div>
<div id="apDiv13"><img src="../../interfaz_modulos/botones/cargar.jpg" name="Cargar7" width="120" height="45" border="0" id="Cargar7" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Cargar7','','../../interfaz_modulos/botones/cargar_over.jpg',1)" style="cursor:pointer;" onclick="document.frmArchivoCVS.submit();"/></div>
<div id="apDivPlantilla"><a href='formato_invetario.csv' target='_blank'><img src="../../interfaz_modulos/botones/plantillas.png" name="Image7" width="120" height="45" border="0" id="Image7" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../../interfaz_modulos/botones/plantillas_over.png',1)" style="cursor:pointer;"/></a></div>

</div>
<div id="dialog1" title="Insertados">
        <?php 
			        $FliexGridI = "
			        <table class=\"flexme2\">
			        <tbody>";
			        
			        $FliexGridI.=$FliexGridI_;
        
			        $FliexGridI.="       </tbody>
			        </table><script>$('.flexme2').flexigrid({
			        title: '',
			        colModel : [
			        
			        {display: 'Cambs', name : 'Cambs', width :350, sortable :false, align: 'center'},
			        {display: 'U.Administrativa', name: 'U.Administrativa', width :150, sortable :false, align: 'center'},
			        {display: 'Fecha', name: 'Fecha', width :150, sortable :false, align: 'center'},
			        {display: 'Cve .User', name: 'Cve .User', width :150, sortable :false, align: 'center'},
			        {display: 'Agregado', name: 'Agregado', width :150, sortable :false, align: 'center'},
			        {display: 'Estado Agrgado', name: 'Estado Agrgado', width :150, sortable :false, align: 'center'},
			        ],
			        buttons : [
			        {name: '',onpress:saver_Order},
			        {separator: true}
			        ],
			        width: 930,
			        height: 200
			        }
			         
			        );</script>";
			        echo $FliexGridI;
        ?>
 </div>
 <div id="dialog2" title="Actualizados">
        <?php 
			        $FliexGridA = "
			        <table class=\"flexme3\">
			        <tbody>";
			        
			        $FliexGridA.=$FliexGridA_;
        
			        $FliexGridA.="       </tbody>
			        </table><script>$('.flexme3').flexigrid({
			        title: '',
			        colModel : [
			        {display: 'Cambs', name : 'Cambs', width :350, sortable :false, align: 'center'},
			        {display: 'U.Administrativa', name: 'U.Administrativa', width :150, sortable :false, align: 'center'},
			        {display: 'Fecha', name: 'Fecha', width :150, sortable :false, align: 'center'},
			        {display: 'Cve .User', name: 'Cve .User', width :150, sortable :false, align: 'center'},
			        {display: 'Agregado', name: 'Agregado', width :150, sortable :false, align: 'center'},
			        {display: 'Estado Agrgado', name: 'Estado Agrgado', width :150, sortable :false, align: 'center'},
			        ],
			        buttons : [
			        {name: '',onpress:saver_Order},
			        {separator: true}
			        ],
			        width: 930,
			        height: 200
			        }
			         
			        );</script>";
			        echo $FliexGridA;
        ?>
 </div>
</body>
</html>

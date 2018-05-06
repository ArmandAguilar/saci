<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("../../../sis.php");
include("$path/class/poolConnection.php");
$row=0;
$rowE=0;
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
				           $Nombre=trim(str_replace('"','',$ArrayValores[1]));
				           $RFC = trim(str_replace('"','',$ArrayValores[2]));
				           $ZonaPago = trim(str_replace('"','',$ArrayValores[3]));
				           $Cargo= trim(str_replace('"','',$ArrayValores[4]));
				           $Adscripcion = trim(str_replace('"','',$ArrayValores[5]));
				           $Ubicacion = trim(str_replace('"','',$ArrayValores[6]));
				           $Domiclio = trim(str_replace('"','',$ArrayValores[7]));
				           $objCVS =  new poolConnection();
				           $objCVS->Conexion();
				           $objCVS->BaseDatos();
				           $Sql="insert into sa_empleado values('$ArrayValores[0]', '$Nombre', '$RFC', '$ZonaPago', '$Cargo', '$Adscripcion', '$Ubicacion', '$Domiclio', '0', '-1')";
				           $FliexGridCVS.="
				           <tr>
				           <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayValores[0]</td>
				           <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$Nombre</td>
				           <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$RFC</td>
				           <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ZonaPago</td>
				           <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$Adscripcion</td>
				           <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$Cargo</td>
				           </tr>
				           ";
				           if($objCVS->Query($Sql))
				           {
				           	   $rowI++;
				           }
				           else
				           {
				           	   $rowE++;
				           }
				           $objCVS->Cerrar();
				      }
	        }
	}
	fclose ($fp);
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
	height:463px;
	z-index:10;
	background-color: #FFFFFF;
}
#apDiv6 {
	position:absolute;
	left:0px;
	top:524px;
	width:1000px;
	height:70px;
	z-index:11;
	background-color: #C0C2C7;
}
#apDiv7 {
	position:absolute;
	left:867px;
	top:535px;
	width:48px;
	height:38px;
	z-index:12;
}
#apDiv8 {
	position:absolute;
	left:746px;
	top:535px;
	width:54px;
	height:20px;
	z-index:13;
}
#apDiv9 {
	position:absolute;
	left:625px;
	top:535px;
	width:54px;
	height:25px;
	z-index:14;
}
#apDiv10 {
	position:absolute;
	left:864px;
	top:146px;
	width:81px;
	height:28px;
	z-index:15;
}
#apDivPlantilla {
	position:absolute;
	left:503px;
	top:535px;
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
</script>
</head>
<body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/aceptar_over.jpg','../../interfaz_modulos/botones/reporte_over.jpg','../../interfaz_modulos/botones/buscar_over.jpg')">
<div style="width:1022px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div class="txt_titulo_secciones" id="apDiv11"> / Carga de Empleados</div>
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
                             <td>Registro Leidos: <?php echo $row; ?></td>
                              <td>&nbsp;&nbsp;&nbsp;</td>
                              <td>Registro Error: <?php echo $rowE; ?></td>
                              <td>&nbsp;&nbsp;&nbsp;</td>
                              <td>Registro Incorporados: <?php echo $rowI; ?></td>
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
			           	  	$objBuscar = new poolConnection();
			           	  	$con=$objBuscar->Conexion();
			           	  	$objBuscar->BaseDatos();
			           	  	$sql="SELECT * FROM sa_empleado where vCargo='Root' order by Id_NumEmpleado desc";
			           	  	$RSet=$objBuscar->Query($sql);
			           	  	while($fila = mysql_fetch_array($RSet))
			           	  	{
			           	  		 
			           	  		$FliexGrid.="<tr>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_NumEmpleado]</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vRFC]</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eZonaPago]</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Adscripcion]</td>
			           	  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vCargo]</td>
			           	  		</tr>";
			           	  	}
			           	  	mysql_free_result($RSet);
			           	  	$objBuscar->Cerrar($con);
		           	  }	
		           		$FliexGrid.="       </tbody>
		           		</table><script>$('.flexme1').flexigrid({
		           		title: '',
		           		colModel : [
		           		{display: 'Num.Empleado', name : 'Num.Empleado', width :120, sortable :false, align: 'center'},
		           		{display: 'Nombre', name : 'Nombre', width :350, sortable :false, align: 'center'},
		           		{display: 'RFC', name : 'RFC', width :150, sortable :false, align: 'center'},
		           		{display: 'Zona Pago', name: 'Zona Pago', width :150, sortable :false, align: 'center'},
		           		{display: 'Adscripcion', name: 'Adscripcion', width :150, sortable :false, align: 'center'},
		           		{display: 'Cargo', name : 'Cargo', width :150, sortable :false, align: 'center'}
		           		
		           		],
		           		buttons : [
		           		{name: '',onpress:saver_Order},
		           		{separator: true}
		           		],
		           		width: 930,
		           		height: 200
		           		}
		           		
		           		);</script><input type=\"hidden\"  name=\"ActGridUsuarios\" value=\"Si\"></form>";
           		        echo $FliexGrid;
           		?>    
    </div>
 </center>      
</div>
<div id="apDiv6"></div>
<div id="apDiv7"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div id="apDiv8"><img src="../../interfaz_modulos/botones/aceptar.jpg" name="Image4" width="120" height="45" border="0" id="Image4"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/aceptar_over.jpg',1)" style="cursor:pointer" onclick="document.frmArchivoCVS.submit();"/></div>
<div id="apDiv9"><a href='formato_invetario.csv' target='_blank'><img src="../../interfaz_modulos/botones/plantillas.png" name="Image7" width="120" height="45" border="0" id="Image7" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../../interfaz_modulos/botones/plantillas_over.png',1)" style="cursor:pointer;"/></a></div>
<div id="apDivPlantilla"><!--  <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../../interfaz_modulos/botones/reporte_over.jpg',1)"><img src="../../interfaz_modulos/botones/reporte.jpg" name="Image6" width="120" height="45" border="0" id="Image6" /></a>--></div>

</div>
</body>
</html>

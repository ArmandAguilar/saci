<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("../../../sis.php");
include("$path/class/poolConnection.php");
include("$path/class/CargaInventario.php");
$a = session_id();
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
<!-- Begin Libs  --> 
 <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.2.js" type="text/javascript"></script>
 <script src="<?php echo $url; ?>/js/procesos_cargainventario.js" type="text/javascript"></script>
 <!-- Smoke -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
<script src="<?php Echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
<link id="theme" rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/dark.css" type="text/css" media="screen" />
<!-- End Smoke -->
<!-- Validation -->
<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_validation/css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_validation/css/template.css" type="text/css"/>
	
	<script src="<?php echo $url; ?>/js/jq_validation/js/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="<?php echo $url; ?>/js/jq_validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	
<!-- End Validation -->
<!-- Grid -->
<link rel="stylesheet" type="text/css" href="<?php Echo $url; ?>/js/flexigrid/css/flexigrid/flexigrid.css"/>
<script type="text/javascript" src="<?php Echo $url; ?>/js/flexigrid/flexigrid.js"></script>
<!-- End Grid -->

<link rel="stylesheet" href="<?php Echo $url; ?>/js/jq_ui/css/smoothness/jquery-ui-1.9.1.custom.min.css" />
<script src="<?php Echo $url; ?>/js/jq_ui/js/jquery-ui-1.9.1.custom.min.js"></script>  
  
<!-- Chosen -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/jq_chosen/chosen/chosen.css" />
<script src="<?php Echo $url; ?>/js/jq_chosen/chosen/chosen.jquery.js" type="text/javascript"></script>
<!-- end Chosen -->
<link href="../../../css/boxes.css" rel="stylesheet" type="text/css" />
<title>SACI : Procesos</title>
<?php
         if($_POST[ActGrid]=="Si")
            {

                 $obj = new CargaInventario();
                 $ArrayArtDes=$_POST[txtVDescripcion];
                 $ArrayArtApartado=$_POST[txtArtApartado];
                 $ArrayArtDisponibles=$_POST[txtArtDisponibles];
                 $ArrayCostoPromedio=$_POST[txtCostoPromedio];
                 $ArrayCambs=$_POST[IdCABMS];
                 $ArrayMembrete = $_POST[txtNoMarbete];

                 foreach($ArrayCambs as $key=>$value)
                      {
                              if(!empty($value))
                              {
                                       
                                        $info->Id_CABMS=$ArrayCambs[$key];
                                        $info->eCantidadExistenciaDisponible=$ArrayArtDisponibles[$key];
                                        $info->eCantidadExistenciaApartada=$ArrayArtApartado[$key];
                                        $info->mCostoPromedioActual=$ArrayCostoPromedio[$key];
                                        $info->bMembrete=$ArrayMembrete[$key];
                                        $info->Session = $a;
                                         $obj->Agregar_existencia($info);


                              }  
                      }
                     
           }
    ?>
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
	height:687px;
	z-index:10;
	background-color: #FFFFFF;
}
#apDiv6 {
	position:absolute;
	left:0px;
	top:750px;
	width:1000px;
	height:80px;
	z-index:11;
	background-color: #C0C2C7;
}
#apDiv7 {
	position:absolute;
	left:867px;
	top:770px;
	width:48px;
	height:38px;
	z-index:12;
}
#apDiv8 {
	position:absolute;
	left:382px;
	top:770px;
	width:54px;
	height:20px;
	z-index:13;
}
#apDiv9 {
	position:absolute;
	left:504px;
	top:770px;
	width:54px;
	height:25px;
	z-index:14;
}
#apDiv10 {
	position:absolute;
	left:746px;
	top:770px;
	width:81px;
	height:28px;
	z-index:15;
}
#apDiv12 {
	position:absolute;
	left:625px;
	top:770px;
	width:46px;
	height:26px;
	z-index:16;
}
#apDiv13 {
	position:absolute;
	left:746px;
	top:512px;
	width:74px;
	height:31px;
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
</script>
</head>
<body onload="frm_agregar();RGrid();MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/agregar_over.jpg','../../interfaz_modulos/botones/modificar_over.jpg','../../interfaz_modulos/botones/consultar_over.jpg','../../interfaz_modulos/botones/reporte_over.jpg')">
<input type="hidden" id="txtIdBorrar" name="txtIdBorrar" />
<input type='hidden' name='txtSession' id='txtSession' value='<?php echo $a; ?>'/>  
<div style="width:1022px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div class="txt_titulo_secciones" id="apDiv11"> / Consumibles / Entrada / Carga de Inventario</div>
<div id="apDiv4"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
<div id="apDiv5">
    <div id="Trabajo"></div>
</div>
<div id="apDiv6"></div>
<div id="apDiv7"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div id="apDiv8"><img src="../../interfaz_modulos/botones/limpiar.jpg" name="ImageLimpiar" width="120" height="45" border="0" id="ImageLimpiar" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageLimpiar','','../../interfaz_modulos/botones/limpiar_over.jpg',1)" style="cursor:pointer" onclick="limpiar('<?php echo $a; ?>');"/></div>
<div id="apDiv9"><img src="../../interfaz_modulos/botones/aceptar.jpg" name="Image6" width="120" height="45" border="0" id="Image6" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../../interfaz_modulos/botones/aceptar_over.jpg',1)" style="cursor:pointer" onclick="aceptar_btn();"/></div>
<div id="apDiv12"><img src="../../interfaz_modulos/botones/consultar.jpg" name="Image9" width="120" height="45" border="0" id="Image9" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','../../interfaz_modulos/botones/consultar_over.jpg',1)" style="cursor:pointer" onclick="frm_consultar();"/></div>
<div id="apDiv10"><img src="../../interfaz_modulos/botones/borrar.jpg" name="ImageBorrar" width="120" height="45" border="0" id="ImageBorrar" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBorrar','','../../interfaz_modulos/botones/borrar_over.jpg',1)" style="cursor:pointer" onclick="borrar_grid();"/></div>




<div id="dialog" title="Articulo Cambs">
        <table>
            <tr>
                <td><input type="text" name="txtPatron" id="txtPatron" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBArticuloCambs" width="120" height="45" border="0" id="ImageBArticuloCambs" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBArticuloCambs','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_archivo();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkClave" id="chkClave" value="Clave"/></div></td>
                    <td><div class="txt_titulos_bold">Descripci&oacute;n:<input type="checkbox" name="chkDescripcion" id="chkDescripcion" value="Descripcion"/></div></td>
                </tr>
            </table> 
            <center><div id="DivLoad1" style="display:none"><img src="../../../interfaz/cargando.png"/></div></center>
            <div id="GridBusqueda"></div>
    </div>
</div>
<div id="dialog2" title="Consulta-(Cambs)">
        <table>
            <tr>
                <td><input type="text" name="txtPatron2" id="txtPatron2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageB" width="120" height="45" border="0" id="ImageB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageB','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_archivo_consulta();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkClave" id="chkClave" value="Clave"/></div></td>
                    <td><div class="txt_titulos_bold">Descripci&oacute;n:<input type="checkbox" name="chkDescripcion" id="chkDescripcion" value="Descripcion"/></div></td>
                </tr>
            </table> 
            <center><div id="DivLoad2" style="display:none"><img src="../../../interfaz/cargando.png"/></div></center>
            <div id="GridBusqueda2"></div>
    </div>
   <div id="dialog3" title="Borrar Cambs del grid">
        &iquest;Deseas borrar este Cambs del Grid ?
        <br>
       <div id="DivCambs"></div>
   </div> 
</div> 
</body>
</html>

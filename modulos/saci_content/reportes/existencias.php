<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("../../../sis.php");
include("$path/class/poolConnection.php");
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
<title>SACI : Reportes</title>
<!-- Begin Libs  --> 
 <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.2.js" type="text/javascript"></script>
 <script src="<?php echo $url; ?>/js/reporte_existencias.js" type="text/javascript"></script>
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
<script>
function saver_Order()
{
       document.frmOrderGrid.submit();
}
</script>
<link href="../../../css/textos.css" rel="stylesheet" type="text/css" />
<link href="../../../css/boxes.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
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
	width:209px;
	height:51px;
	z-index:2;
}
</style>
<link href="../../../css/textos.css" rel="stylesheet" type="text/css" />
<link href="css/t_reportes.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv11 {
	position:absolute;
	left:145px;
	top:22px;
	width:667px;
	height:21px;
	z-index:8;
}
#apDiv3 {
	position:absolute;
	left:850px;
	top:0px;
	width:50px;
	height:32px;
	z-index:9;
}
#apDiv4 {
	position:absolute;
	left:0px;
	top:59px;
	width:1000px;
	height:960px;
	z-index:10;
	background-color: #FFFFFF;
}
#apDiv5 {
	position:absolute;
	left:0px;
	top:1020px;
	width:1000px;
	height:70px;
	z-index:11;
	background-color: #C0C2C7;
}
#apDiv6 {
	position:absolute;
	left:867px;
	top:1033px;
	width:47px;
	height:21px;
	z-index:12;
}
#apDiv7 {
	position:absolute;
	left:625px;
	top:419px;
	width:54px;
	height:22px;
	z-index:13;
}
#apDiv8 {
	position:absolute;
	left:746px;
	top:1033px;
	width:71px;
	height:25px;
	z-index:14;
}
#apDiv9 {
	position:absolute;
	left:680px;
	top:197px;
	width:71px;
	height:33px;
	z-index:15;
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

<body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/fecha_over.jpg','../../interfaz_modulos/botones/ejecutar_over.jpg')">
    <div style="width:1008px; position: relative; margin-left: auto; margin-right: auto; top: -12px;">
<div class="modulos" id="apDiv1"></div>
<div class="txt_titulo_secciones" id="apDiv11"> / Inventariables / Existencias</div>
<div class="inicio" id="apDiv2"></div>
<div id="apDiv3"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
<div id="apDiv4">
    
    <table>
        <tr>
            <td>
                <fieldset>
                    <legend class="txt_titulos_bold">Empleado</legend>
                    <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Inicial</div></td>
                            <td><input type='text' id='txtIdEmpleadoInicial' name='txtIdEmpleadoInicial' class="boxes_form100px"/></td>
                            <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageEmpleado1" width="59" height="45" border="0" id="ImageEmpleado1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageEmpleado1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnEmpleado1();"/></td>
                        </tr>
                        <tr>
                            <td><div class="txt_titulos_bold">Final</div></td>
                            <td><input type='text' id='txtIdEmpleadoFinal' name='txtIdEmpleadoFinal' class="boxes_form100px" /></td>
                            <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageEmpleado2" width="59" height="45" border="0" id="ImageEmpleado2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageEmpleado2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnEmpleado2();"/></td>
                        </tr>
                    </table>    
                </fieldset>
            </td>
            <td>
                <fieldset class="txt_titulos_bold">
                    <legend>&Aacute;rea</legend>
                     <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Inicial</div></td>
                            <td><input type='text' id='txtAreaInicial' name='txtAreaInicial' class="boxes_form100px"  readonly/></td>
                            <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageArea1" width="59" height="45" border="0" id="ImageArea1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageArea1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnArea1();"/></td>
                        </tr>
                        <tr>
                            <td><div class="txt_titulos_bold">Final</div></td>
                            <td><input type='text' id='txtAreaFinal' name='txtAreaFinal' class="boxes_form100px"  readonly/></td>
                            <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageArea2" width="59" height="45" border="0" id="ImageArea2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageArea2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnArea2();"/></td>
                        </tr>
                    </table>
                </fieldset>
                
            </td>
            <td>
                  <fieldset class="txt_titulos_bold">
                    <legend>Inventario</legend>
                     <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Inicial</div></td>
                            <td><input type='text' id='txtInventarioInicial' name='txtInventarioInicial' class="boxes_form100px"  readonly/></td>
                            <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInvetario1" width="59" height="45" border="0" id="ImageInvetario1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInvetario1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInventario1();"/></td>
                        </tr>
                        <tr>
                            <td><div class="txt_titulos_bold">Final</div></td>
                            <td><input type='text' id='txtInventarioFinal' name='txtInventarioFinal' class="boxes_form100px"  readonly/></td>
                            <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInvetario2" width="59" height="45" border="0" id="ImageInvetario2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInvetario2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInventario2();"/></td>
                        </tr>
                    </table>
                </fieldset>
            </td>
            <td>
                <fieldset class="txt_titulos_bold">
                    <legend>Fecha Registro</legend>
                     <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Inicial</div></td>
                            <td><input type='text' id='txtFechaInicial' name='txtFechaInicial' class="boxes_form100px"  readonly/></td>
                        </tr>
                        <tr>
                            <td><div class="txt_titulos_bold">Final</div></td>
                            <td><input type='text' id='txtFechaFinal' name='txtFechaFinal' class="boxes_form100px"  readonly/></td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
        <tr>
            
            <td>
                <fieldset class="txt_titulos_bold">
                    <legend>Tipo Movimiento</legend>
                     <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Inicial</div></td>
                            <td><input type='text' id='txtMovimientoInicial' name='txtMovimientoInicial' class="boxes_form100px" /></td>
                            <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageTipoMovimiento1" width="59" height="45" border="0" id="ImageTipoMovimiento1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageTipoMovimiento1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnMovimiento1();"/></td>
                        </tr>
                        <tr>
                            <td><div class="txt_titulos_bold">Final</div></td>
                            <td><input type='text' id='txtMovimientoFinal' name='txtMovimientoFinal' class="boxes_form100px"  /></td>
                            <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageTipoMovimiento2" width="59" height="45" border="0" id="ImageTipoMovimiento2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageTipoMovimiento2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnMovimiento2();"/></td>
                        </tr>
                    </table>
                </fieldset>
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <br>
    <div id="tabs">             
        <ul>
            <li><a href="#tabs-1"> Bien Mueble </a><input type="checkbox" id="chkReporteMuble" name="chkReporteMuble" value="Si"/></li>
                <li><a href="#tabs-2">Bien Informatico</a><input type="checkbox" id="chkReporteInfomatico" name="chkReporteInfomatico" value="Si"/></li>
                <li><a href="#tabs-3">Vehiculo</a><input type="checkbox" id="chkReporteVehiculo" name="chkReporteVehiculo" value="Si"/></li>
                <li><a href="#tabs-4">Acervo Cultural</a><input type="checkbox" id="chkReporteCultural" name="chkReporteCultural" value="Si"/></li>
        </ul>
        <div id="tabs-1">
            
            <br>
            <div id="CamposRep1"></div>
            <div id="Campos1">
                 
                <table>
                        <tr>
                            <td>
                                <fieldset>
                                          <table>
                                                <tr>
                                                    <td><div class="txt_titulos_bold">Marca</div></td>
                                                    <td></td>
                                                </tr>
                                          </table> 
                                </fieldset>
                                <fieldset>
                                        <table>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Inicial</div></td>
                                                <td><input type='text' id='txtMarcaMuebleInicio' name='txtMarcaMuebleInicio' class="boxes_form400px"  readonly/></td>
                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageMuebleMarca1" width="59" height="45" border="0" id="ImageMuebleMarca1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageMuebleMarca1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnMuebleMarca1();"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Final</div></td>
                                                <td><input type='text' id='txtMarcaMuebleFinal' name='txtMarcaMuebleFinal' class="boxes_form400px"  readonly/></td>
                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageMuebleMarca2" width="59" height="45" border="0" id="ImageMuebleMarca2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageMuebleMarca2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnMuebleMarca2();"/></td>
                                            </tr>
                                        </table> 
                                </fieldset>  
                                    
                            </td>
                            <td>
                                    <fieldset>
                                              <table>
                                                    <tr>
                                                        <td><div class="txt_titulos_bold">Tipo</div></td>
                                                        <td></td>
                                                    </tr>
                                              </table> 
                                    </fieldset>
                                    <fieldset>
                                            <table>
                                                <tr>
                                                    <td><div class="txt_titulos_bold">Inicial</div></td>
                                                    <td><input type='text' id='txtMuebleTipoInicial' name='txtMuebleTipoInicial' class="boxes_form200px"  readonly/></td>
                                                    <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageMuebleTipo1" width="59" height="45" border="0" id="ImageMuebleTipo1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageMuebleTipo1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnMuebleTipo1();"/></td>
                                                </tr>
                                                <tr>
                                                    <td><div class="txt_titulos_bold">Final</div></td>
                                                    <td><input type='text' id='txtMuebleTipoFinal' name='txtMuebleTipoFinal' class="boxes_form200px"  readonly/></td>
                                                   <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageMuebleTipo2" width="59" height="45" border="0" id="ImageMuebleTipo2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageMuebleTipo2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnMuebleTipo2();"/></td>
                                                </tr>
                                            </table> 
                                    </fieldset> 
                            </td>
                        </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <fieldset>
                                          <table>
                                                <tr>
                                                    <td><div class="txt_titulos_bold">Modelo</div></td>
                                                    <td></td>
                                                </tr>
                                          </table> 
                                </fieldset>
                                <fieldset>
                                        <table>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Inicial</div></td>
                                                <td><input type='text' id='txtMuebleModeloInicial' name='txtMuebleModeloInicial' class="boxes_form200px" /></td>
                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageMuebleModelo1" width="59" height="45" border="0" id="ImageMuebleModelo1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageMuebleModelo1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnMuebleModelo1();"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Final</div></td>
                                                <td><input type='text' id='txtMuebleModeloFinal' name='txtMuebleModeloFinal' class="boxes_form200px" /></td>
                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageMuebleModelo2" width="59" height="45" border="0" id="ImageMuebleModelo2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageMuebleModelo2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnMuebleModelo2();"/></td>
                                            </tr>
                                        </table> 
                                </fieldset>
                        </td>
                        <td valign="top">
                                <fieldset>
                                <table>
                                        <tr>
                                            <td><div class="txt_titulos_bold">Pedestal</div></td>
                                            <td><input type="checkbox" id="chkMueblePedestal" name="chkMueblePedestal" value="Si"/></td>
                                        </tr>
                                        <tr>
                                            <td><div class="txt_titulos_bold">Fija</div></td>
                                            <td><input type="checkbox" id="chkMuebleFija" name="chkMuebleFija" value="Si"/></td>
                                        </tr>
                                        <tr>
                                            <td><div class="txt_titulos_bold">Giratoria</div></td>
                                            <td><input type="checkbox" id="chkMuebleGiratoria" name="chkMuebleGiratoria" value="Si"/></td>
                                        </tr>
                                        <tr>
                                            <td><div class="txt_titulos_bold">Rodajas</div></td>
                                            <td><input type="checkbox" id="chkMuebleRodajas" name="chkMuebleRodajas" value="Si"/></td>
                                        </tr>
                                    
                                </table>
                            </fieldset>
                        </td>
                        <td valign="top">
                                <fieldset>
                                    <table>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Plegable</div></td>
                                                <td><input type="checkbox" id="chkMueblePlegable" name="chkMueblePlegable" value="Si"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Cajones</div></td>
                                                <td><input type="checkbox" id="chkMuebleCajones" name="chkMuebleCajones" value="Si"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Gavetas</div></td>
                                                <td><input type="checkbox" id="chkMuebleGavetas" name="chkMuebleGavetas" value="Si"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Entrepa&ntilde;o</div></td>
                                                <td><input type="checkbox" id="chkMuebleEntrepano" name="chkMuebleEntrepano" value="Si"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Serie</div></td>
                                                <td><input type="checkbox" id="chkMuebleSerie" name="chkMuebleSerie" value="Si"/></td>
                                            </tr>
                                    </table>
                                </fieldset>
                        </td>
                    </tr>
                    
                </table>
                </div>     
        </div>
        <div id="tabs-2">
           <br>
           <div id="CamposRep2"></div>
           <div id="Campos2"> 
            <table>
                 <tr>
                    <td>
                          <table>
                                 <tr valign="top">
                                    <td>
				                                 <fieldset>
				                                          <table>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Marca del bien</div></td>
				                                                    <td></td>
				                                                </tr>
				                                          </table> 
				                                </fieldset>
				                                <fieldset>
				                                        <table>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Inicial</div></td>
				                                                <td><input type='text' id='txtMarcaBienInfomaticoInicio' name='txtMarcaBienInfomaticoInicio' class="boxes_form200px"  readonly/></td>
				                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaricoMarcaBien1" width="59" height="45" border="0" id="ImageInformaricoMarcaBien1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaricoMarcaBien1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoBienMarca1();"/></td>
				                                            </tr>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Final</div></td>
				                                                <td><input type='text' id='txtMarcaBienInfomaticoFinal' name='txtMarcaBienInfomaticoFinal' class="boxes_form200px"  readonly/></td>
				                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaricoMarcaBien2" width="59" height="45" border="0" id="ImageInformaricoMarcaBien2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaricoMarcaBien2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoBienMarca2();"/></td>
				                                            </tr>
				                                        </table> 
				                                </fieldset>
				                                <fieldset>
				                                          <table>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Marca Mouse</div></td>
				                                                    <td></td>
				                                                </tr>
				                                          </table> 
				                                </fieldset>
				                                <fieldset>
				                                        <table>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Inicial</div></td>
				                                                <td><input type='text' id='txtMarcaMouseInformaticoInicio' name='txtMarcaMouseInformaticoInicio' class="boxes_form200px"  readonly/></td>
				                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInfomaticoMouse1" width="59" height="45" border="0" id="ImageInfomaticoMouse1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInfomaticoMouse1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoMouse1();"/></td>
				                                            </tr>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Final</div></td>
				                                                <td><input type='text' id='txtMarcaMouseInformaticoFinal' name='txtMarcaMouseInformaticoFinal' class="boxes_form200px"  readonly/></td>
				                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInfomaticoMouse2" width="59" height="45" border="0" id="ImageInfomaticoMouse2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInfomaticoMouse2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoMouse2();"/></td>
				                                            </tr>
				                                        </table> 
				                                </fieldset> 
				                                <fieldset>
				                                          <table>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Marca Teclado</div></td>
				                                                    <td></td>
				                                                </tr>
				                                          </table> 
				                                </fieldset>
				                                <fieldset>
				                                        <table>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Inicial</div></td>
				                                                <td><input type='text' id='txtMarcaTecladoInformaticoInicio' name='txtMarcaTecladoInformaticoInicio' class="boxes_form200px"  readonly/></td>
				                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaticoTeclado1" width="59" height="45" border="0" id="ImageInformaticoTeclado1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaticoTeclado1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoTeclado1();"/></td>
				                                            </tr>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Final</div></td>
				                                                <td><input type='text' id='txtMarcaTecladoInformaticoFinal' name='txtMarcaTecladoInformaticoFinal' class="boxes_form200px"  readonly/></td>
				                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaticoTeclado2" width="59" height="45" border="0" id="ImageInformaticoTeclado2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaticoTeclado2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoTeclado2();"/></td>
				                                            </tr>
				                                        </table> 
				                                </fieldset>     
                                    </td>
                                    <td>
                                          <fieldset>
				                                      <table>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Procesador</div></td>
				                                                    <td></td>
				                                                </tr>
				                                       </table> 
				                           </fieldset>
                                          <fieldset>
				                                        <table>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Inicial</div></td>
				                                                <td><input type='text' id='txtMarcaProcesadorInformaticoInicio' name='txtMarcaProcesadorInformaticoInicio' class="boxes_form200px"  readonly/></td>
				                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaticoProcesador1" width="59" height="45" border="0" id="ImageInformaticoProcesador1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaticoProcesador1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoProcesador1();"/></td>
				                                            </tr>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Final</div></td>
				                                                <td><input type='text' id='txtMarcaProcesadorInformaticoFinal' name='txtMarcaProcesadorInformaticoFinal' class="boxes_form200px"  readonly/></td>
				                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaticoProcesador2" width="59" height="45" border="0" id="ImageInformaticoProcesador2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaticoProcesador2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoProcesador2();"/></td>
				                                            </tr>
				                                        </table> 
				                           </fieldset> 
				                           <fieldset>
				                                      <table>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Modelo</div></td>
				                                                    <td></td>
				                                                </tr>
				                                       </table> 
				                           </fieldset>
                                          <fieldset>
				                                        <table>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Inicial</div></td>
				                                                <td><input type='text' id='txtMarcaMarcaInformaticoInicio' name='txtMarcaMarcaInformaticoInicio' class="boxes_form200px"  readonly/></td>
				                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaticoModelo1" width="59" height="45" border="0" id="ImageInformaticoModelo1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaticoModelo1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoMarca1();"/></td>
				                                            </tr>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Final</div></td>
				                                                <td><input type='text' id='txtMarcaMarcaInformaticoFinal' name='txtMarcaMarcaInformaticoFinal' class="boxes_form200px"  readonly/></td>
				                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaticoModelo2" width="59" height="45" border="0" id="ImageInformaticoModelo2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaticoModelo2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoMarca2();"/></td>
				                                            </tr>
				                                        </table> 
				                           </fieldset> 
				                           <fieldset>
				                                      <table>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Ram</div></td>
				                                                    <td></td>
				                                                </tr>
				                                       </table> 
				                           </fieldset>
                                          <fieldset>
				                                        <table>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Inicial</div></td>
				                                                <td><input type='text' id='txtMarcaRamInformaticoInicio' name='txtMarcaRamInformaticoInicio' class="boxes_form200px"  readonly/></td>
				                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaticoRam1" width="59" height="45" border="0" id="ImageInformaticoRam1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaticoRam1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoRam1();"/></td>
				                                            </tr>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Final</div></td>
				                                                <td><input type='text' id='txtMarcaRamInformaticoFinal' name='txtMarcaRamInformaticoFinal' class="boxes_form200px"  readonly/></td>
				                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaticoRam2" width="59" height="45" border="0" id="ImageInformaticoRam2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaticoRam2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoRam2();"/></td>
				                                            </tr>
				                                        </table> 
				                           </fieldset> 
				                           
                                    
                                    </td>
                                    <td>
                                        <fieldset>
				                                      <table>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Disco Duros</div></td>
				                                                    <td></td>
				                                                </tr>
				                                       </table> 
				                           </fieldset>
                                          <fieldset>
				                                        <table>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Inicial</div></td>
				                                                <td><input type='text' id='txtMarcaDdInformaticoInicio' name='txtMarcaDdInformaticoInicio' class="boxes_form100px"  readonly/></td>
				                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaticoDD1" width="59" height="45" border="0" id="ImageInformaticoDD1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaticoDD1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoDD1();"/></td>
				                                            </tr>
				                                            <tr>
				                                                <td><div class="txt_titulos_bold">Final</div></td>
				                                                <td><input type='text' id='txtMarcaDdInformaticoFinal' name='txtMarcaDdInformaticoFinal' class="boxes_form100px"  readonly/></td>
				                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageInformaticoDD2" width="59" height="45" border="0" id="ImageInformaticoDD2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageInformaticoDD2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnInformaticoDD2();"/></td>
				                                            </tr>
				                                        </table> 
				                           </fieldset> 
				                           
                                    </td>
                                 </tr>
                                 
                          </table>
                    </td>
                    <td>
                    
                    </td>
                 </tr>
            </table>
            </div>
        </div>
        <div id="tabs-3">
                <br>
                <div id="CamposRep3"></div>
                <div id="Campos3">
                <table>
                      <tr>
                          <td>
                             	<fieldset>
                             	          <legend class="txt_titulos_bold">Marca</legend>
	                                        <table>
	                                            <tr>
	                                                <td><div class="txt_titulos_bold">Inicial</div></td>
	                                                <td><input type='text' id='txtMarcaVehiculoInicio' name='txtMarcaVehiculoInicio' class="boxes_form200px"  readonly/></td>
	                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageVehiculoMarca1" width="59" height="45" border="0" id="ImageVehiculoMarca1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageVehiculoMarca1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnVehiculoMarca1();"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Final</div></td>
                                                <td><input type='text' id='txtMarcaVehiculoFinal' name='txtMarcaVehiculoFinal' class="boxes_form200px"  readonly/></td>
                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageVehiculoMarca2" width="59" height="45" border="0" id="ImageVehiculoMarca2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageVehiculoMarca2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnVehiculoMarca2();"/></td>
                                            </tr>
                                        </table> 
                           		</fieldset> 
                          </td>
                          <td>
                                  <fieldset>
                             	          <legend class="txt_titulos_bold">Tipo</legend>
	                                        <table>
	                                            <tr>
	                                                <td><div class="txt_titulos_bold">Inicial</div></td>
	                                                <td><input type='text' id='txtTipoVehiculoInicio' name='txtTipoVehiculoInicio' class="boxes_form200px"  readonly/></td>
	                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageVehiculoTipo1" width="59" height="45" border="0" id="ImageVehiculoTipo1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageVehiculoTipo1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnVehiculoTipo1();"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Final</div></td>
                                                <td><input type='text' id='txtTipoVehiculoFinal' name='txtTipoVehiculoFinal' class="boxes_form200px"  readonly/></td>
                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageVehiculoTipo2" width="59" height="45" border="0" id="ImageVehiculoTipo2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageVehiculoTipo2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnVehiculoTipo2();"/></td>
                                            </tr>
                                        </table> 
                           		</fieldset>
                          </td>
                      </tr>
                      <tr>
                            <table>
                                    <tr>
                                         <td>
		                                             <fieldset>
					                             	          <legend class="txt_titulos_bold">Modelo</legend>
						                                        <table>
						                                            <tr>
						                                                <td><div class="txt_titulos_bold">Inicial</div></td>
						                                                <td><input type='text' id='txtModeloVehiculoInicio' name='txtModeloVehiculoInicio' class="boxes_form200px"  readonly/></td>
						                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageVehiculoModelo1" width="59" height="45" border="0" id="ImageVehiculoModelo1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageVehiculoModelo1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnVehiculoModelo1();"/></td>
					                                            </tr>
					                                            <tr>
					                                                <td><div class="txt_titulos_bold">Final</div></td>
					                                                <td><input type='text' id='txtModeloVehiculoFinal' name='txtModeloVehiculoFinal' class="boxes_form200px"  readonly/></td>
					                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageVehiculoMedelo2" width="59" height="45" border="0" id="ImageVehiculoModelo2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageVehiculoModelo2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnVehiculoModelo2();"/></td>
					                                            </tr>
					                                        </table> 
		                           						</fieldset>
                                         </td>
                                         <td>
                                               <fieldset>
				                            	<legend class="txt_titulos_bold">Tipo Trasmicion</legend>
				                                      <table>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Manual</div></td>
				                                                    <td><input type="checkbox" id="chkBVehiculoManual" name="chkBVehiculoManual" value="Si"/></td>
				                                                </tr>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Hidraulica</div></td>
				                                                    <td><input type="checkbox" id="chkVehiculoHidraulica" name="chkVehiculoHidraulica" value="Si"/></td>
				                                                </tr>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Ambas</div></td>
				                                                    <td><input type="checkbox" id="chkVehiculoAmbas" name="chkVehiculoAmbas" value="Si"/></td>
				                                                </tr>
				                                       </table> 
				                           </fieldset>
                                         </td>
                                         <td>
                                              <fieldset>
				                            	<legend class="txt_titulos_bold">Tipo Direccion</legend>
				                                      <table>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Standar</div></td>
				                                                    <td><input type="checkbox" id="chkVehiculoDireccionStandar" name="chkVehiculoDireccionStandar" value="Si"/></td>
				                                                </tr>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Automatica</div></td>
				                                                    <td><input type="checkbox" id="chkVehiculoDireccionAutomatica" name="chkVehiculoDireccionAutomatica" value="Si"/></td>
				                                                </tr>
				                                                <tr>
				                                                    <td><div class="txt_titulos_bold">Ambas</div></td>
				                                                    <td><input type="checkbox" id="chkVehiculoDireccionAmbas" name="chkVehiculoDireccionAmbas" value="Si"/></td>
				                                                </tr>
				                                       </table> 
				                           </fieldset>
                                         </td>
                                    </tr>
                            </table>
                      </tr>
                </table>
                </div>
        </div>
        <div id="tabs-4">
        			<br>
        			<div id="CamposRep4"></div>
        			<div id="Campos4">
                     <table>
                            <tr>
                                 <td>
                                      <fieldset>
		                             	          <legend class="txt_titulos_bold">Autor</legend>
			                                        <table>
			                                            <tr>
			                                                <td><div class="txt_titulos_bold">Inicial</div></td>
			                                                <td><input type='text' id='txtAutorAcervoInicio' name='txtAutorAcervoInicio' class="boxes_form400px"  readonly/></td>
			                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageAcervoAutor1" width="59" height="45" border="0" id="ImageAcervoAutor1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageAcervoAutor1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnAcervoTipo1();"/></td>
		                                            </tr>
		                                            <tr>
		                                                <td><div class="txt_titulos_bold">Final</div></td>
		                                                <td><input type='text' id='txtAutorAcervoFinal' name='txtAutorAcervoFinal' class="boxes_form400px"  readonly/></td>
		                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageAcervoAutor2" width="59" height="45" border="0" id="ImageAcervoAutor2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageAcervoAutor2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnAcervoTipo2();"/></td>
			                                            </tr>
			                                        </table> 
                           						</fieldset>
                                 </td>
                            </tr>
                            <tr>
                                 <td>
                                      <fieldset>
					                             	          <legend class="txt_titulos_bold">Titulo</legend>
						                                        <table>
						                                            <tr>
						                                                <td><div class="txt_titulos_bold">Inicial</div></td>
						                                                <td><input type='text' id='txtTituloAcervoInicio' name='txtTituloAcervoInicio' class="boxes_form400px"  readonly/></td>
						                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageAcervoTitulo1" width="59" height="45" border="0" id="ImageAcervoTitulo1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageAcervoTitulo1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnAcervoTitulo1();"/></td>
					                                            </tr>
					                                            <tr>
					                                                <td><div class="txt_titulos_bold">Final</div></td>
					                                                <td><input type='text' id='txtTituloAcervoFinal' name='txtTituloAcervoFinal' class="boxes_form400px"  readonly/></td>
					                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageAcervoTitulo2" width="59" height="45" border="0" id="ImageAcervoTitulo2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageAcervoTitulo2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnAcervoTitulo2();"/></td>
					                                            </tr>
					                                        </table> 
		                           						</fieldset>
                                 </td>
                            </tr>
                            <tr>
                                 <td>
                                      <fieldset>
					                             	          <legend class="txt_titulos_bold">Ubicacion</legend>
						                                        <table>
						                                            <tr>
						                                                <td><div class="txt_titulos_bold">Inicial</div></td>
						                                                <td><input type='text' id='txtUbicacionAcervoInicio' name='txtUbicacionAcervoInicio' class="boxes_form400px"  readonly /></td>
						                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageE" width="59" height="45" border="0" id="ImageE" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageE','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnAcervoUbicacion1();"/></td>
					                                            </tr>
					                                            <tr>
					                                                <td><div class="txt_titulos_bold">Final</div></td>
					                                                <td><input type='text' id='txtUbicacionAcervoFinal' name='txtUbicacionAcervoFinal' class="boxes_form400px"  readonly/></td>
					                                               <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageF" width="59" height="45" border="0" id="ImageF" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageF','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnAcervoUbicacion2();"/></td>
					                                            </tr>
					                                        </table> 
		                           						</fieldset>
                                 </td>
                            </tr>
                     </table>
                     </div>
        </div>
    </div>
    <script>
          $(function() {
                          $("#tabs").tabs();
                          $("#txtFechaInicial").datepicker();
                          $("#txtFechaFinal").datepicker();
                       });
    </script>    
</div>
<div id="apDiv5"></div>
<div id="apDiv6"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div id="apDiv8"><img src="../../interfaz_modulos/botones/ejecutar.jpg" name="Image4" width="120" height="45" border="0" id="Image4" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/ejecutar_over.jpg',1)" style="cursor:pointer" onclick="Generar_Reporte();"/></div>
<p>&nbsp;</p>
</div>
  <div id="Empleado1" title="Empleado">
        <table>
            <tr>
                <td><input type="text" name="txtPatronEmpleado1" id="txtPatronEmpleado1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBEmpleado1" width="120" height="45" border="0" id="ImageBEmpleado1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBEmpleado1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_empelado1();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkClaveEmpleado1" id="chkClaveEmpleado1" value="Clave"/></div></td>
                    <td><div class="txt_titulos_bold">Descripci&oacute;n:<input type="checkbox" name="chkDescripcionEmpleado1" id="chkDescripcionEmpleado1" value="Descripcion"/></div></td>
                </tr>
            </table> 
           <div id="DivLoadEmpleado1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaEmpleado1"></div>
            
     </div>
    <div id="Empleado2" title="Empleado">
        <table>
            <tr>
                <td><input type="text" name="txtPatronEmpleado2" id="txtPatronEmpleado2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBEmpleado2" width="120" height="45" border="0" id="ImageBEmpleado2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBEmpleado2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_empelado2();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkClaveEmpleado2" id="chkClaveEmpleado2" value="Clave"/></div></td>
                    <td><div class="txt_titulos_bold">Descripci&oacute;n:<input type="checkbox" name="chkDescripcionEmpleado2" id="chkDescripcionEmpleado2" value="Descripcion"/></div></td>
                </tr>
            </table> 
            <div id="DivLoadEmpleado2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaEmpleado2"></div>
     </div>
     <div id="Area1" title="Area">
        <table>
            <tr>
                <td><input type="text" name="txtPatronArea1" id="txtPatronArea1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBArea1" width="120" height="45" border="0" id="ImageBArea1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBArea1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_area1();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkClaveArea1" id="chkClaveArea1" value="Clave"/></div></td>
                    <td><div class="txt_titulos_bold">Descripci&oacute;n:<input type="checkbox" name="chkDescripcionArea2" id="chkDescripcionArea2" value="Descripcion"/></div></td>
                </tr>
            </table> 
            <div id="DivLoadArea1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaArea1"></div>
     </div>
     <div id="Area2" title="Area">
        <table>
            <tr>
                <td><input type="text" name="txtPatronArea2" id="txtPatronArea2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBArea2" width="120" height="45" border="0" id="ImageBArea2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBArea2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_area2();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkClaveArea2" id="chkClaveArea2" value="Clave"/></div></td>
                    <td><div class="txt_titulos_bold">Descripci&oacute;n:<input type="checkbox" name="chkDescripcionArea2" id="chkDescripcionArea2" value="Descripcion"/></div></td>
                </tr>
            </table> 
            <div id="DivLoadArea2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaArea2"></div>
     </div>
     <div id="Inventario1" title="Inventario">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInventario1" id="txtPatronInventario1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInventario1" width="120" height="45" border="0" id="ImageBInventario1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInventario1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_inventario1();"/></td>
            </tr>
        </table>
            
            <div id="DivLoadInventario1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInventario1"></div>
     </div>
     <div id="Inventario2" title="Inventario">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInventario2" id="txtPatronInventario2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInvetario2" width="120" height="45" border="0" id="ImageBInvetario2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInvetario2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_inventario2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInventario2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInventario2"></div>
     </div>
     <div id="TipoMovimiento1" title="Tipo Movimiento">
        <table>
            <tr>
                <td><input type="text" name="txtPatronTipoMovimiento1" id="txtPatronTipoMovimiento1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTipoMoivimiento1" width="120" height="45" border="0" id="ImageBTipoMoivimiento1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTipoMoivimiento1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_tmovimiento1();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkClaveTipoMovimiento1" id="chkClaveTipoMovimiento1" value="Clave"/></div></td>
                    <td><div class="txt_titulos_bold">Descripci&oacute;n:<input type="checkbox" name="chkDescripcionTipoMovimiento1" id="chkDescripcionTipoMovimiento1" value="Descripcion"/></div></td>
                </tr>
            </table> 
            <div id="DivLoadTipoMovimiento1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaTipoMovimiento1"></div>
     </div>
     <div id="TipoMovimiento2" title="Tipo Movimiento">
        <table>
            <tr>
                <td><input type="text" name="txtPatronTipoMovimiento2" id="txtPatronTipoMovimiento2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTipoMoivimiento2" width="120" height="45" border="0" id="ImageBTipoMoivimiento2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTipoMoivimiento2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_tmovimiento2();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkClaveTipoMovimiento2" id="chkClaveTipoMovimiento2" value="Clave"/></div></td>
                    <td><div class="txt_titulos_bold">Descripci&oacute;n:<input type="checkbox" name="chkDescripcionTipoMovimiento2" id="chkDescripcionTipoMovimiento2" value="Descripcion"/></div></td>
                </tr>
            </table> 
            <div id="DivLoadTipoMovimiento2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaTipoMovimiento2"></div>
     </div>
     <!--  Tap mueble -->
     <div id="MuebleMarca1" title="(Mueble) - Marca">
        <table>
            <tr>
                <td><input type="text" name="txtPatronMuebleMarca1" id="txtPatronMuebleMarca1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBMuebleMarca1" width="120" height="45" border="0" id="ImageBMuebleMarca1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBMuebleMarca1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_mueble_marca1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadBMuebleMarca1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaMuebleMarca1"></div>
     </div>
     <div id="MuebleMarca2" title="(Mueble) - Marca">
        <table>
            <tr>
                <td><input type="text" name="txtPatronMuebleMarca2" id="txtPatronMuebleMarca2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBMuebleMarca2" width="120" height="45" border="0" id="ImageBMuebleMarca2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBMuebleMarca2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_mueble_marca2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadBMuebleMarca2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaMuebleMarca2"></div>
     </div>
     <div id="MuebleModelo1" title="(Mueble) - Modelo">
        <table>
            <tr>
                <td><input type="text" name="txtPatronMuebleModelo1" id="txtPatronMuebleModelo1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBMuebleModelo1" width="120" height="45" border="0" id="ImageBMuebleModelo1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBMuebleModelo1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_mueble_modelo1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadBMuebleModelo1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaMuebleModelo1"></div>
     </div>
     <div id="MuebleModelo2" title="(Mueble) - Modelo">
        <table>
            <tr>
                <td><input type="text" name="txtPatronMuebleModelo2" id="txtPatronMuebleModelo2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBMuebleModelo2" width="120" height="45" border="0" id="ImageBMuebleModelo2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTB','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_mueble_modelo2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadBMuebleModelo2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaMuebleModelo2"></div>
     </div>
       <div id="MuebleTipo1" title="(Mueble) - Tipo">
        <table>
            <tr>
                <td><input type="text" name="txtPatronMuebleTipo1" id="txtPatronMuebleTipo1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBMuebleTipo1" width="120" height="45" border="0" id="ImageBMuebleTipo1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBMuebleTipo1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_mueble_tipo1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadMuebleTipo1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaMuebleTipo1"></div>
     </div>
     <div id="MuebleTipo2" title="(Mueble) - Tipo">
        <table>
            <tr>
                <td><input type="text" name="txtPatronMuebleTipo2" id="txtPatronMuebleTipo2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBMuebleTipo2" width="120" height="45" border="0" id="ImageBMuebleTipo2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBMuebleTipo2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_mueble_tipo2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadMuebleTipo2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaMuebleTipo2"></div>
     </div>
     <!-- End Tap mueble  -->
     <!--  Tap Informatico -->
     <div id="InformaticoBien1" title="(Informatico) - Bien">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoBien1" id="txtPatronInformaticoBien1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoBien1" width="120" height="45" border="0" id="ImageBInformaticoBien1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoBien1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_bien1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoBien1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoBien1"></div>
     </div>
     <div id="InformaticoBien2" title="(Informatico) - Bien">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoBien2" id="txtPatronInformaticoBien2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoBien2" width="120" height="45" border="0" id="ImageBInformaticoBien2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoBien2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_bien2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoBien2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoBien2"></div>
     </div>
      <div id="InformaticoMouse1" title="(Informatico) - Mouse">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoBien1" id="txtPatronInformaticoBien1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoMouse1" width="120" height="45" border="0" id="ImageBInformaticoMouse1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoMouse1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_mouse1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoMouse1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoMouse1"></div>
     </div>
     <div id="InformaticoMouse2" title="(Informatico) - Mouse">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoMouse2" id="txtPatronInformaticoMouse2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoMouse2" width="120" height="45" border="0" id="ImageBInformaticoMouse2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoMouse2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_mouse2()"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoMouse2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoMouse2"></div>
     </div>
       <div id="InformaticoTeclado1" title="(Informatico) - Teclado">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoTaclado1" id="txtPatronInformaticoTaclado1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoTeclado1" width="120" height="45" border="0" id="ImageBInformaticoTeclado1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoTeclado1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_teclado1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoTaclado1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoTeclado1"></div>
     </div>
     <div id="InformaticoTeclado2" title="(Informatico) - Teclado">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoTeclado2" id="txtPatronInformaticoTeclado2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoTeclado2" width="120" height="45" border="0" id="ImageBInformaticoTeclado2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoTeclado2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_teclado2()"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoTeclado2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoTeclado2"></div>
     </div>
         <div id="InformaticoProcesador1" title="(Informatico) - Procesador">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoProcesador1" id="txtPatronInformaticoProcesador1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoProcesador1" width="120" height="45" border="0" id="ImageBInformaticoProcesador1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoProcesador1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_procesador1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoProcesador1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoProcesador1"></div>
     </div>
     <div id="InformaticoProcesador2" title="(Informatico) - Procesador">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoProcesador2" id="txtPatronInformaticoProcesador2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoProcesador2" width="120" height="45" border="0" id="ImageBInformaticoProcesador2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoProcesador2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_procesador2()"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoProcesador2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoProcesador2"></div>
     </div>
     <div id="InformaticoMarca1" title="(Informatico) - Marca">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoMarca1" id="txtPatronInformaticoMarca1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoMarca1" width="120" height="45" border="0" id="ImageBInformaticoMarca1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoMarca1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_marca1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoMarca1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoMarca1"></div>
     </div>
     <div id="InformaticoMarca2" title="(Informatico) - Marca">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoMarca2" id="txtPatronInformaticoMarca2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoMarca2" width="120" height="45" border="0" id="ImageBInformaticoMarca2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoMarca2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_marca2()"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoMarca2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoMarca2"></div>
     </div>
     <div id="InformaticoRam1" title="(Informatico) - Ram">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoRam1" id="txtPatronInformaticoRam1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoRam1" width="120" height="45" border="0" id="ImageBInformaticoRam1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoRam1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_ram1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoRam1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoRam1"></div>
     </div>
     <div id="InformaticoRam2" title="(Informatico) - Ram">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoRam2" id="txtPatronInformaticoRam2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoRam2" width="120" height="45" border="0" id="ImageBInformaticoRam2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoRam2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_ram2()"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoRam2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoRam2"></div>
     </div>
      <div id="InformaticoDD1" title="(Informatico) - Disco Duro">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoDd1" id="txtPatronInformaticoDd1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoDD1" width="120" height="45" border="0" id="ImageBInformaticoDD1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoDD1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_dd1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoDd1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoDd1"></div>
     </div>
     <div id="InformaticoDD2" title="(Informatico) - Disco Duro">
        <table>
            <tr>
                <td><input type="text" name="txtPatronInformaticoDd2" id="txtPatronInformaticoDd2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBInformaticoDD2" width="120" height="45" border="0" id="ImageBInformaticoDD2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBInformaticoDD2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_informatico_dd2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadInformaticoDd2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaInformaticoDd2"></div>
     </div>
     <!--  End Tap Informatico -->
     <!-- Tap Vehiculo  -->
      <div id="VehiculoMarca1" title="(Vehiculo) - Marca">
        <table>
            <tr>
                <td><input type="text" name="txtPatronVehiculoMarca1" id="txtPatronVehiculoMaraca1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBVehiculoMarca1" width="120" height="45" border="0" id="ImageBVehiculoMarca1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBVehiculoMarca1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_vehiculo_marca1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadVehiculoMarca1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaVehiculoMarca1"></div>
     </div>
     <div id="VehiculoMarca2" title="(Vehiculo) - Marca">
        <table>
            <tr>
                <td><input type="text" name="txtPatronVehiculoMarca2" id="txtPatronVehiculoMaraca2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBVehiculoMarca2" width="120" height="45" border="0" id="ImageBVehiculoMarca2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBVehiculoMarca2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_vehiculo_marca2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadVehiculoMarca2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaVehiculoMarca2"></div>
     </div>
     <div id="VehiculoModelo1" title="(Vehiculo) - Modelo">
        <table>
            <tr>
                <td><input type="text" name="txtPatronVehiculoModelo1" id="txtPatronVehiculoModelo1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBVehiculoModelo1" width="120" height="45" border="0" id="ImageBVehiculoModelo1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBVehiculoModelo1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_vehiculo_modelo1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadVehiculoModelo1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaVehiculoModelo1"></div>
     </div>
     <div id="VehiculoModelo2" title="(Vehiculo) - Modelo">
        <table>
            <tr>
                <td><input type="text" name="txtPatronVehiculoModelo2" id="txtPatronVehiculoModelo2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBVehiculoModelo2" width="120" height="45" border="0" id="ImageBVehiculoModelo2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBVehiculoModelo2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_vehiculo_modelo2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadVehiculoModelo2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaVehiculoModelo2"></div>
     </div>
     <div id="VehiculoTipo1" title="(Vehiculo) - Tipo">
        <table>
            <tr>
                <td><input type="text" name="txtPatronVehiculoTipo1" id="txtPatronVehiculoTipo1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBVehiculoTipo1" width="120" height="45" border="0" id="ImageBVehiculoTipo1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBVehiculoTipo1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_vehiculo_tipo1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadVehiculoTipo1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaVehiculoTipo1"></div>
     </div>
     <div id="VehiculoTipo2" title="(Vehiculo) - Tipo">
        <table>
            <tr>
                <td><input type="text" name="txtPatronVehiculoTipo2" id="txtPatronVehiculoTipo2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBVehiculoTipo2" width="120" height="45" border="0" id="ImageBVehiculoTipo2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBVehiculoTipo2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_vehiculo_tipo2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadVehiculoTipo2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaVehiculoTipo2"></div>
     </div>
     <!-- End Tap Vehiculo  -->
     <!-- Tap Acervo  -->
       <div id="AcervoAutor1" title="(Acervo) - Autor">
        <table>
            <tr>
                <td><input type="text" name="txtPatronAcervoAutor1" id="txtPatronAcervoAutor1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBAcervoAutor1" width="120" height="45" border="0" id="ImageBAcervoAutor1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBAcervoAutor1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_acervo_autor1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadAcervoAutor1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaAcervoAutor1"></div>
     </div>
     <div id="AcervoAutor2" title="(Acervo) - Autor">
        <table>
            <tr>
                <td><input type="text" name="txtPatronAcervoAutor2" id="txtPatronAcervoAutor2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBAcervoAutor2" width="120" height="45" border="0" id="ImageBAcervoAutor2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBAcervoAutor2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_acervo_autor2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadAcervoAutor2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaAcervoAutor2"></div>
     </div>
      <div id="AcervoTitulo1" title="(Acervo) - Titulo">
        <table>
            <tr>
                <td><input type="text" name="txtPatronAcervoTitulo1" id="txtPatronAcervoTitulo1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBAcervoTitulo1" width="120" height="45" border="0" id="ImageBAcervoTitulo1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBAcervoTitulo1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_acervo_titulo1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadAcervoTitulo1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaAcervoTitulo1"></div>
     </div>
     <div id="AcervoTitulo2" title="(Acervo) - Titulo">
        <table>
            <tr>
                <td><input type="text" name="txtPatronAcervoTitulo2" id="txtPatronAcervoTitulo2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBAcervoTitulo2" width="120" height="45" border="0" id="ImageBAcervoTitulo2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBAcervoTitulo2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_acervo_titulo2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadAcervoTitulo2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaAcervoTitulo2"></div>
     </div>
     <div id="AcervoUbicacion1" title="(Acervo) - Ubicacion">
        <table>
            <tr>
                <td><input type="text" name="txtPatronAcervoUbicacion1" id="txtPatronAcervoUbicacion1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBAcervoUbicacion1" width="120" height="45" border="0" id="ImageBAcervoUbicacion1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBAcervoUbicacion1','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_acervo_ubicacion1();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadAcervoUbicacion1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaAcervoUbicacion1"></div>
     </div>
     <div id="AcervoUbicacion2" title="(Acervo) - Ubicacion">
        <table>
            <tr>
                <td><input type="text" name="txtPatronAcervoUbicacion2" id="txtPatronAcervoUbicacion2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBAcervoUbicacion2" width="120" height="45" border="0" id="ImageBAcervoUbicacion2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBAcervoUbicacion2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_acervo_ubicacion2();"/></td>
            </tr>
        </table>
             
            <div id="DivLoadAcervoUbicacion2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusquedaAcervoUbicacion2"></div>
     </div>
     <!-- End Tap Acervo  -->
</body>
</html>

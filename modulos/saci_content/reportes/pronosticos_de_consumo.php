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
 <script src="<?php echo $url; ?>/js/reporte_pronostico_consumo.js" type="text/javascript"></script>
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
function saver_Order2()
{
       document.frmOrderGrid2.submit();
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
	height:710px;
	z-index:10;
	background-color: #FFFFFF;
}
#apDiv5 {
	position:absolute;
	left:0px;
	top:720px;
	width:1000px;
	height:70px;
	z-index:11;
	background-color: #C0C2C7;
}
#apDiv6 {
	position:absolute;
	left:867px;
	top:735px;
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
	top:735px;
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
<div class="txt_titulo_secciones" id="apDiv11"> / Consumibles / Pronósticos de Consumo</div>
<div class="inicio" id="apDiv2"></div>
<div id="apDiv3"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
<div id="apDiv4">
    <br>
        <table>
            <tr>
                <td>
                     <fieldset>
                        <legend class="txt_titulos_bold">Cambs</legend>  
                        <table>
                            <tr>
                                <td><div class="txt_titulos_bold">Inicio:</div></td>
                                <td><input type='text' id='txtCambsInicio' name='txtCambsInicio' class="boxes_form100px"  readonly/></td>
                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageA" width="59" height="45" border="0" id="ImageA" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageA','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnCambs1();"/></td>
                                <td><input type='text' id='txtDesInicio' name='txtDesInicio' class="boxes_form400px"  readonly /></td>
                            </tr>
                            <tr>
                                <td><div class="txt_titulos_bold">Fin:</div></td>
                                <td><input type='text' id='txtCambsFinal' name='txtCambsFinal' class="boxes_form100px"  readonly/></td>
                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageB" width="59" height="45" border="0" id="ImageB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageB','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="OnCambs2();"/></td>
                                <td><input type='text' id='txtDesFin' name='txtDesFin' class="boxes_form400px"  readonly/></td>
                            </tr>
                        </table>
                        
                     </fieldset>   
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend class="txt_titulos_bold">Pron&oacute;stico</legend>  
                        <table>
                            <tr>
                                <td><div class="txt_titulos_bold">Mes:</div></td>
                                <td>
                                    <select data-placeholder="Mes" style="width:160px;" tabindex="1"  class='chzn-select' id="cboMes" name="cboMes">
                                            <option value=""></option>
                                            <option value="01">Enero</option>
                                            <option value="02">Febrero</option>
                                            <option value="03">Marzo</option>
                                            <option value="04">Abril</option>
                                            <option value="05">Mayo</option>
                                            <option value="06">Junio</option>
                                            <option value="07">Julio</option>
                                            <option value="08">Agosto</option>
                                            <option value="09">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                </td>
                            </tr>
                            <tr>
                                <td><div class="txt_titulos_bold">A&ntilde;o:</div></td>
                                <td>
                                    <select data-placeholder="A&ntilde;o" style="width:160px;" tabindex="1"  class='chzn-select' id="cboAnio" name="cboAnio">
                                            <option value=""></option>
                                            <option value="2000">2000</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                        </select>
                                </td>
                            </tr>
                        </table> 
                        
                     </fieldset> 
                </td>
            </tr>
            <tr>
                <td>  
                
                   <div id="DivGridAnios">
                      <fieldset>
                        <legend class="txt_titulos_bold">Base</legend>  
                               <table class="flexme1">
                                      <tbody>
                                              <tr>
                                                  <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;"><input type="text" id="txtAnioBase" name="txtAnioBase"  size="5"/></td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox01" name="chkBox01" value="01" />&nbsp;</td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox02" name="chkBox02" value="02" />&nbsp;</td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox03" name="chkBox03" value="03" />&nbsp;</td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox04" name="chkBox04" value="04" />&nbsp;</td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox05" name="chkBox05" value="05" />&nbsp;</td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox06" name="chkBox06" value="06" />&nbsp;</td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox07" name="chkBox07" value="07" />&nbsp;</td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox08" name="chkBox08" value="08" />&nbsp;</td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox09" name="chkBox09" value="09" />&nbsp;</td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox10" name="chkBox10" value="10" />&nbsp;</td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox11" name="chkBox11" value="11" />&nbsp;</td>
                                                   <td style="font-family: Arial, Helvetica, sans-serif;font-size: 11px;">&nbsp;<input type="checkbox" id="chkBox12" name="chkBox12" value="12" />&nbsp;</td>
                                              </tr>
                                          </tbody>
                                 </table>
                                        <script>$('.flexme1').flexigrid({
                                                                title: '',
                                                                colModel : [

                                                                                {display: 'A&ntilde;o', name : 'A&ntilde;o', width :100, sortable :false, align: 'center'},
                                                                                {display: 'Enero', name : 'Enero', width :80, sortable :false, align: 'center'},
                                                                                {display: 'Febrero', name : 'Febrero', width :80, sortable :false, align: 'center'},
                                                                                {display: 'Marzo', name : 'Marzo', width :80, sortable :false, align: 'center'},
                                                                                {display: 'Abril', name : 'Abril', width :80, sortable :false, align: 'center'},
                                                                                {display: 'Mayo', name : 'Mayo', width :80, sortable :false, align: 'center'},
                                                                                {display: 'Junio', name : 'Junio', width :80, sortable :false, align: 'center'},
                                                                                {display: 'Julio', name : 'Julio', width :80, sortable :false, align: 'center'},
                                                                                {display: 'Agosto', name : 'Agosto', width :80, sortable :false, align: 'center'},
                                                                                {display: 'Septiembre', name : 'Septiembre', width :80, sortable :false, align: 'center'},
                                                                                {display: 'Octubre', name : 'Octubre', width :100, sortable :false, align: 'center'},
                                                                                {display: 'Noviembre', name : 'Noviembre', width :80, sortable :false, align: 'center'},
                                                                                {display: 'Diciembre', name : 'Diciembre', width :80, sortable :false, align: 'center'}
                                                                              
                                                                            ],
                                                                buttons : [
                                                                                {name: '',onpress:saver_Order},
                                                                                {separator: true}
                                                                            ],
                                                                width: 940,
                                                                height: 250
                                                                }

                                                                );
                                                   </script>
                     </fieldset> 
                    </div>
                    
                </td>
            </tr>
            <tr>
                 <td>
                     <center><div id="DivReporte"></div></center>
                 </td>
            </tr>
            
        </table>  
        <script>  
            $(".chzn-select").chosen(); 
            $(".chzn-select-deselect").chosen({allow_single_deselect:true});
                                
     </script>
</div>
<div id="apDiv5"></div>
<div id="apDiv6"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div id="apDiv8"><img src="../../interfaz_modulos/botones/ejecutar.jpg" name="Image4" width="120" height="45" border="0" id="Image4" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/ejecutar_over.jpg',1)" onclick="generar_reprte();"/></div>
<p>&nbsp;</p>
</div>
     <div id="Cambs1" title="Cambs Inicio">
        <table>
            <tr>
                <td><input type="text" name="txtPatron1" id="txtPatron1" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTB" width="120" height="45" border="0" id="ImageBTB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTB','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="Buscarcambs1();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkClave1" id="chkClave1" value="Clave"/></div></td>
                    <td><div class="txt_titulos_bold">Descripci&oacute;n:<input type="checkbox" name="chkDescripcion1" id="chkDescripcion1" value="Descripcion"/></div></td>
                </tr>
            </table> 
           <div id="DivLoad1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusqueda1"></div>
     </div>
     <div id="Cambs2" title="Cambs Final">
        <table>
            <tr>
                <td><input type="text" name="txtPatron2" id="txtPatron2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTB" width="120" height="45" border="0" id="ImageBTB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTB','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="Buscarcambs2();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkClave2" id="chkClave2" value="Clave"/></div></td>
                    <td><div class="txt_titulos_bold">Descripci&oacute;n:<input type="checkbox" name="chkDescripcion1" id="chkDescripcion1" value="Descripcion"/></div></td>
                </tr>
            </table> 
            <div id="DivLoad2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div>
            <div id="GridBusqueda2"></div>
     </div>
</body>
</html>

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
 <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
 <!-- Smoke -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
<script src="<?php Echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
<link id="theme" rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/dark.css" type="text/css" media="screen" />
<!-- End Smoke -->
<!-- Validation -->
<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_validation/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_validation/css/template.css" type="text/css"/>
<script src="<?php echo $url; ?>/js/jq_validation/js/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $url; ?>/js/jq_validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>	
<!-- End Validation -->
<!-- Grid -->
<link rel="stylesheet" type="text/css" href="<?php Echo $url; ?>/js/flexigrid/css/flexigrid/flexigrid.css"/>
<script type="text/javascript" src="<?php Echo $url; ?>/js/flexigrid/flexigrid.js"></script>
<!-- End Grid -->
<!-- Grid 2-->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/jq_ui/css/smoothness/jquery-ui-1.9.1.custom.min.css" />
<script src="<?php Echo $url; ?>/js/jq_ui/js/jquery-ui-1.9.1.custom.min.js"></script> 
<link href="<?php Echo $url; ?>/js/jqgrid/css/ui.jqgrid.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $url; ?>/js/jqgrid/js/jquery.jqGrid.src.js" type="text/javascript"></script>
 <script src="<?php echo $url; ?>/js/jqgrid/src/i18n/grid.locale-es.js" type="text/javascript"></script>
 <!-- End Grid 2-->
 <script src="<?php echo $url; ?>/js/reporte_pedidos.js" type="text/javascript"></script>
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
	height:739px;
	z-index:10;
	background-color: #FFFFFF;
}
#apDiv5 {
	position:absolute;
	left:0px;
	top:730px;
	width:1000px;
	height:70px;
	z-index:11;
	background-color: #C0C2C7;
}
#apDiv6 {
	position:absolute;
	left:867px;
	top:741px;
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
	top:741px;
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
$().ready(function () {
    $("#BtnExportarPDF").click(function() {
        var v1= $("#txtPedidoInicial").val();
        var v2= $("#txtPedidoFinal").val();
        var v3= $("#txtFechaInicial").val();
        var v4=  $("#txtFechaFinal").val();
        window.open('pdf/reporte_pedidos_pdf.php?v1=' + v1 + '&v2=' + v2 + '&v3=' + v3 + '&v4=' + v4, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
    });
    
    $("#BtnExportarXLS").click(function() {
        var v1= $("#txtPedidoInicial").val();
        var v2= $("#txtPedidoFinal").val();
        var v3= $("#txtFechaInicial").val();
        var v4=  $("#txtFechaFinal").val();
        window.open('xls/reporte_pedidos_xls.php?v1=' + v1 + '&v2=' + v2 + '&v3=' + v3 + '&v4=' + v4, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
    });
});
</script>
</head>
<body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/ejecutar_over.jpg','../../interfaz_modulos/botones/fecha_over.jpg')">
    <div style="width:1022px; position: relative; margin-left: auto; margin-right: auto; top: -12px;">
<div class="modulos" id="apDiv1"></div>
<div class="txt_titulo_secciones" id="apDiv11"> / Pedidos / Pedidos</div>
<div class="inicio" id="apDiv2"></div>
<div id="apDiv3"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
<div id="apDiv4">
            <br>
    <center>
    <form  id='frmRepAltaFacturas' name='frmDesPedidos' method='post'>
        <table>
            <tr>
                <td valign="top">
                    <fieldset>
                        <legend class="txt_titulos_bold">Pedidos</legend>
                        <table>
                            <tr>
                                <td><div class="txt_titulos_bold">Pedido Inicial</div></td>
                                <td><input type='text' id='txtPedidoInicial' name='txtPedidoInicial' class="boxes_form100px" /></td>
                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageA" width="59" height="45" border="0" id="ImageA" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageA','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="onPedidoInicial();"/></td>
                            </tr>
                            <tr>
                                <td><div class="txt_titulos_bold">Pedido Final</div></td>
                                <td><input type='text' id='txtPedidoFinal' name='txtPedidoFinal' class="boxes_form100px"  /></td>
                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageB" width="59" height="45" border="0" id="ImageB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageB','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="onPedidoFinal();"/></td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td valign="top">
                    <fieldset>
                        <legend class="txt_titulos_bold">Fechas</legend>
                          <table>
                            <tr>
                                <td><div class="txt_titulos_bold">Fecha Inicial</div></td>
                                <td><input type='text' id='txtFechaInicial' name='txtFechaInicial' class="boxes_form100px" readonly/></td>
                            </tr>
                            <tr>
                                <td><div class="txt_titulos_bold">Fecha Final</div></td>
                                <td><input type='text' id='txtFechaFinal' name='txtFechaFinal' class="boxes_form100px" readonly/></td>
                            </tr>
                          </table>
                    </fieldset>
                </td>
                
                
            </tr>
        </table>
    </form>
    <br></br>
    <table id="TblPedido"></table>
    <div id="DivPaginador"></div> 
    <br></br>
    <div id="DivExportar" style="display:none">
        <table border="0" style="width: 900px;">
            <tr>
                <th><img id="BtnExportarPDF" src="../../interfaz_modulos/botones/exportar_pdf.jpg" name="ImagePdf" width="120" height="45" border="0" id="ImagePdf" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)" style='cursor:pointer'/></th>
                <td>&nbsp;</td>
                <th></th>
                <td>&nbsp;</td>
                <th><img id="BtnExportarXLS" src="../../interfaz_modulos/botones/exportar_excel.jpg" name="ImageDoc" width="120" height="45" border="0" id="ImageDoc" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)" style='cursor:pointer'/></th>
            </tr>
        </table>  
     </div>           
  </center>
    
</div>
<div id="apDiv5"></div>
<div id="apDiv6"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div id="apDiv8"><img src="../../interfaz_modulos/botones/ejecutar.jpg" name="Image4" width="120" height="45" border="0" id="Image4"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/ejecutar_over.jpg',1)" style="cursor:pointer" onclick="load_reporte();"/></div>
<p>&nbsp;</p>
<div id="dialog" title="Pedido Inicial">
        <table>
            <tr>
                <td><input type="text" name="txtPatron" id="txtPatron" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageC" width="120" height="45" border="0" id="ImageC" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageC','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_pedidoInicial();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">No. Folio:<input type="checkbox" name="chkFolio" id="chkFolio" value="Folio"/></div></td>
                    <td><div class="txt_titulos_bold">Licitaci&oacute;n:<input type="checkbox" name="chkLicitacion" id="chkLicitacion" value="Licitacion"/></div></td>
                    <td><div class="txt_titulos_bold">Requesici&oacute;n:<input type="checkbox" name="chkRequisicion" id="chkRequisicion" value="Requisicion"/></div></td>
                    
                </tr>
            </table>
             <center><div id="DivLoad1" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div></center>
            <div id="GridBusquedaIncio"></div>
           
    </div> 
    <div id="dialog2" title="Pedido Final">
        <table>
            <tr>
                <td><input type="text" name="txtPatron2" id="txtPatron2" class="boxes_form400px"/></td>
                <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageD" width="120" height="45" border="0" id="ImageD" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageD','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_pedidoFinal();"/></td>
            </tr>
        </table>
            <table>
                <tr>
                    <td><div class="txt_titulos_bold">No. Folio:<input type="checkbox" name="chkFolio2" id="chkFolio2" value="Folio"/></div></td>
                    <td><div class="txt_titulos_bold">Licitaci&oacute;n:<input type="checkbox" name="chkLicitacion2" id="chkLicitacion2" value="Licitacion"/></div></td>
                    <td><div class="txt_titulos_bold">Requesici&oacute;n:<input type="checkbox" name="chkRequisicion2" id="chkRequisicion2" value="Requisicion"/></div></td>
                    
                </tr>
            </table>
            <center><div id="DivLoad2" style="display:none"><img src="../../../interfaz/cargando.png"  border="0"/></div></center>
            <div id="GridBusquedaFinal"></div>
    </div>
</div>
</body>
</html>

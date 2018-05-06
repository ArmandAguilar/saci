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
<title>SACI : Catálogos</title>
<!-- Begin Libs  --> 
 <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
 <script src="<?php echo $url; ?>/js/cat_unidadadmin.js" type="text/javascript"></script>
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

    <style>
    /* force a height so the tabs don't jump as content height changes */
    #tabs .tabs-spacer { float: left; height: 360px; }
    .tabs-bottom .ui-tabs-nav { clear: left; padding: 0 .2em .2em .2em; }
    .tabs-bottom .ui-tabs-nav li { top: auto; bottom: 0; margin: 0 .2em 1px 0; border-bottom: auto; border-top: 0; }
    .tabs-bottom .ui-tabs-nav li.ui-tabs-active { margin-top: -1px; padding-top: 1px; }
    </style>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<div style="width:1005px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
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
	width:190px;
	height:50px;
	z-index:2;
}
</style>
<link href="../../../css/textos.css" rel="stylesheet" type="text/css" />
<link href="css/t_catalogos.css" rel="stylesheet" type="text/css" />
<link href="../../../css/boxes.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv3 {
	position:absolute;
	left:0px;
	top:60px;
	width:184px;
	height:53px;
	z-index:3;
}
#apDiv4 {
	position:absolute;
	left:0px;
	top:122px;
	width:127px;
	height:36px;
	z-index:4;
}
#apDiv5 {
	position:absolute;
	left:0px;
	top:184px;
	width:105px;
	height:30px;
	z-index:5;
}
#apDiv6 {
	position:absolute;
	left:0px;
	top:246px;
	width:94px;
	height:37px;
	z-index:6;
}
#apDiv7 {
	position:absolute;
	left:0px;
	top:308px;
	width:85px;
	height:31px;
	z-index:7;
}
#apDiv8 {
	position:absolute;
	left:0px;
	top:370px;
	width:104px;
	height:43px;
	z-index:8;
}
#apDiv9 {
	position:absolute;
	left:0px;
	top:432px;
	width:65px;
	height:26px;
	z-index:9;
}
#apDiv10 {
	position:absolute;
	left:866px;
	top:612px;
	width:108px;
	height:38px;
	z-index:100;
}
#apDiv11 {
	position:absolute;
	left:152px;
	top:22px;
	width:615px;
	height:24px;
	z-index:11;
}
#apDiv12 {
	position:absolute;
	left:850px;
	top:0px;
	width:132px;
	height:39px;
	z-index:12;
}
#apDiv13 {
	position:absolute;
	left:0px;
	top:680px;
	width:165px;
	height:30px;
	z-index:13;
}
#apDiv14 {
	position:absolute;
	left:0px;
	top:742px;
	width:139px;
	height:47px;
	z-index:14;
}
#apDiv15 {
	position:absolute;
	left:263px;
	top:74px;
	width:292px;
	height:168px;
	z-index:15;
}
#apDiv16 {
	position:absolute;
	left:897px;
	top:110px;
	width:44px;
	height:26px;
	z-index:16;
}
#apDiv17 {
	position:absolute;
	left:0px;
	top:59px;
	width:1000px;
	height:537px;
	z-index:13;
	background-color: #FFFFFF;
}
#apDiv18 {
	position:absolute;
	left:0px;
	top:598px;
	width:1000px;
	height:70px;
	z-index:14;
	background-color: #C0C2C7;
}
#apDiv19 {
	position:absolute;
	left:503px;
	top:612px;
	width:71px;
	height:34px;
	z-index:101;
}
#apDiv20 {
	position:absolute;
	left:382px;
	top:612px;
	width:67px;
	height:23px;
	z-index:102;
}
#apDiv21 {
	position:absolute;
	left:624px;
	top:612px;
	width:94px;
	height:30px;
	z-index:103;
}
#apDiv22 {
	position:absolute;
	left:745px;
	top:612px;
	width:88px;
	height:33px;
	z-index:104;
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

<body onload="load_frm();MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/modificar_over.jpg','../../interfaz_modulos/botones/agregar_over.jpg','../../interfaz_modulos/botones/consultar_over.jpg')">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div class="txt_titulo_secciones" id="apDiv11"> / Unidad Administrativa</div>
<div id="apDiv12"><a href="../../menu_catalogos.php" target="_self" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image4" width="150" height="50" border="0" id="Image4" /></a></div>
<div id="apDiv17"><div id="DivTrabajo"></div></div>
<div id="apDiv18"></div>
<div id="apDiv10"><a href="../../menu_catalogos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div id="apDiv19"><img src="../../interfaz_modulos/botones/modificar.jpg" alt="" name="Image2" width="120" height="45" border="0" id="Image2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','../../interfaz_modulos/botones/modificar_over.jpg',1)"  style="cursor:pointer" onclick="frm_buscador_ua();"/></div>
<div id="apDiv20"><img src="../../interfaz_modulos/botones/agregar.jpg" alt="" name="Image1" width="120" height="45" border="0" id="Image1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','../../interfaz_modulos/botones/agregar_over.jpg',1)" style="cursor:pointer" onclick="load_frm();"/></a></div>
<div id="apDiv21"><img src="../../interfaz_modulos/botones/borrar.jpg" name="Image5" width="120" height="45" border="0" id="Image5" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/borrar_over.jpg',0)" style="cursor:pointer" onclick="frm_buscador_borrar();"/></div>
<div id="apDiv22"><img src="../../interfaz_modulos/botones/consultar.jpg" name="Image6" width="120" height="45" border="0" id="Image6" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../../interfaz_modulos/botones/consultar_over.jpg',1)" style="cursor:pointer" onclick="frm_buscador_consultar();"/></div>
</body>
</html>

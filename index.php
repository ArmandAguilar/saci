<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("sis.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SACI : Inicio de sesión</title>
<meta name="description" content="SACI. Sistema de Almacen y Control de Inventario version 1.0"/>
<meta name="author" content="www.be-ime.com, email contacto@be-ime.com"/>
<meta name="copyright" content="Todos los Derechos Reservados © 2012, Secretaría de Educación del Gobierno del Distrito Federal"/>
<link rel="shortcut ico" href="interfaz/favicon.ico"/>
 <!-- Begin Libs  --> 
 <script src="js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
 <script src="js/login.js" type="text/javascript"></script>
  <!-- Smoke -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
<script src="<?php Echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
<link id="theme" rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/dark.css" type="text/css" media="screen" />
<!-- End Smoke -->
 <!--  End Libs -->

<script language="Javascript">
document.oncontextmenu = function(){return false}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
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
<style type="text/css">
body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(interfaz/background.jpg);
	background-repeat: repeat;
}
#apDiv1 {
	position:absolute;
	left:135px;
	top:45px;
	width:204px;
	height:148px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:631px;
	top:393px;
	width:55px;
	height:26px;
	z-index:2;
}
#apDiv3 {
	position:absolute;
	left:510px;
	top:393px;
	width:50px;
	height:18px;
	z-index:3;
}
#apDiv4 {
	position:absolute;
	left:331px;
	top:551px;
	width:0px;
	height:1px;
	z-index:4;
}
#apDiv5 {
	position:absolute;
	left:119px;
	top:418px;
	width:497px;
	height:18px;
	z-index:4;
	font-size: 10px;
	color: #999;
	text-align: right;
}
#apDiv6 {
	position:absolute;
	left:351px;
	top:390px;
	width:244px;
	height:18px;
	z-index:4;
}
</style>
<link href="css/textos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv7 {
	position:absolute;
	left:363px;
	top:242px;
	width:367px;
	height:33px;
	z-index:5;
}
#apDiv8 {
	position:absolute;
	left:363px;
	top:303px;
	width:348px;
	height:18px;
	z-index:6;
}
</style>
<link href="css/boxes.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv9 {
	position: absolute;
	left: 133px;
	top: 644px;
	width: 740px;
	height: 21px;
	z-index: 7;
	text-align: center;
	color:#CCC;
}
</style>
</head>

<body onload="MM_preloadImages('interfaz/aceptar_over.png')">
<div style="width:1024px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
<form id="login_form" name="login_form" id="login_form" method="post" action="">
<div id="apDiv1">
  <div id="apDiv5">SACI. Versión 2.0</div>
<img src="interfaz/login.png" width="735" height="517" border="0" /></div>
<div id="apDiv2"><img src="interfaz/aceptar.png" name="Image4" width="119" height="49" border="0" id="Image4" onmouseover="MM_swapImage('Image4','','interfaz/aceptar_over.png',1)" onmouseout="MM_swapImgRestore()" style="cursor:pointer" onclick="login();"/></a></div>
<div class="txt_contenido" id="apDiv6">Para iniciar Sesión en el Sistema ingrese su nombre de usuario y contraseña.</div>
<div id="apDiv7">
  
    <label>
      <input name="usuario" type="text" class="boxes_login" id="usuario" />
    </label>
  
</div>
<div id="apDiv8">
    <label>
      <input name="password" type="password" class="boxes_login" id="password" />
    </label>
</div>
<span id="msgbox" style="display:none"></span>
<div class="txt_contenido_color2" id="apDiv9">SACI | SISTEMA DE ADMINISTRACIÓN Y CONTROL DE INVENTARIO © MÉXICO 2013 - 2018</div>
</form>
</body>
</html>

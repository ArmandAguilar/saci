<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("sis.php");
include("$path/class/poolConnection.php");
include("$path/class/Logos.php");

$objCabecera = new Logos();
$img=$objCabecera->header();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEGDF: SACI</title>
<link rel="shortcut ico" href="interfaz/favicon.ico">
<script language="Javascript">
document.oncontextmenu = function(){return false}
</script>
<style type="text/css">
body {
	background-color: #333E44;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<div style="width:1024px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
<link rel="stylesheet" href="css/mnu.css" />
<style type="text/css">
body {
	background-image: url(interfaz/bar.jpg);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
#apDiv1 {
	position:absolute;
	left:604px;
	top:86px;
	width:391px;
	height:45px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:0px;
	top:0px;
	width:78px;
	height:40px;
	z-index:1;
}
#apDiv3 {
	position:absolute;
	left:383px;
	top:0px;
	width:210px;
	height:0px;
	z-index:2;
}
#apDiv4 {
	position:absolute;
	left:7px;
	top:78px;
	width:83px;
	height:32px;
	z-index:3;
}
#apDiv5 {
	position:absolute;
	left:803px;
	top:22px;
	width:85px;
	height:24px;
	z-index:4;
}
#apDiv6 {
	position:absolute;
	left:894px;
	top:22px;
	width:28px;
	height:11px;
	z-index:5;
}
#apDiv7 {
	position:absolute;
	left:879px;
	top:88px;
	width:43px;
	height:17px;
	z-index:6;
}
#apDiv8 {
	position:absolute;
	left:757px;
	top:88px;
	width:53px;
	height:20px;
	z-index:7;
}
#apDiv9 {
	position:absolute;
	left:635px;
	top:88px;
	width:53px;
	height:11px;
	z-index:8;
}
#apDiv10 {
	position:absolute;
	left:513px;
	top:88px;
	width:49px;
	height:19px;
	z-index:9;
}
#apDiv11 {
	position:absolute;
	left:391px;
	top:88px;
	width:75px;
	height:17px;
	z-index:10;
}
</style>
<script src="SpryAssets/SpryEffects.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_effectAppearFade(targetElement, duration, from, to, toggle)
{
	Spry.Effect.DoFade(targetElement, {duration: duration, from: from, to: to, toggle: toggle});
}
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
<?php 
      if(!empty($_SESSION[IdActivo]))
      {
          
      }
      else
      {
          echo "<script>
                      top.location.href='index.php';
                      window.location.href='index.php';
                </script>";
      }
      
    ?>
</head>

<body onload="MM_preloadImages('interfaz/reportes_over.png','interfaz/procesos_over.png','interfaz/catalogos_over.png','interfaz/sistema_over.png','interfaz/inicio_over.png')">
<div id="apDiv2"><a href="sai_iniciar.php" target="_top"><img src="logos/<?php echo $img; ?>" width="190" height="80" border="0" onload="MM_effectAppearFade(this, 3500, 0, 100, false)" /></a></div>
<div id="apDiv3"></div>
<div id="apDiv5"><a href="modulos/menu_ayuda.html" target="mainFrame"><img src="interfaz/ayuda.png" width="91" height="33" border="0" onmouseover="MM_effectAppearFade(this, 200, 100, 60, false)" onmouseout="MM_effectAppearFade(this, 200, 60, 100, false)" /></a></div>
<div id="apDiv6"><a href="logout.php" target="_top"><img src="interfaz/finalizar.png" alt="" width="104" height="33" border="0" onmouseover="MM_effectAppearFade(this, 200, 100, 60, false)" onmouseout="MM_effectAppearFade(this, 200, 60, 100, false)" /></a></div>
<div id="apDiv7"><a href="modulos/menu_reportes.php" target="mainFrame" onmouseover="MM_swapImage('Image6','','interfaz/reportes_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="interfaz/reportes.png" name="Image6" width="121" height="40" border="0" id="Image6" /></a></div>
<div id="apDiv8"><a href="modulos/menu_procesos.php" target="mainFrame" onmouseover="MM_swapImage('Image7','','interfaz/procesos_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="interfaz/procesos.png" name="Image7" width="121" height="40" border="0" id="Image7" /></a></div>
<div id="apDiv9"><a href="modulos/menu_catalogos.php" target="mainFrame" onmouseover="MM_swapImage('Image8','','interfaz/catalogos_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="interfaz/catalogos.png" name="Image8" width="121" height="40" border="0" id="Image8" /></a></div>
<div id="apDiv10"><a href="modulos/menu_sistema.php" target="mainFrame" onmouseover="MM_swapImage('Image9','','interfaz/sistema_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="interfaz/sistema.png" name="Image9" width="121" height="40" border="0" id="Image9" /></a></div>
<div id="apDiv11"><a href="sai_iniciar.php" target="_top" onmouseover="MM_swapImage('Image10','','interfaz/inicio_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="interfaz/inicio.png" name="Image10" width="121" height="40" border="0" id="Image10" /></a></div>
</body>
</html>

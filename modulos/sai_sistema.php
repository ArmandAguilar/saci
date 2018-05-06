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
    <?php 
      if(!empty($_SESSION[IdActivo]))
      {
          
      }
      else
      {
          echo "<script>
                      top.location.href='http://$url/index.php';
                      window.location.href='http://$url/index.php';
                </script>";
      }
      
    ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SACI : Reportes</title>
<div style="width:1022px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
<style type="text/css">
body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
}
body {
	background-image: url(../interfaz/background.jpg);
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
	width:189px;
	height:49px;
	z-index:2;
}
</style>
<link href="css/t_sistema.css" rel="stylesheet" type="text/css" />
<link href="../css/textos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv3 {
	position:absolute;
	left:0px;
	top:65px;
	width:257px;
	height:49px;
	z-index:3;
}
#apDiv4 {
	position:absolute;
	left:0px;
	top:127px;
	width:80px;
	height:30px;
	z-index:4;
}
</style>
<script type="text/javascript">
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
</head>

<body onload="MM_preloadImages('interfaz_modulos/sistema/usuarios_over.png','interfaz_modulos/sistema/permisos_over.png')">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div id="apDiv3"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','interfaz_modulos/sistema/usuarios_over.png',1)"><img src="interfaz_modulos/sistema/usuarios.png" name="Image1" width="335" height="60" border="0" id="Image1" /></a></div>
<div id="apDiv4"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','interfaz_modulos/sistema/permisos_over.png',1)"><img src="interfaz_modulos/sistema/permisos.png" name="Image2" width="335" height="60" border="0" id="Image2" /></a></div>
</body>
</html>

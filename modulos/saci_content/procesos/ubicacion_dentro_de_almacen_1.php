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
<div style="width:1006px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">

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
	height:503px;
	z-index:10;
	background-color: #FFFFFF;
}
#apDiv6 {
	position:absolute;
	left:0px;
	top:564px;
	width:1000px;
	height:70px;
	z-index:11;
	background-color: #C0C2C7;
}
#apDiv7 {
	position:absolute;
	left:867px;
	top:576px;
	width:48px;
	height:38px;
	z-index:12;
}
#apDiv8 {
	position:absolute;
	left:383px;
	top:512px;
	width:54px;
	height:20px;
	z-index:13;
}
#apDiv9 {
	position:absolute;
	left:262px;
	top:512px;
	width:54px;
	height:25px;
	z-index:14;
}
#apDiv10 {
	position:absolute;
	left:504px;
	top:512px;
	width:81px;
	height:28px;
	z-index:15;
}
#apDiv12 {
	position:absolute;
	left:746px;
	top:576px;
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

<body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/consultar_over.jpg')">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div class="txt_titulo_secciones" id="apDiv11"> / Ubicación dentro de Almacén</div>
<div id="apDiv4"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
<div id="apDiv5"></div>
<div id="apDiv6"></div>
<div id="apDiv7"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div id="apDiv12"><a href="ubicacion_dentro_de_almacen_2.php" target="_self" onmouseover="MM_swapImage('Image9','','../../interfaz_modulos/botones/consultar_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/consultar.jpg" name="Image9" width="120" height="45" border="0" id="Image9" /></a></div>
</body>
</html>

<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("../sis.php");
include("$path/class/poolConnection.php");
include("$path/class/Menu.php");

$objMenuCatalogos = new Menus();
$MenuCat=$objMenuCatalogos->menu_reportes($_SESSION[IdActivo]);

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
<div style="width:1006px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
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
	width:209px;
	height:51px;
	z-index:2;
}
</style>
<link href="../css/textos.css" rel="stylesheet" type="text/css" />
<link href="css/t_reportes.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv3 {
	position:absolute;
	left:0px;
	top:59px;
	width:1000px;
	height:900px;
	z-index:0;
	background-color: #FFFFFF;
}
#apDiv6 {
	position:absolute;
	left:53px;
	top:82px;
	width:893px;
	height:25px;
	z-index:5;
}
#apDiv4 {
	position:absolute;
	left:101px;
	top:150px;
	width:129px;
	height:35px;
	z-index:6;
}
#apDiv5 {
	position:absolute;
	left:101px;
	top:222px;
	width:115px;
	height:41px;
	z-index:7;
}
#apDiv7 {
	position:absolute;
	left:101px;
	top:284px;
	width:116px;
	height:32px;
	z-index:8;
}
#apDiv8 {
	position:absolute;
	left:101px;
	top:290px;
	width:149px;
	height:61px;
	z-index:9;
}
#apDiv9 {
	position:absolute;
	left:101px;
	top:359px;
	width:162px;
	height:29px;
	z-index:10;
}
#apDiv10 {
	position:absolute;
	left:101px;
	top:491px;
	width:117px;
	height:45px;
	z-index:11;
}
#apDiv11 {
	position:absolute;
	left:101px;
	top:421px;
	width:85px;
	height:30px;
	z-index:12;
}
#apDiv12 {
	position:absolute;
	left:101px;
	top:483px;
	width:129px;
	height:55px;
	z-index:13;
}
#apDiv13 {
	position:absolute;
	left:101px;
	top:555px;
	width:162px;
	height:41px;
	z-index:14;
}
#apDiv14 {
	position:absolute;
	left:101px;
	top:623px;
	width:97px;
	height:34px;
	z-index:15;
}
#apDiv15 {
	position:absolute;
	left:101px;
	top:686px;
	width:108px;
	height:36px;
	z-index:16;
}
#apDiv16 {
	position:absolute;
	left:101px;
	top:750px;
	width:113px;
	height:29px;
	z-index:17;
}
#apDiv17 {
	position:absolute;
	left:101px;
	top:875px;
	width:134px;
	height:31px;
	z-index:18;
}
#apDiv18 {
	position:absolute;
	left:101px;
	top:813px;
	width:83px;
	height:43px;
	z-index:19;
}
#apDiv19 {
	position:absolute;
	left:101px;
	top:1060px;
	width:126px;
	height:31px;
	z-index:20;
}
#apDiv20 {
	position:absolute;
	left:101px;
	top:1131px;
	width:160px;
	height:37px;
	z-index:21;
}
#apDiv21 {
	position:absolute;
	left:564px;
	top:150px;
	width:118px;
	height:24px;
	z-index:22;
}
#apDiv22 {
	position:absolute;
	left:564px;
	top:222px;
	width:122px;
	height:31px;
	z-index:23;
}
#apDiv23 {
	position:absolute;
	left:564px;
	top:284px;
	width:206px;
	height:52px;
	z-index:24;
}
#apDiv24 {
	position:absolute;
	left:564px;
	top:346px;
	width:117px;
	height:35px;
	z-index:25;
}
#apDiv25 {
	position:absolute;
	left:564px;
	top:408px;
	width:127px;
	height:37px;
	z-index:26;
}
#apDiv25a {
	position:absolute;
	left:564px;
	top:470px;
	width:127px;
	height:37px;
	z-index:26;
}
#apDiv25b {
	position:absolute;
	left:564px;
	top:533px;
	width:127px;
	height:37px;
	z-index:26;
}
#apDiv26 {
	position:absolute;
	left:564px;
	top:599px;
	width:180px;
	height:48px;
	z-index:27;
}
#apDiv27 {
	position:absolute;
	left:564px;
	top:665px;
	width:178px;
	height:23px;
	z-index:28;
}
#apDiv28 {
	position:absolute;
	left:564px;
	top:813px;
	width:107px;
	height:43px;
	z-index:29;
}
#apDiv29 {
	position:absolute;
	left:564px;
	top:728px;
	width:94px;
	height:30px;
	z-index:30;
}
#apDiv30 {
	position:absolute;
	left:564px;
	top:790px;
	width:105px;
	height:36px;
	z-index:31;
}
#apDiv31 {
	position:absolute;
	left:564px;
	top:852px;
	width:105px;
	height:47px;
	z-index:32;
}
#apDiv32 {
	position:absolute;
	left:564px;
	top:861px;
	width:72px;
	height:39px;
	z-index:33;
}
#apDiv33 {
	position:absolute;
	left:564px;
	top:923px;
	width:134px;
	height:47px;
	z-index:34;
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

<body onload="MM_preloadImages('interfaz_modulos/reportes/catalogos_over.png','interfaz_modulos/reportes/bitacora_s_over.png','interfaz_modulos/reportes/alta_fac_over.png','interfaz_modulos/reportes/historico_ep_over.png','interfaz_modulos/reportes/desglose_ped_over.png','interfaz_modulos/reportes/pedidos_over.png','interfaz_modulos/reportes/reporte_en_over.png','interfaz_modulos/reportes/reporte_sal_over.png','interfaz_modulos/reportes/movimientos_kar_over.png','interfaz_modulos/reportes/inventario_con_over.png','interfaz_modulos/reportes/historico_con_over.png','interfaz_modulos/reportes/existencias_sc_over.png','interfaz_modulos/reportes/reporte_dai_over.png','interfaz_modulos/reportes/reporte_pe_over.png','interfaz_modulos/reportes/manejo_cap_over.png','interfaz_modulos/reportes/pronosticos_con_over.png','interfaz_modulos/reportes/generacion_et_over.png','interfaz_modulos/reportes/noticias_mov_over.png','interfaz_modulos/reportes/resguardos_over.png','interfaz_modulos/reportes/reporte_es_over.png','interfaz_modulos/reportes/existencias_over.png','interfaz_modulos/reportes/historico_mov_over.png','interfaz_modulos/reportes/bienes_a_over.png','interfaz_modulos/reportes/generacion_nc_over.png')">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div id="apDiv3"></div>
<div class="txt_titulos_bold_menu" id="apDiv6">Funciones.<br />
  <hr size="1" noshade="noshade" />
</div>
<?php echo "$MenuCat"; ?>
</body>
</html>

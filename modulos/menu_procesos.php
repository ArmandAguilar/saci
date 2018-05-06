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
$MenuCat=$objMenuCatalogos->menu_procesos($_SESSION[IdActivo]);

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
<title>SACI : Procesos</title>
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
	width:232px;
	height:51px;
	z-index:2;
}
</style>
<link href="css/t_procesos.css" rel="stylesheet" type="text/css" />
<link href="../css/textos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv3 {
	position:absolute;
	left:519px;
	top:2px;
	width:457px;
	height:45px;
	z-index:1;
}
#apDiv4 {
	position:absolute;
	left:0px;
	top:59px;
	width:1000px;
	height:700px;
	z-index:3;
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
#apDiv5 {
	position:absolute;
	left:101px;
	top:221px;
	width:188px;
	height:55px;
	z-index:6;
}
#apDiv7 {
	position:absolute;
	left:101px;
	top:283px;
	width:162px;
	height:36px;
	z-index:7;
}
#apDiv8 {
	position:absolute;
	left:101px;
	top:150px;
	width:192px;
	height:29px;
	z-index:8;
}
#apDiv9 {
	position:absolute;
	left:101px;
	top:220px;
	width:212px;
	height:45px;
	z-index:9;
}
#apDiv10 {
	position:absolute;
	left:101px;
	top:283px;
	width:118px;
	height:50px;
	z-index:10;
}
#apDiv11 {
	position:absolute;
	left:101px;
	top:550px;
	width:259px;
	height:58px;
	z-index:11;
}
#apDiv12 {
	position:absolute;
	left:101px;
	top:612px;
	width:100px;
	height:16px;
	z-index:12;
}
#apDiv13 {
	position:absolute;
	left:101px;
	top:353px;
	width:149px;
	height:50px;
	z-index:13;
}
#apDiv14 {
	position:absolute;
	left:101px;
	top:420px;
	width:51px;
	height:22px;
	z-index:14;
}
#apDiv15 {
	position:absolute;
	left:101px;
	top:354px;
	width:179px;
	height:38px;
	z-index:15;
}
#apDiv16 {
	position:absolute;
	left:101px;
	top:430px;
	width:113px;
	height:43px;
	z-index:16;
}
#apDiv17 {
	position:absolute;
	left:101px;
	top:492px;
	width:97px;
	height:31px;
	z-index:17;
}
#apDiv18 {
	position:absolute;
	left:101px;
	top:555px;
	width:120px;
	height:27px;
	z-index:18;
}
#apDiv19 {
	position:absolute;
	left:101px;
	top:618px;
	width:94px;
	height:26px;
	z-index:19;
}
#apDiv20 {
	position:absolute;
	left:565px;
	top:150px;
	width:119px;
	height:32px;
	z-index:20;
}
#apDiv21 {
	position:absolute;
	left:565px;
	top:221px;
	width:209px;
	height:41px;
	z-index:21;
}
#apDiv22 {
	position:absolute;
	left:565px;
	top:219px;
	width:165px;
	height:42px;
	z-index:22;
}
#apDiv23 {
	position:absolute;
	left:101px;
	top:150px;
	width:124px;
	height:38px;
	z-index:23;
}
#apDiv24 {
	position:absolute;
	left:565px;
	top:285px;
	width:107px;
	height:28px;
	z-index:24;
}
#apDiv25 {
	position:absolute;
	left:565px;
	top:355px;
	width:116px;
	height:54px;
	z-index:25;
}
#apDiv26 {
	position:absolute;
	left:565px;
	top:418px;
	width:84px;
	height:27px;
	z-index:26;
}
#apDiv27 {
	position:absolute;
	left:565px;
	top:480px;
	width:123px;
	height:23px;
	z-index:27;
}
#apDiv28 {
	position:absolute;
	left:565px;
	top:542px;
	width:75px;
	height:25px;
	z-index:28;
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

<body onload="MM_preloadImages('interfaz_modulos/procesos/carga_em_over.png','interfaz_modulos/procesos/carga_co_over.png','interfaz_modulos/procesos/captura_p_over.png','interfaz_modulos/procesos/alta_fac_over.png','interfaz_modulos/procesos/modificacion_p_over.png','interfaz_modulos/procesos/cierre_ped_over.png','interfaz_modulos/procesos/ubicacion_da_over.png','interfaz_modulos/procesos/carga_ini_over.png','interfaz_modulos/procesos/carga_inv_over.png','interfaz_modulos/procesos/entrada_al_over.png','interfaz_modulos/procesos/otros_conc_over.png','interfaz_modulos/procesos/solicitud_con_over.png','interfaz_modulos/procesos/calculo_con_over.png','interfaz_modulos/procesos/entrada_over.png','interfaz_modulos/procesos/movimiento_db_over.png','interfaz_modulos/procesos/carga_if_over.png','interfaz_modulos/procesos/ubicacion_dai_over.png')">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div id="apDiv4"></div>
<div class="txt_titulos_bold_menu" id="apDiv6">Funciones.<br />
  <hr size="1" noshade="noshade" />
</div>
<?php echo "$MenuCat"; ?>

</body>
</html>

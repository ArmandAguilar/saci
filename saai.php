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
$img=$objCabecera->home();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SEGDF: SACI</title>
<link rel="shortcut ico" href="interfaz/favicon.ico">
<div style="width:1005px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
<style type="text/css">
@import url("css/txt.css");

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
	left:4px;
	top:1px;
	width:990px;
	height:41px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:96px;
	top:53px;
	width:125px;
	height:23px;
	z-index:1;
}
#apDiv3 {
	position:absolute;
	left:115px;
	top:43px;
	width:198px;
	height:24px;
	z-index:1;
}
</style>
<link href="modulos/css/modulos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv4 {
	position:absolute;
	left:0px;
	top:0px;
	width:1000px;
	height:53px;
	z-index:1;
}
#apDiv5 {
	position:absolute;
	left:0px;
	top:0px;
	width:191px;
	height:47px;
	z-index:2;
}
</style>
<link href="modulos/css/titulos.css" rel="stylesheet" type="text/css" />
<link href="modulos/css/t_inicio.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv6 {
	position: absolute;
	left: 0px;
	top: 53px;
	width: 1000px;
	height: 592px;
	z-index: 2;
	background-color: #FFFFFF;
}
#apDiv7 {
	position:absolute;
	left:670px;
	top:69px;
	width:126px;
	height:93px;
	z-index:4;
}
#apDiv8 {
	position: absolute;
	left: 92px;
	top: 140px;
	width: 781px;
	height: 257px;
	z-index: 4;
	padding: 25px;
	font-size: 14px;
	font-family: Tahoma, Geneva, sans-serif;
	text-align: justify;
	background-color: #F0F0F0;
}
</style>
<link href="css/textos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv9 {
	position:absolute;
	left:80px;
	top:324px;
	width:426px;
	height:21px;
	z-index:5;
}
#apDiv10 {
	position:absolute;
	left:81px;
	top:348px;
	width:240px;
	height:272px;
	z-index:6;
	background-color: #E9E9E9;
}
#apDiv11 {
	position:absolute;
	left:364px;
	top:348px;
	width:240px;
	height:272px;
	z-index:7;
	background-color: #E9E9E9;
}
#apDiv12 {
	position:absolute;
	left:647px;
	top:348px;
	width:240px;
	height:272px;
	z-index:8;
	background-color: #E9E9E9;
}
#apDiv13 {
	position: absolute;
	left: 676px;
	top: 361px;
	width: 95px;
	height: 50px;
	z-index: 5;
}
#apDiv14 {
	position: absolute;
	left: 92px;
	top: 459px;
	width: 364px;
	height: 169px;
	z-index: 6;
}
</style>
<link href="css/.logo_b" rel="stylesheet" type="text/css" />
<link href="css/logo_b.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv15 {
	position: absolute;
	left: 702px;
	top: 481px;
	width: 50px;
	height: 57px;
	z-index: 7;
}
#apDiv16 {
	position: absolute;
	left: 92px;
	top: 64px;
	width: 350px;
	height: 46px;
	z-index: 8;
	font-size: 36px;
	font-family: Tahoma, Geneva, sans-serif;
	color: #333;
	padding: 25px;
}
</style>
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

<body>
<div class="modulos" id="apDiv4"></div>
<div class="inicio" id="apDiv5"></div>
<div id="apDiv6"></div>
<div class="txt_contenido_padding" id="apDiv8">
  <p>El Sistema de Almacén y Control de Inventarios le permitirá llevar una   mejor administración sobre los bienes de muebles e inmuebles de la Secretaría de Educación Pública. También podrá usted tener un rápido manejo en la información   de los resguardos en lo que respecta a los bienes que tengan en responsabilidad   los empleados, los bienes que se tengan en Almacén y la emisión de los   mismos.<br />
    <br />
  De esta manera el operador tendra acceso a toda la información que solicite, logrando así aprovechar al máximo   toda la información de la que dispone el sistema.<br />
  <br />
  </p>
  <hr size="1" noshade="noshade" />
</div>
<div id="apDiv13"><img src="interfaz/saci_sello.png" width="207" height="60" border="0" /></div>
<div  id="apDiv14"><!--<img src="logos/<?php echo $img; ?>" /> --></div>
<div id="apDiv15"><!--<img src="interfaz/logo_sedf_saci.jpg" width="200" height="147" />--></div>
<div id="apDiv16">Bienvenido.</div>
</body>
</html>

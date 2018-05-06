<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("../../../sis.php");
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
<title>SACI : Sistema</title>
<!-- Begin Libs  --> 
 <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
 <script src="<?php echo $url; ?>/js/settings.js" type="text/javascript"></script>
 <!-- Smoke -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
<script src="<?php Echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
<link id="theme" rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/dark.css" type="text/css" media="screen" />
<!-- End Smoke -->
<!-- upload -->
 <link rel="stylesheet" type="text/css" href="<?php Echo $url; ?>/js/jq_uploadify/uploadify.css">
 <script type="text/javascript" src="<?php Echo $url; ?>/js/jq_uploadify/jquery.uploadify-3.1.min.js"></script>
<!-- enupload -->
<!-- Taps -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/jq_ui/css/smoothness/jquery-ui-1.9.1.custom.min.css" />
<script src="<?php Echo $url; ?>/js/jq_ui/js/jquery-ui-1.9.1.custom.min.js"></script>
<script>
     $(function() {
                   $("#tabs").tabs();
                });
            
</script>
<!-- endtaps -->
 <!--  End Libs -->
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<div style="width:1007px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
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
	width:189px;
	height:49px;
	z-index:2;
}
</style>
<link href="css/t_sistema.css" rel="stylesheet" type="text/css" />
<link href="../../../css/textos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv3 {
	position:absolute;
	left:54px;
	top:316px;
	width:897px;
	height:49px;
	z-index:3;
}
#apDiv4 {
	position:absolute;
	left:77px;
	top:382px;
	width:51px;
	height:18px;
	z-index:4;
}
#apDiv5 {
	position:absolute;
	left:0px;
	top:59px;
	width:1000px;
	height:681px;
	z-index:3;
	background-color: #FFFFFF;
}
#apDiv6 {
	position:absolute;
	left:77px;
	top:432px;
	width:84px;
	height:18px;
	z-index:4;
}
#apDiv7 {
	position:absolute;
	left:0px;
	top:742px;
	width:1000px;
	height:70px;
	z-index:4;
	background-color: #C0C2C7;
}
#apDiv8 {
	position:absolute;
	left:623px;
	top:554px;
	width:68px;
	height:26px;
	z-index:5;
}
#apDiv9 {
	position:absolute;
	left:744px;
	top:554px;
	width:44px;
	height:28px;
	z-index:6;
}
#apDiv10 {
	position:absolute;
	left:865px;
	top:754px;
	width:50px;
	height:23px;
	z-index:7;
}
#apDiv11 {
	position:absolute;
	left:133px;
	top:22px;
	width:667px;
	height:21px;
	z-index:8;
}
#apDiv12 {
	position:absolute;
	left:850px;
	top:0px;
	width:73px;
	height:17px;
	z-index:9;
}
#apDiv13 {
	position:absolute;
	left:161px;
	top:151px;
	width:206px;
	height:35px;
	z-index:10;
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
<link href="../../../css/boxes.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv14 {
	position:absolute;
	left:77px;
	top:163px;
	width:50px;
	height:18px;
	z-index:11;
}
#apDiv15 {
	position:absolute;
	left:161px;
	top:204px;
	width:238px;
	height:28px;
	z-index:12;
}
#apDiv16 {
	position:absolute;
	left:77px;
	top:214px;
	width:52px;
	height:14px;
	z-index:13;
}
#apDiv17 {
	position:absolute;
	left:54px;
	top:97px;
	width:897px;
	height:664px;
	z-index:4;
}
#apDiv18 {
	position:absolute;
	left:547px;
	top:151px;
	width:58px;
	height:28px;
	z-index:14;
}
#apDiv19 {	position:absolute;
	left:54px;
	top:97px;
	width:897px;
	height:164px;
	z-index:4;
}
#apDiv20 {	position:absolute;
	left:77px;
	top:163px;
	width:50px;
	height:18px;
	z-index:11;
}
#apDiv21 {	position:absolute;
	left:77px;
	top:163px;
	width:50px;
	height:18px;
	z-index:11;
}
#apDiv22 {
	position:absolute;
	left:269px;
	top:386px;
	width:143px;
	height:29px;
	z-index:15;
}
#apDiv23 {
	position:absolute;
	left:161px;
	top:369px;
	width:141px;
	height:28px;
	z-index:15;
}
#apDiv24 {
	position:absolute;
	left:161px;
	top:421px;
	width:139px;
	height:37px;
	z-index:16;
}
</style>

</head>

    <body onload="load_upload1();load_upload2();load_upload3();MM_preloadImages('../../interfaz_modulos/botones/agregar_over.jpg','../../interfaz_modulos/botones/modificar_over.jpg','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/examinar_over.jpg')">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div id="apDiv5"></div>
<div id="apDiv7"></div>
<div id="apDiv10"><a href="../../menu_sistema.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div class="txt_titulo_secciones" id="apDiv11"> / Usuarios</div>
<div id="apDiv12"><a href="../../menu_sistema.php" target="_self" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" name="Image4" width="150" height="50" border="0" id="Image4" /></a></div>

<div class="txt_titulos_bold" id="apDiv17">
    <div id="tabs">
                                 
                    <ul>
                            <li><a href="#tabs-1">Inicio</a></li>
                            <li><a href="#tabs-2">Cabecera</a></li>
                            <li><a href="#tabs-3">Reportes</a></li>
                    </ul>

                    <div id="tabs-1">
                        <center>
                            <table style="width:300px;">
                                <tr>
                                    
                                    <td><div id="fileQueue1" style="height:80px;"></div>
                                        <input type="file" name="file_upload1" id="file_upload1" />
                                    </td>    
                               </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><img src="../../interfaz_modulos/botones/guardar.jpg"  name="ImageT1" width="120" height="45" border="0" id="ImageT1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageT1','','../../interfaz_modulos/botones/guardar_over.jpg',1)"  style="cursor:pointer"/></td>
                                </tr>
                            </table>
                            <br><br>
                               Nota: La imagen soportada en esta secci&oacute;n es de :350px x 159px y (.png)
                              <br><br>
                               <img src="../../../interfaz/logo_inicio.png"/>    
                            <div id="DivImagenInicio"></div>
                            <br>
                        </center>
                    </div>
                    <div id="tabs-2">
                             <center>
                                <table style="width:300px;">
                                    <tr>
                                       <td>
                                            <div id="fileQueue2" style="height:80px;"></div>
                                            <input type="file" name="file_upload2" id="file_upload2" />
                                       </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><img src="../../interfaz_modulos/botones/guardar.jpg"  name="ImageT2" width="120" height="45" border="0" id="ImageT2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageT1','','../../interfaz_modulos/botones/guardar_over.jpg',1)"  style="cursor:pointer"/></td>
                                    </tr>
                                </table>
                                 <br><br>
                                 Nota: La imagen soportada en esta secci&oacute;n es de :190px x 80px y (.png)
                                 <br><br>
                                  <img src="../../../interfaz/logo_header.png"/>
                                 
                                <div id="DivImagenCabecera"></div>
                                
                            </center>
                    </div>
                    <div id="tabs-3">
                            <center>
                                <table style="width:300px;">
                                    <tr>
                                        <td>
                                             <div id="fileQueue3" style="height:80px;"></div>
                                             <input type="file" name="file_upload3" id="file_upload3" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                       <td><img src="../../interfaz_modulos/botones/guardar.jpg"  name="ImageT3" width="120" height="45" border="0" id="ImageT3" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageT1','','../../interfaz_modulos/botones/guardar_over.jpg',1)"  style="cursor:pointer"/></td>
                                   </tr>
                                </table>
                                <br></br>
                                Nota: La imagen soportada en esta secci&oacute;n es de :190px x 80px y (.png)
                                 <br><br>
                                  <img src="../../../interfaz/cabecera_reportes.png"/>
                                <div id="DivImagenReportes"></div>
                            </center>
                    </div>
    </div>      
</div>
</body>
</html>

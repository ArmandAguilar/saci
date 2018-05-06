<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("../../../sis.php");
include("$path/class/poolConnection.php");

if($_POST[ActGridUsuarios]=="Si")
{
       
        $ArrayId=$_POST[txtid];
        $ArrayIdEmpleado=$_POST[idemp];
        $ArrayNombre =$_POST[nom];
        $ArrayUsuario =$_POST[usuario];
        $ArrayPassword = $_POST[pass];
       

   foreach($ArrayId as $key=>$value)
   {
       if(!empty($value))
       {
           $Campo="";
           if(!empty($ArrayPassword[$key]))
           {
               $pass2=md5($ArrayPassword[$key]);
               $Campo=",Password='$pass2'";
           }
           $sql="update sa_usuarios set IdEmpleado='$ArrayIdEmpleado[$key]',Usuario='$ArrayUsuario[$key]',Nombres='$ArrayNombre[$key]' $Campo where Id='$value'";
           $objUpdate = new poolConnection();
           $con=$objUpdate->Conexion();
           $objUpdate->BaseDatos($con);
           $Rset=$objUpdate->Query($con,$sql);
           $objUpdate->Cerrar($con,$Rset);
       }
   }
    
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SACI : Sistema</title>
<!-- Begin Libs  --> 
 <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
 <script src="<?php echo $url; ?>/js/usuarios.js" type="text/javascript"></script>
 <!-- Smoke -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
<script src="<?php Echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
<link id="theme" rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/dark.css" type="text/css" media="screen" />
<!-- End Smoke -->
<!-- Validation -->
<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_validation/css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_validation/css/template.css" type="text/css"/>
	</script>
	<script src="<?php echo $url; ?>/js/jq_validation/js/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="<?php echo $url; ?>/js/jq_validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#frmNvoUsuario").validationEngine();
		});

		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>
<!-- End Validation -->
<!-- Grid -->
<link rel="stylesheet" type="text/css" href="<?php Echo $url; ?>/js/flexigrid/css/flexigrid/flexigrid.css"/>
<script type="text/javascript" src="<?php Echo $url; ?>/js/flexigrid/flexigrid.js"></script>
<!-- End Grid -->
 <!--  End Libs -->
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<div style="width:1022px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
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
	height:481px;
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
	top:542px;
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
	top:554px;
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
	height:164px;
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
</head>

    <body onload="ver_grid();MM_preloadImages('../../interfaz_modulos/botones/agregar_over.jpg','../../interfaz_modulos/botones/modificar_over.jpg','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/examinar_over.jpg')">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div id="apDiv5"></div>
<div id="apDiv7"></div>
<div id="apDiv8"><img src="../../interfaz_modulos/botones/agregar.jpg" name="Image1" width="120" height="45" border="0" id="Image1"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','../../interfaz_modulos/botones/agregar_over.jpg',1)" style="cursor:pointer;" onclick="add_user();"/></div>
<div id="apDiv9"><img src="../../interfaz_modulos/botones/modificar.jpg" name="Image2" width="120" height="45" border="0" id="Image2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','../../interfaz_modulos/botones/modificar_over.jpg',1)" style="cursor:pointer;" onclick="saver_Order();" /></div>
<div id="apDiv10"><a href="../../menu_sistema.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div class="txt_titulo_secciones" id="apDiv11"> / Usuarios</div>
<div id="apDiv12"><a href="../../menu_sistema.php" target="_self" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" name="Image4" width="150" height="50" border="0" id="Image4" /></a></div>

<div class="txt_titulos_bold" id="apDiv17">
    <form name="frmNvoUsuario" id="frmNvoUsuario"  action="" method="post"> 
            <fieldset>
                <legend style="cursor:pointer" onclick="show_hide_nuevo();">Nuevo</legend>
                <div id="formAlta">
                <table>
                    <tr>
                        <td><div class="txt_titulos_bold" >IdEmpleado</div></td>
                        <td><input  type="text" id="IdEmpleado"  name="IdEmpleado" class="boxes_form1 validate[required]"/></td>
                    </tr>
                <tr>
                        <td><div class="txt_titulos_bold" >Nombres</div></td>
                        <td><input  type="text" id="Nombres"  name="Nombres" class="boxes_form1 validate[required]" /></td>
                    </tr>
                    <tr>
                        <td><div class="txt_titulos_bold" >Usuario</div></td>
                        <td><input  type="text" id="Usuario"  name="Usuario" class="boxes_form1 validate[required,minSize[6]]" /></td>
                    </tr>
                    <tr>
                        <td><div class="txt_titulos_bold" >Contraseña</div></td>
                        <td><input  type="password" id="Password"  name="Password" class="boxes_form1 validate[required,minSize[6]]"/></td>
                    </tr>
                </table>
                </div>
            </fieldset>
        </form>
</div>
<div class="txt_titulos_bold" id="apDiv3">
  <fieldset>
    <legend>Modificar</legend>
            
            <div id="Grids"></div>
  </fieldset>
</div>

</body>
</html>

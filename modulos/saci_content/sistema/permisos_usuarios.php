<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("../../../sis.php");
include("$path/class/poolConnection.php");

if($_POST[ActGridHabilitar]=="Si")
{
        $ArrayId=$_POST[txtid];
        $ArrayHabilitado=$_POST[OnOff];
        foreach($ArrayId as $key=>$value)
             {
                if(!empty($value))
                {
               
                   $sql="update sa_usuarios set Habilitado='$ArrayHabilitado[$key]'  where Id='$value'";
                    
                    $objUpdate = new poolConnection();
                    $con=$objUpdate->Conexion();
                    $objUpdate->BaseDatos();
                    $objUpdate->Query($sql);
                    $objUpdate->Cerrar($con);
                }
             }   
}  


if($_POST[ActGridMenuCatalogo]=="Si")
{

         if(!empty($_POST[Empleado]))
         {
             $Empleado=$_POST[Empleado];
         }
         else
         {
             $Empleado ="NO"; 
         }
         if(!empty($_POST[Cabms]))
         {
             $Cabms=$_POST[Cabms];
         }
         else
         {
            $Cabms ="NO";    
         }
         if(!empty($_POST[Cabms_Consumible]))
         {
             $Cabms_Consumible=$_POST[Cabms_Consumible];
         }
         else
         {
            $Cabms_Consumible ="NO";    
         }
         
         if(!empty($_POST[Giro]))
         {
              $Giro=$_POST[Giro];
         }
         else
         {
             $Giro ="NO";   
         }
         if(!empty($_POST[UnidadMemoria]))
         {
             $UnidadMemoria=$_POST[UnidadMemoria];
         }
         else
         {
             $UnidadMemoria ="NO";   
         }
         if(!empty($_POST[Proveedores]))
         {
             $Proveedores=$_POST[Proveedores];
         }
         else
         {
              $Proveedores ="NO";  
         }
         if(!empty($_POST[UnidadAdministrativa]))
         {
             $UnidadAdministrativa=$_POST[UnidadAdministrativa];
         }
         else
         {
             $UnidadAdministrativa ="NO";   
         }
         if(!empty($_POST[TipoMovimiento]))
         {
             $TipoMovimiento=$_POST[TipoMovimiento];
         }
         else
         {
             $TipoMovimiento  ="NO";  
         }
         if(!empty($_POST[Parametro]))
         {
             $Parametro=$_POST[Parametro];
         }
         else
         {
             $Parametro ="NO";   
         }
         if(!empty($_POST[EstadoBien]))
         {
             $EstadoBien=$_POST[EstadoBien];
         }
         else
         {
             $EstadoBien ="NO";   
         }
         if(!empty($_POST[TipoBienInventariable]))
         {
             $TipoBienInventariable=$_POST[TipoBienInventariable];
         }
         else
         {
            $TipoBienInventariable ="NO";    
         }
         if(!empty($_POST[FactoresPronostico]))
         {
             $FactoresPronostico=$_POST[FactoresPronostico];
         }
         else
         {
             $FactoresPronostico  ="NO";  
         }
         

           $sql="update sa_menu_catalogos set 
                Empleado='$Empleado',
                Cabms = '$Cabms',
                Cabms_Consumible = '$Cabms_Consumible',
                Giro = '$Giro',
                UnidadMemoria = '$UnidadMemoria',
                Proveedores = '$Proveedores',
                UnidadAdministrativa = '$UnidadAdministrativa',
                TipoMovimiento = '$TipoMovimiento',
                Parametro='$Parametro',
                EstadoBien='$EstadoBien',
                TipoBienInventariable='$TipoBienInventariable',
                FactoresPronostico='$FactoresPronostico'
                where IdUsuario='$_POST[txtIdAcualizar]'";
           //echo $sql;
           $objUpdate = new poolConnection();
           $con=$objUpdate->Conexion();
           $objUpdate->BaseDatos();
           $objUpdate->Query($sql);
           $objUpdate->Cerrar($con);
 
}
if($_POST[ActGridMenuProceso]=="Si")
{
    
    if(!empty($_POST[Procesos]))
       {
             $Procesos=$_POST[Procesos];
       }
    else
        {
             $Procesos="NO";
        }
    
    if(!empty($_POST[Pedidos]))
       {
             $Pedidos=$_POST[Pedidos];
       }
    else
        {
             $Pedidos="NO";
        }
   if(!empty($_POST[Consumibles]))
       {
             $Consumibles=$_POST[Consumibles];
       }
    else
        {
            $Consumibles="NO"; 
        }
    if(!empty($_POST[Consumibles_Entradas]))
       {
             $Consumibles_Entradas=$_POST[Consumibles_Entradas];
       }
    else
        {
            $Consumibles_Entradas="NO"; 
        }
    if(!empty($_POST[Consumibles_Salidas]))
       {
            $Consumibles_Salidas=$_POST[Consumibles_Salidas]; 
       }
    else
        {
           $Consumibles_Salidas="NO";   
        }
    if(!empty($_POST[Inventariable]))
       {
             $Inventaribales=$_POST[Inventariable];
       }
    else
        {
           $Inventaribales="NO";  
        }    
   
       $sql="UPDATE sa_menu_procesos SET Procesos = '$Procesos',
              Pedidos = '$Pedidos',
              Consumibles = '$Consumibles',
              Consumibles_Entradas = '$Consumibles_Entradas',
              Consumibles_Salidas = '$Consumibles_Salidas',
              Invetaribales = '$Inventaribales' WHERE IdUsuario ='$_POST[IdActualizarProceso]';";
       

           //echo $sql;
           $objUpdate = new poolConnection();
           $con=$objUpdate->Conexion();
           $objUpdate->BaseDatos();
           $objUpdate->Query($sql);
           $objUpdate->Cerrar($con); 
}
if($_POST[ActGridMenuReportes]=="Si")
{
    
    if(!empty($_POST[Reportes]))
       {
             $Reportes=$_POST[Reportes];
       }
    else
        {
             $Reportes="NO";
        }
    
    if(!empty($_POST[Pedidos]))
       {
             $Pedidos=$_POST[Pedidos];
       }
    else
        {
             $Pedidos="NO";
        }
   if(!empty($_POST[Consumibles]))
       {
             $Consumibles=$_POST[Consumibles];
       }
    else
        {
            $Consumibles="NO"; 
        }
    
   
    if(!empty($_POST[Inventarios]))
       {
             $Inventarios=$_POST[Inventarios];
       }
    else
        {
           $Inventaribales="NO";  
        }    
   
       $sql="UPDATE sa_menu_reportes SET Reportes = '$Reportes',
              Pedidos = '$Pedidos',
              Consumibles = '$Consumibles',
              Inventarios = '$Inventarios' WHERE IdUsuario ='$_POST[IdActualizarReportes]';";

           //echo $sql;
           $objUpdate = new poolConnection();
           $con=$objUpdate->Conexion();
           $objUpdate->BaseDatos();
           $objUpdate->Query($sql);
           $objUpdate->Cerrar($con);
}
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
 <script src="<?php echo $url; ?>/js/usuarios.js" type="text/javascript"></script>
 <!-- Smoke -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
<script src="<?php Echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
<link id="theme" rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/dark.css" type="text/css" media="screen" />
<!-- End Smoke -->
<!-- Grid -->
<link rel="stylesheet" type="text/css" href="<?php Echo $url; ?>/js/flexigrid/css/flexigrid/flexigrid.css"/>
<script type="text/javascript" src="<?php Echo $url; ?>/js/flexigrid/flexigrid.js"></script>
<!-- End Grid -->
 <!--  End Libs -->
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
#apDiv5 {
	position:absolute;
	left:0px;
	top:59px;
	width:1000px;
	height:609px;
	z-index:3;
	background-color: #FFFFFF;
         
 
}
#apDiv6 {
	position:absolute;
	left:0px;
	top:468px;
	width:1000px;
	height:18px;
	z-index:4;
}
#apDiv7 {
	position:absolute;
	left:0px;
	top:670px;
	width:1000px;
	height:70px;
	z-index:4;
	background-color: #C0C2C7;
}
#apDiv8 {
	position:absolute;
	left:623px;
	top:682px;
	width:68px;
	height:26px;
	z-index:5;
}
#apDiv9 {
	position:absolute;
	left:744px;
	top:682px;
	width:44px;
	height:28px;
	z-index:6;
}
#apDiv10 {
	position:absolute;
	left:865px;
	top:682px;
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
	width:63px;
	height:22px;
	z-index:9;
}
.centrar {
height: auto;
width: 100%px;
margin-right: auto;
margin-left: auto;

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

<body onload="showAll_usuario();MM_preloadImages('../../interfaz_modulos/botones/agregar_over.jpg','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/quitar_over.jpg','../../interfaz_modulos/botones/funciones_over.png')">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div id="apDiv5" >
    <br><br>
    <div id="divTrabajo" class="centrar txt_titulos_bold">
        <fieldset   class ="centrar" style="width:950px;">
                <legend>Usuarios</legend>
                <div id="GridUsuarios"></div>
                <div id="GridMenuCatalogo"></div>
    </fieldset>
    </div> 
</div>
<div id="apDiv7"></div>
<div id="apDiv8"><img src="../../interfaz_modulos/botones/modificar.jpg" name="Image1" width="120" height="45" border="0" id="Image1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','../../interfaz_modulos/botones/modificar_over.jpg',1)" style="cursor:pointer;" onclick="saver_Order_procesos();"/></div>
<div id="apDiv9"><img src="../../interfaz_modulos/botones/bloquear.jpg" name="Image4" width="120" height="45" border="0" id="Image4" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/bloquear_over.jpg',1)" style="cursor:pointer;" onclick="saver_Order();"/></div>
<div id="apDiv10"><a href="../../menu_sistema.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div class="txt_titulo_secciones" id="apDiv11"> / Permisos a Usuarios</div>
<div id="apDiv12"><a href="../../menu_sistema.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
</body>
</html>

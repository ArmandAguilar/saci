<?php
// prevent browser from caching
header('pragma: no-cache');
header('expires: 0'); // i.e. contents have already expired
ini_set('session.auto_start','on');
session_start();
include("../../../sis.php");
include("$path/class/poolConnection.php");
include("$path/class/Cat_UnidadMedida.php");
include("$path/class/Cat_UnidadAdmin.php");
include("$path/class/Cat_Cabms.php");
if($_POST[ActGridFechas]=="Si")
{
        $ArrayId=$_POST[txtid];
        $ArrayFecha=$_POST[Fecha];
   foreach($ArrayId as $key=>$value)
   {
       if(!empty($value))
       {
          $AFecha = split("/",$ArrayFecha[$key]);  
          $D =$AFecha[1]; 
          $M =$AFecha[0];
          $Y = $AFecha[2];
           $sql="update  sa_fechaprogramadaentrega set  Id_dFechEntrega='$Y/$M/$D' where Id='$value'";
           
           $objUpdate = new poolConnection();
           $con=$objUpdate->Conexion();
           $objUpdate->BaseDatos();
           $objUpdate->Query($sql);
           $objUpdate->Cerrar($con);

       }
   }
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
<title>SACI : Procesos</title>
<!-- Begin Libs  --> 
 <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
 <script src="<?php echo $url; ?>/js/procesos_pedidos.js" type="text/javascript"></script>
 <!-- Smoke -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
<script src="<?php Echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
<link id="theme" rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/dark.css" type="text/css" media="screen" />
<!-- End Smoke -->
<!-- Validation -->
<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_validation/css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_validation/css/template.css" type="text/css"/>
	
	<script src="<?php echo $url; ?>/js/jq_validation/js/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="<?php echo $url; ?>/js/jq_validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	
<!-- End Validation -->
<!-- Grid -->
<link rel="stylesheet" type="text/css" href="<?php Echo $url; ?>/js/flexigrid/css/flexigrid/flexigrid.css"/>
<script type="text/javascript" src="<?php Echo $url; ?>/js/flexigrid/flexigrid.js"></script>
<!-- End Grid -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/jq_ui/css/smoothness/jquery-ui-1.9.1.custom.min.css" />
<script src="<?php Echo $url; ?>/js/jq_ui/js/jquery-ui-1.9.1.custom.min.js"></script>
<!-- Chosen -->
<link rel="stylesheet" href="<?php Echo $url; ?>/js/jq_chosen/chosen/chosen.css" />
<script src="<?php Echo $url; ?>/js/jq_chosen/chosen/chosen.jquery.js" type="text/javascript"></script>
<!-- Grid 2-->
<link rel="stylesheet" href="http://localhost/saci/js/jq_ui/css/smoothness/jquery-ui-1.9.1.custom.min.css" />
<script src="http://localhost/saci/js/jq_ui/js/jquery-ui-1.9.1.custom.min.js"></script> 
<link href="http://localhost/saci/js/jqgrid/css/ui.jqgrid.css" rel="stylesheet" type="text/css" />
<script src="http://localhost/saci/js/jqgrid/js/jquery.jqGrid.src.js" type="text/javascript"></script>
 <script src="http://localhost/saci/js/jqgrid/src/i18n/grid.locale-es.js" type="text/javascript"></script>
 <!-- End Grid 2--> 
<!-- end Chosen -->

    <style>
    /* force a height so the tabs don't jump as content height changes */
    #tabs .tabs-spacer { float: left; height: 560px; }
    .tabs-bottom .ui-tabs-nav { clear: left; padding: 0 .2em .2em .2em; }
    .tabs-bottom .ui-tabs-nav li { top: auto; bottom: 0; margin: 0 .2em 1px 0; border-bottom: auto; border-top: 0; }
    .tabs-bottom .ui-tabs-nav li.ui-tabs-active { margin-top: -1px; padding-top: 1px; }
    </style>

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
<link href="../../../css/boxes.css" rel="stylesheet" type="text/css" />
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
	height:1090px;
	z-index:10;
	background-color: #FFFFFF;
}

#apDiv6 {
	position:absolute;
	left:0px;
	top:1140px;
	width:1000px;
	height:70px;
	z-index:11;
	background-color: #C0C2C7;
}
#apDiv7 {
	position:absolute;
	left:867px;
	top:1145px;
	width:48px;
	height:38px;
	z-index:12;
}
#apDiv8 {
	position:absolute;
	left:504px;
	top:1145px;
	width:54px;
	height:20px;
	z-index:13;
}
#apDiv9 {
	position:absolute;
	left:383px;
	top:1145px;
	width:54px;
	height:25px;
	z-index:14;
}
#apDiv10 {
	position:absolute;
	left:625px;
	top:1145px;
	width:81px;
	height:28px;
	z-index:15;
}
#apDiv12 {
	position:absolute;
	left:746px;
	top:1145px;
	width:46px;
	height:26px;
	z-index:16;
}
#apCambs {
	position:absolute;
	left:262px;
	top:1145px;
	width:54px;
	height:25px;
	z-index:20;
}
#apUAdmin {
	position:absolute;
	left:141px;
	top:1145px;
	width:54px;
	height:25px;
	z-index:22;
}
#apUM {
	position:absolute;
	left:20px;
	top:1145px;
	width:54px;
	height:25px;
	z-index:22;
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
$(function() {  
    $("#dialog").dialog({
                        autoOpen: false,
                        width: 750,
                        height: 400
                });
            });
function load_frm_um()
{
   $("#dialog").dialog("open"); 
}  

$(function() {  
    $("#dialog2").dialog({
                        autoOpen: false,
                        width: 750,
                        height: 400
                });
            });
function load_frm_cambs()
{
   $("#dialog2").dialog("open"); 
} 
$(function() {  
    $("#dialog3").dialog({
                        autoOpen: false,
                        width: 780,
                        height: 450
                });
            });

function load_frm_ua()
{
   $("#dialog3").dialog("open"); 
} 
function add_ua()
{
    var  losdatos = {
                        txtCodigo:$("#txtCodigo").val(),
                        txtUA:$("#txtUA").val(),
                        cboEmpleado:$("#cboEmpleado").val(),
                        cboZona:$("#cboZona").val(),
                        txtCalle:$("#txtCalle").val(),
                        txtNumero:$("#txtNumero").val(),
                        txtColonia:$("#txtColonia").val(),
                        txtPoblacion:$("#txtPoblacion").val(),
                        txtCP:$("#txtCP").val(),
                        txtTelefono1:$("#txtTelefono1").val(),
                        txtFax:$("#txtFax").val(),
                        txtPrioridad:$("#txtPrioridad").val(),
                        chkAreaActiva:$("#chkAreaActiva").val(),
                        txtNoFolio:$("#txtNoFolio").val(),
                        txtUEjecutora:$("#txtUEjecutora").val(),
                        txtEmpleados:$("#txtEmpleados").val()
                    };
    var v1= $("#txtCodigo").val();
    var v2= $("#txtUA").val();
    var v3= $("#txtCalle").val();
    var v4= $("#txtColonia").val();
    var v5= $("#txtTelefono1").val();
    var v6= $("#cboEmpleado").val();
    
    if(v1=="")
      {
         jQuery('#txtCodigo').validationEngine('validate');  
      } 
    else
    {
        if(v2=="")
          {
              jQuery('#txtUA').validationEngine('validate'); 
          }  
         else
             {
                 if(v3=="")
                   {
                      jQuery('#txtCalle').validationEngine('validate');    
                   }
                 else
                     {
                            if(v4=="")
                             {
                                 jQuery('#txtColonia').validationEngine('validate'); 
                             }
                            else
                                {
                                    if(v5=="")
                                      {
                                          jQuery('#txtCodigo').validationEngine('validate'); 
                                      }
                                    else
                                       {
                                           if(v6=="")
                                             {
                                                 jQuery('#cboEmpleado').validationEngine('validate'); 
                                             }
                                          else
                                              {
                                                    $.ajax({
                                                            url:'../../../scripts/oper_cat_unidadadmin.php?o=2',
                                                            type:'POST',
                                                            data:losdatos,
                                                            success:function(data)
                                                            {
                                                           	    $("#dialog3").dialog("close");  
                                                            },
                                                            error:function(req,e,er) {
                                                                    alert('error!');
                                                            }
                                                        }); 
                                              }
                                           
                                       }
                                }
                     }
             }
    }
} 
function add_cabms()
{
    var v0=$("#cboTipo").val();
    var v1=$("#txtCabms").val();
    var v2=$("#txtDes").val();
    var v3=$("#cboUnidad").val();
    var v4=$("#txtPPresupuestal").val();
    var  losdatos = {cboTipo:$("#cboTipo").val(),txtCabms:$("#txtCabms").val(),txtDes:$("#txtDes").val(),cboUnidad:$("#cboUnidad").val(),txtPPresupuestal:$("#txtPPresupuestal").val()};
if(v0=="")
   {
      jQuery('#cboTipo').validationEngine('validate');
   }  
 else{       
    if(v1=="")
    {
        jQuery('#txtCabms').validationEngine('validate');
    }
    else
       {
           if(v2=="")
           {
             jQuery('#txtDes').validationEngine('validate');  
           }
          else
           {
                  if(v3=="")
                  {
                     jQuery('#cboUnidad').validationEngine('validate');  
                  }
                  else
                    {
                        if(v4=="")
                        {
                           jQuery('#txtPPresupuestal').validationEngine('validate');  
                        }
                        else{
                                 
                                $.ajax({
                                        url:'../../../scripts/oper_cat_cabms.php?o=2',
                                        type:'POST',
                                        data:losdatos,
                                        success:function(data)
                                        {
                                            
                                            var Verificado = data;
                                           if(Verificado == "Si")
                                            {
                                               smoke.signal('Clave cambs ya existe');  
                                            }
                                            else
                                            {
                                                
                                                
                                                  $.ajax({
                                                            url:'../../../scripts/oper_cat_cabms.php?o=3',
                                                            type:'POST',
                                                            data:losdatos,
                                                            success:function(data)
                                                            {
                                                                
                                                                $("#dialog2").dialog("close"); 
                                                            },
                                                            error:function(req,e,er) {
                                                                    alert('error!');
                                                            }
                                                    });
                                                
                                            }  
                                        },
                                        error:function(req,e,er) {
                                                alert('error!');
                                        }
                                });
                          }
                    }
           }
       }
    
   }
    
    
}
function add_Umedida()
{
    
    var v1=$("#txtUmedida").val();
    
    var  losdatos = {txtUmedida:$("#txtUmedida").val()};
    if(v1=="")
    {
       jQuery('#txtUmedida').validationEngine('validate');  
    }
    else{
              $.ajax({
                    url:'../../../scripts/oper_cat_unidadmedida.php?o=2',
                    type:'POST',
                    data:losdatos,
                    success:function(data)
                    {
                   	 $("#dialog").dialog("close"); 
                    },
                    error:function(req,e,er) {
                            alert('error!');
                    }
            }); 
      }
}
</script>
</head>

<body onload="load_frm();MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/agregar_over.jpg','../../interfaz_modulos/botones/modificar_over.jpg','../../interfaz_modulos/botones/borrar_over.jpg','../../interfaz_modulos/botones/consultar_over.jpg')">
<div style="width:1006px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
<div class="modulos" id="apDiv1"></div>
<div class="inicio" id="apDiv2"></div>
<div class="txt_titulo_secciones" id="apDiv11"> / Pedidos / Captura de Pedidos</div>
<div id="apDiv4"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
<div id="apDiv5">
    <div id="DivTrabajo"></div>    
</div>
<div id="apDiv6"></div>
<div id="apDiv7"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
<div id="apDiv8"><img src="../../interfaz_modulos/botones/modificar.jpg" name="Image8" width="120" height="45" border="0" id="Image8"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','../../interfaz_modulos/botones/modificar_over.jpg',1)" style="cursor:pointer" onclick="frm_buscar_pedidos();"/></div>
<div id="apDiv9"><img src="../../interfaz_modulos/botones/agregar.jpg" name="Image6" width="120" height="45" border="0" id="Image6" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../../interfaz_modulos/botones/agregar_over.jpg',1)" style="cursor:pointer" onclick="load_frm();"/></div>
<div id="apDiv10"><img src="../../interfaz_modulos/botones/borrar.jpg" name="Image7" width="120" height="45" border="0" id="Image7"onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../../interfaz_modulos/botones/borrar_over.jpg',1)" style="cursor:pointer" onclick="frm_buscar_borrar_pedido();"/></div>
<div id="apDiv12"><img src="../../interfaz_modulos/botones/consultar.jpg" name="Image9" width="120" height="45" border="0" id="Image9" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','../../interfaz_modulos/botones/consultar_over.jpg',1)" style="cursor:pointer" onclick="frm_consultar_buscar();"/></div>
<div id="apCambs"><img src="../../interfaz_modulos/botones/cabms.jpg" name="Image10" width="120" height="45" border="0" id="Image10" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','../../interfaz_modulos/botones/cabms_over.jpg',1)" style="cursor:pointer" onclick="load_frm_cambs();"/></div>
<div id="apUAdmin"><img src="../../interfaz_modulos/botones/unidad_a.jpg" name="Image11" width="120" height="45" border="0" id="Image11" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image11','','../../interfaz_modulos/botones/unidad_a_over.jpg',1)" style="cursor:pointer" onclick="load_frm_ua();"/></div>
<div id="apUM"><img src="../../interfaz_modulos/botones/unidad_m.jpg" name="Image11M" width="120" height="45" border="0" id="Image11M" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image11M','','../../interfaz_modulos/botones/unidad_m_over.jpg',1)" style="cursor:pointer" onclick="load_frm_um();"/></div>

<div id="dialog" title="Unidad Medida">
        <?php
              $objUnidadMedia = new Cat_UnidadMedida();
              echo $objUnidadMedia->frm_add_Umedidad();
        ?>
</div> 
<div id="dialog2" title="Cambs">
        <?php
              $objCambs = new Cat_Cabms();
              echo $objCambs->frm_add_cabms();
        ?>
</div> 
<div id="dialog3" title="Unidad Admin">
        <?php
              $objUnidadAdmin = new Cat_UnidadAdmin();
              echo $objUnidadAdmin->frm_add_ua();
        ?>
</div>
</div> 
</body>
</html>

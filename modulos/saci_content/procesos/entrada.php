<?php
    // prevent browser from caching
    header('pragma: no-cache');
    header('expires: 0'); // i.e. contents have already expired
    ini_set('session.auto_start','on');
    session_start();
    include("../../../sis.php");
    include("$path/class/poolConnection.php");

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
        <link href="css/modulos.css" rel="stylesheet" type="text/css" />
        <link href="css/t_procesos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/textos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/boxes.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/procesos_entrada.js" type="text/javascript"></script>
         <!-- Smoke -->
		<link rel="stylesheet" href="<?php echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
		<script src="<?php Echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
		<link id="theme" rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/dark.css" type="text/css" media="screen" />
		<!-- End Smoke -->
		<!-- Validation -->
		<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_validation/css/validationEngine.jquery.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_validation/css/template.css" type="text/css"/>
		<script src="<?php echo $url; ?>/js/jq_validation/js/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo $url; ?>/js/jq_validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
		<!-- End Validation -->
		<!-- Grid -->
		<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/js/flexigrid/css/flexigrid/flexigrid.css"/>
		<script type="text/javascript" src="<?php echo $url; ?>/js/flexigrid/flexigrid.js"></script>
		<!-- End Grid -->
		<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_ui/css/smoothness/jquery-ui-1.9.1.custom.min.css" />
		<script src="<?php Echo $url; ?>/js/jq_ui/js/jquery-ui-1.9.1.custom.min.js"></script> 
                 <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/i18n/jquery.ui.datepicker-fr.js"></script>
                 <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/i18n/jquery.ui.datepicker-es.js"></script>
		<!-- Chosen -->
		<link rel="stylesheet" href="<?php echo $url; ?>/js/jq_chosen/chosen/chosen.css" />
		<script src="<?php Echo $url; ?>/js/jq_chosen/chosen/chosen.jquery.js" type="text/javascript"></script>
		<!-- end Chosen -->
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
            #apDiv2 {
                    position:absolute;
                    left:0px;
                    top:-1px;
                    width:232px;
                    height:51px;
                    z-index:2;
            }
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
            #DivContenido {
                    position:absolute;
                    left:0px;
                    top:59px;
                    width: 980px;
                    height:1090px;
                    z-index:10;
                    background-color: #FFFFFF;
                    padding: 0px 10px;
            }
            #apDiv6 {
                    position:absolute;
                    left:0px;
                    top:1150px;
                    width:1000px;
                    height:70px;
                    z-index:11;
                    background-color: #C0C2C7;
            }
  #apDiv7 {
                position:absolute;
                left:867px;
                top: 1162px;
                width:48px;
                height:38px;
                z-index:12;
        }
        #apDiv8 {
                position:absolute;
                left:625px;
                top: 1162px;
                width:54px;
                height:20px;
                z-index:13;
        }
        #apDiv9 {
                position:absolute;
                left:504px;
               top: 1162px;
                width:54px;
                height:25px;
                z-index:14;
        }
        #apDiv10 {
                width:81px;
                height:28px;
                z-index:15;
        }
        #apDiv12 {
                position:absolute;
                left:746px;
                top: 1162px;
                width:46px;
                height:26px;
                z-index:16;
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
    <body onload="load_frm();MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/traspasar_over.jpg','../../interfaz_modulos/botones/limpiar_over.jpg','../../interfaz_modulos/botones/aceptar_over.jpg')">
        <div style="width:1006px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
            <div class="modulos" id="apDiv1"></div>
            <div class="inicio" id="apDiv2"></div>
            <div class="txt_titulo_secciones" id="apDiv11"> / Ubicación dentro de Almacén</div>
            <div id="apDiv4"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
            
            <div id="DivContenido"></div>
            
            <div id="apDiv6">
                    <input type="text" id="txtIdCABMS" name="txtIdCABMS"/>
                    <input type="text" id="txtIdTipoBien" name="txtIdTipoBien"/>
                    <input type="text" id="txtIdInvetario" name="txtIdInvetario"/>
            </div>
                        <div id="apDiv7"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
                        <div id="apDiv8"><img src="../../interfaz_modulos/botones/modificar.jpg" name="Image8" width="120" height="45" border="0" id="BtnModificar" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','../../interfaz_modulos/botones/modificar_over.jpg',1)" style="cursor:pointer" onclick="modificar_form();"/></div>
                        <div id="apDiv9"><img src="../../interfaz_modulos/botones/agregar.jpg" name="Image6" width="120" height="45" border="0" id="BtnAgregar" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../../interfaz_modulos/botones/agregar_over.jpg',1)" style="cursor:pointer" onclick="load_tipo_inventario();"/></div>
                        <div id="apDiv12"><img src="../../interfaz_modulos/botones/consultar.jpg" name="Image9" width="120" height="45" border="0" id="BtnConsultar"  onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','../../interfaz_modulos/botones/consultar_over.jpg',1)" style="cursor:pointer" onclick="frm_cosnulta();"/></div>                
        </div>
        <div id="dialog1" title="No. Pedido">
                <table>
                    <tr>
                        <td><input type="text" name="txtPatron" id="txtPatron" class="boxes_form400px"/></td>
                        <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTB" width="120" height="45" border="0" id="ImageBTB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTB','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_pedido();"/></td>
                    </tr>
                </table>
                    <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkFolio" id="chkFolio" value="Folio"/></div></td>
                            <td><div class="txt_titulos_bold">Descripci&oacute;n:<input type="checkbox" name="chkDescripcion" id="chkDescripcion" value="Descripcion"/></div></td>
                        </tr>
                    </table> 
                    <div id="GridBusqueda"></div>
                    <center><div id="DivLoad1" style="display:none"><img src="../../../interfaz/cargando.png"/></div></center>
        </div>
        <div id="DAreaAdquisicion" title="Area de Adquisicion">
                <table>
                    <tr>
                        <td><input type="text" name="txtPatronAdquisicion" id="txtPatronAdquisicion" class="boxes_form400px"/></td>
                        <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTBUA" width="120" height="45" border="0" id="ImageBTBUA" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTBUA','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="UAAdministrativa_buscar();"/></td>
                    </tr>
                </table>
                    <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkCveUA" id="chkCveUA" value="Si"/></div></td>
                            <td><div class="txt_titulos_bold">Descripcion:<input type="checkbox" name="chkDescripcionUA" id="chkDescripcionUA" value="Si"/></div></td>
                        </tr>
                    </table> 
                    <div id="GridBusquedatxtPatronDAreaAdquisicion"></div>
                    <center><div id="DivLoadtxtPatronDAreaAdquisicion" style="display:none"><img src="../../../interfaz/cargando.png"/></div></center>   
            
        </div> 
        <div id="DResguardante1" title="1er. Resguardante">
                    <table>
                    <tr>
                        <td><input type="text" name="txtPatronDResguardante1" id="txtPatronDResguardante1" class="boxes_form400px"/></td>
                        <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTB" width="120" height="45" border="0" id="ImageBTB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTB','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_resguardante_1();"/></td>
                    </tr>
                </table>
                    <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkCve" id="chkCve" value="Si"/></div></td>
                            <td><div class="txt_titulos_bold">Nombre:<input type="checkbox" name="chkNombre" id="chkNombre" value="Si"/></div></td>
                        </tr>
                    </table> 
                    <div id="GridBusquedatxtPatronDResguardante1"></div>
                    <center><div id="DivLoadtxtPatronDResguardante1" style="display:none"><img src="../../../interfaz/cargando.png"/></div></center>   
        </div>  
        <div id="DResguardante2" title="2do. Resguardante">
                   <table>
                    <tr>
                        <td><input type="text" name="txtPatronDResguardante2" id="txtPatronDResguardante2" class="boxes_form400px"/></td>
                        <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTB2" width="120" height="45" border="0" id="ImageBTB2" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTB2','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_resguardante_2();"/></td>
                    </tr>
                </table>
                    <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkCve2" id="chkCve2" value="Si"/></div></td>
                            <td><div class="txt_titulos_bold">Nombre:<input type="checkbox" name="chkNombre2" id="chkNombre2" value="Si"/></div></td>
                        </tr>
                    </table> 
                    <div id="GridBusquedatxtPatronDResguardante2"></div>
                    <center><div id="DivLoadtxtPatronDResguardante2" style="display:none"><img src="../../../interfaz/cargando.png"/></div></center> 
        </div>  
        <div id="DResguardante3" title="3er. Resguardante">
                <table>
                    <tr>
                        <td><input type="text" name="txtPatronDResguardante3" id="txtPatronDResguardante3" class="boxes_form400px"/></td>
                        <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTB3" width="120" height="45" border="0" id="ImageBTB3" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTB3','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_resguardante_3();"/></td>
                    </tr>
                </table>
                    <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkCve3" id="chkCve3" value="Si"/></div></td>
                            <td><div class="txt_titulos_bold">Nombre:<input type="checkbox" name="chkNombre3" id="chkNombre3" value="Si"/></div></td>
                        </tr>
                    </table> 
                    <div id="GridBusquedatxtPatronDResguardante3"></div>
                    <center><div id="DivLoadtxtPatronDResguardante3" style="display:none"><img src="../../../interfaz/cargando.png"/></div></center>      
        </div>  
        <div id="DCambsSustitucion" title="Cambs">
                <table>
                    <tr>
                        <td><input type="text" name="txtDCambsSustitucion" id="txtDCambsSustitucion" class="boxes_form400px"/></td>
                        <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTBDCambsSustitucion" width="120" height="45" border="0" id="ImageBTBDCambsSustitucion" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTBDCambsSustitucion','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_solo_cambs();"/></td>
                    </tr>
                </table>
                    <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkCveDCambsSustitucion" id="chkCveDCambsSustitucion" value="Si"/></div></td>
                            <td><div class="txt_titulos_bold">Nombre:<input type="checkbox" name="chkNombreDCambsSustitucion" id="chkNombreDCambsSustitucion" value="Si"/></div></td>
                        </tr>
                    </table> 
                    <div id="GridBusquedatxtPatroDCambsSustitucion"></div>
                    <center><div id="DivLoadtxtPatroDCambsSustitucion" style="display:none"><img src="../../../interfaz/cargando.png"/></div></center>      
        </div> 
        <div id="DInvSustitucion" title="No. Inventario">
                <table>
                    <tr>
                        <td><input type="text" name="txtPatronDInvSustitucion" id="txtPatronDInvSustitucion" class="boxes_form400px"/></td>
                        <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTB3" width="120" height="45" border="0" id="ImageBTB3" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTB3','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_solo_inv();"/></td>
                    </tr>
                </table>
                 <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkCveDInvSustitucion" id="chkCveDInvSustitucion" value="Si"/></div></td>
                            <td><div class="txt_titulos_bold">Nombre:<input type="checkbox" name="chkNombreDInvSustitucion" id="chkNombreDInvSustitucion" value="Si"/></div></td>
                        </tr>
                    </table>   
                    <div id="GridBusquedatxtPatronDInvSustitucion"></div>
                    <center><div id="DivLoadtxtPatronDInvSustitucion" style="display:none"><img src="../../../interfaz/cargando.png"/></div></center>      
        </div>
        <div id="DInvSustitucionConsultar" title="No. Inventario Consultar">
                <table>
                    <tr>
                        <td><input type="text" name="txtPatronDInvSustitucionConsultar" id="txtPatronDInvSustitucionConsultar" class="boxes_form400px"/></td>
                        <td>&nbsp;&nbsp;&nbsp;<img src="../../interfaz_modulos/botones/buscar.jpg" name="ImageBTB4" width="120" height="45" border="0" id="ImageBTB4" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageBTB4','','../../interfaz_modulos/botones/buscar_over.jpg',1)" style="cursor:pointer" onclick="buscar_solo_inv_consulta();"/></td>
                    </tr>
                </table>
                 <table>
                        <tr>
                            <td><div class="txt_titulos_bold">Clave:<input type="checkbox" name="chkCveDInvSustitucionConsultar" id="chkCveDInvSustitucionConsultar" value="Si"/></div></td>
                            <td><div class="txt_titulos_bold">Nombre:<input type="checkbox" name="chkNombreDInvSustitucionConsultar" id="chkNombreDInvSustitucionConsultar" value="Si"/></div></td>
                        </tr>
                    </table>   
                    <div id="GridBusquedatxtPatronDInvSustitucionConsultar"></div>
                    <center><div id="DivLoadtxtPatronDInvSustitucionConsultar" style="display:none"><img src="../../../interfaz/cargando.png"/></div></center>      
        </div>
    </body>
</html>
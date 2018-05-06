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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>SACI : Reportes</title>
        <style type="text/css">
            body {
                    margin-left: 0px;
                    margin-top: 0px;
                    margin-right: 0px;
                    margin-bottom: 0px;
            }
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
                    width:209px;
                    height:51px;
                    z-index:2;
            }
            #apDiv11 {
                    position:absolute;
                    left:145px;
                    top:22px;
                    width:667px;
                    height:21px;
                    z-index:8;
            }
            #apDiv3 {
                    position:absolute;
                    left:850px;
                    top:0px;
                    width:50px;
                    height:32px;
                    z-index:9;
            }
            #apDiv4 {
                    position:absolute;
                    left:0px;
                    top:59px;
                    width:1000px;
                    height:500px;
                    z-index:100;
                    background-color: #FFFFFF;
            }
            #apDiv5 {
                    position:absolute;
                    left:0px;
                    top:562px;
                    width:1000px;
                    height:70px;
                    z-index:11;
                    background-color: #C0C2C7;
            }
            #apDiv6 {
                    position:absolute;
                    left:867px;
                    top:573px;
                    width:47px;
                    height:21px;
                    z-index:12;
            }
            #apDiv7 {
                    position:absolute;
                    left:625px;
                    top:419px;
                    width:54px;
                    height:22px;
                    z-index:13;
            }
            #apDiv8 {
                    position:absolute;
                    left:746px;
                    top:573px;
                    width:71px;
                    height:25px;
                    z-index:14;
            }
            #apDiv9 {
                    position:absolute;
                    left:680px;
                    top:197px;
                    width:71px;
                    height:33px;
                    z-index:15;
            }
        </style>
        <link href="css/modulos.css" rel="stylesheet" type="text/css" />
        <link href="../../../css/textos.css" rel="stylesheet" type="text/css" />
        <link href="../../../css/boxes.css" rel="stylesheet" type="text/css" />
        <link href="css/t_reportes.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/textos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/boxes.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/js/UI_Theme/css/smoothness/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/js/jqgrid/css/ui.jqgrid.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.2.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery-ui.custom.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jqgrid/js/jquery.jqGrid.src.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jqgrid/src/i18n/grid.locale-es.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.widget.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.core.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.position.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.mouse.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/external/jquery.mousewheel.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.datepicker.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.button.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.spinner.js" type="text/javascript"></script>
        <!-- Begin Libs  --> 
        <script src="<?php echo $url; ?>/js/procesos_cargainventario.js" type="text/javascript"></script>
        <!-- Smoke -->
        <link rel="stylesheet" href="<?php echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
        <script src="<?php echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
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
        <script src="<?php echo $url; ?>/js/jq_ui/js/jquery-ui-1.9.1.custom.min.js"></script>  
        <!-- Chosen -->
        <link rel="stylesheet" href="<?php echo $url; ?>/js/jq_chosen/chosen/chosen.css" />
        <script src="<?php echo $url; ?>/js/jq_chosen/chosen/chosen.jquery.js" type="text/javascript"></script>
        <!-- end Chosen -->
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

            $().ready(function () {
                $(".chzn-select").chosen(); 
                $(".chzn-select-deselect").chosen({allow_single_deselect:true});
                
                $("#TblReporte").jqGrid({
                    //url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerEmpleados',
                    datatype: 'local',
                    colNames: ['Clave Articulo', 'Clave Interna Articulo', 'Descripcion', 'Disponible', 'Unidad de Medida', 'Maximo', 'Minimo', 'Valor'],
                    colModel: [
                        { name: 'ClaveArticulo', index: 'ClaveArticulo' },
                        { name: 'ClaveInternaArticulo', index: 'ClaveInternaArticulo' },
                        { name: 'Descripcion_Articulo', index: 'Descripcion_Articulo' },
                        { name: 'Disponible', index: 'Disponible' },
                        { name: 'Descripcion_Medida', index: 'Descripcion_Medida' },
                        { name: 'Maximo', index: 'Maximo' },
                        { name: 'Minimo', index: 'Minimo' },
                        { name: 'Valor', index: 'Valor' }
                    ],
                    pager: "#DivPaginador", 
                    height: 250,
                    width: 900,
                    rowNum: 1000
                });
                
                $("#BtnEjecutar").click(function () {
                    if ($("#CBValor").val() != "") {
                        $("#TBValor").val($("#CBValor").val());
                        //alert('o=ObtenerReporteProgramaEntrega&mes=' + $("#TBMes").val() + "&orden=" + $("#TBOrden").val());
                        $.ajax({
                            url: '../../../scripts/oper_reporte_manejo_de_la_capacidad_del_almacen.php',
                            type: 'get',
                            data: 'o=ObtenerReporteManejoAlmacen&valor=' + $("#TBValor").val(),
                            success: function (Respuesta) {
                                Reporte = eval("(" + Respuesta + ")");
                                $("#TblReporte").jqGrid('setGridParam',{data: Reporte}).trigger("reloadGrid");
                            },
                            error: function (a, b, c) {
                                //alert("a)" + a.responseText);
                                alert("Error. Intentelo nuevamente mas tarde.");
                            }
                        });
                    } else {
                        alert("Faltan Campos por llenar");
                    }
                });
                
                $("#ImgExportarPDF").click(function () {
                    window.open('pdf/reporte_manejo_almacen_pdf.php?valor='+$("#TBValor").val(), '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');
                });
                
                $("#ImgExportarXLS").click(function () {
                    window.open('xls/reporte_manejo_almacen_xls.php?valor='+$("#TBValor").val(), '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');
                });
            });
        </script>
    </head>
    <body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/fecha_over.jpg','../../interfaz_modulos/botones/ejecutar_over.jpg')">
        <div style="width:1022px; position: relative; margin-left: auto; margin-right: auto; top: -12px;">
            <div class="modulos" id="apDiv1"></div>
            <div class="txt_titulo_secciones" id="apDiv11"> / Consumibles / Manejo de la Capacidad del Almacen</div>
            <div class="inicio" id="apDiv2"></div>
            <div id="apDiv3"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
            <div id="apDiv4"><br/>
                <center>
                    <form  id='frmManejoCapasidad' name='frmManejoCapasidad' mathod='post'>
                        <table>
                            <tr>
                                <td valign="top">
                                    <fieldset style="width:250px;">
                                        <legend class="txt_titulos_bold">Capacidad</legend>
                                        <table>
                                            <tr>
                                                <td><div class="txt_titulos_bold">Por Valor</div></td>
                                                <td>
                                                     <select data-placeholder="Valor" style="width:160px;" tabindex="1"  class='chzn-select' id="CBValor">
                                                        <option value=""></option>
                                                        <option value="Bajo">Bajo</option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="Alto">Alto</option>
                                                        <option value="Todos">Todos</option>

                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                </td>
                            </tr>
                        </table>         
                        <p/>
                        <div>
                            <input id="TBValor" type="hidden"/>
                            <table id="TblReporte"></table>
                            <div id="DivPaginador"></div><p/>
                            <table border="0" style="width: 900px;">
                                <tr>
                                    <th><img id="ImgExportarPDF" src="../../interfaz_modulos/botones/exportar_pdf.jpg" name="ImagePdf" width="120" height="45" border="0" id="ImagePdf" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)" style='cursor:pointer'/></th>
                                    <td>&nbsp;</td>
                                    <th><img id="ImgExportarXLS" src="../../interfaz_modulos/botones/exportar_excel.jpg" name="ImageXls" width="120" height="45" border="0" id="ImageXls" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageXls','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)" style='cursor:pointer'/></th>
                                    <td>&nbsp;</td>
                                    <th><!--<img src="../../interfaz_modulos/botones/exportar_word.jpg" name="ImageDoc" width="120" height="45" border="0" id="ImageDoc" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_word_over.jpg',1)" style='cursor:pointer' onclick="window.open('doc/reporte_empleados_doc.php', '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');"/>--></th>
                                </tr>
                            </table>
                        </div>    
                    </form>
                </center>
            </div>
            <div id="apDiv5"></div>
            <div id="apDiv6"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
            <div id="apDiv8"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/ejecutar_over.jpg',1)"><img src="../../interfaz_modulos/botones/ejecutar.jpg" name="Image4" width="120" height="45" border="0" id="BtnEjecutar" /></a></div>
            <p>&nbsp;</p>
        </div>
    </body>
</html>
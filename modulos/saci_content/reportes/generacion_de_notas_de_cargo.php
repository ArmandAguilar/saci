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
            if(empty($_SESSION[IdActivo]))
            {
                echo "
                    <script>
                        top.location.href='$url/index.php';
                        window.location.href='$url/index.php';
                    </script>
                ";
            }      
        ?>
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
            #DivContenido {
                    position:absolute;
                    left:0px;
                    top:59px;
                    width:1000px;
                    height:490px;
                    z-index:10;
                    background-color: #FFFFFF;
            }
            #apDiv5 {
                    position:absolute;
                    left:0px;
                    top:551px;
                    width:1000px;
                    height:70px;
                    z-index:11;
                    background-color: #C0C2C7;
            }
            #apDiv6 {
                    position:absolute;
                    left:867px;
                    top:562px;
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
                    top:562px;
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
            
            function saver_Order()
            {
                document.frmOrderGrid.submit();
            }
            
            $().ready(function (){
                //$("input[name=ChkFolioPeriodo][value=F]").attr("checked", "checked");
                $("#FSFolio, #FSPeriodo").hide();
                $("#TBPeriodoDe, #TBPeriodoHasta").datepicker();
                $("input[name=ChkFolioPeriodo]").change(function(){
                    switch($(this).val()){
                        case "F":
                            $("#TBPeriodoDe, #TBPeriodoHasta").val("");
                            $("input[name=ChkEstatus][value=T]").attr("checked", "checked");
                            $("#FSFolio").show();
                            $("#FSPeriodo").hide();
                            break;
                        case "P":
                            $("#TBFolioDe, #TBFolioHasta").val("");
                            $("#FSFolio").hide();
                            $("#FSPeriodo").show();
                            break;
                    }
                    $("#TBParametros").val("");
                    $("#TblReporte").jqGrid("clearGridData", true);
                });
                
                $("#BtnBuscarFolioDe").click(function () { BuscarFolio("De"); });
                
                $("#BtnBuscarFolioHasta").click(function () { BuscarFolio("Hasta"); });
                
                $("#BtnReporte").click(function () {
                    var Valido = false;
                    var FolioPeriodo = "";
                    var De = "";
                    var Hasta = "";
                    var Estatus = "T";
                    var MostrandoFolio = $("#FSFolio").css("display");
                    var MostrandoPeriodo = $("#FSPeriodo").css("display");
                    if ((MostrandoFolio == 'block') || (MostrandoPeriodo == 'block')){
                        if (MostrandoFolio == "block") {
                            FolioPeriodo = "F";
                            De = $("#TBFolioDe").val();
                            Hasta = $("#TBFolioHasta").val();
                            if ((De != "") && (Hasta != "")) {
                                Valido = true;
                            }
                        } else {
                            FolioPeriodo = "P";
                            De = $("#TBPeriodoDe").val();
                            Hasta = $("#TBPeriodoHasta").val();
                            if ((De != "") && (Hasta != "")) {
                                Valido = true;
                            }
                            Estatus = $("input[name=ChkEstatus]").val();
                        }
                    
                        if (Valido) {
                            GenerarReporte(FolioPeriodo, De, Hasta, Estatus);
                        } else {
                            alert("Faltan datos por llenar.");
                        }
                    } else {
                        alert("Debe seleccionar busqueda por Folio o por Periodo.");
                    }
                    
                    return false;
                });                
                
                $("#TblReporte").jqGrid({
                    //url: '../../../scripts/oper_reporte_catalogos.php?o=ObtenerEmpleados',
                    datatype: 'local',
                    colNames: ['Fecha', 'IDCABMS', 'Articulo', 'Unidad de Medida', 'Precio', 'Total'],
                    colModel: [
                        { name: 'FechaPedido', index: 'FechaPedido', width: 50, align: 'right' },
                        { name: 'IDCABMS', index: 'IDCABMS', width: 50, align: 'center' },
                        { name: 'DescripcionArticulo', index: 'DescripcionArticulo' },
                        { name: 'DescripcionUnidadMedida', index: 'DescripcionUnidadMedida', width: 80, align: 'center' },
                        { name: 'Precio', index: 'Precio', width: 50, align: 'right' },
                        { name: 'Total', index: 'Total', width: 50, align: 'right' }
                    ],
                    pager: "#DivPaginador", 
                    height: 250,
                    width: 900,
                    rowNum: 1000
                });
                
                $("#ImgExportarPDF").click(function () {
                    if ($("#TBParametros").val() != "") {
                        window.open('pdf/reporte_notas_de_cargo_pdf.php?' + $("#TBParametros").val(), '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');
                    } else {
                        alert("Necesita realizar una busqueda.");
                    }
                });
                
                $("#ImgExportarXLS").click(function () {
                    if ($("#TBParametros").val() != "") {
                        window.open('xls/reporte_notas_de_cargo_xls.php?' +  $("#TBParametros").val(), '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no');
                    } else {
                        alert("Necesita realizar una busqueda.");
                    }
                });
            });
            
            function BuscarFolio(xDeHasta){
                $("#DivBuscarIDPedido").html("").load("buscar_pedido.php").dialog({
                    modal: true,
                    title: 'Buscar Pedido',
                    width: 400,
                    height: 450,
                    resizable: false,
                    buttons: [
                        {
                            id: 'BtnSeleccionarPedido',
                            text: 'Seleccionar',
                            click: function () {
                                var id = $("#TblBusquedaPedidos").jqGrid('getGridParam','selrow');
                                if (id) {
                                    if (confirm("¿Esta seguro que desea seleccionar este Pedido?")){
                                        var Pedido = $("#TblBusquedaPedidos").jqGrid('getRowData',id);
                                        $("#TBFolio" + xDeHasta).val(Pedido.idpedido);
                                        $("#DivBuscarIDPedido").dialog("close");
                                    }
                                } else { 
                                    alert("Seleccione un registro.");
                                }
                            }
                        },
                        {
                            id: 'BtnCancelarSeleccionarPedido',
                            text: 'Cancelar',
                            click: function () {
                                $("#DivBuscarIDPedido").dialog("close");
                            }
                        }
                    ],
                    open: function () {
                        $("#BtnSeleccionarPedido").button({ icons: { primary: 'ui-icon-check'} });
                        $("#BtnCancelarSeleccionarPedido").button({ icons: { primary: 'ui-icon-cancel'} });
                    }
                });
            }
            
            function GenerarReporte(xFolioPeriodo,xDe, xHasta, xEstatus){
                $.ajax({
                    url: '../../../scripts/oper_generacion_de_notas_de_cargo.php',
                    type: 'get',
                    data: 'o=ObtenerReporteGeneracionNotasCargo&folioperiodo=' + xFolioPeriodo + '&de=' + xDe + '&hasta=' + xHasta + '&estatus=' + xEstatus,
                    success: function (Respuesta) {
                        Reporte = eval("(" + Respuesta + ")");
                        $("#TBParametros").val('folioperiodo=' + xFolioPeriodo + '&de=' + xDe + '&hasta=' + xHasta + '&estatus=' + xEstatus);
                        $("#TblReporte").jqGrid('setGridParam',{data: Reporte}).trigger("reloadGrid");
                    },
                    error: function (a, b, c) {
                        //alert("a)" + a.responseText);
                        alert("Error. Intentelo nuevamente mas tarde.");
                    }
                });
            }
        </script>
    </head>
    <body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/fecha_over.jpg','../../interfaz_modulos/botones/nota_c_over.jpg')" onsubmit="return false;">
        <div style="width:1022px; position: relative; margin-left: auto; margin-right: auto; top: -12px;">
            <div class="modulos" id="apDiv1"></div>
            <div class="txt_titulo_secciones" id="apDiv11"> / Consumibles / Generación de Notas de Cargo</div>
            <div class="inicio" id="apDiv2"></div>
            <div id="apDiv3"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
            <div id="DivContenido">
                <div id="DivBuscarIDPedido"></div>
                <form  id='frmGenNotas' name='frmGenNotas' action="" mathod='post'>
                    <table border="0" style="margin: 0 auto 0 auto;">
                        <tr>
                            <td>
                                <table>
                                    <tr valign="top">
                                        <td>
                                            <fieldset>
                                                <legend class="txt_titulos_bold">Tipos de Selecci&oacute;n</legend>
                                                <table border="0" style="width: 100%;">
                                                    <tr>
                                                        <th>
                                                            <input class="txt_titulos_bold" type="radio" name="ChkFolioPeriodo" value="F"/>
                                                            <span class="txt_titulos_bold">Folio</span>
                                                        </th>
                                                        <td>&nbsp;</td>
                                                        <th>
                                                            <input class="txt_titulos_bold" type="radio" name="ChkFolioPeriodo" value="P"/>
                                                            <span class="txt_titulos_bold">Período</span>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </fieldset>                                            
                                        </td>
                                        <td>
                                            <fieldset id="FSFolio">
                                                <legend class="txt_titulos_bold">Folio</legend> 
                                                <table>
                                                    <tr>
                                                        <td><div class="txt_titulos_bold">De:</div></td>
                                                        <td><input id="TBFolioDe" type='text' class="boxes_form100px"  readonly/></td>
                                                        <td><img id="BtnBuscarFolioDe" src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageA" width="59" height="45" border="0" id="ImageA" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageA','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="on();"/></td>
                                                        <td>&nbsp;</td>
                                                        <td><div class="txt_titulos_bold">A:</div></td>
                                                        <td><input id="TBFolioHasta" type='text' class="boxes_form100px"  readonly/></td>
                                                       <td><img id="BtnBuscarFolioHasta" src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageB" width="59" height="45" border="0" id="ImageB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageB','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="on();"/></td>
                                                    </tr>
                                                </table>
                                            </fieldset>
                                            <fieldset id="FSPeriodo">
                                                <legend class="txt_titulos_bold">Periodo</legend> 
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td>
                                                            <span class="txt_titulos_bold">Periodo Inicial</span>
                                                            <input id="TBPeriodoDe" type='text' id='txtConsumible' name='txtDe' class="boxes_form100px" readonly/>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <span class="txt_titulos_bold">Periodo Final</soan>
                                                            <input id="TBPeriodoHasta" type='text' id='txtConsumible' name='txtDe' class="boxes_form100px"  readonly/>
                                                        </td>
                                                        <td>
                                                            <fieldset>
                                                                <legend class="txt_titulos_bold">Estatus</legend>
                                                                <table>
                                                                    <tr>
                                                                        <td>
                                                                            <input type="radio" name="ChkEstatus" value="T" checked />
                                                                            <span class="txt_titulos_bold">Todos</span>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" name="ChkEstatus" value="A"/>
                                                                            <span class="txt_titulos_bold">Pendiente</span>
                                                                        </td>
                                                                        <td>
                                                                            <input type="radio" name="ChkEstatus" value="C"/>
                                                                            <span class="txt_titulos_bold">Cerrado</span>
                                                                        </td>
                                                                    </tr>
                                                                </table>    
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </table>
                                             </fieldset>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr>
                            <td>
                                <center>
                                    <input id="TBParametros" type="hidden" />
                                    <table id="TblReporte"></table>
                                    <div id="DivPaginador"></div><p/>
                                    <table border="0" style="width: 900px;">
                                        <tr>
                                            <th><img id="ImgExportarPDF" src="../../interfaz_modulos/botones/exportar_pdf.jpg" name="ImagePdf" width="120" height="45" border="0" id="ImagePdf" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)" style='cursor:pointer'/></th>
                                            <td>&nbsp;</td>
                                            <th><img id="ImgExportarXLS" src="../../interfaz_modulos/botones/exportar_excel.jpg" name="ImageXls" width="120" height="45" border="0" id="ImageXls" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageXls','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)" style='cursor:pointer'/></th>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div id="apDiv5"></div>
            <div id="apDiv6"><a href="../../menu_reportes.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="BtnSalir" /></a></div>
            <div id="apDiv8"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/nota_c_over.jpg',1)"><img src="../../interfaz_modulos/botones/nota_c.jpg" name="Image4" width="120" height="45" border="0" id="BtnReporte" /></a></div>
        </div>
    </body>
</html>

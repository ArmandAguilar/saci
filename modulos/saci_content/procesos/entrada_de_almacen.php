<?php
    // prevent browser from caching
    header('pragma: no-cache');
    header('expires: 0'); // i.e. contents have already expired
    ini_set('session.auto_start','on');
    session_start();
    include("../../../sis.php");
    include($path."/class/poolConnection.php");
    include($path."/class/entrada_de_almacen.php");
    include($path."/class/carga_inicial.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>SACI : Procesos</title>
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
                    width:1000px;
                    height:439px;
                    z-index:10;
                    background-color: #FFFFFF;
            }
            #apDiv6 {
                    position:absolute;
                    left:0px;
                    top:500px;
                    width:1000px;
                    height:70px;
                    z-index:11;
                    background-color: #C0C2C7;
            }
            #apDiv7 {
                    position:absolute;
                    left:867px;
                    top:512px;
                    width:48px;
                    height:38px;
                    z-index:12;
            }
            #apDiv8 {
                    position:absolute;
                    left:504px;
                    top:512px;
                    width:54px;
                    height:20px;
                    z-index:13;
            }
            #apDiv9 {
                    position:absolute;
                    left:383px;
                    top:512px;
                    width:54px;
                    height:25px;
                    z-index:14;
            }
            #apDiv10 {
                    position:absolute;
                    left:746px;
                    top:512px;
                    width:81px;
                    height:28px;
                    z-index:15;
            }
            #apDiv12 {
                    position:absolute;
                    left:625px;
                    top:512px;
                    width:46px;
                    height:26px;
                    z-index:16;
            }
            #apDiv13 {
                    position:absolute;
                    left:746px;
                    top:512px;
                    width:74px;
                    height:31px;
                    z-index:17;
            }
        </style>
        <link href="css/modulos.css" rel="stylesheet" type="text/css" />
        <link href="css/t_procesos.css" rel="stylesheet" type="text/css" />
        <link href="../../../css/textos.css" rel="stylesheet" type="text/css" />
        <link href="css/modulos.css" rel="stylesheet" type="text/css" />
        <link href="css/t_procesos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/textos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/boxes.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/js/UI_Theme/css/smoothness/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/js/jqgrid/css/ui.jqgrid.css" rel="stylesheet" type="text/css" />        
        <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery-ui.custom.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jqgrid/js/jquery.jqGrid.src.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jqgrid/src/i18n/grid.locale-es.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.widget.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.core.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.position.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.mouse.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/external/jquery.mousewheel.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.datepicker.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.dialog.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.button.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jq_ui/development-bundle/ui/jquery.ui.spinner.js" type="text/javascript"></script>
        <!-- Smoke -->
        <link rel="stylesheet" href="<?php echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
        <script src="<?php echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
        <link id="theme" rel="stylesheet" href="<?php echo $url; ?>/js/smoke/dark.css" type="text/css" media="screen" />
        <!-- End Smoke -->
        <!-- Chosen -->
        <link href="<?php echo $url; ?>/js/jq_chosen/chosen/chosen.css" type="text/css" rel="stylesheet" media="screen" />  
        <script src="<?php echo $url; ?>/js/jq_chosen/chosen/chosen.jquery.js" type="text/javascript"></script>
        <!-- End Chosen -->
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
            
            $().ready(function (){
                $(".Numerico").live("keypress", function(Tecla){
                    var Validado = false;
                    if ((Tecla.which >= 48) && (Tecla.which <= 57)) {
                        Validado = true;
                    }
                    return Validado;
                });
                
                $("#BtnBuscarPedido").button({ icons: { primary: 'ui-icon-search' }}).click(function () {
                    if ($("#TBIDPedido").val() != "") {
                        if ($("#CBTiposMovimiento").val() != "0") {
                            $("#TBIDTipoMovimiento").val($("#CBTiposMovimiento").val());
                            $.ajax({
                                url: '../../../scripts/oper_entrada_almacen.php',
                                data: 'o=ObtenerDetallePedido&idpedido=' + $("#TBNumeroPedido").val(),
                                type: 'get',
                                success: function (Respuesta) {
                                    var Resultado = eval("(" + Respuesta + ")");
                                    if (Resultado.Detalle.length > 0) {                                
                                        $("#TblDetalleEntradaAlmacen").jqGrid('setGridParam',{data: Resultado.Detalle}).trigger("reloadGrid");
                                    } else {
                                        $("#TblDetalleEntradaAlmacen").jqGrid("clearGridData", true).trigger("reloadGrid");
                                        alert("La busqueda no arrojo resultados.");
                                    }
                                },
                                error: function (a, b, c) {
                                    alert("a) " + a.responseText + "\nb) " + b + "\nc) " + c);
                                }
                            });
                        } else {
                            alert("Debe seleccionar un Tipo de Movimiento.");
                        }
                    } else {
                        alert("Debe de seleccionar el No. de Pedido.");
                    }
                });              
                
                $("#BtnBuscarIDPedido").button().click(function () {
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
                                            $("#TBNumeroPedido").val(Pedido.idpedido);
                                            $("#LblProveedor").html(Pedido.proveedor);
                                            $("#TBIDUnidadAdministrativa").val(Pedido.idua);
                                            $("#LblUnidadAdministrativa").html(Pedido.unidadadministrativa);
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
                });
            });
        </script>
    </head>
    <body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/agregar_over.jpg','../../interfaz_modulos/botones/actualizar_over.jpg','../../interfaz_modulos/botones/aceptar_over.jpg','../../interfaz_modulos/botones/cancelar_over.jpg')">
        <div style="width:1022px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
            <div class="modulos" id="apDiv1"></div>
            <div class="inicio" id="apDiv2"></div>
            <div class="txt_titulo_secciones" id="apDiv11"> / Consumibles / Entrada / Entrada Almacén</div>
            <div id="apDiv4"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
            <div id="DivContenido">                
                <div id="DivBuscarIDPedido" style="display: none;"></div>
                <table border="0" style="margin: 0 auto 0 auto; width: 900px;">
                    <tr><td colspan="5">&nbsp;</td></tr>
                    <tr>
                        <td>
                            <span class="txt_titulos_bold">Número de Pedido:</span><br/>
                            <input id="TBNumeroPedido" type="text" class="Numerico" value="" readonly="readonly" />
                            <button id="BtnBuscarIDPedido">...</button>
                        </td>
                        <td>&nbsp;</td>
                        <td>                            
                            <?php                                
                                $EA = new Entrada_de_Almacen();
                                $TiposMovimiento = $EA->ObtenerTiposMovimiento();
                            ?>
                            <span class="txt_titulos_bold">Tipo de Movimiento:</span><br/>
                            <input id="TBIDTipoMovimiento" type="hidden" />
                                <?php
                                    echo '<select id="CBTiposMovimiento" class="chzn-select" data-placeholder="Seleccione un Tipo de Movimiento ..." >';
                                    echo '<option value="0"></option>';
                                    $Contador = 1;
                                    foreach($TiposMovimiento as $TipoMovimiento){
                                        if ($TipoMovimiento->ID >= 102 && $TipoMovimiento->ID <= 104) {
                                            echo "<option value='".$TipoMovimiento->ID."'>".utf8_encode($TipoMovimiento->Descripcion)."</option>";
                                        }
                                        $Contador++;
                                        
                                    }
                                    echo '</select>';
                                ?>
                            <script>
                                $("#CBTiposMovimiento").chosen().change(function () {
                                    
                                });
                            </script>
                        </td>
                        <td>&nbsp;</td>
                        <td><button id="BtnBuscarPedido">Buscar</button></td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <span class="txt_titulos_bold">Proveedor:</span>&nbsp;
                            <span id="LblProveedor"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <input id="TBIDUnidadAdministrativa" type="hidden" />
                            <span class="txt_titulos_bold">Unidad Administrativa:</span>&nbsp;
                            <span id="LblUnidadAdministrativa"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div>
                                <table border="0" style="width: 100%;">
                                    <tr>
                                        <td>
                                            <table id="TblDetalleEntradaAlmacen"></table>
                                            <div id="DivPaginadorTblDetalleEntradaAlmacen"></div>
                                            <script>
                                                $("#TblDetalleEntradaAlmacen").jqGrid({
                                                    datatype: 'local',
                                                    colNames: ['Partida', 'IDArticuloCABMS', 'Descripcion Articulo', 'Unidad de Medida', 'C. Pedidos', 'C. Entregados', 'C. Entrar', 'Caracteristicas', 'Rem./Fac.'],
                                                    colModel: [
                                                        { name: 'idpartida', index: 'idpartida', width: 15, sortable: false, resizable: false },
                                                        { name: 'idcabms', index: 'idcabms', width: 30, sortable: false, hidden: true },
                                                        //{ name: 'idclaveAC', index: 'idclaveAC', width: 30, sortable: false },
                                                        //{ name: 'idclaveinternaAC', index: 'idclaveinternaAC', width: 30, sortable: false },
                                                        { name: 'descripcion_cabms', index: 'descripcion_cabms', width: 50, sortable: false },
                                                        { name: 'descripcion_umedida', index: 'descripcion_umedida', width: 30, sortable: false },
                                                        { name: 'cantidadpedido', index: 'cantidadpedido', width: 17, sortable: false, resizable: false },
                                                        { name: 'cantidadentregada', index: 'cantidadentregada', width: 25, sortable: false, resizable: false },
                                                        { name: 'cantidadentrar', index: 'cantidadentrar', width: 18, sortable: false, resizable: false, editable: true },
                                                        { name: 'carateristicas', index: 'carateristicas', width: 50, sortable: false },
                                                        { name: 'remisionfactura', index: 'remisionfactura', width: 30, sortable: false, editable: true }
                                                    ],
                                                    height: 200,
                                                    width: 900,
                                                    rowNum: 20,
                                                    pager: "#DivPaginadorTblDetalleEntradaAlmacen"
                                                }).jqGrid('navGrid','#DivPaginadorTblDetalleEntradaAlmacen',{search: false, refresh: false, del: false, add: false}, 
                                                //EDITAR
                                                {
                                                    url:'../../../scripts/oper_entrada_almacen.php',
                                                    mtype: 'GET',
                                                    closeAfterEdit: true,
                                                    beforeShowForm: function () {
                                                        $("#cantidadentrar").spinner().addClass("Numerico");
                                                        if ($("#cantidadentrar").val() == "") {
                                                            $("#cantidadentrar").val("0");
                                                        }
                                                    }, 
                                                    onclickSubmit: function (parametros, datos) {
                                                        CABMS = $(this).jqGrid('getRowData', datos.TblDetalleEntradaAlmacen_id);
                                                        var ParametrosEnviar = { 
                                                            o: "ModificarDetallePedido", 
                                                            idpedido: $("#TBNumeroPedido").val(), 
                                                            idunidadadministrativa: $("#TBIDUnidadAdministrativa").val(),
                                                            idcabms: CABMS.idcabms,
                                                            idpartida: CABMS.idpartida, 
                                                            idtipomovimiento: $("#TBIDTipoMovimiento").val(), 
                                                            cantidadentrada: $("#cantidadentrar").val(), 
                                                            remisionfactura: $("#remisionfactura").val() 
                                                        };
                                                        return ParametrosEnviar;
                                                    },
                                                    afterSubmit: function (Respuesta, Datos) {
                                                        Modificado = false;
                                                        Dato = eval("(" + Respuesta.responseText + ")");
                                                        if (Dato.Modificado == 1) {
                                                            Modificado = true;
                                                        }
                                                        return [Modificado, "Error al modificar el Artículo. Intentelo nuevamente mas tarde."];
                                                    }                                                    
                                                },
                                                //AGREGAR
                                                {},
                                                //ELIMINAR
                                                {},{},{});
                                            </script>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="apDiv6"></div>
            <div id="apDiv7"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
            <div id="apDiv8" style="display: none;"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','../../interfaz_modulos/botones/actualizar_over.jpg',1)"><img src="../../interfaz_modulos/botones/actualizar.jpg" name="Image8" width="120" height="45" border="0" id="Image8" /></a></div>
            <div id="apDiv9" style="display: none;"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../../interfaz_modulos/botones/agregar_over.jpg',1)"><img src="../../interfaz_modulos/botones/agregar.jpg" name="Image6" width="120" height="45" border="0" id="Image6" /></a></div>
            <div id="apDiv10" style="display: none;"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../../interfaz_modulos/botones/cancelar_over.jpg',1)"><img src="../../interfaz_modulos/botones/cancelar.jpg" name="Image7" width="120" height="45" border="0" id="Image7" /></a></div>
            <div id="apDiv12" style="display: none;"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','../../interfaz_modulos/botones/aceptar_over.jpg',1)"><img src="../../interfaz_modulos/botones/aceptar.jpg" name="Image9" width="120" height="45" border="0" id="Image9" /></a></div>
        </div>
    </body>
</html>

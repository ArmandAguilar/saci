<?php
    // prevent browser from caching
    header('pragma: no-cache');
    header('expires: 0'); // i.e. contents have already expired
    ini_set('session.auto_start','on');
    session_start();
    include("../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/entrada_inventariables.php");
    include($path."/class/carga_inicial.php");
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
            width:1000px;
            height:539px;
            z-index:10;
            background-color: #FFFFFF;
        }
        #apDiv6 {
                width:1000px;
                height:70px;
                z-index:11;
                background-color: #C0C2C7;
        }
        #apDiv7 {
                position:absolute;
                left:867px;
                top: 10px;
                width:48px;
                height:38px;
                z-index:12;
        }
        #apDiv8 {
                position:absolute;
                left:625px;
                top: 10px;
                width:54px;
                height:20px;
                z-index:13;
        }
        #apDiv9 {
                position:absolute;
                left:504px;
                top: 10px;
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
                top: 10px;
                width:46px;
                height:26px;
                z-index:16;
        }
        #apDiv13 {
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
        <script src="<?php echo $url; ?>/js/procesos_cargainventario.js" type="text/javascript"></script>
        <!-- Smoke -->
        <link rel="stylesheet" href="<?php Echo $url; ?>/js/smoke/smoke.css" type="text/css" media="screen" />  
        <script src="<?php echo $url; ?>/js/smoke/smoke.min.js" type="text/javascript"></script>
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
                $("#txtFechaRegistro").datepicker();
                $("#tabs").tabs();
                $("#frmFactura").validationEngine();
                $(".chzn-select").chosen(); 
                $(".chzn-select-deselect").chosen({allow_single_deselect:true});
                $("#Image6").click(function () {
                    var TipoMovimiento = "0000" + $("#CBTiposMovimiento").val();
                    TipoMovimiento = TipoMovimiento.substring(TipoMovimiento.length - 4, TipoMovimiento.length);    
                });               
                
                $("#TblDetallePedido").jqGrid({
                    datatype: 'local',
                    colNames: ['Partida', 'IDArticuloCABMS', 'Descripcion Articulo', 'Unidad de Medida', 'C. Pedidos', 'C. Entregados', 'Precio Unitario', 'Caracteristicas'],
                    colModel: [
                        { name: 'idpartida', index: 'idpartida', width: 15, sortable: false, resizable: false },
                        { name: 'idcabms', index: 'idcabms', width: 30, sortable: false, hidden: false },
                        { name: 'descripcion_cabms', index: 'descripcion_cabms', width: 50, sortable: false },
                        { name: 'descripcion_umedida', index: 'descripcion_umedida', width: 30, sortable: false },
                        { name: 'cantidadpedido', index: 'cantidadpedido', width: 17, sortable: false, resizable: false },
                        { name: 'cantidadentregada', index: 'cantidadentregada', width: 25, sortable: false, resizable: false },
                        { name: 'preciounitario', index: 'preciounitario', width: 25, sortable: false, formatter: 'currency' },
                        { name: 'caracteristicas', index: 'caracteristicas', width: 25, sortable: false, hidden: true }
                    ],
                    height: 200,
                    width: 965,
                    rowNum: 20,
                    pager: "#DivPaginadorTblDetallePedido",
                    onSelectRow: function (id) {
                        $("#CBCABMS, #TBCaracteristicas, #TBIDPedidoArticulo, #TBPrecioUnitario").attr("disabled", "disabled");
                        $("#CBEstatus, #TBNoDocumento, #TBFactura, #TBFechaFactura, #CBEstadosBien").removeAttr("disabled");
                        var CABMS = $("#TblDetallePedido").jqGrid("getRowData", id);
                        var TipoCABMS = CABMS.idcabms.substring(0, 4);
                        $("#CBCABMS").val(CABMS.idcabms).trigger("liszt:updated");
                        $("#TBCaracteristicas").html(CABMS.caracteristicas);
                        $("#TBIDPedidoArticulo").val($("#TBIDPedido").val());
                        $("#TBPrecioUnitario").val(CABMS.preciounitario);
                        $("#CBEstadosBien").val("1").trigger("liszt:updated");
                        $("div.DivOculto").hide();
                        switch(TipoCABMS){
                            // ACERVO
                            case 'I120':
                                $("#LblTituloCaracteristicas").html("Acervo");
                                $(".DivAcervo").show();
                                break;
                            // INFORMATICO
                            case 'I180':
                                $("#LblTituloCaracteristicas").html("Informatico");
                                $(".DivInformatico").show();
                                // Ocultar campo Tipo
                                break;
                            // VEHICULO
                            case 'I480':
                                $("#LblTituloCaracteristicas").html("Vehiculo");
                                $(".DivVehiculo").show();
                                break;
                            // MUEBLE
                            default:
                                $("#LblTituloCaracteristicas").html("Muebles y Equipo");
                                $(".DivMueble").show();
                                break;
                        }
                    }
                }).jqGrid('navGrid','#DivPaginadorTblDetallePedido',{search: false, refresh: false, del: false, add: false, edit: false}, 
                //EDITAR
                {},
                //AGREGAR
                {},
                //ELIMINAR
                {},{},{});
                
                $("#BtnBuscarIDPedido").button().click(function () {
                    $("#DivBuscarIDPedido").html("").load("buscar_pedido_inventariables.php").dialog({
                        modal: true,
                        title: 'Cátalogo de Pedidos por Entregar',
                        width: 400,
                        height: 460,
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
                                            $("#TBIDPedido").val(Pedido.idpedido);
                                            $("#TBFechaPedido").val(Pedido.fecharegistro);
                                            $("#TBProveedor").val(Pedido.proveedor);
                                            
                                            $.ajax({
                                                url: '../../../scripts/oper_entrada_inventariables.php',
                                                data: 'o=ObtenerDetallePedido&idpedido=' + $("#TBIDPedido").val(),
                                                type: 'get',
                                                success: function (Respuesta) {
                                                    var Resultado = eval("(" + Respuesta + ")");
                                                    if (Resultado.Detalle.length > 0) {                                
                                                        $("#TblDetallePedido").jqGrid('setGridParam',{data: Resultado.Detalle}).trigger("reloadGrid");
                                                    } else {
                                                        $("#TblDetallePedido").jqGrid("clearGridData", true).trigger("reloadGrid");
                                                        alert("La busqueda no arrojo resultados.");
                                                    }
                                                },
                                                error: function (a, b, c) {
                                                    alert("a) " + a.responseText + "\nb) " + b + "\nc) " + c);
                                                }
                                            });
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
                
                $("#BtnAgregar").click(function () {
                    $("#DivAgregarPedido").show();
                });
            });
            
            function BuscarEmpleado(xResguardante) {
                $("#DivBuscarEmpleado").html("").load("buscar_empleado.php").dialog({
                    modal: true,
                    title: 'Cátalogo de Empleados',
                    width: 400,
                    height: 460,
                    resizable: false,
                    buttons: [
                        {
                            id: 'BtnSeleccionarEmpleado',
                            text: 'Seleccionar',
                            click: function () {
                                var id = $("#TblBusquedaEmpleado").jqGrid('getGridParam','selrow');
                                if (id) {
                                    if (confirm("¿Esta seguro que desea seleccionar este Pedido?")){
                                        var Empleado = $("#TblBusquedaEmpleado").jqGrid('getRowData',id);
                                        switch(xResguardante) {
                                            case 1:
                                                $("#TBRFCResguardante1").val(Empleado.rfc);
                                                $("#TBNombreResguardante1").val(Empleado.nombre);
                                                break;
                                            case 2:
                                                $("#TBRFCResguardante2").val(Empleado.rfc);
                                                $("#TBNombreResguardante2").val(Empleado.nombre);
                                                break;
                                            case 3:
                                                $("#TBRFCResguardante3").val(Empleado.rfc);
                                                $("#TBNombreResguardante3").val(Empleado.nombre);
                                                break;
                                        }
                                        $("#DivBuscarEmpleado").dialog('close');
                                    }
                                } else { 
                                    alert("Seleccione un registro.");
                                }
                            }
                        },
                        {
                            id: 'BtnCancelarSeleccionarEmpleado',
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
        </script>
    </head>
    <body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/agregar_over.jpg','../../interfaz_modulos/botones/modificar_over.jpg','../../interfaz_modulos/botones/consultar_over.jpg')">
        <table border="0" style="width: 1022px; margin: 0 auto 0 auto;">
            <tr>
                <td>                    
                    <div style="position: relative; top: 0px;">
                        <div class="modulos" id="apDiv1"></div>
                        <div class="inicio" id="apDiv2"></div>
                        <div class="txt_titulo_secciones" id="apDiv11"> / Inventariables / Entrada</div>
                        <div id="apDiv4"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
                    </div>
                </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>
                    <div id="DivContenido" style="height: auto;">
                        <div id="DivBuscarIDPedido" style="display: none;"></div>
                        <!--
                        <form  id='frmAddCabms' name='frmAddConsumible' method='post' onsubmit="return true;">
                        -->
                            <br/>
                            <fieldset>
                            <table>
                                    <tr>
                                        <td><div class="txt_titulos_bold">Tipo Entrada:</div></td>
                                        <td>
                                            <?php                                
                                            $EI = new Entrada_Inventariables();
                                            $TiposMovimiento = $EI->ObtenerTiposMovimiento();
                                            echo '<select id="CBTiposMovimiento" class="chzn-select" data-placeholder="Seleccione un Tipo de Movimiento ..." >';
                                            echo '<option value="0"></option>';
                                            $Contador = 1;
                                            foreach($TiposMovimiento as $TipoMovimiento){
                                                if (
                                                    ($TipoMovimiento->ID == 101) ||
                                                    ($TipoMovimiento->ID == 104) ||
                                                    ($TipoMovimiento->ID == 2000) ||
                                                    ($TipoMovimiento->ID == 2401) ||
                                                    ($TipoMovimiento->ID == 2700)
                                                ) {
                                                    echo "<option value='".$TipoMovimiento->ID."'>".utf8_encode($TipoMovimiento->Descripcion)."</option>";
                                                }
                                                $Contador++;

                                            }
                                            echo '</select>';
                                        ?>
                                        <script>
                                            $("#CBTiposMovimiento").chosen().change(function () {});
                                        </script>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td><div class="txt_titulos_bold">Por Lote:</div></td>
                                        <td>&nbsp;&nbsp;<input type='checkbox' name='chkPorLote' id='chkPorLote' >&nbsp;</td>
                                        <td><div class="txt_titulos_bold">Fecha Registro:</div></td>
                                        <td><input type='text' id='txtFechaRegistro' name='txtFechaRegistro' class="boxes_form100px"/></td>
                                    </tr>
                                </table>
                            </fieldset>
                            <br/>
                            <div id="DivAgregarPedido" style="display: none;">
                                <fieldset>
                                    <legend class="txt_titulos_bold">Pedido</legend>
                                    <table border="0">
                                        <tr>
                                            <td style="width: 190px;">
                                                <span class="txt_titulos_bold">Pedido:</span>&nbsp;
                                                <input id="TBIDPedido" type="text" readonly="readonly" style="text-align: right; width:60px;" />&nbsp;
                                                <button id="BtnBuscarIDPedido">...</button>
                                            </td>
                                            <td>&nbsp;</td>
                                            <td style="width: 190px;">
                                                <span class="txt_titulos_bold">Fecha Pedido:</span>&nbsp;
                                                <input id="TBFechaPedido" type="text" readonly="readonly" style="text-align: right; width:80px;" />
                                            </td>
                                            <td>&nbsp;</td>
                                            <td style="width: 550px;">
                                                <span class="txt_titulos_bold">Proovedor:</span>&nbsp;
                                                <input id="TBProveedor" type="text" readonly="readonly" style="width: 460px;" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">                                    
                                                <table id="TblDetallePedido"></table>
                                                <div id="DivPaginadorTblDetallePedido"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </fieldset>
                            </div>
                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1">Datos Entrada</a></li>
                                    <li><a href="#tabs-2">Caracteristicas</a></li>
                                    <li><a href="#tabs-3">Resguardatntes</a></li>
                                </ul>
                                <div id="tabs-1">
                                    <table border="0" style="width: 100%;">
                                        <tr>
                                            <td><div class="txt_titulos_bold">Art. Cambs:</div></td>
                                            <td>
                                                <?php                                
                                                    $EI = new Entrada_Inventariables();
                                                    $CABMS = $EI->ObtenerCABMS();
                                                
                                                    echo '<select id="CBCABMS" class="chzn-select" data-placeholder="Seleccione un Artículo ..." disabled="disabled" >';
                                                    echo '<option value="0"></option>';
                                                    $Contador = 1;
                                                    foreach($CABMS as $Articulo){
                                                        echo "<option value='".$Articulo->ID."'>".utf8_encode($Articulo->Descripcion)."</option>";
                                                        $Contador++;

                                                    }
                                                    echo '</select>';
                                                ?>
                                                <script>
                                                    $("#CBCABMS").chosen().change(function () {

                                                    });
                                                </script>
                                            </td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr valign='top'>
                                            <td>
                                                <div class="txt_titulos_bold">Caracteristica:</div>
                                            </td>
                                            <td>
                                                <textarea id='TBCaracteristicas' class='boxes_txtarea'  disabled="disabled"></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><div class="txt_titulos_bold">Status:</div></td>
                                                        <td>
                                                <?php                                
                                                    $EI = new Entrada_Inventariables();
                                                    $Estados = $EI->ObtenerEstdosBien();
                                                    
                                                    echo '<select id="CBEstadosBien" class="chzn-select" data-placeholder="Seleccione un Estado ..." disabled="disabled" >';
                                                    echo '<option value="0"></option>';
                                                    $Contador = 1;
                                                    foreach($Estados as $Estado){
                                                        echo "<option value='".$Estado->ID."'>".utf8_encode($Estado->Descripcion)."</option>";
                                                        $Contador++;

                                                    }
                                                    echo '</select>';
                                                ?>
                                                <script>
                                                    $("#CBEstadosBien").chosen().change(function () {
                                                        alert($(this).val());
                                                    });
                                                </script>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class="txt_titulos_bold">Pedido:</div></td>
                                                        <td><input type='text' id='TBIDPedidoArticulo' name='txtPedido' class="boxes_form100px" disabled="disabled"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class="txt_titulos_bold">Costo:</div></td>
                                                        <td><input type='text' id='TBPrecioUnitario' name='txtCosto' class="boxes_form100px" disabled="disabled"/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><div class="txt_titulos_bold">No. Docuemnto:</div></td>
                                                        <td>
                                                            <input type='text' id='TBNoDocumento' name='TBNoDocumento' class="boxes_form100px" disabled="disabled"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class="txt_titulos_bold">Factura:</div></td>
                                                        <td><input type='text' id='TBFactura' name='TBFactura' class="boxes_form100px" disabled="disabled"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class="txt_titulos_bold">Fecha Factura:</div></td>
                                                        <td><input type='text' id='TBFechaFactura' name='TBFechaFactura' class="boxes_form100px" disabled="disabled"/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="tabs-2">
                                    <fieldset>
                                        <legend id="LblTituloCaracteristicas" class="txt_titulos_bold"></legend>
                                        <div class="DivMueble DivOculto" style="display: block;">
                                            <table border="0" style="width: 100%;">
                                                <tr valign='top'>
                                                    <td>
                                                        <table border="0">
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">No. Serie:</div></td>
                                                                <td><input type='text' class="TBNoSerie boxes_form300px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Marca:</div></td>
                                                                <td><input type='text' class="TBMarca boxes_form300px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Modelo:</div></td>
                                                                <td><input type='text' class="TBModelo boxes_form300px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Tipo:</div></td>
                                                                <td><input type='text' class="TBTipo boxes_form300px" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <table border="0">
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Cajon:</div></td>
                                                                <td><input type='text' id='TBCajon' class="boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Gaveta:</div></td>
                                                                <td><input type='text' id='TBGaveta' class="boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Entrepaño:</div></td>
                                                                <td><input type='text' id='TBEntrepano' class="boxes_form200px" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <table border="0">
                                                            <tr>
                                                                 <td><div class="txt_titulos_bold">Pedestal:</div></td>
                                                                 <td><input type='checkbox' id='chkPedestal' value='1'/></td>
                                                            </tr>
                                                            <tr>
                                                                 <td><div class="txt_titulos_bold">Fija:</div></td>
                                                                 <td><input type='checkbox' id='chkPedestal' value='1'/></td>
                                                            </tr>
                                                            <tr>
                                                                 <td><div class="txt_titulos_bold">Giratoria:</div></td>
                                                                 <td><input type='checkbox' id='chkGiratoria' value='1'/></td>
                                                            </tr>
                                                            <tr>
                                                                 <td><div class="txt_titulos_bold">Rodajas:</div></td>
                                                                 <td><input type='checkbox' id='chkRodajas' value='1'/></td>
                                                            </tr>
                                                            <tr>
                                                                 <td><div class="txt_titulos_bold">Plegables:</div></td>
                                                                 <td><input type='checkbox' id='chkPlegables' value='1'/></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="DivInformatico DivOculto" style="display: block;">
                                            <table border="0" style="width: 100%;">
                                                <tr valign='top'>
                                                    <td>
                                                        <table border="0">
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">No. Serie:</div></td>
                                                                <td><input type='text' class="TBNoSerie boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Marca:</div></td>
                                                                <td><input type='text' class="TBMarca boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Modelo:</div></td>
                                                                <td><input type='text' class="TBModelo boxes_form200px" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <table border="0">
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Disco Duro:</div></td>
                                                                <td><input type='text' id='TBDiscoDuro' class="boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">RAM:</div></td>
                                                                <td><input type='text' id='TBRAM' class="boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Procesador:</div></td>
                                                                <td><input type='text' id='TBProcesador' class="boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Fuente de Poder:</div></td>
                                                                <td><input type='text' id='TBFuentePoder' class="boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Paginas por Minuto:</div></td>
                                                                <td><input type='text' id='TBPaginasxMinuto' class="boxes_form200px" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <table border="0">
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">No. Serie Monitor:</div></td>
                                                                <td><input type='text' id='TBNoSerieMonitor' class="boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Marca Monitor:</div></td>
                                                                <td><input type='text' id='TBMarcaMonitor' class="boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">No. Serie Teclado:</div></td>
                                                                <td><input type='text' id='TBProcesador' class="boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Marca Teclado:</div></td>
                                                                <td><input type='text' id='TBMarcaTeclado' class="boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">No. Serie  Mouse:</div></td>
                                                                <td><input type='text' id='TBNoSerieMouse' class="boxes_form200px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Marca Mouse:</div></td>
                                                                <td><input type='text' id='TBMarcaMouse' class="boxes_form200px" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="DivVehiculo DivOculto" style="display: block;">
                                            <table border="0" style="width: 100%;">
                                                <tr valign='top'>
                                                    <td>
                                                        <table border="0">
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">No. Serie:</div></td>
                                                                <td><input type='text' class="TBNoSerie boxes_form300px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Marca:</div></td>
                                                                <td><input type='text' class="TBMarca boxes_form300px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Modelo:</div></td>
                                                                <td><input type='text' class="TBModelo boxes_form300px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Tipo:</div></td>
                                                                <td><input type='text' class="TBTipo boxes_form300px" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <table border="0">
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Placas:</div></td>
                                                                <td><input type='text'id="TBPlacas" class="boxes_form300px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">RFV:</div></td>
                                                                <td><input type='text'id="TBRFV" class="boxes_form300px" /></td>
                                                            </tr
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Tipo de Transmision:</div></td>
                                                                <td><input type='text'id="TBTipoTransmision" class="boxes_form300px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Tipo de Dirección:</div></td>
                                                                <td><input type='text'id="TBTipoDireccion" class="boxes_form300px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Uso:</div></td>
                                                                <td><input type='text'id="TBUso" class="boxes_form300px" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="DivAcervo DivOculto" style="display: block;">
                                            <table border="0">
                                                <tr>                                            
                                                    <td>
                                                        <table border="0">
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Ubicación:</div></td>
                                                                <td><input type='text'id="TBUbicacion" class="boxes_form300px" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Titulo:</div></td>
                                                                <td><input type='text'id="TBTitulo" class="boxes_form300px" /></td>
                                                            </tr
                                                            <tr>
                                                                <td><div class="txt_titulos_bold">Autor:</div></td>
                                                                <td><input type='text'id="TBAutor" class="boxes_form300px" /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="tabs-3">
                                    <fieldset>
                                        <legend class="txt_titulos_bold">Datos del Resguardante</legend>
                                        <br/>
                                        <div id="DivBuscarEmpleado" style="display: none;"></div>
                                        <table>
                                            <tr>
                                                <td><div class="txt_titulos_bold">&Aacute;rea De Adquisicion:</div></td>
                                                <td><input type='text' id='txtArea' name='txtArea' class="boxes_form200px"  readonly/></td>
                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageB" width="59" height="45" border="0" id="ImageB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageB','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick=""/></td>
                                                <td><input type='text' id='txtDes' name='txtDes' class="boxes_form500px"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class="txt_titulos_bold">1er Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante1' name='TBRFCResguardante1' class="boxes_form200px"  readonly/></td>
                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageB" width="59" height="45" border="0" id="ImageB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageB','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="BuscarEmpleado(1)"/></td>
                                                <td><input type='text' id='TBNombreResguardante1' name='TBNombreResguardante1' class="boxes_form500px"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class="txt_titulos_bold">2do Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante2' name='TBRFCResguardante2' class="boxes_form200px"  readonly/></td>
                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageB" width="59" height="45" border="0" id="ImageB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageB','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="BuscarEmpleado(2)"/></td>
                                                <td><input type='text' id='TBNombreResguardante2' name='TBNombreResguardante2' class="boxes_form500px"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class="txt_titulos_bold">3er Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante3' name='TBRFCResguardante3' class="boxes_form200px"  readonly/></td>
                                                <td><img src="../../interfaz_modulos/botones/examinar_m.jpg" name="ImageB" width="59" height="45" border="0" id="ImageB" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ImageB','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)" style="cursor:pointer" onclick="BuscarEmpleado(3)" disabled="disabled"/></td>
                                                <td><input type='text' id='TBNombreResguardante3' name='TBNombreResguardante3' class="boxes_form500px"  readonly/></td>
                                            </tr>
                                        </table>
                                    </fieldset>     
                                </div>
                            </div>     
                        <!--
                        </form>
                        -->
                    </div>
                </td>
            </tr>
            <tr><td></td></tr>
            <tr>
                <td>
                    <div style="position: relative;">
                        <div id="apDiv6"></div>
                        <div id="apDiv7"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
                        <div id="apDiv8"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','../../interfaz_modulos/botones/modificar_over.jpg',1)"><img src="../../interfaz_modulos/botones/modificar.jpg" name="Image8" width="120" height="45" border="0" id="BtnModificar" /></a></div>
                        <div id="apDiv9"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../../interfaz_modulos/botones/agregar_over.jpg',1)"><img src="../../interfaz_modulos/botones/agregar.jpg" name="Image6" width="120" height="45" border="0" id="BtnAgregar" /></a></div>
                        <div id="apDiv12"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','../../interfaz_modulos/botones/consultar_over.jpg',1)"><img src="../../interfaz_modulos/botones/consultar.jpg" name="Image9" width="120" height="45" border="0" id="BtnConsultar" /></a></div>                
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>

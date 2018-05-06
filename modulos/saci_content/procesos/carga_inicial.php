<?php
    // prevent browser from caching
    header('pragma: no-cache');
    header('expires: 0'); // i.e. contents have already expired
    ini_set('session.auto_start','on');
    session_start();
    include("../../../sis.php");
    include($path."/class/poolConnection.php");
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
                left:625px;
                top:512px;
                width:81px;
                height:28px;
                z-index:15;
        }
        #apDiv12 {
                position:absolute;
                left:746px;
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
                $("#TBFechaElaboracion").css({ textAlign: "right", width: "80px" }).datepicker({dateFormat: "yy-mm-dd"});
                $("#TBCantidadSolicitada").css({ textAlign: "right", width: "50px" }).spinner({
                    min: 0
                });
                
                $(".Numerico").keypress(function(Tecla){
                    var Validado = false;
                    if ((Tecla.which >= 48) && (Tecla.which <= 57)) {
                        Validado = true;
                    }
                    return Validado;
                });
                
                $("#BtnModificarEncabezado").button({ icons: { primary: 'ui-icon-disk' } }).click(function () {
                    ModificarEncabezado($("#CBUnidadesAdministrativas").val(), $("input:radio[name=TBTipoCarga]:checked").val(), $("#TBFechaCaptura").val());
                });
                
                
                //DetalleCargaInicial("hs");
                
                //$("#CBUnidadesAdministrativas").chosen().change(function () {
                    //DetalleCargaInicial($(this).val());
                //});
                $("#CBArticulos").chosen();
            });
            
            function DetalleCargaInicial(xIDUnidadAdministrativa) {
                $("#DivDetalleCargaInicial").slideUp();
                $.ajax({
                    url: '../../../scripts/oper_carga_inicial.php',
                    type: 'get',
                    data: 'o=ObtenerDetalleCargaInicial&idunidadadministrativa=' + xIDUnidadAdministrativa,
                    success: function (Respuesta) {
                        var Detalle = eval("(" + Respuesta + ")");
                        if(Detalle.CABMS.length > 0){
                            //alert(Detalle.FechaCaptura + " | " + Detalle.TipoCarga);
                            $("#TblDetalleCargaInicial").jqGrid('setGridParam',{data: Detalle.CABMS}).trigger("reloadGrid");
                            $("#TBFechaElaboracion").val(Detalle.FechaElaboracion);
                            var $radios = $('input:radio[name=TBTipoCarga]');
                            if($radios.is(':checked') === false) {
                                $radios.filter('[value=' + Detalle.TipoCarga + ']').attr('checked', true);
                            }
                            $("#TBHTipoCarga").val(Detalle.TipoCarga);
                            $("#TBHFechaElaboracion").val(Detalle.FechaElaboracion);
                            //$("#DivLocalizacion").show();
                            //$("#CBAreas").val('').trigger("liszt:updated");
                        } else {
                            alert("No existe Carga para la Unidad Administrativa.");
                            $("#TblDetalleCargaInicial").jqGrid("clearGridData", true).trigger("reloadGrid");
                            $("#TBFechaElaboracion").val("");
                            $('input:radio[name=TBTipoCarga]').attr('checked', false);
                        }
                        $("#DivDetalleCargaInicial").slideDown();
                    },
                    error: function (a, b, c) {
                        //alert("a)" + a.responseText);
                        alert("Error. Intentelo nuevamente mas tarde.");
                    }
                });
            }
            
            function ModificarEncabezado(xIDUnidadAdministrativa, xTipoCarga, xFechaCaptura) {
                $.ajax({
                    url: '../../../scripts/oper_carga_inicial.php',
                    type: 'get',
                    data: 'o=ModificarEncabezado&idunidadadministrativa=' + xIDUnidadAdministrativa + "&tipocarga=" + xTipoCarga + "&fechacaptura=" + xFechaCaptura,
                    success: function (Respuesta) {
                        var Encabezado = eval("(" + Respuesta + ")");
                        if (Encabezado.Modificado) {
                            alert("Se modifico correctamente el Encabezado.");
                        } else {
                            alert("No se pudo modificar el Encabezado.\n\bIntentelo nuevamente mas tarde.");
                        }
                    },
                    error: function (a, b, c) {
                        //alert("a)" + a.responseText);
                        alert("Error. Intentelo nuevamente mas tarde.");
                    }
                });
            }
        </script>
    </head>
    <body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/agregar_over.jpg','../../interfaz_modulos/botones/modificar_over.jpg','../../interfaz_modulos/botones/borrar_over.jpg','../../interfaz_modulos/botones/consultar_over.jpg')">
        <div style="width:1022px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">    
            <div class="modulos" id="apDiv1"></div>
            <div class="inicio" id="apDiv2"></div>
            <div class="txt_titulo_secciones" id="apDiv11"> / Consumibles / Entrada / Carga Inicial</div>
            <div id="apDiv4"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
            <div id="DivContenido">
                <table border="0" style="margin: 0 auto 0 auto; width: 900px;">
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td>
                            <?php                                
                                $CI = new Carga_Inicial();
                                $Unidades = $CI->ObtenerUnidadesAdministrativas();
                            ?>
                            <span class="txt_titulos_bold">Unidad Administrativa:</span><br/>
                                <?php
                                    echo '<select id="CBUnidadesAdministrativas" class="chzn-select" data-placeholder="Seleccione una Unidad Administrativa ..." >';
                                    echo '<option value="0"></option>';
                                    $Contador = 1;
                                    foreach($Unidades as $Unidad){
                                        echo "<option value='".$Unidad->ID."'>".utf8_encode($Unidad->Descripcion)."</option>";
                                        $Contador++;
                                    }
                                    echo '</select>';
                                ?>
                            <script>
                                $("#CBUnidadesAdministrativas").chosen().change(function () {
                                    DetalleCargaInicial($(this).val());
                                });
                            </script>
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td>
                            <div id="DivDetalleCargaInicial" style="display: none;">
                            <fieldset>
                                <legend>Encabezado</legend>
                                <input id="TBHTipoCarga" type="hidden" />
                                <input id="TBHFechaElaboracion" type="hidden" />
                                <table border="0" style="width: 100%;">
                                    <tr>
                                        <td>
                                            <span class="txt_titulos_bold">Estado del Documento:</span>&nbsp;&nbsp;
                                            <input type="radio" name="TBTipoCarga" value="R" />&nbsp;Real&nbsp;&nbsp;
                                            <input type="radio" name="TBTipoCarga" value="E" />&nbsp;Estimado
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="txt_titulos_bold">Fecha de Elaboración del Documento:</span>&nbsp;&nbsp;
                                            <input id="TBFechaElaboracion" type="text"
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <button id="BtnModificarEncabezado">Modificar</button>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset><p/>
                            <table id="TblDetalleCargaInicial"></table>
                            <div id="DivPaginadorTblDetalleCargaInicial"></div>
                            </div>
                            <script>
                $("#TblDetalleCargaInicial").jqGrid({
                    datatype: 'local',
                    colNames: ['IDCABMS', 'claveac', 'claveinternaac', 'Descripción', 'IDUnidad de Medida', 'Unidad de Medida', 'Cantidad Solicitada', 'Cantidad Entregada'],
                    colModel: [
                        { name: 'idcabms', index: 'idcabms', width: 30, sortable: false, resizable: false, align: "center", edittype: 'select',
                            hidden: true, editrules: { edithidden: true, required: true }, editable: true,
                            editoptions: {
                                dataUrl: '../../../scripts/oper_carga_inicial.php?o=ObtenerCABMSAgregarCargaInicial&idunidadadministrativa=' + $("#CBUnidadesAdministrativas").val(),
                                buildSelect: function (Respuesta) {
                                    //alert('../../../scripts/oper_carga_inicial.php?o=ObtenerCABMSAgregarCargaInicial&idunidadadministrativa=' + $("#CBUnidadesAdministrativas").val());
                                    //alert(Respuesta);
                                    var CABMS = eval("(" + Respuesta + ")");
                                    var StrCBCABMS= '<select><option value="0">[Seleccione una opción]</option>';
                                    for (var i in CABMS) {
                                        StrCBCABMS += '<option value="' + CABMS[i].IDCABMSConsumible + '">' + CABMS[i].Descripcion + '</option>';
                                    }
                                    StrCBCABMS += '</select>';
                                    return StrCBCABMS;
                                },
                                dataInit: function (CB) {
                                    $(CB).chosen();
                                }
                            }
                        },
                        { name: 'claveAC', index: 'claveAC', width: 30, sortable: false, resizable: false, align: "right", hidden: true },
                        { name: 'claveinternaAC', index: 'claveinternaAC', width: 30, sortable: false, resizable: false, align: "right", hidden: true },
                        { name: 'cabms', index: 'cabms', width: 60, sortable: false },
                        { name: 'idunidadmedida', index: 'idunidadmedida', width: 30, sortable: false, resizable: false, align: "right", editable: false },
                        { name: 'unidadmedida', index: 'unidadmedida', width: 30, sortable: false, editable: false },
                        { name: 'cantidadsolicitada', index: 'cantidadsolicitada', editable: true, width: 30, sortable: false, resizable: false, align: "right", editrules: { number: true },
                        editoptions: {
                            dataInit: function (TB) {
                                $(TB).spinner({ min: 0 });
                            }
                        }},
                        { name: 'cantidadentregada', index: 'cantidadentregada', width: 30, sortable: false, resizable: false, align: "right", hidden: true }
                    ],
                    height: 200,
                    width: 900,
                    rowNum: 20,
                    pager: "#DivPaginadorTblDetalleCargaInicial"
                }).jqGrid('navGrid','#DivPaginadorTblDetalleCargaInicial',{search: false}, 
                // EDITAR
                {url: '../../../scripts/oper_carga_inicial.php',
                    mtype: 'GET',
                    closeAfterEdit: true,
                    top: 100,
                    left: 50,
                    dataheight: 300,
                    width: 400,
                    beforeShowForm: function () {
                        $("#tr_idcabms").hide();
                        $("#tr_idcabms").find("select").val('').trigger("liszt:updated");
                    },
                    onclickSubmit: function (parametros, datos) {
                        CABMS = $(this).jqGrid('getRowData', datos.TblDetalleCargaInicial_id);
                        var ParametrosEnviar = { o: "InsertarModificarArticuloCargaInicial",  idunidadadministrativa:  $("#CBUnidadesAdministrativas").val(), idcabms: CABMS.idcabms, claveac: CABMS.claveAC, claveinternaac: CABMS.claveinternaAC, cantidadsolicitada: datos.cantidadsolicitada, tipocarga: $("#TBHTipoCarga").val(), fechaelaboracion: $("#TBHFechaElaboracion").val() };
                        return ParametrosEnviar;
                    },
                    afterSubmit: function (Respuesta, Datos) {
                        var Articulo = eval("(" + Respuesta.responseText + ")");
                        var Insertado = false;
                        if (Articulo.Insertado == 1) {
                            Insertado = true;
                            DetalleCargaInicial($("#CBUnidadesAdministrativas").val());
                        }
                        return [Insertado, "Error al Insertar el Artículo. Intentelo nuevamente mas tarde."];
                    }
                }, 
                // AGREGAR
                {
                    url: '../../../scripts/oper_carga_inicial.php',
                    mtype: 'GET',
                    closeAfterAdd: true,
                    top: 100,
                    left: 50,
                    width: 700,
                    dataheight: 300,
                    beforeShowForm: function () {
                        $("#tr_idcabms").show();
                        $("#tr_idcabms").find("select").val('').trigger("liszt:updated");
                    },
                    onclickSubmit: function (parametros, datos) {
                        var ParametrosEnviar = { o: "InsertarModificarArticuloCargaInicial",  idunidadadministrativa:  $("#CBUnidadesAdministrativas").val(), idcabms: datos.idcabms, cantidadsolicitada: datos.cantidadsolicitada, tipocarga: $("#TBHTipoCarga").val(), fechaelaboracion: $("#TBHFechaElaboracion").val() };
                        return ParametrosEnviar;
                    },
                    afterSubmit: function (Respuesta, Datos) {
                        var Articulo = eval("(" + Respuesta.responseText + ")");
                        var Insertado = false;
                        if (Articulo.Insertado == 1) {
                            Insertado = true;
                            DetalleCargaInicial($("#CBUnidadesAdministrativas").val());
                        }
                        return [Insertado, "Error al Insertar el Artículo. Intentelo nuevamente mas tarde."];
                    }
                },
                // ELIMINAR
                {
                    url: '../../../scripts/oper_carga_inicial.php',
                    caption: 'Eliminar Artículo',
                    msg: '¿Esta seguro que desea eliminar este Artículo?',
                    width: 300,
                    mtype: 'GET',
                    onclickSubmit: function (parametros) {
                        var IndexArticulo = $("#TblDetalleCargaInicial").jqGrid('getGridParam', 'selrow');
                        var Fila = $("#TblDetalleCargaInicial").jqGrid('getRowData', IndexArticulo);
                        return { o: 'EliminarArticuloCargaInicial', idunidadadministrativa: $("#CBUnidadesAdministrativas").val(), claveac: Fila.claveAC, claveinternaac: Fila.claveinternaAC };
                        //alert(IndexArticulo + "\n\n" + Fila.claveAC + "\n\no=EliminarArticuloCargaInicial&idunidadadministrativa=" + $("#CBUnidadesAdministrativas").val() + "&claveac=" + Fila.claveAC.toString() +"&claveinternaac=" + Fila.claveinternaAC.toString());
                        //return "idunidadadministrativa=" + $("#CBUnidadesAdministrativas").val() + "&claveac=" + Fila.claveAC +"&claveinternaac=" + Fila.claveinternaAC;

                    },
                    afterSubmit: function (Respuesta) {
                        var Articulo = eval("(" + Respuesta.responseText + ")");
                        var Eliminado = false;
                        if (Articulo.Eliminado == 1) {
                            Eliminado = true;
                            DetalleCargaInicial($("#CBUnidadesAdministrativas").val());
                        }
                        return [Eliminado, "Error al Eliminar el Artículo. Intentelo nuevamente mas tarde."];
                    }
                }, 
                {}, {});
                            </script>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="apDiv6"></div>
            <div id="apDiv7"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
            <div id="apDiv8" style="display: none;"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','../../interfaz_modulos/botones/modificar_over.jpg',1)"><img src="../../interfaz_modulos/botones/modificar.jpg" name="Image8" width="120" height="45" border="0" id="Image8" /></a></div>
            <div id="apDiv9" style="display: none;"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../../interfaz_modulos/botones/agregar_over.jpg',1)"><img src="../../interfaz_modulos/botones/agregar.jpg" name="Image6" width="120" height="45" border="0" id="Image6" /></a></div>
            <div id="apDiv10" style="display: none;"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../../interfaz_modulos/botones/borrar_over.jpg',1)"><img src="../../interfaz_modulos/botones/borrar.jpg" name="Image7" width="120" height="45" border="0" id="Image7" /></a></div>
            <div id="apDiv12" style="display: none;"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','../../interfaz_modulos/botones/consultar_over.jpg',1)"><img src="../../interfaz_modulos/botones/consultar.jpg" name="Image9" width="120" height="45" border="0" id="Image9" /></a></div>
        </div>
    </body>
</html>
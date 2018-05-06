<?php
    // prevent browser from caching
    header('pragma: no-cache');
    header('expires: 0'); // i.e. contents have already expired
    ini_set('session.auto_start','on');
    session_start();
    include("../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Inventario.php");
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
                    width: 980px;
                    height:400px;
                    z-index:10;
                    background-color: #FFFFFF;
                    padding: 0px 10px;
            }
            #apDiv6 {
                    position:absolute;
                    left:0px;
                    top:470px;
                    width:1000px;
                    height:70px;
                    z-index:11;
                    background-color: #C0C2C7;
            }
            #apDiv7 {
                    position:absolute;
                    left:867px;
                    top:482px;
                    width:48px;
                    height:38px;
                    z-index:12;
            }
            #apDiv8 {
                    position:absolute;
                    left:746px;
                    top:482px;
                    width:46px;
                    height:26px;
                    z-index:16;
            }
            #apDiv9 {
                    position:absolute;
                    left:625px;
                    top:482px;
                    width:37px;
                    height:22px;
                    z-index:18;
            }
        </style>
        <link href="css/modulos.css" rel="stylesheet" type="text/css" />
        <link href="css/t_procesos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/textos.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/css/boxes.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/js/UI_Theme/css/smoothness/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url; ?>/js/jqgrid/css/ui.jqgrid.css" rel="stylesheet" type="text/css" />
        
        <script src="<?php echo $url; ?>/js/jquery/jquery-1.8.0.min.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/UI_Theme/js/jquery-ui-1.9.0.custom.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jqgrid/js/jquery.jqGrid.src.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/jqgrid/src/i18n/grid.locale-es.js" type="text/javascript"></script>
        <script src="<?php echo $url; ?>/js/reporte_catalogos.js" type="text/javascript"></script>
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
            
            $().ready(function () {                
                $("#CBArticulos").chosen().change(function () {
                    //alert("Selecciono " + $(this).val
                    if ($(this).val() > 0){
                        BuscarArticulo($(this).val());
                    }
                });
                
                $("#CBAreas").chosen();
                
                $("#BtnBuscarAreaTraspaso").button({ icons: { primary: 'ui-icon-search' }, text: false }).click(function () {
                    ObtenerDescripcionLocalizacion($("#TBIDLocalizacionTraspaso").val());
                });
                
                $("#TBCantidadTraspaso").change(function () {
                    if(parseInt($(this).val()) > parseInt($("#LblExistenciaActual").html())){
                        $(this).val(parseInt($("#LblExistenciaActual").html()));
                    }
                });
                
                $(".Numerico").keydown(function(e) {
                    if ((e.keyCode < 48 || e.keyCode > 57) && (e.keyCode != 8 || e.keyCode != 9)) {
                        e.preventDefault();
                  }
                });
                
                $("#TblLocalizacionArticulos").jqGrid({
                    //data: Articulo.Areas,
                    datatype: 'local',
                    colNames: ['ClaveAC', 'ClaveInternaAC', 'Área', 'Descripción', 'Cantidad'],
                    colModel: [
                        { name: 'claveAC', index: 'claveAC', width: 30, sortable: false, resizable: false, align: "right", hidden: true },
                        { name: 'claveinternaAC', index: 'claveinternaAC', width: 30, sortable: false, resizable: false, align: "right", hidden: true },
                        { name: 'idlocalizacion', index: 'idlocalizacion', width: 30, sortable: false, resizable: false, align: "right" },
                        { name: 'descripcion', index: 'descripcion', sortable: false },
                        { name: 'cantidad', index: 'cantidad', width: 30, sortable: false, resizable: false, align: "right" }
                    ],
                    height: 200,
                    width: 450,
                    rowNum: 20,
                    onSelectRow: function (id) {
                            var Localizacion = $(this).jqGrid('getRowData',id);
                            $("#TBClaveAC").val(Localizacion.claveAC);
                            $("#TBClaveInternaAC").val(Localizacion.claveinternaAC);
                            $("#LblIDLocalizacion").html(Localizacion.idlocalizacion);
                            $("#LblDescripcionLocalizacion").html(Localizacion.descripcion);
                            $("#LblExistenciaActual").html(Localizacion.cantidad);

                            $("#CBAreas").val("0");
                            $("#TBCantidadTraspaso").val("0");

                            $("#DivTraspaso").slideDown(function () {
                                $("#CBAreas").focus();
                            });
                    }
                });
                
                $(".BtnTransferir").click(function () {
                    //alert($("#CBArticulos").val() + " | " + $("#TBClaveAC").val() + " | " + $("#TBClaveInternaAC").val() + " | " + $("#LblIDLocalizacion").html() + " | " + $("#CBAreas").val() + " | " + $("#TBCantidadTraspaso").val());
                    RegistrarTransferencia($("#CBArticulos").val(), $("#TBClaveAC").val(), $("#TBClaveInternaAC").val(), $("#LblIDLocalizacion").html(), $("#CBAreas").val(), $("#TBCantidadTraspaso").val());
                });
                
                $(".BtnLimpiar").click(function () {
                    LimpiarSeleccion();
                })
            });
            
            function BuscarArticulo(xIDCABMSConsumible) {
                $("#DivLocalizacion").slideUp("slow", function () {
                    $("#DivTraspaso").hide();
                    $.ajax({
                        url: '../../../scripts/oper_inventario.php',
                        type: 'get',
                        data: 'o=ObtenerDescripcionArticuloCABMS&idcabmsconsumible=' + xIDCABMSConsumible,
                        success: function (Respuesta) {
                            var Articulo = eval("(" + Respuesta + ")");
                            if(Articulo.Areas.length > 0){
                                $("#TblLocalizacionArticulos").jqGrid('setGridParam',{data: Articulo.Areas}).trigger("reloadGrid");
                                $("#DivLocalizacion").show();
                                $("#CBAreas").val('').trigger("liszt:updated");
                            } else {
                                alert("No existe el Articulo.");
                            }
                        },
                        error: function (a, b, c) {
                            //alert("a)" + a.responseText);
                            alert("Error. Intentelo nuevamente mas tarde.");
                        }
                    });
                });
            }
            
            function ObtenerDescripcionLocalizacion(xIDLocalizacion){
                $.ajax({
                    url: '../../../scripts/oper_inventario.php',
                    type: 'get',
                    data: 'o=ObtenerDescripcionLocalizacion&idlocalizacion=' + xIDLocalizacion,
                    success: function (Respuesta) { 
                        var Localizacion = eval("(" + Respuesta + ")");
                        if (Localizacion.Descripcion != ""){
                            $("#LblDescripcionLocalizacionTraspaso").html(Localizacion.Descripcion);
                            $("#TBCantidadTraspaso").select();
                        } else {
                            $("#LblDescripcionLocalizacionTraspaso").html("");
                            alert("El Área no existe.");
                            $("#TBIDLocalizacionTraspaso").select();
                        }
                    },
                    error: function (a, b, c) {
                        //alert("a)" + a.responseText);
                        alert("Error. Intentelo nuevamente mas tarde.");
                    }
                });
            }
            
            function RegistrarTransferencia(xIDCABMS, xClaveAC, xClaveInternaAC, xIDLocalizacionOrigen, xIDLocalizacionTraspaso, xCantidad){
                
                $.ajax({
                    url: '../../../scripts/oper_inventario.php',
                    type: 'get',
                    data: 'o=RegistrarTransferencia&idcabms=' + xIDCABMS + '&claveac=' + xClaveAC + '&claveinternaac=' + xClaveInternaAC + '&idlocalizacionorigen=' + xIDLocalizacionOrigen + '&idlocalizaciontraspaso=' + xIDLocalizacionTraspaso + '&cantidad=' + xCantidad,
                    success: function (Respuesta) {
                        var Articulo = eval("(" + Respuesta + ")");
                        switch(Articulo.Transferido) {
                            case -2:
                                alert("No se registro la Reducción.");
                                break;
                            case -1:
                                alert("No se registro o actualizo la Ampliación.");
                                break;
                            case 0:
                                alert("El numero de Articulos a Transferir es Mayor al numero de Articulos Existentes.");
                                break;
                            case 1:
                                alert("Se realizo la Transferencia satisfactoriamente.");
                                BuscarArticulo($("#CBArticulos").val());
                                break;
                        }
                    },
                    error: function (a, b, c) {
                        alert("a)" + a.responseText);
                        //alert("Error. Intentelo nuevamente mas tarde.");
                    }
                });
            }
            
            function LimpiarSeleccion(){
                //$("#CBArticulos option:selected").removeAttr("selected");
                location.reload();
            }
        </script>
    </head>
    <body onload="MM_preloadImages('../../interfaz_modulos/botones/funciones_over.png','../../interfaz_modulos/botones/salir_over.jpg','../../interfaz_modulos/botones/traspasar_over.jpg','../../interfaz_modulos/botones/limpiar_over.jpg','../../interfaz_modulos/botones/aceptar_over.jpg')">
    <form>
        <div style="width:1006px; position: relative; margin-left: auto; margin-right: auto; top: 0px;">
            <div class="modulos" id="apDiv1"></div>
            <div class="inicio" id="apDiv2"></div>
            <div class="txt_titulo_secciones" id="apDiv11"> / Ubicación dentro de Almacén</div>
            <div id="apDiv4"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image5','','../../interfaz_modulos/botones/funciones_over.png',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/funciones.png" alt="" name="Image5" width="150" height="50" border="0" id="Image5" /></a></div>
            <div id="DivContenido">
                <h2>Traspaso</h2><br/>
                <table border="0" style="width: 980px;">
                    <tr>
                        <td>
                            <?php                                
                                $I = new Inventario();
                                $Articulos = $I->ObtenerDescripcionArticulosCABMS();
                            ?>
                            <span class="txt_titulos_bold">Artículo CABMS:</span>&nbsp;
                            <select data-placeholder="Seleccione un Artículo..." style="width:350px;" class="chzn-select" id="CBArticulos">
                                <option value="0"></option>
                                <?php
                                    foreach($Articulos as $Articulo){
                                        echo "<option value='".$Articulo->IDCABMSConsumible."'>".utf8_encode($Articulo->Descripcion)."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div id="DivLocalizacion" style="display: none;">
                                <table border="0" style="width: 100%;">
                                    <tr valign="top">
                                        <td>
                                            <table id="TblLocalizacionArticulos"></table>
                                            <i>Seleccione el Área de donde desea hacer el Traspaso.</i>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td style="width: 100%;">
                                            <div id="DivTraspaso" style="display: none;">
                                                <table border="0" style="width: 100%;">
                                                    <tr><td colspan="5" class="txt_titulos_bold">Traspasar de</td></tr>
                                                    <tr valign="top">
                                                        <td style="width: 130px;">
                                                            <input id="TBClaveAC" type="hidden" />
                                                            <input id="TBClaveInternaAC" type="hidden" /><br/>
                                                            <span class="txt_titulos_bold">Area:</span><br/>
                                                            <span id="LblIDLocalizacion"></span>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <span class="txt_titulos_bold">Descripción:</span><br/>
                                                            <span id="LblDescripcionLocalizacion"></span>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td style="width: 50px; text-align: center; ">
                                                            <span class="txt_titulos_bold">Cantidad:</span><br/>
                                                            <span id="LblExistenciaActual" class="Numerico"></span>
                                                        </td>
                                                    </tr>
                                                    <tr><td colspan="5" class="txt_titulos_bold">Traspasar a</td></tr>
                                                    <tr valign="top">
                                                        <td colspan="3">
                                                            <span class="txt_titulos_bold">Area:</span><br/>
                                                            <?php                                
                                                                $I = new Inventario();
                                                                $Areas = $I->ObtenerLocalizaciones();
                                                            ?>
                                                            <select id="CBAreas" data-placeholder="Seleccione un Área..." style="width:350px;" class="chzn-container chzn-container-single">
                                                                <option value="0"></option>
                                                                <?php
                                                                    foreach($Areas as $Area){
                                                                        echo "<option value='".$Area->IDLocalizacion."'>".utf8_encode($Area->Descripcion)."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <span class="txt_titulos_bold">Cantidad:</span><br/>
                                                            <input id="TBCantidadTraspaso" type="text" value="0" class="boxes_form100px Numerico" style="text-align: center; width: 50px;" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="apDiv6"></div>
            <!--
            <div id="apDiv14"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','../../interfaz_modulos/botones/aceptar_over.jpg',1)"><img src="../../interfaz_modulos/botones/aceptar.jpg" name="Image7" width="120" height="45" border="0" id="Image7" /></a></div>
            -->
            <div id="apDiv9"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','../../interfaz_modulos/botones/traspasar_over.jpg',1)"><img src="../../interfaz_modulos/botones/traspasar.jpg" name="Image4" width="120" height="45" border="0" id="Image4" class="BtnTransferir" /></a></div>
            <div id="apDiv8"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','../../interfaz_modulos/botones/limpiar_over.jpg',1)"><img src="../../interfaz_modulos/botones/limpiar.jpg" name="Image6" width="120" height="45" border="0" id="Image6" class="BtnLimpiar" /></a></div>
            <div id="apDiv7"><a href="../../menu_procesos.php" target="_self" onmouseover="MM_swapImage('Image3','','../../interfaz_modulos/botones/salir_over.jpg',1)" onmouseout="MM_swapImgRestore()"><img src="../../interfaz_modulos/botones/salir.jpg" alt="" name="Image3" width="120" height="45" border="0" id="Image3" /></a></div>
        </div>
    </form>
    </body>
</html>
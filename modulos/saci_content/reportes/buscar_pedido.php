<script>
    $().ready(function () {
        $(".TBCriterioBusqueda").change(function () {
            //alert($(this).val());
        });
        
        $("#BtnConsultarBD").button({ icons: { primary: 'ui-icon-search' } }).click(function (){
            //alert($(".TBCriterioBusqueda:checked").val());
            if (
                ($(".TBCriterioBusqueda:checked").val()) && 
                ($("#TBTextoBusqueda").val() != "")
                ) {
                $.ajax({
                    url: '../../../scripts/oper_generacion_de_notas_de_cargo.php',
                    data: 'o=ConsultaPedidos&textobusqueda=' + $("#TBTextoBusqueda").val() + '&criterio=' + $(".TBCriterioBusqueda:checked").val(),
                    type: 'get',
                    success: function (Respuesta) {
                        var Resultados = eval("(" + Respuesta + ")");
                        if (Resultados.Pedidos.length > 0) {
                            $("#TblBusquedaPedidos").jqGrid('setGridParam',{data: Resultados.Pedidos}).trigger("reloadGrid");
                        } else {
                            $("#TblBusquedaPedidos").jqGrid("clearGridData", true).trigger("reloadGrid");
                            alert("La busqueda no arrojo resultados.");
                        }
                    },
                    error: function (a, b, c) {
                        alert("a) " + a.responseText + "\nb) " + b + "\nc) " + c);
                    }
                });
            } else {
                alert("Faltan campos por llenar.");
            }
        });
        
        $("#TblBusquedaPedidos").jqGrid({
            datatype: 'local',
            colNames: ['Pedido', 'Proveedor', 'Fecha', 'IDUA', 'IDUnidad Administrativa', 'Unidad Administrativa'],
            colModel: [
                { name: 'idpedido', id: 'idpedido', width: 80, sortable: false, resizable: false, align: "center" },
                { name: 'proveedor', id: 'proveedor', width: 190, sortable: false, resizable: false },
                { name: 'fecharegistro', id: 'fecharegistro', width: 80, sortable: false, resizable: false },
                { name: 'idua', id: 'idua', hidden: true },
                { name: 'idunidadadministrativa', id: 'idunidadadministrativa', hidden: true },
                { name: 'unidadadministrativa', id: 'unidadadministrativa', hidden: true }
            ],
            height: 200,
            width: 370
        });
    });
</script>
<table border="0" style="width: 100%;">
    <tr>
        <td>
            <span class="txt_titulos_bold">Criterio de Búsqueda:</span>
        </td>
        <td>&nbsp;</td>
        <td>
            <input name="RdoBusqueda" type="radio" class="TBCriterioBusqueda" value="1" checked="checked" />&nbsp;Clave            
        </td>
        <td>&nbsp;</td>
        <td>
            <input name="RdoBusqueda" type="radio" class="TBCriterioBusqueda" value="2" />&nbsp;Descripción            
        </td>
    </tr>
    <tr>
        <td>
            <span class="txt_titulos_bold">Texto a buscar:</span>            
        </td>
        <td>&nbsp;</td>
        <td colspan="3"><input id="TBTextoBusqueda" type="text" style="width: 100%;" /></td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: right;">
            <button id="BtnConsultarBD">Consultar</button>
        </td>
    </tr>
    <tr><td colspan="5">&nbsp;</td></tr>
    <tr>
        <td colspan="5">
            <table id="TblBusquedaPedidos" style="width: 100%;"></table>
            <div id="DivPaginadorTblBusquedaPedido"></div>
        </td>
    </tr>
</table>
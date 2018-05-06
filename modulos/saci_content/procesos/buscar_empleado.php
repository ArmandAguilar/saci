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
                    url: '../../../scripts/oper_entrada_inventariables.php',
                    data: 'o=ConsultaEmpleados&textobusqueda=' + $("#TBTextoBusqueda").val() + '&criterio=' + $(".TBCriterioBusqueda:checked").val(),
                    type: 'get',
                    success: function (Respuesta) {
                        var Resultados = eval("(" + Respuesta + ")");
                        if (Resultados.Empleados.length > 0) {
                            $("#TblBusquedaEmpleado").jqGrid('setGridParam',{data: Resultados.Empleados}).trigger("reloadGrid");
                        } else {
                            $("#TblBusquedaEmpleado").jqGrid("clearGridData", true).trigger("reloadGrid");
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
        
        $("#TblBusquedaEmpleado").jqGrid({
            datatype: 'local',
            colNames: ['RFC', 'Nombre', 'Cargo'],
            colModel: [
                { name: 'rfc', id: 'rfc', width: 80, sortable: false, resizable: false, align: "center" },
                { name: 'nombre', id: 'nombre', width: 170, sortable: false, resizable: false },
                { name: 'cargo', id: 'cargo', width: 100, sortable: false, resizable: false }
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
            <input name="RdoBusqueda" type="radio" class="TBCriterioBusqueda" value="1" checked="checked" />&nbsp;RFC            
        </td>
        <td>&nbsp;</td>
        <td>
            <input name="RdoBusqueda" type="radio" class="TBCriterioBusqueda" value="2" />&nbsp;Nombre            
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
            <table id="TblBusquedaEmpleado" style="width: 100%;"></table>
        </td>
    </tr>
</table>
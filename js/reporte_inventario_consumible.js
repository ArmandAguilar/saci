 $(function() {
                 $("#txtFechaInicial").datepicker();
                 $("#txtFechaFinal").datepicker();
               }); 
               
function load_reporte()
{
    var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();       
      
    $("#Tbl").jqGrid({
        url: '../../../scripts/oper_reporte_inventario_consumible.php?o=1' + '&v2=' + v2 + '&v3=' + v3,
        datatype: 'json',
        colNames: ['Id_CveARTCABMS','Id_CveInternaAC','Partida Presupuestal','Descripcion','Unidad de Medida','Costo Promedio','Apartado','Disponible','Total'],
        colModel: [
            { name: 'Cve. Art. CABMS', index: 'Id_CveARTCABMS', hidden: true },
            { name: 'Cve. Interna. AC', index: 'Id_CveInternaAC', hidden: true },
            { name: 'Partida Presupuestal', index: 'ePartidaPresupuestal' },
            { name: 'Descripcion', index: 'vDescripcion' },
            { name: 'Unidad Admin', index: 'vDescripcionUM' },
            { name: 'Costo Promedio Actual', index: 'mCostoPromedioActual' },
            { name: 'Cantidad Existencia Apartada', index: 'eCantidadExistenciaApartada' },
            { name: 'Cantidad Distribuida', index: 'CantidadDis' },
            { name: 'Total', index: 'Total' }
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
    $("#DivExportar").show();
}


function saver_Order()
{
       
}
function ejecutar()
{
    $("#DivLoad").show();
    var losdatos = {FechaInicio:$("#txtFechaInicial").val(),FechaFinal:$("#txtFechaFinal").val()};
    
    $.ajax({
                url:'../../../scripts/oper_reporte_inventario_consumible.php?o=2',
                type:'POST',
                data:losdatos,
                success:function(data)
                {
                	//alert(data);
                    $("#DivLoad").hide();
                    $("#DivReporte").append(data); 
                    
                    
                },
                error:function(req,e,er) {
                        alert('error!');
                }
	    });
}
function open_Pdf()
{
    var v1 =$("#txtFechaInicial").val();
	var v2 =$("#txtFechaFinal").val();   
    window.open('pdf/reporte_inventario_consumible_pdf.php?v1=' + v1 + '&v2=' + v2,'', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
	var v1 =$("#txtFechaInicial").val();
	var v2 =$("#txtFechaFinal").val(); 
    window.open('xls/reporte_inventario_consumible_xls.php?v1=' + v1 + '&v2=' + v2,'', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
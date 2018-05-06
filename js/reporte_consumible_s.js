$(function() {
                 $("#txtFechaInicial").datepicker();
                 $("#txtFechaFinal").datepicker();
               }); 


function load_reporte()
{
    var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();
    $("#Tbl").jqGrid({
        url: '../../../scripts/oper_reporte_consumible_s.php?o=1' + '&v2=' + v2 + '&v3=' + v3,
        datatype: 'json',
        colNames: ['Registro','Folio','Documento','Descripcion','Partida Presupuestal','Id_CveARTCABMS','Id_CveInternaAC','Cantidad','Costo Unitario','Importe','Id_CABMS','Pedido','Descripcion'],
        colModel: [
            { name: 'Fecha', index: 'dFechaRegistro' },
            { name: 'Folio', index: 'nFolio' },
            { name: 'Documento', index: 'vDocumento' },
            { name: 'Descripcion', index: 'vDescripcion' },
            { name: 'Partida Presupuestal', index: 'ePartidaPresupuestal' },
            { name: 'ART. CABMS', index: 'Id_CveARTCABMS', hidden: true },
            { name: 'Cve. Interna AC', index: 'Id_CveInternaAC', hidden: true },
            { name: 'Cantidad', index: 'eCantidad' },
            { name: 'Costo Unitario', index: 'mCostoUnitario' },
            { name: 'Importe', index: 'nImporte' },
            { name: 'CABMS', index: 'Id_CABMS' },
            { name: 'Num Pedido', index: 'vNumPedido' },
            { name: 'Descripcion', index: 'vDescripcion' },
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
	var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();
    $("#DivReporte").empty(); 
    var losdatos = {v2:v2,v3:v3};
	    $("#DivTrabajo").empty();
	    $("#DivLoad").show();
	    $.ajax({
	                url:'../../../scripts/oper_reporte_consumible_s.php?o=2',
			        type:'POST',
			        data:losdatos,
			        success:function(data)
	                       {
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
	var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();
    window.open('pdf/reporte_salidas_pdf.php?v2=' + v2 + '&v3=' + v3, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
	var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();
    window.open('xls/reporte_salidas_xls.php?v2=' + v2 + '&v3=' + v3, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
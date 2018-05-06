$(function() {
                 $("#txtFechaInicial").datepicker();
                 $("#txtFechaFinal").datepicker();
               }); 


function load_reporte()
{
    var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();
    $("#Tbl").jqGrid({
        url: '../../../scripts/oper_reporte_consumible_e.php?o=1' + '&v2=' + v2 + '&v3=' + v3,
        datatype: 'json',
        colNames: ['Id_CveARTCABMS','Id_CveInternaAC','Registro','Pedido','Documento','Total','Cantidad','Id_CABMS','Descripcion Articulo','Tipo Movimiento','Id_Proveedor', 'Proveedor'],
        colModel: [
            { name: 'CveARTCABMS', index: 'Id_CveARTCABMS', hidden: true },
            { name: 'CveInternaAC', index: 'Id_CveInternaAC', hidden: true },
            { name: 'Fecha', index: 'dFechaMovRegistro' },
            { name: 'Num. Pedido', index: 'vNumPedido' },
            { name: 'Documento', index: 'vDocumento' },
            { name: 'Total', index: 'Total' },
            { name: 'Cantidad', index: 'eCantidad' },
            { name: 'CABMS', index: 'Id_CABMS', hidden: true },
            { name: 'descripcionC', index: 'descripcionC' },
            { name: 'descripcionTM', index: 'descripcionTM' },
            { name: 'Id_Proveedor', index: 'Id_Proveedor', hidden: true },
            { name: 'proveedor', index: 'proveedor' }
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 50
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
	                url:'../../../scripts/oper_reporte_consumible_e.php?o=2',
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
	var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();
    window.open('pdf/reporte_entrada_pdf.php?v2=' + v2 + '&v3=' + v3, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
	var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();
    window.open('xls/reporte_entrada_xls.php?v2=' + v2 + '&v3=' + v3, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
 $(function() {  
    $("#dialog").dialog({
                        autoOpen: false,
                        width: 750,
                        height: 400
                });
            });
$(function() {  
    $("#dialog2").dialog({
                        autoOpen: false,
                        width: 750,
                        height: 400
                });
            });
 $(function() {
                 $("#txtFechaInicial").datepicker();
                 $("#txtFechaFinal").datepicker();
               });           
function onPedidoInicial()
{
   $("#dialog").dialog("open"); 
}
function onPedidoFinal()
{
   $("#dialog2").dialog("open"); 
}
function buscar_pedidoInicial()
{
    $("#DivLoad1").show();
    var Folio = $("#chkFolio:checked").val();
    var Requisicion = $("#chkRequisicion:checked").val();
    var Licitacion =$("#chkLicitacion:checked").val();
    
    if(Folio=="Folio")
     {
         Folio='Si';
     }
    
   if(Requisicion=="Requisicion")
     {
         Requisicion='Si';
     }
   
   if(Licitacion=="Licitacion")
     {
       Licitacion='Si';  
     }
   
      
    var losdatos ={txtPatron:$("#txtPatron").val(),Folio:Folio,Requisicion:Requisicion,Licitacion:Licitacion};
    $("#GridBusquedaIncio").empty();
    
    $.ajax({
                url:'../../../scripts/oper_reporte_facturas.php?o=1',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                    $("#GridBusquedaIncio").append(data); 
                    $("#DivLoad1").hide();
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
        
}
function buscar_pedidoFinal()
{
    $("#DivLoad2").show();
    var Folio = $("#chkFolio2:checked").val();
    var Requisicion = $("#chkRequisicion2:checked").val();
    var Licitacion =$("#chkLicitacion2:checked").val();
    
    if(Folio=="Folio")
     {
         Folio='Si';
     }
    
   if(Requisicion=="Requisicion")
     {
         Requisicion='Si';
     }
   
   if(Licitacion=="Licitacion")
     {
       Licitacion='Si';  
     }
   
      
    var losdatos ={txtPatron:$("#txtPatron2").val(),Folio:Folio,Requisicion:Requisicion,Licitacion:Licitacion};
    $("#GridBusquedaFinal").empty();
    
    $.ajax({
                url:'../../../scripts/oper_reporte_facturas.php?o=2',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                    $("#GridBusquedaFinal").append(data); 
                    $("#DivLoad2").hide();
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
        
}
function Load_Reporte(){
    
    var v1= $("#txtFechaInicial").val();
    var v2=  $("#txtFechaFinal").val();
    var v3= $("#txtPedidoInicial").val();
    var v4= $("#txtPedidoFinal").val();
   
    $("#TblCABMS").empty();
    $("#DivPaginador").empty();
    $("#TblCABMS").jqGrid({
        url: '../../../scripts/oper_reporte_facturas.php?o=3&FI=' + v1 + '&FF=' + v2 + '&PI=' + v3 + '&PF=' + v4,
        datatype: 'json',
        colNames: ['Pedido', 'Proveedor', 'FechaPedido', 'No.Remicion', 'Importe'],
        colModel: [

            { name: 'Pedido', index: 'Pedido' },
            { name: 'Proveedor', index: 'Proveedor' },
            { name: 'Fecha Pedido', index: 'FechaPedido' },
            { name: 'No. Remicion', index: 'NoRemicion' },
            { name: 'Importe', index: 'Importe' },
        ],
        pager: "#DivPaginador", 
        height: 300,
        width: 900,
        rowNum: 20
    });
    $("#DivExportar").show();                    
   

}
function open_Pdf()
{
    var v1= $("#txtFechaInicial").val();
    var v2=  $("#txtFechaFinal").val();
    var v3= $("#txtPedidoInicial").val();
    var v4= $("#txtPedidoFinal").val();
    window.open('pdf/reporte_alta_facturas_pdf.php?v1=' + v1 + '&v2=' + v2 + '&v3=' + v3 + '&v4=' + v4, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
    var v1= $("#txtFechaInicial").val();
    var v2=  $("#txtFechaFinal").val();
    var v3= $("#txtPedidoInicial").val();
    var v4= $("#txtPedidoFinal").val();
    window.open('xls/reporte_alta_facturas_xls.php?v1=' + v1 + '&v2=' + v2 + '&v3=' + v3 + '&v4=' + v4, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
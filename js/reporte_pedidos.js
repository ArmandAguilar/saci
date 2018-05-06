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
                url:'../../../scripts/oper_reporte_pedido.php?o=1',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                    $("#GridBusquedaIncio").append(data); 
                    $("#DivLoad1").hide();
                    
		},
		error:function(req,e,er) {
			alert(er);
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
                url:'../../../scripts/oper_reporte_pedido.php?o=2',
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
function load_reporte()
{

    var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();
    var v4 = $("#txtPedidoInicial").val();
    var v5 = $("#txtPedidoFinal").val();

        $("#TblPedido").jqGrid({
             url: '../../../scripts/oper_reporte_pedido.php?o=3' + '&v2=' + v2 + '&v3=' + v3 + '&v4=' + v4 + '&v5=' + v5,
             datatype: 'json',
        colNames: ['Pedido','FechaRegistro','Licitacion','Proveedor','Importe'],
        colModel: [
            { name: 'Pedido', index: 'Pedido' },
            { name: 'Fecha Registro', index: 'FechaRegistro' },
            { name: 'Licitacion', index: 'Licitacion' },
            { name: 'Proveedor', index: 'Proveedor' },
            { name: 'Importe', index: 'Importe' }
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
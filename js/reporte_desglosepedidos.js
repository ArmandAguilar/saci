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
                url:'../../../scripts/oper_reporte_desglosepedidos.php?o=1',
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
                url:'../../../scripts/oper_reporte_desglosepedidos.php?o=2',
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
    
    var v1 = $("#txtOrden").val();
    var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();
    var v4 = $("#txtPedidoInicial").val();
    var v5 = $("#txtPedidoFinal").val();
    var losdatos= {
        v1:v1,
        v2:v2,
        v3:v3,
        v4:v4,
        v5:v5
        
    }
    
    /*$.ajax({
    	url: '../../../scripts/oper_reporte_desglosepedidos.php?o=3&v1=' + v1 + '&v2=' + v2 + '&v3=' + v3 + '&v4=' + v4 + '&v5=' + v5,
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                   alert(data);
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});*/
        
       
    $("#TblPedidoDesglose").jqGrid({
             url: '../../../scripts/oper_reporte_desglosepedidos.php?o=3&v1=' + v1 + '&v2=' + v2 + '&v3=' + v3 + '&v4=' + v4 + '&v5=' + v5,
             datatype: 'json',
        colNames: ['Pedido','Licitacion','Proveedor','AreaSolicitante','Descripcion','PrecioUnitario','PrecioConIva','Cantidad','Unidad'],
        colModel: [{ name: 'Pedido', index: 'Pedido' },
                    { name: 'Licitacion', index: 'Licitacion' },
                    { name: 'Proveedor', index: 'Proveedor' },
                    { name: 'AreaSolicitante', index: 'AreaSolicitante' },
                    { name: 'Descripcion', index: 'Descripcion' },
                    { name: 'PrecioUnitario', index: 'PrecioUnitario' },
                    { name: 'PrecioConIva', index: 'PrecioConIva' },
                    { name: 'Cantidad', index: 'Cantidad' },
                    { name: 'Unidad', index: 'Unidad' }
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
    var v1 = $("#txtOrden").val();
    var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();
    var v4 = $("#txtPedidoInicial").val();
    var v5 = $("#txtPedidoFinal").val();
    window.open('pdf/reporte_desglosepedidos_pdf.php?v1=' + v1 + '&v2=' + v2 + '&v3=' + v3 + '&v4=' + v4 + '&v5=' + v5, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
    var v1 = $("#txtOrden").val();
    var v2 = $("#txtFechaInicial").val();
    var v3 = $("#txtFechaFinal").val();
    var v4 = $("#txtPedidoInicial").val();
    var v5 = $("#txtPedidoFinal").val();
    window.open('xls/reporte_desglosepedidos_xls.php?v1=' + v1 + '&v2=' + v2 + '&v3=' + v3 + '&v4=' + v4 + '&v5=' + v5, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}

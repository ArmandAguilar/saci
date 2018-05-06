$(function() {  
    $("#dialog1").dialog({
                        autoOpen: false,
                        width: 750,
                        height: 400
                });
    $("#dialog2").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      });
    $("#dialog3").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      });
    
   
            });
function saver_Order()
{
       
}
function load_frm()
{
	 $.ajax({
		 		url:'../../../scripts/oper_procesos_entrada.php?o=1',
				type:'POST',
				success:function(data)
			         {
			             $("#DivContenido").append(data);   
				      },
				error:function(req,e,er) {
					alert('error!');
				}
	       }); 	
}
function load_buscar_pedidor()
{
	$("#dialog1").dialog('open');
}
function buscar_pedido()
{
	
	
	var Folio = $("#chkFolio:checked").val();
    var Descripcion = $("#chkDescripcion:checked").val();
    if(Folio=="Folio")
    {
        Folio='Si';
    }
   
  if(Descripcion=="Descrupcion")
    {
        Descripcion='Si';
    }

	var losdatos = {Patron:$("#txtPatron").val(),txtFolio:Folio,txtDescripcion:Descripcion};
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=2',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
	             $("#GridBusqueda").append(data);   
		      },
		error:function(req,e,er) {
			alert('error!');
		}
   }); 
}
function sel_pedido(idpedido,fecha,proveedor)
{
	$("#TBIDPedido").val(idpedido);
	$("#TBFechaPedido").val(fecha);
	$("#TBProveedor").val(proveedor);
	/*cargamos grid */
	var losdatos = {id:idpedido};
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=3',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
	             $("#DivGridPedido").append(data);   
		      },
		error:function(req,e,er) {
			alert('error!');
		}
   }); 
	
	
	
}
function selecion_grid()
{ 
	var idpedido =1;
	var losdatos = {id:idpedido};
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=4',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
			    alert(data);
	             $("#DivDetalles").append(data);   
		      },
		error:function(req,e,er) {
			alert('error!');
		}
   }); 
}

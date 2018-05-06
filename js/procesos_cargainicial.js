$(function() {  
	    $("#AgergarCambs").dialog({
	                        autoOpen: false,
	                        width: 550,
	                        height: 300
	                });
	    $("#EliminarCambs").dialog({
	        autoOpen: false,
	        width: 450,
	        height: 300
	    });
	    $("#ModificarCambs").dialog({
            autoOpen: false,
            width: 450,
            height: 300
        });
 });
function pop_AgregarCambs()
{
   $("#AgergarCambs").dialog("open"); 
} 
function AgregarCambs()
{
  var losdatos = {
		         IdCambs:$("#CboCambs").val(),
		         Cantidad:$("#txtCantidad").val(),
                 IdUnidadAdmin:$("#CBUnidadesAdministrativas").val(),
                 FechaRegistro:$("#TBFechaElaboracion").val(),
                 TipoDocumento:$("input:radio[name=TBTipoCarga]:checked").val()
                 
              };
   $.ajax({
		    url:'../../../scripts/oper_procesos_cargainicial.php?o=Registro',
			type:'POST',
			data:losdatos,
			success:function(data)
			       {
			           $("#DivTrabajo").append(data); 
			           $("#AgergarCambs").dialog("close");
			           ObtenerDetalleCargaInicial($("#CBUnidadesAdministrativas").val());
			           //alert(data);
					},
					error:function(req,e,er) {
						alert('error!');
					}
					}); 
   
} 
function ObtenerDetalleCargaInicial(id_unidadadmin)
{
	$("#DivGrid").empty();
	 $.ajax({
		    url: '../../../scripts/oper_procesos_cargainicial.php?o=ObtenerDetalleCargaInicial&idadmin=' + id_unidadadmin,
			type:'POST',
			success:function(data)
			       {
				       $("#DivGrid").append(data); 
				       //alert(data);
					},
					error:function(req,e,er) {
						alert('errormmmmmm!');
					}
		});

}
function saver_Order()
{
       document.frmOrderGrid.submit();
}
function view_eliminar(idcambs,vDescripcion,id)
{
	$("#IdCambsDiv").empty();
	$("#DesCambsDiv").empty();
	$("#IdCambsDiv").append(idcambs);
	$("#DesCambsDiv").append(vDescripcion);
	$("#txtIdEliminar").val(id);
	$("#EliminarCambs").dialog("open");
	
}
function view_editar(idcambs,vDescripcion,id,cantidad)
{
	$("#IdCambsEDiv").empty();
	$("#DesCambsEDiv").empty();
	$("#IdCambsEDiv").append(idcambs);
	$("#DesCambsEDiv").append(vDescripcion);
	$("#txtIdEditar").val(id);
	$("#txtCantidadM").val(cantidad);
	$("#ModificarCambs").dialog("open");
	
}
function borrar_registro()
{
	var losdatos = {id:$("#txtIdEliminar").val()};
	$.ajax({
	    url: '../../../scripts/oper_procesos_cargainicial.php?o=Borrar',
		type:'POST',
		data:losdatos,
		success:function(data)
		       {
				     $("#EliminarCambs").dialog("close");
				     $("#txtIdEliminar").val('');
				     ObtenerDetalleCargaInicial($("#CBUnidadesAdministrativas").val());
				     
				},
				error:function(req,e,er) {
					alert('error!');
				}
	});
}
function modificar_registro()
{
	var losdatos = {cantidad:$("#txtCantidadM").val(),
					idactulaizar:$("#txtIdEditar").val()};
	$.ajax({
	    url: '../../../scripts/oper_procesos_cargainicial.php?o=Modificar',
		type:'POST',
		data:losdatos,
		success:function(data)
		       {
				     $("#ModificarCambs").dialog("close");
				     $("#txtIdEliminar").val('');
				     $("#txtCantidadM").val('');
				     ObtenerDetalleCargaInicial($("#CBUnidadesAdministrativas").val());
				    // alert(data);
				     
				},
				error:function(req,e,er) {
					alert('error!');
				}
	});
	
}
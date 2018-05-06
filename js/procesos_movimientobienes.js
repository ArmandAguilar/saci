$(function() {  
    $("#dialog").dialog({
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
 
function onCal()
{
	alert('a');
	}
function load_inv_frm()
{
	$("#dialog").dialog('open');
}
function load_emp_frm(frm)
{
	$("#dialog2").dialog('open');
	$("#txtRow").val(frm);
}
function load_ua_frm()
{
	$("#dialog3").dialog('open');
	
	
}
function load_frm()
{
	$("#DivTrabajo").empty();
	$.ajax({
        url:'../../../scripts/oper_procesos_movimientobienes.php?o=1',
        type:'POST',
        success:function(data)
        {
        	$("#DivTrabajo").append(data);   
        },
        error:function(req,e,er) {
                alert('error!');
        }
});
}
function buscar_inv()
{
	$("#DivLoad1").show();
	 var Clave = $("#chkClave:checked").val();
	 var Descripcion = $("#chkDescripcion:checked").val();
	    
	    
	    if(Clave=="Clave")
	     {
	         Clave='Si';
	     }
	    
	   if(Descripcion=="Descripcion")
	     {
		   Descripcion='Si';
	     }

	    var losdatos ={txtPatron:$("#txtPatron").val(),Clave:Clave,Descripcion:Descripcion};
	    $("#GridBusqueda").empty();
	    $.ajax({
	                url:'../../../scripts/oper_procesos_movimientobienes.php?o=2',
	                type:'POST',
	                data:losdatos,
	                success:function(data)
	                	{
	                    	$("#GridBusqueda").append(data); 
	                    	$("#DivLoad1").hide();
	                	},
	                	error:function(req,e,er) {
	                		alert('error!');
	                	}
		});
}
function buscar_empleado()
{
	$("#DivLoad2").show();
	 var Clave = $("#chkClave2:checked").val();
	 var Nombre = $("#chkNombre:checked").val();
	    
	    
	    if(Clave=="Clave")
	     {
	         Clave='Si';
	     }
	    
	   if(Nombre=="Nombre")
	     {
		   Nombre='Si';
	     }

	      
	    var losdatos ={txtPatron:$("#txtPatron2").val(),Clave:Clave,Nombre:Nombre};
	    $("#GridBusqueda2").empty();
	    $.ajax({
	                url:'../../../scripts/oper_procesos_movimientobienes.php?o=4',
			type:'POST',
	         data:losdatos,
			success:function(data)
	                {
	                    $("#GridBusqueda2").append(data); 
	                    $("#DivLoad2").hide();
			},
			error:function(req,e,er) {
				alert('error!');
			}
		});
}
function buscar_ua()
{
	 var Clave = $("#chkClave3:checked").val();
	 var Descripcion = $("#chkDescripcion3:checked").val();
	    
	    
	    if(Clave=="Clave")
	     {
	         Clave='Si';
	     }
	    
	   if(Descripcion=="Descripcion")
	     {
		   Descripcion='Si';
	     }

	      
	    var losdatos ={txtPatron:$("#txtPatron3").val(),Clave:Clave,Descripcion:Descripcion};
	    $("#GridBusqueda3").empty();
	    $.ajax({
	                url:'../../../scripts/oper_procesos_movimientobienes.php?o=5',
			type:'POST',
	         data:losdatos,
			success:function(data)
	                {
	                    $("#GridBusqueda3").append(data); 
	                    
			},
			error:function(req,e,er) {
				alert('error!');
			}
		});
}
function selecionar_inv(noInv,IdCambs,DesCambs,TBien,modelo,marca,serie,idEdoBien,idMovimeinto)
{
    $("#txtNoInventario").val(noInv);
    $("#txtDes").val(DesCambs);
    $("#txtTipoBien").val(TBien);
    $("#GridBusqueda").empty();
    $("#DivMovimeintos").empty();
    $("#txtIDCAMBS").empty();
    $("#txtIdConsecutivo").empty();
    
    
    $("#txtIDCAMBS").val(IdCambs);
    $("#txtIdConsecutivo").val(noInv);
    $("#txtModelo").val(modelo);
    $("#txtMarca").val(marca);
    $("#txtNoSerie").val(serie);
    var losdatos = {idEdoBien:idEdoBien,idMovimeinto:idMovimeinto,idConsecutivo:noInv};
    $.ajax({
        url:'../../../scripts/oper_procesos_movimientobienes.php?o=3',
		type:'POST',
		data:losdatos,
		success:function(data)
                {
					//alert(noInv);
			       $("#DivMovimeintos").append(data);  
		        },
		error:function(req,e,er) {
			alert('error!');
		}
	 });
    
    $("#dialog").dialog('close');
}
function selecionar_empleado(id,des)
{
	
	var raid = $("#txtRow").val();
	
	switch(raid)
	{
	case '1':
				$("#txtNoEmpleado1").empty();
				$("#txtDes1").empty();
				
				$("#txtNoEmpleado1").val(id);
				$("#txtDes1").val(des);
			
		break;
	case '2':
				$("#txtNoEmpleado2").empty();
				$("#txtDes2").empty();
				
				$("#txtNoEmpleado2").val(id);
				$("#txtDes2").val(des);
				
		break;
		
	case '3':
				$("#txtNoEmpleado3").empty();
				$("#txtDes3").empty();
				
				$("#txtNoEmpleado3").val(id);
				$("#txtDes3").val(des);
				
		break;
	}
	$("#dialog2").dialog('close');
	
}
function seleccionar_ua(id,des)
{
	$("#txtIdUA").empty();
	$("#txtUAD").empty();
	
	$("#txtIdUA").val(id);
	$("#txtUAD").val(des);
	$("#dialog3").dialog('close');
}	
function registar_movimiento()
{
	
	/* Verificamos la unidad administrativa */
	
	var validaIdua = $("#txtIdUA").val();
	
	if(validaIdua == undefined)
	{
		smoke.signal('Unidad Administartiva no puede estar vacia!');
		
	}
	else
	{
			if(validaIdua == "")
			{
				smoke.signal('Unidad Administartiva no puede estar vacia!');
			}
			else
				{
						var losdatos ={
					    		Id_CABMS:$("#txtIDCAMBS").val(),
					          	Id_ConsecutivoInv:$("#txtIdConsecutivo").val(),
					          	Resguardante1:$("#txtNoEmpleado1").val(),
					          	Resguardante2:$("#txtNoEmpleado2").val(),
					          	Resguardante3:$("#txtNoEmpleado3").val(),
					          	Id_TipoMovimiento:$("#cboMovimiento").val(),
					          	Id_Unidad:$("#txtIdUA").val(),
					          	eNumFolio:$("#txtFolio").val(),
					          	dFechaResguardo:$("#txtFecha").val(),
					          	vDoctoOficial:$("#txtDocOficial").val(),
					          	Id_EdoBien:$("#cboEdoBien").val()};
						  $.ajax({
						        url:'../../../scripts/oper_procesos_movimientobienes.php?o=6',
								type:'POST',
								data:losdatos,
								success:function(data)
						                {
									       smoke.signal('Registro actualizado con exito!'); 
									       window.location.href='movimientos_de_bienes.php';
								        },
								error:function(req,e,er) {
									alert('error!');
								}
							 });
				
				}
			
	}  	
}
/*Movimeiento consultar*/
function consultar()
{
	var idconsecutivo = $("#txtIdConsecutivo").val();
	if(idconsecutivo == undefined)
	 {
		smoke.signal('Inventario no puede estar vacio!');
	 }
	else
		{
		if(idconsecutivo == "")
			  {
			    smoke.signal('Inventario no puede estar vacio!');
			  }
		   else{
			      var losdatos = {id:$("#txtIdConsecutivo").val()};
			      $("#DivTabs").empty();
			      $.ajax({
				        url:'../../../scripts/oper_procesos_movimientobienes.php?o=7',
						type:'POST',
						data:losdatos,
						success:function(data)
				                {
									 
									$("#DivTabs").append(data);
						        },
						error:function(req,e,er) {
							alert('error!');
						}
					 });
		       }
		}
	
}
/* Baja */
function baja()
{
 /*Verificamos estado anterior  o actual*/
	var idestado = $("#txtEdoMovientoActual").val();
	var validaIdua = $("#txtIdUA").val();
	
	if(idestado == undefined)
	 {
		smoke.signal('Estado previo no encontrado');
	 }
	else
		{
		if(idestado == "5")
			  {
			    
			     if(idestado == "7")
			    	{
			    	 smoke.signal('El articulo ya esta dado e baja');
			    	}
			     else
			    	 {
			    	     if(validaIdua == undefined)
			    	      {
			    	    	 smoke.signal('Unidad Administartiva no puede estar vacia!');
			    	      }	 
			    	     else
			    	    	 {
			    	    	      if(validaIdua == "") 
			    	    	        {
			    	    	    	  smoke.signal('Unidad Administartiva no puede estar vacia!');
			    	    	        }
			    	    	      else
			    	    	    	  {
			    	    	    	        /*ejecutamos baja */
							    	    	    	  var losdatos ={
							  					    		Id_CABMS:$("#txtIDCAMBS").val(),
							  					          	Id_ConsecutivoInv:$("#txtIdConsecutivo").val(),
							  					          	Resguardante1:$("#txtNoEmpleado1").val(),
							  					          	Resguardante2:$("#txtNoEmpleado2").val(),
							  					          	Resguardante3:$("#txtNoEmpleado3").val(),
							  					          	Id_TipoMovimiento:$("#cboMovimiento").val(),
							  					          	Id_Unidad:$("#txtIdUA").val(),
							  					          	eNumFolio:$("#txtFolio").val(),
							  					          	dFechaResguardo:$("#txtFecha").val(),
							  					          	vDoctoOficial:$("#txtDocOficial").val(),
							  					          	Id_EdoBien:$("#cboEdoBien").val()};
							  						  $.ajax({
							  						        url:'../../../scripts/oper_procesos_movimientobienes.php?o=6',
							  								type:'POST',
							  								data:losdatos,
							  								success:function(data)
							  						                {
							  									        smoke.signal('Registro actualizado con exito!');
							  									       window.location.href='movimientos_de_bienes.php';
							  								        },
							  								error:function(req,e,er) {
							  									alert('error!');
							  								}
							  							 });
			    	    	    	        
			    	    	    	  }
			    	    	 }
			    	 }
			    
			  }
		   else{
			      smoke.signal('El estado anterio debe de ser Pendiente de baja, para poder dar de baja este articulo!');
		       }
		}

}

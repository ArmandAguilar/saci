function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=1',
		type:'POST',
		success:function(data)
                {
                    $("#DivTrabajo").append(data); 
                    $("#contenido1").hide();
                    $("#contenido2").hide();
		},
		error:function(req,e,er) {
			alert('error!');
		}
	}); 
}
function saver_Order()
{
       document.frmOrderGrid.submit();
}
function guardar_pedido()
{
    var losdatos ={
                       cboProveedor:$("#cboProveedor").val(),
                       txtRequisicion:$("#txtRequisicion").val(),
                       txtLicitacion:$("#txtLicitacion").val(),
                       cbouadmin:$("#cbouadmin").val(),
                       txtEstatus:$("#txtEstatus").val(),
                       txtFecha:$("#txtFecha").val(),
                       txtFolio:$("#txtPeriodo").val(),
                       txtClave:$("#txtClave").val()
                  };
      var v1=$("#cboProveedor").val();
      var v2=$("#txtRequisicion").val();
      var v3=$("#txtLicitacion").val();
      var v4=$("#cbouadmin").val();
      var v5=$("#txtEstatus").val();
      var v6=$("#txtFecha").val();
      if(v1=="")
       {
         jQuery('#cboProveedor').validationEngine('validate');   
       }  
      else
          {
              if(v2=="")
                {
                    jQuery('#txtRequisicion').validationEngine('validate');
                }  
                else
                    {
                        if(v3=="")
                          {
                            jQuery('#txtLicitacion').validationEngine('validate');  
                          }
                       else
                          {
                             if(v4=="")
                              {
                                  jQuery('#cbouadmin').validationEngine('validate'); 
                              }
                             else
                                 {
                                     if(v5=="")
                                      {
                                         jQuery('#txtEstatus').validationEngine('validate'); 
                                      } 
                                    else
                                      {
                                          if(v6=="")
                                           {
                                             jQuery('#txtFecha').validationEngine('validate');  
                                           }
                                          else
                                          {
                                               $.ajax({
                                                        url:'../../../scripts/oper_pedidos.php?o=2',
                                                        type:'POST',
                                                        cache:false,
                                                        data:losdatos,
                                                        success:function(data)
                                                        {
                                                            var IdPedido = data;
                                                            var TextoFolio = "Folio : " + IdPedido;
                                                            $("#contenido1").show();
                                                            $("#contenido2").show();
                                                            smoke.signal('Pedido creado con exito, ahora puede agregar detalles al pedido');
                                                            $("#DivBtnGuardar").hide();
                                                            $("#txtFolio").val(IdPedido);
                                                            $("#DivFolio").show();
                                                            $("#DivFolio").append(TextoFolio);
                                                        },
                                                        error:function(req,e,er) {
                                                                alert('error!');
                                                        }
                                                });  
                                          }
                                      }
                                 }
                          }
                    }
                
              
          }
}
function load_cboartcambs(id)
{
    $("#DivCboArtCambs").empty();
     var losdatos = {id:id};
     $.ajax({
            url:'../../../scripts/oper_pedidos.php?o=3',
            type:'POST',
            cache:false,
            data:losdatos,
            success:function(data)
            {
                $("#DivCboArtCambs").append(data);
            },
            error:function(req,e,er) {
                    alert('error!');
            }
    });  
}
function add_partida()
{
  
    var losdatos = {txtPartida:$("#txtPartida").val(),
    				txtFolio:$("#txtFolio").val(),
                    rdAlmacen:$("#rdAlmacen").val(),
                    cbocambs:$("#cbocambs").val(),
                    cboArtCambs:$("#cboArtCambs").val(),
                    txtDescripcion:$("#txtDescripcion").val(),
                    txtCantidad:$("#txtCantidad").val(),
                    txtPrecio:$("#txtPrecio").val(),
                    txtIVA:$("#txtIVA").val(),
                    txtDescuento:$("#txtDescuento").val(),
                    cboUMedida:$("#cboUMedida").val()
                    };
            $.ajax({
                   url:'../../../scripts/oper_pedidos.php?o=4',
                   type:'POST',
                   cache:false,
                   data:losdatos,
                   success:function(data)
                   {
                	   //alert(data);
                       reload_grid($("#txtFolio").val());
                       
                        $("#txtDescripcion").val('');
                        $("#txtCantidad").val('0');
                        $("#txtPrecio").val('0');
                        $("#txtIVA").val('0');
                        $("#txtDescuento").val('');
                        
                    
                   },
                   error:function(req,e,er) {
                           alert('error!');
                   }
           });           
     
}
function add_partida_editar()
{
    
    var losdatos = {txtPartida:$("#txtPartida").val(),
    		        txtFolio:$("#txtFolios").val(),
                    rdAlmacen:$("#rdAlmacen").val(),
                    cbocambs:$("#cbocambs").val(),
                    cboArtCambs:$("#cboArtCambs").val(),
                    txtDescripcion:$("#txtDescripcion").val(),
                    txtCantidad:$("#txtCantidad").val(),
                    txtPrecio:$("#txtPrecio").val(),
                    txtIVA:$("#txtIVA").val(),
                    txtDescuento:$("#txtDescuento").val(),
                    cboUMedida:$("#cboUMedida").val()
                    };
            $.ajax({
                   url:'../../../scripts/oper_pedidos.php?o=4',
                   type:'POST',
                   cache:false,
                   data:losdatos,
                   success:function(data)
                   {
                       
                       reload_grid($("#txtFolios").val());
                       
                        $("#txtDescripcion").val('');
                        $("#txtCantidad").val('0');
                        $("#txtPrecio").val('0');
                        $("#txtIVA").val('0');
                        $("#txtDescuento").val('');
                    
                   },
                   error:function(req,e,er) {
                           alert('error!');
                   }
           });           
     
}
function reload_grid(id)
{
   
    $("#GridDetalle").empty();  
   var losdatos ={id:id}; 
   $.ajax({
            url:'../../../scripts/oper_pedidos.php?o=5',
            type:'POST',
            cache:false,
            data:losdatos,
            success:function(data)
            {
                $("#GridDetalle").append(data);
                load_grid_fechas(id);
            },
            error:function(req,e,er) {
                    alert('error!');
            }
           }); 
}
function load_grid_fechas(id)
{
    $("#GridDetalleFecha").empty();  
   var losdatos ={id:id}; 
   $.ajax({
            url:'../../../scripts/oper_pedidos.php?o=7',
            type:'POST',
            cache:false,
            data:losdatos,
            success:function(data)
            {
                $("#GridDetalleFecha").append(data);
            },
            error:function(req,e,er) {
                    alert('error!');
            }
           });
}
function borrar_pedido(id,idfechaentrega,idFolio)
{
    var losdatos ={id:id,idfechaentrega:idfechaentrega
    }; 
     
    smoke.confirm('Realmente desea borrar este registro?',function(e)
      {
	  if (e)
           {
                $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=6',
                type:'POST',
                cache:false,
                data:losdatos,
                success:function(data)
                {
                   reload_grid(idFolio); 
                },
                error:function(req,e,er) {
                        alert('error!');
                }
               }); 
	  }
        else
           {}
       });
}
function borrar_fecha_entrega(id,idfechaentrega,idFolio)
{
    var losdatos ={id:id,idfechaentrega:idfechaentrega}; 
     
    smoke.confirm('Realmente desea borrar este registro?',function(e)
      {
	  if (e)
           {
                $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=8',
                type:'POST',
                cache:false,
                data:losdatos,
                success:function(data)
                {
                   reload_grid(idFolio); 
                },
                error:function(req,e,er) {
                        alert('error!');
                }
               }); 
	  }
        else
           {}
       });
}
function terminar_pedido()
{
      document.frmOrderGridFecha.submit(); 
}
function frm_buscar_pedidos()
{
    $("#DivTrabajo").empty();
     $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=9',
                type:'POST',
                cache:false,
                success:function(data)
                {
                   $("#DivTrabajo").append(data);
                },
                error:function(req,e,er) {
                        alert('error!');
                }
               });
}
function buscar_pedido_edit()
{
    
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
    $("#DivBusqueda").empty();
    $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=10',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                    $("#DivBusqueda").append(data); 
                    
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
    
}
function frm_factura_editar(id)
{
    var losdatos = {id:id};
    $("#DivBusqueda").empty(); 
    $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=11',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                    $("#DivBusqueda").append(data); 
                    $("#divBuscador").hide(); 
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
}
function actualizar_pedido(noModificacion)
{
    var losdatos ={
                       cboProveedor:$("#cboProveedor").val(),
                       txtRequisicion:$("#txtRequisicion").val(),
                       txtLicitacion:$("#txtLicitacion").val(),
                       cbouadmin:$("#cbouadmin").val(),
                       txtEstatus:$("#txtEstatus").val(),
                       txtFecha:$("#txtFecha").val(),
                       txtFolio:$("#txtFolios").val(),
                       noModificacion:noModificacion
                  };
     $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=12',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                   smoke.signal('Pedido actualizado con exito'); 
                   terminar_pedido();
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});             
    
}
function frm_buscar_borrar_pedido()
{
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=13',
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

function buscar_borrar_pedido()
{
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
    $("#DivBusqueda").empty();
    $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=14',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                    $("#DivBusqueda").append(data); 
                    
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
    
}
function borrar_todo_pedido(id)
{
    var losdatos ={id:id}; 
     
    smoke.confirm('Realmente desea borrar este registro?',function(e)
      {
	  if (e)
           {
                $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=15',
                type:'POST',
                cache:false,
                data:losdatos,
                success:function(data)
                {
                    buscar_borrar_pedido();
                },
                error:function(req,e,er) {
                        alert('error!');
                }
               }); 
	  }
        else
           {}
       });
}
function frm_consultar_buscar()
{
    $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=16',
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
function buscar_consultar()
{
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
    $("#DivBusqueda").empty();
    $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=17',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                    $("#DivBusqueda").append(data); 
                    
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});  
}
function detalle(id)
{
   var losdatos = {id:id};
    $("#divPedido").empty(); 
    $.ajax({
                url:'../../../scripts/oper_pedidos.php?o=18',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                    $("#divPedido").append(data);   
		},
		error:function(req,e,er) {
			alert('error!');
		}
	}); 
        $("#dialog").dialog("open"); 
}
function detalle_grids(id)
{
  
    $("#GridDetalle").empty();  
   var losdatos ={id:id}; 
   $.ajax({
            url:'../../../scripts/oper_pedidos.php?o=19',
            type:'POST',
            cache:false,
            data:losdatos,
            success:function(data)
            {
                $("#GridDetalle").append(data);
                detalle_grid_fechas(id);
            },
            error:function(req,e,er) {
                    alert('error!');
            }
           }); 
}
function detalle_grid_fechas(id)
{
    $("#GridDetalleFecha").empty();  
   var losdatos ={id:id}; 
   $.ajax({
            url:'../../../scripts/oper_pedidos.php?o=20',
            type:'POST',
            cache:false,
            data:losdatos,
            success:function(data)
            {
                $("#GridDetalleFecha").append(data);
            },
            error:function(req,e,er) {
                    alert('error!');
            }
           });
}
function show_detalle(id)
{
	$("#DivBusqueda").empty();
    var losdatos = {id:id}
	$.ajax({
        url:'../../../scripts/oper_pedidos.php?o=21',
        type:'POST',
        cache:false,
        data:losdatos,
        success:function(data)
        {
        	$("#DivBusqueda").append(data); 
        },
        error:function(req,e,er) {
                alert('error!');
        }
       });
}

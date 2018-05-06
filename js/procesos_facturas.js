function load_frm()
{
    $("#DivTrabajo").empty();
    $.ajax({
                url:'../../../scripts/oper_facturas.php?o=0',
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
function Buscar()
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
    $("#GridBusqueda").empty();
    $.ajax({
                url:'../../../scripts/oper_facturas.php?o=1',
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
function saver_Order()
{
       document.frmOrderGrid.submit();
}
function acpetar_pedido(id,rem,idproveedor)
{
    CboProveedores(idproveedor);
    $("#txtPedido").val('');
    $("#txtFactura").val('');
    $("#txtPedido").val(id);
    $("#txtFactura").val(rem);
    $("#dialog").dialog("close");
    
}
function guardar()
{
    var losdatos = {
    			txtFolio:$("#txtFolio").val(),
			txtClave:$("#txtClave").val(),
    			txtFechaAlta:$("#txtFechaAlta").val(),
                        txtEstado:$("#txtEstado").val(),
                        txtPedido:$("#txtPedido").val(),
                        txtFactura:$("#txtFactura").val(),
                        txtImporte:$("#txtImporte").val(),
                        cboProveedor:$("#cboProveedor").val()};
        var v1 =$("#txtFechaAlta").val();
        var v2 =$("#txtEstado").val();
        var v3 =$("#txtPedido").val();
        var v4 =$("#txtFactura").val();
        var v5 =$("#txtImporte").val();
        
        if(v1=="")
         {
             jQuery('#txtFechaAlta').validationEngine('validate'); 
         }
        else
            {
                if(v2=="")
                 {
                    jQuery('#txtEstado').validationEngine('validate');  
                 }
                 else
                     {
                         if(v3=="")
                          {
                            jQuery('#txtPedido').validationEngine('validate');   
                          }
                         else
                             {
                                 if(v4=="")
                                   {
                                     jQuery('#txtFactura').validationEngine('validate');   
                                   }
                                 else
                                     {
                                         if(v5=="")
                                           {
                                              jQuery('#txtImporte').validationEngine('validate');  
                                           }
                                         else
                                            {
                                                 $.ajax({
                                                            url:'../../../scripts/oper_facturas.php?o=2',
                                                            type:'POST',
                                                            data:losdatos,
                                                            success:function(data)
                                                            {
                                                                load_frm();
                                                                smoke.signal('Registro agregado con exito.');

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
function  frm_buscar_modificar()
{
    
    $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_facturas.php?o=3',
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
function buscar_factura_editar()
{
   var Folio = $("#chkFolio:checked").val();
    var Pedido = $("#chkPedido:checked").val();
    var Remicion =$("#chkRemicion:checked").val();
    
    if(Folio=="Folio")
     {
         Folio='Si';
     }
    
   if(Pedido=="Pedido")
     {
         Requisicion='Si';
     }
   
   if(Remicion=="Remicion")
     {
       Remicion='Si';  
     } 
    var losdatos ={txtPatron:$("#txtPatron").val(),Folio:Folio,Pedido:Pedido,Remicion:Remicion};
    var v1=$("#txtPatron").val();
     if(v1=="")
         {
             jQuery('#txtPatron').validationEngine('validate'); 
         }
        else
            {
                  $("#DivBusqueda").empty();
                  $.ajax({
                            url:'../../../scripts/oper_facturas.php?o=4',
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
    
}
function frm_editar(id)
{
    var losdatos ={id:id};
    $("#DivBusqueda").empty();
    $.ajax({
                url:'../../../scripts/oper_facturas.php?o=5',
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
function guardar_edicion()
{
     var losdatos = {
                        txtEstado:$("#txtEstadoE").val(),
                        txtPedido:$("#txtPedido").val(),
                        txtFactura:$("#txtFactura").val(),
                        txtImporte:$("#txtImporteE").val(),
                        cboProveedor:$("#cboProveedorE").val(),
                         txtId:$("#txtId").val()};
       
        var v2 =$("#txtEstadoE").val();
        var v3 =$("#txtPedido").val();
        var v4 =$("#txtFactura").val();
        var v5 =$("#txtImporteE").val();
        
      
                if(v2=="")
                 {
                    jQuery('#txtEstadoE').validationEngine('validate');  
                 }
                 else
                     {
                         if(v3=="")
                          {
                            jQuery('#txtPedido').validationEngine('validate');   
                          }
                         else
                             {
                                 if(v4=="")
                                   {
                                     jQuery('#txtFactura').validationEngine('validate');   
                                   }
                                 else
                                     {
                                         if(v5=="")
                                           {
                                              jQuery('#txtImporteE').validationEngine('validate');  
                                           }
                                         else
                                            {
                                                 $.ajax({
                                                            url:'../../../scripts/oper_facturas.php?o=6',
                                                            type:'POST',
                                                            data:losdatos,
                                                            success:function(data)
                                                            {
                                                               buscar_factura_editar();

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
function frm_buscar_eliminar()
{
     $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_facturas.php?o=7',
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
function buscar_eliminar()
{
    var Folio = $("#chkFolio:checked").val();
    var Pedido = $("#chkPedido:checked").val();
    var Remicion =$("#chkRemicion:checked").val();
    
    if(Folio=="Folio")
     {
         Folio='Si';
     }
    
   if(Pedido=="Pedido")
     {
         Requisicion='Si';
     }
   
   if(Remicion=="Remicion")
     {
       Remicion='Si';  
     } 
    var losdatos ={txtPatron:$("#txtPatron").val(),Folio:Folio,Pedido:Pedido,Remicion:Remicion};
    var v1=$("#txtPatron").val();
     if(v1=="")
         {
             jQuery('#txtPatron').validationEngine('validate'); 
         }
        else
            {
                  $("#DivBusqueda").empty();
                  $.ajax({
                            url:'../../../scripts/oper_facturas.php?o=8',
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
}
function eliminar(id)
{
     var losdatos ={id:id}; 
     smoke.confirm('Realmente desea borrar este registro?',function(e)
        {
             if (e)
             {
                 $.ajax({
                     url:'../../../scripts/oper_cat_unidadmedida.php?o=9',
                     type:'POST',
                     data:losdatos,
                     cache:false,
                     success:function(data)
                     {
                         buscar_eliminar(); 
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
function frm_consultar()
{
   $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_facturas.php?o=10',
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
function consultar()
{
   var Folio = $("#chkFolio:checked").val();
    var Pedido = $("#chkPedido:checked").val();
    var Remicion =$("#chkRemicion:checked").val();
    
    if(Folio=="Folio")
     {
         Folio='Si';
     }
    
   if(Pedido=="Pedido")
     {
         Requisicion='Si';
     }
   
   if(Remicion=="Remicion")
     {
       Remicion='Si';  
     } 
    var losdatos ={txtPatron:$("#txtPatron").val(),Folio:Folio,Pedido:Pedido,Remicion:Remicion};
    var v1=$("#txtPatron").val();
     if(v1=="")
         {
             jQuery('#txtPatron').validationEngine('validate'); 
         }
        else
            {
                  $("#DivBusqueda").empty();
                  $.ajax({
                            url:'../../../scripts/oper_facturas.php?o=11',
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
}
function CboProveedores(id)
{
    var losdatos={id:id};
    $("#DivCbo").empty();
    $.ajax({
            url:'../../../scripts/oper_facturas.php?o=12',
            type:'POST',
            data:losdatos,
            success:function(data)
            {
                $("#DivCbo").append(data);  
                
            },
            error:function(req,e,er) {
                    alert('error!');
            }
            });
            
}
function open_Print(id)
{
    window.open('pdf_recibo.php?id=' + id, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:400,height:321px');
}


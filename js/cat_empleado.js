function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_cat_empleado.php?o=1',
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
function add_empleado()
{
    
    var v1=$("#txtEmpleado").val();
    var v2=$("#txtRFC").val();
    var v3=$("#txtCargo").val();
    var v4=$("#txtZona").val();
    var  losdatos = {txtEmpleado:$("#txtEmpleado").val(),
                     txtRFC:$("#txtRFC").val(),
                     txtCargo:$("#txtCargo").val(),
                     txtZona:$("#txtZona").val(),
                     txtadscripcion:$("#txtadscripcion").val(),
                     txtUbicacion:$("#txtUbicacion").val(),
                     txtDomicilio:$("#txtDomicilio").val()
                    };
   
    if(v1=="")
    {
        jQuery('#txtEmpleado').validationEngine('validate');
    }
    else
       {
           if(v2=="")
           {
              jQuery('#txtRFC').validationEngine('validate');  
           }
           else
              {
                  if(v3=="")
                  {
                     jQuery('#txtCargo').validationEngine('validate');  
                  }
                  else
                    {
                        if(v4=="")
                        {
                           jQuery('#txtZona').validationEngine('validate');  
                        }
                        else{
                                  $.ajax({
                                        url:'../../../scripts/oper_cat_empleado.php?o=2',
                                        type:'POST',
                                        data:losdatos,
                                        success:function(data)
                                        {
                                            smoke.signal('Registro agregado con exito.');
                                            $("#txtEmpleado").val('');
                                            $("#txtRFC").val('');
                                            $("#txtCargo").val('');
                                            $("#txtZona").val('');
                                            $("#txtadscripcion").val('');
                                            $("#txtUbicacion").val('');
                                            $("#txtDomicilio").val('');
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

        
 function frm_buscador_empleado()
 {
     $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_empleado.php?o=3',
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
 
function buscar()
{
    
    var texto=$("#txtEmpleado").val();
    if(texto=="")
    {
       jQuery('#txtEmpleado').validationEngine('validate');
            
    }
    else
        {
            $("#DivBusqueda").empty();  
             var losdatos = {txtEmpleado:$("#txtEmpleado").val()};
              $.ajax({
                        url:'../../../scripts/oper_cat_empleado.php?o=4',
                        type:'POST',
                        data:losdatos,
                        cache:false,
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
function saver_Order()
{
       document.frmOrderGrid.submit();
}
function frm_editar_empleado(id)
{
    
     $("#DivBusqueda").empty();  
     var losdatos = {IdEmpleado:id};
      $.ajax({
                url:'../../../scripts/oper_cat_empleado.php?o=5',
		type:'POST',
                data:losdatos,
                cache:false,
		success:function(data)
                {
                   $("#DivBusqueda").append(data);    
		},
		error:function(req,e,er) {
			alert('error!');
		}
	}); 
}
function Guardar_Edicion(id)
{
    
    
  var  losdatos = {id:id,
                   txtEmpleado:$("#txtEmpleadoE").val(),
                   txtRFC:$("#txtRFCE").val(),
                   txtCargo:$("#txtCargoE").val(),
                   txtZona:$("#txtZonaE").val(),
                   txtadscripcion:$("#txtadscripcionE").val(),
                   txtUbicacion:$("#txtUbicacionE").val(),
                   txtDomicilio:$("#txtDomicilioE").val()
                  };
  var v1=$("#txtEmpleadoE").val();
  var v2=$("#txtRFCE").val();
  var v3=$("#txtCargoE").val();
  var v4=$("#txtZonaE").val(); 
  
        
  if(v1=="")
    {
        jQuery('#txtEmpleadoE').validationEngine('validate');
    }
    else
       {
           if(v2=="")
           {
              jQuery('#txtRFCE').validationEngine('validate');  
           }
           else
              {
                  if(v3=="")
                  {
                     jQuery('#txtCargoE').validationEngine('validate');  
                  }
                  else
                    {
                        if(v4=="")
                        {
                           jQuery('#txtZonaE').validationEngine('validate');  
                        }
                        else{
                                  $.ajax({
                                            url:'../../../scripts/oper_cat_empleado.php?o=6',
                                            type:'POST',
                                            data:losdatos,
                                            cache:false,
                                            success:function(data)
                                            {
                                               buscar();
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
function frm_buscador_borrar()
{
    $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_empleado.php?o=7',
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
function buscar_borrar()
{
        var texto=$("#txtEmpleado").val(); 
        var losdatos = {txtEmpleado:$("#txtEmpleado").val()};   
        if(texto=="")
           {
              jQuery('#txtEmpleado').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_empleado.php?o=8',
                               type:'POST',
                               data:losdatos,
                               cache:false,
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
function borrar_empleado(id)
{
   var losdatos ={id:id}; 
     smoke.confirm('Realmente desea borrar este registro?',function(e)
   {
	if (e)
        {
            $.ajax({
                url:'../../../scripts/oper_cat_empleado.php?o=9',
		type:'POST',
                data:losdatos,
                cache:false,
		success:function(data)
                {
                     
                     buscar_borrar();    
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
function frm_buscador_consultar()
{
    $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_empleado.php?o=10',
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
    
    var texto=$("#txtEmpleado").val(); 
        var losdatos = {txtEmpleado:$("#txtEmpleado").val()};   
        if(texto=="")
           {
              jQuery('#txtEmpleado').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_empleado.php?o=11',
                               type:'POST',
                               data:losdatos,
                               cache:false,
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


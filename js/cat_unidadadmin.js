function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_cat_unidadadmin.php?o=1',
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

function add_ua()
{
    var  losdatos = {
                        txtCodigo:$("#txtCodigo").val(),
                        txtUA:$("#txtUA").val(),
                        cboEmpleado:$("#cboEmpleado").val(),
                        cboZona:$("#cboZona").val(),
                        txtCalle:$("#txtCalle").val(),
                        txtNumero:$("#txtNumero").val(),
                        txtColonia:$("#txtColonia").val(),
                        txtPoblacion:$("#txtPoblacion").val(),
                        txtCP:$("#txtCP").val(),
                        txtTelefono1:$("#txtTelefono1").val(),
                        txtFax:$("#txtFax").val(),
                        txtPrioridad:$("#txtPrioridad").val(),
                        chkAreaActiva:$("#chkAreaActiva").val(),
                        txtNoFolio:$("#txtNoFolio").val(),
                        txtUEjecutora:$("#txtUEjecutora").val(),
                        txtEmpleados:$("#txtEmpleados").val()
                    };
    var v1= $("#txtCodigo").val();
    var v2= $("#txtUA").val();
    var v3= $("#txtCalle").val();
    var v4= $("#txtColonia").val();
    var v5= $("#txtTelefono1").val();
    var v6= $("#cboEmpleado").val();
    
    if(v1=="")
      {
         jQuery('#txtCodigo').validationEngine('validate');  
      } 
    else
    {
        if(v2=="")
          {
              jQuery('#txtUA').validationEngine('validate'); 
          }  
         else
             {
                 if(v3=="")
                   {
                      jQuery('#txtCalle').validationEngine('validate');    
                   }
                 else
                     {
                            if(v4=="")
                             {
                                 jQuery('#txtColonia').validationEngine('validate'); 
                             }
                            else
                                {
                                    if(v5=="")
                                      {
                                          jQuery('#txtCodigo').validationEngine('validate'); 
                                      }
                                    else
                                       {
                                           if(v6=="")
                                             {
                                                 jQuery('#cboEmpleado').validationEngine('validate'); 
                                             }
                                          else
                                              {
                                                    $.ajax({
                                                            url:'../../../scripts/oper_cat_unidadadmin.php?o=2',
                                                            type:'POST',
                                                            data:losdatos,
                                                            success:function(data)
                                                            {
                                                               load_frm(); 
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
 function frm_buscador_ua()
 {
     $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_unidadadmin.php?o=3',
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
    
    var texto=$("#txt").val();
    if(texto=="")
    {
       jQuery('#txt').validationEngine('validate');
            
    }
    else
        {
            $("#DivBusqueda").empty();  
             var losdatos = {txt:$("#txt").val()};
              $.ajax({
                        url:'../../../scripts/oper_cat_unidadadmin.php?o=4',
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

function frm_editar(id)
{
    
     $("#DivBusqueda").empty();  
     var losdatos = {Id:id};
      $.ajax({
                url:'../../../scripts/oper_cat_unidadadmin.php?o=5',
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
    
     var  losdatos = {  id:id,
                        txtCodigo:$("#txtCodigoE").val(),
                        txtUA:$("#txtUAE").val(),
                        cboEmpleado:$("#cboEmpleadoE").val(),
                        cboZona:$("#cboZonaE").val(),
                        txtCalle:$("#txtCalleE").val(),
                        txtNumero:$("#txtNumeroE").val(),
                        txtColonia:$("#txtColoniaE").val(),
                        txtPoblacion:$("#txtPoblacionE").val(),
                        txtCP:$("#txtCPE").val(),
                        txtTelefono1:$("#txtTelefono1E").val(),
                        txtFax:$("#txtFaxE").val(),
                        txtPrioridad:$("#txtPrioridadE").val(),
                        chkAreaActiva:$("#chkAreaActivaE").val(),
                        txtNoFolio:$("#txtNoFolioE").val(),
                        txtUEjecutora:$("#txtUEjecutoraE").val(),
                        txtEmpleados:$("#txtEmpleadosE").val()
                    };
    var v1= $("#txtCodigoE").val();
    var v2= $("#txtUAE").val();
    var v3= $("#txtCalleE").val();
    var v4= $("#txtColoniae").val();
    var v5= $("#txtTelefono1E").val();
    var v6= $("#cboEmpleadoE").val();
    
     
    if(v1=="")
      {
         jQuery('#txtCodigoE').validationEngine('validate');  
      } 
    else
    {
        if(v2=="")
          {
              jQuery('#txtUAE').validationEngine('validate'); 
          }  
         else
             {
                 if(v3=="")
                   {
                      jQuery('#txtCalleE').validationEngine('validate');    
                   }
                 else
                     {
                            if(v4=="")
                             {
                                 jQuery('#txtColoniaE').validationEngine('validate'); 
                             }
                            else
                                {
                                    if(v5=="")
                                      {
                                          jQuery('#txtCodigoE').validationEngine('validate'); 
                                      }
                                    else
                                       {
                                           if(v6=="")
                                             {
                                                 jQuery('#cboEmpleadoE').validationEngine('validate'); 
                                             }
                                          else
                                              {
                                                   $("#DivBusqueda").empty();  
                                                   
                                                     $.ajax({
                                                               url:'../../../scripts/oper_cat_unidadadmin.php?o=6',
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
    }
     
}
function frm_buscador_borrar()
{
    $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_unidadadmin.php?o=7',
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
        var texto=$("#txt").val(); 
        var losdatos = {txt:$("#txt").val()};   
        if(texto=="")
           {
              jQuery('#txt').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_unidadadmin.php?o=8',
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
function borrar_ua(id)
{
   var losdatos ={id:id}; 
     smoke.confirm('Realmente desea borrar este registro?',function(e)
   {
	if (e)
        {
            $.ajax({
                url:'../../../scripts/oper_cat_unidadadmin.php?o=9',
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
                url:'../../../scripts/oper_cat_unidadadmin.php?o=10',
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
    
    var texto=$("#txt").val(); 
        var losdatos = {txt:$("#txt").val()};   
        if(texto=="")
           {
              jQuery('#txt').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_unidadadmin.php?o=11',
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
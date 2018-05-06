function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_cat_proveedor.php?o=1',
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
function add_proveedor()
{
    
    var  losdatos = {
                        txtCodigo:$("#txtCodigo").val(),
                        txtProveedor:$("#txtProveedor").val(),
                        cboGiro:$("#cboGiro").val(),
                        
                        txtRespon:$("#txtRespon").val(),
                        txtCalle:$("#txtCalle").val(),
                        txtNumero:$("#txtNumero").val(),
                        txtColonia:$("#txtColonia").val(),
                        txtPoblacion:$("#txtPoblacion").val(),
                        txtCP:$("#txtCP").val(),
                        txtRFC:$("#txtRFC").val(),
                        txtPadron:$("#txtPadron").val(),
                        txtCedulaEmp:$("#txtCedulaEmp").val(),
                        txtCamaraCom:$("#txtCamaraCom").val(),
                        txtCanacintra:$("#txtCanacintra").val(),
                        txtCamaraRamo:$("#txtCamaraRamo").val(),
                        txtTelefono1:$("#txtTelefono1").val(),
                        txtTelefono2:$("#txtTelefono2").val(),
                        txtFax:$("#txtFax").val(),
                        txtNacionalidad:$("#txtNacionalidad").val()};
            
                   
  var v1= $("#txtCodigo").val();
  var v2= $("#txtProveedor").val();
  var v3= $("#cboGiro").val();
  
  var v5= $("#txtCalle").val();
  var v6= $("#txtColonia").val();
  var v7= $("#txtCP").val();
  var v8= $("#txtRFC").val();
  var v9= $("#txtTelefono1").val();
  
 if(v1=="")
 {
     jQuery('#txtCodigo').validationEngine('validate'); 
 }
 else
 {
     if(v2=="")
      {
          jQuery('#txtProveedor').validationEngine('validate'); 
      }
      else
         {
             if(v3=="")
             {
                 jQuery('#cboGiro').validationEngine('validate'); 
             }
             else
                {
                    
                         if(v5=="")
                           {
                              jQuery('#txtCalle').validationEngine('validate');  
                           }
                         else
                           {
                              if(v6=="")
                              {
                                jQuery('##txtColonia').validationEngine('validate');   
                              }
                              else
                                {
                                    if(v7=="")
                                     {
                                        jQuery('#txtCP').validationEngine('validate');  
                                     }
                                     else
                                     {
                                         if(v8=="")
                                         {
                                             jQuery('#txtRFC').validationEngine('validate'); 
                                         }
                                         else
                                         {
                                             if(v9=="")
                                               {
                                                 jQuery('#txtTelefono1').validationEngine('validate');   
                                               }
                                             else
                                             {
                                                    $.ajax({
                                                            url:'../../../scripts/oper_cat_proveedor.php?o=2',
                                                            type:'POST',
                                                            data:losdatos,
                                                            success:function(data)
                                                            {
                                                                smoke.signal('Registro agregado con exito.');
                                                                    $("#txtCodigo").val('');
                                                                    $("#txtProveedor").val('');
                                                                    
                                                                    
                                                                    $("#txtRespon").val('');
                                                                    $("#txtCalle").val('');
                                                                    $("#txtNumero").val('');
                                                                    $("#txtColonia").val('');
                                                                    $("#txtPoblacion").val('');
                                                                    $("#txtCP").val('');
                                                                    $("#txtRFC").val('');
                                                                    $("#txtPadron").val('');
                                                                    $("#txtCedulaEmp").val('');
                                                                    $("#txtCamaraCom").val('');
                                                                    $("#xtCanacintra").val('');
                                                                    $("#txtCamaraRamo").val('');
                                                                    $("#txtTelefono1").val('');
                                                                    $("#txtTelefono2").val('');
                                                                    $("#txtFax").val('');
                                                                    $("#txtNacionalidad").val('');
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
 }
    
    
}

 function frm_buscador_proveedor()
 {
     $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_proveedor.php?o=3',
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
    
    var texto=$("#txtProveedor").val();
    if(texto=="")
    {
       jQuery('#txtProveedor').validationEngine('validate');
            
    }
    else
        {
            $("#DivBusqueda").empty();  
             var losdatos = {txtProveedor:$("#txtProveedor").val()};
              $.ajax({
                        url:'../../../scripts/oper_cat_proveedor.php?o=4',
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
function frm_editar_proveedor(id)
{
    
     $("#DivBusqueda").empty();  
     var losdatos = {IdProveedor:id};
      $.ajax({
                url:'../../../scripts/oper_cat_proveedor.php?o=5',
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

function Guardar_Edicion_Giro(id)
{
 
  var  losdatos = {  
                        id:id,
                        txtCodigo:$("#txtCodigoE").val(),
                        txtProveedor:$("#txtProveedorE").val(),
                        cboGiro:$("#cboGiroE").val(),
                        txtRespon:$("#txtResponE").val(),
                        txtCalle:$("#txtCalleE").val(),
                        txtNumero:$("#txtNumeroE").val(),
                        txtColonia:$("#txtColoniaE").val(),
                        txtPoblacion:$("#txtPoblacionE").val(),
                        txtCP:$("#txtCPE").val(),
                        txtRFC:$("#txtRFCE").val(),
                        txtPadron:$("#txtPadronE").val(),
                        txtCedulaEmp:$("#txtCedulaEmpE").val(),
                        txtCamaraCom:$("#txtCamaraComE").val(),
                        txtCanacintra:$("#txtCanacintraE").val(),
                        txtCamaraRamo:$("#txtCamaraRamoE").val(),
                        txtTelefono1:$("#txtTelefono1E").val(),
                        txtTelefono2:$("#txtTelefono2E").val(),
                        txtFax:$("#txtFaxE").val(),
                        txtNacionalidad:$("#txtNacionalidadE").val()};
            
  var v1= $("#txtCodigoE").val();
  var v2= $("#txtProveedorE").val();
  var v3= $("#cboGiroE").val();
  var v5= $("#txtCalleE").val();
  var v6= $("#txtColoniae").val();
  var v7= $("#txtCPEE").val();
  var v8= $("#txtRFCE").val();
  var v9= $("#txtTelefono1E").val();
  
 if(v1=="")
 {
     jQuery('#txtCodigoE').validationEngine('validate'); 
 }
 else
 {
     if(v2=="")
      {
          jQuery('#txtProveedorE').validationEngine('validate'); 
      }
      else
         {
             if(v3=="")
             {
                 jQuery('#cboGiroE').validationEngine('validate'); 
             }
             else
                {
                    
                         if(v5=="")
                           {
                              jQuery('#txtCalleE').validationEngine('validate');  
                           }
                         else
                           {
                              if(v6=="")
                              {
                                jQuery('##txtColoniaE').validationEngine('validate');   
                              }
                              else
                                {
                                    if(v7=="")
                                     {
                                        jQuery('#txtCPE').validationEngine('validate');  
                                     }
                                     else
                                     {
                                         if(v8=="")
                                         {
                                             jQuery('#txtRFCE').validationEngine('validate'); 
                                         }
                                         else
                                         {
                                             if(v9=="")
                                               {
                                                 jQuery('#txtTelefono1E').validationEngine('validate');   
                                               }
                                             else
                                             {
                                                    $.ajax({
                                                            url:'../../../scripts/oper_cat_proveedor.php?o=6',
                                                            type:'POST',
                                                            data:losdatos,
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
 }
}

function frm_buscador_borrar()
{
    $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_proveedor.php?o=7',
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
        var texto=$("#txtProveedor").val(); 
        var losdatos = {txtProveedor:$("#txtProveedor").val()};   
        if(texto=="")
           {
              jQuery('#txtProveedor').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_proveedor.php?o=8',
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
function borrar_proveedor(id)
{
   var losdatos ={id:id}; 
     smoke.confirm('Realmente desea borrar este registro?',function(e)
   {
	if (e)
        {
            $.ajax({
                url:'../../../scripts/oper_cat_proveedor.php?o=9',
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
                url:'../../../scripts/oper_cat_proveedor.php?o=10',
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
    
    var texto=$("#txtProveedor").val(); 
        var losdatos = {txtProveedor:$("#txtProveedor").val()};   
        if(texto=="")
           {
              jQuery('#txtProveedor').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_proveedor.php?o=11',
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
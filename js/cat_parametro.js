function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_cat_parametro.php?o=1',
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
function add_parametro()
{
    
    var v1=$("#txtParametro").val();
    var v2=$("#txtValor").val();
    var v3=$("#txtClave").val();
    var  losdatos = {txtClave:$("#txtClave").val(),txtParametro:$("#txtParametro").val(),txtValor:$("#txtValor").val()};
    if(v1=="")
    {
       jQuery('#txtParametro').validationEngine('validate');  
    }
    else{
          if(v2=="")
            {
              jQuery('#txtValor').validationEngine('validate');   
            }
          else
             {
                 if(v3=="")
                     {
                         jQuery('#ttxtClave').validationEngine('validate'); 
                     }
                 else{
                            $.ajax({
                                  url:'../../../scripts/oper_cat_parametro.php?o=2',
                                  type:'POST',
                                  data:losdatos,
                                  success:function(data)
                                  {
                                      smoke.signal('Registro agregado con exito.');

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


 function frm_buscador_parametro()
 {
     $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_parametro.php?o=3',
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
    
    var texto=$("#txtParametro").val();
    if(texto=="")
    {
       jQuery('#txtParametro').validationEngine('validate');
            
    }
    else
        {
            $("#DivBusqueda").empty();  
             var losdatos = {txtParametro:$("#txtParametro").val()};
              $.ajax({
                        url:'../../../scripts/oper_cat_parametro.php?o=4',
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

function frm_editar_parametro(id)
{
    
     $("#DivBusqueda").empty();  
     var losdatos = {id:id};
      $.ajax({
                url:'../../../scripts/oper_cat_parametro.php?o=5',
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
   
  var  losdatos = {id:id,txtClave:$("#txtClaveE").val(),txtParametro:$("#txtParametroE").val(),txtValor:$("#txtValorE").val()};
  var v1=$("#txtParametroE").val();
  var v2=$("#txtValorE").val();
  var v3 = $("#txtClaveE").val();
    if(v1=="")
    {
       jQuery('#txtParametroE').validationEngine('validate');  
    }
    else{
           if(v2=="")
           {
               jQuery('#txtValorE').validationEngine('validate');
           }
          else 
                  if(v3=="")
                    {
                       jQuery('#txtClaveE').validationEngine('validate'); 
                    }
                  else
                  {
                                $.ajax({
                                  url:'../../../scripts/oper_cat_parametro.php?o=6',
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
function frm_buscador_borrar()
{
    $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_parametro.php?o=7',
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
        var texto=$("#txtParametro").val(); 
        var losdatos = {txtParametro:$("#txtParametro").val()};   
        if(texto=="")
           {
              jQuery('#txtParametro').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_parametro.php?o=8',
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
function borrar_parametro(id)
{
   var losdatos ={id:id}; 
     smoke.confirm('Realmente desea borrar este registro?',function(e)
   {
	if (e)
        {
            $.ajax({
                url:'../../../scripts/oper_cat_parametro.php?o=9',
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
                url:'../../../scripts/oper_cat_parametro.php?o=10',
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
    
    var texto=$("#txtParametro").val(); 
        var losdatos = {txtParametro:$("#txtParametro").val()};   
        if(texto=="")
           {
              jQuery('#txtParametro').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_parametro.php?o=11',
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

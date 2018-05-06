function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_cat_giro.php?o=1',
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
function add_giro()
{
    
    var v1=$("#txtGiro").val();
    var  losdatos = {txtGiro:$("#txtGiro").val()};
    if(v1=="")
    {
       jQuery('#txtGiro').validationEngine('validate');  
    }
    else{
              $.ajax({
                    url:'../../../scripts/oper_cat_giro.php?o=2',
                    type:'POST',
                    data:losdatos,
                    success:function(data)
                    {
                        smoke.signal('Registro agregado con exito.');
                        $("#txtGiro").val(''); 
                        load_frm();
                    },
                    error:function(req,e,er) {
                            alert('error!');
                    }
            }); 
      }

}
 function frm_buscador_giro()
 {
     $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_giro.php?o=3',
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
    
    var texto=$("#txtGiro").val();
    if(texto=="")
    {
       jQuery('#txtGiro').validationEngine('validate');
            
    }
    else
        {
            $("#DivBusqueda").empty();  
             var losdatos = {txtEmpleado:$("#txtGiro").val()};
              $.ajax({
                        url:'../../../scripts/oper_cat_giro.php?o=4',
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
function frm_editar_giro(id)
{
    
     $("#DivBusqueda").empty();  
     var losdatos = {IdGiro:id};
      $.ajax({
                url:'../../../scripts/oper_cat_giro.php?o=5',
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
    
    
  var  losdatos = {id:id,txtGiro:$("#txtGiroE").val()};
  var v1=$("#txtGiroE").val();

    if(v1=="")
    {
       jQuery('#txtGiroE').validationEngine('validate');  
    }
    else{
              $.ajax({
                        url:'../../../scripts/oper_cat_giro.php?o=6',
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
function frm_buscador_borrar()
{
    $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_giro.php?o=7',
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
        var texto=$("#txtGiro").val(); 
        var losdatos = {txtGiro:$("#txtGiro").val()};   
        if(texto=="")
           {
              jQuery('#txtGiro').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_giro.php?o=8',
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
function borrar_giro(id)
{
   var losdatos ={id:id}; 
     smoke.confirm('Realmente desea borrar este registro?',function(e)
   {
	if (e)
        {
            $.ajax({
                url:'../../../scripts/oper_cat_giro.php?o=9',
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
                url:'../../../scripts/oper_cat_giro.php?o=10',
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
                               url:'../../../scripts/oper_cat_giro.php?o=11',
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
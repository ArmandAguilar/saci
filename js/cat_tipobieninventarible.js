function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_cat_tipobieninventariable.php?o=1',
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
function add_tbi()
{
    
    var v1=$("#txtTBI").val();
    var v2=$("#txtClave").val();
    var  losdatos = {txtClave:$("#txtClave").val(),txtTBI:$("#txtTBI").val()};
    if(v1=="")
    {
       jQuery('#txtTBI').validationEngine('validate');  
    }
    else{
            if(v2=="")
              {
                jQuery('#txtClave').validationEngine('validate');  
              }
            else{
                            $.ajax({
                            url:'../../../scripts/oper_cat_tipobieninventariable.php?o=2',
                            type:'POST',
                            data:losdatos,
                            success:function(data)
                            {
                                smoke.signal('Registro agregado con exito.');
                                $("#txtTBI").val(''); 
                                load_frm();
                            },
                            error:function(req,e,er) {
                                    alert('error!');
                            }
                    });
            }  
               
      }

}

 function frm_buscador_tbi()
 {
     $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_tipobieninventariable.php?o=3',
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
    
    var texto=$("#txtTBI").val();
    if(texto=="")
    {
       jQuery("#txtTBI").validationEngine('validate');
            
    }
    else
        {
            $("#DivBusqueda").empty();  
             var losdatos = {txtTBI:$("#txtTBI").val()};
              $.ajax({
                        url:'../../../scripts/oper_cat_tipobieninventariable.php?o=4',
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

function frm_editar_tbi(id)
{
    
     $("#DivBusqueda").empty();  
     var losdatos = {IdTBI:id};
      $.ajax({
                url:'../../../scripts/oper_cat_tipobieninventariable.php?o=5',
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
   
  var  losdatos = {id:id,txtClave:$("#txtClaveE").val(),txtTBI:$("#txtTBIE").val()};
  var v1=$("#txtTBIE").val();
  var v2=$("#txtClaveE").val();
    if(v1=="")
    {
       jQuery('#txtTBIE').validationEngine('validate');  
    }
    else{
           if(v2=="")
            {
              jQuery('#txtClave').validationEngine('validate');   
            }
          else{
                  $.ajax({
                        url:'../../../scripts/oper_cat_tipobieninventariable.php?o=6',
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
                url:'../../../scripts/oper_cat_tipobieninventariable.php?o=7',
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
        var texto=$("#txtTBI").val(); 
        var losdatos = {txtTBI:$("#txtTBI").val()};   
        if(texto=="")
           {
              jQuery('#txtGiro').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_tipobieninventariable.php?o=8',
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
function borrar_tbi(id)
{
   var losdatos ={id:id}; 
     smoke.confirm('Realmente desea borrar este registro?',function(e)
   {
	if (e)
        {
            $.ajax({
                url:'../../../scripts/oper_cat_tipobieninventariable.php?o=9',
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
                url:'../../../scripts/oper_cat_tipobieninventariable.php?o=10',
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
    
    var texto=$("#txtTBI").val(); 
        var losdatos = {txtTBI:$("#txtTBI").val()};   
        if(texto=="")
           {
              jQuery('#txtTBI').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_tipobieninventariable.php?o=11',
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
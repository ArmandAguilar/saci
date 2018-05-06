function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_cat_unidadmedida.php?o=1',
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
function add_Umedida()
{
    
    var v1=$("#txtUmedida").val();
    alert(v1);
    var  losdatos = {txtUmedida:$("#txtUmedida").val()};
    if(v1=="")
    {
       jQuery('#txtUmedida').validationEngine('validate');  
    }
    else{
              $.ajax({
                    url:'../../../scripts/oper_cat_unidadmedida.php?o=2',
                    type:'POST',
                    data:losdatos,
                    success:function(data)
                    {
                        smoke.signal('Registro agregado con exito.');
                        $("#txtUmedida").val(''); 
                        load_frm();
                    },
                    error:function(req,e,er) {
                            alert('error!');
                    }
            }); 
      }
}
 function fmr_buscar_Umedidad()
 {
     $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_unidadmedida.php?o=3',
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
    
    var texto=$("#txtUmedida").val();
    if(texto=="")
    {
       jQuery('#txtUmedida').validationEngine('validate');
            
    }
    else
        {
            $("#DivBusqueda").empty();  
             var losdatos = {txtUmedida:$("#txtUmedida").val()};
              $.ajax({
                        url:'../../../scripts/oper_cat_unidadmedida.php?o=4',
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
function frm_editar_Umedidad(id)
{
    
     $("#DivBusqueda").empty();  
     var losdatos = {IdUmedida:id};
      $.ajax({
                url:'../../../scripts/oper_cat_unidadmedida.php?o=5',
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
function Guardar_Edicion_Umedida(id)
{
    
    
  var  losdatos = {id:id,txtUmedida:$("#txtUmedidaE").val()};
  var v1=$("#txtUmedidaE").val();

    if(v1=="")
    {
       jQuery('#txtUmedidaE').validationEngine('validate');  
    }
    else{
              $.ajax({
                        url:'../../../scripts/oper_cat_unidadmedida.php?o=6',
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
                url:'../../../scripts/oper_cat_unidadmedida.php?o=7',
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
        var texto=$("#txtUmedida").val(); 
        var losdatos = {txtGiro:$("#txtUmedida").val()};   
        if(texto=="")
           {
              jQuery('#txtUmedida').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_unidadmedida.php?o=8',
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
function borrar_Umedida(id)
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
                url:'../../../scripts/oper_cat_unidadmedida.php?o=10',
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
    
        var texto=$("#txtUmedida").val(); 
        var losdatos = {txtUmedida:$("#txtUmedida").val()};   
        if(texto=="")
           {
              jQuery('#txtUmedida').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_unidadmedida.php?o=11',
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
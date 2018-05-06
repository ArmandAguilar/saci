function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_cat_cabmsconsumible.php?o=1',
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
function add_cabmsconsumible()
{
    
    var  losdatos = {
            txtICveInternaAC:$("#txtICveInternaAC").val(),
            txtCveARTCABMS:$("#txtCveARTCABMS").val(),
            txtvDescripcion:$("#txtvDescripcion").val(),
            cboCabms:$("#cboCabms").val(),
            cboMedida:$("#cboMedida").val(),
            txtPPresupuestal:$("#txtPPresupuestal").val()
    };
    var v1=$("#txtICveInternaAC").val();
    var v2=$("#txtCveARTCABMS").val();
    var v3=$("#txtvDescripcion").val();
    var v4=$("#cboCabms").val();
    var v5=$("#cboMedida").val();
    var v6=$("#txtPPresupuestal").val();
    
    
    if(v1=="")
      {
         jQuery('#txtICveInternaAC').validationEngine('validate'); 
      }
   else
    {
        if(v2=="")
         {
             jQuery('#txtCveARTCABMS').validationEngine('validate');
         }
         else
           {
               if(v3=="")
                {
                   jQuery('#txtvDescripcion').validationEngine('validate'); 
                }
               else{
                       if(v4=="")
                         {
                            jQuery('#cboCabms').validationEngine('validate'); 
                         }
                        else
                        {
                            if(v5=="")
                              {
                                  jQuery('#cboMedida').validationEngine('validate');
                              }
                            else{
                                    if(v6=="")
                                    {
                                        jQuery('#txtPPresupuestal').validationEngine('validate');
                                    }
                                    else
                                      {
                                                 $.ajax({
                                                        url:'../../../scripts/oper_cat_cabmsconsumible.php?o=2',
                                                        type:'POST',
                                                        data:losdatos,
                                                        success:function(data)
                                                        {
                                                            smoke.signal('Registro agregado con exito.');
                                                                /*$("#txtICveInternaAC").val('');
                                                                $("#txtCveARTCABMS").val('');
                                                                $("#txtvDescripcion").val('');
                                                                $("#txtPPresupuestal").val('');
                                                            load_frm();*/
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
function frm_buscador_cabmsconsumible()
 {
     $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_cabmsconsumible.php?o=3',
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
    
    var texto=$("#txtCabmsC").val();
    if(texto=="")
    {
       jQuery('#txtCabmsC').validationEngine('validate');
            
    }
    else
        {
            $("#DivBusqueda").empty();  
             var losdatos = {txtCabmsC:$("#txtCabmsC").val()};
              $.ajax({
                        url:'../../../scripts/oper_cat_cabmsconsumible.php?o=4',
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
function frm_editar_cabmsconsumible(id)
{
    
     $("#DivBusqueda").empty();  
     var losdatos = {id:id};
      $.ajax({
                url:'../../../scripts/oper_cat_cabmsconsumible.php?o=5',
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
function Guardar_Edicion_cabmsconsumible(id)
{
    
   var  losdatos = {id:id,
            txtICveInternaAC:$("#txtICveInternaACE").val(),
            txtCveARTCABMS:$("#txtCveARTCABMSE").val(),
            txtvDescripcion:$("#txtvDescripcionE").val(),
            cboCabms:$("#cboCabmsE").val(),
            cboMedida:$("#cboMedidaE").val(),
            txtPPresupuestal:$("#txtPPresupuestalE").val()
    };  
  
  var v1=$("#txtICveInternaACE").val();
  var v2=$("#txtCveARTCABMSE").val();
  var v3=$("#txtvDescripcionE").val();
  var v4=$("#cboCabmsE").val();
  var v5=$("#cboMedidaE").val();
  var v6=$("#txtPPresupuestalE").val(); 
      if(v1=="")
      {
         jQuery('#txtICveInternaACE').validationEngine('validate'); 
      }
   else
    {
        if(v2=="")
         {
             jQuery('#txtCveARTCABMSE').validationEngine('validate');
         }
         else
           {
               if(v3=="")
                {
                   jQuery('#txtvDescripcionE').validationEngine('validate'); 
                }
               else{
                       if(v4=="")
                         {
                            jQuery('#cboCabmsE').validationEngine('validate'); 
                         }
                        else
                        {
                            if(v5=="")
                              {
                                  jQuery('#cboMedidaE').validationEngine('validate');
                              }
                            else{
                                    if(v6=="")
                                    {
                                        jQuery('#txtPPresupuestalE').validationEngine('validate');
                                    }
                                    else
                                      {
                                                $.ajax({
                                                        url:'../../../scripts/oper_cat_cabmsconsumible.php?o=6',
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
                url:'../../../scripts/oper_cat_cabmsconsumible.php?o=7',
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
        var texto=$("#txtCabmsC").val(); 
        var losdatos = {txtCabmsC:$("#txtCabmsC").val()};   
        if(texto=="")
           {
              jQuery('#txtCabmsC').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_cabmsconsumible.php?o=8',
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
function borrar_cabmsconsumible(id)
{
   var losdatos ={id:id}; 
     smoke.confirm('Realmente desea borrar este registro?',function(e)
   {
	if (e)
        {
            $.ajax({
                url:'../../../scripts/oper_cat_cabmsconsumible.php?o=9',
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
                url:'../../../scripts/oper_cat_cabmsconsumible.php?o=10',
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
    
    var texto=$("#txtCabmsC").val(); 
        var losdatos = {txtCabmsC:$("#txtCabmsC").val()};   
        if(texto=="")
           {
              jQuery('#txtCabmsC').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_cabmsconsumible.php?o=11',
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
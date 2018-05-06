$(function() {  
    $("#dialog").dialog({
                        autoOpen: false,
                        width: 750,
                        height: 400
                });
            });
function load_frm_cambs()
{
   $("#dialog").dialog("open"); 
}           
function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_cat_cabms.php?o=1',
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
function verqr()
{
    
       /* var Texto0=$("#txtCabms").val();
        var Texto1=$("#cboTipo").val()
        $("#DivQr").empty();
        jQuery('#DivQr').qrcode({
		render	: "table",
		text	: Texto1 + Texto0,
                width: 250  ,
	        height: 250
	});  */ 
}
function add_cabms()
{
    var v0=$("#cboTipo").val();
    var v1=$("#txtCabms").val();
    var v2=$("#txtDes").val();
    var v3=$("#cboUnidad").val();
    var v4=$("#txtPPresupuestal").val();
    var  losdatos = {cboTipo:$("#cboTipo").val(),txtCabms:$("#txtCabms").val(),txtDes:$("#txtDes").val(),cboUnidad:$("#cboUnidad").val(),txtPPresupuestal:$("#txtPPresupuestal").val()};
if(v0=="")
   {
      jQuery('#cboTipo').validationEngine('validate');
   }  
 else{       
    if(v1=="")
    {
        jQuery('#txtCabms').validationEngine('validate');
    }
    else
       {
           if(v2=="")
           {
             jQuery('#txtDes').validationEngine('validate');  
           }
          else
           {
                  if(v3=="")
                  {
                     jQuery('#cboUnidad').validationEngine('validate');  
                  }
                  else
                    {
                        if(v4=="")
                        {
                           jQuery('#txtPPresupuestal').validationEngine('validate');  
                        }
                        else{
                                 
                                $.ajax({
                                        url:'../../../scripts/oper_cat_cabms.php?o=2',
                                        type:'POST',
                                        data:losdatos,
                                        success:function(data)
                                        {
                                            
                                            var Verificado = data;
                                           if(Verificado == "Si")
                                            {
                                               smoke.signal('Clave cambs ya existe');  
                                            }
                                            else
                                            {
                                                
                                                
                                                  $.ajax({
                                                            url:'../../../scripts/oper_cat_cabms.php?o=3',
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

 function frm_buscador_cabms()
 {
     $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_cabms.php?o=4',
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
    
    var texto=$("#txtCabms").val();
    if(texto=="")
    {
       jQuery('#txtCabms').validationEngine('validate');
            
    }
    else
        {
            $("#DivBusqueda").empty();  
             var losdatos = {txtCabms:$("#txtCabms").val()};
              $.ajax({
                        url:'../../../scripts/oper_cat_cabms.php?o=5',
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
function frm_editar_cambs(id)
{
    
      $("#DivBusqueda").empty();  
     var losdatos = {IdCambs:id};
      $.ajax({
                url:'../../../scripts/oper_cat_cabms.php?o=6',
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
    
        var v0=$("#cboTipoE").val();
        var v1=$("#txtCabmsE").val();
        var v2=$("#txtDesE").val();
        var v3=$("#cboUnidadE").val();
        var v4=$("#txtPPresupuestalE").val();
        var  losdatos = {Id:$("#IdActualizar").val(),Tipo:$("#cboTipoE").val(),txtCabms:$("#txtCabmsE").val(),txtDes:$("#txtDesE").val(),cboUnidad:$("#cboUnidadE").val(),txtPPresupuestal:$("#txtPPresupuestalE").val()};
         if(v0=="")
                   {
                      jQuery('#cboTipoE').validationEngine('validate');
                   }  
                 else{       
                    if(v1=="")
                    {
                        jQuery('#txtCabmsE').validationEngine('validate');
                    }
                    else
                       {
                           if(v2=="")
                           {
                             jQuery('#txtDesE').validationEngine('validate');  
                           }
                          else
                           {
                                  if(v3=="")
                                  {
                                     jQuery('#cboUnidadE').validationEngine('validate');  
                                  }
                                  else
                                    {
                                        if(v4=="")
                                        {
                                           jQuery('#txtPPresupuestalE').validationEngine('validate');  
                                        }
                                        else{
                                                $.ajax({
                                                          url:'../../../scripts/oper_cat_cabms.php?o=7',
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
 function frm_buscar_borrar()
{
    
  $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_cabms.php?o=8',
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
function buscar_borrar_cambs()
{
    var texto=$("#txtCabms").val();
    if(texto=="")
    {
       jQuery('#txtCabms').validationEngine('validate');
            
    }
    else
        {
            $("#DivBusqueda").empty();  
             var losdatos = {txtCabms:$("#txtCabms").val()};
              $.ajax({
                        url:'../../../scripts/oper_cat_cabms.php?o=9',
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
function borrar_cambs(id)
{
   var losdatos ={id:id}; 
     smoke.confirm('Realmente desea borrar este registro?',function(e)
   {
	if (e)
        {
            $.ajax({
                url:'../../../scripts/oper_cat_cabms.php?o=10',
		type:'POST',
                data:losdatos,
                cache:false,
		success:function(data)
                {
                     buscar_borrar_cambs();    
		},
		error:function(req,e,er) {
			alert('error!m');
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
                url:'../../../scripts/oper_cat_cabms.php?o=11',
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
    
    var texto=$("#txtCabms").val(); 
        var losdatos = {txtCabms:$("#txtCabms").val()};   
        if(texto=="")
           {
              jQuery('#txtCabms').validationEngine('validate');

           }
           else
               {
                     $("#DivBusqueda").empty();  
                     $.ajax({
                               url:'../../../scripts/oper_cat_cabms.php?o=12',
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
function verQrForPrint()
{
    var Texto0=$("#txtCabms").val();
    var Texto1=$("#cboTipo").val()
    window.open('../../../scripts/printQR.php?Texto0=' + Texto0 + '&Texto1=' + Texto1,'','width=500px,height=500px' )
}
function load_cbo_unidad()
{
   
   $('#cboUnidad').html('<option value="">Cargando...aguarde</option>');
   $.ajax({
                    url:'../../../scripts/oper_cat_cabms.php?o=13',
                    type:'POST',
                    success:function(data)
                    {
                       $('#cboUnidad').html(data);
                    },
                    error:function(req,e,er) {
                            alert('error!');
                    }
            });
}
function add_Umedida()
{
    
    var v1=$("#txtUmedida").val();
    
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
                        
                        $("#txtUmedida").val(''); 
                        $("#dialog").dialog("close");
                        load_cbo_unidad();
                    },
                    error:function(req,e,er) {
                            alert('error!');
                    }
            }); 
      }
}
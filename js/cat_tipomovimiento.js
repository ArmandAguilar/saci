function load_frm()
{
    
   $("#DivTrabajo").empty();
   $.ajax({
                url:'../../../scripts/oper_cat_tipomovimiento.php?o=1',
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
function add_tmov()
{

  var Vchk1 = $('#chkEntrada:checked').val();
  var Vchk2 = $('#chkchkBaja:checked').val();
  var Vchk3 = $('#chkSalida:checked').val();
  var Vchk4 = $('#chkActivo:checked').val();
  var v1 = $("#txtCodigo").val();
  var v2 = $("#txtdescripcion").val()       
  var v3 = $("#cboTipo").val();
            
  if(Vchk1==undefined)
    {
      Vchk1 = "NO";
    }
  
  if(Vchk2==undefined)
    {
      Vchk2 = "NO";
    }

  if(Vchk3==undefined)
    {
      Vchk3 = "NO";
    }

  if(Vchk4==undefined)
    {
      Vchk4 = "NO";
    }
  
  var  losdatos = {txtCodigo:$("#txtCodigo").val(),txtdescripcion:$("#txtdescripcion").val(),chkEntrada:Vchk1,chkBaja:Vchk2,chkSalida:Vchk3,cboTipo:$("#cboTipo").val(),chkActivo:Vchk4}; 
  if(v1=="")
  {
      jQuery('#txtCodigo').validationEngine('validate'); 
  }
  else
      {
          if(v1=="")
            {
                jQuery('#txtdescripcion').validationEngine('validate'); 
            }
          else
            {
                if(v3=="")
                 {
                   jQuery('#cboTipo').validationEngine('validate');   
                 }
                 else{
                                    $.ajax({
                                       url:'../../../scripts/oper_cat_tipomovimiento.php?o=2',
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

function frm_buscador_tmov()
 {
     $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_tipomovimiento.php?o=3',
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
                        url:'../../../scripts/oper_cat_tipomovimiento.php?o=4',
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

function frm_editar_tmov(id)
{
    
     $("#DivBusqueda").empty();  
     var losdatos = {id:id};
      $.ajax({
                url:'../../../scripts/oper_cat_tipomovimiento.php?o=5',
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
  var Vchk1 = $('#chkEntradaE:checked').val();
  var Vchk2 = $('#chkchkBajaE:checked').val();
  var Vchk3 = $('#chkSalidaE:checked').val();
  var Vchk4 = $('#chkActivoE:checked').val();
  var v1 = $("#txtCodigoE").val();
  var v2 = $("#txtdescripcionE").val()       
  var v3 = $("#cboTipoE").val();
            
  if(Vchk1==undefined)
    {
      Vchk1 = "NO";
    }
  
  if(Vchk2==undefined)
    {
      Vchk2 = "NO";
    }

  if(Vchk3==undefined)
    {
      Vchk3 = "NO";
    }

  if(Vchk4==undefined)
    {
      Vchk4 = "NO";
    }
  
  var  losdatos = {id:id,txtCodigo:$("#txtCodigoE").val(),txtdescripcion:$("#txtdescripcionE").val(),chkEntrada:Vchk1,chkBaja:Vchk2,chkSalida:Vchk3,cboTipo:$("#cboTipoE").val(),chkActivo:Vchk4}; 
  if(v1=="")
  {
      jQuery('#txtCodigoE').validationEngine('validate'); 
  }
  else
      {
          if(v1=="")
            {
                jQuery('#txtdescripcionE').validationEngine('validate'); 
            }
          else
            {
                if(v3=="")
                 {
                   jQuery('#cboTipoE').validationEngine('validate');   
                 }
                 else{
                                    $.ajax({
                                       url:'../../../scripts/oper_cat_tipomovimiento.php?o=6',
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

function frm_buscador_borrar()
{
    $("#DivTrabajo").empty();
      $.ajax({
                url:'../../../scripts/oper_cat_tipomovimiento.php?o=7',
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
                               url:'../../../scripts/oper_cat_tipomovimiento.php?o=8',
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

function borrar_tmov(id)
{
   var losdatos ={id:id}; 
     smoke.confirm('Realmente desea borrar este registro?',function(e)
   {
	if (e)
        {
            $.ajax({
                url:'../../../scripts/oper_cat_tipomovimiento.php?o=9',
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
                url:'../../../scripts/oper_cat_tipomovimiento.php?o=10',
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
                               url:'../../../scripts/oper_cat_tipomovimiento.php?o=11',
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

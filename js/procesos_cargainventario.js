$(function() {  
               $("#dialog").dialog({
                                autoOpen: false,
                                width: 750,
                                height: 400
                        });
                $("#dialog2").dialog({
                                autoOpen: false,
                                width: 750,
                                height: 400
                        });        
                $("#dialog3").dialog({
                    autoOpen: false,
                    width: 460,
                    height: 250
            });       
                        
                    });
                

function on()
{
   $("#GridBusqueda").empty();
   $("#dialog").dialog("open"); 
}

function on2()
{
   $("#GridBusqueda2").empty();
   $("#dialog2").dialog("open"); 
}
function buscar_archivo()
{
    $("#DivLoad1").show();
    var Clave = $("#chkClave:checked").val();
    var Descripcion = $("#chkDescripcion:checked").val();
   
    
    if(Clave=="Clave")
     {
         Clave='Si';
     }
    
   if(Descripcion=="Descripcion")
     {
         Descripcion='Si';
     }

   
      
    var losdatos ={txtPatron:$("#txtPatron").val(),Clave:Clave,Descripcion:Descripcion};
    $("#GridBusqueda").empty();
    $.ajax({
                url:'../../../scripts/oper_cargainventario.php?o=1',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                    $("#GridBusqueda").append(data); 
                    $("#DivLoad1").hide();
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
}
function buscar_archivo_consulta()
{
    $("#DivLoad2").show();
    var Clave = $("#chkClave:checked").val();
    var Descripcion = $("#chkDescripcion:checked").val();
   
    
    if(Clave=="Clave")
     {
         Clave='Si';
     }
    
   if(Descripcion=="Descripcion")
     {
         Descripcion='Si';
     }

   
      
    var losdatos ={txtPatron:$("#txtPatron2").val(),Clave:Clave,Descripcion:Descripcion};
    $("#GridBusqueda2").empty();
    $.ajax({
                url:'../../../scripts/oper_cargainventario.php?o=8',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                    $("#GridBusqueda2").append(data); 
                    $("#DivLoad2").hide();
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
}
function saver_Order()
{
       document.frmCargaInventario.submit();
}
function saver_Order2()
{
       document.frmOrderGrid.submit();
}
function saver_Order3()
{
       document.frmOrderGrid.submit();
}
function acpetar_Art(Id_CABMS,vDescripcion,existencia,costopromedio,membrete)
{
    $("#txtDescripcion").val('');
    $("#txtCABMS").val('');   
    $("#txtArtDisponible").val('');
    $("#txtCostoPromedio").val('');
    $("#txtNoMarbete").val('');
    $("#txtDescripcion").val(vDescripcion);
    $("#txtCABMS").val(Id_CABMS);
    $("#txtArtDisponible").val(existencia);
    $("#txtCostoPromedio").val(costopromedio);
    $("#txtNoMarbete").val(membrete);
    var losdatos = {Id_CABMS:Id_CABMS};
    $.ajax({
                url:'../../../scripts/oper_cargainventario.php?o=2',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                  $("#DivBtnAgrega").show();
                  $("#txtArtApartados").val(data);  
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
    $('#dialog').dialog('close');
}
function acpetar_Art2(Id_CABMS,vDescripcion,existencia,costopromedio,membrete)
{
  
    
    $("#txtDescripcion").val('');
    $("#txtCABMS").val('');
    $("#txtArtDisponible").val('');
    $("#txtCostoPromedio").val('');
    $("#txtNoMarbete").val('');
    
   
    
    $("#txtDescripcion").val(vDescripcion);
    $("#txtCABMS").val(Id_CABMS);
    $("#txtArtDisponible").val(existencia);
    $("#txtCostoPromedio").val(costopromedio);
    $("#txtNoMarbete").val(membrete);
    var losdatos = {Id_CABMS:Id_CABMS};
    $.ajax({
                url:'../../../scripts/oper_cargainventario.php?o=2',
		type:'POST',
                data:losdatos,
		success:function(data)
                {
                  $("#DivBtnAgrega").show();
                  $("#txtArtApartados").val(data); 
                  detalles_consulta();
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});
    
}
function agragar_grid()
{
    var losdatos = {Id_CABMS:$("#txtCABMS").val(),
                    vDescripcion:$("#txtDescripcion").val(),
                    ArtApartado:$("#txtArtApartados").val(),
                    ArtDisponibles:$("#txtArtDisponible").val(),
                    CostoPromedio:$("#txtCostoPromedio").val(),
                    NoMarbete:$("#txtNoMarbete").val(),
                    Session:$("#txtSession").val() 
                };
        var v1 = $("#txtCostoPromedio").val();
        var v2 = $("#txtArtDisponible").val();
        var v3 = $("#txtNoMarbete").val();
        
        
        if(v1=="")
          {
              jQuery('#txtCostoPromedio').validationEngine('validate'); 
          }
        else
            {
                if(v2=="")
                  {
                      jQuery('#txtArtDisponible').validationEngine('validate'); 
                  }
                 else
                     {
                         if(v3=="")
                           {
                              jQuery('#txtNoMarbete').validationEngine('validate');  
                           }
                         else
                             {
                                   $.ajax({
                                            url:'../../../scripts/oper_cargainventario.php?o=3',
                                            type:'POST',
                                            data:losdatos,
                                            success:function(data)
                                            {
                                                 smoke.signal('Registro agregado con exito.'); 
                                                 
                                                 $("#txtCABMS").val('');
                                                 $("#txtDescripcion").val('');
                                                 $("#txtArtApartados").val('');
                                                 $("#txtArtDisponible").val('');
                                                 $("#txtCostoPromedio").val('');
                                                 $("#txtNoMarbete").val('');
                                                 RGrid();
                                            },
                                            error:function(req,e,er) {
                                                    alert('error!');
                                            }
                                    });
                             }
                     }
            }
}
function RGrid()
{
	
   $("#GridInventario").empty(); 
   var losdatos = {session:$("#txtSession").val()}; 
    $.ajax({
            url:'../../../scripts/oper_cargainventario.php?o=4',
            type:'POST',
            data:losdatos,
            success:function(data)
            {
                 $("#GridInventario").append(data);
                 //alert(data);
                 //$("#DivBtnAceptar").show();
            },
            error:function(req,e,er) {
                    alert('error!');
            }
         });
    
}
function borrar_grid()
{
    var losdatos = {id:$("#txtIdBorrar").val()}; 
    $.ajax({
            url:'../../../scripts/oper_cargainventario.php?o=5',
            type:'POST',
            data:losdatos,
            success:function(data)
            {
               RGrid();  
            },
            error:function(req,e,er) {
                    alert('error!');
            }
         });
    
    $("#txtIdBorrar").val();
    $("#dialog3").dialog("close");
}
function frm_agregar()
{
   $("#Trabajo").empty();
    $.ajax({
            url:'../../../scripts/oper_cargainventario.php?o=6',
            type:'POST',
            success:function(data)
            {
                 $("#Trabajo").append(data);
            },
            error:function(req,e,er) {
                    alert('error!');
            }
         }); 
}
function frm_consultar()
{
   $("#Trabajo").empty();
    $.ajax({
            url:'../../../scripts/oper_cargainventario.php?o=7',
            type:'POST',
            success:function(data)
            {
                 $("#Trabajo").append(data);
            },
            error:function(req,e,er) {
                    alert('error!');
            }
         }); 
}
function detalles_consulta()
{
     $("#DivLoad3").show();
    $("#GridDetalle").empty();
    var losdatos={Id_CABMS:$("#txtCABMS").val()};
    $.ajax({
            url:'../../../scripts/oper_cargainventario.php?o=9',
            type:'POST',
            data:losdatos,
            success:function(data)
            {
                 $("#GridDetalle").append(data);
                  $("#DivLoad3").hide();
                  
            },
            error:function(req,e,er) {
                    alert('error!');
            }
         });
}
function borrar_grid_session(id)
{

	var losdatos={id:id};
    $.ajax({
            url:'../../../scripts/oper_cargainventario.php?o=10',
            type:'POST',
            data:losdatos,
            success:function(data)
            {
                 
            },
            error:function(req,e,er) {
                    alert('error!');
            }
         });
	
}
function limpiar(id)
{
     /*Borramos el contenido actual */
	 borrar_grid_session(id);
	 /*recargamos la pagina */
	 $("#Trabajo").empty();
	 frm_agregar();

}
function  aceptar_btn()
{
	smoke.confirm('&iquest;Esta seguro que los datos est&aacute;n correctos?',function(e)
	          {
	               if (e)
	               {
	            	   saver_Order();    
	               }
	               else
	               {}
	          });


}
function borrar_grid_alert(idcambs,id)
{
    $("#txtIdBorrar").val();
    $("#txtIdBorrar").val(id);
    $("#DivCambs").empty();
    $("#DivCambs").append(idcambs);
    $("#dialog3").dialog("open"); 

}


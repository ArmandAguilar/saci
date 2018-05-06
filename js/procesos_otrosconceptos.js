function load_frm()
{
     $("#DivTrabajo").empty();
     $.ajax({
                url:'../../../scripts/oper_procesos_otrosconceptos.php?o=1',
		type:'POST',
		success:function(data)
                {
                    $("#DivTrabajo").append(data);
		},
		error:function(req,e,er) {
			alert(req + e + er);
		}
	});
    
}
function saver_Order()
{
       document.frmOtrosConceptos.submit();
}
function saver_Order2()
{
       
}
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
                url:'../../../scripts/oper_procesos_otrosconceptos.php?o=2',
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
function buscar_archivo_um()
{
    $("#DivLoad2").show();
    var Clave = $("#chkClave2:checked").val();
    var Descripcion = $("#chkDescripcion2:checked").val();
   
    
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
                url:'../../../scripts/oper_procesos_otrosconceptos.php?o=6',
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
function acpetar_Art(Id_CABMS,vDescripcion,existencia,costopromedio,umedida,idumedida)
{
    
    $("#txtCABMS").val('');
    $("#txtUMedida").val('');
    $("#txtCTratar").val('');
    $("#txtCPromedio").val('');
    $("#txtidumedida").val('');
    
    
    $("#txtCABMS").val(Id_CABMS);
    $("#txtDescripcion").val(vDescripcion);
    $("#txtUMedida").val(umedida);
    $("#txtCTratar").val(existencia);
    $("#txtCPromedio").val(costopromedio);
    $("#txtidumedida").val(idumedida);
    $("#DivBoton").show();
  
}
function aceptar_unidad(idumedida,umedida)
{

    $("#txtUMedida").val('');
    $("#txtidumedida").val('');
    $("#txtUMedida").val(umedida);
    $("#txtidumedida").val(idumedida);
    $("#dialog2").dialog("close");

}
function agregar_grid()
{
   var losdatos ={
        
        Id_CABMS:$("#txtCABMS").val(),
        Descripcion:$("#txtDescripcion").val(),
        UnidadMedida:$("#txtUMedida").val(),
        RemFac:$("#txtRFactura").val(),
        CostoPromedio:$("#txtCPromedio").val(),
        Cantidad:$("#txtCTratar").val(),
        Session:$("#txtSession").val(),
        IdUMedida:$("#txtidumedida").val()
   }
  if($("#txtCABMS").val()=="")
	{
	   smoke.signal('Error: No se a selecionado Cambs');
	}
  else{
			  $.ajax({
		          url:'../../../scripts/oper_procesos_otrosconceptos.php?o=3',
			type:'POST',
		          data:losdatos,
			success:function(data)
		          {
				      $("#Grid").empty();
		              $("#txtCABMS").val('');
		              $("#txtDescripcion").val('');
		              $("#txtUMedida").val('');
		              $("#txtUMedida").val('');
		              $("#txtCPromedio").val('');
		              $("#txtCTratar").val('');
		              $("#txtRFactura").val('');
		              $("#txtidumedida").val('');
		              $("#DivBoton").hide();
		              Grid_Conceptos();
			},
			error:function(req,e,er) {
				alert('error!');
			}
		});
  }
         
}
function Grid_Conceptos()
{
    $("#Grid").empty();
    $.ajax({
                url:'../../../scripts/oper_procesos_otrosconceptos.php?o=4',
		type:'POST',
		success:function(data)
                {
                    $("#Grid").append(data);
                    
		},
		error:function(req,e,er) {
			alert('error!');
		}
	}); 
}

function borrar_grid(id)
{
     var losdatos ={id:id}; 
  smoke.confirm('Realmente desea borrar este registro?',function(e)
   {
	if (e)
        {
            $.ajax({
                url:'../../../scripts/oper_procesos_otrosconceptos.php?o=5',
		type:'POST',
                data:losdatos,
                cache:false,
		success:function(data)
                {
                    
                     Grid_Conceptos();    
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
function click_save()
{
    document.frmOtrosConceptos.submit();
    
}


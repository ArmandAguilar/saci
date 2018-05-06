$(function() {  
       $("#dialog1").dialog({
                        autoOpen: false,
                        width: 750,
                        height: 400
                });
                
     });
function OnBucarCambsInicio()
{
    $("#dialog1").dialog('open');
}

function Buscarcambs1()
{
    $("#GridBusqueda1").empty();
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
	                url:'../../../scripts/oper_reporte_historicoconsumo.php?o=1',
			type:'POST',
	         data:losdatos,
			success:function(data)
	                {
	                    $("#GridBusqueda1").append(data); 
	                    //alert(data);
                            $("#DivLoad1").hide();
			},
			error:function(req,e,er) {
				alert('error!mn');
			}
		});
                
}

function select_cambs1(idCambs,CDescripcion)
{
    $("#txtCambsInicio").val(idCambs);
    $("#txtDescripcion1").val(CDescripcion);
     $("#dialog1").dialog('close');
}

function saver_Order()
{
      
}
function ejecutar()
{
    
    var fecha1v = $("#txtFechaInicio").val();
    var fecha2v = $("#txtFechaFinal").val();
    var cambs = $("#txtCambsInicio").val();
    var losdatos ={fecha1:$("#txtFechaInicio").val(),fecha2:$("#txtFechaFinal").val(),Cambs:$("#txtCambsInicio").val()};
    if(fecha1v=="")
     {
    	smoke.signal("El Campo fecha no puede estar vacio");
     }
    else{
    	  if(fecha2v=="")
    	  {
    		  smoke.signal("El Campo fecha no puede estar vacio");
    	  }	
    	  else
    		  {
    		     if(cambs=="")
    		    	 {
    		    	 smoke.signal("El Campo cambs no puede estar vacio");
    		    	 }
    		     else
    		    	 {
			    		    	 $("#DivLoad").show();
					    		  $.ajax({
					                  url:'../../../scripts/oper_reporte_historicoconsumo.php?o=3',
					                  type:'POST',
					                  data:losdatos,
					                  success:function(data)
					                  {
					                      $("#DivLoad").hide();
					                      $("#DivReporte").append(data); 
					                  },
					                  error:function(req,e,er) {
					                          alert('error!');
					                  }
					  	    });
    		    	 }
    		            
    		  }
    } 
    
}
function open_Pdf()
{
	var v1 = $("#txtFechaInicio").val();
    var v2 = $("#txtFechaFinal").val();
    var v3 = $("#txtCambsInicio").val();
    window.open('pdf/reporte_historicoconsumo_pdf.php?v1=' + v1 + '&v2=' + v2 + '&v3=' + v3, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
	var v1 = $("#txtFechaInicio").val();
    var v2 = $("#txtFechaFinal").val();
    var v3 = $("#txtCambsInicio").val();
    window.open('xls/reporte_historicoconsumo_xls.php?v1=' + v1 + '&v2=' + v2 + '&v3=' + v3, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}

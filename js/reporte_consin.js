


function saver_Order()
{
      
}
function ejecutar()
{
    
    var fecha1v = $("#txtFechaInicio").val();
    var fecha2v = $("#txtFechaFinal").val();
    var tipo = $('#cboTipo').val();
    $("#DivReporte").empty(); 
    //salert(tipo);
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
    		     if(tipo=="Sin")
    		    	 {
		    		    	 var losdatos = {fecha1:$("#txtFechaInicio").val(),fecha2:$("#txtFechaFinal").val()};
		    		    	 $("#DivLoad").show();
				    		  $.ajax({
				                  url:'../../../scripts/oper_reporte_consin.php?o=2',
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
    		     else
    		    	 {
			    		    	
    		    	      if(tipo=="Con")
    		    	    	{
    		    	    	  
    		    	    	  var losdatos = {fecha1:$("#txtFechaInicio").val(),fecha2:$("#txtFechaFinal").val()};
			    		    		    	 $("#DivLoad").show();
								    		  $.ajax({
								                  url:'../../../scripts/oper_reporte_consin.php?o=1',
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
    		    	      else
    		    	    	  {
    		    	    	  
    		    	    	      if(tipo=='no')
    		    	    	    	  {
    		    	    	    	     smoke.signal("ÀCual es tipo de reportes ?");
    		    	    	    	  }
    		    	    	      
    		    	    	   }

    		    	 }
    		            
    		  }
    } 
    
}
function open_Pdf1()
{
    var f1=$("#txtFechaInicio").val();
    var f2=$("#txtFechaFinal").val();	
    window.open('pdf/reporte_exitencias_costopromedio_con_pdf.php?fecha1=' + f1 + '&fecha2=' + f2,'', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls1()
{
	var f1=$("#txtFechaInicio").val();
    var f2=$("#txtFechaFinal").val();
    window.open('xls/reporte_exitencias_costopromedio_con_xls.php?fecha1=' + f1 + '&fecha2=' + f2,'', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}

function open_Pdf2()
{
    var f1=$("#txtFechaInicio").val();
    var f2=$("#txtFechaFinal").val();	
    window.open('pdf/reporte_exitencias_costopromedio_sin_pdf.php?fecha1=' + f1 + '&fecha2=' + f2,'', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls2()
{
	var f1=$("#txtFechaInicio").val();
    var f2=$("#txtFechaFinal").val();
    window.open('xls/reporte_exitencias_costopromedio_sin_xls.php?fecha1=' + f1 + '&fecha2=' + f2,'', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
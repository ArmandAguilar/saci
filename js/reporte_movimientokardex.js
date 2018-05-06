$(function() {  
       $("#dialog1").dialog({
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
function OnBucarCambsInicio()
{
    $("#dialog1").dialog('open');
}
function OnBucarCambsFin()
{
    $("#dialog2").dialog('open');
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
	                url:'../../../scripts/oper_reporte_movimeintokardex.php?o=1',
			type:'POST',
	         data:losdatos,
			success:function(data)
	                {
	                    $("#GridBusqueda1").append(data); 
	                    //alert(data);
                            $("#DivLoad1").hide();
			},
			error:function(req,e,er) {
				alert('error!');
			}
		});
                
}
function Buscarcambs2()
{
    $("#GridBusqueda2").empty();
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
	                url:'../../../scripts/oper_reporte_movimeintokardex.php?o=2',
			type:'POST',
	         data:losdatos,
			success:function(data)
	                {
	                    $("#GridBusqueda2").append(data); 
	                    //alert(data);
                            $("#DivLoad2").hide();
			},
			error:function(req,e,er) {
				alert('error!');
			}
		});
                
}
function select_cambs1(idCambs,CDescripcion)
{
    $("#txtCambsInicio").val(idCambs);
    $("#txtDescripcion1").val(CDescripcion);
     $("#dialog1").dialog('close');
}
function select_cambs2(idCambs,CDescripcion)
{
    $("#txtCambsFinal").val(idCambs);
    $("#txtDescripcion2").val(CDescripcion);
     $("#dialog2").dialog('close');
}
function saver_Order()
{
      
}
function ejecutar()
{
    $("#DivLoad").show();
    
    $.ajax({
                url:'../../../scripts/oper_reporte_movimeintokardex.php?o=3',
                type:'POST',
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
function open_Pdf()
{
   
    window.open('pdf/reporte_movcardex_pdf.php?', '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
    window.open('xls/reporte_movcardex_xls.php?', '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}


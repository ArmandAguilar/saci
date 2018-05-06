$(function() {  
       $("#Cambs1").dialog({
                        autoOpen: false,
                        width: 750,
                        height: 400
                });
       $("#Cambs2").dialog({
                        autoOpen: false,
                        width: 750,
                        height: 400
                });
});
function OnCambs1()
{
    $("#Cambs1").dialog('open');
}
function OnCambs2()
{
    $("#Cambs2").dialog('open');
}
function Buscarcambs1()
{
    $("#GridBusqueda1").empty();
     $("#DivLoad1").show();
    var Clave = $("#chkClave1:checked").val();
	 var Descripcion = $("#chkDescripcion1:checked").val();
	    
	    
	    if(Clave=="Clave")
	     {
	         Clave='Si';
	     }
	    
	   if(Descripcion=="Descripcion")
	     {
		   Descripcion='Si';
	     }
	   
	    var losdatos ={txtPatron:$("#txtPatron1").val(),Clave:Clave,Descripcion:Descripcion};
	    $("#GridBusqueda1").empty();
	    $.ajax({
	                url:'../../../scripts/oper_reporte_pronostico_consumo.php?o=1',
			type:'POST',
	         data:losdatos,
			success:function(data)
	                {
	                    $("#GridBusqueda1").append(data); 
	                    
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
	                url:'../../../scripts/oper_reporte_pronostico_consumo.php?o=2',
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
function select_cambs1(idCambs,CDescripcion)
{
    $("#txtCambsInicio").val(idCambs);
    $("#txtDesInicio").val(CDescripcion);
    $("#Cambs1").dialog('close');
}
function select_cambs2(idCambs,CDescripcion)
{
    $("#txtCambsFinal").val(idCambs);
    $("#txtDesFin").val(CDescripcion);
    $("#Cambs2").dialog('close');
}
function generar_reprte()
{
	var chkBox01=$("#chkBox01:checked").val();
	var chkBox02=$("#chkBox02:checked").val();
	var chkBox03=$("#chkBox03:checked").val();
	var chkBox04=$("#chkBox04:checked").val();
	var chkBox05=$("#chkBox05:checked").val();
	var chkBox06=$("#chkBox06:checked").val();
	var chkBox07=$("#chkBox07:checked").val();
	var chkBox08=$("#chkBox08:checked").val();
	var chkBox09=$("#chkBox09:checked").val();
	var chkBox10=$("#chkBox10:checked").val();
	var chkBox11=$("#chkBox11:checked").val();
	var chkBox12=$("#chkBox12:checked").val();
	//alert($("#chkBox12:checked").val());
	if(chkBox01=='undefined')
	 {
		chkBox01=0;
	 }
	if(chkBox02=='undefined')
	 {
		chkBox02=0;
	 }
	if(chkBox03=='undefined')
	 {
		chkBox03=0;
	 }
	if(chkBox04=='undefined')
	 {
		chkBox04=0;
	 }
	if(chkBox05=='undefined')
	 {
		chkBox05=0;
	 }
	if(chkBox06=='undefined')
	 {
		chkBox06=0;
	 }
	if(chkBox07=='undefined')
	 {
		chkBox07=0;
	 }
	if(chkBox08=='undefined')
	 {
		chkBox08=0;
	 }
	if(chkBox09=='undefined')
	 {
		chkBox09=0;
	 }
	if(chkBox10=='undefined')
	 {
		chkBox10=0;
	 }
	if(chkBox11=='undefined')
	 {
		chkBox11=0;
	 }
	if(chkBox12=='undefined')
	 {
		chkBox12=0;
	 }
	var losdatos = {
			         txtCambsInicio:$('#txtCambsInicio').val(),
			         txtCambsFinal:$('#txtCambsFinal').val(),
			         cboMes:$('#cboMes').val(),
			         cboAnio:$('#cboAnio').val(),
			         txtAnioBase:$("#txtAnioBase").val(),
			         chkBox01:chkBox01,
			         chkBox02:chkBox02,
			         chkBox03:chkBox03,
			         chkBox04:chkBox04,
			         chkBox05:chkBox05,
			         chkBox06:chkBox06,
			         chkBox07:chkBox07,
			         chkBox08:chkBox08,
			         chkBox09:chkBox09,
			         chkBox10:chkBox10
				};
	$("#DivLoadReporte").show(); 
	$("#DivGridAnios").hide();
	$("#DivReporte").empty();
	 $.ajax({
         url:'../../../scripts/oper_reporte_pronostico_consumo.php?o=3',
				type:'POST',
			  data:losdatos,
				success:function(data)
			         {
							//alert(data);
							$("#DivReporte").show();
			                $("#DivReporte").append(data);
			                $("#DivLoadReporte").hide();
			                 
				},
				error:function(req,e,er) {
					alert('error!');
				}
			});

}
function open_Pdf()
{
	var chkBox01=$("#chkBox01:checked").val();
	var chkBox02=$("#chkBox02:checked").val();
	var chkBox03=$("#chkBox03:checked").val();
	var chkBox04=$("#chkBox04:checked").val();
	var chkBox05=$("#chkBox05:checked").val();
	var chkBox06=$("#chkBox06:checked").val();
	var chkBox07=$("#chkBox07:checked").val();
	var chkBox08=$("#chkBox08:checked").val();
	var chkBox09=$("#chkBox09:checked").val();
	var chkBox10=$("#chkBox10:checked").val();
	var chkBox11=$("#chkBox11:checked").val();
	var chkBox12=$("#chkBox12:checked").val();
	//alert($("#chkBox12:checked").val());
	if(chkBox01=='undefined')
	 {
		chkBox01=0;
	 }
	if(chkBox02=='undefined')
	 {
		chkBox02=0;
	 }
	if(chkBox03=='undefined')
	 {
		chkBox03=0;
	 }
	if(chkBox04=='undefined')
	 {
		chkBox04=0;
	 }
	if(chkBox05=='undefined')
	 {
		chkBox05=0;
	 }
	if(chkBox06=='undefined')
	 {
		chkBox06=0;
	 }
	if(chkBox07=='undefined')
	 {
		chkBox07=0;
	 }
	if(chkBox08=='undefined')
	 {
		chkBox08=0;
	 }
	if(chkBox09=='undefined')
	 {
		chkBox09=0;
	 }
	if(chkBox10=='undefined')
	 {
		chkBox10=0;
	 }
	if(chkBox11=='undefined')
	 {
		chkBox11=0;
	 }
	if(chkBox12=='undefined')
	 {
		chkBox12=0;
	 }
	
			         var txtCambsInicio=$('#txtCambsInicio').val();
			         var txtCambsFinal=$('#txtCambsFinal').val();
			         var cboMes=$('#cboMes').val();
			         var cboAnio=$('#cboAnio').val();
			         var txtAnioBase=$("#txtAnioBase").val();
			         var chkBox01=chkBox01;
			         var chkBox02=chkBox02;
			         var chkBox03=chkBox03;
			         var chkBox04=chkBox04;
			         var chkBox05=chkBox05;
			         var chkBox06=chkBox06;
			         var chkBox07=chkBox07;
			         var chkBox08=chkBox08;
			         var chkBox09=chkBox09;
			         var chkBox10=chkBox10;
			         var chkBox11=chkBox11;
			         var chkBox12=chkBox12;
				
    window.open('pdf/reporte_pronostico_pdf.php?txtCambsInicio=' + txtCambsInicio + '&txtCambsFinal=' + txtCambsFinal + '&cboMes=' + cboMes + '&cboAnio=' + cboAnio + '&txtAnioBase=' + txtAnioBase + '&chkBox01=' + chkBox01 + '&chkBox02=' + chkBox02 + '&chkBox03=' +  chkBox03 + '&chkBox04=' + chkBox04 + '&chkBox05=' + chkBox05 + '&chkBox06=' + chkBox06 + '&chkBox07=' + chkBox07 + '&chkBox08=' + chkBox08 + '&chkBox09=' + chkBox09 + '&chkBox10=' + chkBox10 + '&chkBox11=' + chkBox11 + '&chkBox12=' + chkBox12, 'Aqui Termina', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
	var chkBox01=$("#chkBox01:checked").val();
	var chkBox02=$("#chkBox02:checked").val();
	var chkBox03=$("#chkBox03:checked").val();
	var chkBox04=$("#chkBox04:checked").val();
	var chkBox05=$("#chkBox05:checked").val();
	var chkBox06=$("#chkBox06:checked").val();
	var chkBox07=$("#chkBox07:checked").val();
	var chkBox08=$("#chkBox08:checked").val();
	var chkBox09=$("#chkBox09:checked").val();
	var chkBox10=$("#chkBox10:checked").val();
	var chkBox11=$("#chkBox11:checked").val();
	var chkBox12=$("#chkBox12:checked").val();
	//alert($("#chkBox12:checked").val());
	if(chkBox01=='undefined')
	 {
		chkBox01=0;
	 }
	if(chkBox02=='undefined')
	 {
		chkBox02=0;
	 }
	if(chkBox03=='undefined')
	 {
		chkBox03=0;
	 }
	if(chkBox04=='undefined')
	 {
		chkBox04=0;
	 }
	if(chkBox05=='undefined')
	 {
		chkBox05=0;
	 }
	if(chkBox06=='undefined')
	 {
		chkBox06=0;
	 }
	if(chkBox07=='undefined')
	 {
		chkBox07=0;
	 }
	if(chkBox08=='undefined')
	 {
		chkBox08=0;
	 }
	if(chkBox09=='undefined')
	 {
		chkBox09=0;
	 }
	if(chkBox10=='undefined')
	 {
		chkBox10=0;
	 }
	if(chkBox11=='undefined')
	 {
		chkBox11=0;
	 }
	if(chkBox12=='undefined')
	 {
		chkBox12=0;
	 }
	
			         var txtCambsInicio=$('#txtCambsInicio').val();
			         var txtCambsFinal=$('#txtCambsFinal').val();
			         var cboMes=$('#cboMes').val();
			         var cboAnio=$('#cboAnio').val();
			         var txtAnioBase=$("#txtAnioBase").val();
			         var chkBox01=chkBox01;
			         var chkBox02=chkBox02;
			         var chkBox03=chkBox03;
			         var chkBox04=chkBox04;
			         var chkBox05=chkBox05;
			         var chkBox06=chkBox06;
			         var chkBox07=chkBox07;
			         var chkBox08=chkBox08;
			         var chkBox09=chkBox09;
			         var chkBox10=chkBox10;
			         var chkBox11=chkBox11;
			         var chkBox12=chkBox12;
				
    window.open('xls/reporte_pronostico_xls.php?txtCambsInicio=' + txtCambsInicio + '&txtCambsFinal=' + txtCambsFinal + '&cboMes=' + cboMes + '&cboAnio=' + cboAnio + '&txtAnioBase=' + txtAnioBase + '&chkBox01=' + chkBox01 + '&chkBox02=' + chkBox02 + '&chkBox03=' +  chkBox03 + '&chkBox04=' + chkBox04 + '&chkBox05=' + chkBox05 + '&chkBox06=' + chkBox06 + '&chkBox07=' + chkBox07 + '&chkBox08=' + chkBox08 + '&chkBox09=' + chkBox09 + '&chkBox10=' + chkBox10 + '&chkBox11=' + chkBox11 + '&chkBox12=' + chkBox12, 'Aqui Termina', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
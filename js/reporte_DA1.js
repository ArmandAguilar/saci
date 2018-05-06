function saver_Order()
{
      
}
function ejecutar()
{
    $("#DivLoad").show();
    $("#DivReporte").empty();
    var losdatos = {FechaInicial:$("#txtFechaInicio").val(),FechaFinal:$("#txtFechaFinal").val()};
    $.ajax({
                url:'../../../scripts/oper_reporte_DA1.php?o=1',
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
function open_Pdf()
{
   var Fecha1 = $("#txtFechaInicio").val();
   var Fecha2 =  $("#txtFechaFinal").val();
	
    window.open('pdf/reporte_da1_pdf.php?Fecha1=' + Fecha1 + '&Fecha2=' + Fecha2, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
	var Fecha1 = $("#txtFechaInicio").val();
	var Fecha2 =  $("#txtFechaFinal").val();
    window.open('xls/reporte_da1_xls.php?Fecha1=' + Fecha1 + '&Fecha2=' + Fecha2, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}



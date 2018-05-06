function saver_Order()
{
      
}
function ejecutar()
{
    $("#DivLoad").show();
    $("#DivReporte").empty();
    var cbo =  $("#cboUnidad").val();
    var losdatos = {fecha1:$("#txtFechaInicio").val(),fecha2:$("#txtFechaFinal").val(),unidad:cbo};
    $.ajax({
                url:'../../../scripts/oper_reporte_entradaysalida.php?o=1',
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
    var v1 = $("#txtFechaInicio").val();
    var v2 = $("#txtFechaFinal").val();
    var v3 = $("#cboUnidad").val();
    window.open('pdf/reporte_entradaysalida_pdf.php?v1=' + v1 + '&v2=' + v2 + '&v3=' + v3, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
	var v1 = $("#txtFechaInicio").val();
    var v2 = $("#txtFechaFinal").val();
    var v3 = $("#cboUnidad").val();
    window.open('xls/reporte_entradaysalida_xls.php?v1=' + v1 + '&v2=' + v2 + '&v3=' + v3, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
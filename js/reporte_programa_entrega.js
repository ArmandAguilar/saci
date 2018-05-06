
$(function() {
	$(".chzn-select").chosen(); 
    $(".chzn-select-deselect").chosen({allow_single_deselect:true});
 });

function saver_Order()
{
      
}
function ejecutar()
{
	var mes = $("#CBMes").val();
	var orden = $("#CBOrden").val();
    $("#DivReporte").empty(); 
    var losdatos = {xMes:mes,xOrden:orden};
	    $("#DivTrabajo").empty();
	    $("#DivLoad").show();
	    $.ajax({
	                url:'../../../scripts/oper_reporte_de_programas_de_entrega.php?o=1',
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
	var v1 = $("#CBMes").val();
	var v2 = $("#CBOrden").val();
    window.open('pdf/reporte_programaentrega_pdf.php?v1=' + v1 + '&v2=' + v2, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
	var v1 = $("#CBMes").val();
	var v2 = $("#CBOrden").val();
    window.open('xls/reporte_programaentrega_xls.php?v1=' + v1 + '&v2=' + v2, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}

$(function() {
               $(".chzn-select").chosen(); 
                $(".chzn-select-deselect").chosen({allow_single_deselect:true});                                         
             
             });                                      
function saver_Order()
{
      
}
function ejecutar()
{
    $("#DivLoad").show();
    $("#DivReporte").empty();
    var losdatos = {CBValor:$("#CBValor").val()};
    $.ajax({
                url:'../../../scripts/oper_reporte_capasidadalmacen.php?o=1',
                type:'POST',
                data:losdatos,
                success:function(data)
                {
                    $("#DivLoad").hide();
                    $("#DivReporte").append(data);
                },
                error:function(req,e,er) {
                        alert('error!' + er);
                }
	    });
}
function open_Pdf()
{
	var losdatos = $("#CBValor").val();
    window.open('pdf/reporte_capasidadalmacen_pdf.php?CBValor=' + losdatos, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls()
{
	var losdatos = $("#CBValor").val();
    window.open('xls/reporte_capasidadalmacen_xls.php?CBValor=' + losdatos, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}


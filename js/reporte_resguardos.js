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
function OnBucarCambs()
{
    $("#dialog1").dialog('open');
}
function OnBucarResguardante()
{
    $("#dialog2").dialog('open');
}
function saver_Order()
{
      
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
	                url:'../../../scripts/oper_reporte_resguardos.php?o=1',
			type:'POST',
	         data:losdatos,
			success:function(data)
	                {
	                    $("#GridBusqueda1").append(data); 
	                    //alert(data);
                            $("#DivLoad1").hide();
			},
			error:function(req,e,er) {
				alert('error!' + req + e + er);
			}
		});
                
}
function buscar_empleado()
{
	$("#DivLoad2").show();
	 var Clave = $("#chkClave2:checked").val();
	 var Nombre = $("#chkNombre:checked").val();
	    
	    
	    if(Clave=="Clave")
	     {
	         Clave='Si';
	     }
	    
	   if(Nombre=="Nombre")
	     {
		   Nombre='Si';
	     }

	      
	    var losdatos ={txtPatron:$("#txtPatron2").val(),Clave:Clave,Nombre:Nombre};
	    $("#GridBusqueda2").empty();
	    $.ajax({
	        url:'../../../scripts/oper_reporte_resguardos.php?o=2',
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
function select_resguardante(id,nombre)
{
    $("#txtResId").val(id);
    $("#txtNombre").val(nombre);
     $("#dialog2").dialog('close');
}
function select_cambs(idCambs,CDescripcion)
{
	//alert(idCambs);
    $("#txtCveCambs").val(idCambs);
    $("#txtDes").val(CDescripcion);
    $("#dialog1").dialog('close');
}

function generar()
{
	$("#DivReporte").empty(); 
	$("#DivLoad").hide();
	var losdatos ={
			txtCveCambs:$("#txtCveCambs").val(),
			txtDes:$("#txtDes").val(),
			txtResId:$("#txtResId").val(),
			txtNombre:$("#txtNombre").val()
			};
    $("#GridBusqueda").empty();
    $.ajax({
                url:'../../../scripts/oper_reporte_resguardos.php?o=3',
		type:'POST',
         data:losdatos,
		success:function(data)
                {
                    $("#DivReporte").append(data); 
                    //alert(data);
                    $("#DivLoad").hide();
                        
		},
		error:function(req,e,er) {
			alert('error!');
		}
	});

}

function open_Xls1()
{
	var txtCveCambs=$("#txtCveCambs").val();
	var txtResId=$("#txtResId").val();
	var txtNombre=$("#txtNombre").val();
	
    window.open('xls/reporte_mueble_resguardo.php?txtCveCambs=' + txtCveCambs + '&txtResId=' + txtResId + '&txtNombre=' + txtNombre, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls2()
{
	var txtCveCambs=$("#txtCveCambs").val();
	var txtResId=$("#txtResId").val();
	var txtNombre=$("#txtNombre").val();
	
    window.open('xls/reporte_informatico_resguardo.php?txtCveCambs=' + txtCveCambs + '&txtResId=' + txtResId + '&txtNombre=' + txtNombre, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls3()
{
	var txtCveCambs=$("#txtCveCambs").val();
	var txtResId=$("#txtResId").val();
	var txtNombre=$("#txtNombre").val();
	
    window.open('xls/reporte_vehiculo_resguardo.php?txtCveCambs=' + txtCveCambs + '&txtResId=' + txtResId + '&txtNombre=' + txtNombre, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
function open_Xls4()
{
	var txtCveCambs=$("#txtCveCambs").val();
	var txtResId=$("#txtResId").val();
	var txtNombre=$("#txtNombre").val();
	
    window.open('xls/reporte_acervo_resguardo.php?txtCveCambs=' + txtCveCambs + '&txtResId=' + txtResId + '&txtNombre=' + txtNombre, '', 'toolbars=no,scrollbars=yes,location=no,statusbars=no,menubars=no,width:267px,height:221px');
}
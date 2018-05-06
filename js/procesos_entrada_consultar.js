function frm_cosnulta()
{
                load_frm();
                $("#DivPedido").empty(); 
                $.ajax({
                    url:'../../../scripts/oper_procesos_entrada.php?o=25',
                    type:'POST',
                    success:function(data)
                     {
                         $("#CBTiposMovimientoDiv").hide();
                         $("#FechaRegistroDiv").hide();
                         $("#DivPedido").append(data);   
                     },
                    error:function(req,e,er) {
                            alert('error!' + er);
                    }
	       }); 
}
function load_buscar_inv_consulta()
{
	$("#DInvSustitucionConsultar").dialog('open');
}
function buscar_solo_inv_consulta()
{
    $("#GridBusquedatxtPatronDInvSustitucionConsultar").empty();
	$("#DivLoadtxtPatronDInvSustitucionConsultar").show();
	var Folio = $("#chkCveDInvSustitucionConsultar:checked").val();
    var Descripcion = $("#chkNombreDInvSustitucionConsultar:checked").val();
    if(Folio=="Folio")
    {
        Folio='Si';
    }
   
  if(Descripcion=="Descripcion")
    {
        Descripcion='Si';
    }
        
	var losdatos = {Patron:$("#txtPatronDInvSustitucionConsultar").val(),txtFolio:Folio,txtDescripcion:Descripcion};
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada_consultar.php?o=2',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
	             $("#GridBusquedatxtPatronDInvSustitucionConsultar").append(data); 
	             $("#DivLoadtxtPatronDInvSustitucionConsultar").hide();
		  },
		error:function(req,e,er) {
			alert('error!');
		}
   });
}
function sel_Inv2000_Modificar(Id_ConsecutivoInv)
{
    $("#TBPrecioUnitario").val('');
    $("#TBIDPedidoArticulo").val('');
    $("#TBNoDocumento").val('');
    $("#TBFactura").val('');
    $("#TBFechaFactura").val('');
    $("#TBRFCResguardante1").val('');
    $("#TBRFCResguardante2").val('');
    $("#TBRFCResguardante3").val('');
    $("#txtIdAreaAdquisicion").val('');
    $("#TBIDPedidoSInv").val(Id_ConsecutivoInv);
    $("#TTFechaRegistroDiv").empty();
    $("#CBTTexto").empty();
    var losdatos = {Id_ConsecutivoInv:Id_ConsecutivoInv}
    $.ajax({
 		url:'../../../scripts/oper_procesos_entrada_consultar.php?o=3',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
                     $("#DivEstadoBien").empty();
	             var dataJson = eval(data);
                     $("#CBTTexto").append(dataJson[0].IdTipoMov);
                     $("#TTFechaRegistroDiv").append(dataJson[0].RFecha);
                     $("#TBPrecioUnitario").val(dataJson[0].mCosto);
                     $("#TBIDPedidoArticulo").val(dataJson[0].vNumPedido);
                     $("#TBNoDocumento").val(dataJson[0].vDoctoOficial);
                     $("#TBFactura").val(dataJson[0].vNoFactura);
                     $("#TBFechaFactura").val(dataJson[0].dFechaFactura);
                     $("#TBRFCResguardante1").val(dataJson[0].Resguardante1);
                     $("#TBRFCResguardante2").val(dataJson[0].Resguardante2);
                     $("#TBRFCResguardante3").val(dataJson[0].Resguardante3);
                     $("#txtIdAreaAdquisicion").val(dataJson[0].Id_Unidad);
                     $("#TTFechaRegistroDiv").val(dataJson[0].RFecha);
                     $("#DivEstadoBien").append(dataJson[0].Id_EdoBien);
                     sel_inv_resguardo(dataJson[0].Resguardante1,dataJson[0].Resguardante2,dataJson[0].Resguardante3,dataJson[0].Id_Unidad);
                     sel_inv_caracteristicas(Id_ConsecutivoInv,dataJson[0].Id_TipoBien,dataJson[0].Id_CABMS);
                     $("#DInvSustitucionConsultar").dialog('close');
		 },
		error:function(req,e,er) {
			alert('error!');
		}
           });
}
function sel_inv_resguardo(Resguardante1,Resguardante2,Resguardante3,IdAreaAdquisicion)
{
        $("#txtDesAreaAdquisicion").val('');
        $("#TBNombreResguardante1").val('');
        $("#TBNombreResguardante2").val('');
        $("#TBNombreResguardante3").val('');
    var losdatos = {Resguardante1:Resguardante1,Resguardante2:Resguardante2,Resguardante3:Resguardante3,IdAreaAdquisicion:IdAreaAdquisicion}
    $.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=19',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
	             var dataJson = eval(data);
                     $("#txtDesAreaAdquisicion").val(dataJson[0].UAvDescripcion);
                     $("#TBNombreResguardante1").val(dataJson[0].Resguardante1);
                     $("#TBNombreResguardante2").val(dataJson[0].Resguardante2);
                     $("#TBNombreResguardante3").val(dataJson[0].Resguardante3);

		 },
		error:function(req,e,er) {
			alert('error!' + er);
		}
           });
}
function sel_inv_caracteristicas(Id_ConsecutivoInv,Id_TipoBien,IdCambs)
{
    $("#DivfrmBienes").empty();
    var losdatos = {Id_ConsecutivoInv:Id_ConsecutivoInv,Id_TipoBien:Id_TipoBien,IdCambs:IdCambs};
    $.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=20',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {    
                     
                    $("#DivfrmBienes").append(data);
                    $("#txtIdCABMS").val(IdCambs);
		 },
		error:function(req,e,er) {
			alert('error!' + er);
		}
           }); 
}


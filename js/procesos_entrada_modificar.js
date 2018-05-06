  function modificar_form()
     {
                load_frm();
                $("#DivPedido").empty(); 
                $.ajax({
                    url:'../../../scripts/oper_procesos_entrada_modificar.php?o=1',
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
function load_buscar_inv_modificar()
{
	$("#DInvSustitucionModificar").dialog('open');
}
function buscar_solo_inv_modifcar()
{
    $("#GridBusquedatxtPatronDInvSustitucionModificar").empty();
	$("#DivLoadtxtPatronDInvSustitucionModificar").show();
	var Folio = $("#chkCveDInvSustitucionModificar:checked").val();
    var Descripcion = $("#chkNombreDInvSustitucionModificar:checked").val();
    if(Folio=="Folio")
    {
        Folio='Si';
    }
   
  if(Descripcion=="Descripcion")
    {
        Descripcion='Si';
    }
        
	var losdatos = {Patron:$("#txtPatronDInvSustitucionModificar").val(),txtFolio:Folio,txtDescripcion:Descripcion};
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada_modificar.php?o=2',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
                     
	             $("#GridBusquedatxtPatronDInvSustitucionModificar").append(data); 
	             $("#DivLoadtxtPatronDInvSustitucionModificar").hide();
		      },
		error:function(req,e,er) {
			alert('error!');
		}
   });
}
function sel_Inv_Modificar(Id_ConsecutivoInv)
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
 		url:'../../../scripts/oper_procesos_entrada_modificar.php?o=3',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
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
                     sel_inv_resguardo_modificar(dataJson[0].Resguardante1,dataJson[0].Resguardante2,dataJson[0].Resguardante3,dataJson[0].Id_Unidad);
                     sel_inv_caracteristicas_modificar(Id_ConsecutivoInv,dataJson[0].Id_TipoBien,dataJson[0].Id_CABMS);
		 },
		error:function(req,e,er) {
			alert('error!');
		}
           });
  }
  function sel_inv_resguardo_modificar(Resguardante1,Resguardante2,Resguardante3,IdAreaAdquisicion)
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
function sel_inv_caracteristicas_modificar(Id_ConsecutivoInv,Id_TipoBien,IdCambs)
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
function guardar_modificacion()
{
    var Id = $('#txtIdTipoBien').val();
    alert(Id);
    switch(Id) 
    {
        case '1':
                     /*Muebel*/
                        var losdatos = {
                           txtFechaRegistro:$("#txtFechaRegistro").val(),
                           TBCaracteristicas:$("#TBCaracteristicas").val(),
                           TBIDPedidoArticulo:$("#TBIDPedidoArticulo").val(),
                           TBPrecioUnitario:$("#TBPrecioUnitario").val(),
                           TBNoDocumento:$("#TBNoDocumento").val(),
                           TBFactura:$("#TBFactura").val(),
                           TBFechaFactura:$("#TBFechaFactura").val(),
                           txtIdTipoBien:$("#txtIdTipoBien").val(),
                           CboEstado:$("#CboEstado").val(),
                           txtCAMBSS:$("#txtIdCABMS").val(),
                           txtResguardante1:$("#TBRFCResguardante1").val(),
                           txtResguardante2:$("#TBRFCResguardante2").val(),
                           txtResguardante3:$("#TBRFCResguardante3").val(),
                           txtUIAdministrativa:$("#txtIdAreaAdquisicion").val(),
                           txtCBTiposMovimiento:$("#CBTiposMovimiento").val(),
                           txtMarcaMueble:$("#txtMarcaMueble").val(),
                           txtMuebleTipo:$("#txtMuebleTipo").val(),
                           txtMuebleModelo:$("#txtMuebleModelo").val(),
                           txtMuebleModeloSerie:$("#txtMuebleModeloSerie").val(),
                           chkMueblePedestal:$("#chkMueblePedestal").val(),
                           chkMuebleFija:$("#chkMuebleFija").val(),
                           chkMuebleGiratoria:$("#chkMuebleGiratoria").val(),
                           chkMuebleRodajas:$("#chkMuebleRodajas").val(),
                           chkMueblePlegable:$("#chkMueblePlegable").val(),
                           chkMuebleCajones:$("#chkMuebleCajones").val(),
                           chkMuebleGavetas:$("#chkMuebleGavetas").val(),
                           chkMuebleEntrepano:$("#chkMuebleEntrepano").val()
                       };
                        $.ajax({
                                    url:'../../../scripts/oper_procesos_entrada_modificar.php?o=4',
                                    type:'POST',
                                    data:losdatos,
                                    success:function(data)
                                     {    
                                        alert(data);
                                     },
                                    error:function(req,e,er) {
                                            alert('error!' + er);
                                    }
                               });
            break;
        case '2':
                        /*informatico*/
                        var losdatos = {
                           txtFechaRegistro:$("#txtFechaRegistro").val(),
                           TBCaracteristicas:$("#TBCaracteristicas").val(),
                           TBIDPedidoArticulo:$("#TBIDPedidoArticulo").val(),
                           TBPrecioUnitario:$("#TBPrecioUnitario").val(),
                           TBNoDocumento:$("#TBNoDocumento").val(),
                           TBFactura:$("#TBFactura").val(),
                           TBFechaFactura:$("#TBFechaFactura").val(),
                           txtIdTipoBien:$("#txtIdTipoBien").val(),
                           CboEstado:$("#CboEstado").val(),
                           txtCAMBSS:$("#txtIdCABMS").val(),
                           txtResguardante1:$("#TBRFCResguardante1").val(),
                           txtResguardante2:$("#TBRFCResguardante2").val(),
                           txtResguardante3:$("#TBRFCResguardante3").val(),
                           txtUIAdministrativa:$("#txtIdAreaAdquisicion").val(),
                           txtCBTiposMovimiento:$("#CBTiposMovimiento").val(),
                           txtSerieInfomatico:$("#txtSerieInfomatico").val(),
                           txtMarcaInfomatico:$("#txtMarcaInfomatico").val(),
                           txtModeloInfomatico:$("#txtModeloInfomatico").val(),
                           txtDicosDuroInfomatico:$("#txtDicosDuroInfomatico").val(),
                           txtRamInfomatico:$("#txtRamInfomatico").val(),
                           txtProcesadorInfomatico:$("#txtProcesadorInfomatico").val(),
                           txtPaginasMinutoInfomatico:$("#txtPaginasMinutoInfomatico").val(),
                           txtFuentePoderInfomatico:$("#txtFuentePoderInfomatico").val(),
                           txtMonitorSerieInfomatico:$("#txtMonitorSerieInfomatico").val(),
                           txtMonitorMarcaInfomatico:$("#txtMonitorMarcaInfomatico").val(),
                           txtTecladoSerialInfomatico:$("#txtTecladoSerialInfomatico").val(),
                           txtTecladoMarcaInfomatico:$("#txtTecladoMarcaInfomatico").val(),
                           txtMouseSerieInfomatico:$("#txtMouseSerieInfomatico").val(),
                           txtMouseMarcaInfomatico:$("#txtMouseMarcaInfomatico").val()
                       };
                        $.ajax({
                                    url:'../../../scripts/oper_procesos_entrada_modificar.php?o=',
                                    type:'POST',
                                    data:losdatos,
                                    success:function(data)
                                     {    

                                     },
                                    error:function(req,e,er) {
                                            alert('error!' + er);
                                    }
                               });
            break;
        case '3':
                        var cboTranmisionM = $("#chkVehiculoManual:checked").val();
                    var cboTranmisionH = $("#chkVehiculoHidraulica:checked").val();
                    var cboTranmisionA = $("#chkVehiculoAmbas:checked").val();
                    var txtTransmision = "";
                    
                    if(cboTranmisionM == "M")
                        {
                            txtTransmision = "M";
                        }
                    if(cboTranmisionH == "H")
                        {
                            txtTransmision = "H";
                        }
                    if(cboTranmisionA == "A")
                        {
                            txtTransmision = "A";
                        }
                    
                    
                    var cboDireccionS = $("#chkVehiculoDireccionStandar:checked").val();
                    var cboDireccionA = $("#chkVehiculoDireccionAutomatica:checked").val(); 
                    var cboDireccionAA = $("#chkVehiculoDireccionAmbas:checked").val();
                    var txtDireccion ="";
                   
                    if(cboDireccionS == "S")
                        {
                            txtDireccion = "S";
                        }
                    if(cboDireccionA == "A")
                        {
                            txtDireccion = "A";
                        }
                    if(cboDireccionAA == "AA")
                        {
                            txtDireccion = "AA";
                        }
                    
                    var losdatos = {
                    txtFechaRegistro:$("#txtFechaRegistro").val(),
                    TBCaracteristicas:$("#TBCaracteristicas").val(),
                    TBIDPedidoArticulo:$("#TBIDPedidoArticulo").val(),
                    TBPrecioUnitario:$("#TBPrecioUnitario").val(),
                    TBNoDocumento:$("#TBNoDocumento").val(),
                    TBFactura:$("#TBFactura").val(),
                    TBFechaFactura:$("#TBFechaFactura").val(),
                    txtIdTipoBien:$("#txtIdTipoBien").val(),
                    CboEstado:$("#CboEstado").val(),
                    txtCAMBSS:$("#txtIdCABMS").val(),
                    txtResguardante1:$("#TBRFCResguardante1").val(),
                    txtResguardante2:$("#TBRFCResguardante2").val(),
                    txtResguardante3:$("#TBRFCResguardante3").val(),
                    txtUIAdministrativa:$("#txtIdAreaAdquisicion").val(),
                    txtCBTiposMovimiento:$("#CBTiposMovimiento").val(),
                    txtMarcaVehiculo:$("#txtMarcaVehiculo").val(),
                    txtTipoVehiculo:$("#txtTipoVehiculo").val(),
                    txtModeloVehiculo:$("#txtModeloVehiculo").val(),
                    txtSNVehiculo:$("#txtSNVehiculo").val(),
                    txtSNMotorVehiculo:$("#txtSNMotorVehiculo").val(),
                    txtPlacasVehiculo:$("#txtPlacasVehiculo").val(),
                    txtDireccion:txtDireccion,
                    txtTransmision:txtTransmision
                };
                        $.ajax({
                                    url:'../../../scripts/oper_procesos_entrada_modificar.php?o=',
                                    type:'POST',
                                    data:losdatos,
                                    success:function(data)
                                     {    

                                     },
                                    error:function(req,e,er) {
                                            alert('error!' + er);
                                    }
                               });
            break;
        case '4':
                        var losdatos = {
                                    txtFechaRegistro:$("#txtFechaRegistro").val(),
                                    TBCaracteristicas:$("#TBCaracteristicas").val(),
                                    TBIDPedidoArticulo:$("#TBIDPedidoArticulo").val(),
                                    TBPrecioUnitario:$("#TBPrecioUnitario").val(),
                                    TBNoDocumento:$("#TBNoDocumento").val(),
                                    TBFactura:$("#TBFactura").val(),
                                    TBFechaFactura:$("#TBFechaFactura").val(),
                                    txtIdTipoBien:$("#txtIdTipoBien").val(),
                                    CboEstado:$("#CboEstado").val(),
                                    txtAutor:$("#txtAutor").val(),
                                    txtTitulo:$("#txtTitulo").val(),
                                    txtUbicacion:$("#txtUbicacion").val(),
                                    txtCAMBSS:$("#txtIdCABMS").val(),
                                    txtResguardante1:$("#TBRFCResguardante1").val(),
                                    txtResguardante2:$("#TBRFCResguardante2").val(),
                                    txtResguardante3:$("#TBRFCResguardante3").val(),
                                    txtUIAdministrativa:$("#txtIdAreaAdquisicion").val(),
                                    txtCBTiposMovimiento:$("#CBTiposMovimiento").val()
                                };
                        $.ajax({
                                    url:'../../../scripts/oper_procesos_entrada_modificar.php?o=',
                                    type:'POST',
                                    data:losdatos,
                                    success:function(data)
                                     {    

                                     },
                                    error:function(req,e,er) {
                                            alert('error!' + er);
                                    }
                               });
            break;
    
    }
    
}

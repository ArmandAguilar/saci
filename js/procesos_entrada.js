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
    $("#dialog3").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      });
	$("#DAreaAdquisicion").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      }); 
      $("#DResguardante1").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      }); 
      $("#DResguardante2").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      }); 
      $("#DResguardante3").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      });
      $("#DCambsSustitucion").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      });
      $("#DInvSustitucion").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      });
      $("#DInvSustitucionConsultar").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      });
   
            });
function saver_Order()
{
       
}
function load_frm()
{
        $("#DivContenido").empty();
	 $.ajax({
                    url:'../../../scripts/oper_procesos_entrada.php?o=1',
                    type:'POST',
                    success:function(data)
                     {
                         $("#DivContenido").append(data);   
                          },
                    error:function(req,e,er) {
                            alert('error!' + er);
                    }
	       }); 	
}
function load_tipo_inventario()
{
        $("#DivPedido").empty();
        $("#DivGridPedido").empty(); 
        $("#DivDetalles").empty(); 
        var cboTipoInventario = $("#CBTiposMovimiento").val(); 
        
        var losdatos = {cboTipoInventario:cboTipoInventario};
     $.ajax({
                url:'../../../scripts/oper_procesos_entrada.php?o=12',
                type:'POST',
                data:losdatos,
                success:function(data)
                 {
                     $("#DivPedido").append(data);   
                 },
                error:function(req,e,er) {
                        alert('error!' + er);
                }
	       }); 
}
function load_buscar_pedidor()
{
	$("#dialog1").dialog('open');
}
function buscar_pedido()
{

	$("#GridBusqueda").empty();
	$("#DivLoad1").show();
	var Folio = $("#chkFolio:checked").val();
    var Descripcion = $("#chkDescripcion:checked").val();
    if(Folio=="Folio")
    {
        Folio='Si';
    }
   
  if(Descripcion=="Descrupcion")
    {
        Descripcion='Si';
    }

	var losdatos = {Patron:$("#txtPatron").val(),txtFolio:Folio,txtDescripcion:Descripcion};
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=2',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
	             $("#GridBusqueda").append(data); 
	             $("#DivLoad1").hide();
		      },
		error:function(req,e,er) {
			alert('error!');
		}
   }); 
}
function sel_pedido(idpedido,fecha,proveedor)
{
	$("#DivGridPedido").empty(); 
	$("#TBIDPedido").val(idpedido);
	$("#TBFechaPedido").val(fecha);
	$("#TBProveedor").val(proveedor);
	/*cargamos grid */
	var losdatos = {id:idpedido};
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=3',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
	             $("#DivGridPedido").append(data); 
	             
	             
		      },
		error:function(req,e,er) {
			alert('error!');
		}
   }); 
	
	
	
}
function selecion_grid(idCambs)
{ 
        $("#DivDetalles").empty(); 
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=4',
		type:'POST',
		success:function(data)
	         {
	             $("#DivDetalles").append(data); 
                     $("#txtIdCABMS").val(idCambs);
		 },
		error:function(req,e,er) {
			alert('error!');
		}
   }); 
}
function add_tipodebien_ainventario()
{
	var cboTipoBien = $("#cboTipoBien").val();
   
   	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=5',
		type:'POST',
		success:function(data)
	         {
			    verFrmCaracteristicas(cboTipoBien);
                            $("#txtIdTipoBien").val(cboTipoBien);
		      },
		error:function(req,e,er) {
			alert('error!');
		}
   });
	
}
function verFrmCaracteristicas(IdTipoBien)
{
        alert(IdTipoBien);
	$("#DivfrmBienes").empty();
   	var losdatos = {IdTipoBien:IdTipoBien};
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=6',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
	            $("#DivfrmBienes").append(data);   
		      },
		error:function(req,e,er) {
			alert('error!');
		}
         });

}
function load_buscar_ADA()
{
	$("#DAreaAdquisicion").dialog('open');
}
function load_buscar_1erR()
{
	$("#DResguardante1").dialog('open');
}
function load_buscar_2doR()
{
	$("#DResguardante2").dialog('open');
}
function load_buscar_3er()
{
	$("#DResguardante3").dialog('open');
}
function buscar_resguardante_1()
{
    $("#GridBusquedatxtPatronDResguardante1").empty();
    $("#DivLoadtxtPatronDResguardante1").show();
    var txtPatronDResguardante1 = $("#txtPatronDResguardante1").val();
    var chkCveSN = $("#chkCve:checked").val();
    var chkNombreSN = $("#chkNombre:checked").val();
    var cve = "No";
    var nombre = "No";
    if(chkCveSN == "Si")
    {
        cve = 'Si';
    }
    if(chkNombreSN == "Si")
    {
        nombre = "Si";
    }
    var losdatos = {txtPatronDResguardante1:txtPatronDResguardante1,nombre:nombre,cve:cve};
   $.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=7',
		type:'POST',
                data:losdatos,
		success:function(data)
	         {
                     $("#GridBusquedatxtPatronDResguardante1").append(data);
                     $("#DivLoadtxtPatronDResguardante1").hide();
		 },
		error:function(req,e,er) {
			alert('error!');
		}
   });
}
function buscar_resguardante_2()
{
    $("#GridBusquedatxtPatronDResguardante2").empty();
    $("#DivLoadtxtPatronDResguardante2").show();
    var txtPatronDResguardante2 = $("#txtPatronDResguardante2").val();
    var chkCveSN2 = $("#chkCve2:checked").val();
    var chkNombreSN2 = $("#chkNombre2:checked").val();
    var cve2 = "No";
    var nombre2 = "No";
    if(chkCveSN2 == "Si")
    {
        cve2 = "Si";
    }
    if(chkNombreSN2 == "Si")
    {
        nombre2 = "Si";
    }
    var losdatos = {txtPatronDResguardante1:txtPatronDResguardante2,nombre:nombre2,cve:cve2};
   $.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=8',
		type:'POST',
                data:losdatos,
		success:function(data)
	         {
                     $("#GridBusquedatxtPatronDResguardante2").append(data);
                     $("#DivLoadtxtPatronDResguardante2").hide();
		 },
		error:function(req,e,er) {
			alert('error!');
		}
   });
}
function buscar_resguardante_3()
{
    $("#GridBusquedatxtPatronDResguardante3").empty();
    $("#DivLoadtxtPatronDResguardante3").show();
    var txtPatronDResguardante3 = $("#txtPatronDResguardante3").val();
    var chkCveSN3 = $("#chkCve3:checked").val();
    var chkNombreSN3 = $("#chkNombre3:checked").val();
    var cve3 = "No";
    var nombre3 = "No";
    if(chkCveSN3 == "Si")
    {
        cve3 = "Si";
    }
    if(chkNombreSN3 == "Si")
    {
        nombre3 = "Si";
    }
    var losdatos = {txtPatronDResguardante1:txtPatronDResguardante3,nombre:nombre3,cve:cve3};
   $.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=9',
		type:'POST',
                data:losdatos,
		success:function(data)
	         {
                     $("#GridBusquedatxtPatronDResguardante3").append(data);
                     $("#DivLoadtxtPatronDResguardante3").hide();
		 },
		error:function(req,e,er) {
			alert('error!');
		}
   });
}
function sel_resguardante(sel,cve,nombre)
{
    switch(sel)
    {
        case 1:
                $("#TBRFCResguardante1").val(cve);
                $("#TBNombreResguardante1").val(nombre);
            break;
        case 2:
                 $("#TBRFCResguardante2").val(cve);
                 $("#TBNombreResguardante2").val(nombre);
            break;
        case 3:
                $("#TBRFCResguardante3").val(cve);
                $("#TBNombreResguardante3").val(nombre);
            break;       
    }
}
function UAAdministrativa_buscar()
{
   $("#GridBusquedatxtPatronDAreaAdquisicion").empty();
    $("#DivLoadtxtPatronDAreaAdquisicion").show();
    var txtPatron = $("#txtPatronAdquisicion").val();
    var chkCveSN3 = $("#chkCveUA:checked").val();
    var chkNombreSN3 = $("#chkDescripcionUA:checked").val();
    var cve3 = "No";
    var nombre3 = "No";
    if(chkCveSN3 == "Si")
    {
        cve3 = "Si";
    }
    if(chkNombreSN3 == "Si")
    {
        nombre3 = "Si";
    }
    var losdatos = {txtPatron:txtPatron,nombre:nombre3,cve:cve3};
   $.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=10',
		type:'POST',
                data:losdatos,
		success:function(data)
	         {
                     alert(data);
                     $("#GridBusquedatxtPatronDAreaAdquisicion").append(data);
                     $("#DivLoadtxtPatronDAreaAdquisicion").hide();
		 },
		error:function(req,e,er) {
			alert('error!');
		}
   }); 
}
function sel_uadmin(cve,ua)
{
    $("#txtIdAreaAdquisicion").empty();
    $("#txtDesAreaAdquisicion").empty();
    $("#txtIdAreaAdquisicion").val(cve);
    $("#txtDesAreaAdquisicion").val(ua);
}
function guarda_datos()
{
    var idtipo = $("#txtIdTipoBien").val();
    
    switch(idtipo)
    {
        case '1':
            
                var c = $("#:checked").val();
                var c = $("#:checked").val();
                var c = $("#:checked").val();
                var c = $("#:checked").val();
                var c = $("#:checked").val();
                var c = $("#:checked").val();
                var c = $("#:checked").val();
                var c = $("#:checked").val();
                var c = $("#:checked").val();
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
                        url:'../../../scripts/oper_procesos_entrada.php?o=15',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             alert(data);
                         },
                        error:function(req,e,er) {
                                alert('error!');
		      }});
            break;
        case '2':
            
                
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
                        url:'../../../scripts/oper_procesos_entrada.php?o=14',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             alert(data);
                         },
                        error:function(req,e,er) {
                                alert('error!');
		      }});
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
                        url:'../../../scripts/oper_procesos_entrada.php?o=13',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             alert(data);
                         },
                        error:function(req,e,er) {
                                alert('error!');
		      }});
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
                        url:'../../../scripts/oper_procesos_entrada.php?o=11',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             alert(data);
                         },
                        error:function(req,e,er) {
                                alert('error!');
		      }});
            break;
    }
}
function load_buscar_inv()
{
	$("#DInvSustitucion").dialog('open');
}
function load_buscar_solo_cambs()
{
	$("#DCambsSustitucion").dialog('open');
}
function buscar_solo_cambs()
{

	$("#GridBusquedatxtPatroDCambsSustitucion").empty();
	$("#DivLoadtxtPatroDCambsSustitucion").show();
	var Folio = $("#chkCveDCambsSustitucion:checked").val();
    var Descripcion = $("#chkNombreDCambsSustitucion:checked").val();
    if(Folio=="Folio")
    {
        Folio='Si';
    }
   
  if(Descripcion=="Descripcion")
    {
        Descripcion='Si';
    }

	var losdatos = {Patron:$("#txtPatron").val(),txtFolio:Folio,txtDescripcion:Descripcion};
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=16',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
	             $("#GridBusquedatxtPatroDCambsSustitucion").append(data); 
	             $("#DivLoadtxtPatroDCambsSustitucion").hide();
		      },
		error:function(req,e,er) {
			alert('error!');
		}
   }); 
}
function sel_Cambs2000(Id_CABMS,vDescripcionCABMS)
{
    $("#txtCambName").empty(); 
    $("#txtCambName").val(Id_CABMS); 
    
    $("#txtCambNameDescripcion").empty(); 
    $("#txtCambNameDescripcion").val(vDescripcionCABMS); 
}
function buscar_solo_inv()
{
    $("#GridBusquedatxtPatronDInvSustitucion").empty();
	$("#DivLoadtxtPatronDInvSustitucion").show();
	var Folio = $("#chkCveDInvSustitucion:checked").val();
    var Descripcion = $("#chkNombreDInvSustitucion:checked").val();
    if(Folio=="Folio")
    {
        Folio='Si';
    }
   
  if(Descripcion=="Descripcion")
    {
        Descripcion='Si';
    }
        
	var losdatos = {Patron:$("#txtPatronDInvSustitucion").val(),txtFolio:Folio,txtDescripcion:Descripcion};
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=17',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
	             $("#GridBusquedatxtPatronDInvSustitucion").append(data); 
	             $("#DivLoadtxtPatronDInvSustitucion").hide();
		      },
		error:function(req,e,er) {
			alert('error!');
		}
   });
    
}
function sel_Inv2000(Id_ConsecutivoInv)
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
    var losdatos = {Id_ConsecutivoInv:Id_ConsecutivoInv}
    $.ajax({
 		url:'../../../scripts/oper_procesos_entrada.php?o=18',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
	             var dataJson = eval(data);
                     $("#TBPrecioUnitario").val(dataJson[0].mCosto);
                     $("#TBIDPedidoArticulo").val(dataJson[0].vNumPedido);
                     $("#TBNoDocumento").val(dataJson[0].vDoctoOficial);
                     $("#TBFactura").val(dataJson[0].vNoFactura);
                     $("#TBFechaFactura").val(dataJson[0].dFechaFactura);
                     $("#TBRFCResguardante1").val(dataJson[0].Resguardante1);
                     $("#TBRFCResguardante2").val(dataJson[0].Resguardante2);
                     $("#TBRFCResguardante3").val(dataJson[0].Resguardante3);
                     $("#txtIdAreaAdquisicion").val(dataJson[0].Id_Unidad);
                     sel_inv_resguardo(dataJson[0].Resguardante1,dataJson[0].Resguardante2,dataJson[0].Resguardante3,dataJson[0].Id_Unidad);
                     sel_inv_caracteristicas(Id_ConsecutivoInv,dataJson[0].Id_TipoBien,dataJson[0].Id_CABMS);
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
function guarda_datos2000()
{
    
    var idtipos = $("#txtIdTipoBien").val();
    switch(idtipos)
    {
        case '1':
            
                    var chkMueblePedestal = $("#chkMueblePedestal:checked").val();
                    var chkMuebleFija = $("#chkMuebleFija:checked").val();
                    var chkMuebleGiratoria = $("#chkMuebleGiratoria:checked").val();
                    var chkMuebleRodajas = $("#chkMuebleRodajas:checked").val();
                    var chkMueblePlegable = $("#chkMueblePlegable:checked").val();
                    
                    if(chkMueblePedestal != undefined)
                    {
                        
                    }
                    else{
                        chkMueblePedestal="No";
                    }
                    
                    if(chkMuebleFija != undefined)
                    {
                        
                    }
                    else{
                       chkMuebleFija="No"; 
                    }
                    
                    if(chkMuebleGiratoria != undefined)
                    {
                        
                    }
                    else{
                        chkMuebleGiratoria="No";
                    }
                    if(chkMuebleRodajas != undefined)
                    {
                        
                    }
                    else{
                        chkMuebleRodajas="No";
                    }
                    if(chkMueblePlegable != undefined)
                    {
                        
                    }
                    else{
                        chkMueblePlegable="No";
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
                    TBIDPedidoSInv:$("#TBIDPedidoSInv").val(),
                    txtResguardante1:$("#TBRFCResguardante1").val(),
                    txtResguardante2:$("#TBRFCResguardante2").val(),
                    txtResguardante3:$("#TBRFCResguardante3").val(),
                    txtUIAdministrativa:$("#txtIdAreaAdquisicion").val(),
                    txtCBTiposMovimiento:$("#CBTiposMovimiento").val(),
                    txtMarcaMueble:$("#txtMarcaMueble").val(),
                    txtMuebleTipo:$("#txtMuebleTipo").val(),
                    txtMuebleModelo:$("#txtMuebleModelo").val(),
                    txtMuebleModeloSerie:$("#txtMuebleModeloSerie").val(),
                    chkMueblePedestal:chkMueblePedestal,
                    chkMuebleFija:chkMuebleFija,
                    chkMuebleGiratoria:chkMuebleGiratoria,
                    chkMuebleRodajas:chkMuebleRodajas,
                    chkMueblePlegable:chkMueblePlegable,
                    chkMuebleCajones:$("#chkMuebleCajones").val(),
                    chkMuebleGavetas:$("#chkMuebleGavetas").val(),
                    chkMuebleEntrepano:$("#chkMuebleEntrepano").val()
                };
                $.ajax({
                        url:'../../../scripts/oper_procesos_entrada.php?o=24',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             alert(data);
                         },
                        error:function(req,e,er) {
                                alert('error!');
		      }});
            break;
        case '2':
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
                    TBIDPedidoSInv:$("#TBIDPedidoSInv").val(),
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
                        url:'../../../scripts/oper_procesos_entrada.php?o=23',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             alert(data);
                         },
                        error:function(req,e,er) {
                                alert('error!');
		      }});
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
                    TBIDPedidoSInv:$("#TBIDPedidoSInv").val(),
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
                alert($("#TBIDPedidoSInv").val());
                $.ajax({
                        url:'../../../scripts/oper_procesos_entrada.php?o=22',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             alert(data);
                         },
                        error:function(req,e,er) {
                                alert('error!');
		      }});
        break;
        
        case '4':
                     
                   var losdatos = {
                    dFechaRegistro:$("#txtFechaRegistro").val(),   
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
                    TBIDPedidoSInv:$("#TBIDPedidoSInv").val(),
                    txtResguardante1:$("#TBRFCResguardante1").val(),
                    txtResguardante2:$("#TBRFCResguardante2").val(),
                    txtResguardante3:$("#TBRFCResguardante3").val(),
                    txtUIAdministrativa:$("#txtIdAreaAdquisicion").val(),
                    txtCBTiposMovimiento:$("#CBTiposMovimiento").val()
                };
                $.ajax({
                        url:'../../../scripts/oper_procesos_entrada.php?o=21',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             alert(data);
                         },
                        error:function(req,e,er) {
                                alert('error!');
		      }});
            break;
    }
}
/* Consultas */
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
 		url:'../../../scripts/oper_procesos_entrada.php?o=26',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
                     //alert(data);
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
 		url:'../../../scripts/oper_procesos_entrada.php?o=27',
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
                     sel_inv_resguardo(dataJson[0].Resguardante1,dataJson[0].Resguardante2,dataJson[0].Resguardante3,dataJson[0].Id_Unidad);
                     sel_inv_caracteristicas(Id_ConsecutivoInv,dataJson[0].Id_TipoBien,dataJson[0].Id_CABMS);
		 },
		error:function(req,e,er) {
			alert('error!');
		}
           });
          }
     /* Modifcar Boton*/
     function modificar_form()
     {
                load_frm();
                $("#DivPedido").empty(); 
                $.ajax({
                    url:'../../../scripts/oper_procesos_entrada.php?o=28',
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
    function guardar_modificacion()
    {
 
                var idtipos = $("#txtIdTipoBien").val();
                switch(idtipos)
                {
                    case '1':

                                var chkMueblePedestal = $("#chkMueblePedestal:checked").val();
                                var chkMuebleFija = $("#chkMuebleFija:checked").val();
                                var chkMuebleGiratoria = $("#chkMuebleGiratoria:checked").val();
                                var chkMuebleRodajas = $("#chkMuebleRodajas:checked").val();
                                var chkMueblePlegable = $("#chkMueblePlegable:checked").val();

                                if(chkMueblePedestal != undefined)
                                {

                                }
                                else{
                                    chkMueblePedestal="No";
                                }

                                if(chkMuebleFija != undefined)
                                {

                                }
                                else{
                                   chkMuebleFija="No"; 
                                }

                                if(chkMuebleGiratoria != undefined)
                                {

                                }
                                else{
                                    chkMuebleGiratoria="No";
                                }
                                if(chkMuebleRodajas != undefined)
                                {

                                }
                                else{
                                    chkMuebleRodajas="No";
                                }
                                if(chkMueblePlegable != undefined)
                                {

                                }
                                else{
                                    chkMueblePlegable="No";
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
                                TBIDPedidoSInv:$("#TBIDPedidoSInv").val(),
                                txtResguardante1:$("#TBRFCResguardante1").val(),
                                txtResguardante2:$("#TBRFCResguardante2").val(),
                                txtResguardante3:$("#TBRFCResguardante3").val(),
                                txtUIAdministrativa:$("#txtIdAreaAdquisicion").val(),
                                txtCBTiposMovimiento:$("#CBTiposMovimiento").val(),
                                txtMarcaMueble:$("#txtMarcaMueble").val(),
                                txtMuebleTipo:$("#txtMuebleTipo").val(),
                                txtMuebleModelo:$("#txtMuebleModelo").val(),
                                txtMuebleModeloSerie:$("#txtMuebleModeloSerie").val(),
                                chkMueblePedestal:chkMueblePedestal,
                                chkMuebleFija:chkMuebleFija,
                                chkMuebleGiratoria:chkMuebleGiratoria,
                                chkMuebleRodajas:chkMuebleRodajas,
                                chkMueblePlegable:chkMueblePlegable,
                                chkMuebleCajones:$("#chkMuebleCajones").val(),
                                chkMuebleGavetas:$("#chkMuebleGavetas").val(),
                                chkMuebleEntrepano:$("#chkMuebleEntrepano").val()
                            };
                            $.ajax({
                                    url:'../../../scripts/oper_procesos_entrada.php?o=24',
                                    type:'POST',
                                    data:losdatos,
                                    success:function(data)
                                     {
                                         
                                         alert(data);
                                     },
                                    error:function(req,e,er) {
                                            alert('error!');
                                  }});
                        break;
                    case '2':
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
                                TBIDPedidoSInv:$("#TBIDPedidoSInv").val(),
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
                                    url:'../../../scripts/oper_procesos_entrada.php?o=23',
                                    type:'POST',
                                    data:losdatos,
                                    success:function(data)
                                     {
                                         alert('Modifique opcion 2');
                                         alert(data);
                                     },
                                    error:function(req,e,er) {
                                            alert('error!');
                                  }});
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
                                TBIDPedidoSInv:$("#TBIDPedidoSInv").val(),
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
                            alert($("#TBIDPedidoSInv").val());
                            $.ajax({
                                    url:'../../../scripts/oper_procesos_entrada.php?o=22',
                                    type:'POST',
                                    data:losdatos,
                                    success:function(data)
                                     {
                                         alert(data);
                                     },
                                    error:function(req,e,er) {
                                            alert('error!');
                                  }});
                    break;

                    case '4':

                               var losdatos = {
                                dFechaRegistro:$("#txtFechaRegistro").val(),   
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
                                TBIDPedidoSInv:$("#TBIDPedidoSInv").val(),
                                txtResguardante1:$("#TBRFCResguardante1").val(),
                                txtResguardante2:$("#TBRFCResguardante2").val(),
                                txtResguardante3:$("#TBRFCResguardante3").val(),
                                txtUIAdministrativa:$("#txtIdAreaAdquisicion").val(),
                                txtCBTiposMovimiento:$("#CBTiposMovimiento").val()
                            };
                            $.ajax({
                                    url:'../../../scripts/oper_procesos_entrada.php?o=21',
                                    type:'POST',
                                    data:losdatos,
                                    success:function(data)
                                     {
                                         alert(data);
                                     },
                                    error:function(req,e,er) {
                                            alert('error!');
                                  }});
                        break;
                }
    }
    

    
    

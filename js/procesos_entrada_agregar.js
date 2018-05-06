$(function() 
{  
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
      $("#DInvSustitucionModificar").dialog({
        autoOpen: false,
        width: 750,
        height: 400
      });
   
});
function saver_Order()
{
       
}
/* Boton Agregar */
function load_frm()
{
        $("#DivContenido").empty();
	 $.ajax({
                    url:'../../../scripts/oper_procesos_entrada_agregar.php?o=1',
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
                url:'../../../scripts/oper_procesos_entrada_agregar.php?o=2',
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
/*modelbox buscar pedido*/
function load_buscar_pedidor()
{
    $("#dialog1").dialog('open');
}
/*buscar pedido de modalbox*/
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
 		url:'../../../scripts/oper_procesos_entrada_agregar.php?o=3',
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
 		url:'../../../scripts/oper_procesos_entrada_agregar.php?o=4',
		type:'POST',
		data:losdatos,
		success:function(data)
	         {
	             $("#DivGridPedido").append(data); 
                     $("#dialog1").dialog('close');
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
            url:'../../../scripts/oper_procesos_entrada_agregar.php?o=5',
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
 		url:'../../../scripts/oper_procesos_entrada_agregar.php?o=6',
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
	$("#DivfrmBienes").empty();
   	var losdatos = {IdTipoBien:IdTipoBien};
	$.ajax({
 		url:'../../../scripts/oper_procesos_entrada_agregar.php?o=7',
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
/* Tap de Datos de resguardo */
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
 		url:'../../../scripts/oper_procesos_entrada_agregar.php?o=9',
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
 		url:'../../../scripts/oper_procesos_entrada_agregar.php?o=10',
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
 		url:'../../../scripts/oper_procesos_entrada_agregar.php?o=11',
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
                 $("#DResguardante1").dialog('close');
                
            break;
        case 2:
                 $("#TBRFCResguardante2").val(cve);
                 $("#TBNombreResguardante2").val(nombre);
                  $("#DResguardante2").dialog('close');
            break;
        case 3:
                $("#TBRFCResguardante3").val(cve);
                $("#TBNombreResguardante3").val(nombre);
                 $("#DResguardante3").dialog('close');
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
 		url:'../../../scripts/oper_procesos_entrada_agregar.php?o=8',
		type:'POST',
                data:losdatos,
		success:function(data)
	         {
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
    $("#DAreaAdquisicion").dialog('close');
}
/*guradamos los datos */
function guarda_datos()
{
    var idtipo = $("#txtIdTipoBien").val();
    
    switch(idtipo)
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
                        url:'../../../scripts/oper_procesos_entrada_agregar.php?o=12',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             window.location.href =  'newentrada.php';
                         },
                        error:function(req,e,er) {
                                alert('error!');
		      }});
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
                        url:'../../../scripts/oper_procesos_entrada_agregar.php?o=13',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             window.location.href =  'newentrada.php';
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
                        url:'../../../scripts/oper_procesos_entrada_agregar.php?o=14',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             window.location.href =  'newentrada.php';
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
                        url:'../../../scripts/oper_procesos_entrada_agregar.php?o=15',
                        type:'POST',
                        data:losdatos,
                        success:function(data)
                         {
                             window.location.href =  'newentrada.php';
                         },
                        error:function(req,e,er) {
                                alert('error!');
		      }});
            break;
    }
}


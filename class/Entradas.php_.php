<?php

class  Entradas extends poolConnection
{
	
	public function load_form()
	{
		
		$CboMovimiento =  new poolConnection();
		$con=$CboMovimiento->Conexion();
		$CboMovimiento->BaseDatos($con);
		$sql="SELECT Id_TipoMovimiento,vDescripcion FROM sa_tipomovimiento order by Id";
		$RSet=$CboMovimiento->Query($con,$sql);
        $CboMovimientoOption = "";
		while($fila = mysqli_fetch_array($RSet))
		{
			switch($fila[Id_TipoMovimiento])
			{
				case '101':
					       $CboMovimientoOption .= "<option value='$fila[Id_TipoMovimiento]'>$fila[Id_TipoMovimiento]--$fila[vDescripcion]</option>";
					break;
				case '104':
					       $CboMovimientoOption .= "<option value='$fila[Id_TipoMovimiento]'>$fila[Id_TipoMovimiento]--$fila[vDescripcion]</option>";
					break;
				case '2000':
					       $CboMovimientoOption .= "<option value='$fila[Id_TipoMovimiento]'>$fila[Id_TipoMovimiento]--$fila[vDescripcion]</option>";
					break;
				case '2000':
					       $CboMovimientoOption .= "<option value='$fila[Id_TipoMovimiento]'>$fila[Id_TipoMovimiento]--$fila[vDescripcion]</option>";
					break;
				case '2401':
					       $CboMovimientoOption .= "<option value='$fila[Id_TipoMovimiento]'>$fila[Id_TipoMovimiento]--$fila[vDescripcion]</option>";
					break;
				case '2700':
						   $CboMovimientoOption .= "<option value='$fila[Id_TipoMovimiento]'>$fila[Id_TipoMovimiento]--$fila[vDescripcion]</option>";
					break;
					
			}
		}
		$CboMovimiento->Cerrar($con,$RSet);
		
			/*($TipoMovimiento->ID == 101) ||
			($TipoMovimiento->ID == 104) ||
			($TipoMovimiento->ID == 2000) ||
			($TipoMovimiento->ID == 2401) ||
			($TipoMovimiento->ID == 2700)*/
	
		
		$frm = "<br><br><fieldset>
				          <table>
					             <tr>
					                  <td><div class=\"txt_titulos_bold\">Tipo Movimiento:</div></td>
					                  <td>
					                  		<select id=\"CBTiposMovimiento\" class=\"chzn-select\" data-placeholder=\"Seleccione un Tipo de Movimiento ...\" >
					                            <option value=\"0\"></option>
					                            $CboMovimientoOption
					                        </select>
					                  </td>
					                  <td>
					                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					                  </td>
					                  <td>
					                   <div class=\"txt_titulos_bold\">Fecha de Registro</div>
					                  </td>
					                  <td>
					                     <input type='text' id='txtFechaRegistro' name='txtFechaRegistro' class=\"boxes_form100px\"/>
					                  </td>
					             </tr>
				          </table>
				 </fieldset>
				 <br>
				 <fieldset>
				 <legend class=\"txt_titulos_bold\">Pedido</legend>
				 <table>
				    <tr>
				       <td><div class=\"txt_titulos_bold\">Pedido:</div></td>
				       <td><input id=\"TBIDPedido\" type=\"text\" readonly=\"readonly\" class=\"boxes_form100px\" style=\"text-align: right; width:60px;\" /></td>
				       <td>&nbsp;&nbsp;&nbsp;</td>
				       <td><img src=\"../../interfaz_modulos/botones/buscar.jpg\" name=\"BtnBuscar\" width=\"120\" height=\"45\" border=\"0\" id=\"BtnBuscar\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('BtnBuscar','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_pedidor();\"/></td>
				       <td>&nbsp;&nbsp;&nbsp;</td>
				       <td><div class=\"txt_titulos_bold\">Entrada:</div></td>
				       <td><input id=\"TBFechaPedido\" type=\"text\" readonly=\"readonly\" class=\"boxes_form100px\" style=\"text-align: right; width:80px;\" /></td>
				       <td>&nbsp;&nbsp;&nbsp;</td>
				       <td><div class=\"txt_titulos_bold\">Proveedor:</div></td>
				       <td><input id=\"TBProveedor\" type=\"text\" readonly=\"readonly\" class=\"boxes_form400px\" style=\"width: 460px;\" /></td>
				    </tr>
				 </table>
				 </fieldset>
				 <div id='DivGridPedido'></div>
				 <div id='DivDetalles'></div>
				   <script>
				   			  $(function() {
                                     $(\"#txtFechaRegistro\").datepicker();
                             });
                              $(\".chzn-select\").chosen(); 
                              $(\".chzn-select-deselect\").chosen({allow_single_deselect:true}); 
                    </script>";
		return $frm;
	}
	public function buscar_pedido($AData)
	{
		
		$Patron=$AData->Patron;
		$ACFolio=$AData->Folio;
		$ACRequisicion=$AData->Requisicion;
        $where = "";
		#Preparamos ware
		if($ACFolio=="Si")
		{
			$where.="Id_Pedido  like '%$Patron%' or ";
		}
		
		if($ACRequisicion=="Si")
		{
		$where.="vNoRequisicion like '%$Patron%' or ";
		}
		
		$where = substr($where, 0, -3);
		$sql="SELECT
		sa_pedido.Id_Pedido,
		sa_pedido.dFechaPedido,
		sa_proveedor.vNombre
		FROM sa_pedido,sa_proveedor
		Where ($where) and sa_pedido.Id_Proveedor = sa_proveedor.Id_Proveedor";
		
		$objGridFacturas = new poolConnection();
		$con=$objGridFacturas->Conexion();
		$objGridFacturas->BaseDatos($con);
		
		$RSet=$objGridFacturas->Query($con,$sql);
		$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
		<tbody>";
		$i = 0;
		while($fila=mysqli_fetch_array($RSet))
		{
		$i++;
		
		$FliexGrid.="
		<tr>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_pedido('$fila[Id_Pedido]','$fila[dFechaPedido]','$fila[vNombre]');\">&nbsp;</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Pedido]</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaPedido]</td>
		</tr>";
		}
		$objGridFacturas->Cerrar($con,$RSet);
		$FliexGrid.="       </tbody>
		</table><script>$('.flexme1').flexigrid({
		title: '',
		colModel : [
		
		{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
		{display: 'Pedido', name : 'Pedido', width :100, sortable :false, align: 'center'},
		{display: 'Proveedor', name : 'Proveedor', width :300, sortable :false, align: 'center'},
		{display: 'Fecha Pedido', name : 'Fecha Pedido', width :100, sortable :false, align: 'center'}
		],
		buttons : [
		{name: '',onpress:saver_Order},
		{separator: true}
		],
		width: 940,
		height: 520
		}
		
		);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
		return $FliexGrid;

	}
	 public function detalle_pedido($AData)
	 {
	 	$id = $AData->id;
	 	$sql="SELECT
	 	sa_detallepedido.Id,
	 	sa_detallepedido.Id_Partida,
	 	sa_detallepedido.Id_CABMS,
	 	sa_detallepedido.eCantidad,
	 	sa_detallepedido.eCantidadEntregada,
	 	sa_detallepedido.mPrecioUnitario,
	 	sa_cabms.vDescripcionCABMS,
	 	sa_umedida.vDescripcion
	 	From sa_detallepedido,sa_cabms,sa_umedida
	 	where sa_detallepedido.Id_Partida='$id'
	 	and sa_detallepedido.Id_CABMS=sa_cabms.Id_CABMS
	 	and sa_detallepedido.Id_UMedida = sa_umedida.Id_UMedida";
	 	
	 	$objGridFacturas = new poolConnection();
	 	$con=$objGridFacturas->Conexion();
	 	$objGridFacturas->BaseDatos($con);
	 	
	 	$RSet=$objGridFacturas->Query($con,$sql);
	 	$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
	 	<tbody>";
	 	$i = 0;
	 	while($fila=mysqli_fetch_array($RSet))
	 	{
	 	$i++;
	 	$Precio =  number_format($fila[mPrecioUnitario],'2','.',','); 
	 	$FliexGrid.="
	 	<tr>
	 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"selecion_grid();\">&nbsp;</td>
	 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"$fila[Id_Partida]</td>
	 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
	 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
	 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
	 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidad]</td>
	 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidadEntregada]</td>
	 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ $Precio</td>
	 	</tr>";
	 	}
	 	$objGridFacturas->Cerrar($con,$RSet);
	 			$FliexGrid.="       </tbody>
	 			</table><script>$('.flexme1').flexigrid({
	 					title: '',
	 					colModel : [
	 	
	 					{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
	 					{display: 'Partida', name : 'Partida', width :100, sortable :false, align: 'center'},
	 					{display: 'Cve. Cambs', name : 'Cve. Cambs', width :300, sortable :false, align: 'center'},
	 					{display: 'Cambs', name : 'Cambs', width :100, sortable :false, align: 'center'},
	 					{display: 'U.Medida', name : 'U.Medida', width :100, sortable :false, align: 'center'},
	 					{display: 'C. Pedida', name : 'C. Pedida', width :100, sortable :false, align: 'center'},
	 					{display: 'C. Entregada', name : 'C. Entregada', width :100, sortable :false, align: 'center'},
	 					{display: 'Precio U.', name : 'Precio U.', width :100, sortable :false, align: 'center'}
	 					],
	 					buttons : [
	 					{name: '',onpress:saver_Order},
	 					{separator: true}
	 					],
	 					width: 940,
	 					height: 320
	 	}
	 	
	 	);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
	 	return $FliexGrid;
	 }
  public function Detalles()
  {
      $frmDetalles = "";
  	$frmDetalles .="
  	<div id=\"DivTabs\">
  			<div id=\"tabs\">
  	 
				  	<ul>
				  	<li><a href=\"#tabs-1\">Datos de Entrada</a></li>
				  	<li><a href=\"#tabs-2\">Caracteristicas</a></li>
				  	<li><a href=\"#tabs-3\">Datos del Resguardo</a></li>
				  	</ul>
  					<div id=\"tabs-1\">
  					<table>
                                        <tr valign='top'>
                                            <td>
                                                <div class=\"txt_titulos_bold\">Caracteristica:</div>
                                            </td>
                                            <td>
                                                <textarea id='TBCaracteristicas' class='boxes_txtarea'  disabled=\"disabled\"></textarea>
                                            </td>
                                        </tr>
                                   </table>
                                   <table>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Status:</div></td>
                                                        <td>
                                                
                                                
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Pedido:</div></td>
                                                        <td><input type='text' id='TBIDPedidoArticulo' name='txtPedido' class=\"boxes_form100px\"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Costo:</div></td>
                                                        <td><input type='text' id='TBPrecioUnitario' name='txtCosto' class=\"boxes_form100px\"/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">No. Documento:</div></td>
                                                        <td>
                                                            <input type='text' id='TBNoDocumento' name='TBNoDocumento' class=\"boxes_form100px\" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Factura:</div></td>
                                                        <td><input type='text' id='TBFactura' name='TBFactura' class=\"boxes_form100px\"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Fecha Factura:</div></td>
                                                        <td><input type='text' id='TBFechaFactura' name='TBFechaFactura' class=\"boxes_form100px\"/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
  					</div>
  					<div id=\"tabs-2\">
  					          	<div id=\"tabs2\">
								  	<ul>
								  	<li><a href=\"#tabs-1C\"></a></li>
								  	<li><a href=\"#tabs-2C\"></a></li>
								  	<li><a href=\"#tabs-3C\"></a></li>
								  	</ul> 
								 </div> 	   
  					</div>
  					<div id=\"tabs-3\">
  							<table>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">&Aacute;rea De Adquisicion:</div></td>
                                                <td><input type='text' id='txtArea' name='txtArea' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageB\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" /></td>
                                                <td><input type='text' id='txtDes' name='txtDes' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">1er Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante1' name='TBRFCResguardante1' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageB\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\"/></td>
                                                <td><input type='text' id='TBNombreResguardante1' name='TBNombreResguardante1' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">2do Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante2' name='TBRFCResguardante2' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageB\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" /></td>
                                                <td><input type='text' id='TBNombreResguardante2' name='TBNombreResguardante2' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">3er Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante3' name='TBRFCResguardante3' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageB\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageB','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" /></td>
                                                <td><input type='text' id='TBNombreResguardante3' name='TBNombreResguardante3' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                        </table>
  					</div>
  			</div>
  	</div>
  	       <script>
                   $(function() {
                                    $(\"#tabs\").tabs();
                                    $(\"#tabs2\").tabs();
                             });
  	      </script>";
  	return $frmDetalles;
  	
  }	 
}

?>
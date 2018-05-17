<?php

class  Entradas extends poolConnection
{
	
	public function load_form()
	{
        $CboMovimientoOption = "";
		$CboMovimiento =  new poolConnection();
		$con=$CboMovimiento->Conexion();
		$CboMovimiento->BaseDatos($con);
		$sql="SELECT Id_TipoMovimiento,vDescripcion FROM sa_tipomovimiento order by Id";
		$RSet=$CboMovimiento->Query($con,$sql);
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
                                                                <div id=\"CBTiposMovimientoDiv\" >
					                  		<select id=\"CBTiposMovimiento\" class=\"chzn-select\" data-placeholder=\"Seleccione un Tipo de Movimiento ...\" >
					                            <option value=\"0\"></option>
					                            $CboMovimientoOption
					                        </select></div>
                                                                <div id=\"CBTTexto\" name=\"CBTTexto\" class=\"txt_titulos_bold\"></div>
					                  </td>
					                  <td>
					                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					                  </td>
					                  <td>
					                   <div class=\"txt_titulos_bold\">Fecha de Registro</div>
					                  </td>
					                  <td>
					                     <div id=\"FechaRegistroDiv\"><input type='text' id='txtFechaRegistro' name='txtFechaRegistro' class=\"boxes_form100px\"/></div><div id=\"TTFechaRegistroDiv\" name=\"TTFechaRegistroDiv\" class=\"txt_titulos_bold\"></div>
					                  </td>
					             </tr>
				          </table>
				 </fieldset>
				 <br>
				 <div id='DivPedido'></div>
				 <div id='DivGridPedido'></div>
				 <div id='DivDetalles'></div>
				   <script>
				   $(function() {
                                            $.datepicker.setDefaults($.datepicker.regional[\"es\"]);
                                            $(\"#txtFechaRegistro\").datepicker();
                                    });
                              $(\".chzn-select\").chosen(); 
                              $(\".chzn-select-deselect\").chosen({allow_single_deselect:true}); 
                    </script>";
		return $frm;
	}
        public function tipomoviemento($id)
        {
            switch($id)
            {
                case '101':
                            $frm ="<fieldset>
				 <legend class=\"txt_titulos_bold\">Pedido</legend>
				 <table>
				    <tr>
				       <td><div class=\"txt_titulos_bold\">Pedido:</div></td>
				       <td><input id=\"TBIDPedido\" type=\"text\" readonly=\"readonly\" class=\"boxes_form100px\" style=\"text-align: right; width:80px;\" /></td>
				       <td>&nbsp;&nbsp;&nbsp;</td>
				       <td><img src=\"../../interfaz_modulos/botones/buscar.jpg\" name=\"BtnBuscar\" width=\"120\" height=\"45\" border=\"0\" id=\"BtnBuscar\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('BtnBuscar','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_pedidor();\"/></td>
				       <td>&nbsp;&nbsp;&nbsp;</td>
				       <td><div class=\"txt_titulos_bold\">Entrada:</div></td>
				       <td><input id=\"TBFechaPedido\" type=\"text\" readonly=\"readonly\" class=\"boxes_form100px\" style=\"text-align: right; width:70px;\" /></td>
				       <td>&nbsp;&nbsp;&nbsp;</td>
				       <td><div class=\"txt_titulos_bold\">Proveedor:</div></td>
				       <td><input id=\"TBProveedor\" type=\"text\" readonly=\"readonly\" class=\"boxes_form400px\" style=\"width: 460px;\" /></td>
				    </tr>
				 </table>
				 </fieldset>";
                    break;
                case '104':
                                 $frm ="<fieldset>
				 <legend class=\"txt_titulos_bold\">Pedido</legend>
				 <table>
				    <tr>
				       <td><div class=\"txt_titulos_bold\">Pedido:</div></td>
				       <td><input id=\"TBIDPedido\" type=\"text\" readonly=\"readonly\" class=\"boxes_form100px\" style=\"text-align: right; width:80px;\" /></td>
				       <td>&nbsp;&nbsp;&nbsp;</td>
				       <td><img src=\"../../interfaz_modulos/botones/buscar.jpg\" name=\"BtnBuscar\" width=\"120\" height=\"45\" border=\"0\" id=\"BtnBuscar\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('BtnBuscar','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_pedidor();\"/></td>
				       <td>&nbsp;&nbsp;&nbsp;</td>
				       <td><div class=\"txt_titulos_bold\">Entrada:</div></td>
				       <td><input id=\"TBFechaPedido\" type=\"text\" readonly=\"readonly\" class=\"boxes_form100px\" style=\"text-align: right; width:70px;\" /></td>
				       <td>&nbsp;&nbsp;&nbsp;</td>
				       <td><div class=\"txt_titulos_bold\">Proveedor:</div></td>
				       <td><input id=\"TBProveedor\" type=\"text\" readonly=\"readonly\" class=\"boxes_form400px\" style=\"width: 460px;\" /></td>
				    </tr>
				 </table>
				 </fieldset>";
                    break;
                case '2000':
                           $frm =$this->Detalles_2000('2000');
                    break;
                   
                case '2700':
                           $frm =$this->Detalles_2000('2700');
                    break;
            }
            return $frm;
        }
	public function buscar_pedido($AData)
	{
        $where = "";
		$Patron=$AData->Patron;
		$ACFolio=$AData->Folio;
		$ACRequisicion=$AData->Requisicion;
		
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
                sa_detallepedido.Id_Pedido,
	 	sa_detallepedido.Id_CABMS,
	 	sa_detallepedido.eCantidad,
	 	sa_detallepedido.eCantidadEntregada,
	 	sa_detallepedido.mPrecioUnitario,
	 	sa_cabms.vDescripcionCABMS,
	 	sa_umedida.vDescripcion
	 	From sa_detallepedido,sa_cabms,sa_umedida
	 	where (sa_detallepedido.Id_Pedido='$id')
	 	and (sa_detallepedido.Id_CABMS=sa_cabms.Id_CABMS
	 	and sa_detallepedido.Id_UMedida = sa_umedida.Id_UMedida)";
	 	
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
	 	<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageDG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"selecion_grid('$fila[Id_CABMS]');\">&nbsp;</td>
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
        $CboBien = "";
  	    $objStaus =  new poolConnection();
        $con = $objStaus->Conexion();
        $objStaus->BaseDatos();
        $sql="SELECT Id_EdoBien,vDescripcion FROM sa_estadobien order by vDescripcion asc";
        $RSet=$objStaus->Query($con,$sql);
        while($fila = mysqli_fetch_array($RSet))
        {
            $CboBien .= "<option value=\"$fila[Id_EdoBien]\">$fila[vDescripcion]</option>";
        }
        $objStaus->Cerrar($con);
        $frmBien ="
  		    				<select name='cboTipoBien' id='cboTipoBien' class=\"chzn-select\" data-placeholder=\"...\" >
  		    				     
  		    				      <option value=\"1\">Bienes Muebles y Equipo</option>
  		    				      <option value=\"2\">Bienes de Equipo Informatico</option>
  		    				      <option value=\"3\">Vehiculos</option>
  		    				      <option value=\"4\">Bienes de Acervo Cultural</option>
  		    				</select>
  		    				<br>
  		    				<br>
  		    				<img src=\"../../interfaz_modulos/botones/aceptar.jpg\" name=\"ImageAceptarTB\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageAceptarTB\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageAceptarTB','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"add_tipodebien_ainventario();\" />
  		    				<script>
                              $(\".chzn-select\").chosen(); 
                              $(\".chzn-select-deselect\").chosen({allow_single_deselect:true}); 
                    </script>
  		                 ";

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
                                                <textarea id='TBCaracteristicas' name='TBCaracteristicas' class='boxes_txtarea'></textarea>
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
                                                            <select name=\"CboEstado\" id=\"CboEstado\" class=\"chzn-select\" data-placeholder=\".......\">
                                                                $CboBien
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Pedido:</div></td>
                                                        <td><input type='text' id='TBIDPedidoArticulo' name='txtPedido' class=\"boxes_form100px\"/ value=\"$vNumPedido\"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Costo:</div></td>
                                                        <td><input type='text' id='TBPrecioUnitario' name='txtCosto' class=\"boxes_form100px\" value=\"$mCosto\"/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">No. Documento:</div></td>
                                                        <td>
                                                            <input type='text' id='TBNoDocumento' name='TBNoDocumento' class=\"boxes_form100px\" value=\"\"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Factura:</div></td>
                                                        <td><input type='text' id='TBFactura' name='TBFactura' class=\"boxes_form100px\" value=\"$vNoFactura\"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Fecha Factura:</div></td>
                                                        <td><input type='text' id='TBFechaFactura' name='TBFechaFactura' value=\"$Fecha[2]/$Fecha[1]/$Fecha[0]\" class=\"boxes_form100px\"/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
  					</div>
  					<div id=\"tabs-2\">
  					          	<div id=\"DivfrmBienes\">$frmBien</div>	

  					</div>
  					<div id=\"tabs-3\">
  							<table>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">&Aacute;rea De Adquisicion:</div></td>
                                                <td><input type='text' id='txtIdAreaAdquisicion' name='txtIdAreaAdquisicion' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageAAdquisicion1\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageAAdquisicion1\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageAAdquisicion1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_ADA();\"/></td>
                                                <td><input type='text' id='txtDesAreaAdquisicion' name='txtDesAreaAdquisicion' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">1er Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante1' name='TBRFCResguardante1' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageResguardante1\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageResguardante1\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageResguardante1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_1erR()\"/></td>
                                                <td><input type='text' id='TBNombreResguardante1' name='TBNombreResguardante1' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">2do Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante2' name='TBRFCResguardante2' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageResguardante2\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageResguardante2\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageResguardante2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_2doR()\"/></td>
                                                <td><input type='text' id='TBNombreResguardante2' name='TBNombreResguardante2' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">3er Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante3' name='TBRFCResguardante3' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageResguardante3\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageResguardante3\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageResguardante3','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_3er()\"/></td>
                                                <td><input type='text' id='TBNombreResguardante3' name='TBNombreResguardante3' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                        </table>
  					</div>
  			</div>
  	</div>
        <br>
        <br>
        <table>
                <tr>
                    <td><img src=\"../../interfaz_modulos/botones/guardar.jpg\" name=\"ImageAcepto\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageAcepto\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageAcepto','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"guarda_datos();\"></td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><img src=\"../../interfaz_modulos/botones/cancelar.jpg\" name=\"ImageCancelar\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageCancelar\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageCancelar','','../../interfaz_modulos/botones/cancelar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"javascript:location.reload();\"></td>
                </tr>
        </table>
        
  	       <script>
                   $(function() {
                                    $(\"#tabs\").tabs();
                                    $(\"#tabs2\").tabs();
                                    $(\"#TBFechaFactura\").datepicker();
                             });
  	      </script>";
  	return $frmDetalles;
  	
  }	 
  function frm_buscamosCambsEnIventarios($IdCambs)
  {
  	    $Id_TipoBien = 0;
  	    $obj = new poolConnection();
  	    $con=$obj->Conexion();
  	    $obj->BaseDatos($con);
  	    $sql="Select Id_TipoBien from sa_inventario Where Id_CABMS='$IdCambs'";
  	    $St=$obj->Query($con,$sql);
  	    while($fila=mysqli_fetch_array($St))
  	    {
  	    	$Id_TipoBien=$fila[Id_TipoBien];
  	    }
  	    $obj->Cerrar($con,$St);
  	    return $Id_TipoBien;
  }
  function add_tipobien_inventario($Id_ConsecutivoInv,$Id_TipoBien,$Id_CABMS,$CveUsuario)
  {
  	/*$objAdd = new poolConnection();
  	$con=$objAdd->Conexion();
  	$objAdd->BaseDatos();
  	$d=Date(d);
  	$m=Date(m);
  	$a=Date(Y);
  	$FRegistro="$a-$m-$d";
  	$sql="INSERT INTO sa_inventario VALUES ('0', '$Id_CABMS', '$Id_TipoBien', '0', '0', '0','0','0','0000-00-00','0','$FRegistro', '0000-00-00', '1', '1', '1', '$CveUsuario')";
  	$objAdd->Query($sql);
  	$objAdd->Cerrar($con);
  	echo $sql;*/
  	
  }
  public function bien_acervo_frm()
  {
     
  	   $frm = "
                    <script>
                         $(\"#TBCaracteristicas\").val('$vCaracteristicas');
                             
                    </script>
  	           <table>
  	                 <tr>
  	                     <td><div class=\"txt_titulos_bold\">Autor</div></td>
  	                     <td><input type=\"text\" name=\"txtAutor\" id=\"txtAutor\"  class=\"boxes_form400px\"/></td>
  	                 </tr>
  	                 <tr>
  	                     <td><div class=\"txt_titulos_bold\">Titulo</div></td>
  	                     <td><input type=\"text\" name=\"txtTitulo\" id=\"txtTitulo\" class=\"boxes_form400px\" /></td>
  	                 </tr>
  	                 <tr>
  	                     <td><div class=\"txt_titulos_bold\">Ubicacion</div></td>
  	                     <td><input type=\"text\" name=\"txtUbicacion\" id=\"txtUbicacion\" class=\"boxes_form400px\"/></td>
  	                 </tr>
  	           </table>
  	           <br>
  	          ";
  	   return $frm;
  }
  public function bien_mueble_frm()
  {
     
  	$frm ="
  	         <table>
  	                <tr>
                          <td><div class=\"txt_titulos_bold\">Marca</div></td>
                          <td><input type='text' id='txtMarcaMueble' name='txtMarcaMueble' value='$vMarca' class=\"boxes_form400px\" /></td>
                     </tr>
  	                <tr>
                          <td><div class=\"txt_titulos_bold\">Tipo</div></td>
                          <td><input type='text' id='txtMuebleTipo' name='txtTipoMueble' value='$vTipo' class=\"boxes_form200px\"/></td> 
                    </tr>
                    <tr>
			<td><div class=\"txt_titulos_bold\">Modelo</div></td>
			<td><input type='text' id='txtMuebleModelo' name='txtModeloMueble' value='$vModelo' class=\"boxes_form200px\" /></td>                       
                    </tr>
                    <tr>
			<td><div class=\"txt_titulos_bold\">Serie</div></td>
			<td><input type='text' id='txtMuebleModeloSerie' name='txtMuebleModeloSerie' value='$vNumSerie' class=\"boxes_form200px\" /></td>                       
                    </tr>
					<tr>
					   <td>
					   		 <table>
                                        <tr>
                                            <td><div class=\"txt_titulos_bold\">Pedestal</div></td>
                                            <td><input type=\"checkbox\" id=\"chkMueblePedestal\" name=\"chkMueblePedestal\" value=\"Si\" $bPedestalchk/></td>
                                        </tr>
                                        <tr>
                                            <td><div class=\"txt_titulos_bold\">Fija</div></td>
                                            <td><input type=\"checkbox\" id=\"chkMuebleFija\" name=\"chkMuebleFija\" value=\"Si\" $bFijachk/></td>
                                        </tr>
                                        <tr>
                                            <td><div class=\"txt_titulos_bold\">Giratoria</div></td>
                                            <td><input type=\"checkbox\" id=\"chkMuebleGiratoria\" name=\"chkMuebleGiratoria\" value=\"Si\" $bGiratoriachk/></td>
                                        </tr>
                                        <tr>
                                            <td><div class=\"txt_titulos_bold\">Rodajas</div></td>
                                            <td><input type=\"checkbox\" id=\"chkMuebleRodajas\" name=\"chkMuebleRodajas\" value=\"Si\" $bRodajaschk/></td>
                                        </tr>
                                        <tr>
                                                          <td><div class=\"txt_titulos_bold\">Plegable</div></td>
                                                          <td><input type=\"checkbox\" id=\"chkMueblePlegable\" name=\"chkMueblePlegable\" value=\"Si\"/></td>
                                                      </tr>
                                    
                                </table>
					   </td>
					   <td>
                                                <table>
                                                      
                                                      <tr>
                                                          <td><div class=\"txt_titulos_bold\">Cajones</div></td>
                                                          <td><input type=\"text\" id=\"chkMuebleCajones\" name=\"chkMuebleCajones\" class=\"boxes_form100px\"/></td>
                                                      </tr>
                                                      <tr>
                                                          <td><div class=\"txt_titulos_bold\">Gavetas</div></td>
                                                          <td><input type=\"text\" id=\"chkMuebleGavetas\" name=\"chkMuebleGavetas\" class=\"boxes_form100px\"/></td>
                                                      </tr>
                                                      <tr>
                                                          <td><div class=\"txt_titulos_bold\">Entrepa&ntilde;o</div></td>
                                                          <td><input type=\"text\" id=\"chkMuebleEntrepano\" name=\"chkMuebleEntrepano\" class=\"boxes_form100px\"/></td>
                                                      </tr>
                                                  </table>
					   </td>
					</tr>
                </table>";
  	return $frm;
  }
  public function bien_informatico_frm()
  {
     
  		$frm ="
			<table>
                            <tr>
                                <td>
                                        <table>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Serie:</div></td>
                                                <td><input type='text' id='txtSerieInfomatico' name='txtSerieInfomatico' class=\"boxes_form200px\" value=\"$vNumSerie\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Marca:</div></td>
                                                <td><input type='text' id='txtMarcaInfomatico' name='txtMarcaInfomatico' class=\"boxes_form200px\" value=\"$vMarca\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Modelo:</div></td>
                                                <td><input type='text' id='txtModeloInfomatico' name='txtModeloInfomatico' class=\"boxes_form200px\" value=\"$vModelo\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Disco Duro:</div></td>
                                                <td><input type='text' id='txtDicosDuroInfomatico' name='txtDiscoDuroInfomatico' class=\"boxes_form200px\" value=\"$vDiscoDuro\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Ram:</div></td>
                                                <td><input type='text' id='txtRamInfomatico' name='txtRamInfomatico' class=\"boxes_form200px\" value=\"$vRAM\"/></td>
                                            </tr>
                                        </table>
                                </td>
                                <td>
                                        <table>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Procesador:</div></td>
                                                <td><input type='text' id='txtProcesadorInfomatico' name='txtProsesadorInfomatico' class=\"boxes_form200px\" value=\"$vProcesador\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Pag.Minuto:</div></td>
                                                <td><input type='text' id='txtPaginasMinutoInfomatico' name='txtPaginasMinutoInfomatico' class=\"boxes_form200px\" value=\"$ePaginasMinuto\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">FuentePoder:</div></td>
                                                <td><input type='text' id='txtFuentePoderInfomatico' name='txtFuentePoderInfomatico' class=\"boxes_form200px\" value=\"$vFuentePoder\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Monitor S/N:</div></td>
                                                <td><input type='text' id='txtMonitorSerieInfomatico' name='txtMonitorSerieInfomatico' class=\"boxes_form200px\" value=\"$vMonitorSerie\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Monitor Marca:</div></td>
                                                <td><input type='text' id='txtMonitorMarcaInfomatico' name='txtMonitorMarcaInfomatico' class=\"boxes_form200px\" value=\"$vMonitorMarca\"/></td>
                                            </tr>
                                        </table>
                                </td>
                                <td>
                                        <table>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Teclado S/N :</div></td>
                                                <td><input type='text' id='txtTecladoSerialInfomatico' name='txtTecladoSerialInfomatico' class=\"boxes_form200px\" value=\"$vTecladoSerie\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Teclado Marca :</div></td>
                                                <td><input type='text' id='txtTecladoMarcaInfomatico' name='txtTecladoMarcaInfomatico' class=\"boxes_form200px\" value=\"$vTecladoMarca\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Mouse Serie :</div></td>
                                                <td><input type='text' id='txtMouseSerieInfomatico' name='txtMouseSerieInfomatico' class=\"boxes_form200px\" value=\"$vMouseSerie\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Mouse Marca :</div></td>
                                                <td><input type='text' id='txtMouseMarcaInfomatico' name='txtMouseMarcaInfomatico' class=\"boxes_form200px\" value=\"$vMouseMarca\"/></td>
                                            </tr>
                                        </table>
                                </td>
                            </tr>
                         </table>   
                            ";
  		return $frm;
  	
  }
  public function bien_vehiculo_frm()
  {
      
  	$frm ="
                <table>
                      <tr>
                            <td>
                                    <table>
                                          <tr>
                                              <td><div class=\"txt_titulos_bold\">Marca</div></td></td>
                                              <td><input type='text' id='txtMarcaVehiculo' name='txtMarcaVehiculo' class=\"boxes_form200px\" value=\"\"/></td>
                                          </tr>
                                          <tr>
                                              <td><div class=\"txt_titulos_bold\">Tipo</div></td>
                                              <td><input type='text' id='txtTipoVehiculo' name='txtTipoVehiculo' class=\"boxes_form200px\" value=\"\"/></td>
                                          </tr>
                                        <tr>
                                            <td><div class=\"txt_titulos_bold\">Modelo</div></td>
                                            <td><input type='text' id='txtModeloVehiculo' name='txtModeloVehiculo' class=\"boxes_form200px\"  value=\"\"/></td>
                                        </tr>
                                         <tr>
                                              <td><div class=\"txt_titulos_bold\">Num. Serie</div></td>
                                              <td><input type='text' id='txtSNVehiculo' name='txtSNVehiculo' class=\"boxes_form200px\" value=\"\"/></td>
                                          </tr>
                                         <tr>
                                              <td><div class=\"txt_titulos_bold\">Num. Motor</div></td>
                                              <td><input type='text' id='txtSNMotorVehiculo' name='txtSNMotorVehiculo' class=\"boxes_form200px\" value=\"\"/></td>
                                          </tr>
                                          <tr>
                                              <td><div class=\"txt_titulos_bold\">Placas</div></td>
                                              <td><input type='text' id='txtPlacasVehiculo' name='txtPlacasVehiculo' class=\"boxes_form200px\" value=\"\"/></td>
                                          </tr>
                                     </table>
                             </td>
                             <td>
                                    <table>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Tipo Trasmicion</div></td>
                                            </tr>
                                    </table>
                                    <table>
                                            <tr>
                                                 <td>
                                                                    <table>
                                                                      <tr>
                                                                          <td><div class=\"txt_titulos_bold\">Manual</div></td>
                                                                          <td><input type=\"checkbox\" id=\"chkVehiculoManual\" name=\"chkVehiculoManual\" value=\"M\"/></td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td><div class=\"txt_titulos_bold\">Hidraulica</div></td>
                                                                          <td><input type=\"checkbox\" id=\"chkVehiculoHidraulica\" name=\"chkVehiculoHidraulica\" value=\"H\"/></td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td><div class=\"txt_titulos_bold\">Ambas</div></td>
                                                                          <td><input type=\"checkbox\" id=\"chkVehiculoAmbas\" name=\"chkVehiculoAmbas\" value=\"A\"/></td>
                                                                      </tr>
                                                             </table>

                                                 </td>
                                            </tr>
                                    </table>
                                    <table>
                                         <td><div class=\"txt_titulos_bold\">Tipo Direccion</div></td>
                                    </table>
                                    <table>
                                            <tr>
                                              
                                               <td>
                                                               <table>
                                                                      <tr>
                                                                          <td><div class=\"txt_titulos_bold\">Standar</div></td>
                                                                          <td><input type=\"checkbox\" id=\"chkVehiculoDireccionStandar\" name=\"chkVehiculoDireccionStandar\" value=\"S\"/></td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td><div class=\"txt_titulos_bold\">Automatica</div></td>
                                                                          <td><input type=\"checkbox\" id=\"chkVehiculoDireccionAutomatica\" name=\"chkVehiculoDireccionAutomatica\" value=\"A\"/></td>
                                                                      </tr>
                                                                      <tr>
                                                                          <td><div class=\"txt_titulos_bold\">Ambas</div></td>
                                                                          <td><input type=\"checkbox\" id=\"chkVehiculoDireccionAmbas\" name=\"chkVehiculoDireccionAmbas\" value=\"A\"/></td>
                                                                      </tr>
                                                             </table> 
                                               </td>
                                      </table>
                                </td>
                              </tr>
                            </table>";
  	return $frm;
  }
  public function buscar_resguardante($texto,$cve,$nombre)
 {
     $sqlWhere = "";
 	$sql="Select Id_NumEmpleado,vNombre from sa_empleado where ";
 	if($cve == "Si")
 	 {
 	 	$sqlWhere .=" (Id_NumEmpleado like '%$texto%') or ";
 	 }
 	if($nombre == "Si")
 	{
 		$sqlWhere .= "(vNombre like '%$texto%') or ";
 	} 	 

     $sqlWhere = substr($sqlWhere, 0, -3);
     $sql .= $sqlWhere;
     $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          
                          $RSet=$objBuscar->Query($con,$sql);
                          $i = 0;
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"Image1RG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"Image1RG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('Image1RG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_resguardante(1,'$fila[Id_NumEmpleado]','$fila[vNombre]');\">&nbsp;</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_NumEmpleado]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td>
                                                    
                                               </tr>";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Selecionar', name : 'Seleccionar', width :120, sortable :false, align: 'center'},
                                                            {display: 'Id Empleado', name : 'Id Empleado', width :90, sortable :false, align: 'center'},
                                                            {display: 'Empleado', name : 'Nombre', width :250, sortable :false, align: 'center'},
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 630,
                                            height: 200
                                            }

                                            );</script></form>";
                          return $FliexGrid;
 }
  public function buscar_resguardante2($texto,$cve,$nombre)
 {
     $sqlWhere = "";
 	$sql="Select Id_NumEmpleado,vNombre from sa_empleado where ";
 	if($cve == "Si")
 	 {
 	 	$sqlWhere .=" (Id_NumEmpleado like '%$texto%') or ";
 	 }
 	if($nombre == "Si")
 	{
 		$sqlWhere .= "(vNombre like '%$texto%') or ";
 	} 	 

     $sqlWhere = substr($sqlWhere, 0, -3);
     $sql .= $sqlWhere;
     $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"Image2RG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"Image2RG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('Image2RG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_resguardante(2,'$fila[Id_NumEmpleado]','$fila[vNombre]');\">&nbsp;</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_NumEmpleado]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td>
                                                    
                                               </tr>";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Selecionar', name : 'Seleccionar', width :120, sortable :false, align: 'center'},
                                                            {display: 'Id Empleado', name : 'Id Empleado', width :90, sortable :false, align: 'center'},
                                                            {display: 'Empleado', name : 'Nombre', width :250, sortable :false, align: 'center'},
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 630,
                                            height: 200
                                            }

                                            );</script></form>";
                          return $FliexGrid;
 }
  public function buscar_resguardante3($texto,$cve,$nombre)
 {
     $sqlWhere = "";
 	$sql="Select Id_NumEmpleado,vNombre from sa_empleado where ";
 	if($cve == "Si")
 	 {
 	 	$sqlWhere .=" (Id_NumEmpleado like '%$texto%') or ";
 	 }
 	if($nombre == "Si")
 	{
 		$sqlWhere .= "(vNombre like '%$texto%') or ";
 	} 	 

     $sqlWhere = substr($sqlWhere, 0, -3);
     $sql .= $sqlWhere;
     $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $RSet=$objBuscar->Query($con,$sql);
                          $i = 0;
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"Image3RG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"Image3RG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('Image3RG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_resguardante(3,'$fila[Id_NumEmpleado]','$fila[vNombre]');\">&nbsp;</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_NumEmpleado]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNombre]</td>
                                                    
                                               </tr>";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Selecionar', name : 'Seleccionar', width :120, sortable :false, align: 'center'},
                                                            {display: 'Id Empleado', name : 'Id Empleado', width :90, sortable :false, align: 'center'},
                                                            {display: 'Empleado', name : 'Nombre', width :250, sortable :false, align: 'center'},
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 630,
                                            height: 200
                                            }

                                            );</script></form>";
                          return $FliexGrid;
 }
 public function UAdministrativa($cve,$nombre,$patron)
 {
     $sqlWhere = "";
     $sql="Select Id_Unidad,vDescripcion from sa_unidadadmva where ";
 	if($cve == "Si")
 	 {
 	 	$sqlWhere .=" (Id_Unidad like '%$patron%') or ";
 	 }
 	if($nombre == "Si")
 	{
 		$sqlWhere .= "(vDescripcion like '%$patron%') or ";
 	} 	 

     $sqlWhere = substr($sqlWhere, 0, -3);
     $sql .= $sqlWhere;
     $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $RSet=$objBuscar->Query($sql);
                          $i = 0;
                          while($fila=mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"Image2RG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"Image2RG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('Image2RG$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_uadmin('$fila[Id_Unidad]','$fila[vDescripcion]');\">&nbsp;</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Unidad]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                                    
                                               </tr>";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Selecionar', name : 'Seleccionar', width :120, sortable :false, align: 'center'},
                                                            {display: 'Clave', name : 'Clave', width :90, sortable :false, align: 'center'},
                                                            {display: 'U. Administrativa', name : 'U. Administrativa', width :250, sortable :false, align: 'center'},
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 630,
                                            height: 200
                                            }

                                            );</script></form>";
                          return $FliexGrid;
 }
 function guardar_registro_acervo($info,$infoacervo)
 {
     $vNumPedido=$info->vNumPedido;
     $mCosto=$info->mCosto;
     $vNoFactura=$info->vNoFactura;
     $dFechaFactura=$info->dFechaFactura;
     $Id_CABMS=$info->Id_CABMS;
     $TBNoDocumento=$info->TBNoDocumento;
     $txtIdTipoBien = $info->txtIdTipoBien;
     /*$Id_Localizacion=$info->Id_Localizacion;*/
     $dFechaRegistro=$info->dFechaRegistro;
     $CveUsuario=$info->CveUsuario;
     $vCaracteristica = $info->TBCaracteristicas;
     $txtResguardante1=$info->txtResguardante1;
     $txtResguardante2=$info->txtResguardante2;
     $txtResguardante3=$info->txtResguardante3;
     $txtUIAdministrativa=$info->txtUIAdministrativa;
     $txtCBTiposMovimiento=$info->txtCBTiposMovimiento;
     
     $CboEstado=$info->CboEstado;
    $txtAutor = $infoacervo->txtAutor;
    $txtTitulo = $infoacervo->txtTitulo;
    $txtUbicacion = $infoacervo->txtUbicacion;
     
     $d=date(d);
     $m=date(m);
     $a=date(Y);
     $FechaModificacion ="$a/$m/$d";
     
     $F_Factura = split("/",$dFechaFactura);
     $FFactura = "$F_Factura[2]/$F_Factura[1]/$F_Factura[0]";
     $F_Registro = split("/", $dFechaRegistro);
     $FRegistro = "$F_Registro[2]/$F_Registro[0]/$F_Registro[1]";
     
    /* $sqlAcervo = "update sa_acervo set vCaracteristicas='$vCaracteristica',vAutor='$txtAutor',vTitulo='$txtTitulo',vUbicacion ='$txtUbicacion' Where Id_CABMS='$Id_CABMS'";*/
     
     $sqlInventario="INSERT INTO sa_inventario values('0','$Id_CABMS','$txtIdTipoBien','0','0','$vNoFactura','$mCosto','$vNumPedido','$FFactura','$CboEstado','$FRegistro','$FechaModificacion','0','0','0','$CveUsuario')";
     
     $objInv = new poolConnection();
     $con=$objInv->Conexion();
     $objInv->BaseDatos($con);
     $R=$objInv->Query($sqlInventario);
     $used_id = mysqli_insert_id($con);
     $objInv->Cerrar($con,$R);
     
     $sqlInventarioMov="INSERT INTO sa_movinventario values('0','$Id_CABMS', '$used_id','$txtResguardante1', '$txtCBTiposMovimiento', '$txtUIAdministrativa', '$txtResguardante2', '$txtResguardante3','0','$FRegistro','$FechaModificacion','$TBNoDocumento','$CboEstado')";
     $sqlAcervo="INSERT INTO sa_acervo values ('0','$Id_CABMS','$vCaracteristica','$used_id','$txtUbicacion','$txtTitulo','$txtAutor')";
     
     $objInvM = new poolConnection();
     $con=$objInvM->Conexion();
     $objInvM->BaseDatos($con);
     $R=$objInvM->Query($con,$sqlInventarioMov);
     $objInvM->Cerrar($con,$R);
     
     $obj = new poolConnection();
     $con=$obj->Conexion();
     $obj->BaseDatos($con);
     $R=$obj->Query($sqlAcervo);
     $obj->Cerrar($con,$R);
     return "$sqlInventario";
     
 }
 function guardar_registro_vehiculo($info,$infovehiculo)
 {
     $vNumPedido=$info->vNumPedido;
     $mCosto=$info->mCosto;
     $vNoFactura=$info->vNoFactura;
     $dFechaFactura=$info->dFechaFactura;
     $Id_CABMS=$info->Id_CABMS;
     $TBNoDocumento=$info->TBNoDocumento;
     $txtIdTipoBien = $info->txtIdTipoBien;
     /*$Id_Localizacion=$info->Id_Localizacion;*/
     $dFechaRegistro=$info->dFechaRegistro;
     $CveUsuario=$info->CveUsuario;
     $vCaracteristica = $info->TBCaracteristicas;
     $txtResguardante1=$info->txtResguardante1;
     $txtResguardante2=$info->txtResguardante2;
     $txtResguardante3=$info->txtResguardante3;
     $txtUIAdministrativa=$info->txtUIAdministrativa;
     $txtCBTiposMovimiento=$info->txtCBTiposMovimiento;
     $CboEstado=$info->CboEstado;
     
     #vehiculo
     $txtMarcaVehiculo=$infovehiculo->txtMarcaVehiculo;
     $txtTipoVehiculo=$infovehiculo->txtTipoVehiculo;
     $txtModeloVehiculo=$infovehiculo->txtModeloVehiculo;
     $txtSNVehiculo=$infovehiculo->txtSNVehiculo;
     $txtSNMotorVehiculo=$infovehiculo->txtSNMotorVehiculo;
     $txtPlacasVehiculo=$infovehiculo->txtPlacasVehiculo;
     $txtDireccion=$infovehiculo->txtDireccion;
     $txtTransmision=$infovehiculo->txtTransmision;
     
     
     
     $d=date(d);
     $m=date(m);
     $a=date(Y);
     $FechaModificacion ="$a/$m/$d";
     
     $F_Factura = split("/",$dFechaFactura);
     $FFactura = "$F_Factura[2]/$F_Factura[1]/$F_Factura[0]";
     $F_Registro = split("/", $dFechaRegistro);
     $FRegistro = "$F_Registro[2]/$F_Registro[1]/$F_Registro[0]";
     
    $sqlInventario="INSERT INTO sa_inventario values('0','$Id_CABMS','$txtIdTipoBien','0','0','$vNoFactura','$mCosto','$vNumPedido','$FFactura','$CboEstado','$FRegistro','$FechaModificacion','0','0','0','$CveUsuario')";
     
     $objInv = new poolConnection();
     $con=$objInv->Conexion();
     $objInv->BaseDatos($con);
     $R=$objInv->Query($sqlInventario);
     $used_id = mysqli_insert_id($con);
     $objInv->Cerrar($con,$R);
     
      $sqlInventarioMov="INSERT INTO sa_movinventario values('0','$Id_CABMS', '$used_id','$txtResguardante1', '$txtCBTiposMovimiento', '$txtUIAdministrativa', '$txtResguardante2', '$txtResguardante3','0','$FRegistro','$FechaModificacion','$TBNoDocumento','$CboEstado')";
      $sqlVehiculo = "INSERT INTO sa_vehiculo values('0','$Id_CABMS','$txtMarcaVehiculo','$used_id','$txtTipoVehiculo','$txtModeloVehiculo','$txtSNVehiculo','$txtSNMotorVehiculo','$txtPlacasVehiculo','.','$txtTransmision','-','$vCaracteristica','$txtDireccion')";
     
     
     $objInvM = new poolConnection();
     $con=$objInvM->Conexion();
     $objInvM->BaseDatos($con);
     $R=$objInvM->Query($sqlInventarioMov);
     $objInvM->Cerrar($con,$R);
     
     $obj = new poolConnection();
     $con=$obj->Conexion();
     $obj->BaseDatos($con);
     $R=$obj->Query($sqlVehiculo);
     $obj->Cerrar($con,$R);
     
     
     
     return "$sqlInventario $sqlInventarioMov $sqlVehiculo";
     
 }
 function guardar_registro_informatico($info,$infoinformatico)
 {
     $vNumPedido=$info->vNumPedido;
     $mCosto=$info->mCosto;
     $vNoFactura=$info->vNoFactura;
     $dFechaFactura=$info->dFechaFactura;
     $Id_CABMS=$info->Id_CABMS;
     $TBNoDocumento=$info->TBNoDocumento;
     $txtIdTipoBien = $info->txtIdTipoBien;
     /*$Id_Localizacion=$info->Id_Localizacion;*/
     $dFechaRegistro=$info->dFechaRegistro;
     $CveUsuario=$info->CveUsuario;
     $vCaracteristica = $info->TBCaracteristicas;
     $txtResguardante1=$info->txtResguardante1;
     $txtResguardante2=$info->txtResguardante2;
     $txtResguardante3=$info->txtResguardante3;
     $txtUIAdministrativa=$info->txtUIAdministrativa;
     $txtCBTiposMovimiento=$info->txtCBTiposMovimiento;
     $CboEstado=$info->CboEstado;
     
     #informatico
     $txtSerieInfomatico=$infoinformatico->txtSerieInfomatico;
     $txtMarcaInfomatico=$infoinformatico->txtMarcaInfomatico;
     $txtModeloInfomatico=$infoinformatico->txtModeloInfomatico;
     $txtDicosDuroInfomatico=$infoinformatico->txtDicosDuroInfomatico;
     $txtRamInfomatico=$infoinformatico->txtRamInfomatico;
     $txtProcesadorInfomatico=$infoinformatico->txtProcesadorInfomatico;
     $txtPaginasMinutoInfomatico=$infoinformatico->txtPaginasMinutoInfomatico;
     $txtFuentePoderInfomatico=$infoinformatico->txtFuentePoderInfomatico;
     $txtMonitorSerieInfomatico=$infoinformatico->txtMonitorSerieInfomatico;
     $txtMonitorMarcaInfomatico=$infoinformatico->txtMonitorMarcaInfomatico;
     $txtTecladoSerialInfomatico=$infoinformatico->txtTecladoSerialInfomatico;
     $txtTecladoMarcaInfomatico=$infoinformatico->txtTecladoMarcaInfomatico;
     $txtMouseSerieInfomatico=$infoinformatico->txtMouseSerieInfomatico;
     $txtMouseMarcaInfomatico=$infoinformatico->txtMouseMarcaInfomatico;
     
     
     $d=date(d);
     $m=date(m);
     $a=date(Y);
     $FechaModificacion ="$a/$m/$d";
     
     $F_Factura = split("/",$dFechaFactura);
     $FFactura = "$F_Factura[2]/$F_Factura[0]/$F_Factura[1]";
     $F_Registro = split("/", $dFechaRegistro);
     $FRegistro = "$F_Registro[2]/$F_Registro[0]/$F_Registro[1]";
     /*$sqlInformatico = "UPDATE sa_informatico SET vNumSerie = '$txtSerieInfomatico', vMarca = '$txtMarcaInfomatico', vModelo = '$txtModeloInfomatico', vDiscoDuro = '$txtDicosDuroInfomatico', vRAM = '$txtRamInfomatico', vProcesador = '$txtProcesadorInfomatico', ePaginasMinuto = '$txtPaginasMinutoInfomatico', vFuentePoder = '$txtFuentePoderInfomatico', vCaracteristicas = '$vCaracteristica', vMonitorSerie = '$txtMonitorSerieInfomatico', vMonitorMarca = '$txtMonitorMarcaInfomatico', vTecladoSerie = '$txtTecladoSerialInfomatico', vTecladoMarca = '$txtTecladoMarcaInfomatico', vMouseSerie = '$txtMouseSerieInfomatico', vMouseMarca = '$txtMouseMarcaInfomatico' WHERE Id_CABMS='$Id_CABMS';";*/
     $sqlInventario="INSERT INTO sa_inventario values('0','$Id_CABMS','$txtIdTipoBien','0','0','$vNoFactura','$mCosto','$vNumPedido','$FFactura','$CboEstado','$FRegistro','$FechaModificacion','0','0','0','$CveUsuario')";
     
     
     $objInv = new poolConnection();
     $con=$objInv->Conexion();
     $objInv->BaseDatos($con);
     $R=$objInv->Query($sqlInventario);
     $used_id = mysqli_insert_id($con);
     $objInv->Cerrar($con,$R);
     
     $sqlInventarioMov="INSERT INTO sa_movinventario values('0','$Id_CABMS', '$used_id','$txtResguardante1', '$txtCBTiposMovimiento', '$txtUIAdministrativa', '$txtResguardante2', '$txtResguardante3','0','$FRegistro','$FechaModificacion','$TBNoDocumento','$CboEstado')";
     $sqlInformatico ="INSERT INTO sa_informatico values('0','$Id_CABMS','$txtSerieInfomatico','$used_id','$txtMarcaInfomatico','$txtModeloInfomatico','$txtDicosDuroInfomatico','$txtRamInfomatico','$txtProcesadorInfomatico','$txtPaginasMinutoInfomatico','$txtFuentePoderInfomatico','$vCaracteristica','$txtMonitorSerieInfomatico','$txtMonitorMarcaInfomatico','$txtTecladoSerialInfomatico','$txtTecladoMarcaInfomatico','$txtMouseSerieInfomatico','$txtMouseMarcaInfomatico')";
     
     
     $objInvM = new poolConnection();
     $con=$objInvM->Conexion();
     $objInvM->BaseDatos($con);
     $R=$objInvM->Query($sqlInventarioMov);
     $objInvM->Cerrar($con,$R);
     
     $obj = new poolConnection();
     $con=$obj->Conexion();
     $obj->BaseDatos($con);
     $R=$obj->Query($sqlInformatico);
     $obj->Cerrar($con,$R);
     
     return "$sqlInventario $sqlInventarioMov $sqlInformatico";
     
 }
 function guardar_registro_mueble($info,$infomueble)
 {
     $vNumPedido=$info->vNumPedido;
     $mCosto=$info->mCosto;
     $vNoFactura=$info->vNoFactura;
     $dFechaFactura=$info->dFechaFactura;
     $Id_CABMS=$info->Id_CABMS;
     $TBNoDocumento=$info->TBNoDocumento;
     $txtIdTipoBien = $info->txtIdTipoBien;
     /*$Id_Localizacion=$info->Id_Localizacion;*/
     $dFechaRegistro=$info->dFechaRegistro;
     $CveUsuario=$info->CveUsuario;
     $vCaracteristica = $info->TBCaracteristicas;
     $txtResguardante1=$info->txtResguardante1;
     $txtResguardante2=$info->txtResguardante2;
     $txtResguardante3=$info->txtResguardante3;
     $txtUIAdministrativa=$info->txtUIAdministrativa;
     $txtCBTiposMovimiento=$info->txtCBTiposMovimiento;
     $CboEstado=$info->CboEstado;
     
     #muebele
      $txtMarcaMueble=$infomueble->txtMarcaMueble;
      $txtMuebleTipo=$infomueble->txtMuebleTipo;
      $txtMuebleModelo=$infomueble->txtMuebleModelo;
      $txtMuebleModeloSerie=$infomueble->txtMuebleModeloSerie;
      $chkMueblePedestal=$infomueble->chkMueblePedestal;
      $chkMuebleFija=$infomueble->chkMuebleFija;
      $chkMuebleGiratoria=$infomueble->chkMuebleGiratoria;
      $chkMuebleRodajas=$infomueble->chkMuebleRodajas;
      
      $chkMueblePlegable=$infomueble->chkMueblePlegable;
      $chkMuebleCajones=$infomueble->chkMuebleCajones;
      $chkMuebleGavetas=$infomueble->chkMuebleGavetas;
      $chkMuebleEntrepano=$infomueble->chkMuebleEntrepano;
     
     	
     
     $d=date(d);
     $m=date(m);
     $a=date(Y);
     $FechaModificacion ="$a/$m/$d";
     
     $F_Factura = split("/",$dFechaFactura);
     $FFactura = "$F_Factura[2]/$F_Factura[0]/$F_Factura[1]";
     $F_Registro = split("/", $dFechaRegistro);
     $FRegistro = "$F_Registro[2]/$F_Registro[0]/$F_Registro[1]";
     /*UPDATE `be_saci`.`sa_mueble` SET `vCaracteristicas` = '11q', `vNumSerie` = '11q', `vMarca` = '11q', `vModelo` = '111q', `vTipo` = '11q', `eNoCajon` = '111q', `eNoGaveta` = '11q', `eNoEntrepanio` = '11q', `bPedestal` = 'Si', `bFija` = 'Si', `bGiratoria` = 'Si', `bRodajas` = 'Si', `bPlegable` = 'Si' WHERE `sa_mueble`.`Id` = 56597;*/
     
     /*$sqlMueble = "UPDATE sa_mueble SET vCaracteristicas = '$vCaracteristica', vNumSerie = '$txtMuebleModeloSerie', vMarca = '$txtMarcaMueble', vModelo = '$txtMuebleModelo', vTipo = '$txtMuebleTipo', eNoCajon = '$chkMuebleCajones', eNoGaveta = '$chkMuebleGavetas', eNoEntrepanio = '$chkMuebleEntrepano', bPedestal = '$chkMueblePedestal', bFija = '$chkMuebleFija', bGiratoria = '$chkMuebleGiratoria', bRodajas = '$chkMuebleRodajas', bPlegable = '$chkMueblePlegable' WHERE Id_CABMS='$Id_CABMS';";*/
     $sqlInventario="INSERT INTO sa_inventario values('0','$Id_CABMS','$txtIdTipoBien','0','0','$vNoFactura','$mCosto','$vNumPedido','$FFactura','$CboEstado','$FRegistro','$FechaModificacion','0','0','0','$CveUsuario')";
     
     $objInv = new poolConnection();
     $con=$objInv->Conexion();
     $objInv->BaseDatos($con);
     $R=$objInv->Query($sqlInventario);
     $used_id = mysqli_insert_id($con);
     $objInv->Cerrar($con,$R);
     
     $sqlInventarioMov="INSERT INTO sa_movinventario values('0','$Id_CABMS', '$used_id','$txtResguardante1', '$txtCBTiposMovimiento', '$txtUIAdministrativa', '$txtResguardante2', '$txtResguardante3','0','$FRegistro','$FechaModificacion','$TBNoDocumento','$CboEstado')";
     $sqlMueble ="INSERT INTO sa_mueble values('0','$Id_CABMS','$vCaracteristica','$used_id','$txtMuebleModeloSerie','$txtMarcaMueble','$txtMuebleModelo','$txtMuebleTipo','$chkMuebleCajones','$chkMuebleGavetas','$chkMuebleEntrepano','$chkMueblePedestal','$chkMuebleFija','$chkMuebleGiratoria','$chkMuebleRodajas','$chkMueblePlegable')";
     
     $objInvM = new poolConnection();
     $con=$objInvM->Conexion();
     $objInvM->BaseDatos($con);
     $R=$objInvM->Query($sqlInventarioMov);
     $objInvM->Cerrar($con,$R);
     
     $obj = new poolConnection();
     $con=$obj->Conexion();
     $obj->BaseDatos($con);
     $R=$obj->Query($sqlMueble);
     $obj->Cerrar($con,$R);
     
     return "$sqlInventario $sqlInventarioMov $sqlMueble";
     
 }
 /* Para 2000 */
 /* Agregar */
  public function buscar_Cambs_2000($info)
  {
      $sqlWhere = "";
      $cve=$info->Folio;
      $nombre=$info->Descripcion;
      $texto=$info->Patron;
      $sql="Select Id_CABMS,vDescripcionCABMS from sa_cabms where ";
 	if($cve == "Si")
 	 {
 	 	$sqlWhere .=" (Id_CABMS like '%$texto%') or ";
 	 }
 	if($nombre == "Si")
 	{
 		$sqlWhere .= "(vDescripcionCABMS like '%$texto%') or ";
 	} 	 

     $sqlWhere = substr($sqlWhere, 0, -3);
     $sql .= $sqlWhere;
     $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $i=0;
                          $RSet=$objBuscar->Query($con,$sql);
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"Image1RG2000$i\" width=\"120\" height=\"45\" border=\"0\" id=\"Image1RG2000$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('Image1RG2000$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_Cambs2000('$fila[Id_CABMS]','$fila[vDescripcionCABMS]');\">&nbsp;</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
                                                    
                                               </tr>";
                          };
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Selecionar', name : 'Seleccionar', width :120, sortable :false, align: 'center'},
                                                            {display: 'Id Empleado', name : 'Id Empleado', width :90, sortable :false, align: 'center'},
                                                            {display: 'Empleado', name : 'Nombre', width :250, sortable :false, align: 'center'},
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 630,
                                            height: 200
                                            }

                                            );</script></form>";
                          return $FliexGrid;
  }
  public function buscar_Inv_2000($info)
  {
      $sqlWhere = "";
      $cve=$info->Folio;
      $nombre=$info->Descripcion;
      $texto=$info->Patron;
      $sql="Select sa_cabms.Id_CABMS,sa_cabms.vDescripcionCABMS,sa_inventario.Id_ConsecutivoInv from sa_cabms,sa_inventario where (sa_cabms.Id_CABMS=sa_inventario.Id_CABMS) and ";
 	if($cve == "Si")
 	 {
 	 	$sqlWhere .=" sa_cabms.Id_CABMS like '%$texto%' or ";
 	 }
 	if($nombre == "Si")
 	{
 		$sqlWhere .= "sa_cabms.vDescripcionCABMS like '%$texto%' or ";
 	} 	 

     $sqlWhere = substr($sqlWhere, 0, -3);
     $sql .= '('. $sqlWhere .') order by sa_inventario.Id_ConsecutivoInv asc';
     $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $RSet=$objBuscar->Query($sql);
                          $i=0;
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"Image1RG2000$i\" width=\"120\" height=\"45\" border=\"0\" id=\"Image1RG2000$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('Image1RG2000$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_Inv2000('$fila[Id_ConsecutivoInv]');\">&nbsp;</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ConsecutivoInv]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
                                                    
                                               </tr>";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Selecionar', name : 'Seleccionar', width :120, sortable :false, align: 'center'},
                                                            {display: 'No. Inv.', name : 'No. Inv.', width :90, sortable :false, align: 'center'},
                                                            {display: 'Cambs', name : 'Cambs', width :90, sortable :false, align: 'center'},
                                                            {display: 'Cambs', name : 'Cambs', width :250, sortable :false, align: 'center'},
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 630,
                                            height: 200
                                            }

                                            );</script></form>";
                          return $FliexGrid;
  }
  function datos_inv_2000($id)
  {
      $arr = array();
      $sqlinv = "Select sa_inventario.Id_ConsecutivoInv,sa_inventario.Id_CABMS,sa_inventario.Id_TipoBien,sa_inventario.vNoFactura,sa_inventario.mCosto,sa_inventario.vNumPedido,sa_inventario.dFechaFactura,sa_inventario.Id_EdoBien,
                 sa_movinventario.Resguardante1,sa_movinventario.Resguardante2,sa_movinventario.Resguardante3,sa_movinventario.vDoctoOficial,sa_movinventario.Id_Unidad
                from sa_inventario,sa_movinventario where sa_inventario.Id_ConsecutivoInv='$id' and sa_inventario.Id_ConsecutivoInv=sa_movinventario.Id_ConsecutivoInv";
      $objData = new poolConnection();
      $con=$objData->Conexion();
      $objData->BaseDatos($con);
      $RSet=$objData->Query($con,$sqlinv);
      while($fila=  mysqli_fetch_array($RSet))
            {
                $AF = split("-",$fila[dFechaFactura]);
                $dFechaFactura="$AF[2]/$AF[1]/$AF[0]";
                $arr[] = array('Id_ConsecutivoInv' => $fila[Id_ConsecutivoInv], 
                                'Id_CABMS' => $fila[Id_CABMS],
                                'Id_TipoBien' => $fila[Id_TipoBien],
                                'vNoFactura' =>$fila[vNoFactura],
                                'mCosto' =>$fila[mCosto],
                                'vNumPedido' =>$fila[vNumPedido],
                                'dFechaFactura' =>$dFechaFactura,
                                'Id_EdoBien' =>$fila[Id_EdoBien],
                                'Resguardante1' =>$fila[Resguardante1],
                                'Resguardante2' =>$fila[Resguardante2],
                                'Resguardante3' =>$fila[Resguardante3],
                                'vDoctoOficial' =>$fila[vDoctoOficial],
                                'Id_Unidad' =>$fila[Id_Unidad],
                    );
            }
      $objData->Cerrar($con,$RSet);
      return json_encode($arr);
  }
  function dato_inv_DResguardo($info)
  {
      $Resguardante1=$info->Resguardante1;
      $Resguardante2=$info->Resguardante2;
      $Resguardante3=$info->Resguardante3;
      $Id_Unidad=$info->Id_Unidad;
      $ArrDatos = array();
      $sqlUA="Select vDescripcion from sa_unidadadmva where Id_Unidad='$Id_Unidad'";
      $objData = new poolConnection();
      $con=$objData->Conexion();
      $objData->BaseDatos($con);
      $RSet=$objData->Query($sqlUA);
      while($fila= mysqli_fetch_array($RSet))
            {
                 $UAvDescripcion = $fila[vDescripcion];
            }
      $objData->Cerrar($con,$RSet);
      $sqlR1="Select vNombre from sa_empleado where Id_NumEmpleado='$Resguardante1'";
      $sqlR2="Select vNombre from sa_empleado where Id_NumEmpleado='$Resguardante2'";
      $sqlR3="Select vNombre from sa_empleado where Id_NumEmpleado='$Resguardante3'";
      
      $objData = new poolConnection();
      $con=$objData->Conexion();
      $objData->BaseDatos($con);
      $RSet=$objData->Query($con,$sqlR1);
      while($fila=  mysqli_fetch_array($RSet))
            {
                 $ResguardanteNom1 = $fila[vNombre];
            }
      $objData->Cerrar($con,$RSet);
      
      $objData = new poolConnection();
      $con=$objData->Conexion();
      $objData->BaseDatos($con);
      $RSet=$objData->Query($con,$sqlR2);
      while($fila=  mysqli_fetch_array($RSet))
            {
                 $ResguardanteNom2 = $fila[vNombre];
            }
      $objData->Cerrar($con,$RSet);
      
      $objData = new poolConnection();
      $con=$objData->Conexion();
      $objData->BaseDatos($con);
      $RSet=$objData->Query($con,$sqlR3);
      while($fila=  mysqli_fetch_array($RSet))
            {
                 $ResguardanteNom3 = $fila[vNombre];
            }
      $objData->Cerrar($con,$RSet);
           
      $ArrDatos[] = array('Resguardante1' => $ResguardanteNom1, 
                          'Resguardante2' => $ResguardanteNom2,
                          'Resguardante3' => $ResguardanteNom3,
                          'UAvDescripcion' => $UAvDescripcion,   
                    ); 
      return json_encode($ArrDatos); 
            
  }
  function dato_inv_DCaracteristicas($info)
  {
     
      $Id_TipoBien=$info->Id_TipoBien;
      $IdCambs = $info->IdCambs;
      $Id_ConsecutivoInv = $info->Id_ConsecutivoInv;
      switch ($Id_TipoBien) {
          case '1':
              
	     	    /*echo $objEntrada->bien_mueble_frm($_POST[IdCambs]);*/
                        $objData = new poolConnection();
                        $con=$objData->Conexion();
                        $objData->BaseDatos($con);
                        $sql="SELECT vMarca,vTipo,vModelo,vNumSerie,eNoCajon,eNoGaveta,eNoEntrepanio,bPedestal,bFija,bGiratoria,bRodajas,bPlegable,vCaracteristicas FROM sa_mueble Where Id_CABMS='$IdCambs'";
                        $RSet=$objData->Query($con,$sql);
                        while($fila=  mysql_fetch_array($RSet))
                              {
                                    $vMarca=$fila[vMarca];
                                    $vTipo=$fila[vTipo];
                                    $vModelo=$fila[vModelo];
                                    $vNumSerie=$fila[vNumSerie];
                                    $eNoCajon=$fila[eNoCajon];
                                    $eNoGaveta=$fila[eNoGaveta];
                                    $eNoEntrepanio=$fila[eNoEntrepanio];
                                    $bPedestal=$fila[bPedestal];
                                    $bFija=$fila[bFija];
                                    $bGiratoria=$fila[bGiratoria];
                                    $bRodajas=$fila[bRodajas];
                                    $bPlegable=$fila[bPlegable];
                                    $vCaracteristicas=$fila[vCaracteristicas];
                              }
                        $objData->Cerrar($con,$RSet);
                        $chkedbPedestal="";
                        $chkedbFija="";
                        $chkedbGiratoria="";
                        $chkedbRodajas="";
                        $chkedbPlegable="";
                        if($bPedestal=="Si")
                        {
                           $chkedbPedestal="checked"; 
                        }
                        if($bFija=="Si")
                        {
                           $chkedbFija="checked"; 
                        }
                        if($bGiratoria=="Si")
                        {
                          $chkedbGiratoria="checked";  
                        }
                        if($bRodajas=="Si")
                        {
                           $chkedbRodajas="checked"; 
                        }
                        if($bPlegable=="Si")
                        {
                            $chkedbPlegable="checked";
                        }
                    $frm ="<script>
                                $(\"#TBCaracteristicas\").val('$vCaracteristicas');
                                $(\"#txtIdTipoBien\").val('1');
                            </script>
                            <table>
                                   <tr>
                                     <td><div class=\"txt_titulos_bold\">Marca</div></td>
                                     <td><input type='text' id='txtMarcaMueble' name='txtMarcaMueble' value='$vMarca' class=\"boxes_form400px\" /></td>
                                </tr>
                                   <tr>
                                     <td><div class=\"txt_titulos_bold\">Tipo</div></td>
                                     <td><input type='text' id='txtMuebleTipo' name='txtTipoMueble' value='$vTipo' class=\"boxes_form200px\"/></td> 
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\">Modelo</div></td>
                                   <td><input type='text' id='txtMuebleModelo' name='txtModeloMueble' value='$vModelo' class=\"boxes_form200px\" /></td>                       
                               </tr>
                               <tr>
                                   <td><div class=\"txt_titulos_bold\">Serie</div></td>
                                   <td><input type='text' id='txtMuebleModeloSerie' name='txtMuebleModeloSerie' value='$vNumSerie' class=\"boxes_form200px\" /></td>                       
                               </tr>
                                                   <tr>
                                                      <td>
                                                              <table>
                                                                    <tr>
                                                                        <td><div class=\"txt_titulos_bold\">Pedestal</div></td>
                                                                        <td><input type=\"checkbox\" id=\"chkMueblePedestal\" name=\"chkMueblePedestal\" value=\"Si\" $chkedbPedestal/></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><div class=\"txt_titulos_bold\">Fija</div></td>
                                                                        <td><input type=\"checkbox\" id=\"chkMuebleFija\" name=\"chkMuebleFija\" value=\"Si\" $chkedbFija/></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><div class=\"txt_titulos_bold\">Giratoria</div></td>
                                                                        <td><input type=\"checkbox\" id=\"chkMuebleGiratoria\" name=\"chkMuebleGiratoria\" value=\"Si\" $chkedbGiratoria/></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><div class=\"txt_titulos_bold\">Rodajas</div></td>
                                                                        <td><input type=\"checkbox\" id=\"chkMuebleRodajas\" name=\"chkMuebleRodajas\" value=\"Si\" $chkedbRodajas/></td>
                                                                    </tr>
                                                                    <tr>
                                                                          <td><div class=\"txt_titulos_bold\">Plegable</div></td>
                                                                          <td><input type=\"checkbox\" id=\"chkMueblePlegable\" name=\"chkMueblePlegable\" value=\"Si\" $chkedbPlegable/></td>
                                                                     </tr>
                                                            </table>
                                                      </td>
                                                      <td>
                                                           <table>

                                                                 <tr>
                                                                     <td><div class=\"txt_titulos_bold\">Cajones</div></td>
                                                                     <td><input type=\"text\" id=\"chkMuebleCajones\" name=\"chkMuebleCajones\" class=\"boxes_form100px\" value=\"$eNoCajon\"/></td>
                                                                 </tr>
                                                                 <tr>
                                                                     <td><div class=\"txt_titulos_bold\">Gavetas</div></td>
                                                                     <td><input type=\"text\" id=\"chkMuebleGavetas\" name=\"chkMuebleGavetas\" class=\"boxes_form100px\" value=\"$eNoGaveta\"/></td>
                                                                 </tr>
                                                                 <tr>
                                                                     <td><div class=\"txt_titulos_bold\">Entrepa&ntilde;o</div></td>
                                                                     <td><input type=\"text\" id=\"chkMuebleEntrepano\" name=\"chkMuebleEntrepano\" class=\"boxes_form100px\" value=\"$eNoEntrepanio\"/></td>
                                                                 </tr>
                                                             </table>
                                                      </td>
                                                   </tr>
                           </table>";
                    
	    break;
	  case '2':
	     	    /*echo $objEntrada->bien_informatico_frm($_POST[IdCambs]);*/
                    $objData = new poolConnection();
                        $con=$objData->Conexion();
                        $objData->BaseDatos($con);
                        $sql="SELECT
                                vNumSerie,
                                vMarca,
                                vModelo,
                                vDiscoDuro,
                                vRAM,
                                vProcesador,
                                ePaginasMinuto,
                                vFuentePoder,
                                vCaracteristicas,
                                vMonitorSerie,
                                vMonitorMarca,
                                vTecladoSerie,
                                vTecladoMarca,
                                vMouseSerie,
                                vMouseMarca
                                 FROM sa_informatico Where Id_CABMS='$IdCambs'";
                        $RSet=$objData->Query($con,$sql);
                        while($fila=  mysqli_fetch_array($RSet))
                              {
                                    $vNumSerie=$fila[vNumSerie];
                                    $vMarca=$fila[vMarca];
                                    $vModelo=$fila[vModelo];
                                    $vDiscoDuro=$fila[vRAM];
                                    $vRAM=$fila[vRAM];
                                    $vProcesador=$fila[vProcesador];
                                    $ePaginasMinuto=$fila[ePaginasMinuto];
                                    $vFuentePoder=$fila[vFuentePoder];
                                    $vCaracteristicas=$fila[vCaracteristicas];
                                    $vMonitorSerie=$fila[vMonitorSerie];
                                    $vMonitorMarca=$fila[vMonitorMarca];
                                    $vTecladoSerie=$fila[vTecladoSerie];
                                    $vTecladoMarca=$fila[vTecladoMarca];
                                    $vMouseSerie=$fila[vMouseSerie];
                                    $vMouseMarca=$fila[vMouseMarca];
                              }
                        $objData->Cerrar($con,$RSet);
                    $frm ="<script>
                                $(\"#TBCaracteristicas\").val('$vCaracteristicas');
                                $(\"#txtIdTipoBien\").val('2');
                            </script>
			<table>
                            <tr>
                                <td>
                                        <table>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Serie:</div></td>
                                                <td><input type='text' id='txtSerieInfomatico' name='txtSerieInfomatico' class=\"boxes_form200px\" value=\"$vNumSerie\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Marca:</div></td>
                                                <td><input type='text' id='txtMarcaInfomatico' name='txtMarcaInfomatico' class=\"boxes_form200px\" value=\"$vMarca\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Modelo:</div></td>
                                                <td><input type='text' id='txtModeloInfomatico' name='txtModeloInfomatico' class=\"boxes_form200px\" value=\"$vModelo\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Disco Duro:</div></td>
                                                <td><input type='text' id='txtDicosDuroInfomatico' name='txtDiscoDuroInfomatico' class=\"boxes_form200px\" value=\"$vDiscoDuro\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Ram:</div></td>
                                                <td><input type='text' id='txtRamInfomatico' name='txtRamInfomatico' class=\"boxes_form200px\" value=\"$vRAM\"/></td>
                                            </tr>
                                        </table>
                                </td>
                                <td>
                                        <table>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Procesador:</div></td>
                                                <td><input type='text' id='txtProcesadorInfomatico' name='txtProsesadorInfomatico' class=\"boxes_form200px\" value=\"$vProcesador\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Pag.Minuto:</div></td>
                                                <td><input type='text' id='txtPaginasMinutoInfomatico' name='txtPaginasMinutoInfomatico' class=\"boxes_form200px\" value=\"$ePaginasMinuto\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">FuentePoder:</div></td>
                                                <td><input type='text' id='txtFuentePoderInfomatico' name='txtFuentePoderInfomatico' class=\"boxes_form200px\" value=\"$vFuentePoder\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Monitor S/N:</div></td>
                                                <td><input type='text' id='txtMonitorSerieInfomatico' name='txtMonitorSerieInfomatico' class=\"boxes_form200px\" value=\"$vMonitorSerie\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Monitor Marca:</div></td>
                                                <td><input type='text' id='txtMonitorMarcaInfomatico' name='txtMonitorMarcaInfomatico' class=\"boxes_form200px\" value=\"$vMonitorMarca\"/></td>
                                            </tr>
                                        </table>
                                </td>
                                <td>
                                        <table>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Teclado S/N :</div></td>
                                                <td><input type='text' id='txtTecladoSerialInfomatico' name='txtTecladoSerialInfomatico' class=\"boxes_form200px\" value=\"$vTecladoSerie\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Teclado Marca :</div></td>
                                                <td><input type='text' id='txtTecladoMarcaInfomatico' name='txtTecladoMarcaInfomatico' class=\"boxes_form200px\" value=\"$vTecladoMarca\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Mouse Serie :</div></td>
                                                <td><input type='text' id='txtMouseSerieInfomatico' name='txtMouseSerieInfomatico' class=\"boxes_form200px\" value=\"$vMouseSerie\"/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">Mouse Marca :</div></td>
                                                <td><input type='text' id='txtMouseMarcaInfomatico' name='txtMouseMarcaInfomatico' class=\"boxes_form200px\" value=\"$vMouseMarca\"/></td>
                                            </tr>
                                        </table>
                                </td>
                            </tr>
                         </table>";
	     break;
	  case '3':
                   /* echo $objEntrada->bien_vehiculo_frm();*/
                    $objData = new poolConnection();
                        $con=$objData->Conexion();
                        $objData->BaseDatos($con);
                        $sql="SELECT
                                vMarca,
                                vTipo,
                                vModelo,
                                vNumSerie,
                                vNumMotor,
                                vPlacas,
                                vRFV,
                                cTipoTransmision,
                                cUso,
                                vCaracteristicas,
                                cTipoDireccion
                                 FROM sa_vehiculo Where Id_CABMS='$IdCambs'";
                        $RSet=$objData->Query($con,$sql);
                        while($fila=  mysqli_fetch_array($RSet))
                              {
                                    $vMarca=$fila[vMarca];
                                    $vTipo=$fila[vTipo];
                                    $vModelo=$fila[vModelo];
                                    $vNumSerie=$fila[vNumSerie];
                                    $vNumMotor=$fila[vNumMotor];
                                    $vPlacas=$fila[vPlacas];
                                    $cTipoTransmision=$fila[cTipoTransmision];
                                    $vCaracteristicas=$fila[vCaracteristicas];
                                    $cTipoDireccion=$fila[cTipoDireccion];
                              }
                        $objData->Cerrar($con,$RSet);
                        $chkVehiculoManual="";
                        $chkVehiculoHidraulica="";
                        $chkVehiculoAmbas="";
                        switch ($cTipoTransmision) {
                            case 'M':
                                        $chkVehiculoManual="checked";
                                break;
                            case 'H':
                                        $chkVehiculoHidraulica="checked";
                                break;
                            case 'A':
                                        $chkVehiculoAmbas="checked";
                                break;
                            
                        }
                        $chkVehiculoDireccionStandar="";
                        $chkVehiculoDireccionAutomatica="";
                        $chkVehiculoDireccionAmbas="";
                        switch ($cTipoDireccion)
                        {
                            case "S":
                                        $chkVehiculoDireccionStandar="checked";
                                break;
                            case "A":
                                        $chkVehiculoDireccionAutomatica="checked";
                                break;
                            case "AM":
                                        $chkVehiculoDireccionAmbas="checked";
                                break;
                            
                        }
                        $frm ="<script>
                                $(\"#TBCaracteristicas\").val('$vCaracteristicas');
                                $(\"#txtIdTipoBien\").val('3');
                            </script>
                            <table>
                                  <tr>
                                        <td>
                                                <table>
                                                      <tr>
                                                          <td><div class=\"txt_titulos_bold\">Marca</div></td></td>
                                                          <td><input type='text' id='txtMarcaVehiculo' name='txtMarcaVehiculo' class=\"boxes_form200px\" value=\"$vMarca\"/></td>
                                                      </tr>
                                                      <tr>
                                                          <td><div class=\"txt_titulos_bold\">Tipo</div></td>
                                                          <td><input type='text' id='txtTipoVehiculo' name='txtTipoVehiculo' class=\"boxes_form200px\" value=\"$vTipo\"/></td>
                                                      </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Modelo</div></td>
                                                        <td><input type='text' id='txtModeloVehiculo' name='txtModeloVehiculo' class=\"boxes_form200px\"  value=\"$vModelo\"/></td>
                                                    </tr>
                                                     <tr>
                                                          <td><div class=\"txt_titulos_bold\">Num. Serie</div></td>
                                                          <td><input type='text' id='txtSNVehiculo' name='txtSNVehiculo' class=\"boxes_form200px\" value=\"$vNumSerie\"/></td>
                                                      </tr>
                                                     <tr>
                                                          <td><div class=\"txt_titulos_bold\">Num. Motor</div></td>
                                                          <td><input type='text' id='txtSNMotorVehiculo' name='txtSNMotorVehiculo' class=\"boxes_form200px\" value=\"$vNumMotor\"/></td>
                                                      </tr>
                                                      <tr>
                                                          <td><div class=\"txt_titulos_bold\">Placas</div></td>
                                                          <td><input type='text' id='txtPlacasVehiculo' name='txtPlacasVehiculo' class=\"boxes_form200px\" value=\"$vPlacas\"/></td>
                                                      </tr>
                                                 </table>
                                         </td>
                                         <td>
                                                <table>
                                                        <tr>
                                                            <td><div class=\"txt_titulos_bold\">Tipo Trasmicion</div></td>
                                                        </tr>
                                                </table>
                                                <table>
                                                        <tr>
                                                             <td>
                                                                                <table>
                                                                                  <tr>
                                                                                      <td><div class=\"txt_titulos_bold\">Manual</div></td>
                                                                                      <td><input type=\"checkbox\" id=\"chkVehiculoManual\" name=\"chkVehiculoManual\" value=\"M\" $chkVehiculoManual/></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td><div class=\"txt_titulos_bold\">Hidraulica</div></td>
                                                                                      <td><input type=\"checkbox\" id=\"chkVehiculoHidraulica\" name=\"chkVehiculoHidraulica\" value=\"H\" $chkVehiculoHidraulica/></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td><div class=\"txt_titulos_bold\">Ambas</div></td>
                                                                                      <td><input type=\"checkbox\" id=\"chkVehiculoAmbas\" name=\"chkVehiculoAmbas\" value=\"A\" $chkVehiculoAmbas/></td>
                                                                                  </tr>
                                                                         </table>

                                                             </td>
                                                        </tr>
                                                </table>
                                                <table>
                                                     <td><div class=\"txt_titulos_bold\">Tipo Direccion</div></td>
                                                </table>
                                                <table>
                                                        <tr>

                                                           <td>
                                                                           <table>
                                                                                  <tr>
                                                                                      <td><div class=\"txt_titulos_bold\">Standar</div></td>
                                                                                      <td><input type=\"checkbox\" id=\"chkVehiculoDireccionStandar\" name=\"chkVehiculoDireccionStandar\" value=\"S\" $chkVehiculoDireccionStandar/></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td><div class=\"txt_titulos_bold\">Automatica</div></td>
                                                                                      <td><input type=\"checkbox\" id=\"chkVehiculoDireccionAutomatica\" name=\"chkVehiculoDireccionAutomatica\" value=\"A\" $chkVehiculoDireccionAutomatica/></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td><div class=\"txt_titulos_bold\">Ambas</div></td>
                                                                                      <td><input type=\"checkbox\" id=\"chkVehiculoDireccionAmbas\" name=\"chkVehiculoDireccionAmbas\" value=\"AM\" $chkVehiculoDireccionAmbas/></td>
                                                                                  </tr>
                                                                         </table> 
                                                           </td>
                                                  </table>
                                            </td>
                                          </tr>
                                        </table>";
	     	break;
	  case '4':
	     	     /*echo $objEntrada->bien_acervo_frm();*/
                     $objData = new poolConnection();
                        $con=$objData->Conexion();
                        $objData->BaseDatos($con);
                        $sql="SELECT
                                vCaracteristicas,
                                vUbicacion,
                                vTitulo,
                                vAutor
                                 FROM sa_acervo Where Id_CABMS='$IdCambs'";
                        $RSet=$objData->Query($sql);
                        while($fila=  mysqli_fetch_array($RSet))
                              {
                                    $vCaracteristicas=$fila[vCaracteristicas];
                                    $vUbicacion=$fila[vUbicacion];
                                    $vTitulo=$fila[vTitulo];
                                    $vAutor=$fila[vAutor];
                              }
                        $objData->Cerrar($con,$RSet);
                     $frm = "
                    <script>
                         $(\"#TBCaracteristicas\").val('$vCaracteristicas');
                         $(\"#txtIdTipoBien\").val('4');
                    </script>
  	           <table>
  	                 <tr>
  	                     <td><div class=\"txt_titulos_bold\">Autor</div></td>
  	                     <td><input type=\"text\" name=\"txtAutor\" id=\"txtAutor\"  class=\"boxes_form400px\"/ value=\"$vAutor\"></td>
  	                 </tr>
  	                 <tr>
  	                     <td><div class=\"txt_titulos_bold\">Titulo</div></td>
  	                     <td><input type=\"text\" name=\"txtTitulo\" id=\"txtTitulo\" class=\"boxes_form400px\" value=\"$vTitulo\"/></td>
  	                 </tr>
  	                 <tr>
  	                     <td><div class=\"txt_titulos_bold\">Ubicacion</div></td>
  	                     <td><input type=\"text\" name=\"txtUbicacion\" id=\"txtUbicacion\" class=\"boxes_form400px\" value=\"$vUbicacion\"/></td>
  	                 </tr>
  	           </table>
  	           <br>
  	          ";
	     	break;	
      }
      return $frm;
  }
  
 /* Consultar */

 public function frm_consultar()
  {	
     
        $frmCampo = "<table>
                                        <tr>
                                            <td><div class=\"txt_titulos_bold\">No.Inven.:</div></td>
                                            <td><input type='text' id='TBIDPedidoSInv' name='TBIDPedidoSInv' class=\"boxes_form100px\"/></td>
                                            <td><img src=\"../../interfaz_modulos/botones/buscar.jpg\" name=\"BtnBuscarInv\" width=\"120\" height=\"45\" border=\"0\" id=\"BtnBuscarInv\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('BtnBuscarInv','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_inv_consulta();\"/></td>
                                        </tr>
                               </table>";
    
               
  	$CboBien = "XXXX";


      $frmDetalles = "";
  	/*Poner cambs e iventario */
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
                                                            <textarea id='TBCaracteristicas' name='TBCaracteristicas' class='boxes_txtarea'></textarea>
                                                        </td>
                                                    </tr>
                                           </table>
                                           $frmCampo
                                   <table>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Status:</div></td>
                                                        <td>
                                                            <div id=\"DivEstadoBien\" class=\"txt_titulos_bold\">$CboBien</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Pedido:</div></td>
                                                        <td><input type='text' id='TBIDPedidoArticulo' name='txtPedido' class=\"boxes_form100px\"/ value=\"$vNumPedido\"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Costo:</div></td>
                                                        <td><input type='text' id='TBPrecioUnitario' name='txtCosto' class=\"boxes_form100px\" value=\"$mCosto\"/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">No. Documento:</div></td>
                                                        <td>
                                                            <input type='text' id='TBNoDocumento' name='TBNoDocumento' class=\"boxes_form100px\" value=\"\"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Factura:</div></td>
                                                        <td><input type='text' id='TBFactura' name='TBFactura' class=\"boxes_form100px\" value=\"$vNoFactura\"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Fecha Factura:</div></td>
                                                        <td><input type='text' id='TBFechaFactura' name='TBFechaFactura' value=\"$Fecha[2]/$Fecha[1]/$Fecha[0]\" class=\"boxes_form100px\"/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
  					</div>
  					<div id=\"tabs-2\">
  					          	<div id=\"DivfrmBienes\"></div>	

  					</div>
  					<div id=\"tabs-3\">
  							<table>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">&Aacute;rea De Adquisicion:</div></td>
                                                <td><input type='text' id='txtIdAreaAdquisicion' name='txtIdAreaAdquisicion' class=\"boxes_form200px\"  readonly/></td>
                                                <td></td>
                                                <td><input type='text' id='txtDesAreaAdquisicion' name='txtDesAreaAdquisicion' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">1er Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante1' name='TBRFCResguardante1' class=\"boxes_form200px\"  readonly/></td>
                                                <td></td>
                                                <td><input type='text' id='TBNombreResguardante1' name='TBNombreResguardante1' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">2do Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante2' name='TBRFCResguardante2' class=\"boxes_form200px\"  readonly/></td>
                                                <td></td>
                                                <td><input type='text' id='TBNombreResguardante2' name='TBNombreResguardante2' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">3er Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante3' name='TBRFCResguardante3' class=\"boxes_form200px\"  readonly/></td>
                                                <td></td>
                                                <td><input type='text' id='TBNombreResguardante3' name='TBNombreResguardante3' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                        </table>
  					</div>
  			</div>
  	</div>
        <br>
       
  	       <script>
                   $(function() {
                                    $(\"#tabs\").tabs();
                                    $(\"#tabs2\").tabs();
                                    $.datepicker.setDefaults($.datepicker.regional[\"es\"]);
                                    $(\"#TBFechaFactura\").datepicker();
                             });
  	      </script>";
  	return $frmDetalles;
  	
  }
 public function buscar_consulta_2000($info)
 {
     $sqlWhere = "";
       $cve=$info->Folio;
      $nombre=$info->Descripcion;
      $texto=$info->Patron;
      $sql="Select sa_cabms.Id_CABMS,sa_cabms.vDescripcionCABMS,sa_inventario.Id_ConsecutivoInv from sa_cabms,sa_inventario where (sa_cabms.Id_CABMS=sa_inventario.Id_CABMS) and ";
 	if($cve == "Si")
 	 {
 	 	$sqlWhere .=" sa_cabms.Id_CABMS like '%$texto%' or ";
 	 }
 	if($nombre == "Si")
 	{
 		$sqlWhere .= "sa_cabms.vDescripcionCABMS like '%$texto%' or ";
 	} 	 

     $sqlWhere = substr($sqlWhere, 0, -3);
     $sql .= '('. $sqlWhere .') order by sa_inventario.Id_ConsecutivoInv asc';
     $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $RSet=$objBuscar->Query($con,$sql);
                          $i=0;
                          while($fila =  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"Image1RG2000$i\" width=\"120\" height=\"45\" border=\"0\" id=\"Image1RG2000$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('Image1RG2000$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_Inv2000_Modificar('$fila[Id_ConsecutivoInv]');\">&nbsp;</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ConsecutivoInv]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
                                                    
                                               </tr>";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Selecionar', name : 'Seleccionar', width :120, sortable :false, align: 'center'},
                                                            {display: 'No. Inv.', name : 'No. Inv.', width :90, sortable :false, align: 'center'},
                                                            {display: 'Cambs', name : 'Cambs', width :90, sortable :false, align: 'center'},
                                                            {display: 'Cambs', name : 'Cambs', width :250, sortable :false, align: 'center'},
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 630,
                                            height: 200
                                            }

                                            );</script></form>";
                          return $FliexGrid;
 }
 function EdoBien_2000($id)
 {
    $objBuscar = new poolConnection();
    $con=$objBuscar->Conexion();
    $objBuscar->BaseDatos($con);
    $sql="Select vDescripcion from sa_estadobien where Id_EdoBien='$id'";
    $RSet=$objBuscar->Query($con,$sql);
    while($fila= mysqli_fetch_array($RSet))
    {
        $vDescripcion=$fila[vDescripcion];
    }
    return $vDescripcion;
 }
 function datos_inv_2000_consultar($id)
  {
      $arr = array();
      $sqlinv = "Select sa_inventario.Id_ConsecutivoInv,sa_inventario.Id_CABMS,sa_inventario.Id_TipoBien,sa_inventario.vNoFactura,sa_inventario.mCosto,sa_inventario.vNumPedido,sa_inventario.dFechaFactura,sa_inventario.dFechaRegistro,sa_inventario.Id_EdoBien,
                 sa_movinventario.Resguardante1,sa_movinventario.Resguardante2,sa_movinventario.Resguardante3,sa_movinventario.vDoctoOficial,sa_movinventario.Id_Unidad
                from sa_inventario,sa_movinventario where sa_inventario.Id_ConsecutivoInv='$id' and sa_inventario.Id_ConsecutivoInv=sa_movinventario.Id_ConsecutivoInv";
      
      //Tipo de movimiento
      $obj = new poolConnection();
      $con = $obj->Conexion();
      $obj->BaseDatos($con);
      $sqlTipoMov = "SELECT Id_TipoMovimiento FROM sa_movinventario Where Id_ConsecutivoInv='$id' order by dFechaMovRegistro asc";
      $RSet=$obj->Query($con,$sqlTipoMov);
      while($fila=  mysqli_fetch_array($RSet))
            {
                $Id_TipoMovimiento = $fila[Id_TipoMovimiento];
             }
      $obj->Cerrar($con,$RSet);
      
      $objData = new poolConnection();
      $con=$objData->Conexion();
      $objData->BaseDatos($con);
      $RSet=$objData->Query($RSet,$sqlinv);
      while($fila=  mysqli_fetch_array($RSet))
            {
                $AF = split("-",$fila[dFechaFactura]);
                $AR = split("-",$fila[dFechaRegistro]);
                $dFechaRegistro ="$AR[2]/$AF[1]/$AF[0]";
                $dFechaFactura = "$AF[2]/$AF[1]/$AF[0]";
                $Id_EdoBien=$this->EdoBien_2000($fila[Id_EdoBien]);
                $arr[] = array('Id_ConsecutivoInv' => $fila[Id_ConsecutivoInv], 
                                'Id_CABMS' => $fila[Id_CABMS],
                                'Id_TipoBien' => $fila[Id_TipoBien],
                                'vNoFactura' =>$fila[vNoFactura],
                                'mCosto' =>$fila[mCosto],
                                'vNumPedido' =>$fila[vNumPedido],
                                'dFechaFactura' =>$dFechaFactura,
                                'Id_EdoBien' =>$Id_EdoBien,
                                'Resguardante1' =>$fila[Resguardante1],
                                'Resguardante2' =>$fila[Resguardante2],
                                'Resguardante3' =>$fila[Resguardante3],
                                'vDoctoOficial' =>$fila[vDoctoOficial],
                                'Id_Unidad' =>$fila[Id_Unidad],
                                'RFecha' => $dFechaRegistro,
                                'IdTipoMov' =>$Id_TipoMovimiento,
                    );
            }
      $objData->Cerrar($con,$RSet);
      return json_encode($arr);
  }
  /*Modificar*/
  public function frm_modifcar()
  {	
     
        $frmCampo = "<table>
                                        <tr>
                                            <td><div class=\"txt_titulos_bold\">No.Inven.:</div></td>
                                            <td><input type='text' id='TBIDPedidoSInv' name='TBIDPedidoSInv' class=\"boxes_form100px\"/></td>
                                            <td><img src=\"../../interfaz_modulos/botones/buscar.jpg\" name=\"BtnBuscarInv\" width=\"120\" height=\"45\" border=\"0\" id=\"BtnBuscarInv\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('BtnBuscarInv','','../../interfaz_modulos/botones/buscar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_inv_modificar();\"/></td>
                                        </tr>
                               </table>";
    
               
  	$CboBien = "XXXX";
      
        
  	
  	/*Poner cambs e iventario */
  	$frmDetalles .="$tipo_accion
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
                                                            <textarea id='TBCaracteristicas' name='TBCaracteristicas' class='boxes_txtarea'></textarea>
                                                        </td>
                                                    </tr>
                                           </table>
                                           $frmCampo
                                   <table>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Status:</div></td>
                                                        <td>
                                                            <select name=\"CboEstado\" id=\"CboEstado\" class=\"chzn-select\" data-placeholder=\".......\">
                                                                $CboBien
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Pedido:</div></td>
                                                        <td><input type='text' id='TBIDPedidoArticulo' name='txtPedido' class=\"boxes_form100px\"/ value=\"$vNumPedido\"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Costo:</div></td>
                                                        <td><input type='text' id='TBPrecioUnitario' name='txtCosto' class=\"boxes_form100px\" value=\"$mCosto\"/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">No. Documento:</div></td>
                                                        <td>
                                                            <input type='text' id='TBNoDocumento' name='TBNoDocumento' class=\"boxes_form100px\" value=\"\"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Factura:</div></td>
                                                        <td><input type='text' id='TBFactura' name='TBFactura' class=\"boxes_form100px\" value=\"$vNoFactura\"/></td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class=\"txt_titulos_bold\">Fecha Factura:</div></td>
                                                        <td><input type='text' id='TBFechaFactura' name='TBFechaFactura' value=\"$Fecha[2]/$Fecha[1]/$Fecha[0]\" class=\"boxes_form100px\"/></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
  					</div>
  					<div id=\"tabs-2\">
  					          	<div id=\"DivfrmBienes\">$frmBien</div>	

  					</div>
  					<div id=\"tabs-3\">
  							<table>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">&Aacute;rea De Adquisicion:</div></td>
                                                <td><input type='text' id='txtIdAreaAdquisicion' name='txtIdAreaAdquisicion' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageAAdquisicion1\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageAAdquisicion1\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageAAdquisicion1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_ADA();\"/></td>
                                                <td><input type='text' id='txtDesAreaAdquisicion' name='txtDesAreaAdquisicion' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">1er Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante1' name='TBRFCResguardante1' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageResguardante1\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageResguardante1\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageResguardante1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_1erR()\"/></td>
                                                <td><input type='text' id='TBNombreResguardante1' name='TBNombreResguardante1' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">2do Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante2' name='TBRFCResguardante2' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageResguardante2\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageResguardante2\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageResguardante2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_2doR()\"/></td>
                                                <td><input type='text' id='TBNombreResguardante2' name='TBNombreResguardante2' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><div class=\"txt_titulos_bold\">3er Resguardante:</div></td>
                                                <td><input type='text' id='TBRFCResguardante3' name='TBRFCResguardante3' class=\"boxes_form200px\"  readonly/></td>
                                                <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageResguardante3\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageResguardante3\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageResguardante3','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_buscar_3er()\"/></td>
                                                <td><input type='text' id='TBNombreResguardante3' name='TBNombreResguardante3' class=\"boxes_form500px\"  readonly/></td>
                                            </tr>
                                        </table>
  					</div>
  			</div>
  	</div>
        <br>
        <br>
        <table>
                <tr>
                    <td><img src=\"../../interfaz_modulos/botones/guardar.jpg\" name=\"ImageAcepto\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageAcepto\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageAcepto','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"guardar_modificacion();\"></td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td><img src=\"../../interfaz_modulos/botones/cancelar.jpg\" name=\"ImageCancelar\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageCancelar\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageCancelar','','../../interfaz_modulos/botones/cancelar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"javascript:location.reload();\"></td>
                </tr>
        </table>
        
  	       <script>
                   $(function() {
                                    $(\"#tabs\").tabs();
                                    $(\"#tabs2\").tabs();
                                    $.datepicker.setDefaults($.datepicker.regional[\"es\"]);
                                    $(\"#TBFechaFactura\").datepicker();
                             });
  	      </script>";
  	return $frmDetalles;
  	
  }
  public function buscar_consulta_modificar($info)
 {
     $sqlWhere = "";
       $cve=$info->Folio;
      $nombre=$info->Descripcion;
      $texto=$info->Patron;
      $sql="Select sa_cabms.Id_CABMS,sa_cabms.vDescripcionCABMS,sa_inventario.Id_ConsecutivoInv from sa_cabms,sa_inventario where (sa_cabms.Id_CABMS=sa_inventario.Id_CABMS) and ";
 	if($cve == "Si")
 	 {
 	 	$sqlWhere .=" sa_cabms.Id_CABMS like '%$texto%' or ";
 	 }
 	if($nombre == "Si")
 	{
 		$sqlWhere .= "sa_cabms.vDescripcionCABMS like '%$texto%' or ";
 	} 	 

     $sqlWhere = substr($sqlWhere, 0, -3);
     $sql .= '('. $sqlWhere .') order by sa_inventario.Id_ConsecutivoInv asc';
     $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                            <tbody>";
                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos($con);
                          $RSet=$objBuscar->Query($con,$sql);
                          $i=0;
                          while($fila=  mysqli_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"Image1RG2000$i\" width=\"120\" height=\"45\" border=\"0\" id=\"Image1RG2000$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('Image1RG2000$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_Inv_Modificar('$fila[Id_ConsecutivoInv]');\">&nbsp;</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ConsecutivoInv]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
                                                    
                                               </tr>";
                          }
                          $objBuscar->Cerrar($con,$RSet);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'Selecionar', name : 'Seleccionar', width :120, sortable :false, align: 'center'},
                                                            {display: 'No. Inv.', name : 'No. Inv.', width :90, sortable :false, align: 'center'},
                                                            {display: 'Cambs', name : 'Cambs', width :90, sortable :false, align: 'center'},
                                                            {display: 'Cambs', name : 'Cambs', width :250, sortable :false, align: 'center'},
                                                        ],
                                            buttons : [
                                                            {name: '',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 630,
                                            height: 200
                                            }

                                            );</script></form>aqui";
                          return $FliexGrid;
 }
  
  
  public function update_acervo_2000($info,$infoacervo) {
     
     $mCosto=$info->mCosto;
     $vNoFactura=$info->vNoFactura;
     $dFechaFactura=$info->dFechaFactura;
     $Id_CABMS=$info->Id_CABMS;
     $TBNoDocumento=$info->TBNoDocumento;
     /*$Id_Localizacion=$info->Id_Localizacion;*/
     $dFechaRegistro=$info->dFechaRegistro;
     $vCaracteristica = $info->TBCaracteristicas;
     $txtResguardante1=$info->txtResguardante1;
     $txtResguardante2=$info->txtResguardante2;
     $txtResguardante3=$info->txtResguardante3;
     $txtUIAdministrativa=$info->txtUIAdministrativa;
     $txtCBTiposMovimiento=$info->txtCBTiposMovimiento;
     $Id_ConsecutivoInv=$info->TBIDPedidoSInv; 
     $CboEstado=$info->CboEstado;
    $txtAutor = $infoacervo->txtAutor;
    $txtTitulo = $infoacervo->txtTitulo;
    $txtUbicacion = $infoacervo->txtUbicacion;
     
     $d=date(d);
     $m=date(m);
     $a=date(Y);
     $FechaModificacion ="$a/$m/$d";
     
     $F_Factura = split("/",$dFechaFactura);
     $FFactura = "$F_Factura[2]/$F_Factura[1]/$F_Factura[0]";
     $F_Registro = split("/", $dFechaRegistro);
     $FRegistro = "$F_Registro[2]/$F_Registro[1]/$F_Registro[0]";
     
     $sqlAcervo = "update sa_acervo set vCaracteristicas='$vCaracteristica',vAutor='$txtAutor',vTitulo='$txtTitulo',vUbicacion ='$txtUbicacion' Where Id_CABMS='$Id_CABMS'";
     
     /*$sqlInventario="update sa_inventario ('0','$Id_CABMS','$txtIdTipoBien','0','0','$vNoFactura','$mCosto','$vNumPedido','$FFactura','$CboEstado','$FRegistro','$FechaModificacion','0','0','0','$CveUsuario')";*/
     $sqlInventario="update sa_inventario set vNoFactura='$vNoFactura',mCosto='$mCosto',dFechaModRegistro='$FechaModificacion',Id_EdoBien='$CboEstado',dFechaFactura='$FFactura'  where Id_ConsecutivoInv='$Id_ConsecutivoInv'";
     /*$objInv = new poolConnection();
     $con=$objInv->Conexion();
     $objInv->BaseDatos();
     $objInv->Query($sqlInventario);
     $objInv->Cerrar($con);*/
     
     $sqlInventarioMov="INSERT INTO sa_movinventario values('0','$Id_CABMS', '$Id_ConsecutivoInv','$txtResguardante1', '$txtCBTiposMovimiento', '$txtUIAdministrativa', '$txtResguardante2', '$txtResguardante3','0','$FRegistro','$FechaModificacion','$TBNoDocumento','$CboEstado')";
     
     /*$objInvM = new poolConnection();
     $con=$objInvM->Conexion();
     $objInvM->BaseDatos();
     $objInvM->Query($sqlInventarioMov);
     $objInvM->Cerrar($con);
     
     $obj = new poolConnection();
     $con=$obj->Conexion();
     $obj->BaseDatos();
     $obj->Query($sqlAcervo);
     $obj->Cerrar($con);*/
     return "$sqlAcervo $sqlInventarioMov $sqlInventario";
  }
  function update_vehiculo2000($info,$infovehiculo)
 {
     $vNumPedido=$info->vNumPedido;
     $mCosto=$info->mCosto;
     $vNoFactura=$info->vNoFactura;
     $dFechaFactura=$info->dFechaFactura;
     $Id_CABMS=$info->Id_CABMS;
     $TBNoDocumento=$info->TBNoDocumento;
     $txtIdTipoBien = $info->txtIdTipoBien;
     /*$Id_Localizacion=$info->Id_Localizacion;*/
     $dFechaRegistro=$info->dFechaRegistro;
     $CveUsuario=$info->CveUsuario;
     $vCaracteristica = $info->TBCaracteristicas;
     $txtResguardante1=$info->txtResguardante1;
     $txtResguardante2=$info->txtResguardante2;
     $txtResguardante3=$info->txtResguardante3;
     $txtUIAdministrativa=$info->txtUIAdministrativa;
     $txtCBTiposMovimiento=$info->txtCBTiposMovimiento;
     $CboEstado=$info->CboEstado;
     
     #vehiculo
     $txtMarcaVehiculo=$infovehiculo->txtMarcaVehiculo;
     $txtTipoVehiculo=$infovehiculo->txtTipoVehiculo;
     $txtModeloVehiculo=$infovehiculo->txtModeloVehiculo;
     $txtSNVehiculo=$infovehiculo->txtSNVehiculo;
     $txtSNMotorVehiculo=$infovehiculo->txtSNMotorVehiculo;
     $txtPlacasVehiculo=$infovehiculo->txtPlacasVehiculo;
     $txtDireccion=$infovehiculo->txtDireccion;
     $txtTransmision=$infovehiculo->txtTransmision;
     
     $Id_ConsecutivoInv=$info->TBIDPedidoSInv;
     
     $d=date(d);
     $m=date(m);
     $a=date(Y);
     $FechaModificacion ="$a/$m/$d";
     
     $F_Factura = split("/",$dFechaFactura);
     $FFactura = "$F_Factura[2]/$F_Factura[1]/$F_Factura[0]";
     $F_Registro = split("/", $dFechaRegistro);
     $FRegistro = "$F_Registro[2]/$F_Registro[1]/$F_Registro[0]";
     
    $sqlInventario="update sa_inventario set vNoFactura='$vNoFactura',mCosto='$mCosto',dFechaModRegistro='$FechaModificacion',Id_EdoBien='$CboEstado',dFechaFactura='$FFactura'  where Id_ConsecutivoInv='$Id_ConsecutivoInv'";
     
     $objInv = new poolConnection();
     $con=$objInv->Conexion();
     $objInv->BaseDatos($con);
     $R=$objInv->Query($con,$sqlInventario);
     $used_id = mysqli_insert_id($con);
     $objInv->Cerrar($con,$R);
     
      $sqlInventarioMov="INSERT INTO sa_movinventario values('0','$Id_CABMS', '$used_id','$txtResguardante1', '$txtCBTiposMovimiento', '$txtUIAdministrativa', '$txtResguardante2', '$txtResguardante3','0','$FRegistro','$FechaModificacion','$TBNoDocumento','$CboEstado')";
      
      /*$sqlVehiculo = "INSERT INTO sa_vehiculo values('0','$Id_CABMS','$txtMarcaVehiculo','$used_id','$txtTipoVehiculo','$txtModeloVehiculo','$txtSNVehiculo','$txtSNMotorVehiculo','$txtPlacasVehiculo','.','$txtTransmision','-','$vCaracteristica','$txtDireccion')";*/
     $sqlVehiculo = "UPDATE sa_vehiculo SET 
             Id_CABMS = '2111000022a',
             vMarca = 'Toyotaa',
             Id_ConsecutivoInv = '$Id_ConsecutivoInv',
             vTipo = 'Camiona',
             vModelo = '2008a',
             vNumSerie = 'MOP2345a',
             vNumMotor = 'min345a',
             vPlacas = 'WTC-890a',
             vRFV = '.a',
             cTipoTransmision = 'A',
             cUso = 'A',
             vCaracteristicas = 'CarroA',
             cTipoDireccion = 'SA'
             WHERE Id_CABMS = '$Id_CABMS'";
     
    /* $objInvM = new poolConnection();
     $con=$objInvM->Conexion();
     $objInvM->BaseDatos();
     $objInvM->Query($sqlInventarioMov);
     $objInvM->Cerrar($con);
     
     $obj = new poolConnection();
     $con=$obj->Conexion();
     $obj->BaseDatos();
     $obj->Query($sqlVehiculo);
     $obj->Cerrar($con);*/
     
     return "$sqlInventario $sqlInventarioMov $sqlVehiculo";    
 }
 function update_informatico_2000($info,$infoinformatico)
 {
     $vNumPedido=$info->vNumPedido;
     $mCosto=$info->mCosto;
     $vNoFactura=$info->vNoFactura;
     $dFechaFactura=$info->dFechaFactura;
     $Id_CABMS=$info->Id_CABMS;
     $TBNoDocumento=$info->TBNoDocumento;
     $txtIdTipoBien = $info->txtIdTipoBien;
     $vCaracteristica = $info->TBCaracteristicas;
     /*$Id_Localizacion=$info->Id_Localizacion;*/
     $dFechaRegistro=$info->dFechaRegistro;
     $CveUsuario=$info->CveUsuario;
     $vCaracteristica = $info->TBCaracteristicas;
     $txtResguardante1=$info->txtResguardante1;
     $txtResguardante2=$info->txtResguardante2;
     $txtResguardante3=$info->txtResguardante3;
     $txtUIAdministrativa=$info->txtUIAdministrativa;
     $txtCBTiposMovimiento=$info->txtCBTiposMovimiento;
     $CboEstado=$info->CboEstado;
     
     #informatico
     $txtSerieInfomatico=$infoinformatico->txtSerieInfomatico;
     $txtMarcaInfomatico=$infoinformatico->txtMarcaInfomatico;
     $txtModeloInfomatico=$infoinformatico->txtModeloInfomatico;
     $txtDicosDuroInfomatico=$infoinformatico->txtDicosDuroInfomatico;
     $txtRamInfomatico=$infoinformatico->txtRamInfomatico;
     $txtProcesadorInfomatico=$infoinformatico->txtProcesadorInfomatico;
     $txtPaginasMinutoInfomatico=$infoinformatico->txtPaginasMinutoInfomatico;
     $txtFuentePoderInfomatico=$infoinformatico->txtFuentePoderInfomatico;
     $txtMonitorSerieInfomatico=$infoinformatico->txtMonitorSerieInfomatico;
     $txtMonitorMarcaInfomatico=$infoinformatico->txtMonitorMarcaInfomatico;
     $txtTecladoSerialInfomatico=$infoinformatico->txtTecladoSerialInfomatico;
     $txtTecladoMarcaInfomatico=$infoinformatico->txtTecladoMarcaInfomatico;
     $txtMouseSerieInfomatico=$infoinformatico->txtMouseSerieInfomatico;
     $txtMouseMarcaInfomatico=$infoinformatico->txtMouseMarcaInfomatico;
     $Id_ConsecutivoInv=$info->TBIDPedidoSInv;
     
     $d=date(d);
     $m=date(m);
     $a=date(Y);
     $FechaModificacion ="$a/$m/$d";
     
     $F_Factura = split("/",$dFechaFactura);
     $FFactura = "$F_Factura[2]/$F_Factura[1]/$F_Factura[0]";
     $F_Registro = split("/", $dFechaRegistro);
     $FRegistro = "$F_Registro[2]/$F_Registro[1]/$F_Registro[0]";
    
     $sqlInventario="update sa_inventario set vNoFactura='$vNoFactura',mCosto='$mCosto',dFechaModRegistro='$FechaModificacion',Id_EdoBien='$CboEstado',dFechaFactura='$FFactura'  where Id_ConsecutivoInv='$Id_ConsecutivoInv'";
     
      $objInv = new poolConnection();
     $con=$objInv->Conexion();
     $objInv->BaseDatos($con);
     $R=$objInv->Query($con,$sqlInventario);
     $used_id = mysqli_insert_id($con);
     $objInv->Cerrar($con,$R);
     
     $sqlInventarioMov="INSERT INTO sa_movinventario values('0','$Id_CABMS', '$used_id','$txtResguardante1', '$txtCBTiposMovimiento', '$txtUIAdministrativa', '$txtResguardante2', '$txtResguardante3','0','$FRegistro','$FechaModificacion','$TBNoDocumento','$CboEstado')";
     /*$sqlInformatico ="INSERT INTO sa_informatico ('0','$Id_CABMS','$txtSerieInfomatico','$used_id','$txtMarcaInfomatico','$txtModeloInfomatico','$txtDicosDuroInfomatico','$txtRamInfomatico','$txtProcesadorInfomatico','$txtPaginasMinutoInfomatico','$txtFuentePoderInfomatico','$vCaracteristica','$txtMonitorSerieInfomatico','$txtMonitorMarcaInfomatico','$txtTecladoSerialInfomatico','$txtTecladoMarcaInfomatico','$txtMouseSerieInfomatico','$txtMouseMarcaInfomatico')";*/
     $sqlInformatico = "UPDATE sa_informatico SET
               vNumSerie = '$txtSerieInfomatico',
               Id_ConsecutivoInv = '$Id_ConsecutivoInv',
               vMarca = '$txtMarcaInfomatico',
               vModelo = '$txtModeloInfomatico',
               vDiscoDuro = '$txtDicosDuroInfomatico',
               vRAM = '$txtRamInfomatico',
               vProcesador = '$txtProcesadorInfomatico',
               ePaginasMinuto = '$txtPaginasMinutoInfomatico',
               vFuentePoder = '$txtFuentePoderInfomatico',
               vCaracteristicas = '$vCaracteristica',
               vMonitorSerie = '$txtMonitorSerieInfomatico',
               vMonitorMarca = '$txtMonitorMarcaInfomatico',
               vTecladoSerie = '$txtTecladoSerialInfomatico',
               vTecladoMarca = '$txtTecladoMarcaInfomatico', 
               vMouseSerie = '$txtMouseSerieInfomatico',
               vMouseMarca = '$txtMouseMarcaInfomatico'
             WHERE Id_CABMS = '$Id_CABMS'";
     
     
     /*$objInvM = new poolConnection();
     $con=$objInvM->Conexion();
     $objInvM->BaseDatos();
     $objInvM->Query($sqlInventarioMov);
     $objInvM->Cerrar($con);
     
     $obj = new poolConnection();
     $con=$obj->Conexion();
     $obj->BaseDatos();
     $obj->Query($sqlInformatico);
     $obj->Cerrar($con);*/ 
     
     return "$sqlInventario $sqlInventarioMov $sqlInformatico";
     
 }
  function update_mueble_2000($info,$infomueble)
 {
     $vNumPedido=$info->vNumPedido;
     $mCosto=$info->mCosto;
     $vNoFactura=$info->vNoFactura;
     $dFechaFactura=$info->dFechaFactura;
     $Id_CABMS=$info->Id_CABMS;
     $TBNoDocumento=$info->TBNoDocumento;
     $txtIdTipoBien = $info->txtIdTipoBien;
     /*$Id_Localizacion=$info->Id_Localizacion;*/
     $dFechaRegistro=$info->dFechaRegistro;
     $CveUsuario=$info->CveUsuario;
     $vCaracteristica = $info->TBCaracteristicas;
     $txtResguardante1=$info->txtResguardante1;
     $txtResguardante2=$info->txtResguardante2;
     $txtResguardante3=$info->txtResguardante3;
     $txtUIAdministrativa=$info->txtUIAdministrativa;
     $txtCBTiposMovimiento=$info->txtCBTiposMovimiento;
     $CboEstado=$info->CboEstado;
     
     #muebele
      $txtMarcaMueble=$infomueble->txtMarcaMueble;
      $txtMuebleTipo=$infomueble->txtMuebleTipo;
      $txtMuebleModelo=$infomueble->txtMuebleModelo;
      $txtMuebleModeloSerie=$infomueble->txtMuebleModeloSerie;
      $chkMueblePedestal=$infomueble->chkMueblePedestal;
      $chkMuebleFija=$infomueble->chkMuebleFija;
      $chkMuebleGiratoria=$infomueble->chkMuebleGiratoria;
      $chkMuebleRodajas=$infomueble->chkMuebleRodajas;
      
      $chkMueblePlegable=$infomueble->chkMueblePlegable;
      $chkMuebleCajones=$infomueble->chkMuebleCajones;
      $chkMuebleGavetas=$infomueble->chkMuebleGavetas;
      $chkMuebleEntrepano=$infomueble->chkMuebleEntrepano;

     $Id_ConsecutivoInv=$info->TBIDPedidoSInv;
     
     $d=date(d);
     $m=date(m);
     $a=date(Y);
     $FechaModificacion ="$a/$m/$d";
     
     $F_Factura = split("/",$dFechaFactura);
     $FFactura = "$F_Factura[2]/$F_Factura[1]/$F_Factura[0]";
     $F_Registro = split("/", $dFechaRegistro);
     $FRegistro = "$F_Registro[2]/$F_Registro[1]/$F_Registro[0]";
     /*UPDATE `be_saci`.`sa_mueble` SET `vCaracteristicas` = '11q', `vNumSerie` = '11q', `vMarca` = '11q', `vModelo` = '111q', `vTipo` = '11q', `eNoCajon` = '111q', `eNoGaveta` = '11q', `eNoEntrepanio` = '11q', `bPedestal` = 'Si', `bFija` = 'Si', `bGiratoria` = 'Si', `bRodajas` = 'Si', `bPlegable` = 'Si' WHERE `sa_mueble`.`Id` = 56597;*/
     
    $sqlInventario="update sa_inventario set vNoFactura='$vNoFactura',mCosto='$mCosto',dFechaModRegistro='$FechaModificacion',Id_EdoBien='$CboEstado',dFechaFactura='$FFactura'  where Id_ConsecutivoInv='$Id_ConsecutivoInv'";
     
    /* $objInv = new poolConnection();
     $con=$objInv->Conexion();
     $objInv->BaseDatos();
     $objInv->Query($sqlInventario);
     $used_id = mysql_insert_id($con);
     $objInv->Cerrar($con);*/
     
     $sqlInventarioMov="INSERT INTO sa_movinventario values('0','$Id_CABMS', '$used_id','$txtResguardante1', '$txtCBTiposMovimiento', '$txtUIAdministrativa', '$txtResguardante2', '$txtResguardante3','0','$FRegistro','$FechaModificacion','$TBNoDocumento','$CboEstado')";
     /*$sqlMueble ="INSERT INTO sa_mueble values('0','$Id_CABMS','$vCaracteristica','$used_id','$txtMuebleModeloSerie','$txtMarcaMueble','$txtMuebleModelo','$txtMuebleTipo','$chkMuebleCajones','$chkMuebleGavetas','$chkMuebleEntrepano','$chkMueblePedestal','$chkMuebleFija','$chkMuebleGiratoria','$chkMuebleRodajas','$chkMueblePlegable')";*/
     $sqlMueble = "UPDATE sa_mueble SET 
             vCaracteristicas = '$vCaracteristica',
             vNumSerie = '$txtMuebleModeloSerie',
             vMarca = '$txtMarcaMueble',
             vModelo = '$txtMuebleModelo',
             vTipo = '$txtMuebleTipo',
             eNoCajon = '$chkMuebleCajones',
             eNoGaveta = '$chkMuebleGavetas',
             eNoEntrepanio = '$chkMuebleEntrepano',
             bPedestal = '$chkMueblePedestal', 
             bFija = '$chkMuebleFija',
             bGiratoria = '$chkMuebleGiratoria',
             bRodajas = '$chkMuebleRodajas',
             bPlegable = '$chkMueblePlegable'
             WHERE Id_CABMS='$Id_CABMS';";
     
    
     /*$objInvM = new poolConnection();
     $con=$objInvM->Conexion();
     $objInvM->BaseDatos();
     $objInvM->Query($sqlInventarioMov);
     $objInvM->Cerrar($con);
     
     $obj = new poolConnection();
     $con=$obj->Conexion();
     $obj->BaseDatos();
     $obj->Query($sqlMueble);
     $obj->Cerrar($con);*/
     
     return "$sqlInventario $sqlInventarioMov $sqlMueble";
     
 }
  public function guardar_modificar($info)
  {
     
      
      
  }
 
}
?>
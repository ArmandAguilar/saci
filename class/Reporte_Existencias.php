<?php
class Reporte_Existencias extends poolConnection
{
	public function buscar_empleado($AData)
	{
		$Patron=$AData->Patron;
		$Clave=$AData->Clave;
		$Nombre=$AData->Nombre;
		$Sel = $AData->Sel;
		
			
		#Preparamos ware
		if($Clave=="Si")
		{
		$where.="IdEmpleado like '%$Patron%' and ";
		}
			
		if($Nombre=="Si")
		{
			$where.="Nombres like '%$Patron%' and ";
		}
			
		$where = substr($where, 0, -4);
			
			
		$objGrid = new poolConnection();
		$con=$objGrid->Conexion();
		$objGrid->BaseDatos();
		$sql="SELECT IdEmpleado,Nombres
		FROM
		sa_usuarios
		Where   $where";
		$RSet=$objGrid->Query($sql);
		$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
		<tbody>";
		$i=0;
		while($fila=mysql_fetch_array($RSet))
		{
		$i++;
		
		     switch($Sel)
		     {
		     	
		     	case '1':
				     		$FliexGrid.="
				     		<tr>
				     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageEmp$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageEmp$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageEmp$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_empleado($Sel,'$fila[IdEmpleado]');\">&nbsp;</td>
				     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[IdEmpleado]</td>
				     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Nombres]</td>
				     		
				     		</tr>";
		     		break;

		     	case '2':
				     		$FliexGrid.="
				     		<tr>
				     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageEmp$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageEmp$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageEmp$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_empleado($Sel,'$fila[IdEmpleado]');\">&nbsp;</td>
				     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[IdEmpleado]</td>
				     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Nombres]</td>
				     		
				     		</tr>";
		     		break;
		     }
		
		}
		mysql_free_result($RSet);
		$objGrid->Cerrar($con);
		$FliexGrid.="       </tbody>
		</table><script>$('.flexme1').flexigrid({
				title: '',
				colModel : [
					
				{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
				{display: 'IdEmpleado', name : 'IdEmpleado', width :100, sortable :false, align: 'center'},
				{display: 'Nombre', name : 'Nombre', width :100, sortable :false, align: 'center'},
					
				],
				buttons : [
				{name: '',onpress:saver_Order},
				{separator: true}
				],
				width: 640,
				height: 250
	}
	
		);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
				return $FliexGrid;
	}
	public function buscar_tipomovimiento($AData)
	{
		$Patron=$AData->Patron;
		$Clave=$AData->Clave;
		$Nombre=$AData->Nombre;
		$Sel = $AData->Sel;
	
			
		#Preparamos ware
			if($Clave=="Si")
			{
			  $where.="Id_TipoMovimiento like '%$Patron%' and ";
			}
				
			if($Nombre=="Si")
			{
			  $where.="vDescripcion like '%$Patron%' and ";
			}
				
			$where = substr($where, 0, -4);
				
				
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos();
			$sql="SELECT Id_TipoMovimiento,vDescripcion
			FROM
			sa_tipomovimiento
			Where   $where";
			$RSet=$objGrid->Query($sql);
			$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
			<tbody>";
			$i=0;
			while($fila=mysql_fetch_array($RSet))
			{
			$i++;
				switch ($Sel)
				{
					case '1':
						$FliexGrid.="
						<tr>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageMov$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageMov$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageMov$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_tmovimiento($Sel,'$fila[Id_TipoMovimiento]');\">&nbsp;</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_TipoMovimiento]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
						</tr>";
						break;
					case '2':
						$FliexGrid.="
						<tr>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageMov$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageMov$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageMov$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_tmovimiento($Sel,'$fila[Id_TipoMovimiento]');\">&nbsp;</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_TipoMovimiento]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
						</tr>";
						break;
					
				}
				
			}
			mysql_free_result($RSet);
			$objGrid->Cerrar($con);
			$FliexGrid.="       </tbody>
			</table><script>$('.flexme1').flexigrid({
			title: '',
			colModel : [
				
			{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
			{display: 'Id', name : 'Id', width :100, sortable :false, align: 'center'},
			{display: 'Movimiento', name : 'Movimiento', width :300, sortable :false, align: 'center'},
				
			],
			buttons : [
			{name: '',onpress:saver_Order},
			{separator: true}
			],
			width: 640,
			height: 250
		}
	
		);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
		return $FliexGrid;
		}
		
		public function buscar_inventario($AData)
		{
			$Patron=$AData->Patron;
			$Sel = $AData->Sel;
			
			$where.="Id_ConsecutivoInv like '%$Patron%'  ";
			
		
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos();
			$sql="SELECT sa_inventario.Id_ConsecutivoInv,sa_inventario.Id_CABMS,sa_cabms.vDescripcionCABMS
			FROM
			sa_inventario,sa_cabms
			Where   $where and sa_inventario.Id_CABMS = sa_cabms.Id_CABMS";
			$RSet=$objGrid->Query($sql);
			$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
			<tbody>";
			$i=0;
			while($fila=mysql_fetch_array($RSet))
			{
			$i++;
		     switch($Sel)
		     {
		     	case '1':
		     		$FliexGrid.="
		     		<tr>
		     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageInv$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageInv$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageInv$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_inventario($Sel,'$fila[Id_ConsecutivoInv]');\">&nbsp;</td>
		     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ConsecutivoInv]</td>
		     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
		     		</tr>";
		     		break;
		     	case '2':
		     		$FliexGrid.="
		     		<tr>
		     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageInv$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageInv$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageInv$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_inventario($Sel,'$fila[Id_ConsecutivoInv]');\">&nbsp;</td>
		     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ConsecutivoInv]</td>
		     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
		     		</tr>";
		     		break;
		     }
		     
			
			}
			mysql_free_result($RSet);
			$objGrid->Cerrar($con);
			$FliexGrid.="       </tbody>
			</table><script>$('.flexme1').flexigrid({
					title: '',
			colModel : [
		
			{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
			{display: 'Id Inventario', name : 'Id Inventario', width :100, sortable :false, align: 'center'},
			{display: 'CABMS', name : 'CABMS', width :300, sortable :false, align: 'center'},
		
			],
			buttons : [
			{name: '',onpress:saver_Order},
			{separator: true}
			],
			width: 640,
			height: 250
		}
		
		);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
		return $FliexGrid;
		}
		public function buscar_area($AData)
		{
			$Patron=$AData->Patron;
			$Clave=$AData->Clave;
			$Nombre=$AData->Nombre;
			$Sel = $AData->Sel;
		
				
			#Preparamos ware
			if($Clave=="Si")
			{
				$where.="Id_Unidad like '%$Patron%' and ";
				}
					
				if($Nombre=="Si")
				{
				$where.="vDescripcion like '%$Patron%' and ";
				}
					
				$where = substr($where, 0, -4);
					
					
				$objGrid = new poolConnection();
				$con=$objGrid->Conexion();
				$objGrid->BaseDatos();
				$sql="SELECT Id_Unidad,vDescripcion
				FROM
				sa_unidadadmva
				Where   $where";
				$RSet=$objGrid->Query($sql);
				$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
				<tbody>";
				$i=0;
				while($fila=mysql_fetch_array($RSet))
				{
				$i++;
					switch($Sel)
					{
						case '1':
							$FliexGrid.="
							<tr>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageArea$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageArea$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageArea$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_area($Sel,'$fila[Id_Unidad]');\">&nbsp;</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Unidad]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
							
							</tr>";
							break;

						case '2':
							$FliexGrid.="
							<tr>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageArea$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageArea$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageArea$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_area($Sel,'$fila[Id_Unidad]');\">&nbsp;</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Unidad]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
							
							</tr>";
							break;
					}
					
				}
				mysql_free_result($RSet);
				$objGrid->Cerrar($con);
				$FliexGrid.="       </tbody>
				</table><script>$('.flexme1').flexigrid({
				title: '',
				colModel : [
					
				{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
				{display: 'Id', name : 'Id', width :100, sortable :false, align: 'center'},
				{display: 'Area', name : 'Area', width :300, sortable :false, align: 'center'},
					
				],
				buttons : [
				{name: '',onpress:saver_Order},
				{separator: true}
				],
				width: 640,
				height: 250
			}
		
			);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
			return $FliexGrid;
			}
	 /*tab para sa_mueble */
			public function buscar_marca_mueble($AData)
			{
				$Patron=$AData->Patron;
				$Sel = $AData->Sel;
			
					
				$objGrid = new poolConnection();
				$con=$objGrid->Conexion();
				$objGrid->BaseDatos();
				$sql="SELECT DISTINCT (vMarca)
				FROM
				sa_mueble
				Where   vMarca like '%$Patron%'";
				$RSet=$objGrid->Query($sql);
				$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
				<tbody>";
				$i=0;
				while($fila=mysql_fetch_array($RSet))
				{
				$i++;
			     switch ($Sel)
			     {
			     	case '1':
			     		$FliexGrid.="
			     		<tr>
			     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageMMueble$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageMMueble$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageMMueble$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_mueble_marca($Sel,'$fila[vMarca]');\">&nbsp;</td>
			     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMarca]</td>
			     		</tr>";
			     		break;
			     	case '2':
			     		$FliexGrid.="
			     		<tr>
			     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageMMueble$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageMMueble$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageMMueble$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_mueble_marca($Sel,'$fila[vMarca]');\">&nbsp;</td>
			     		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMarca]</td>
			     		</tr>";
			     		break;
			     }
				
				}
				mysql_free_result($RSet);
				$objGrid->Cerrar($con);
				$FliexGrid.="       </tbody>
				</table><script>$('.flexme1').flexigrid({
						title: '',
						colModel : [
							
						{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
						{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
							
						],
						buttons : [
						{name: '',onpress:saver_Order},
						{separator: true}
						],
						width: 640,
						height: 250
						}
			
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						public function buscar_modelo_mueble($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
								
								
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vModelo)
							FROM
							sa_mueble
							Where  vModelo like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageModeloMarca$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageModeloMarca$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageModeloMarca$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_mueble_modelo($Sel,'$fila[vModelo]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vModelo]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageModeloMarca$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageModeloMarca$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageModeloMarca$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_mueble_modelo($Sel,'$fila[vModelo]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vModelo]</td>
										</tr>";
										break;
									
								}
									
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
							$FliexGrid.="       </tbody>
							</table><script>$('.flexme1').flexigrid({
							title: '',
							colModel : [
								
							{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
							{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
								
							],
							buttons : [
							{name: '',onpress:saver_Order},
							{separator: true}
							],
							width: 640,
							height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						public function buscar_tipo_mueble($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vTipo)
							FROM
							sa_mueble
							Where  vTipo like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageTipoMueble$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageTipoMueble$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageTipoMueble$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_mueble_tipo($Sel,'$fila[vTipo]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTipo]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageTipoMueble$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageTipoMueble$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageTipoMueble$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_mueble_tipo($Sel,'$fila[vTipo]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTipo]</td>
										</tr>";
										break;
									
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Tipo', name : 'Tipo', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						/*tab para sa_informatico */
						public function buscar_marcabien_informatico($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vMarca)
							FROM
							sa_informatico
							Where vMarca like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageMarcaBienInfomatico$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageMarcaBienInfomatico$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageMarcaBienInfomatico$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_bien($Sel,'$fila[vMarca]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMarca]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageMarcaBienInfomatico$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageMarcaBienInfomatico$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageMarcaBienInfomatico$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_bien($Sel,'$fila[vMarca]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMarca]</td>
										</tr>";
										break;
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						public function buscar_marcamouse_informatico($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vMouseMarca)
							FROM
							sa_informatico
							Where vMouseMarca like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageMarcaMouse$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageMarcaMouse$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageMarcaMouse$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_mouse($Sel,'$fila[vMouseMarca]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMouseMarca]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageMarcaMouse$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageMarcaMouse$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageMarcaMouse$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_mouse($Sel,'$fila[vMouseMarca]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMouseMarca]</td>
										</tr>";
										break;
									
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						public function buscar_marcateclado_informatico($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vTecladoMarca)
							FROM
							sa_informatico
							Where vTecladoMarca like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageMarcaTeclado$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageMarcaTeclado$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageMarcaTeclado$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_teclado($Sel,'$fila[vTecladoMarca]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTecladoMarca]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageMarcaTeclado$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageMarcaTeclado$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageMarcaTeclado$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_teclado($Sel,'$fila[vTecladoMarca]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTecladoMarca]</td>
										</tr>";
										break;
									
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}	
						public function buscar_marcaprocesador_informatico($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vProcesador)
							FROM
							sa_informatico
							Where vProcesador like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageMarcaProcesador$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageMarcaProcesador$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageMarcaProcesador$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_procesador($Sel,'$fila[vProcesador]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vProcesador]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageMarcaProcesador$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageMarcaProcesador$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageMarcaProcesador$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_procesador($Sel,'$fila[vProcesador]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vProcesador]</td>
										</tr>";
										break;
									
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						public function buscar_marca_informatico($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vMarca)
							FROM
							sa_informatico
							Where vMarca like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageMarcaInfo$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageMarcaInfo$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageMarcaInfo$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_marca($Sel,'$fila[vMarca]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMarca]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageMarcaInfo$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageMarcaInfo$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageMarcaInfo$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_marca($Sel,'$fila[vMarca]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMarca]</td>
										</tr>";
										break;
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						public function buscar_ram_informatico($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vRAM)
							FROM
							sa_informatico
							Where vRAM like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageInfoRam$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageInfoRam$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageInfoRam$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_ram($Sel,'$fila[vRAM]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vRAM]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageInfoRam$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageInfoRam$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageInfoRam$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_ram($Sel,'$fila[vRAM]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vRAM]</td>
										</tr>";
										break;
									
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						public function buscar_dd_informatico($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vDiscoDuro)
							FROM
							sa_informatico
							Where vDiscoDuro like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageInfoDD$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageInfoDD$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageInfoDD$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_dd($Sel,'$fila[vDiscoDuro]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDiscoDuro]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageInfoDD$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageInfoDD$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageInfoDD$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_informatico_dd($Sel,'$fila[vDiscoDuro]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDiscoDuro]</td>
										</tr>";
										break;
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						/* tap vehiculo */
						public function buscar_marca_vehiculo($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vMarca)
							FROM
							sa_vehiculo
							Where vMarca like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageVehiculoMarca$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageVehiculoMarca$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageVehiculoMarca$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_vehiculo_marca($Sel,'$fila[vMarca]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMarca]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageVehiculoMarca$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageVehiculoMarca$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageVehiculoMarca$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_vehiculo_marca($Sel,'$fila[vMarca]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMarca]</td>
										</tr>";
										break;
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						public function buscar_modelo_vehiculo($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vModelo)
							FROM
							sa_vehiculo
							Where vModelo like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageVehiculoModelo$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageVehiculoModelo$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageVehiculoModelo$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_vehiculo_modelo($Sel,'$fila[vModelo]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vModelo]</td>
										</tr>";
										 break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageVehiculoModelo$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageVehiculoModelo$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageVehiculoModelo$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_vehiculo_modelo($Sel,'$fila[vModelo]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vModelo]</td>
										</tr>";
										break;
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Modelo', name : 'Modelo', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						public function buscar_tipo_vehiculo($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vTipo)
							FROM
							sa_vehiculo
							Where vTipo like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageVehiculoTipo$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageVehiculoTipo$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageVehiculoTipo$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_vehiculo_tipo($Sel,'$fila[vTipo]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTipo]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageVehiculoTipo$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageVehiculoTipo$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageVehiculoTipo$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_vehiculo_tipo($Sel,'$fila[vTipo]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTipo]</td>
										</tr>";
										break;
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Tipo', name : 'Tipo', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						/* Acervo cultural */
						public function buscar_autor_acervo($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vAutor)
							FROM
					        sa_acervo
							Where vAutor like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageAcervoAutor$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageAcervoAutor$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageAcervoAutor$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_acervo_autor($Sel,'$fila[vAutor]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vAutor]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageAcervoAutor$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageAcervoAutor$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageAcervoAutor$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_acervo_autor($Sel,'$fila[vAutor]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vAutor]</td>
										</tr>";
										break;
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						public function buscar_titulo_acervo($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vTitulo)
							FROM
							sa_acervo
							Where vTitulo like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageAcrvoTitulo$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageAcrvoTitulo$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageAcrvoTitulo$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_acervo_titulo($Sel,'$fila[vTitulo]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTitulo]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageAcrvoTitulo$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageAcrvoTitulo$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageAcrvoTitulo$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_acervo_titulo($Sel,'$fila[vTitulo]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTitulo]</td>
										</tr>";
										break;
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Marca', name : 'Marca', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}
						public function buscar_ubicacion_acervo($AData)
						{
							$Patron=$AData->Patron;
							$Sel = $AData->Sel;
						
						
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT DISTINCT (vUbicacion) As Ubicacion
							FROM
							sa_acervo
							Where vUbicacion like '%$Patron%'";
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								switch ($Sel)
								{
									case '1':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"1ImageAcrvoUbicacion$i\" width=\"120\" height=\"45\" border=\"0\" id=\"1ImageAcrvoUbicacion$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('1ImageAcrvoUbicacion$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_acervo_ubicacion($Sel,'$fila[Ubicacion]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Ubicacion]</td>
										</tr>";
										break;
									case '2':
										$FliexGrid.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"2ImageAcrvoUbicacion$i\" width=\"120\" height=\"45\" border=\"0\" id=\"2ImageAcrvoUbicacion$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('2ImageAcrvoUbicacion$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"sel_acervo_ubicacion($Sel,'$fila[Ubicacion]');\">&nbsp;</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Ubicacion]</td>
										</tr>";
										break;
								}	
								
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
								{display: 'Ubicacion', name : 'Ubicacion', width :300, sortable :false, align: 'center'},
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 640,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
						return $FliexGrid;
						}	
						public function generar_reporte_muebles($AData)
						{
							
							$txtIdEmpleadoInicial=$AData->txtIdEmpleadoInicial;
							$txtIdEmpleadoFinal=$AData->txtIdEmpleadoFinal;
							$txtAreaInicial=$AData->txtAreaInicial;
							$txtAreaFinal=$AData->txtAreaFinal;
							$txtInventarioInicial=$AData->txtInventarioInicial;
							$txtInventarioFinal=$AData->txtInventarioFinal;
							$txtFechaInicial=$AData->txtFechaInicial;
							$txtFechaFinal=$AData->txtFechaFinal;
							$txtMarcaMuebleInicio=$AData->txtMarcaMuebleInicio;
							$txtMarcaMuebleFinal=$AData->txtMarcaMuebleFinal;
							$txtMuebleTipoInicial=$AData->txtMuebleTipoInicial;
							$txtMuebleTipoFinal=$AData->txtMuebleTipoFinal;
							$txtMuebleModeloInicial=$AData->txtMuebleModeloInicial;
							$txtMuebleModeloFinal=$AData->txtMuebleModeloFinal;
							$chkMueblePedestal=$AData->chkMueblePedestal;
							$chkMuebleFija=$AData->chkMuebleFija;
							$chkMuebleGiratoria=$AData->chkMuebleGiratoria;
							$chkMuebleRodajas=$AData->chkMuebleRodajas;
							$chkMueblePlegable=$AData->chkMueblePlegable;
							$chkMuebleCajones=$AData->chkMuebleCajones;
							$chkMuebleGavetas=$AData->chkMuebleGavetas;
							$chkMuebleEntrepano=$AData->chkMuebleEntrepano;
							$chkMuebleSerie=$AData->chkMuebleSerie;
						    /* where  Principal */
							$WhereP ="";
							if(!empty($txtIdEmpleadoInicial) && !empty($txtIdEmpleadoFinal))
							{
								$WhereP .= "sa_inventario.CveUsuario Between '$txtIdEmpleadoInicial' and '$txtIdEmpleadoFinal' or ";
							}								
							/*if(!empty($txtAreaInicial) && !empty($txtAreaFinal))
							{
								$WhereP .= "sa_invetario.vMarca Between '$txtAreaInicial' and '$txtAreaFinal' or ";
							}*/
							if(!empty($txtInventarioInicial) && !empty($txtInventarioFinal))
							{
								$WhereP .= "sa_inventario.Id_ConsecutivoInv Between '$txtInventarioInicial' and '$txtInventarioFinal' or ";
							}
							if(!empty($txtFechaInicial) && !empty($txtFechaFinal))
							{
								$WhereP .= "sa_inventario.dFechaRegistro Between '$txtFechaInicial' and '$txtFechaFinal' or ";
							}
							$WhereP = substr($WhereP, 0, -3);
							if(!empty($WhereP))
							{
								$WhereP="($WhereP) and";
							}
							/*Where de between */
							$WhereBetween =" ";
							if(!empty($txtMarcaMuebleInicio))
							{
								$WhereBetween .= "sa_mueble.vMarca Between '$txtMarcaMuebleInicio' and '$txtMarcaMuebleFinal' or ";
							}	
							if(!empty($txtMuebleTipoInicial))
							{
								$WhereBetween .= "sa_mueble.vTipo Between '$txtMuebleTipoInicial' and '$txtMuebleTipoFinal' or ";
							}	
							if(!empty($txtMuebleModeloInicial))
							{
								$WhereBetween .= "sa_mueble.vModelo Between '$txtMuebleModeloInicial' and '$txtMuebleModeloFinal' or ";
							}	
							$WhereBetween = substr($WhereBetween, 0, -3);
							if(!empty($WhereBetween))
							{
								$WhereBetween2="($WhereBetween)";
							}	
							/* Where para los checkbox*/
						    if($chkMueblePedestal=="Si")
						    {
						    	$where .="sa_mueble.bPedestal='-1' or "; 
						    }
						    if($chkMuebleFija=="Si")
						    {
						    	$where .="sa_mueble.bFija ='-1' or ";
						    }
						  
						    if($chkMuebleGiratoria=="Si")
						    {
						    	$where .="sa_mueble.bGiratoria='-1' or ";
						    }
						    if($chkMuebleRodajas=="Si")
						    {
						    	$where .="sa_mueble.bRodajas='-1' or ";
						    }
						    if($chkMueblePlegable=="Si")
						    {
						    	$where .="sa_mueble.bPlegable='-1' or ";
						    }
						    if($chkMuebleCajones=="Si")
						    {
						    	$where .="sa_mueble.eNoCajon='-1' or ";
						    }
						  
						    if($chkMuebleEntrepano=="Si")
						    {
						    	$where .="sa_mueble.eNoCajon='-1' or ";
						    }
						    if($chkMuebleSerie=="Si")
						    {
						    	$where .="sa_mueble.Serie='-1' or ";
						    }
						    $where = substr($where , 0, -4);
						    if(!empty($where))
						    {
						    	$where2 ="and ($where)";
						    }	
							$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="SELECT
									sa_inventario.CveUsuario,
									sa_inventario.Id_ConsecutivoInv,
									sa_inventario.dFechaRegistro,
									sa_mueble.vMarca,
									sa_mueble.vTipo,
									sa_mueble.vModelo,
									sa_mueble.bPedestal,
									sa_mueble.bFija,
									sa_mueble.bGiratoria,
									sa_mueble.bRodajas,
									sa_mueble.bPlegable,
									sa_mueble.eNoCajon,
									sa_mueble.eNoEntrepanio
									FROM 
									sa_inventario,
									sa_mueble
									Where
									(sa_inventario.Id_CABMS = sa_mueble.Id_CABMS   and  sa_inventario.Id_ConsecutivoInv = sa_mueble.Id_ConsecutivoInv) and
									$WhereP
									$WhereBetween2
									$where2";
							
							$RSet=$objGrid->Query($sql);
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$i=0;
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								
								$FliexGrid.="
								<tr>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[CveUsuario]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ConsecutivoInv]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaRegistro]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMarca]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTipo]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vModelo]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bPedestal]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bFija]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bGiratoria]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bRodajas]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[bPlegable]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eNoCajon]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eNoEntrepanio]</td>	
								</tr>";
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
							$XSLyPDF="<br><table border=\"0\">
							<tr>
							<th><img id=\"BtnExportarPDF\" src=\"../../interfaz_modulos/botones/exportar_pdf.jpg\" name=\"ImagePdf\" width=\"120\" height=\"45\" border=\"0\" id=\"ImagePdf\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Pdf_mueble();\"/></th>
							<td>&nbsp;</td>
							<th></th>
							<td>&nbsp;</td>
							<th><img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls_mueble();\"/></th>
							</tr>
							</table>";
								$FliexGrid.="       </tbody>
								</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
								
								{display: 'Cve. Usuario', name : 'Cve. Usuario', width :100, sortable :false, align: 'center'},
								{display: 'No. Inventario', name : 'No. Inventario', width :100, sortable :false, align: 'center'},
								{display: 'Fecha Registro', name : 'Fecha Registro', width :100, sortable :false, align: 'center'},
								{display: 'Tipo', name : 'Tipo', width :200, sortable :false, align: 'center'},
								{display: 'Modelo', name : 'Modelo', width :200, sortable :false, align: 'center'},
						        {display: 'Pedestal', name : 'Pedestal', width :100, sortable :false, align: 'center'},
						        {display: 'Fija', name : 'Fija', width :100, sortable :false, align: 'center'},
						        {display: 'Giratoria', name : 'Giratoria', width :100, sortable :false, align: 'center'},
						        {display: 'Rodajas', name : 'Rodajas', width :100, sortable :false, align: 'center'},
						        {display: 'Plegable', name : 'Plegable', width :100, sortable :false, align: 'center'},
						        {display: 'NoCajon', name : 'NoCajon', width :100, sortable :false, align: 'center'},
						        {display: 'NoEntrepanio', name : 'NoEntrepanio', width :100, sortable :false, align: 'center'}
						        
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 840,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form><center>$XSLyPDF</center>";
						return $FliexGrid;
						}
					function generar_reporte_informatico($AData)
					{
						
						$txtIdEmpleadoInicial=$AData->txtIdEmpleadoInicial;
						$txtIdEmpleadoFinal=$AData->txtIdEmpleadoFinal;
						$txtAreaInicial=$AData->txtAreaInicial;
						$txtAreaFinal=$AData->txtAreaFinal;
						$txtInventarioInicial=$AData->txtInventarioInicial;
						$txtInventarioFinal=$AData->txtInventarioFinal;
						$txtFechaInicial=$AData->txtFechaInicial;
						$txtFechaFinal=$AData->txtFechaFinal;
						$txtMarcaBienInfomaticoInicio=$AData->txtMarcaBienInfomaticoInicio;
						$txtMarcaBienInfomaticoFinal=$AData->txtMarcaBienInfomaticoFinal;
						$txtMarcaMouseInformaticoInicio=$AData->txtMarcaMouseInformaticoInicio;
						$txtMarcaMouseInformaticoFinal=$AData->txtMarcaMouseInformaticoFinal;
						$txtMarcaTecladoInformaticoInicio=$AData->txtMarcaTecladoInformaticoInicio;
						$txtMarcaTecladoInformaticoFinal=$AData->txtMarcaTecladoInformaticoFinal;
						$txtMarcaProcesadorInformaticoInicio=$AData->txtMarcaProcesadorInformaticoInicio;
						$txtMarcaProcesadorInformaticoFinal=$AData->txtMarcaProcesadorInformaticoFinal;
						$txtMarcaMarcaInformaticoInicio=$AData->txtMarcaMarcaInformaticoInicio;
						$txtMarcaMarcaInformaticoFinal=$AData->txtMarcaMarcaInformaticoFinal;
						$txtMarcaRamInformaticoInicio=$AData->txtMarcaRamInformaticoInicio;
						$txtMarcaRamInformaticoFinal=$AData->txtMarcaRamInformaticoFinal;
						$txtMarcaDdInformaticoInicio=$AData->txtMarcaDdInformaticoInicio;
						$txtMarcaDdInformaticoFinal=$AData->txtMarcaDdInformaticoFinal;
						
						/* where  Principal */
						$WhereP ="";
						if(!empty($txtIdEmpleadoInicial) && !empty($txtIdEmpleadoFinal))
						{
							$WhereP .= "sa_inventario.CveUsuario Between '$txtIdEmpleadoInicial' and '$txtIdEmpleadoFinal' or ";
						}
						/*if(!empty($txtAreaInicial) && !empty($txtAreaFinal))
						 {
						$WhereP .= "sa_invetario.vMarca Between '$txtAreaInicial' and '$txtAreaFinal' or ";
						}*/
						if(!empty($txtInventarioInicial) && !empty($txtInventarioFinal))
						{
							$WhereP .= "sa_inventario.Id_ConsecutivoInv Between '$txtInventarioInicial' and '$txtInventarioFinal' or ";
						}
						if(!empty($txtFechaInicial) && !empty($txtFechaFinal))
						{
							$WhereP .= "sa_inventario.dFechaRegistro Between '$txtFechaInicial' and '$txtFechaFinal' or ";
						}
						$WhereP = substr($WhereP, 0, -3);
						if(!empty($WhereP))
						{
							$WhereP="($WhereP) and";
						}
						
						
						
						$WhereBetween =" ";
						if(!empty($txtMarcaBienInfomaticoInicio) && !empty($txtMarcaBienInfomaticoFinal))
						{
							$WhereBetween .= "sa_informatico.vMarca Between '$txtMarcaBienInfomaticoInicio' and '$txtMarcaBienInfomaticoFinal' or ";
						}	
						if(!empty($txtMarcaMouseInformaticoInicio) && !empty($txtMarcaMouseInformaticoFinal))
						{
							$WhereBetween .= "sa_informatico.vMouseMarca Between '$txtMarcaMouseInformaticoInicio' and '$txtMarcaMouseInformaticoFinal' or ";
						}	
						if(!empty($txtMarcaTecladoInformaticoInicio) && !empty($txtMarcaTecladoInformaticoFinal))
						{
							$WhereBetween .= "sa_informatico.vTecladoMarca Between '$txtMarcaTecladoInformaticoInicio' and '$txtMarcaTecladoInformaticoFinal' or ";
						}	
						if(!empty($txtMarcaProcesadorInformaticoInicio) && !empty($txtMarcaProcesadorInformaticoFinal))
						{
							$WhereBetween .= "sa_informatico.vProcesador Between '$txtMarcaProcesadorInformaticoInicio' and '$txtMarcaProcesadorInformaticoFinal' or ";
						}
						/*if(!empty() && !empty())
						{
							$WhereBetween .= "sa_informatico.VModelo Between 'dellopteplex' and 'dellopteplex' or ";
							
						}*/
						if(!empty($txtMarcaRamInformaticoInicio) && !empty($txtMarcaRamInformaticoFinal))
						{
							$WhereBetween .= "sa_informatico.vRam between '$txtMarcaRamInformaticoInicio' and '$txtMarcaRamInformaticoFinal' or ";
						}
						if(!empty($txtMarcaDdInformaticoInicio) && !empty($txtMarcaDdInformaticoFinal))
						{
							$WhereBetween .= " sa_informatico.vDiscoDuro Between '$txtMarcaDdInformaticoInicio' and '$txtMarcaDdInformaticoFinal' or ";
						}
						$WhereBetween = substr($WhereBetween, 0, -3);
						if(!empty($WhereBetween))
						{
							$WhereBetween2="($WhereBetween)";
						}
						$objGrid = new poolConnection();
						$con=$objGrid->Conexion();
						$objGrid->BaseDatos();
						$sql="SELECT
								sa_inventario.CveUsuario,
								sa_inventario.Id_ConsecutivoInv,
								sa_inventario.dFechaRegistro,
								sa_informatico.vMarca,
								sa_informatico.vMouseMarca,
								sa_informatico.vTecladoMarca,
								sa_informatico.vProcesador, 
								sa_informatico.VModelo,
								sa_informatico.vRam,
								sa_informatico.vDiscoDuro
								FROM 
								sa_inventario,
								sa_informatico
								Where
								(sa_inventario.Id_CABMS = sa_informatico.Id_CABMS   and  sa_inventario.Id_ConsecutivoInv = sa_informatico.Id_ConsecutivoInv) and
								$WhereP 
						        $WhereBetween2  ";
						$RSet=$objGrid->Query($sql);
						$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
						<tbody>";
						$i=0;
						while($fila=mysql_fetch_array($RSet))
						{
						$i++;
						
						$FliexGrid.="
						<tr>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[CveUsuario]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ConsecutivoInv]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaRegistro]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMarca]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMouseMarca]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTecladoMarca]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vProcesador]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[VModelo]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vRam]</td>
						<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDiscoDuro]</td>
						</tr>";
						}
						mysql_free_result($RSet);
						$objGrid->Cerrar($con);
						$XSLyPDF="<br><table border=\"0\">
						<tr>
						<th><img id=\"BtnExportarPDF\" src=\"../../interfaz_modulos/botones/exportar_pdf.jpg\" name=\"ImagePdf\" width=\"120\" height=\"45\" border=\"0\" id=\"ImagePdf\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Pdf_informatico();\"/></th>
						<td>&nbsp;</td>
						<th></th>
						<td>&nbsp;</td>
						<th><img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls_informatico();\"/></th>
						</tr>
						</table>";
						$FliexGrid.="       </tbody>
						</table><script>$('.flexme1').flexigrid({
								title: '',
								colModel : [
						
						
								{display: 'Cve.Usuario', name : 'Cve. Usuario', width :100, sortable :false, align: 'center'},
								{display: 'No.Inventario', name : 'No. Inventario', width :100, sortable :false, align: 'center'},
								{display: 'Fecha Registro', name : 'Fecha Registro', width :100, sortable :false, align: 'center'},
								{display: 'Marca', name : 'Marca', width :200, sortable :false, align: 'center'},
								{display: 'Mouse', name : 'Mouse', width :200, sortable :false, align: 'center'},
								{display: 'Teclado', name : 'Teclado', width :100, sortable :false, align: 'center'},
								{display: 'Procesador', name : 'Procesador', width :100, sortable :false, align: 'center'},
								{display: 'Modelo', name : 'Modelo', width :100, sortable :false, align: 'center'},
								{display: 'Ram', name : 'Ram', width :100, sortable :false, align: 'center'},
								{display: 'Disco Duro', name : 'Disco Duro', width :100, sortable :false, align: 'center'}
						
								],
								buttons : [
								{name: '',onpress:saver_Order},
								{separator: true}
								],
								width: 840,
								height: 250
						}
							
						);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form><center>$XSLyPDF</center>";
						return $FliexGrid;
					}
					function generar_reporte_vehiculo($AData)
					{
					
						$txtIdEmpleadoInicial=$AData->txtIdEmpleadoInicial;
						$txtIdEmpleadoFinal=$AData->txtIdEmpleadoFinal;
						$txtAreaInicial=$AData->txtAreaInicial;
						$txtAreaFinal=$AData->txtAreaFinal;
						$txtInventarioInicial=$AData->txtInventarioInicial;
						$txtInventarioFinal=$AData->txtInventarioFinal;
						$txtFechaInicial=$AData->txtFechaInicial;
						$txtFechaFinal=$AData->txtFechaFinal;
						$txtMovimientoInicial->txtMovimientoInicial;
						$txtMovimientoFinal->txtMovimientoFinal;
						$chkBVehiculoManual=$AData->chkBVehiculoManual;
						$chkVehiculoHidraulica=$AData->chkVehiculoHidraulica;
						$chkVehiculoAmbas=$AData->chkVehiculoAmbas;
						$chkVehiculoDireccionStandar=$AData->chkVehiculoDireccionStandar;
						$chkVehiculoDireccionAutomatica=$AData->chkVehiculoDireccionAutomatica;
						$chkVehiculoDireccionAmbas=$AData->chkVehiculoDireccionAmbas;
						
						/* where  Principal */
						$WhereP ="";
						if(!empty($txtIdEmpleadoInicial) && !empty($txtIdEmpleadoFinal))
						{
							$WhereP .= "sa_inventario.CveUsuario Between '$txtIdEmpleadoInicial' and '$txtIdEmpleadoFinal' or ";
						}
						/*if(!empty($txtAreaInicial) && !empty($txtAreaFinal))
						 {
						$WhereP .= "sa_invetario.vMarca Between '$txtAreaInicial' and '$txtAreaFinal' or ";
						}*/
						if(!empty($txtInventarioInicial) && !empty($txtInventarioFinal))
						{
							$WhereP .= "sa_inventario.Id_ConsecutivoInv Between '$txtInventarioInicial' and '$txtInventarioFinal' or ";
						}
						if(!empty($txtFechaInicial) && !empty($txtFechaFinal))
						{
							$WhereP .= "sa_inventario.dFechaRegistro Between '$txtFechaInicial' and '$txtFechaFinal' or ";
						}
						$WhereP = substr($WhereP, 0, -3);
						if(!empty($WhereP))
						{
							$WhereP="($WhereP) and";
						}
						$where ="";
						if($chkBVehiculoManual=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='M' or ";
						}
						if($chkBVehiculoManual=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='H' or ";
						}
						if($chkBVehiculoManual=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='A' or ";
						}
						if($chkVehiculoDireccionStandar=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='DS' or ";
						}
						if($chkVehiculoDireccionAutomatica=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='DA' or ";
						}
						if($chkVehiculoDireccionAmbas=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='AM' or ";
						}
						$where= substr($where, 0, -3);
						if(!empty($where))
						{
							$where2 ="and ($where)";
						}
						$txtMarcaVehiculoInicio=$AData->txtMarcaVehiculoInicio;
						$txtMarcaVehiculoFinal=$AData->txtMarcaVehiculoFinal;
						$txtTipoVehiculoInicio=$AData->txtTipoVehiculoInicio;
						$txtTipoVehiculoFinal=$AData->txtTipoVehiculoFinal;
						$txtModeloVehiculoInicio=$AData->txtModeloVehiculoInicio;
						$txtModeloVehiculoFinal=$AData->txtModeloVehiculoFinal;
						$WhereBetween =" ";
						if(!empty($txtMarcaVehiculoInicio) && !empty($txtMarcaVehiculoFinal))
						{
							$WhereBetween .= "sa_vehiculo.vMarca Between '$txtMarcaVehiculoInicio' and '$txtMarcaVehiculoFinal' or ";
						}
						if(!empty($txtTipoVehiculoInicio) && !empty($txtTipoVehiculoFinal))
						{
							$WhereBetween .= "sa_vehiculo.vTipo Between '$txtTipoVehiculoInicio' and '$txtTipoVehiculoFinal' or ";
						}
						if(!empty($txtModeloVehiculoInicio) && !empty($txtModeloVehiculoFinal))
						{
							$WhereBetween .= "sa_vehiculo.vModelo Between '$txtModeloVehiculoInicio' and '$txtModeloVehiculoInicio' or ";
						}
						$WhereBetween = substr($WhereBetween, 0, -3);
						if(!empty($WhereBetween))
						{
							$WhereBetween2="($WhereBetween)";
						}
						$objGrid = new poolConnection();
						$con=$objGrid->Conexion();
						$objGrid->BaseDatos();
						$sql="SELECT
						sa_inventario.CveUsuario,
						sa_inventario.Id_ConsecutivoInv,
						sa_inventario.dFechaRegistro,
						sa_vehiculo.vMarca,
						sa_vehiculo.vModelo,
						sa_vehiculo.vTipo,
						sa_vehiculo.cTipoTransmision,
						sa_vehiculo.cTipoDireccion,
						sa_vehiculo.vNumSerie,
						sa_vehiculo.vNumMotor,
						sa_vehiculo.vPlacas
						FROM
						sa_inventario,
						sa_vehiculo
						Where
						(sa_inventario.Id_CABMS = sa_vehiculo.Id_CABMS   and  sa_inventario.Id_ConsecutivoInv = sa_vehiculo.Id_ConsecutivoInv) and
						$WhereBetween2
						$where2 
						";
						$RSet=$objGrid->Query($sql);
						$XSLyPDF="<br><table border=\"0\">
						<tr>
						<th><img id=\"BtnExportarPDF\" src=\"../../interfaz_modulos/botones/exportar_pdf.jpg\" name=\"ImagePdf\" width=\"120\" height=\"45\" border=\"0\" id=\"ImagePdf\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Pdf_vehiculo();\"/></th>
						<td>&nbsp;</td>
						<th></th>
						<td>&nbsp;</td>
						<th><img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_XLS_vehiculo();\"/></th>
						</tr>
						</table>";
						$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
						<tbody>";
						$i=0;
						while($fila=mysql_fetch_array($RSet))
						{
							$i++;
					
							$FliexGrid.="
							<tr>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[CveUsuario]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ConsecutivoInv]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaRegistro]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vMarca]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vModelo]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTipo]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cTipoTransmision]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cTipoDireccion]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNumSerie]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vNumMotor]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vPlacas]</td>
							</tr>";
						}
						mysql_free_result($RSet);
						$objGrid->Cerrar($con);
						$FliexGrid.="       </tbody>
						</table><script>$('.flexme1').flexigrid({
						title: '',
						colModel : [
					
					
						{display: 'Cve. Usuario', name : 'Cve. Usuario', width :100, sortable :false, align: 'center'},
						{display: 'No. Inventario', name : 'No. Inventario', width :100, sortable :false, align: 'center'},
						{display: 'Fecha Registro', name : 'Fecha Registro', width :100, sortable :false, align: 'center'},
						{display: 'Marca', name : 'Tipo', width :200, sortable :false, align: 'center'},
						{display: 'Mouse', name : 'Modelo', width :200, sortable :false, align: 'center'},
						{display: 'Teclado', name : 'Pedestal', width :100, sortable :false, align: 'center'},
						{display: 'Procesador', name : 'Fija', width :100, sortable :false, align: 'center'},
						{display: 'Modelo', name : 'Giratoria', width :100, sortable :false, align: 'center'},
						{display: 'Ram', name : 'Rodajas', width :100, sortable :false, align: 'center'},
						{display: 'Disco Duro', name : 'Plegable', width :100, sortable :false, align: 'center'}
					
						],
						buttons : [
						{name: '',onpress:saver_Order},
						{separator: true}
						],
						width: 840,
						height: 250
					}
						
					);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form><center>$XSLyPDF</center>";
						
					return $FliexGrid;
					}
					function generar_reporte_acervo($AData)
					{
						$txtIdEmpleadoInicial=$AData->txtIdEmpleadoInicial;
						$txtIdEmpleadoFinal=$AData->txtIdEmpleadoFinal;
						$txtAreaInicial=$AData->txtAreaInicial;
						$txtAreaFinal=$AData->txtAreaFinal;
						$txtInventarioInicial=$AData->txtInventarioInicial;
						$txtInventarioFinal=$AData->txtInventarioFinal;
						$txtMovimientoInicial->txtMovimientoInicial;
						$txtMovimientoFinal->txtMovimientoFinal;
						$txtFechaInicial=$AData->txtFechaInicial;
						$txtFechaFinal=$AData->txtFechaFinal;
						$txtAutorAcervoInicio=$AData->txtAutorAcervoInicio;
		       			$txtAutorAcervoFinal=$AData->txtAutorAcervoFinal;
		       			$txtTituloAcervoInicio=$AData->txtTituloAcervoInicio;
		       			$txtTituloAcervoFinal=$AData->txtTituloAcervoFinal;
		       			$txtUbicacionAcervoInicio=$AData->txtUbicacionAcervoInicio;
		       			$txtUbicacionAcervoFinal=$AData->txtUbicacionAcervoFinal;
		       			/* where  Principal */
		       			$WhereP ="";
		       			if(!empty($txtIdEmpleadoInicial) && !empty($txtIdEmpleadoFinal))
		       			{
		       				$WhereP .= "sa_inventario.CveUsuario Between '$txtIdEmpleadoInicial' and '$txtIdEmpleadoFinal' or ";
		       			}
		       			/*if(!empty($txtAreaInicial) && !empty($txtAreaFinal))
		       			 {
		       			$WhereP .= "sa_invetario.vMarca Between '$txtAreaInicial' and '$txtAreaFinal' or ";
		       			}*/
		       			if(!empty($txtInventarioInicial) && !empty($txtInventarioFinal))
		       			{
		       				$WhereP .= "sa_inventario.Id_ConsecutivoInv Between '$txtInventarioInicial' and '$txtInventarioFinal' or ";
		       			}
		       			if(!empty($txtFechaInicial) && !empty($txtFechaFinal))
		       			{
		       				$WhereP .= "sa_inventario.dFechaRegistro Between '$txtFechaInicial' and '$txtFechaFinal' or ";
		       			}
		       			$WhereP = substr($WhereP, 0, -3);
		       			if(!empty($WhereP))
		       			{
		       				$WhereP="($WhereP) and";
		       			}
		       			$WhereBetween =" ";
						
						if(!empty($txtAutorAcervoInicio) && !empty($txtAutorAcervoFinal))
						{
							$WhereBetween .= "sa_acervo.vAutor Between '$txtAutorAcervoInicio' and '$txtAutorAcervoFinal' or ";
						}
						if(!empty($txtTituloAcervoInicio) && !empty($txtTituloAcervoFinal))
						{
							$WhereBetween .= "sa_acervo.vTitulo Between '$txtTituloAcervoInicio' and '$txtTituloAcervoFinal' or ";
						}
						if(!empty($txtUbicacionAcervoInicio) && !empty($txtUbicacionAcervoFinal))
						{
							$WhereBetween .= "sa_acervo.vUbicacion Between '$txtUbicacionAcervoInicio' and '$txtUbicacionAcervoFinal' or ";
						}
						$WhereBetween = substr($WhereBetween, 0, -3);
						if(!empty($WhereBetween))
						{
							$WhereBetween2="($WhereBetween)";
						}
						$objGrid = new poolConnection();
						$con=$objGrid->Conexion();
						$objGrid->BaseDatos();
						$sql="SELECT
						sa_inventario.CveUsuario,
						sa_inventario.Id_ConsecutivoInv,
						sa_inventario.dFechaRegistro,
						sa_acervo.vAutor,
						sa_acervo.vTitulo,
						sa_acervo.vUbicacion
						FROM
						sa_inventario,
						sa_acervo
						Where
						(sa_inventario.Id_CABMS = sa_acervo.Id_CABMS   and  sa_inventario.Id_ConsecutivoInv = sa_acervo.Id_ConsecutivoInv) and
						$WhereP
						$WhereBetween2";
						$RSet=$objGrid->Query($sql);
						$XSLyPDF="<br><table border=\"0\">
						<tr>
						<th><img id=\"BtnExportarPDF\" src=\"../../interfaz_modulos/botones/exportar_pdf.jpg\" name=\"ImagePdf\" width=\"120\" height=\"45\" border=\"0\" id=\"ImagePdf\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Pdf_acervo();\"/></th>
						<td>&nbsp;</td>
						<th></th>
						<td>&nbsp;</td>
						<th><img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls_acervo();\"/></th>
						</tr>
						</table>";
						$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
						<tbody>";
						$i=0;
						while($fila=mysql_fetch_array($RSet))
						{
							$i++;
								
							$FliexGrid.="
							<tr>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[CveUsuario]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ConsecutivoInv]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaRegistro]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vAutor]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vTitulo]</td>
							<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vUbicacion]</td></tr>";
						}
						mysql_free_result($RSet);
						$objGrid->Cerrar($con);
						$FliexGrid.="       </tbody>
						</table><script>$('.flexme1').flexigrid({
						title: '',
						colModel : [
							
							
						{display: 'Cve. Usuario', name : 'Cve. Usuario', width :100, sortable :false, align: 'center'},
						{display: 'No. Inventario', name : 'No. Inventario', width :100, sortable :false, align: 'center'},
						{display: 'Fecha Registro', name : 'Fecha Registro', width :100, sortable :false, align: 'center'},
						{display: 'Autor', name : 'Autor', width :200, sortable :false, align: 'center'},
						{display: 'Titulo', name : 'Titulo', width :200, sortable :false, align: 'center'},
						{display: 'Ubicacion', name : 'Ubicacion', width :100, sortable :false, align: 'center'}
						],
						buttons : [
						{name: '',onpress:saver_Order},
						{separator: true}
						],
						width: 840,
						height: 250
					}
					
					);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form><center>$XSLyPDF</center>";
					
					return $FliexGrid;
					}
			function print_muebles_pdf($AData)
					{
								$txtIdEmpleadoInicial=$AData->txtIdEmpleadoInicial;
								$txtIdEmpleadoFinal=$AData->txtIdEmpleadoFinal;
								$txtAreaInicial=$AData->txtAreaInicial;
								$txtAreaFinal=$AData->txtAreaFinal;
								$txtInventarioInicial=$AData->txtInventarioInicial;
								$txtInventarioFinal=$AData->txtInventarioFinal;
								$txtFechaInicial=$AData->txtFechaInicial;
								$txtFechaFinal=$AData->txtFechaFinal;
								$txtMarcaMuebleInicio=$AData->txtMarcaMuebleInicio;
								$txtMarcaMuebleFinal=$AData->txtMarcaMuebleFinal;
								$txtMuebleTipoInicial=$AData->txtMuebleTipoInicial;
								$txtMuebleTipoFinal=$AData->txtMuebleTipoFinal;
								$txtMuebleModeloInicial=$AData->txtMuebleModeloInicial;
								$txtMuebleModeloFinal=$AData->txtMuebleModeloFinal;
								$chkMueblePedestal=$AData->chkMueblePedestal;
								$chkMuebleFija=$AData->chkMuebleFija;
								$chkMuebleGiratoria=$AData->chkMuebleGiratoria;
								$chkMuebleRodajas=$AData->chkMuebleRodajas;
								$chkMueblePlegable=$AData->chkMueblePlegable;
								$chkMuebleCajones=$AData->chkMuebleCajones;
								$chkMuebleGavetas=$AData->chkMuebleGavetas;
								$chkMuebleEntrepano=$AData->chkMuebleEntrepano;
								$chkMuebleSerie=$AData->chkMuebleSerie;
								/* where  Principal */
								$WhereP ="";
								if(!empty($txtIdEmpleadoInicial) && !empty($txtIdEmpleadoFinal))
								{
									$WhereP .= "sa_inventario.CveUsuario Between '$txtIdEmpleadoInicial' and '$txtIdEmpleadoFinal' or ";
								}
								/*if(!empty($txtAreaInicial) && !empty($txtAreaFinal))
								 {
								$WhereP .= "sa_invetario.vMarca Between '$txtAreaInicial' and '$txtAreaFinal' or ";
								}*/
								if(!empty($txtInventarioInicial) && !empty($txtInventarioFinal))
								{
									$WhereP .= "sa_inventario.Id_ConsecutivoInv Between '$txtInventarioInicial' and '$txtInventarioFinal' or ";
								}
								if(!empty($txtFechaInicial) && !empty($txtFechaFinal))
								{
									$WhereP .= "sa_inventario.dFechaRegistro Between '$txtFechaInicial' and '$txtFechaFinal' or ";
								}
								$WhereP = substr($WhereP, 0, -3);
								if(!empty($WhereP))
								{
									$WhereP="($WhereP) and";
								}
								/*Where de between */
								$WhereBetween =" ";
								if(!empty($txtMarcaMuebleInicio))
								{
									$WhereBetween .= "sa_mueble.vMarca Between '$txtMarcaMuebleInicio' and '$txtMarcaMuebleFinal' or ";
								}
								if(!empty($txtMuebleTipoInicial))
								{
									$WhereBetween .= "sa_mueble.vTipo Between '$txtMuebleTipoInicial' and '$txtMuebleTipoFinal' or ";
								}
								if(!empty($txtMuebleModeloInicial))
								{
									$WhereBetween .= "sa_mueble.vModelo Between '$txtMuebleModeloInicial' and '$txtMuebleModeloFinal' or ";
								}
								$WhereBetween = substr($WhereBetween, 0, -3);
								if(!empty($WhereBetween))
								{
									$WhereBetween2="($WhereBetween)";
								}
								/* Where para los checkbox*/
								if($chkMueblePedestal=="Si")
								{
									$where .="sa_mueble.bPedestal='-1' or ";
								}
								if($chkMuebleFija=="Si")
								{
									$where .="sa_mueble.bFija ='-1' or ";
								}
								
								if($chkMuebleGiratoria=="Si")
								{
									$where .="sa_mueble.bGiratoria='-1' or ";
								}
								if($chkMuebleRodajas=="Si")
								{
									$where .="sa_mueble.bRodajas='-1' or ";
								}
								if($chkMueblePlegable=="Si")
								{
									$where .="sa_mueble.bPlegable='-1' or ";
								}
								if($chkMuebleCajones=="Si")
								{
									$where .="sa_mueble.eNoCajon='-1' or ";
								}
								
								if($chkMuebleEntrepano=="Si")
								{
									$where .="sa_mueble.eNoCajon='-1' or ";
								}
								if($chkMuebleSerie=="Si")
								{
									$where .="sa_mueble.vNumSerie='-1' or ";
								}
								$where = substr($where , 0, -4);
								if(!empty($where))
								{
									$where2 ="and ($where)";
								}
						
						$StrConsulta="SELECT
									sa_inventario.CveUsuario,
									sa_inventario.Id_ConsecutivoInv,
									sa_inventario.dFechaRegistro,
									sa_mueble.vMarca,
									sa_mueble.vTipo,
									sa_mueble.vModelo,
									sa_mueble.bPedestal,
									sa_mueble.bFija,
									sa_mueble.bGiratoria,
									sa_mueble.bRodajas,
									sa_mueble.bPlegable,
									sa_mueble.eNoCajon,
									sa_mueble.eNoEntrepanio
									FROM 
									sa_inventario,
									sa_mueble
									Where
									(sa_inventario.Id_CABMS = sa_mueble.Id_CABMS   and  sa_inventario.Id_ConsecutivoInv = sa_mueble.Id_ConsecutivoInv) and
									$WhereP
									$WhereBetween2
									$where2";
									$objDatosPDF = new poolConnection();
									$con=$objDatosPDF->Conexion();
									$objDatosPDF -> BaseDatos();	
									$RSet = $objDatosPDF ->Query($StrConsulta);
									$Catalogo = array();
									while ($Row = mysql_fetch_array($RSet)){
					
										$Catalogo[] = array(
											$Row["CveUsuario"],
											$Row["Id_ConsecutivoInv"],
											$Row["dFechaRegistro"],
											$Row["vMarca"],
											$Row["vTipo"],
											$Row["vModelo"],
											$Row["bPedestal"],
											$Row["bFija"],
											$Row["bGiratoria"],
											$Row["bRodajas"],
										    $Row["bPlegable"],
											$Row["eNoCajon"],
										    $Row["eNoEntrepanio"]
											);
										}
							
									mysql_free_result($RSet);
									$objDatosPDF->Cerrar($con);
								 	return $Catalogo;
					}	
					function print_informatico_pdf($AData)
					{
								$txtIdEmpleadoInicial=$AData->txtIdEmpleadoInicial;
								$txtIdEmpleadoFinal=$AData->txtIdEmpleadoFinal;
								$txtAreaInicial=$AData->txtAreaInicial;
								$txtAreaFinal=$AData->txtAreaFinal;
								$txtInventarioInicial=$AData->txtInventarioInicial;
								$txtInventarioFinal=$AData->txtInventarioFinal;
								$txtFechaInicial=$AData->txtFechaInicial;
								$txtFechaFinal=$AData->txtFechaFinal;
								$txtMarcaBienInfomaticoInicio=$AData->txtMarcaBienInfomaticoInicio;
								$txtMarcaBienInfomaticoFinal=$AData->txtMarcaBienInfomaticoFinal;
								$txtMarcaMouseInformaticoInicio=$AData->txtMarcaMouseInformaticoInicio;
								$txtMarcaMouseInformaticoFinal=$AData->txtMarcaMouseInformaticoFinal;
								$txtMarcaTecladoInformaticoInicio=$AData->txtMarcaTecladoInformaticoInicio;
								$txtMarcaTecladoInformaticoFinal=$AData->txtMarcaTecladoInformaticoFinal;
								$txtMarcaProcesadorInformaticoInicio=$AData->txtMarcaProcesadorInformaticoInicio;
								$txtMarcaProcesadorInformaticoFinal=$AData->txtMarcaProcesadorInformaticoFinal;
								$txtMarcaMarcaInformaticoInicio=$AData->txtMarcaMarcaInformaticoInicio;
								$txtMarcaMarcaInformaticoFinal=$AData->txtMarcaMarcaInformaticoFinal;
								$txtMarcaRamInformaticoInicio=$AData->txtMarcaRamInformaticoInicio;
								$txtMarcaRamInformaticoFinal=$AData->txtMarcaRamInformaticoFinal;
								$txtMarcaDdInformaticoInicio=$AData->txtMarcaDdInformaticoInicio;
								$txtMarcaDdInformaticoFinal=$AData->txtMarcaDdInformaticoFinal;
								
								/* where  Principal */
								$WhereP ="";
								if(!empty($txtIdEmpleadoInicial) && !empty($txtIdEmpleadoFinal))
								{
									$WhereP .= "sa_inventario.CveUsuario Between '$txtIdEmpleadoInicial' and '$txtIdEmpleadoFinal' or ";
								}
								/*if(!empty($txtAreaInicial) && !empty($txtAreaFinal))
								 {
								$WhereP .= "sa_invetario.vMarca Between '$txtAreaInicial' and '$txtAreaFinal' or ";
								}*/
								if(!empty($txtInventarioInicial) && !empty($txtInventarioFinal))
								{
									$WhereP .= "sa_inventario.Id_ConsecutivoInv Between '$txtInventarioInicial' and '$txtInventarioFinal' or ";
								}
								if(!empty($txtFechaInicial) && !empty($txtFechaFinal))
								{
									$WhereP .= "sa_inventario.dFechaRegistro Between '$txtFechaInicial' and '$txtFechaFinal' or ";
								}
								$WhereP = substr($WhereP, 0, -3);
								if(!empty($WhereP))
								{
									$WhereP="($WhereP) and";
								}
								
								
								
								$WhereBetween =" ";
								if(!empty($txtMarcaBienInfomaticoInicio) && !empty($txtMarcaBienInfomaticoFinal))
								{
									$WhereBetween .= "sa_informatico.vMarca Between '$txtMarcaBienInfomaticoInicio' and '$txtMarcaBienInfomaticoFinal' or ";
								}
								if(!empty($txtMarcaMouseInformaticoInicio) && !empty($txtMarcaMouseInformaticoFinal))
								{
									$WhereBetween .= "sa_informatico.vMouseMarca Between '$txtMarcaMouseInformaticoInicio' and '$txtMarcaMouseInformaticoFinal' or ";
								}
								if(!empty($txtMarcaTecladoInformaticoInicio) && !empty($txtMarcaTecladoInformaticoFinal))
								{
									$WhereBetween .= "sa_informatico.vTecladoMarca Between '$txtMarcaTecladoInformaticoInicio' and '$txtMarcaTecladoInformaticoFinal' or ";
								}
								if(!empty($txtMarcaProcesadorInformaticoInicio) && !empty($txtMarcaProcesadorInformaticoFinal))
								{
									$WhereBetween .= "sa_informatico.vProcesador Between '$txtMarcaProcesadorInformaticoInicio' and '$txtMarcaProcesadorInformaticoFinal' or ";
								}
								/*if(!empty() && !empty())
								 {
								$WhereBetween .= "sa_informatico.VModelo Between 'dellopteplex' and 'dellopteplex' or ";
									
								}*/
								if(!empty($txtMarcaRamInformaticoInicio) && !empty($txtMarcaRamInformaticoFinal))
								{
									$WhereBetween .= "sa_informatico.vRam between '$txtMarcaRamInformaticoInicio' and '$txtMarcaRamInformaticoFinal' or ";
								}
								if(!empty($txtMarcaDdInformaticoInicio) && !empty($txtMarcaDdInformaticoFinal))
								{
									$WhereBetween .= " sa_informatico.vDiscoDuro Between '$txtMarcaDdInformaticoInicio' and '$txtMarcaDdInformaticoFinal' or ";
								}
								$WhereBetween = substr($WhereBetween, 0, -3);
								if(!empty($WhereBetween))
								{
									$WhereBetween2="($WhereBetween)";
								}
								
								$StrConsulta="SELECT
								sa_inventario.CveUsuario,
								sa_inventario.Id_ConsecutivoInv,
								sa_inventario.dFechaRegistro,
								sa_informatico.vMarca,
								sa_informatico.vMouseMarca,
								sa_informatico.vTecladoMarca,
								sa_informatico.vProcesador,
								sa_informatico.vModelo,
								sa_informatico.vRam,
								sa_informatico.vDiscoDuro
								FROM
								sa_inventario,
								sa_informatico
								Where
								(sa_inventario.Id_CABMS = sa_informatico.Id_CABMS   and  sa_inventario.Id_ConsecutivoInv = sa_informatico.Id_ConsecutivoInv) and
								$WhereP
								$WhereBetween2  ";
								$objDatosPDF = new poolConnection();
								$con=$objDatosPDF->Conexion();
								$objDatosPDF -> BaseDatos();
								$RSet = $objDatosPDF ->Query($StrConsulta);
								$Catalogo = array();
								while ($Row = mysql_fetch_array($RSet)){
										
									$Catalogo[] = array(
											$Row["CveUsuario"],
											$Row["Id_ConsecutivoInv"],
											$Row["dFechaRegistro"],
											$Row["vMarca"],
											$Row["vMouseMarca"],
											$Row["vTecladoMarca"],
											$Row["vProcesador"],
											$Row["vModelo"],
											$Row["vRam"],
											$Row["vDiscoDuro"]
									);
								}
									
								mysql_free_result($RSet);
								$objDatosPDF->Cerrar($con);
								return $Catalogo;
					}
			function print_vehiculo_pdf($AData)
			{
						
						$txtIdEmpleadoInicial=$AData->txtIdEmpleadoInicial;
						$txtIdEmpleadoFinal=$AData->txtIdEmpleadoFinal;
						$txtAreaInicial=$AData->txtAreaInicial;
						$txtAreaFinal=$AData->txtAreaFinal;
						$txtInventarioInicial=$AData->txtInventarioInicial;
						$txtInventarioFinal=$AData->txtInventarioFinal;
						$txtFechaInicial=$AData->txtFechaInicial;
						$txtFechaFinal=$AData->txtFechaFinal;
						$txtMovimientoInicial->txtMovimientoInicial;
						$txtMovimientoFinal->txtMovimientoFinal;
						$chkBVehiculoManual=$AData->chkBVehiculoManual;
						$chkVehiculoHidraulica=$AData->chkVehiculoHidraulica;
						$chkVehiculoAmbas=$AData->chkVehiculoAmbas;
						$chkVehiculoDireccionStandar=$AData->chkVehiculoDireccionStandar;
						$chkVehiculoDireccionAutomatica=$AData->chkVehiculoDireccionAutomatica;
						$chkVehiculoDireccionAmbas=$AData->chkVehiculoDireccionAmbas;
						
						/* where  Principal */
						$WhereP ="";
						if(!empty($txtIdEmpleadoInicial) && !empty($txtIdEmpleadoFinal))
						{
							$WhereP .= "sa_inventario.CveUsuario Between '$txtIdEmpleadoInicial' and '$txtIdEmpleadoFinal' or ";
						}
						/*if(!empty($txtAreaInicial) && !empty($txtAreaFinal))
						 {
						$WhereP .= "sa_invetario.vMarca Between '$txtAreaInicial' and '$txtAreaFinal' or ";
						}*/
						if(!empty($txtInventarioInicial) && !empty($txtInventarioFinal))
						{
							$WhereP .= "sa_inventario.Id_ConsecutivoInv Between '$txtInventarioInicial' and '$txtInventarioFinal' or ";
						}
						if(!empty($txtFechaInicial) && !empty($txtFechaFinal))
						{
							$WhereP .= "sa_inventario.dFechaRegistro Between '$txtFechaInicial' and '$txtFechaFinal' or ";
						}
						$WhereP = substr($WhereP, 0, -3);
						if(!empty($WhereP))
						{
							$WhereP="($WhereP) and";
						}
						$where ="";
						if($chkBVehiculoManual=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='M' or ";
						}
						if($chkBVehiculoManual=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='H' or ";
						}
						if($chkBVehiculoManual=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='A' or ";
						}
						if($chkVehiculoDireccionStandar=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='DS' or ";
						}
						if($chkVehiculoDireccionAutomatica=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='DA' or ";
						}
						if($chkVehiculoDireccionAmbas=="Si")
						{
							$where .="sa_vehiculo.cTipoTransmision='AM' or ";
						}
						$where= substr($where, 0, -3);
						if(!empty($where))
						{
							$where2 ="and ($where)";
						}
						$txtMarcaVehiculoInicio=$AData->txtMarcaVehiculoInicio;
						$txtMarcaVehiculoFinal=$AData->txtMarcaVehiculoFinal;
						$txtTipoVehiculoInicio=$AData->txtTipoVehiculoInicio;
						$txtTipoVehiculoFinal=$AData->txtTipoVehiculoFinal;
						$txtModeloVehiculoInicio=$AData->txtModeloVehiculoInicio;
						$txtModeloVehiculoFinal=$AData->txtModeloVehiculoFinal;
						$WhereBetween =" ";
						if(!empty($txtMarcaVehiculoInicio) && !empty($txtMarcaVehiculoFinal))
						{
							$WhereBetween .= "sa_vehiculo.vMarca Between '$txtMarcaVehiculoInicio' and '$txtMarcaVehiculoFinal' or ";
						}
						if(!empty($txtTipoVehiculoInicio) && !empty($txtTipoVehiculoFinal))
						{
							$WhereBetween .= "sa_vehiculo.vTipo Between '$txtTipoVehiculoInicio' and '$txtTipoVehiculoFinal' or ";
						}
						if(!empty($txtModeloVehiculoInicio) && !empty($txtModeloVehiculoFinal))
						{
							$WhereBetween .= "sa_vehiculo.vModelo Between '$txtModeloVehiculoInicio' and '$txtModeloVehiculoInicio' or ";
						}
						$WhereBetween = substr($WhereBetween, 0, -3);
						if(!empty($WhereBetween))
						{
							$WhereBetween2="($WhereBetween)";
						}
						
						$StrConsulta="SELECT
						sa_inventario.CveUsuario,
						sa_inventario.Id_ConsecutivoInv,
						sa_inventario.dFechaRegistro,
						sa_vehiculo.vMarca,
						sa_vehiculo.vModelo,
						sa_vehiculo.vTipo,
						sa_vehiculo.cTipoTransmision,
						sa_vehiculo.cTipoDireccion,
						sa_vehiculo.vNumSerie,
						sa_vehiculo.vNumMotor,
						sa_vehiculo.vPlacas
						FROM
						sa_inventario,
						sa_vehiculo
						Where
						(sa_inventario.Id_CABMS = sa_vehiculo.Id_CABMS   and  sa_inventario.Id_ConsecutivoInv = sa_vehiculo.Id_ConsecutivoInv) and
						$WhereBetween2
						$where2 
						";
						
								$objDatosPDF = new poolConnection();
								$con=$objDatosPDF->Conexion();
								$objDatosPDF -> BaseDatos();
								$RSet = $objDatosPDF ->Query($StrConsulta);
								$Catalogo = array();
								while ($Row = mysql_fetch_array($RSet)){
								
									$Catalogo[] = array(
											$Row["CveUsuario"],
											$Row["Id_ConsecutivoInv"],
											$Row["dFechaRegistro"],
											$Row["vMarca"],
											$Row["vModelo"],
											$Row["vTipo"],
											$Row["cTipoTransmision"],
											$Row["cTipoDireccion"],
											$Row["vNumSerie"],
											$Row["vNumMotor"],
											$Row["vPlacas"]
									);
								}
									
								mysql_free_result($RSet);
								$objDatosPDF->Cerrar($con);
								return $Catalogo;
			}	
	function print_acervo_pdf($AData)
	  {
	  			
			  	$txtIdEmpleadoInicial=$AData->txtIdEmpleadoInicial;
			  	$txtIdEmpleadoFinal=$AData->txtIdEmpleadoFinal;
			  	$txtAreaInicial=$AData->txtAreaInicial;
			  	$txtAreaFinal=$AData->txtAreaFinal;
			  	$txtInventarioInicial=$AData->txtInventarioInicial;
			  	$txtInventarioFinal=$AData->txtInventarioFinal;
			  	$txtMovimientoInicial->txtMovimientoInicial;
			  	$txtMovimientoFinal->txtMovimientoFinal;
			  	$txtFechaInicial=$AData->txtFechaInicial;
			  	$txtFechaFinal=$AData->txtFechaFinal;
			  	$txtAutorAcervoInicio=$AData->txtAutorAcervoInicio;
			  	$txtAutorAcervoFinal=$AData->txtAutorAcervoFinal;
			  	$txtTituloAcervoInicio=$AData->txtTituloAcervoInicio;
			  	$txtTituloAcervoFinal=$AData->txtTituloAcervoFinal;
			  	$txtUbicacionAcervoInicio=$AData->txtUbicacionAcervoInicio;
			  	$txtUbicacionAcervoFinal=$AData->txtUbicacionAcervoFinal;
			  	/* where  Principal */
			  	$WhereP ="";
			  	if(!empty($txtIdEmpleadoInicial) && !empty($txtIdEmpleadoFinal))
			  	{
			  		$WhereP .= "sa_inventario.CveUsuario Between '$txtIdEmpleadoInicial' and '$txtIdEmpleadoFinal' or ";
			  	}
			  	/*if(!empty($txtAreaInicial) && !empty($txtAreaFinal))
			  	 {
			  	$WhereP .= "sa_invetario.vMarca Between '$txtAreaInicial' and '$txtAreaFinal' or ";
			  	}*/
			  	if(!empty($txtInventarioInicial) && !empty($txtInventarioFinal))
			  	{
			  		$WhereP .= "sa_inventario.Id_ConsecutivoInv Between '$txtInventarioInicial' and '$txtInventarioFinal' or ";
			  	}
			  	if(!empty($txtFechaInicial) && !empty($txtFechaFinal))
			  	{
			  		$WhereP .= "sa_inventario.dFechaRegistro Between '$txtFechaInicial' and '$txtFechaFinal' or ";
			  	}
			  	$WhereP = substr($WhereP, 0, -3);
			  	if(!empty($WhereP))
			  	{
			  		$WhereP="($WhereP) and";
			  	}
			  	$WhereBetween =" ";
			  	
			  	if(!empty($txtAutorAcervoInicio) && !empty($txtAutorAcervoFinal))
			  	{
			  		$WhereBetween .= "sa_acervo.vAutor Between '$txtAutorAcervoInicio' and '$txtAutorAcervoFinal' or ";
			  	}
			  	if(!empty($txtTituloAcervoInicio) && !empty($txtTituloAcervoFinal))
			  	{
			  		$WhereBetween .= "sa_acervo.vTitulo Between '$txtTituloAcervoInicio' and '$txtTituloAcervoFinal' or ";
			  	}
			  	if(!empty($txtUbicacionAcervoInicio) && !empty($txtUbicacionAcervoFinal))
			  	{
			  		$WhereBetween .= "sa_acervo.vUbicacion Between '$txtUbicacionAcervoInicio' and '$txtUbicacionAcervoFinal' or ";
			  	}
			  	$WhereBetween = substr($WhereBetween, 0, -3);
			  	if(!empty($WhereBetween))
			  	{
			  		$WhereBetween2="($WhereBetween)";
			  	}
	  			$StrConsulta="SELECT
						sa_inventario.CveUsuario,
						sa_inventario.Id_ConsecutivoInv,
						sa_inventario.dFechaRegistro,
						sa_acervo.vAutor,
						sa_acervo.vTitulo,
						sa_acervo.vUbicacion
						FROM
						sa_inventario,
						sa_acervo
						Where
						(sa_inventario.Id_CABMS = sa_acervo.Id_CABMS   and  sa_inventario.Id_ConsecutivoInv = sa_acervo.Id_ConsecutivoInv) and
						$WhereP2
						$WhereBetween2";
			  	$objDatosPDF = new poolConnection();
			  	$con=$objDatosPDF->Conexion();
			  	$objDatosPDF -> BaseDatos();
			  	$RSet = $objDatosPDF ->Query($StrConsulta);
			  	$Catalogo = array();
			  	while ($Row = mysql_fetch_array($RSet)){
			  	
			  		$Catalogo[] = array(
			  				$Row["CveUsuario"],
			  				$Row["Id_ConsecutivoInv"],
			  				$Row["dFechaRegistro"],
			  				$Row["vAutor"],
			  				$Row["vTitulo"],
			  				$Row["vUbicacion"]
			  		);
			  	}
			  		
			  	mysql_free_result($RSet);
			  	$objDatosPDF->Cerrar($con);
			  	return $Catalogo;
	  }			
}
?>
<?php
class Reporte_Resguardos extends poolConnection
{
	public function buscar_cambs1($AData)
	{
		$Patron=$AData->Patron;
		$Clave=$AData->Clave;
		$Descripcion=$AData->Descripcion;
			
		#Preparamos ware
		if($Clave=="Si")
		{
		$where.="Id_CABMS like '%$Patron%' and ";
		}
			
		if($Descripcion=="Si")
		{
		$where.="vDescripcionCABMS like '%$Patron%' and ";
		}
			
		$where = substr($where, 0, -4);
			
			
		$objGrid = new poolConnection();
		$con=$objGrid->Conexion();
		$objGrid->BaseDatos();
		$sql="SELECT
		sa_cabms.Id_CABMS,
		sa_cabms.vDescripcionCABMS
		FROM
		sa_cabms
		Where  $where";
		$RSet=$objGrid->Query($sql);
		$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
		<tbody>";
		$i=0;
		while($fila=mysql_fetch_array($RSet))
		{
		$i++;
			
		$FliexGrid.="
		<tr>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageA$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageA$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageA$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"select_cambs('$fila[Id_CABMS]','$fila[vDescripcionCABMS]');\">&nbsp;</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
			
		</tr>";
		}
		mysql_free_result($RSet);
		$objGrid->Cerrar($con);
		$FliexGrid.="       </tbody>
		</table><script>$('.flexme1').flexigrid({
		title: '',
		colModel : [
			
		{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
		{display: 'Cambs', name : 'Cambs', width :100, sortable :false, align: 'center'},
		{display: 'Descripcion', name : 'Descripcion', width :400, sortable :false, align: 'center'},
			
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
	 
	public function buscar_inv_empleado($AData)
	{
		$Patron=$AData->Patron;
		$Clave=$AData->Clave;
		$Nombre=$AData->Nombre;
			
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
	
		$FliexGrid.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageEmp$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageEmp$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageEmp$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"select_resguardante('$fila[IdEmpleado]','$fila[Nombres]');\">&nbsp;</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[IdEmpleado]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Nombres]</td>
	
			</tr>";
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
	
	public function data_acervo($idCambs)
	{

		$objData =  new poolConnection();
		$objData->Conexion();
		$objData->BaseDatos();
		$Sql="Select * From sa_acervo Where Id_CABMS='$idCambs'";
		$RSet=$objData->Query($Sql);
		while($row = mysql_fetch_array($RSet))
		{
			$ArrayObj[vCaracteristicas]=$row[vCaracteristicas];
			$ArrayObj[Id_ConsecutivoInv]=$row[Id_ConsecutivoInv];
			$ArrayObj[vUbicacion] = $row[vUbicacion];
			$ArrayObj[vTitulo] = $row[vTitulo];
			$ArrayObj[vAutor] =  $row[vAutor];
		}
		return $ArrayObj;
		
	}

	public function data_informatico($idCambs)
	{
		$objData =  new poolConnection();
		$objData->Conexion();
		$objData->BaseDatos();
		$Sql="Select *  From sa_informatico Where Id_CABMS='$idCambs'";
		$RSet=$objData->Query($Sql);
		while($row = mysql_fetch_array($RSet))
		{
			$ArrayObj[Id_ConsecutivoInv] =  $row[Id_ConsecutivoInv];
			$ArrayObj[vNumSerie] =  $row[vNumSerie];
			$ArrayObj[vMarca] =  $row[vMarca];
			$ArrayObj[vModelo] =  $row[vModelo];
			$ArrayObj[vDiscoDuro] =  $row[vDiscoDuro];
			$ArrayObj[vRAM] =  $row[vRAM];
			$ArrayObj[vProcesador] =  $row[vProcesador];
			$ArrayObj[ePaginaMinuto] =  $row[ePaginaMinuto];
			$ArrayObj[vFuentePoder] =  $row[vFuentePoder];
			$ArrayObj[vCaracteristicas] =  $row[vCaracteristicas];
			$ArrayObj[vMonitorMarca] =  $row[vMonitorMarca];
			$ArrayObj[vMonitorSerie] =  $row[vMonitorSerie];
			$ArrayObj[vTecladoSerie] =  $row[vTecladoSerie];
			$ArrayObj[vTecladoMarca] =  $row[vTecladoMarca];
			$ArrayObj[vMouseMarca] =  $row[vMouseMarca];
			$ArrayObj[vMouseSerie] =  $row[vMouseSerie];
			
		}
		return $ArrayObj;
	}
	public function data_mueble($idCambs)
	{
		
		$objData =  new poolConnection();
		$objData->Conexion();
		$objData->BaseDatos();
		$Sql="Select *  From sa_mueble Where Id_CABMS='$idCambs'";
		$RSet=$objData->Query($Sql);
		while($row = mysql_fetch_array($RSet))
		{
			$ArrayObj[vCaracteristicas] =  $row[vCaracteristicas];
			$ArrayObj[Id_ConsecutivoInv] =  $row[Id_ConsecutivoInv];
			$ArrayObj[vNumSerie] =  $row[vNumSerie];
			$ArrayObj[vMarca] =  $row[vMarca];
			$ArrayObj[vModelo] =  $row[vModelo];
			$ArrayObj[vTipo] =  $row[vTipo];
			$ArrayObj[eNoEntrepanio] =  $row[eNoEntrepanio];
			$ArrayObj[bPedestal] =  $row[bPedestal];
			$ArrayObj[bFija] =  $row[bFija];
			$ArrayObj[bGiratoria] =  $row[bGiratoria];
			$ArrayObj[bRodajas] =  $row[bRodajas];
			$ArrayObj[bPlegable] =  $row[bPlegable];
			$ArrayObj[eNoCajon] =  $row[eNoCajon];
			$ArrayObj[eNoGaveta] =  $row[eNoCajon];
			
		}
		
		return $ArrayObj;
	}
	public function data_vehiculo($idCambs)
	{
		$objData =  new poolConnection();
		$objData->Conexion();
		$objData->BaseDatos();
		$Sql="Select *  From sa_vehiculo Where Id_CABMS='$idCambs'";
		$RSet=$objData->Query($Sql);
		while($row = mysql_fetch_array($RSet))
		{
			$ArrayObj[vMarca] =  $row[vMarca];
			$ArrayObj[Id_ConsecutivoInv] =  $row[Id_ConsecutivoInv];
			$ArrayObj[vTipo] =  $row[vTipo];
			$ArrayObj[vModelo] =  $row[vModelo];
			$ArrayObj[vNumSerie] =  $row[vNumSerie];
			$ArrayObj[vNumMotor] =  $row[vNumMotor];
			$ArrayObj[vPlacas] =  $row[vPlacas];
			$ArrayObj[vRFV] =  $row[vRFV];
			$ArrayObj[cTipoTransmision] =  $row[cTipoTransmision];
			$ArrayObj[cUso] =  $row[cUso];
			$ArrayObj[vCaracteristicas] =  $row[vCaracteristicas];
			$ArrayObj[cTipoDireccion] =  $row[cTipoDireccion];
		}
		return $ArrayObj;
	}
	public function  Generar_Reporte($AData)
	{
		
			$CveCambs = $AData->txtCveCambs;
			$CambsDes = $AData->txtDes;
			$CveReguardante  = $AData->txtResId;
			$ResguardanteDes = $AData->txtNombre;
			
			
				$objQRS =  new poolConnection();
				$con=$objQRS->Conexion();
				$objQRS->BaseDatos();
				$sql="Select 
					sa_cabms.Id_CABMS,
					sa_cabms.vDescripcionCABMS,
					sa_inventario.Id_ConsecutivoInv,
					sa_inventario.Id_TipoBien
					From
					sa_inventario,
					sa_cabms
					where
					sa_inventario.Id_CABMS='$CveCambs' and
					sa_inventario.Id_CABMS = sa_cabms.Id_CABMS";
				$RSet=$objQRS->Query($sql);
				while($row=mysql_fetch_array($RSet))
				{
					$Id_TipoBien=$row[Id_TipoBien];
					//$CveCambs="2111000002";
					switch ($row[Id_TipoBien])
					{
						case '1':
							
							        //Bienes Muebles y Equipo
							       $Tipo = "Bienes Muebles y Equipo"; 
							       $ArrayT =  $this->data_mueble($CveCambs);
							       $QR = "$ArrayT[Id_ConsecutivoInv]";
							       $QR .= str_replace(' ','',$row[vDescripcionCABMS]);
							       $QR .= str_replace(' ','',$ArrayT[vNumSerie]);
							       $QR .= str_replace(' ','',$ArrayT[vMarca]);
							       $QR .= str_replace(' ','',$ArrayT[vModelo]);
							       
							       $QRE = "$ArrayT[Id_ConsecutivoInv]";
							       $QRE .= "CH49";
							       $QRE .= "P4";
							       $QRE .= "SUBEDPSAL";
							       
									$FliexGrid2.="
									<tr>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_CABMS]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[Id_ConsecutivoInv]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vMarca]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vModelo]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vTipo]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[eNoCajon]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[eNoGaveta]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[eNoEntrepanio]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[bPedestal]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[bFija]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[bGiratoria]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[bRodajas]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[bPlegable]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$CveReguardante</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$QR</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$QRE</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
									</tr>";
							break;
						case '2':
							
									//Bienes de Equipo Informatico
							        $Tipo = "Informatico";
									$ArrayT = $this->data_informatico($CveCambs);
									$QR = "$ArrayT[Id_ConsecutivoInv]";
									$QR .= str_replace(' ','',$row[vDescripcionCABMS]);
									$QR .= str_replace(' ','',$ArrayT[vNumSerie]);
									$QR .= str_replace(' ','',$ArrayT[vMarca]);
									$QR .= str_replace(' ','',$ArrayT[vModelo]);
									
									$QRE = "$ArrayT[Id_ConsecutivoInv]";
									$QRE .= "CH49";
									$QRE .= "P4";
									$QRE .= "SUBEDPSAL";
									$FliexGrid2.="
									<tr>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_CABMS]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[Id_ConsecutivoInv]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vMarca]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vNumSerie]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vModelo]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vDiscoDuro]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vRAM]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vProcesador]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vFuentePoder]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vCaracteristicas]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vMonitorSerie]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vMonitorMarca]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vTecladoSerie]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vTecladoMarca]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vMouseSerie]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vMouseMarca]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$CveReguardante</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$QR</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$QRE</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
									</tr>";
							break;
						case '3':
							
									//Vehiculos
							            $Tipo = "veiculos";
							            $ArrayT =$this->data_vehiculo($CveCambs);
							            
							            $QR = "$ArrayT[Id_ConsecutivoInv]";
							            $QR .= str_replace(' ','',$row[vDescripcionCABMS]);
							            $QR .= str_replace(' ','',$ArrayT[vNumSerie]);
							            $QR .= str_replace(' ','',$ArrayT[vMarca]);
							            $QR .= str_replace(' ','',$ArrayT[vModelo]);
							            	
							            $QRE = "$ArrayT[Id_ConsecutivoInv]";
							            $QRE .= "CH49";
							            $QRE .= "P4";
							            $QRE .= "SUBEDPSAL";
										$FliexGrid2.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_CABMS]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[Id_ConsecutivoInv]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vModelo]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vNumSerie]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vNumMotor]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vPlacas]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vRFV]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[cTipoTransmision]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[cUso]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vCaracteristicas]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[cTipoDireccion]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$CveReguardante</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$QR</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$QRE</td>
										</tr>";
							break;
						case '4':
							
							
									    $Tipo = "Acervo";
									   //Bienes de Acervo Cultural
										$ArrayT = $this->data_acervo($CveCambs);
										$QR = "$ArrayT[Id_ConsecutivoInv]";
										$QR .= str_replace(' ','',$row[vDescripcionCABMS]);
										$QR .= str_replace(' ','',$ArrayT[vNumSerie]);
										$QR .= str_replace(' ','',$ArrayT[vMarca]);
										$QR .= str_replace(' ','',$ArrayT[vModelo]);
										
										$QRE = "$ArrayT[Id_ConsecutivoInv]";
										$QRE .= "CH49";
										$QRE .= "P4";
										$QRE .= "SUBEDPSAL";
										$FliexGrid2.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_CABMS]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_ConsecutivoInv]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vCaracteristicas]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vUbicacion]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vTitulo]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vAutor]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$CveReguardante</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$QR</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$QRE</td>
										</tr>";
							break;
					}
					
				}
				mysql_free_result($RSet);
				$objQRS->Cerrar($con);
						
						
				switch ($Id_TipoBien)
				{
					case '1':
						
						//Bienes Muebles y Equipo
						$head="
						{display: 'Cambs', name : 'Cambs', width :120, sortable :false, align: 'center'},
						{display: 'Descripcion', name : 'Descripcion', width :100, sortable :false, align: 'center'},
						{display: 'Consecutivo', name : 'Consecutivo', width :80, sortable :false, align: 'center'},
						{display: 'Marca', name : 'Marca', width :120, sortable :false, align: 'center'},
						{display: 'Modelo', name : 'Modelo', width :120, sortable :false, align: 'center'},
						{display: 'Tipo', name : 'Tipo', width :120, sortable :false, align: 'center'},
						{display: 'Cajon', name : 'Cajon', width :120, sortable :false, align: 'center'},
						{display: 'Gaveta', name : 'Gaveta', width :120, sortable :false, align: 'center'},
						{display: 'Entrepa–o', name : 'Entrepa–o', width :120, sortable :false, align: 'center'},
						{display: 'Pedestal', name : 'Pedestal', width :120, sortable :false, align: 'center'},
						{display: 'Fija', name : 'Fija', width :120, sortable :false, align: 'center'},
						{display: 'Giratoria', name : 'Serie', width :120, sortable :false, align: 'center'},
						{display: 'Rodjas', name : 'Serie', width :120, sortable :false, align: 'center'},
						{display: 'Plegable', name : 'Serie', width :120, sortable :false, align: 'center'},
						{display: 'Resguardante', name : 'Resguardante', width :120, sortable :false, align: 'center'},
						{display: 'Etiqueta QR', name : 'Etiqueta  QR', width :300, sortable :false, align: 'center'},
						{display: 'Etiqueta Exterior 1', name : 'Etiqueta Exterior 1 ', width :300, sortable :false, align: 'center'},
						{display: 'Etiqueta Exterior 2', name : 'Etiqueta Exterior 2 ', width :300, sortable :false, align: 'center'}
						";
						 $XLS = "<img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls1();\"/>";
						break;
						
					case '2':
						//Bienes de Equipo Informatico
						
						$head="
						        {display: 'Cambs', name : 'Cambs', width :120, sortable :false, align: 'center'},
						        {display: 'Descripcion', name : 'Descripcion', width :100, sortable :false, align: 'center'},
						        {display: 'Consecutivo', name : 'Consecutivo', width :80, sortable :false, align: 'center'},	
								{display: 'Marca', name : 'Marca', width :120, sortable :false, align: 'center'},
								{display: 'No.Serie', name : 'No.Serie', width :120, sortable :false, align: 'center'},
								{display: 'Modelo', name : 'Modelo', width :120, sortable :false, align: 'center'},
								{display: 'Disco Duro', name : 'Disco Duro', width :120, sortable :false, align: 'center'},
								{display: 'Ram', name : 'Ram', width :120, sortable :false, align: 'center'},
								{display: 'Procesador', name : 'Procesador', width :120, sortable :false, align: 'center'},
								{display: 'Fuente de Poder', name : 'Fuente de Poder', width :120, sortable :false, align: 'center'},
								{display: 'Caracteristicas', name : 'Caracteristicas', width :120, sortable :false, align: 'center'},
								{display: 'Monitor Serie', name : 'Monitor Serie', width :120, sortable :false, align: 'center'},
								{display: 'Monitor Marca', name : 'Monitor Marca', width :120, sortable :false, align: 'center'},
								{display: 'Teclado Serie', name : 'Teclado Serie', width :120, sortable :false, align: 'center'},
								{display: 'Teclado Marca ', name : 'Teclado Marca', width :120, sortable :false, align: 'center'},
								{display: 'Mouse Serie', name : 'Mouse Serie', width :120, sortable :false, align: 'center'},
								{display: 'Mouse Marca', name : 'Mouse Marca', width :120, sortable :false, align: 'center'},
								{display: 'Resguardante', name : 'Resguardante', width :120, sortable :false, align: 'center'},
								{display: 'Etiqueta QR', name : 'Etiqueta  QR', width :300, sortable :false, align: 'center'},
								{display: 'Etiqueta Exterior 1', name : 'Etiqueta Exterior 1 ', width :300, sortable :false, align: 'center'},
								{display: 'Etiqueta Exterior 2', name : 'Etiqueta Exterior 2 ', width :300, sortable :false, align: 'center'}
						";
						$XLS = "<img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls2();\"/>";
						break;
					case '3':
						
						
						//Vehiculos
						$head="
						{display: 'Cambs', name : 'Cambs', width :120, sortable :false, align: 'center'},
						{display: 'Descripcion', name : 'Descripcion', width :100, sortable :false, align: 'center'},
						{display: 'Consecutivo', name : 'Consecutivo', width :120, sortable :false, align: 'center'},
						{display: 'Modelo', name : 'Modelo', width :120, sortable :false, align: 'center'},
						{display: 'Num. Serie', name : 'Num. Serie', width :120, sortable :false, align: 'center'},
						{display: 'Num. Motor', name : 'Num. Motor', width :120, sortable :false, align: 'center'},
						{display: 'Placas', name : 'Placas', width :120, sortable :false, align: 'center'},
						{display: 'RFV', name : 'RFV', width :120, sortable :false, align: 'center'},
						{display: 'Tipo Trasmision', name : 'Tipo Trasmision', width :120, sortable :false, align: 'center'},
						{display: 'Uso', name : 'Uso', width :120, sortable :false, align: 'center'},
						{display: 'Caracteristicas', name : 'Caracteristicas', width :120, sortable :false, align: 'center'},
						{display: 'Tipo Direccion', name : 'Tipo Direccion', width :120, sortable :false, align: 'center'},
						{display: 'Resguardante', name : 'Resguardante', width :120, sortable :false, align: 'center'},
						{display: 'Etiqueta QR', name : 'Etiqueta  QR', width :300, sortable :false, align: 'center'},
						{display: 'Etiqueta Exterior 1', name : 'Etiqueta Exterior 1 ', width :300, sortable :false, align: 'center'},
						{display: 'Etiqueta Exterior 2', name : 'Etiqueta Exterior 2 ', width :300, sortable :false, align: 'center'}
						";
						$XLS = "<img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls3();\"/>";
						break;
						case '4':
						//Bienes de Acervo Cultural
							
							$head="
							{display: 'Cambs', name : 'Cambs', width :120, sortable :false, align: 'center'},
							{display: 'Descripcion', name : 'Descripcion', width :100, sortable :false, align: 'center'},
							{display: 'Consecutivo', name : 'Descripcion', width :100, sortable :false, align: 'center'},
							{display: 'Caracteristicas', name : 'Modelo', width :120, sortable :false, align: 'center'},
							{display: 'Ubicacion', name : 'Num. Serie', width :120, sortable :false, align: 'center'},
							{display: 'Titulo', name : 'Num. Serie', width :120, sortable :false, align: 'center'},
							{display: 'Autor', name : 'Num. Serie', width :120, sortable :false, align: 'center'},
							{display: 'Resguardante', name : 'Resguardante', width :120, sortable :false, align: 'center'},
							{display: 'Etiqueta QR', name : 'Etiqueta  QR', width :300, sortable :false, align: 'center'},
							{display: 'Etiqueta Exterior 1', name : 'Etiqueta Exterior 1 ', width :300, sortable :false, align: 'center'},
							{display: 'Etiqueta Exterior 2', name : 'Etiqueta Exterior 2 ', width :300, sortable :false, align: 'center'}
							";
							$XLS = "<img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls4();\"/>";
						break;
						
				}
					
			
						$FliexGrid = "<br><br>
						<center><table class=\"flexme1\">
						<tbody>$FliexGrid2";
						$FliexGrid.="       </tbody>
						</table><script>$('.flexme1').flexigrid({
						title: '',
						colModel : [
						$head
						],
						buttons : [
						{name: '',onpress:saver_Order},
						{separator: true}
						],
						width: 940,
						height: 250
				}
					
				);</script>
				<br><br><br>
				<div id=\"DivExportar\">
				<table border=\"0\">
				<tr>
				<th><!-- <img id=\"BtnExportarPDF\" src=\"../../interfaz_modulos/botones/exportar_pdf.jpg\" name=\"ImagePdf\" width=\"120\" height=\"45\" border=\"0\" id=\"ImagePdf\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Pdf();\"/> --></th>
				<td>&nbsp;</td>
				<th>$XLS</th>
				<td>&nbsp;</td>
				<th></th>
				</tr>
				</table>
				</div>
				</center>";
				return $FliexGrid;
		}
		
		
		
		
		function print_pdf($AData)
		{
				$CveCambs = $AData->txtCveCambs;
				$CambsDes = $AData->txtDes;
				$CveReguardante  = $AData->txtResId;
				$ResguardanteDes = $AData->txtNombre;
				
				$objDatosPDF = new poolConnection();
				$con=$objDatosPDF -> Conexion();
				$objDatosPDF -> BaseDatos();
					
				$StrConsulta="Select 
					sa_cabms.Id_CABMS,
					sa_cabms.vDescripcionCABMS,
					sa_inventario.Id_ConsecutivoInv,
					sa_inventario.Id_TipoBien
					From
					sa_inventario,
					sa_cabms
					where
					sa_inventario.Id_CABMS='$CveCambs' and
					sa_inventario.Id_CABMS = sa_cabms.Id_CABMS";
			
				$RSet = $objDatosPDF ->Query($StrConsulta);
				$Catalogo = array();
				while ($Row = mysql_fetch_array($RSet)){
					$Id_TipoBien=$Row[Id_TipoBien];
					
					switch ($Row[Id_TipoBien])
					{
						case '1':
								
							//Bienes Muebles y Equipo
							$Tipo = "Bienes Muebles y Equipo";
							$ArrayT =  $this->data_mueble($CveCambs);
							$QR = "$ArrayT[Id_ConsecutivoInv]";
							$QR .= str_replace(' ','',$Row[vDescripcionCABMS]);
							$QR .= str_replace(' ','',$ArrayT[vNumSerie]);
							$QR .= str_replace(' ','',$ArrayT[vMarca]);
							$QR .= str_replace(' ','',$ArrayT[vModelo]);
					
							$QRE = "$ArrayT[Id_ConsecutivoInv]";
							$QRE .= "CH49";
							$QRE .= "P4";
							$QRE .= "SUBEDPSAL";
					
							$Catalogo[] = array(
									$Row[Id_CABMS],
									$Row[vDescripcionCABMS],
									$ArrayT[Id_ConsecutivoInv],
									$ArrayT[vMarca],
									$ArrayT[vModelo],
									$ArrayT[vTipo],
									$ArrayT[eNoCajon],
									$ArrayT[eNoGaveta],
									$ArrayT[eNoEntrepanio],
									$ArrayT[bPedestal],
									$ArrayT[bFija],
									$ArrayT[bGiratoria],
									$ArrayT[bRodajas],
									$ArrayT[bPlegable],
									$CveReguardante,
									$QR,
									$QRE,
									$Row[vDescripcionCABMS]
							);
							
							break;
							case '2':
								
							//Bienes de Equipo Informatico
							$Tipo = "Informatico";
							$ArrayT = $this->data_informatico($CveCambs);
							$QR = "$ArrayT[Id_ConsecutivoInv]";
							$QR .= str_replace(' ','',$Row[vDescripcionCABMS]);
							$QR .= str_replace(' ','',$ArrayT[vNumSerie]);
							$QR .= str_replace(' ','',$ArrayT[vMarca]);
							$QR .= str_replace(' ','',$ArrayT[vModelo]);
								
							$QRE = "$ArrayT[Id_ConsecutivoInv]";
							$QRE .= "CH49";
							$QRE .= "P4";
							$QRE .= "SUBEDPSAL";
							$Catalogo[] = array(
									$Row[Id_CABMS],
									$Row[vDescripcionCABMS],
									$ArrayT[Id_ConsecutivoInv],
									$ArrayT[vMarca],
									$ArrayT[vNumSerie],
									$ArrayT[vModelo],
									$ArrayT[vDiscoDuro],
									$ArrayT[vRAM],
									$ArrayT[vProcesador],
									$ArrayT[vFuentePoder],
									$ArrayT[vCaracteristicas],
									$ArrayT[vMonitorSerie],
									$ArrayT[vMonitorMarca],
									$ArrayT[vTecladoSerie],
									$ArrayT[vTecladoMarca],
									$ArrayT[vMouseSerie],
									$ArrayT[vMouseMarca],
									$CveReguardante,
									$QR,
									$QRE,
									$Row[vDescripcionCABMS]
							);
							
							break;
							case '3':
								
							//Vehiculos
							$Tipo = "veiculos";
							$ArrayT =$this->data_vehiculo($CveCambs);
							 
							$QR = "$ArrayT[Id_ConsecutivoInv]";
							$QR .= str_replace(' ','',$Row[vDescripcionCABMS]);
							$QR .= str_replace(' ','',$ArrayT[vNumSerie]);
							$QR .= str_replace(' ','',$ArrayT[vMarca]);
							$QR .= str_replace(' ','',$ArrayT[vModelo]);
					
							/*
							 * $FliexGrid2.="
										<tr>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[Id_CABMS]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[Id_ConsecutivoInv]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vModelo]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vNumSerie]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vNumMotor]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vPlacas]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vRFV]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[cTipoTransmision]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[cUso]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[vCaracteristicas]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayT[cTipoDireccion]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$CveReguardante</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$QR</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$row[vDescripcionCABMS]</td>
										<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$QRE</td>
										</tr>";
							 */
									$QRE = "$ArrayT[Id_ConsecutivoInv]";
									$QRE .= "CH49";
									$QRE .= "P4";
									$QRE .= "SUBEDPSAL";
									$Catalogo[] = array(
											$Row[Id_CABMS],
											$Row[vDescripcionCABMS],
											$ArrayT[Id_ConsecutivoInv],
											$ArrayT[vModelo],
											$ArrayT[vNumSerie],
											$ArrayT[vNumMotor],
											$ArrayT[vPlacas],
											$ArrayT[vRFV],
											$ArrayT[cTipoTransmision],
											$ArrayT[cUso],
											$ArrayT[vCaracteristicas],
											$ArrayT[cTipoDireccion],
											$CveReguardante,
											$QR,
											$Row[vDescripcionCABMS],
											$QRE
									);
									
									break;
									case '4':
										
										
									$Tipo = "Acervo";
									//Bienes de Acervo Cultural
									$ArrayT = $this->data_acervo($CveCambs);
									$QR = "$ArrayT[Id_ConsecutivoInv]";
									$QR .= str_replace(' ','',$Row[vDescripcionCABMS]);
									$QR .= str_replace(' ','',$ArrayT[vNumSerie]);
									$QR .= str_replace(' ','',$ArrayT[vMarca]);
									$QR .= str_replace(' ','',$ArrayT[vModelo]);
					
									$QRE = "$ArrayT[Id_ConsecutivoInv]";
									$QRE .= "CH49";
									$QRE .= "P4";
									$QRE .= "SUBEDPSAL";
									$Catalogo[] = array(
											$Row[Id_CABMS],
											$Row[vDescripcionCABMS],
											$Row[Id_ConsecutivoInv],
											$ArrayT[vCaracteristicas],
											$ArrayT[vUbicacion],
											$ArrayT[vTitulo],
											$ArrayT[vAutor],
											$CveReguardante,
											$QR,
											$Row[vDescripcionCABMS],
											$QRE
									);
									
									break;
					}
			
				
				}
					
				mysql_free_result($RSet);
				$objDatosPDF->Cerrar($con);
				return $Catalogo;
		}
	
}
?>
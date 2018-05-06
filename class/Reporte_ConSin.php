<?php
class Reporte_ConSin extends poolConnection
{
	public function StockMin($CABMS)
	{
		
		$sql="Select 
				(sa_parametro.svalor  * sa_existenciasconsumible.eConsumoPromedio) As StockMin
				from
				sa_existenciasconsumible,
				sa_parametro,
				sa_movconsumo
				
				where
				sa_parametro.Id_Parametro= '7' and
				sa_existenciasconsumible.Id_CABMS='$CABMS'";
				$obj =  new poolConnection();
				$obj->Conexion();
				$obj->BaseDatos();
				$Rset=$obj->Query($sql);
				while($fila = mysql_fetch_array($Rset))
				{
					$stockmin=$fila[StockMin];
				}
				if($stockmin>0)
				{
					
				}
			else{
				$stockmin=0;
			}		
		return $stockmin;
	}
	public function StockMax($CABMS)
	{
		$sql="Select 
			(sa_parametro.svalor  * sa_existenciasconsumible.eConsumoPromedio) As StockMax
			from
			sa_existenciasconsumible,
			sa_parametro,
			sa_movconsumo
			where
			sa_parametro.Id_Parametro= '6' and
			sa_existenciasconsumible.Id_CABMS='$CABMS'";
		$obj =  new poolConnection();
		$obj->Conexion();
		$obj->BaseDatos();
		$Rset=$obj->Query($sql);
		while($fila = mysql_fetch_array($Rset))
		{
			$stockmax=$fila[StockMax];
		}
		if($stockmax>0)
		{
				
		}
		else{
			$stockmax=0;
		}
		return $stockmax;
	}
	public function ExistenciaInicial($AData)
	{
		$Fecha1 = $AData->Fecha1;
		$Fecha2 = $AData->Fecha2;
		$Cabms = $AData->CABMS;
		$sql="Select
				IFNULL(sa_movconsumo.eExistenciaIniMovto,0) as ExixtenciaInicial 
				From
				sa_movconsumo
				Where
				sa_movconsumo.dFechaMovRegistro >= '$Fecha1' and 
				sa_movconsumo.dFechaMovRegistro <='$Fecha2' and
				sa_movconsumo.Id_CABMS='$Cabms' and
				sa_movconsumo.Id_TipoMovimiento =  '2502'";
		
		$obj =  new poolConnection();
		$obj->Conexion();
		$obj->BaseDatos();
		$Rset=$obj->Query($sql);
		while($fila = mysql_fetch_array($Rset))
		{
		    $exixtenciainicial=$fila[ExixtenciaInicial];
		}
		if($exixtenciainicial>0)
			{
		
			}
			else{
			$exixtenciainicial=0;
			}
		return $exixtenciainicial;
		//return $sql;
		}
	public function MovEntrada($AData)
	{
		
		$Cabms = $AData->CABMS;
		$sql="Select
				IFNULL(sum( sa_movconsumo.eCantidad),0) as Moventrada
				From
				 sa_movconsumo
				Where
				sa_movconsumo.Id_CABMS='$Cabms' and
				SUBSTRING(sa_movconsumo.Id_TipoMovimiento,1,2) = '01' and
				sa_movconsumo.dFechaRegistro";
					
		$obj =  new poolConnection();
		$obj->Conexion();
		$obj->BaseDatos();
		$Rset=$obj->Query($sql);
		while($fila = mysql_fetch_array($Rset))
		{
		$Moventrada=$fila[Moventrada];
		}
		if($Moventrada>0)
		{
	
	}
		else{
			$Moventrada=0;
			}
			return $Moventrada;
	}
	public function AcomSalida($AData)
	{
		$Fecha1 = $AData->Fecha1;
		$Fecha2 = $AData->Fecha2;
		$Cabms = $AData->CABMS;
		$sql="select
				sa_movconsumo.Id_TipoMovimiento
				from
				sa_movconsumo
				where
				sa_movconsumo.Id_CABMS='$Cabms' and
				(sa_movconsumo.Id_TipoMovimiento like '01%' or sa_movconsumo.Id_TipoMovimiento = '2502') and
				sa_movconsumo.dFechaRegistro>='$Fecha1' and sa_movconsumo.dFechaRegistro<='$Fecha2'";
	
		$obj =  new poolConnection();
		$obj->Conexion();
		$obj->BaseDatos();
		$Rset=$obj->Query($sql);
		while($fila = mysql_fetch_array($Rset))
		{
		$AcomSalida=$fila[AcomSalida];
		}
		if($AcomSalida>0)
		{
	
	}
		else{
			$AcomSalida=0;
			}
			return $AcomSalida;
	}
	public function CostoPromedio($AData)
	{
		/* ((Isnull(MCN.eExistenciaIniMovto,0) * Isnull(MCN.mCostoPromedioIniMovto, 0)) + (Isnull(MCN.eCantidad,0) * isnull(MCN.mCostoUnitario,0))) / (Isnull(MCN.eExistenciaIniMovto,0) + Isnull(MCN.eCantidad,0))*/
		$Fecha1 = $AData->Fecha1;
		$Fecha2 = $AData->Fecha2;
		$Cabms = $AData->CABMS;
		$sql="Select
				sa_movconsumo.eExistenciaIniMovto,
				sa_movconsumo.mCostoPromedioIniMovto, 
				sa_movconsumo.eCantidad, 
				sa_movconsumo.mCostoUnitario 
				from
				sa_movconsumo
				where             
				sa_movconsumo.Id_CABMS='$Cabms' and
				(sa_movconsumo.Id_TipoMovimiento like '01%' or sa_movconsumo.Id_TipoMovimiento = '2502') and
				sa_movconsumo.dFechaRegistro>='$Fecha1' and sa_movconsumo.dFechaRegistro<='$Fecha2'";
		
		$obj =  new poolConnection();
		$obj->Conexion();
		$obj->BaseDatos();
		$Rset=$obj->Query($sql);
		while($fila = mysql_fetch_array($Rset))
		{
			$eExistenciaIniMovto=$fila[eExistenciaIniMovto];
		    $mCostoPromedioIniMovto=$fila[mCostoPromedioIniMovto]; 
		    $eCantidad=$fila[eCantidad];
		    $mCostoUnitario=$fila[mCostoUnitario];
		    if(!empty($eExistenciaIniMovto))
		    {
		    	
		    }
		    else
		    {
		    	$eExistenciaIniMovto=0;
		    }
		    if(!empty($mCostoPromedioIniMovto))
		    {
		    	 
		    }
		    else
		    {
		    	$mCostoPromedioIniMovto=0;
		    }
		    if(!empty($eCantidad))
		    {
		    	 
		    }
		    else
		    {
		    	$eCantidad=0;
		    }
		    if(!empty($mCostoUnitario))
		    {
		    	 
		    }
		    else
		    {
		    	$mCostoUnitario=0;
		    }
		    /* ((Isnull(MCN.eExistenciaIniMovto,0) * Isnull(MCN.mCostoPromedioIniMovto, 0)) + (Isnull(MCN.eCantidad,0) * isnull(MCN.mCostoUnitario,0))) / (Isnull(MCN.eExistenciaIniMovto,0) + Isnull(MCN.eCantidad,0))*/
		    $CP = (($eExistenciaIniMovto * mCostoPromedioIniMovto) + (eCantidad * mCostoUnitario)) / (eExistenciaIniMovto + eCantidad);
		    
		}    
		if(!empty($CP))
		{
			
		}	
		else{
			$CP=0;
		}
		return $CP; 

	}
	
	
	
	public function  Generar_ReporteCon($AData)
	{
		
		        $FechaA = $AData->Fecha1;
		        $FechaB = $AData->Fecha2;
				
		        $ArrayFechaA = split("/",$FechaA);
		        $ArrayFechaB = split("/",$FechaB);
				$objGrid = new poolConnection();
							$con=$objGrid->Conexion();
							$objGrid->BaseDatos();
							$sql="Select
								sa_cabms.Id_CABMS,
								sa_cabms.vDescripcionCABMS,
								sa_umedida.vDescripcion
								From
								sa_movconsumo,
								sa_cabms,
								sa_umedida
								
								where
								sa_movconsumo.Id_CABMS = sa_cabms.Id_CABMS and
								sa_movconsumo.dFechaRegistro>='$ArrayFechaA[2]/$ArrayFechaA[0]/$ArrayFechaA[1]' and sa_movconsumo.dFechaRegistro<='$ArrayFechaB[2]/$ArrayFechaB[0]/$ArrayFechaB[1]' and
								sa_cabms.Id_UMedida = sa_umedida.Id_UMedida";
							$RSet=$objGrid->Query($sql);
							while($fila=mysql_fetch_array($RSet))
							{
							        $info->Fecha1="$ArrayFechaA[2]/$ArrayFechaA[0]/$ArrayFechaA[1]";
							        $info->Fecha2="$ArrayFechaB[2]/$ArrayFechaB[0]/$ArrayFechaB[1]";
							        $info->CABMS=$fila[Id_CABMS];
									$SMin=$this->StockMin($fila[Id_CABMS]);
									$SMax = $this->StockMax($fila[Id_CABMS]);
									$EI=$this->ExistenciaInicial($info);
									$ME =$this->MovEntrada($info);
									$AS = $this->AcomSalida($info);
									$CP = $this->CostoPromedio($info);
									$FliexGrid2.="
									<tr>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$SMin</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$SMax</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$CP</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$EI</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ME</td>
									<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$AS</td>
									</tr>";
				
							}
							mysql_free_result($RSet);
							$objGrid->Cerrar($con);
				
							$FliexGrid = "<br><br>
							<center><table class=\"flexme1\">
							<tbody>$FliexGrid2";
							$FliexGrid.="       </tbody>
							</table><script>$('.flexme1').flexigrid({
							title: '',
							colModel : [
								
							{display: 'Cambs', name : 'Cambs', width :120, sortable :false, align: 'center'},
							{display: 'Descripcion', name : 'Descripcion', width :200, sortable :false, align: 'center'},
							{display: 'U. Medida', name : 'U. Medida', width :130, sortable :false, align: 'center'},
							{display: 'Stock Min.', name : 'Stock Min.', width :100, sortable :false, align: 'center'},
							{display: 'Stock Max.', name : 'Stock Max.', width :100, sortable :false, align: 'center'},
							{display: 'Coste Promedio', name : 'Total', width :100, sortable :false, align: 'center'},
							{display: 'Existencia Inicial', name : 'Existencia Inicial', width :100, sortable :false, align: 'center'},
							{display: 'Movimiento Entrada', name : 'Movimiento Entrada', width :100, sortable :false, align: 'center'},
							{display: 'Acomulado Salida', name : 'Acomulado Salida', width :100, sortable :false, align: 'center'}
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
					<th><img id=\"BtnExportarPDF\" src=\"../../interfaz_modulos/botones/exportar_pdf.jpg\" name=\"ImagePdf\" width=\"120\" height=\"45\" border=\"0\" id=\"ImagePdf\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Pdf1();\"/></th>
					<td>&nbsp;</td>
					<th></th>
					<td>&nbsp;</td>
					<th><img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls1();\"/></th>
					</tr>
					</table>
					</div>
					</center>";
					return $FliexGrid;
		}
		
		public function  Generar_ReporteSin($AData)
		{
		
			$FechaA = $AData->Fecha1;
			 $FechaB = $AData->Fecha2;
			
			$ArrayFechaA = split("/",$FechaA);
			$ArrayFechaB = split("/",$FechaB);
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos();
			$sql="Select
			sa_cabms.Id_CABMS,
			sa_cabms.vDescripcionCABMS,
			sa_umedida.vDescripcion
			From
			sa_movconsumo,
			sa_cabms,
			sa_umedida
		
			where
			sa_movconsumo.Id_CABMS = sa_cabms.Id_CABMS and
			sa_movconsumo.dFechaRegistro>='$ArrayFechaA[2]/$ArrayFechaA[0]/$ArrayFechaA[1]' and sa_movconsumo.dFechaRegistro<='$ArrayFechaB[2]/$ArrayFechaB[0]/$ArrayFechaB[1]' and
			sa_cabms.Id_UMedida = sa_umedida.Id_UMedida";
			$RSet=$objGrid->Query($sql);
			while($fila=mysql_fetch_array($RSet))
			{
			$info->Fecha1="$ArrayFechaA[2]/$ArrayFechaA[0]/$ArrayFechaA[1]";
			$info->Fecha2="$ArrayFechaB[2]/$ArrayFechaB[0]/$ArrayFechaB[1]";
			$info->CABMS=$fila[Id_CABMS];
			$SMin=$this->StockMin($fila[Id_CABMS]);
			$SMax = $this->StockMax($fila[Id_CABMS]);
			$EI=$this->ExistenciaInicial($info);
			$ME =$this->MovEntrada($info);
			$AS = $this->AcomSalida($info);
			$FliexGrid2.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$SMin</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$SMax</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$EI</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ME</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$AS</td>
			</tr>";
		
			}
			mysql_free_result($RSet);
			$objGrid->Cerrar($con);
		
			$FliexGrid = "<br><br>
			<center><table class=\"flexme1\">
			<tbody>$FliexGrid2";
			$FliexGrid.="       </tbody>
			</table><script>$('.flexme1').flexigrid({
			title: '',
			colModel : [
		
			{display: 'Cambs', name : 'Cambs', width :120, sortable :false, align: 'center'},
			{display: 'Descripcion', name : 'Descripcion', width :200, sortable :false, align: 'center'},
			{display: 'U. Medida', name : 'U. Medida', width :130, sortable :false, align: 'center'},
			{display: 'Stock Min.', name : 'Stock Min.', width :100, sortable :false, align: 'center'},
			{display: 'Stock Max.', name : 'Stock Max.', width :100, sortable :false, align: 'center'},
			{display: 'Existencia Inicial', name : 'Existencia Inicial', width :100, sortable :false, align: 'center'},
			{display: 'Movimiento Entrada', name : 'Movimiento Entrada', width :100, sortable :false, align: 'center'},
			{display: 'Acomulado Salida', name : 'Acomulado Salida', width :100, sortable :false, align: 'center'}
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
		<th><img id=\"BtnExportarPDF\" src=\"../../interfaz_modulos/botones/exportar_pdf.jpg\" name=\"ImagePdf\" width=\"120\" height=\"45\" border=\"0\" id=\"ImagePdf\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Pdf2();\"/></th>
		<td>&nbsp;</td>
		<th></th>
		<td>&nbsp;</td>
		<th><img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls2();\"/></th>
		</tr>
		</table>
		</div>
		</center>";
		return $FliexGrid;
		}
		
		
		function print_pdf_con($AData)
		{
					$FechaA = $AData->Fecha1;
					 $FechaB = $AData->Fecha2;
					
					$ArrayFechaA = split("/",$FechaA);
					$ArrayFechaB = split("/",$FechaB);
					
					$objDatosPDF = new poolConnection();
					$con=$objDatosPDF -> Conexion();
					$objDatosPDF -> BaseDatos();
						
					$StrConsulta="Select
								sa_cabms.Id_CABMS,
								sa_cabms.vDescripcionCABMS,
								sa_umedida.vDescripcion
								From
								sa_movconsumo,
								sa_cabms,
								sa_umedida
							
								where
								sa_movconsumo.Id_CABMS = sa_cabms.Id_CABMS and
								sa_movconsumo.dFechaRegistro>='$ArrayFechaA[2]/$ArrayFechaA[0]/$ArrayFechaA[1]' and sa_movconsumo.dFechaRegistro<='$ArrayFechaB[2]/$ArrayFechaB[0]/$ArrayFechaB[1]' and
								sa_cabms.Id_UMedida = sa_umedida.Id_UMedida";
				
					$RSet = $objDatosPDF ->Query($StrConsulta);
					$Catalogo = array();
					while ($Row = mysql_fetch_array($RSet))
					{
						
						$info->Fecha1="$ArrayFechaA[2]/$ArrayFechaA[0]/$ArrayFechaA[1]";
						$info->Fecha2="$ArrayFechaB[2]/$ArrayFechaB[0]/$ArrayFechaB[1]";
						$info->CABMS=$Row[Id_CABMS];
						$SMin=$this->StockMin($Row[Id_CABMS]);
						$SMax = $this->StockMax($Row[Id_CABMS]);
						$EI=$this->ExistenciaInicial($info);
						$ME =$this->MovEntrada($info);
						$AS = $this->AcomSalida($info);
						$CP = $this->CostoPromedio($info);
						
				
							$Catalogo[] = array(
							$Row["Id_CABMS"],
							$Row["vDescripcionCABMS"],
							$Row["vDescripcion"],
							$SMin,
							$SMax,
							$CP,
							$EI,
							$ME,
							$AS
							);
					}
					mysql_free_result($RSet);
					$objDatosPDF->Cerrar($con);
					return $Catalogo;
		}
		function print_pdf_sin($AData)
		{
			$FechaA = $AData->Fecha1;
			 $FechaB = $AData->Fecha2;
			
			$ArrayFechaA = split("/",$FechaA);
			$ArrayFechaB = split("/",$FechaB);
				
			$objDatosPDF = new poolConnection();
			$con=$objDatosPDF -> Conexion();
			$objDatosPDF -> BaseDatos();
		
			$StrConsulta="Select
			sa_cabms.Id_CABMS,
			sa_cabms.vDescripcionCABMS,
			sa_umedida.vDescripcion
			From
			sa_movconsumo,
			sa_cabms,
			sa_umedida
				
			where
			sa_movconsumo.Id_CABMS = sa_cabms.Id_CABMS and
			sa_movconsumo.dFechaRegistro>='$ArrayFechaA[2]/$ArrayFechaA[0]/$ArrayFechaA[1]' and sa_movconsumo.dFechaRegistro<='$ArrayFechaB[2]/$ArrayFechaB[0]/$ArrayFechaB[1]' and
			sa_cabms.Id_UMedida = sa_umedida.Id_UMedida";
		
			$RSet = $objDatosPDF ->Query($StrConsulta);
			$Catalogo = array();
			while ($Row = mysql_fetch_array($RSet))
			{
		
			$info->Fecha1="$ArrayFechaA[2]/$ArrayFechaA[0]/$ArrayFechaA[1]";
			$info->Fecha2="$ArrayFechaB[2]/$ArrayFechaB[0]/$ArrayFechaB[1]";
			$info->CABMS=$Row[Id_CABMS];
			$SMin=$this->StockMin($Row[Id_CABMS]);
			$SMax = $this->StockMax($Row[Id_CABMS]);
			$EI=$this->ExistenciaInicial($info);
			$ME =$this->MovEntrada($info);
			$AS = $this->AcomSalida($info);

		
			$Catalogo[] = array(
			$Row["Id_CABMS"],
			$Row["vDescripcionCABMS"],
			$Row["vDescripcion"],
			$SMin,
			$SMax,
			$EI,
			$ME,
			$AS
			);
			}
			mysql_free_result($RSet);
			$objDatosPDF->Cerrar($con);
			return $Catalogo;
			}
}

?>
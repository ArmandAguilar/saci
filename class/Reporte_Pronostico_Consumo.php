<?php
class Reporte_Pronostico_Consumo extends poolConnection
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
		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageA$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageA$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageA$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"select_cambs1('$fila[Id_CABMS]','$fila[vDescripcionCABMS]');\">&nbsp;</td>
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
	public function buscar_cambs2($AData)
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
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageA$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageA$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageA$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"select_cambs2('$fila[Id_CABMS]','$fila[vDescripcionCABMS]');\">&nbsp;</td>
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
	public function pronostico_consumo_a($AData)
	{
		$Cambs=$AData->Cambs;
		$eAnio=$AData->eAnio;
		$eMes1=$AData->eMes1;
		$eMes2=$AData->eMes2;
		$objPronostico = new poolConnection();
		$objPronostico->Conexion();
		$objPronostico->BaseDatos();
		$sql="Select 
		sum(ifnull(sa_consumohistorico.eTotalAcumulado,0) * ifnull(sa_factorpronostico.eFactor,0)) as ConsumoPronosticadoA
		From
		sa_consumohistorico,
		sa_factorpronostico
		
		where
		sa_consumohistorico.Id_CABMS =  '2111000002' and
		sa_consumohistorico.eAnio  = '2014' and 
		sa_consumohistorico.eMes Between '11' And '12' and 
		sa_consumohistorico.eAnio = sa_factorpronostico.eAnio and
		sa_consumohistorico.eMes  = sa_factorpronostico.eMes";
		$RSet = $objPronostico->Query($sql);
		while($fila = mysql_fecth_array($RSet))
		{
		$Pronostico_ConsumoA = $fila[ConsumoPronosticoA];
		 
		}
		return $Pronostico_ConsumoA;
	}
 public function pronostico_consumo_b($AData)
 {
 	
 	
 	$Cambs=$AData->Cambs;
 	$eAnio=$AData->eAnio;
 	$eMes1=$AData->eMes;
 	
 	$Meses=$this->validar_mes($eMes1);
 	$iMesini=$Meses->iMesini;
 	$iMesaux=$Meses->iMesaux;
 	$iMesFin=$Meses->iMesFin;
 	
 	$this->validar_mes($eMes1);
    $objPronostico = new poolConnection();
    $objPronostico->Conexion();
    $objPronostico->BaseDatos();
    $sql="select
    sum(ifnull(sa_consumohistorico.eTotalAcumulado,0) * ifnull(sa_factorpronostico.eFactor,0)) As ConsumoPronosticoB
    from
    sa_consumohistorico,
    sa_factorpronostico
    Where
    sa_consumohistorico.Id_CABMS = '$Cambs' and
    sa_consumohistorico.eAnio  = '$eAnio' and
    sa_consumohistorico.eMes   Between '$iMesaux' And '$iMesFin' and
    sa_consumohistorico.eAnio  = sa_factorpronostico.eAnio and
    sa_consumohistorico.eMes = sa_factorpronostico.eMes";
    $RSet = $objPronostico->Query($sql);
    while($fila = mysql_fetch_array($RSet))
    {
    	$Pronostico_ConsumoB = $fila[ConsumoPronosticoB]; 
    	
    }
    if(!empty($Pronostico_ConsumoB))
    {
    	
    }
   else
   {
   	$Pronostico_ConsumoB=0;
   } 
 	
 	//return $sql;
    return $Pronostico_ConsumoB;
 }	
 public function validar_mes($mes)
 {
 	switch ($mes)
 	{
 	case 1:
 		$MesDatos->iMesini = 10;
 		$MesDatos->iMesaux = 11;
 		$MesDatos->iMesFin = 12;
 		
 		break;
 	case 2:
 		$MesDatos->iMesini = 11;
 		$MesDatos->iMesaux = 12;
 		$MesDatos->iMesFin = 1;
 		
 		break;
 	case 3:
 		$MesDatos->iMesini = 12;
 		$MesDatos->iMesaux = 1;
 		$MesDatos->iMesFin = 2;
 		
 		break;
 	case 4:
 		$MesDatos->iMesini = 1;
 		$MesDatos->iMesaux = 2;
 		$MesDatos->iMesFin = 3;
 		
 		break;
 	case 5:
 		$MesDatos->iMesini = 2;
 		$MesDatos->iMesaux = 3;
 		$MesDatos->iMesFin = 4;
 		
 		break;
 	case 6:
 		$MesDatos->iMesini = 3;
 		$MesDatos->iMesaux = 4;
 		$MesDatos->iMesFin = 5;
 		
 		break;
 	case 7:
 		$MesDatos->iMesini = 4;
 		$MesDatos->iMesaux = 5;
 		$MesDatos->iMesFin = 6;
 		
 		break;
 	case 8:
 		$MesDatos->iMesini = 5;
 		$MesDatos->iMesaux = 6;
 		$MesDatos->iMesFin = 7;
 		
 		break;
 	case 9:
 		$MesDatos->iMesini = 6;
 		$MesDatos->iMesaux = 7;
 		$MesDatos->iMesFin = 8;
 		
 		break;
 	case 10:
 		$MesDatos->iMesini = 7;
 		$MesDatos->iMesaux = 8;
 		$MesDatos->iMesFin = 9;
 		
 		break;
 	case 11:
 		$MesDatos->iMesini = 8;
 		$MesDatos->iMesaux = 9;
 		$MesDatos->iMesFin = 10;
 		
 		break;
 	case 12:
 		$MesDatos->iMesini = 9;
 		$MesDatos->iMesaux = 10;
 		$MesDatos->iMesFin = 11;
 		
 		break;
 	}
 	return $MesDatos;
 }
 /*Metodos para valor 2 */
 public function pronostico_consumo_bvalor2($AData)
 {
 
 
 	$Cambs=$AData->Cambs;
 	$eAnio=$AData->eAnio;
 	$eMes1=$AData->eMes;
 	
 	$Meses=$this->validar_mes($eMes1);
 	$iMesini=$Meses->iMesini;
 	$iMesaux=$Meses->iMesaux;
 	$iMesFin=$Meses->iMesFin;
 
 	$this->validar_mes($eMes1);
 	$objPronostico = new poolConnection();
 	$objPronostico->Conexion();
 	$objPronostico->BaseDatos();
 	$sql="select
 	sum(ifnull(sa_consumohistorico.eTotalAcumulado,0) * ifnull(sa_factorpronostico.eFactor,0)) As ConsumoPronosticoB
 	from
 	sa_consumohistorico,
 	sa_factorpronostico
 	Where
 	sa_consumohistorico.Id_CABMS = '$Cambs' and
 	sa_consumohistorico.eAnio  = '$eAnio' and
 	sa_consumohistorico.eMes   Between '$iMesFin' And '$iMesFin' and
 	sa_consumohistorico.eAnio  = sa_factorpronostico.eAnio and
 	sa_consumohistorico.eMes = sa_factorpronostico.eMes";
 	$RSet = $objPronostico->Query($sql);
 	while($fila = mysql_fetch_array($RSet))
 	{
 	$Pronostico_ConsumoB = $fila[ConsumoPronosticoB];
 	 
 	}
 	if(!empty($Pronostico_ConsumoB))
 	{
 	 
 }
 else
 {
 $Pronostico_ConsumoB=0;
 }
 
 //return $sql;
 	return $Pronostico_ConsumoB;
 }
 
 public function pronostico_consumo_avalor2($AData)
 {
 
 
 	$Cambs=$AData->Cambs;
 	$eAnio=$AData->eAnio;
 	$eMes1=$AData->eMes;
 
 	$Meses=$this->validar_mes($eMes1);
 	$iMesini=$Meses->iMesini;
 	$iMesaux=$Meses->iMesaux;
 	$iMesFin=$Meses->iMesFin;
 
 	$this->validar_mes($eMes1);
 	$objPronostico = new poolConnection();
 	$objPronostico->Conexion();
 	$objPronostico->BaseDatos();
 	$sql="select
 	sum(ifnull(sa_consumohistorico.eTotalAcumulado,0) * ifnull(sa_factorpronostico.eFactor,0)) As ConsumoPronosticoA
 	from
 	sa_consumohistorico,
 	sa_factorpronostico
 	Where
 	sa_consumohistorico.Id_CABMS = '$Cambs' and
 	sa_consumohistorico.eAnio  = '$eAnio' and
 	sa_consumohistorico.eMes   Between '$iMesini' And '$iMesaux' and
 	sa_consumohistorico.eAnio  = sa_factorpronostico.eAnio and
 	sa_consumohistorico.eMes = sa_factorpronostico.eMes";
 	$RSet = $objPronostico->Query($sql);
 	while($fila = mysql_fetch_array($RSet))
 	{
 	$Pronostico_ConsumoA = $fila[ConsumoPronosticoA];
 		
 	}
 	if(!empty($Pronostico_ConsumoA))
 	{
 		
 }
 else
 	{
 		$Pronostico_ConsumoA=0;
 		}
 
 		//return $sql;
 		return $Pronostico_ConsumoA;
 }
 
 /*End Metodos para valor2 */
 /*Metodos para valor 3 */
 
 public function pronostico_consumo_bvalor3($AData)
 {
 
 
 	$Cambs=$AData->Cambs;
 	$eAnio=$AData->eAnio;
 	$eMes1=$AData->eMes;
 
 	$Meses=$this->validar_mes($eMes1);
 	$iMesini=$Meses->iMesini;
 	$iMesaux=$Meses->iMesaux;
 	$iMesFin=$Meses->iMesFin;
 
 	$this->validar_mes($eMes1);
 	$objPronostico = new poolConnection();
 	$objPronostico->Conexion();
 	$objPronostico->BaseDatos();
 	$sql="select
 	sum(ifnull(sa_consumohistorico.eTotalAcumulado,0) * ifnull(sa_factorpronostico.eFactor,0)) As ConsumoPronosticoB
 	from
 	sa_consumohistorico,
 	sa_factorpronostico
 	Where
 	sa_consumohistorico.Id_CABMS = '$Cambs' and
 	sa_consumohistorico.eAnio  = '$eAnio' and
 	sa_consumohistorico.eMes   Between '$iMesFin' And '$iMesFin' and
 	sa_consumohistorico.eAnio  = sa_factorpronostico.eAnio and
 	sa_consumohistorico.eMes = sa_factorpronostico.eMes";
 	$RSet = $objPronostico->Query($sql);
 	while($fila = mysql_fetch_array($RSet))
 	{
 	$Pronostico_ConsumoB = $fila[ConsumoPronosticoB];
 		
 	}
 	if(!empty($Pronostico_ConsumoB))
 	{
 		
 }
 else
 	{
 		$Pronostico_ConsumoB=0;
 		}
 
 		//return $sql;
 		return $Pronostico_ConsumoB;
 }
 
 public function pronostico_consumo_avalor3($AData)
 {
 
 
 $Cambs=$AData->Cambs;
 $eAnio=$AData->eAnio;
 $eMes1=$AData->eMes;
 
 $Meses=$this->validar_mes($eMes1);
 $iMesini=$Meses->iMesini;
 $iMesaux=$Meses->iMesaux;
 $iMesFin=$Meses->iMesFin;
 
 $this->validar_mes($eMes1);
 $objPronostico = new poolConnection();
 $objPronostico->Conexion();
 $objPronostico->BaseDatos();
 $sql="select
 sum(ifnull(sa_consumohistorico.eTotalAcumulado,0) * ifnull(sa_factorpronostico.eFactor,0)) As ConsumoPronosticoA
 from
 sa_consumohistorico,
 sa_factorpronostico
 Where
 sa_consumohistorico.Id_CABMS = '$Cambs' and
 sa_consumohistorico.eAnio  = '$eAnio' and
 sa_consumohistorico.eMes   Between '$iMesini' And '$iMesaux' and
 sa_consumohistorico.eAnio  = sa_factorpronostico.eAnio and
 sa_consumohistorico.eMes = sa_factorpronostico.eMes";
 $RSet = $objPronostico->Query($sql);
 while($fila = mysql_fetch_array($RSet))
 {
 $Pronostico_ConsumoA = $fila[ConsumoPronosticoA];
 	
 }
 if(!empty($Pronostico_ConsumoA))
 {
 	
 }
 else
 {
 	$Pronostico_ConsumoA=0;
 }
 
 //return $sql;
 return $Pronostico_ConsumoA;
 	}
 /*End Metodos para valor3 */
  public function generar_reporte($AData)
  {
  	
  	        
  	        $AnioBase = $AData->txtAnioBase;
  	        $AnioPronosticar = $AData->cboAnio;
  	        $MesPro = $AData->cboMes;
  	        $Id_CABMSInicio=$AData->txtCambsInicio;
  	        $Id_CABMSFinal=$AData->txtCambsFinal;
  	        $pronosticoconsumoa=0;
  	        $pronosticoconsumob=0;
  	        $ArrayMes[1]=$AData->chkBox01;
  	        $ArrayMes[2]=$AData->chkBox02;
  	        $ArrayMes[3]=$AData->chkBox03;
  	        $ArrayMes[4]=$AData->chkBox04;
  	        $ArrayMes[5]=$AData->chkBox05;
  	        $ArrayMes[6]=$AData->chkBox06;
  	        $ArrayMes[7]=$AData->chkBox07;
  	        $ArrayMes[8]=$AData->chkBox08;
  	        $ArrayMes[9]=$AData->chkBox09;
  	        $ArrayMes[10]=$AData->chkBox10;
  	        $ArrayMes[11]=$AData->chkBox11;
  	        $ArrayMes[12]=$AData->chkBox12;
  	        
  	        $AnioBaseAnt = $AnioBase-1;
  			$FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme2\">
		      <tbody>";
		  	$i=0;
		  foreach($ArrayMes as $key => $value)
		  {
		  	  if(!empty($value))
		  	  {	
						  	if($value<>2 || $value<>3)
						  	{
						  		        $pronosticoconsumoa=0;
						  		       
						  		        
						  				$sql = "select distinct sa_consumohistorico.Id_CABMS, sa_cabms.vDescripcionCABMS
										from
										sa_consumohistorico, 
										sa_cabms, 
										sa_factorpronostico
										where
										(sa_consumohistorico.Id_CABMS BETWEEN '$Id_CABMSInicio' AND '$Id_CABMSFinal') and 
										sa_consumohistorico.Id_CABMS = sa_cabms.Id_CABMS and
										(sa_consumohistorico.eAnio = sa_factorpronostico.eAnio and
										sa_consumohistorico.eMes = sa_factorpronostico.eMes)";
								  		$objGrid = new poolConnection();
								  		$con=$objGrid->Conexion();
								  		$objGrid->BaseDatos();
								  		$RSet=$objGrid->Query($sql);
						  				while($fila=mysql_fetch_array($RSet))
						  				{
						  					$i++;
						  					$info->Cambs=$fila[Id_CABMS];
						  					$info->eAnio=$AnioBase;
						  					$info->eMes=$value;
						  					$pronosticoconsumob=$this->pronostico_consumo_b($info);
								  			$FliexGrid.="
								  			<tr>
								  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">m $fila[Id_CABMS]</td>
								  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
								  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$pronosticoconsumoa</td>
								  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$pronosticoconsumob</td>
								  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$AnioBaseAnt</td>
								  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$AnioBase</td>
								  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$AnioPronosticar</td>
								  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$MesPro</td>
								  			</tr>";
						  				}
								  		mysql_free_result($RSet);
								  		$objGrid->Cerrar($con);
						  		      
						  	}
						  	
						  	if($value==2)
						  	{
						  		$sql = "select distinct sa_consumohistorico.Id_CABMS, sa_cabms.vDescripcionCABMS
						  		from
						  		sa_consumohistorico,
						  		sa_cabms,
						  		sa_factorpronostico
						  		where
						  		(sa_consumohistorico.Id_CABMS BETWEEN '$Id_CABMSInicio' AND '$Id_CABMSFinal') and
						  		sa_consumohistorico.Id_CABMS = sa_cabms.Id_CABMS and
						  		(sa_consumohistorico.eAnio = sa_factorpronostico.eAnio and
						  		sa_consumohistorico.eMes = sa_factorpronostico.eMes)";
						  		$objGrid = new poolConnection();
						  		$con=$objGrid->Conexion();
						  		$objGrid->BaseDatos();
						  		$RSet=$objGrid->Query($sql);
						  		while($fila=mysql_fetch_array($RSet))
						  		{
						  		$i++;
						  		$info->Cambs=$fila[Id_CABMS];
						  		$info->eAnio=$AnioBase;
						  		$info->eMes=$value;
						  		$pronosticoconsumoa=$this->pronostico_consumo_avalor2($info);
						  		$pronosticoconsumob=$this->pronostico_consumo_bvalor2($info);
						  		$FliexGrid.="
						  		<tr>
						  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Value 2$fila[Id_CABMS]</td>
						  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
						  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$pronosticoconsumoa</td>
						  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$pronosticoconsumob</td>
						  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$AnioBaseAnt</td>
						  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$AnioBase</td>
						  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$AnioPronosticar</td>
						  		<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$MesPro</td>
						  		</tr>";
						  		}
						  		mysql_free_result($RSet);
						  		$objGrid->Cerrar($con);
						  	}	
						  	if($value==3)
						  	{
						  		$sql = "select distinct sa_consumohistorico.Id_CABMS, sa_cabms.vDescripcionCABMS
						  		from
						  		sa_consumohistorico,
						  		sa_cabms,
						  		sa_factorpronostico
						  		where
						  		(sa_consumohistorico.Id_CABMS BETWEEN '$Id_CABMSInicio' AND '$Id_CABMSFinal') and
						  		sa_consumohistorico.Id_CABMS = sa_cabms.Id_CABMS and
						  		(sa_consumohistorico.eAnio = sa_factorpronostico.eAnio and
						  		sa_consumohistorico.eMes = sa_factorpronostico.eMes)";
						  		$objGrid = new poolConnection();
						  		$con=$objGrid->Conexion();
						  		$objGrid->BaseDatos();
						  		$RSet=$objGrid->Query($sql);
						  		while($fila=mysql_fetch_array($RSet))
						  		{
						  		$i++;
						  		$info->Cambs=$fila[Id_CABMS];
						  		$info->eAnio=$AnioBase;
						  		$info->eMes=$value;
						  			$pronosticoconsumoa=$this->pronostico_consumo_avalor3($info);
						  			$pronosticoconsumob=$this->pronostico_consumo_bvalor3($info);
						  			$FliexGrid.="
						  			<tr>
						  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">Value 2$fila[Id_CABMS]</td>
						  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
						  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$pronosticoconsumoa</td>
						  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$pronosticoconsumob</td>
						  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$AnioBaseAnt</td>
						  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$AnioBase</td>
						  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$AnioPronosticar</td>
						  			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$MesPro</td>
						  			</tr>";
						  		}
						  		mysql_free_result($RSet);
						  		$objGrid->Cerrar($con);
						  	}
		  	   }	  	
		  	} 		
		  	$FliexGrid.="       </tbody>
		  	</table><script>$('.flexme2').flexigrid({
		  	title: '',
		  	colModel : [
		  	
		  	{display: 'Cambs', name : 'Cambs', width :120, sortable :false, align: 'center'},
		  	{display: 'Descripcion', name : 'Descripcion', width :200, sortable :false, align: 'center'},
		  	{display: 'P. Consumo A', name : 'Pronostico Consumo A', width :80, sortable :false, align: 'center'},
		  	{display: 'P. Consumo B', name : 'Pronostico Consumo B', width :80, sortable :false, align: 'center'},
		  	{display: 'A&ntilde;o Base Ant.', name : 'Anio Base Anterior', width :80, sortable :false, align: 'center'},
		  	{display: 'A&ntilde;o Base', name : 'Anio Base', width :120, sortable :false, align: 'center'},
		  	{display: 'A&ntilde;o a Pro.', name : 'A&ntilde;o a Pro.', width :80, sortable :false, align: 'center'},
		  	{display: 'Mes a Pro.', name : 'Mes a Pro.', width :80, sortable :false, align: 'center'}
		  	
		  	],
		  	buttons : [
		  	{name: '',onpress:saver_Order},
		  	{separator: true}
		  	],
		  	width: 740,
		  	height: 250
		  	}
		  	
		  	);</script>
		  	<br><br><br>
                        <div id=\"DivExportar\">
                            <table border=\"0\">
                                <tr>
                                    <th><img id=\"BtnExportarPDF\" src=\"../../interfaz_modulos/botones/exportar_pdf.jpg\" name=\"ImagePdf\" width=\"120\" height=\"45\" border=\"0\" id=\"ImagePdf\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Pdf();\"/></th>
                                    <td>&nbsp;</td>
                                    <th></th>
                                    <td>&nbsp;</td>
                                    <th><img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls();\"/></th>
                                </tr>
                            </table>  
                         </div>
		  	</form>";
		  	
		  	return $FliexGrid;
  } 	
  function print_pdf($AData)
  {
  	        $AnioBase = $AData->txtAnioBase;
  	        $AnioPronosticar = $AData->cboAnio;
  	        $MesPro = $AData->cboMes;
  	        $Id_CABMSInicio=$AData->txtCambsInicio;
  	        $Id_CABMSFinal=$AData->txtCambsFinal;
  	        $pronosticoconsumoa=0;
  	        $pronosticoconsumob=0;
  	        $ArrayMes[1]=$AData->chkBox01;
  	        $ArrayMes[2]=$AData->chkBox02;
  	        $ArrayMes[3]=$AData->chkBox03;
  	        $ArrayMes[4]=$AData->chkBox04;
  	        $ArrayMes[5]=$AData->chkBox05;
  	        $ArrayMes[6]=$AData->chkBox06;
  	        $ArrayMes[7]=$AData->chkBox07;
  	        $ArrayMes[8]=$AData->chkBox08;
  	        $ArrayMes[9]=$AData->chkBox09;
  	        $ArrayMes[10]=$AData->chkBox10;
  	        $ArrayMes[11]=$AData->chkBox11;
  	        $ArrayMes[12]=$AData->chkBox12;
  	        
  	        $AnioBaseAnt = $AnioBase-1;
  		
  	        foreach($ArrayMes as $key => $value)
  	        {
  	        	if(!empty($value))
  	        	{
		  	        		if($value<>2 || $value<>3)
		  	        		{
					  	        			$pronosticoconsumoa=0;
					  	        				
					  	        
					  	        			$sql = "select distinct sa_consumohistorico.Id_CABMS, sa_cabms.vDescripcionCABMS
					  	        			from
					  	        			sa_consumohistorico,
					  	        			sa_cabms,
					  	        			sa_factorpronostico
					  	        			where
					  	        			(sa_consumohistorico.Id_CABMS BETWEEN '$Id_CABMSInicio' AND '$Id_CABMSFinal') and
					  	        			sa_consumohistorico.Id_CABMS = sa_cabms.Id_CABMS and
					  	        			(sa_consumohistorico.eAnio = sa_factorpronostico.eAnio and
					  	        			sa_consumohistorico.eMes = sa_factorpronostico.eMes)";
					  	        			$objGrid = new poolConnection();
					  	        			$con=$objGrid->Conexion();
					  	        			$objGrid->BaseDatos();
					  	        			$RSet=$objGrid->Query($sql);
					  	        			while($fila=mysql_fetch_array($RSet))
					  	        			{
							  	        			$i++;
							  	        			$info->Cambs=$fila[Id_CABMS];
							  	        			$info->eAnio=$AnioBase;
							  	        			$info->eMes=$value;
							  	        			$pronosticoconsumob=$this->pronostico_consumo_b($info);
							  	        			
							  	        			$Catalogo[] = array(
							  	        					$fila[Id_CABMS],
							  	        					$fila[vDescripcionCABMS],
							  	        					$pronosticoconsumoa,
							  	        					$pronosticoconsumob,
							  	        					$AnioBaseAnt,
							  	        					$AnioBase,
							  	        					$AnioPronosticar,
							  	        					$MesPro
							  	        			);
					  	        			}
					  	        			mysql_free_result($RSet);
					  	        			$objGrid->Cerrar($con);
		  	        
		  	        	    }
		  	        				
		  	        		if($value==2)
		  	        		{
			  	        			$sql = "select distinct sa_consumohistorico.Id_CABMS, sa_cabms.vDescripcionCABMS
			  	        			from
			  	        			sa_consumohistorico,
			  	        			sa_cabms,
			  	        			sa_factorpronostico
			  	        			where
			  	        			(sa_consumohistorico.Id_CABMS BETWEEN '$Id_CABMSInicio' AND '$Id_CABMSFinal') and
			  	        			sa_consumohistorico.Id_CABMS = sa_cabms.Id_CABMS and
			  	        			(sa_consumohistorico.eAnio = sa_factorpronostico.eAnio and
			  	        			sa_consumohistorico.eMes = sa_factorpronostico.eMes)";
			  	        			$objGrid = new poolConnection();
			  	        			$con=$objGrid->Conexion();
			  	        			$objGrid->BaseDatos();
			  	        			$RSet=$objGrid->Query($sql);
			  	        			while($fila=mysql_fetch_array($RSet))
			  	        			{
			  	        			$i++;
			  	        			$info->Cambs=$fila[Id_CABMS];
			  	        			$info->eAnio=$AnioBase;
			  	        			$info->eMes=$value;
			  	        			$pronosticoconsumoa=$this->pronostico_consumo_avalor2($info);
			  	        			$pronosticoconsumob=$this->pronostico_consumo_bvalor2($info);
			  	        			$Catalogo[] = array(
							  	        					$fila[Id_CABMS],
							  	        					$fila[vDescripcionCABMS],
							  	        					$pronosticoconsumoa,
							  	        					$pronosticoconsumob,
							  	        					$AnioBaseAnt,
							  	        					$AnioBase,
							  	        					$AnioPronosticar,
							  	        					$MesPro
							  	        			);
			  	        			}
			  	        			mysql_free_result($RSet);
			  	        			$objGrid->Cerrar($con);
		  	        		}
		  	        	 if($value==3)
		  	        		{
			  	        				$sql = "select distinct sa_consumohistorico.Id_CABMS, sa_cabms.vDescripcionCABMS
			  	        				from
			  	        				sa_consumohistorico,
			  	        				sa_cabms,
			  	        				sa_factorpronostico
			  	        				where
			  	        				(sa_consumohistorico.Id_CABMS BETWEEN '$Id_CABMSInicio' AND '$Id_CABMSFinal') and
			  	        				sa_consumohistorico.Id_CABMS = sa_cabms.Id_CABMS and
			  	        				(sa_consumohistorico.eAnio = sa_factorpronostico.eAnio and
			  	        				sa_consumohistorico.eMes = sa_factorpronostico.eMes)";
			  	        			$objGrid = new poolConnection();
			  	        			$con=$objGrid->Conexion();
			  	        			$objGrid->BaseDatos();
			  	        			$RSet=$objGrid->Query($sql);
			  	        				while($fila=mysql_fetch_array($RSet))
			  	        				{
			  	        				$i++;
			  	        				$info->Cambs=$fila[Id_CABMS];
			  	        				$info->eAnio=$AnioBase;
			  	        				$info->eMes=$value;
			  	        				$pronosticoconsumoa=$this->pronostico_consumo_avalor2($info);
			  	        				$pronosticoconsumob=$this->pronostico_consumo_bvalor2($info);
			  	        				$Catalogo[] = array(
							  	        					$fila[Id_CABMS],
							  	        					$fila[vDescripcionCABMS],
							  	        					$pronosticoconsumoa,
							  	        					$pronosticoconsumob,
							  	        					$AnioBaseAnt,
							  	        					$AnioBase,
							  	        					$AnioPronosticar,
							  	        					$MesPro
							  	        			);
			  	        				}
			  	        				mysql_free_result($RSet);
			  	        				$objGrid->Cerrar($con);
		  	        			}
  	        	}
  	        }       
  	 
  	return $Catalogo;
  }
}
?>
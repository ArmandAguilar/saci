<?php

class CargaInvFisico  extends poolConnection
{
 public function movimeintoinv($AData)
 {
 	$Id_CABMS=$AData->Id_CABMS;
 	$Id_ConsecutivoInv=$AData->Id_ConsecutivoInv;
 	$Resguardante1=$AData->Resguardante1;
 	$Id_TipoMovimiento=$AData->Id_TipoMovimiento;
 	$Id_Unidad=$AData->Id_Unidad;
 	$dFechaResguardo=$AData->dFechaResguardo;
 	$dFechaMovRegistro=$AData->dFechaMovRegistro;
 	$Accion=$AData->Accion;
 	
 	$objInvM = new poolConnection();
 	$con2=$objInvM->Conexion();
 	$objInvM->BaseDatos();
 	if($Accion=="Insertar")
 	{
 		$sql="INSERT INTO sa_movinventario values('$Id_CABMS',
 		'$Id_ConsecutivoInv',
 		'$Resguardante1',
 		'$Id_TipoMovimiento',
 		'$Id_Unidad',
 		'',
 		'',
 		'',
 		'$dFechaResguardo',
 		'$dFechaMovRegistro',
 		'');";
 		
 		
 	}
 	else
 	{
 		$sql="Update sa_movinventario set
 		      Id_CABMS='$Id_CABMS',
 		      Resguardante1='$Resguardante1',
 		      Id_TipoMovimiento='$Id_TipoMovimiento',
 		      Id_Unidad='$Id_Unidad',
 		      dFechaResguardo='$dFechaResguardo',
 		      dFechaMovRegistro='$dFechaMovRegistro'
 		      where
 		      Id_ConsecutivoInv='$Id_ConsecutivoInv'";
 	}	
 	
 	$objInvM->Query($sql);
 	return $sql;
 	//$objInvM->Cerrar($con);
 }
}

?>
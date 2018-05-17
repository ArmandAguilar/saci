<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DA1
 *
 * @author armand
 */
class DA1 extends poolConnection{
    public function ExistenciaInicial($AData)
    {
        $ExistenciaIni = 0;
        $FechaInicial = $AData->FechaInicial;
        $FechaFinal = $AData->FechaFinal;
        $Cambs = $AData->Id_Cambs;
        $objExistencias =  new poolConnection();
        $con=$objExistencias ->Conexion();
        $sql="select 
                IFNULL(sum(eExistenciaIniMovto),0) As Existencias
                from  
                 sa_movconsumo
                where
                sa_movconsumo.Id_CABMS='$Cambs' and
                (sa_movconsumo.Id_TipoMovimiento like '01%' or sa_movconsumo.Id_TipoMovimiento = '2502') and
                 dFechaRegistro>='$FechaInicial' and  dFechaRegistro<='$FechaFinal'";

        $RSet=$objExistencias->Query($con,$sql);
        while ($row = mysqli_fetch_array($RSet))
              {
                $ExistenciaIni =$row[Existencias]; 
              }
        return $ExistenciaIni;     
    }
    public function MovEntrada($AData)
    {
        $MovEntrada = 0;
        $FechaInicial = $AData->FechaInicial;
        $FechaFinal = $AData->FechaFinal;
        $Cambs = $AData->Id_Cambs;
        $objExistencias =  new poolConnection();
        $con=$objExistencias ->Conexion();
        $sql="select IFNULL(sum(eCantidad),0) As MovEnt
                from   
                sa_movconsumo
                where  
                sa_movconsumo.Id_CABMS='$Cambs' and
                Id_TipoMovimiento ='01%' and
                dFechaRegistro>='$FechaInicial' and
                dFechaRegistro<='$FechaFinal'";

        $RSet=$objExistencias->Query($con,$sql);
        while ($row = mysqli_fetch_array($RSet))
              {
                $MovEntrada =$row[MovEnt]; 
              }
        return $MovEntrada;     
    }
    public function MovSalida($AData)
    {
        $MovSalida = 0;
        $FechaInicial = $AData->FechaInicial;
        $FechaFinal = $AData->FechaFinal;
        $Cambs = $AData->Id_Cambs;
        $objExistencias =  new poolConnection();
        $con=$objExistencias ->Conexion();
        $sql="select IFNULL(sum(eCantidad),0) As MovSal
                from   
                sa_movconsumo
                where  
                sa_movconsumo.Id_CABMS='$Cambs' and
                Id_TipoMovimiento ='2502' and
                dFechaRegistro>='$FechaInicial' and
                dFechaRegistro<='$FechaFinal'";

        $RSet=$objExistencias->Query($con,$sql);
        while ($row = mysqli_fetch_array($RSet))
              {
                $MovSalida =$row[MovSal]; 
              }
        return $MovSalida;     
    }
  public function Saldos()
  {
        $MovEntradaS = 0;
        $FechaInicial = $AData->FechaInicial;
        $FechaFinal = $AData->FechaFinal;
        $Cambs = $AData->Id_Cambs;
        $objExistencias =  new poolConnection();
        $con=$objExistencias ->Conexion();
        $sql="select IFNULL(sum(mCostoUnitario),0) As MovEntS
                from   
                sa_movconsumo
                where  
                sa_movconsumo.Id_CABMS='$Cambs' and
                Id_TipoMovimiento ='01%' and
                dFechaRegistro>='$FechaInicial' and
                dFechaRegistro<='$FechaFinal'";

        $RSet=$objExistencias->Query($con,$sql);
        while ($row = mysqli_fetch_array($RSet))
              {
                $MovEntradaS =$row[MovEntS]; 
              }
        $MovSalidaS=0;
        $objExistencias1 =  new poolConnection();
        $con=$objExistencias1 ->Conexion();
        $sql="select IFNULL(sum(mCostoUnitario),0) As MovSalS
                from   
                sa_movconsumo
                where  
                sa_movconsumo.Id_CABMS='$Cambs' and
                Id_TipoMovimiento ='2502' and
                dFechaRegistro>='$FechaInicial' and
                dFechaRegistro<='$FechaFinal'";

        $RSet=$objExistencias1->Query($con,$sql);
        while ($row = mysqli_fetch_array($RSet))
              {
                $MovSalidaS =$row[MovSalS]; 
              }
      
      $Saldo = $MovEntradaS - $MovSalidaS;
      return $Saldo;
  }
  public function Max_Min($Cambs)
  {
		  	$obj =  new poolConnection();
		  	$con=$obj->Conexion();
		  	$obj->BaseDatos();
		  	$sql="SELECT 
					(Sum(eCantidad) * 0.9)    As Max,(Sum(eCantidad) * 0.3)    As Min
					FROM be_saci.sa_movconsumo
					Where Id_CABMS='$Cambs'";
		  	$RSet=$obj->Query($con,$sql);
		  	while($fila = mysqli_fetch_array($RSet))
		  	{
		  		$ArrayObj['Max']=$fila[Max];
		  		$ArrayObj['Min']=$fila[Min];
		  	}
  	       return $ArrayObj;
  }
 
public function  Generar_Reporte($AData)
 {
                        $FechaInicial = $AData->FechaInicial;
                        $FechaFinal = $AData->FechaFinal;
                        
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos($con);
			$sql="Select
                            DISTINCT(sa_cabms.Id_CABMS),
                            sa_cabms.ePartidaPresupuestal,
                            sa_cabms.vDescripcionCABMS,
                            sa_umedida.vDescripcion,
                            sa_unidadadmva.vDescripcion As UAdministrativa
                            From
                            sa_movconsumo,
                            sa_cabms,
                            sa_umedida,
                            sa_unidadadmva
                            Where
                            sa_movconsumo.Id_CABMS = sa_cabms.Id_CABMS and
                            sa_umedida.Id_UMedida = sa_cabms.Id_UMedida and
                            sa_movconsumo.Id_Unidad = sa_unidadadmva.Id_Unidad and
                            sa_movconsumo.dFechaRegistro>='$FechaInicial' and  sa_movconsumo.dFechaRegistro<='$FechaFinal'
                            ";
			$RSet=$objGrid->Query($con,$sql);
			$FliexGrid = "<br><br><center><table class=\"flexme1\">
			<tbody>";
                        $i=0;
		    while($fila=mysqli_fetch_array($RSet))
			{
			$i++;
                        $infos->FechaInicial=$FechaInicial;
                        $infos->Fechafinal=$FechaFinal;   
                        $infos->Id_Cambs=$fila[Id_CABMS];
			            $ExistenciaIni=$this->ExistenciaInicial($infos);
                        $MovEntradaExi = $this->MovEntrada($infos);
                        $MoSalidaExi =  $this->MovSalida($infos);
                        $Saldo = $this->Saldos($infos);
                        $SaldoF = number_format($Saldo,2,'.',',');
                        $ArrayMM=$this->Max_Min($fila[Id_CABMS]);
			$FliexGrid.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[ePartidaPresupuestal]</td>
                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ExistenciaIni</td>
                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$MovEntradaExi</td>
                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$MoSalidaExi</td>  
                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$SaldoF</td>
                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[UAdministrativa]</td>
                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayMM[Max]</td>
                        <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$ArrayMM[Min]</td>
			</tr>";
			}
			$objGrid->Cerrar($con,$RSet);
					$FliexGrid.="       </tbody>
					</table><script>$('.flexme1').flexigrid({
					title: '',
					colModel : [
			
					{display: 'P.Presupuestal', name : 'P.Presupuestal', width :120, sortable :false, align: 'center'},
					{display: 'Cve.CABMS', name : 'Cve.CABMS', width :100, sortable :false, align: 'center'},
			                {display: 'Existencia Inicial', name : 'Existencia Inicial', width :130, sortable :false, align: 'center'},
                                        {display: 'Mov. Entrada Inicial', name : 'Mov. Entrada Inicial', width :130, sortable :false, align: 'center'},
                                        {display: 'Mov. Entrada Salida', name : 'Mov. Entrada Salida', width :130, sortable :false, align: 'center'},
                                        {display: 'Saldo', name : 'Saldo', width :130, sortable :false, align: 'center'},
                                        {display: 'U. Administrativa', name : 'U. Administrativa', width :130, sortable :false, align: 'center'},
                                        {display: 'Saldo U. Medida', name : 'Saldo U. Medida', width :130, sortable :false, align: 'center'},
                                        {display: 'Max', name : 'Max', width :130, sortable :false, align: 'center'},
                                        {display: 'Min', name : 'Min', width :130, sortable :false, align: 'center'}
                                        
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
                                    <th><img id=\"BtnExportarPDF\" src=\"../../interfaz_modulos/botones/exportar_pdf.jpg\" name=\"ImagePdf\" width=\"120\" height=\"45\" border=\"0\" id=\"ImagePdf\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImagePdf','','../../interfaz_modulos/botones/exportar_pdf_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Pdf();\"/></th>
                                    <td>&nbsp;</td>
                                    <th></th>
                                    <td>&nbsp;</td>
                                    <th><img id=\"BtnExportarXLS\" src=\"../../interfaz_modulos/botones/exportar_excel.jpg\" name=\"ImageDoc\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageDoc\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageDoc','','../../interfaz_modulos/botones/exportar_excel_over.jpg',1)\" style='cursor:pointer' onclick=\"open_Xls();\"/></th>
                                </tr>
                            </table>  
                         </div>  
                        </center>";
			return $FliexGrid;
 }
 function print_pdf($AData)
 {
 	$FechaInicial = $AData->FechaInicial;
 	$FechaFinal = $AData->FechaFinal;
 	
 	
 	$objDatosPDF = new poolConnection();
 	$con=$objDatosPDF -> Conexion();
 	$objDatosPDF -> BaseDatos($con);
 		
 	$StrConsulta="Select
                            DISTINCT(sa_cabms.Id_CABMS),
                            sa_cabms.ePartidaPresupuestal,
                            sa_cabms.vDescripcionCABMS,
                            sa_umedida.vDescripcion,
                            sa_unidadadmva.vDescripcion As UAdministrativa
                            From
                            sa_movconsumo,
                            sa_cabms,
                            sa_umedida,
                            sa_unidadadmva
                            Where
                            sa_movconsumo.Id_CABMS = sa_cabms.Id_CABMS and
                            sa_umedida.Id_UMedida = sa_cabms.Id_UMedida and
                            sa_movconsumo.Id_Unidad = sa_unidadadmva.Id_Unidad and
                            sa_movconsumo.dFechaRegistro>='$FechaInicial' and  sa_movconsumo.dFechaRegistro<='$FechaFinal'";
 
 	$RSet = $objDatosPDF ->Query($con,$StrConsulta);
 	$Catalogo = array();
 	$i=0;
 	while ($Row = mysqli_fetch_array($RSet)){
 		
 		$i++;
 		$infos->FechaInicial=$FechaInicial;
 		$infos->Fechafinal=$FechaFinal;
 		$infos->Id_Cambs=$Row[Id_CABMS];
 		$ExistenciaIni=$this->ExistenciaInicial($infos);
 		$MovEntradaExi = $this->MovEntrada($infos);
 		$MoSalidaExi =  $this->MovSalida($infos);
 		$Saldo = $this->Saldos($infos);
 		$SaldoF = number_format($Saldo,2,'.',',');
 		$ArrayMM=$this->Max_Min($Row[Id_CABMS]);
 	$Catalogo[] = array(
 		$Row["ePartidaPresupuestal"],
 		$Row["Id_CABMS"],
 	    $ExistenciaIni,
 	    $MovEntradaExi,
 		$MoSalidaExi,
 	    $SaldoF,
 	    $Row["UAdministrativa"],
 		$Row["vDescripcion"],
 		$ArrayMM[Max],
 		$ArrayMM[Min]
 		);
 	}

 			$objDatosPDF->Cerrar($con,$RSet);
 			 	return $Catalogo;
 }
}

?>

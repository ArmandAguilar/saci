<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reporte_CapasidadAlmacen
 *
 * @author armand
 */
class Reporte_CapasidadAlmacen extends poolConnection{
   
    

 public function vMaximo($CAMBS)
 {
    $obj = new poolConnection();
    $con=$obj->Conexion();
    $obj->BaseDatos($con);
    $sql="select (9 * sa_existenciasconsumible.eConsumoPromedio) as Max
          from
          sa_existenciasconsumible
          where
            sa_existenciasconsumible.Id_CABMS='$CAMBS'";
    $RSet=$obj->Query($con,$sql);
    while ($row = mysqli_fetch_array($RSet))
           {
              $Max = $row[Max];
           }
           return $Max;   
 }     
public function vMinimo($CAMBS)
{
    $obj = new poolConnection();
    $con=$obj->Conexion();
    $obj->BaseDatos($con);
    $sql="select (3 * sa_existenciasconsumible.eConsumoPromedio) as Min
          from
          sa_existenciasconsumible
          where
            sa_existenciasconsumible.Id_CABMS='$CAMBS'";
    $RSet=$obj->Query($con,$sql);
    while ($row = mysqli_fetch_array($RSet))
           {
              $Min = $row[Min];
           }
           return $Min; 
}
public function Capasidad($Existencias)
{
    
    
}      

    public function  Generar_Reporte($AData)
 {
     
                        $Tipo=$AData->Tipo;
                        
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos($con);
			$sql="Select
                            DISTINCT(sa_existenciasconsumible.Id_CABMS),
                            sa_cabms.vDescripcionCABMS,
                            sa_umedida.vDescripcion,
                            sa_existenciasconsumible.eCantidadExistenciaDisponible
                            From
                            sa_existenciasconsumible,
                            sa_cabms,
                            sa_umedida

                            where
                            sa_existenciasconsumible.Id_CABMS = sa_cabms.Id_CABMS and
                            sa_cabms.Id_UMedida = sa_umedida.Id_UMedida";
			$RSet=$objGrid->Query($con,$sql);
			
                     $Capasidad = "Normal";   
		    while($fila=mysqli_fetch_array($RSet))
			{
			
			            $vMax=$this->vMaximo($fila[Id_CABMS]);
                        $vMin = $this->vMinimo($fila[Id_CABMS]);
                        if($fila[eCantidadExistenciaDisponible]>=$vMax)
                        {
                            $Capasida="Alto";
                        }
                        if($fila[eCantidadExistenciaDisponible]<=$vMin)
                        {
                            $Capasida="Bajo";
                        }
                        
                                        if($Tipo==$Capasida)
                                        {
                                                $FliexGrid2.="
                                             <tr>
                                             <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
                                             <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcionCABMS]</td>
                                             <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
                                             <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[eCantidadExistenciaDisponible]</td>    
                                             <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$vMax</td>
                                             <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$vMin</td>
                                             <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$Capasida</td>
                                        </tr>"; 
                                        }
                                           
                        
                                       
                       
			}
			$objGrid->Cerrar($con,$RSet);
                        
                        $FliexGrid = "<br><br><center><table class=\"flexme1\">
			<tbody>$FliexGrid2";
					$FliexGrid.="       </tbody>
					</table><script>$('.flexme1').flexigrid({
					title: '',
					colModel : [
			
                                                    {display: 'Cambs', name : 'Cambs', width :120, sortable :false, align: 'center'},
                                                    {display: 'Descripcion', name : 'Descripcion', width :400, sortable :false, align: 'center'},
                                                    {display: 'U. Medidad', name : 'U. Medidad', width :100, sortable :false, align: 'center'},
                                                    {display: 'Existencia', name : 'Existencia', width :100, sortable :false, align: 'center'},
                                                    {display: 'Valor Max.', name : 'Valor Max.', width :130, sortable :false, align: 'center'},
                                                    {display: 'Valor Min.', name : 'Valor Min.', width :130, sortable :false, align: 'center'},
                                                    {display: 'Valor', name : 'Valor', width :130, sortable :false, align: 'center'}
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
 	$Tipo=$AData->Tipo;
 
 	$objDatosPDF = new poolConnection();
 	$con=$objDatosPDF -> Conexion();
 	$objDatosPDF -> BaseDatos($con);
 		
 	$StrConsulta="Select
                            DISTINCT(sa_existenciasconsumible.Id_CABMS),
                            sa_cabms.vDescripcionCABMS,
                            sa_umedida.vDescripcion,
                            sa_existenciasconsumible.eCantidadExistenciaDisponible
                            From
                            sa_existenciasconsumible,
                            sa_cabms,
                            sa_umedida

                            where
                            sa_existenciasconsumible.Id_CABMS = sa_cabms.Id_CABMS and
                            sa_cabms.Id_UMedida = sa_umedida.Id_UMedida";
 
 	$RSet = $objDatosPDF ->Query($con,$StrConsulta);
 	$Catalogo = array();
 	$i=0;
 	while ($Row = mysqli_fetch_array($RSet))
 	{
 			
 		$i++;
 		$vMax=$this->vMaximo($Row[Id_CABMS]);
 		$vMin = $this->vMinimo($Row[Id_CABMS]);
 		
 		if($Row[eCantidadExistenciaDisponible]>=$vMax)
 		{
 			$Capasida="Alto";
 		}
 		if($Row[eCantidadExistenciaDisponible]<=$vMin)
 		{
 			$Capasida="Bajo";
 		}
 		
 		if($Tipo==$Capasida)
 		{
 			 
		 		$Catalogo[] = array(
		 				$Row["Id_CABMS"],
		 				$Row["vDescripcionCABMS"],
		 				$Row["vDescripcion"],
		 				$Row["eCantidadExistenciaDisponible"],	
		 				$vMax,
		 				$vMin,
		 				$Capasida
		 		);
 		}
 	}

 	$objDatosPDF->Cerrar($con,$RSet);
 	return $Catalogo;
 }
}

?>

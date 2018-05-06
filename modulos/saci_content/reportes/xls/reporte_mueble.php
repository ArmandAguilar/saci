<?php    
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_etiquetas_mueble.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    include("../../../../sis.php");
    include($path."/class/poolConnection.php");
    include($path."/class/Reporte_Etiquetas.php");
    require_once $path."class/phpexcel/Classes/PHPExcel.php";
    require_once $path."class/phpexcel/Classes/PHPExcel/IOFactory.php";
        
    $ObjImgLogo = new poolConnection();
            $con=$ObjImgLogo->Conexion();
            $ObjImgLogo->BaseDatos();
            $sql="SELECT Reportes FROM sa_settings Where Id='1'";
            $RSetImg=$ObjImgLogo->Query($sql);
            while($rowimg = mysql_fetch_array($RSetImg))
            {
                $Logo = $rowimg[Reportes];
            }
            mysql_free_result($RSetImg);
            $ObjImgLogo->Cerrar($con);
    $PHPExcel = new PHPExcel();
    
    $PHPExcel->getProperties()->setCreator("Be-Intelligent")
    ->setLastModifiedBy("")
    ->setTitle("")
    ->setSubject("")
    ->setDescription("")
    ->setKeywords("")
    ->setCategory("");
    $PHPExcel->getActiveSheet()->setTitle('ETIQUETAS MUEBLE');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(64)->setHeight(63);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:E1')->setCellValue('A1', 'REPORTE DE GENERACION DE ETIQUETAS MUEBLES')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:E2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:E3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:E4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:E5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:R7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:R7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
    
    /*$Catalogo[] = array(
    		$Row[Id_CABMS],
    		$Row[vDescripcionCABMS],
    		$ArrayT[Id_ConsecutivoInv],
    		$ArrayT[vMarca],
    		$ArrayT[vModelo],
    		$ArrayT[vTipo],
    		$ArrayT[eNoCajon],
    		$ArrayT[eNoGaveta],
    		$ArrayT[eNoEntrepanio],
    		$ArrayT[bNoPedestal],
    		$ArrayT[bFija],
    		$ArrayT[bGiratoria],
    		$ArrayT[bRodajas],
    		$ArrayT[bPlegable],
    		$CveReguardante,
    		$QR,
    		$QRE,
    		$Row[vDescripcionCABMS]*/
    
    
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "Cambs")
    ->setCellValue("B7", "Descripcion")
    ->setCellValue("C7", 'Consecutivo')
    ->setCellValue("D7", "Marca")
    ->setCellValue("E7", "Modelo")
    ->setCellValue("F7", "Tipo")
    ->setCellValue("G7", "No. Cajon")
    ->setCellValue("H7", "No. Gaveta")
    ->setCellValue("I7", "Entrepa�o")
    ->setCellValue("J7", "No. Pedestal")
    ->setCellValue("K7", "Fija")
    ->setCellValue("L7", "Giratoria")
    ->setCellValue("M7", "Rodajas")
    ->setCellValue("N7", "Plegable")
    ->setCellValue("O7", "Resguardante")
    ->setCellValue("P7", "Etiqueta QR")
    ->setCellValue("Q7", "Etiqueta Exterior 1")
    ->setCellValue("R7", "Etiqueta Exterior 2");
    
    $RP = new Reporte_Etiquetas();
    $info->txtCveCambs=$_GET[txtCveCambs];
    $info->txtResId=$_GET[txtResId];
    $info->txtNombre=$_GET[txtNombre];
    
    $Datos = $RP->print_pdf($info);
    $i = 8;
   
    foreach ($Datos as $F) {
        $PHPExcel->setActiveSheetIndex(0)
        ->setCellValueByColumnAndRow(0, $i, $F[0])
        ->setCellValueByColumnAndRow(1, $i, $F[1])
        ->setCellValueByColumnAndRow(2, $i, $F[2])
        ->setCellValueByColumnAndRow(3, $i, $F[3])
        ->setCellValueByColumnAndRow(4, $i, $F[4])
        ->setCellValueByColumnAndRow(5, $i, $F[5])
        ->setCellValueByColumnAndRow(6, $i, $F[6])
        ->setCellValueByColumnAndRow(7, $i, $F[7])
        ->setCellValueByColumnAndRow(8, $i, $F[8])
        ->setCellValueByColumnAndRow(9, $i, $F[9])
        ->setCellValueByColumnAndRow(10, $i, $F[10])
        ->setCellValueByColumnAndRow(11, $i, $F[11])
        ->setCellValueByColumnAndRow(12, $i, $F[12])
        ->setCellValueByColumnAndRow(13, $i, $F[13])
        ->setCellValueByColumnAndRow(14, $i, $F[14])
        ->setCellValueByColumnAndRow(15, $i, $F[15])
        ->setCellValueByColumnAndRow(16, $i, $F[16])
        ->setCellValueByColumnAndRow(17, $i, $F[17]);
        $i++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>
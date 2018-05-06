<?php    
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_salidas.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    include("../../../../sis.php");
    include($path."/class/poolConnection.php");
    include($path."/class/Reporte_Consumible_Salida.php");
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
    $PHPExcel->getActiveSheet()->setTitle('CONSUMIBLE SALIDA');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(64)->setHeight(63);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:K1')->setCellValue('A1', 'REPORTE DE SALIDAS')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:K2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:K3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:K4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:K5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:K7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:K7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
    
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "Registro")
    ->setCellValue("B7", "Folio")
    ->setCellValue("C7", "Documento")
    ->setCellValue("D7", "U. Administrativa")
    ->setCellValue("E7", "Partida Presupuestal")
    ->setCellValue("F7", "CAMBS")
    ->setCellValue("G7", "Cantidad")
    ->setCellValue("H7", "CostoUnitario")
    ->setCellValue("I7", "Importe")
    ->setCellValue("J7", "Num. Pedido")
    ->setCellValue("K7", "CABMS");
    
    $RC = new Reporte_Consumible_Salida();
    
    $ArrayInicio = split("/",$_GET[v2]);
    $ArrayFinal = split("/",$_GET[v3]);
    $FechaInicio="$ArrayInicio[2]/$ArrayInicio[0]/$ArrayInicio[1]";
    $FechaFinal="$ArrayFinal[2]/$ArrayFinal[0]/$ArrayFinal[1]";
    $info->FechaInicial=$FechaInicio;
    $info->FechaFianl=$FechaFinal;
    $Datos = $RC->print_pdf($info);
    $i = 8;
    foreach ($Datos as $F) {
        $PHPExcel->setActiveSheetIndex(0)
        ->setCellValueByColumnAndRow(0, $i, $F[0])
        ->setCellValueByColumnAndRow(1, $i, $F[1])
        ->setCellValueByColumnAndRow(2, $i, $F[2])
        ->setCellValueByColumnAndRow(3, $i, $F[3])
        ->setCellValueByColumnAndRow(4, $i, $F[4])
        ->setCellValueByColumnAndRow(5, $i, $F[7])
        ->setCellValueByColumnAndRow(6, $i, $F[8])
        ->setCellValueByColumnAndRow(7, $i, $F[9])
        ->setCellValueByColumnAndRow(8, $i, $F[10]);
        $i++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>
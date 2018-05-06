<?php    
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_manejocapasidadalamacen.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    include("../../../../sis.php");
    include($path."/class/poolConnection.php");
    include("$path/class/Reporte_MovimientoKardex.php");
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
    $PHPExcel->getActiveSheet()->setTitle('CAPASIDAD ALMACEN');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(64)->setHeight(63);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:E1')->setCellValue('A1', 'REPORTE DE MANEJO CAPASIDAD ALMACEN')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:E2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:E3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:E4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:E5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:E7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:E7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(70);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "P.Presupuestal")
    ->setCellValue("B7", "Cve.Cabms")
    ->setCellValue("C7", 'Exist. Inicial')
    ->setCellValue("D7", "Mov.Entrada Inicial")
    ->setCellValue("E7", "Mov.Entrada")
    ->setCellValue("F7", "Saldo")
    ->setCellValue("G7", "U.Administrativa")
    ->setCellValue("H7", "Saldo U.Medida")
    ->setCellValue("I7", "Max")
    ->setCellValue("J7", "Min");
    $RP = new Reporte_MovimientoKardex();
    $info->PedidoInicial=$_GET[v1];
    $info->PedidoFinal=$_GET[v2];
    $info->FechaInicial=$_GET[v3];
    $info->FechaFinal=$_GET[v4];
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
        ->setCellValueByColumnAndRow(9, $i, $F[9]);
        $i++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>
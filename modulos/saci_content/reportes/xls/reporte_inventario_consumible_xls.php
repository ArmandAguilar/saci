<?php    
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_inventario_consumible.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
     include("../../../../sis.php");
    include($path."/class/poolConnection.inic");
    include($path."/class/Reporte_Inventario_Consumible.php");
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
    $PHPExcel->getActiveSheet()->setTitle('REPORTE DE INVENTARIO');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(64)->setHeight(63);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:G1')->setCellValue('A1', 'REPORTE DE INVENTARIO CONSUMIBLE')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:G2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:G3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:G4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:G5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:G7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:G7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(80);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "Partida Presupuestal")
    ->setCellValue("B7", "Descripcion")
    ->setCellValue("C7", "Unidad de Medida")
    ->setCellValue("D7", "Costo Promedio")
    ->setCellValue("E7", "Apartado")
    ->setCellValue("F7", "Disponible")
    ->setCellValue("G7", "Total");
    $RC = new Reporte_Inventario_Consumible();
    
    $ArrayInicio = split("/",$_GET[v1]);
    $ArrayFinal = split("/",$_GET[v2]);
    $FechaInicioI="$ArrayInicio[2]/$ArrayInicio[0]/$ArrayInicio[1]";
    $FechaFinalI="$ArrayFinal[2]/$ArrayFinal[0]/$ArrayFinal[1]";
    $info->FechaInicial=$FechaInicioI;
    $info->FechaFinal=$FechaFinalI;
    $Datos = $RC->print_pdf($info);
    $i = 8;
    foreach ($Datos as $F) {
        $PHPExcel->setActiveSheetIndex(0)
        ->setCellValueByColumnAndRow(0, $i, $F[0])
        ->setCellValueByColumnAndRow(1, $i, $F[1])
        ->setCellValueByColumnAndRow(2, $i, $F[2])
        ->setCellValueByColumnAndRow(3, $i, $F[3])
        ->setCellValueByColumnAndRow(4, $i, $F[4])
        ->setCellValueByColumnAndRow(5, $i, $F[5])
        ->setCellValueByColumnAndRow(6, $i, $F[6]);
        $i++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>
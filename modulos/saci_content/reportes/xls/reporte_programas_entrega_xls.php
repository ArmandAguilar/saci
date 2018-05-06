<?php    
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_programas_entrega.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    include("../../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/reporte_de_programas_de_entrega.php");
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
    $PHPExcel->getActiveSheet()->setTitle('PROGRAMA DE ENTREGA');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(64)->setHeight(63);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:G1')->setCellValue('A1', 'REPORTE DE PROGRAMA DE ENTREGA')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:G2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:G3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:G4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:G5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:G7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:G7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "No.")
    ->setCellValue("B7", "Oficna Administrativa")
    ->setCellValue("C7", "No. Empleado")
    ->setCellValue("D7", "Oportuno")
    ->setCellValue("E7", "N/Cumple")
    ->setCellValue("F7", "Nota de Cargo")
    ->setCellValue("G7", "Fecha");
    

    $RPE = new Reporte_Programas_Entrega();
    $Mes = $_GET["mes"];           
    $Orden = $_GET["orden"];
    $Datos = $RPE->ObtenerReporte($Mes, $Orden);
    $i = 8;
    /*
    foreach($Datos as $Dato)
    {
        echo $Dato->Zona." | ";
        echo $Dato->Unidad_Administrativa." | ";
        echo $Dato->Numero_Empleado." | ";
        echo $Dato->Fecha_Registro_Inicial." | ";
        echo $Dato->Fecha_Registro_Final." | ";
        echo $Dato->Folio." | ";
        echo $Dato->Fecha_Registro."<br/>";
    }
    */
    foreach ($Datos as $F) {
        $PHPExcel->setActiveSheetIndex(0)
        ->setCellValueByColumnAndRow(0, $i, $F->Prioridad)
        ->setCellValueByColumnAndRow(1, $i, $F->Unidad_Administrativa)
        ->setCellValueByColumnAndRow(2, $i, $F->Numero_Empleado)
        ->setCellValueByColumnAndRow(3, $i, $F->Fecha_Registro_Inicial)
        ->setCellValueByColumnAndRow(4, $i, $F->Fecha_Registro_Final)
        ->setCellValueByColumnAndRow(5, $i, $F->Folio)
        ->setCellValueByColumnAndRow(6, $i, $F->Fecha_Registro);
        $i++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>
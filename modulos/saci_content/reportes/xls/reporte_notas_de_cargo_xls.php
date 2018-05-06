<?php    
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_notas_de_cargo.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    include("../../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/generacion_de_notas_de_cargo.php");
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
    $PHPExcel->getActiveSheet()->setTitle('NOTAS DE CARGO');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(64)->setHeight(63);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:F1')->setCellValue('A1', 'REPORTE DE NOTAS DE CARGO')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:F2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:F3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:F4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:F5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:F7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:F7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "Fecha")
    ->setCellValue("B7", "IDCABMS")
    ->setCellValue("C7", "Articulo")
    ->setCellValue("D7", "Unidad de Medida")
    ->setCellValue("E7", "Precio")
    ->setCellValue("F7", "Total");
    

    $RGNC = new Reporte_Generacion_Notas_Cargo();
    $FolioPeriodo = $_GET["folioperiodo"];
    $Desde = $_GET["desde"];
    $Hasta = $_GET["hasta"];
    $Estatus = $_GET["estatus"];
    $Datos = $RGNC->ObtenerReporte($FolioPeriodo, $Desde, $Hasta, $Estatus);
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
        ->setCellValueByColumnAndRow(0, $i, $F->FechaPedido)
        ->setCellValueByColumnAndRow(1, $i, $F->IDCABMS)
        ->setCellValueByColumnAndRow(2, $i, $F->DescripcionArticulo)
        ->setCellValueByColumnAndRow(3, $i, $F->DescripcionUnidadMedida)
        ->setCellValueByColumnAndRow(4, $i, $F->Precio)
        ->setCellValueByColumnAndRow(5, $i, $F->Total);
        $i++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>
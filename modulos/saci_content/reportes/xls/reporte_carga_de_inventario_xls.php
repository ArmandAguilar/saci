<?php    
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_carga_de_inventario.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    include("../../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/carga_de_inventario.php");
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
    $PHPExcel->getActiveSheet()->setTitle('CARGO INVENTARIO');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(64)->setHeight(63);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:F1')->setCellValue('A1', 'REPORTE CARGO INVENTARIO')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:F2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:F3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:F4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:F5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:F7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:F7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "IDCABMS")
    ->setCellValue("B7", "Descripcion")
    ->setCellValue("C7", "Unidad de Medida")
    ->setCellValue("D7", "Apartado")
    ->setCellValue("E7", "Disponible")
    ->setCellValue("F7", "Total");
    

    $CI = new Carga_Inventario();
    $IDCABMS = $_GET["idcabms"];
    $Datos = $CI->ObtenerExistenciaConsumibles($IDCABMS);
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
        ->setCellValueByColumnAndRow(0, $i, $F->idcabms)
        ->setCellValueByColumnAndRow(1, $i, $F->descripcion)
        ->setCellValueByColumnAndRow(2, $i, $F->unidadmedida)
        ->setCellValueByColumnAndRow(3, $i, $F->apartado)
        ->setCellValueByColumnAndRow(4, $i, $F->disponible)
        ->setCellValueByColumnAndRow(5, $i, $F->total);
        $i++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>
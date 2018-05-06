<?php    
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_manejo_almacen.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    include("../../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/manejo_de_la_capacidad_del_almacen.php");
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
    $PHPExcel->getActiveSheet()->setTitle('CAPACIDAD DEL ALMACEN');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(64)->setHeight(63);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:H1')->setCellValue('A1', 'REPORTE DEL MANEJO DE LA CAPACIDAD DEL ALMACEN')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:H2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:H3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:H4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:H5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:H7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:H7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(140);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "C. Articulo")
    ->setCellValue("B7", "C.I. Articulo")
    ->setCellValue("C7", "Descripcion Articulo")
    ->setCellValue("D7", "Disponible")
    ->setCellValue("E7", "Unidad Medida")
    ->setCellValue("F7", "Maximo")
    ->setCellValue("G7", "Minimo")
    ->setCellValue("H7", "Valor");
    

    $RMA = new Reporte_Manejo_Almacen();        
    $Valor = $_GET["valor"];
    $Datos = $RMA->ObtenerReporte($Valor);
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
        ->setCellValueByColumnAndRow(0, $i, $F->ClaveArticulo)
        ->setCellValueByColumnAndRow(1, $i, $F->ClaveInternaArticulo)
        ->setCellValueByColumnAndRow(2, $i, $F->Descripcion_Articulo)
        ->setCellValueByColumnAndRow(3, $i, $F->Disponible)
        ->setCellValueByColumnAndRow(4, $i, $F->Descripcion_Medida)
        ->setCellValueByColumnAndRow(5, $i, $F->Maximo)
        ->setCellValueByColumnAndRow(6, $i, $F->Minimo)
        ->setCellValueByColumnAndRow(7, $i, $F->Valor);
        $i++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>
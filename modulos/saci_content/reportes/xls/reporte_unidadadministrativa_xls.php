<?php
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_catalogo_unidades_de_administrativa.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
     include("../../../../sis.php");
    include("$path/class/poolConnection.php");
    include("$path/class/Reporte_Catalogos.php");
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
    $PHPExcel->getActiveSheet()->setTitle('U. ADMINISTRATIVA');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(63)->setHeight(64);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:B1')->setCellValue('A1', 'REPORTE DE CATALOGO DE UNIDAD ADMINISTRATIVA')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:B2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:B3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:B4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:B5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:N7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:N7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(45);
    $PHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(45);
    
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "IDUMedida")
    ->setCellValue("B7", "Resposable Area")
    ->setCellValue("C7", "Zona")
    ->setCellValue("D7", "Decripcion")
    ->setCellValue("E7", "Calle")
    ->setCellValue("F7", "Numero")
    ->setCellValue("G7", "Colonia")
    ->setCellValue("H7", "Problacion")
    ->setCellValue("I7", "CP")
    ->setCellValue("J7", "Telefono")
    ->setCellValue("K7", "Fax")
    ->setCellValue("L7", "Folio");
    
 
    $RC = new Reporte_Catalogos();
    $Datos = $RC->ObtenerArregloCatalogoUnidadAdministrativa();
    $i = 8;
    foreach ($Datos as $F) {
        $PHPExcel->setActiveSheetIndex(0)
        ->setCellValueByColumnAndRow(0, $i, $F[1])
        ->setCellValueByColumnAndRow(1, $i, $F[2])
        ->setCellValueByColumnAndRow(2, $i, $F[3])
        ->setCellValueByColumnAndRow(3, $i, $F[4])
        ->setCellValueByColumnAndRow(4, $i, $F[5])
        ->setCellValueByColumnAndRow(5, $i, $F[6])
        ->setCellValueByColumnAndRow(6, $i, $F[7])
        ->setCellValueByColumnAndRow(7, $i, $F[8])
        ->setCellValueByColumnAndRow(8, $i, $F[9])
        ->setCellValueByColumnAndRow(9, $i, $F[10])
        ->setCellValueByColumnAndRow(10, $i, $F[11])
        ->setCellValueByColumnAndRow(11, $i, $F[12]);
        $i++;
    }
    
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>
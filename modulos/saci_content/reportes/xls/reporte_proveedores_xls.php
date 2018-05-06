<?php
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_catalogo_proveedores.xls");
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
    ->setTitle("Catálogo de Proveedores")
    ->setSubject("Be-Intelligent")
    ->setDescription("Reporte del Catálogo de Proveedores")
    ->setKeywords("")
    ->setCategory("Reportes");
    $PHPExcel->getActiveSheet()->setTitle('CAT. PROVEEDORES');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(63)->setHeight(64);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:S1')->setCellValue('A1', 'REPORTE DE CATALOGO DE PROVEEDORES')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:S2')->setCellValue('A2', '')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:S3')->setCellValue('A3', '')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:S4')->setCellValue('A4', '')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:S5')->setCellValue('A5', '')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:S7')
        ->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()
        ->setARGB('FFEEEEEE');
    
    $styleArray = array(
        'font' => array(
            'size' => 9
        )
    );    
    $PHPExcel->getActiveSheet()->getStyle('A1:S7')->applyFromArray($styleArray);
    
    $PHPExcel->getActiveSheet()->getStyle('A7:S7')
        ->getAlignment()
        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
        ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
        ->setWrapText(true);
    $PHPExcel->getActiveSheet()->getStyle('A7:S7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
    $PHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
    $PHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
    $PHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
    $PHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
    $PHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
    
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "ID Proveedor")
    ->setCellValue("B7", "ID Giro")
    ->setCellValue("C7", "Nombre")
    ->setCellValue("D7", "Responsable")
    ->setCellValue("E7", "Calle")
    ->setCellValue("F7", "Numero")
    ->setCellValue("G7", "Colonia")
    ->setCellValue("H7", "Población")
    ->setCellValue("I7", "CP")
    ->setCellValue("J7", "RFC")
    ->setCellValue("K7", "Padrón Federal")
    ->setCellValue("L7", "Ced. Emp.")
    ->setCellValue("M7", "Camara de Com.")
    ->setCellValue("N7", "Canacintra")
    ->setCellValue("O7", "Camara Ramo")
    ->setCellValue("P7", "Telefono 1")
    ->setCellValue("Q7", "Telefono 2")
    ->setCellValue("R7", "Nacional")
    ->setCellValue("S7", "Fax");

    $RC = new Reporte_Catalogos();
    $Datos = $RC->ObtenerArregloCatalogoProveedores();
    $i = 8;
    foreach ($Datos as $F) {
        $PHPExcel->getActiveSheet()
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
        ->setCellValueByColumnAndRow(17, $i, $F[17])
        ->setCellValueByColumnAndRow(18, $i, $F[18]);
        $i++;
    }
    $PHPExcel->getActiveSheet()->getStyle('A8:S'.$i)->applyFromArray($styleArray);
    $PHPExcel->getActiveSheet()->getStyle('A8:B'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('F8:F'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('I8:I'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('K8:M'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A8:A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>
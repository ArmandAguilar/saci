<?php    
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=reporte_entradasysalidas.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    include("../../../../sis.php");
    include($path."/class/poolConnection.php");
    include($path."/class/Reporte_EntradaYSalida.php");
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
    $PHPExcel->getActiveSheet()->setTitle('Reporte_Peiddo');
    
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setPath("../../../../logos/$Logo");
    $objDrawing->setCoordinates('A1');
    $objDrawing->setWidth(64)->setHeight(63);
    $objDrawing->setWorksheet($PHPExcel->getActiveSheet());
    
    $PHPExcel->getActiveSheet()->mergeCells('A1:E1')->setCellValue('A1', 'DIRECCION DE ADMINISTRACION')->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A2:E2')->setCellValue('A2', 'UNIDAD DEPARTAMENTAL DE RECURSOS MATERIALES')->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A3:E3')->setCellValue('A3', 'Y SERVICIOS GENERALES')->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A4:E4')->setCellValue('A4', 'ALMACEN E INVENTARIO')->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->mergeCells('A5:E5')->setCellValue('A5', 'ENTRADA Y SALIDAS')->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $PHPExcel->getActiveSheet()->getStyle('A7:Q7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $PHPExcel->getActiveSheet()->getStyle('A7:Q7')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    $PHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
    $PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $PHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
   
    $this->CabeceraTabla = array('Fecha','Documento','U.Administrativa','Cve.CABMS','Descripcion','Total');
    $PHPExcel->setActiveSheetIndex(0)
    ->setCellValue("A7", "Fecha")
    ->setCellValue("B7", "Documento")
    ->setCellValue("C7", 'U. Administrativa')
    ->setCellValue("D7", "Cve.CABMS")
    ->setCellValue("E7", "Descripcion")
    ->setCellValue("F7", "Total");
    
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
        ->setCellValueByColumnAndRow(5, $i, $F[5]);
        $i++;
    }
    $objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
    $objWriter->save('php://output');
?>
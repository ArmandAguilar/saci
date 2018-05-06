<?php

include("../sis.php");
include("$path/class/poolConnection.php");
include("$path/class/carga_inicial.php");
include("$path/class/Inventario.php");

$CI = new Carga_Inicial();

switch ($_GET[o]) 
{
	case 'ObtenerDetalleCargaInicial':
		$IDUnidadAdministrativa = $_GET[idadmin];
		$objDataGrid =  new poolConnection();
		$objDataGrid->Conexion();
		$objDataGrid->BaseDatos();
		/*
		// get data and store in a json array
		
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = " SELECT SQL_CALC_FOUND_ROWS
		CI.Id_CveCABMS As idcabms,
		CC.vDescripcionCABMS As Cabms,
		CI.Id_Unidad AS idunidadmedida,
		UM.vDescripcion AS unidadmedida,
		CI.cTipoCarga As tipocarga,
		CI.dFechaCaptura As fechacaptura,
		CI.eCantidadCargaIni As cantidadsolicitada,
		CI.eCantidadEntregada As cantidadentregada
		FROM
		sa_cargainiarticulo CI,
		sa_cabms CC ,
		sa_umedida UM
		WHERE
		CI.Id_Unidad = '$_GET[idadmin]'  and
		CI.Id_CveCABMS = CC.Id_CABMS and
		CC.Id_UMedida = UM.Id_UMedida and
		CI.cEstadoCarga = 'A' ";
		//$query = "SELECT SQL_CALC_FOUND_ROWS * FROM zn_fotos Where zn_galeria_Id='$_GET[IdGaleria]'   LIMIT $start, $pagesize";
		if (isset($_GET['sortdatafield']))
		{
			$sortfield = $_GET['sortdatafield'];
			$sortorder = $_GET['sortorder'];
			$result = $objDataGrid->Query($query);
			$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
			$rows = $objDataGrid->Query($sql);
			$rows = mysql_fetch_assoc($rows);
			$total_rows = $rows['found_rows'];
		
			if ($sortfield != NULL)
			{
		
				if ($sortorder == "desc")
				{
					$query = "SELECT SQL_CALC_FOUND_ROWS
							CI.Id_CveCABMS As idcabms,
							CC.vDescripcionCABMS As Cabms,
							CI.Id_Unidad AS idunidadmedida,
							UM.vDescripcion AS unidadmedida,
							CI.cTipoCarga As tipocarga,
							CI.dFechaCaptura As fechacaptura,
							CI.eCantidadCargaIni As cantidadsolicitada,
							CI.eCantidadEntregada As cantidadentregada
							FROM
							sa_cargainiarticulo CI,
							sa_cabms CC ,
							sa_umedida UM
							WHERE
							CI.Id_Unidad = '$_GET[idadmin]'  and
							CI.Id_CveCABMS = CC.Id_CABMS and
							CC.Id_UMedida = UM.Id_UMedida and
							CI.cEstadoCarga = 'A' ORDER BY" . " " . $sortfield . " DESC LIMIT $start, $pagesize";
				}
				else if ($sortorder == "asc")
				{
					$query = "SELECT SQL_CALC_FOUND_ROWS
						CI.Id_CveCABMS As idcabms,
						CC.vDescripcionCABMS As Cabms,
						CI.Id_Unidad AS idunidadmedida,
						UM.vDescripcion AS unidadmedida,
						CI.cTipoCarga As tipocarga,
						CI.dFechaCaptura As fechacaptura,
						CI.eCantidadCargaIni As cantidadsolicitada,
						CI.eCantidadEntregada As cantidadentregada
						FROM
						sa_cargainiarticulo CI,
						sa_cabms CC ,
						sa_umedida UM
						WHERE
						CI.Id_Unidad = '$_GET[idadmin]'  and
						CI.Id_CveCABMS = CC.Id_CABMS and
						CC.Id_UMedida = UM.Id_UMedida and
						CI.cEstadoCarga = 'A' ORDER BY " . " " . $sortfield . " ASC LIMIT $start, $pagesize";
				}
				$result = $objDataGrid->Query($query);
			}
		}
		else
		{
			$result = $objDataGrid->Query($query);
			$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
			$rows = $objDataGrid->Query($sql);
			$rows = mysql_fetch_assoc($rows);
			$total_rows = $rows['found_rows'];
		}
		$i=0;
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			    
                $Celdas[] = array(
                		'idcabms' => $row[idcabms],
                		'cambs' =>$row[Cabms],
                		'idunidadmedida' =>$row[idunidadmedida],
                		'unidadmedida' =>$row[unidadmedida],
                		'cantidadsolicitada' =>$row[cantidadsolicitada],
                		'cantidadentregada' =>$row[cantidadentregada]
                );
		}
		$data[] = array(
				'TotalRows' => $total_rows,
				'Rows' => $Celdas
		);
		echo json_encode($data);*/
		
							//Grid detalle pedido
							
							$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
							<tbody>";
							$objGridCI = new poolConnection();
							$con=$objGridCI->Conexion();
							$objGridCI->BaseDatos();
							$sql = " SELECT
							CI.eNumFolioCarga as eNumFolioCarga,
							CI.eCantidadCargaIni as eCantidadCargaIni, 
							CI.Id_CveCABMS As idcabms,
							CC.vDescripcionCABMS As Cabms,
							CI.Id_Unidad AS idunidadmedida,
							UM.vDescripcion AS unidadmedida,
							CI.cTipoCarga As tipocarga,
							CI.dFechaCaptura As fechacaptura,
							CI.eCantidadCargaIni As cantidadsolicitada,
							CI.eCantidadEntregada As cantidadentregada
							FROM
							sa_cargainiarticulo CI,
							sa_cabms CC ,
							sa_umedida UM
							WHERE
							CI.Id_Unidad = '$_GET[idadmin]'  and
							CI.Id_CveCABMS = CC.Id_CABMS and
							CC.Id_UMedida = UM.Id_UMedida and
							CI.cEstadoCarga = 'A' ";
							$RSet=$objGridCI->Query($sql);
							while($fila=mysql_fetch_array($RSet))
							{
								$i++;
								$FliexGrid.="
								<tr>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><img src=\"../../interfaz_modulos/botones/eliminar.jpg\" name=\"ImageE$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageE$i\"  onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageE$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer;\" onclick=\"view_eliminar('$fila[idcabms]','$fila[Cabms]',$fila[eNumFolioCarga]);\" /></td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\"><img src=\"../../interfaz_modulos/botones/editar.jpg\" name=\"ImageM$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageM$i\"  onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageM$i','','../../interfaz_modulos/botones/editar_over.jpg',1)\" style=\"cursor:pointer;\" onclick=\"view_editar('$fila[idcabms]','$fila[Cabms]',$fila[eNumFolioCarga],$fila[eCantidadCargaIni]);\" /></td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[idcabms]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Cabms]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[unidadmedida]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cantidadsolicitada]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[cantidadentregada]</td>
								<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">-</td>";
							}
							mysql_free_result($RSet);
							$objGridCI->Cerrar($con);
							$FliexGrid.="       </tbody>
							</table><script>$('.flexme1').flexigrid({
							title: '',
							colModel : [
							{display: 'Eliminar', name : 'Eliminar', width :120, sortable :false, align: 'center'},
							{display: 'Editar', name : 'Editar', width :120, sortable :false, align: 'center'},
							{display: 'Id Cabms', name : 'Codigo', width :100, sortable :false, align: 'center'},
							{display: 'Cabms', name : 'U. Medida', width :300, sortable :false, align: 'center'},
							{display: 'Medida', name : 'Medida', width :300, sortable :false, align: 'center'},
							{display: 'Cantidad Solicitada', name : 'Cantidad Solicitada', width :100, sortable :false, align: 'center'},
							{display: 'Cantidad Entregada', name : 'Cantidad Entregada', width :100, sortable :false, align: 'center'},
							{display: 'Existencias', name : 'Existencias', width :100, sortable :false, align: 'center'}
							],
							buttons : [
							{name: '',onpress:saver_Order},
							{separator: true}
							],
							width: 940,
							height: 250
							}
							
							);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
							echo $FliexGrid;
		break;
		
	case 'Registro':
					
				
					//Primero verificanos si es cambs ya esta instertado
					$Actualizar = "Insertar";
					$objBuscarCambs = new poolConnection();
					$con=$objBuscarCambs->Conexion();
					$objBuscarCambs->BaseDatos();
					$sql = "SELECT Id_CAMBS
            				FROM sa_cargainiarticulo
            				WHERE
					        Id_CAMBS='$_POST[IdCambs]'";
					$RSet=$objBuscarCambs->Query($sql);
					while($fila=mysql_fetch_array($RSet))
					{
						$Actualizar="Actualizar";
					}
					mysql_free_result($RSet);
					$objBuscarCambs->Cerrar($con);
				
					switch($Actualizar)
					{
						case 'Insertar':
												$obj =  new poolConnection();
												$obj->Conexion();
												$obj->BaseDatos();
												$Y=date(Y);
												$M=date(m);
												$D=date(d);
												$Fecha="$Y/$M/$D";
												$sql = "
							                    INSERT INTO sa_cargainiarticulo
									                VALUES ('$_POST[IdUnidadAdmin]', 
									                        '$Y', 
									                        '$_POST[IdCambs]',
									                        '$_POST[TipoDocumento]',
									                        'A',
									                        '$_POST[Cantidad]',
									                        '0',
									                        '$_POST[TipoDocumento]',
									                        '$_POST[FechaRegistro]',
									                        '$Fecha',
									                        '$Fecha',
									                        '$Fecha',
									                        '0')";
												$obj->Query($sql);
												$obj->Cerrar($con);
									
									
							break;

						case 'Actualizar':

							
							break;
					}
				echo $StrConsulta;	
		
		break;
	case 'Borrar':
                 $objBorrar =  new poolConnection();
                 $objBorrar->Conexion();
                 $objBorrar->BaseDatos();
                 $sql="Delete from sa_cargainiarticulo  Where eNumFolioCarga ='$_POST[id]'";
                 $objBorrar->Query($sql);
                 $objBorrar->Cerrar($con);
                 echo $sql;
		break;
	case 'Modificar':
				$objActualizar =  new poolconnection();
				$con=$objActualizar->Conexion();
				$objActualizar->BaseDatos();
				$sql="update sa_cargainiarticulo set eCantidadCargaIni='$_POST[cantidad]' Where eNumFolioCarga ='$_POST[idactulaizar]'";
				$objActualizar->Query($sql);
				$objActualizar->Cerrar($con);
				echo $sql;
		break;
		
}
?>
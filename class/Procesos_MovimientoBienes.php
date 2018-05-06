<?php
class MovimientoBienes extends poolConnection
{
	public function frm_load()
	{
		

             $frm="<form  id='frmAddCabms' name='frmAddConsumible' mathod='post'>
                               <br>
                                <fieldset>
                                        <legend class=\"txt_titulos_bold\">Datos Del Bien</legend>
                                     <table>
                                               <tr>
                                                    <td><div class=\"txt_titulos_bold\">Tipo De Bien:</div></td>
                                                   <td>
                                                       <input type='text' id='txtTipoBien' name='txtTipoBien' class=\"boxes_form200px\"/>    
                                                    </td>
                                                      <td>&nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/buscar.jpg\" name=\"ImageBTB1\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageBTB1\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBTB1','','../../interfaz_modulos/botones/buscar_over.jpg',1);\" style=\"cursor:pointer\" onclick=\"load_inv_frm();\"/></td>
                                              </tr>
                                   </table>
                                   <table>
                                              <tr>
                                                   <td><div class=\"txt_titulos_bold\"></div></td>
                                                   <td><div class=\"txt_titulos_bold\"></div></td>
                                                   <td><div class=\"txt_titulos_bold\"></div></td>
                                                   <td><div class=\"txt_titulos_bold\"></div></td>
                                                </tr>
                                          </table>
                                   <table>
                                         <tr>
                                              <td><div class=\"txt_titulos_bold\">No Serie:</div></td>
                                              <td><input type='text' name='txtNoSerie' id='txtNoSerie' value='' class=\"boxes_form200px\"></td>
                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                              <td><div class=\"txt_titulos_bold\">Marca:</div></td>
                                              <td><input type='text' name='txtMarca' id='txtMarca' value='' class=\"boxes_form200px\"></td>
                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                               <td><div class=\"txt_titulos_bold\">Modelo:</div></td>
                                               <td><input type='text' name='txtModelo' id='txtModelo' value='' class=\"boxes_form200px\"></td>
                                         </tr>
                                  </table>  
                                     <br>
                                  <div id=\"DivTabs\">
                                     <div id=\"tabs\">
                                 
                                            <ul>
                                                    <li><a href=\"#tabs-1\">Datos del Movimiento y Entrega del Bien</a></li>
                                                    <li><a href=\"#tabs-2\">Datos del Resguardo</a></li>
                                            </ul>
                                           
                                    
                                            <div id=\"tabs-1\">
                                                  <div id=\"DivMovimeintos\">
                                                        <fieldset>
                                                                <legend class=\"txt_titulos_bold\">Datos Del Movimiento</legend>
                                                                <table>
                                                                       <tr>
                                                                           <td><div class=\"txt_titulos_bold\">Documento Oficial:</div></td>
                                                                           <td><input type='text' id='txtDocOficial' name='txtDocOficial' class=\"boxes_form100px\"/></td>
                                                                           <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                           <td><div class=\"txt_titulos_bold\">Edo. Del Bien:</div></td>
                                                                           <td>
                                                                                <select data-placeholder=\"Edo. Bien\" style=\"width:260px;\" tabindex=\"1\"  class='chzn-select' name='cboEdoBien' id='cboEdoBien'>
                                                                                     <option></option>

                                                                               </select>
                                                                           </td>
                                                                           <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                           <td><div class=\"txt_titulos_bold\">Fecha Resguardo:</div></td>
                                                                           <td><input type='text' id='txtFecha' name='txtFecha' class='boxes_form100px' /></td>
                                                                           
                                                                       </tr>
                                                                </table>
                                                                <br>
                                                                <table>
                                                                      <tr>
                                                                           <td><div class=\"txt_titulos_bold\">Tipo de Movimiento:</div></td>
                                                                           <td>
                                                                                 <select data-placeholder=\"Movimiento\" style=\"width:360px;\" tabindex=\"1\"  class='chzn-select' name='cboMovimiento' id='cboMovimiento'>
                                                                                     <option></option>

                                                                                  </select>
                                                                            </td>
                                                                      </tr>
                                                                </table>
                                                                
                                                        </fieldset> 
                                                        <br>
                                                        <fieldset>
                                                                <legend class=\"txt_titulos_bold\">Entrega Del Bien</legend>
                                                                <table>
                                                                       <tr>
                                                                           <td><div class=\"txt_titulos_bold\">Resguardante 1:</div></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form100px\"/></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form600px\"/></td>
                                                                       </tr>    
                                                                       <tr>
                                                                           <td><div class=\"txt_titulos_bold\">Resguardante 2:</div></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form100px\"/></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form600px\"/></td>
                                                                       </tr>
                                                                       <tr>
                                                                           <td><div class=\"txt_titulos_bold\">Resguardante 3:</div></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form100px\"/></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form600px\"/></td>
                                                                       </tr>
                                                                </table>
                                                                <table>
                                                                      <tr>
                                                                          <td><div class=\"txt_titulos_bold\">Unidad Administrativa:</div></td>
                                                                          <td><input type='text' id='txt' name='txt' class=\"boxes_form100px\"/></td>
                                                                          <td><input type='text' id='txt' name='txt' class=\"boxes_form400px\"/></td>
                                                                          <td><div class=\"txt_titulos_bold\">Folio:</div></td>
                                                                          <td><input type='text' id='txt' name='txt' class=\"boxes_form100px\"/></td>
                                                                      </tr>
                                                                </table>
                                                        </fieldset>
                                                   </div>      
                                            </div>
                                             <div id=\"tabs-2\">
                                                   <fieldset> 
                                                            <legend class=\"txt_titulos_bold\">Datos Del Resguardo</legend>
                                                            <br>
                                                            <table>
                                                                   <tr>
                                                                        <td><div class=\"txt_titulos_bold\">No. Empleado:</div></td>
                                                                        <td><input type='text' id='txtNoEmpleado1' name='txtNoEmpleado1' class=\"boxes_form100px\"/></td>
                                                                        <td>&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageBEmpleado1\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageBEmpleado1\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBEmpleado1','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_emp_frm(1);\"/></td>
                                                                        <td><input type='text' id='txtDes1' name='txtDes1' class=\"boxes_form400px\"/></td>
                                                                   </tr>
                                                            </table>
                                                           <table>
                                                                   <tr>
                                                                        <td><div class=\"txt_titulos_bold\">No. Empleado:</div></td>
                                                                        <td><input type='text' id='txtNoEmpleado2' name='txtNoEmpleado2' class=\"boxes_form100px\"/></td>
                                                                        <td>&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageBEmpleado2\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageBEmpleado2\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBEmpleado2','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_emp_frm(2);\"/></td>
                                                                        <td><input type='text' id='txtDes2' name='txtDes2' class=\"boxes_form400px\"/></td>
                                                                   </tr>
                                                            </table>
                                                            <table>
                                                                   <tr>
                                                                        <td><div class=\"txt_titulos_bold\">No. Empleado:</div></td>
                                                                        <td><input type='text' id='txtNoEmpleado3' name='txtNoEmpleado3' class=\"boxes_form100px\"/></td>
                                                                        <td>&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageBEmpleado3\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageBEmpleado3\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBEmpleado3','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_emp_frm(3);\"/></td>
                                                                        <td><input type='text' id='txtDes3' name='txtDes3' class=\"boxes_form400px\"/></td>
                                                                   </tr>
                                                            </table>
                                                            <table>
                                                                  <tr>
                                                                       <td><div class=\"txt_titulos_bold\">Clave unidad Admin:</div></td>
                                                                       <td><input type='text' id='txtIdUA' name='txtIdUA' class=\"boxes_form100px\"/></td>
                                                                       <td><img src=\"../../interfaz_modulos/botones/examinar_m.jpg\" name=\"ImageBUAdmin\" width=\"59\" height=\"45\" border=\"0\" id=\"ImageBUAdmin\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageBUAdmin','','../../interfaz_modulos/botones/examinar_m_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"load_ua_frm();\"/></td>
                                                                       <td><input type='text' id='txtUAD' name='txtUAD' class=\"boxes_form500px\"/></td>
                                                                  </tr>
                                                            </table>
                                                    </fieldset> 
                                            </div>
                                     </div> 
                                  </div>        
                                </fieldset> 
                                 <script>
                            $(function() {
                                     $(\"#txtFecha\").datepicker();
                                    $(\"#tabs\").tabs();
                             });
                                  jQuery(document).ready(function()
                                   {
                                       jQuery(\"#frmFactura\").validationEngine();
                                    });
                                function checkHELLO(field, rules, i, options)
                                        {
                                               if (field.val() != \"HELLO\") 
                                                   {
                                                        return options.allrules.validate2fields.alertText;
                                                    }
                                         }
                              $(\".chzn-select\").chosen(); 
                              $(\".chzn-select-deselect\").chosen({allow_single_deselect:true});
                                
                    </script>
                         </form>";
             return $frm;
	}
	public function buscar_inv($AData)
	{
			$Patron=$AData->Patron;
			$Clave=$AData->Clave;
			$Descripcion=$AData->Descripcion;
			
			#Preparamos ware
			if($Clave=="Si")
			{
				$where.="Id_ConsecutivoInv like '%$Patron%' and ";
			}
			
			if($Descripcion=="Si")
			{
			$where.="Id_CABMS like '%$Patron%' and ";
			}
			
			$where = substr($where, 0, -4);
			
			
			$objGrid = new poolConnection();
			$con=$objGrid->Conexion();
			$objGrid->BaseDatos();
			$sql="SELECT DISTINCT(sa_inventario.Id_ConsecutivoInv),
					sa_inventario.Id_TipoBien,
					sa_cabms.Id_CABMS, 
				    sa_cabms.vDescripcionCABMS,
				    sa_tipobieninventariable.vDescripcion,
				    sa_inventario.Id_EdoBien
	             FROM 
                   sa_cabms,sa_inventario,sa_tipobieninventariable
			Where (sa_cabms.Id_CABMS  =  sa_inventario.Id_CABMS) and (sa_inventario.Id_TipoBien=sa_tipobieninventariable.Id_TipoBien) and  $where";
			$RSet=$objGrid->Query($sql);
			$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
			<tbody>";
		    while($fila=mysql_fetch_array($RSet))
			{
			$i++;
			$ArrayMMS=$this->modelo_marca_serie($fila[Id_CABMS],$fila[Id_TipoBien]);
			$FliexGrid.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageA$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageA$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageA$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"selecionar_inv($fila[Id_ConsecutivoInv],'$fila[Id_CABMS]','$fila[vDescripcionCABMS]','$fila[vDescripcion]','$ArrayMMS[modelo]','$ArrayMMS[marca]','$ArrayMMS[serie]','$fila[Id_EdoBien]','');\">&nbsp;</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_ConsecutivoInv]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
			
			</tr>";
			}
			mysql_free_result($RSet);
			$objGrid->Cerrar($con);
					$FliexGrid.="       </tbody>
					</table><script>$('.flexme1').flexigrid({
					title: '',
					colModel : [
			
					{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
					{display: 'Pedido', name : 'Pedido', width :100, sortable :false, align: 'center'},
					{display: 'Requisicion', name : 'Requisicion', width :100, sortable :false, align: 'center'},
			
			],
			buttons : [
			{name: '',onpress:saver_Order},
			{separator: true}
			],
			width: 640,
			height: 250
			}
			
			);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>";
			return $FliexGrid;
	}
	public function buscar_inv_empleado($AData)
	{
		$Patron=$AData->Patron;
		$Clave=$AData->Clave;
		$Nombre=$AData->Nombre;
			
		#Preparamos ware
		if($Clave=="Si")
		{
		$where.="IdEmpleado like '%$Patron%' and ";
		}
			
		if($Nombre=="Si")
		{
		$where.="Nombres like '%$Patron%' and ";
		}
			
		$where = substr($where, 0, -4);
			
			
		$objGrid = new poolConnection();
		$con=$objGrid->Conexion();
		$objGrid->BaseDatos();
		$sql="SELECT IdEmpleado,Nombres
		FROM
		sa_usuarios
		Where   $where";
		$RSet=$objGrid->Query($sql);
		$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
		<tbody>";
		$i=0;
		while($fila=mysql_fetch_array($RSet))
		{
		$i++;
		
		$FliexGrid.="
		<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageEmp$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageEmp$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageEmp$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"selecionar_empleado('$fila[IdEmpleado]','$fila[Nombres]');\">&nbsp;</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[IdEmpleado]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Nombres]</td>
				
			</tr>";
	}
	mysql_free_result($RSet);
	$objGrid->Cerrar($con);
	$FliexGrid.="       </tbody>
	</table><script>$('.flexme1').flexigrid({
	title: '',
	colModel : [
			
		{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
		{display: 'IdEmpleado', name : 'IdEmpleado', width :100, sortable :false, align: 'center'},
		{display: 'Nombre', name : 'Nombre', width :100, sortable :false, align: 'center'},
			
		],
		buttons : [
		{name: '',onpress:saver_Order},
		{separator: true}
		],
		width: 640,
		height: 250
	}
		
	);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>$sql";
	return $FliexGrid;
	}
	public function buscar_inv_ua($AData)
	{
		$Patron=$AData->Patron;
		$Clave=$AData->Clave;
		$Descripcion=$AData->Descripcion;
			
		#Preparamos ware
		if($Clave=="Si")
		{
		$where.="Id_Unidad like '%$Patron%' and ";
		}
			
		if($Descripcion=="Si")
		{
			$where.="vDescripcion like '%$Patron%' and ";
		}
			
		$where = substr($where, 0, -4);
			
			
		$objGrid = new poolConnection();
		$con=$objGrid->Conexion();
		$objGrid->BaseDatos();
		$sql="SELECT Id_Unidad,vDescripcion
		FROM
		sa_unidadadmva
		Where $where ";
		$RSet=$objGrid->Query($sql);
		$FliexGrid = "<hr><form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
		<tbody>";
		$i=0;
		while($fila=mysql_fetch_array($RSet))
		{
		$i++;
	
		$FliexGrid.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;<img src=\"../../interfaz_modulos/botones/aceptar.jpg\"  name=\"ImageUA$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageUA$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageUA$i','','../../interfaz_modulos/botones/aceptar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"seleccionar_ua('$fila[Id_Unidad]','$fila[vDescripcion]');\">&nbsp;</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Unidad]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
	
			</tr>";
		}
		mysql_free_result($RSet);
		$objGrid->Cerrar($con);
		$FliexGrid.="       </tbody>
		</table><script>$('.flexme1').flexigrid({
				title: '',
				colModel : [
					
				{display: 'Selecionar', name : 'Selecionar', width :120, sortable :false, align: 'center'},
				{display: 'Id Unidad', name : 'Id Unidad', width :100, sortable :false, align: 'center'},
				{display: 'Descripcion', name : 'Descripcion', width :100, sortable :false, align: 'center'},
					
				],
				buttons : [
				{name: '',onpress:saver_Order},
				{separator: true}
				],
				width: 640,
				height: 250
	}
	
		);</script><input type=\"hidden\"  name=\"ActGrid\" value=\"Si\"></form>$sql";
				return $FliexGrid;
	}
	function loadCboMovimientos($idEdoBien,$idMovimeinto,$idConsecutivo)
	{
		
		/*datos de la fuente  Fecha de registro*/
		
		$objInvetarioMov = new poolConnection();
		$con = $objInvetarioMov->Conexion();
		$objInvetarioMov->BaseDatos();
		$SqlFecha="Select dFechaRegistro,Id_CABMS,Id_EdoBien from sa_inventario Where Id_ConsecutivoInv ='$idConsecutivo'";
		$RSet=$objInvetarioMov->Query($SqlFecha);
		while($fila = mysql_fetch_array($RSet))
		{
			$FechaRegistro = $fila[dFechaRegistro];
			$CAMBS = $fila[Id_CABMS];
			$Id_Bien=$fila[Id_EdoBien];
		}
		mysql_free_result($RSet);
		$objInvetarioMov->Cerrar($con);
		/*movimeintos de bienes*/
		$objMovimiento =  new poolConnection();
		$con=$objMovimiento->Conexion();
		$objMovimiento->BaseDatos();
		$sqlMov="Select Id,Resguardante1,Resguardante2,Resguardante3,vDoctoOficial,Id_Unidad,eNumFolio,Id_TipoMovimiento  from sa_movinventario
		 Where Id_ConsecutivoInv='$idConsecutivo' and Id_CABMS='$CAMBS' order by Id asc";
		$RSet=$objMovimiento->Query($sqlMov);
		while($fila=mysql_fetch_array($RSet))
		{
			$Resguardante1=$fila[Resguardante1];
			$Resguardante2=$fila[Resguardante2];
			$Resguardante3=$fila[Resguardante3];
			$vDoctoOficial=$fila[vDoctoOficial];
			$Id_Unidad=$fila[Id_Unidad];
			$eNumFolio=$fila[eNumFolio];
			$Id_TipoMovimiento=$fila[Id_TipoMovimiento];
		}
		mysql_free_result($RSet);
		$objMovimiento->Cerrar($con);
		
		$UA=$this->uaDes($Id_Unidad);
		$R1=$this->Resguardatente($Resguardante1);
		$R2=$this->Resguardatente($Resguardante2);
		$R3=$this->Resguardatente($Resguardante3);
		/*Cbo EstadoBien */
		$objCboEdoBien =  new poolConnection();
		$con=$objCboEdoBien->Conexion();
		$objCboEdoBien->BaseDatos();
		$sql="Select Id_EdoBien,vDescripcion from sa_estadobien order by vDescripcion";
		$RSet = $objCboEdoBien->Query($sql);
		while($fila = mysql_fetch_array($RSet))
		{
			if($idEdoBien==$fila[Id_EdoBien])
			{
				 $CboEdoBien .= "<option value='$fila[Id_EdoBien]' selected>$fila[vDescripcion]</option>";
				 $edoAnterios=$fila[Id_EdoBien];
			}
			else
			{
				 $CboEdoBien .= "<option value='$fila[Id_EdoBien]'>$fila[vDescripcion]</option>";
			}
		}
		mysql_free_result($RSet);
		$objCboEdoBien->Cerrar($con);
		
		
		/*Cbo Movimientos */
		$objCboMovimeintos =  new poolConnection();
		$con=$objCboMovimeintos->Conexion();
		$objCboMovimeintos->BaseDatos();
		$sql="Select Id_TipoMovimiento,vDescripcion from sa_tipomovimiento order by vDescripcion";
		$RSet = $objCboMovimeintos->Query($sql);
		while($fila = mysql_fetch_array($RSet))
		{
			if($Id_TipoMovimiento==$fila[Id_TipoMovimiento])
			{
				$CboMovimiento.= "<option value='$fila[Id_TipoMovimiento]' selected>$fila[Id_TipoMovimiento]---$fila[vDescripcion]</option>";
			}
		   else
		   {
		   	 $CboMovimiento.= "<option value='$fila[Id_TipoMovimiento]'>$fila[Id_TipoMovimiento]---$fila[vDescripcion]</option>";
		   }	
			
		}
		mysql_free_result($RSet);
		$objCboMovimeintos->Cerrar($con);
		
		$frmmovimeintos = "
						<fieldset>
										<legend class=\"txt_titulos_bold\">Datos Del Movimiento</legend>
                                                                <table>
                                                                       <tr>
                                                                           <td><div class=\"txt_titulos_bold\">Documento Oficial:</div></td>
                                                                           <td><input type='text' id='txtDocOficial' name='txtDocOficial' value='$vDoctoOficial' class=\"boxes_form100px\"/></td>
                                                                           <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                           <td><div class=\"txt_titulos_bold\">Edo. Del Bien:</div></td>
                                                                           <td>
                                                                                <select data-placeholder=\"Edo. Bien\" style=\"width:260px;\" tabindex=\"1\"  class='chzn-select' name='cboEdoBien' id='cboEdoBien'>
                                                                                     <option></option>
																					 $CboEdoBien
                                                                               </select>
                                                                           </td>
                                                                           <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                           <td><div class=\"txt_titulos_bold\">Fecha Resguardo:</div></td>
                                                                           <td><input type='text' id='txtFecha' name='txtFecha' value='$FechaRegistro' class=\"boxes_form100px\"/></td>
                                                                           
                                                                       </tr>
                                                                </table>
                                                                <br>
                                                                <table>
                                                                      <tr>
                                                                           <td><div class=\"txt_titulos_bold\">Tipo de Movimiento:</div></td>
                                                                           <td>
                                                                                 <select data-placeholder=\"Movimiento\" style=\"width:360px;\" tabindex=\"1\"  class='chzn-select' name='cboMovimiento' id='cboMovimiento'>
                                                                                     <option></option>
																				     $CboMovimiento
                                                                                  </select>
                                                                            </td>
                                                                      </tr>
                                                                </table>
                                                                
                                                        </fieldset> 
                                                        <br>
                                                        <fieldset>
                                                                <legend class=\"txt_titulos_bold\">Entrega Del Bien</legend>
                                                                <table>
                                                                       <tr>
                                                                           <td><div class=\"txt_titulos_bold\">Resguardante 1:</div></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form100px\" value='$Resguardante1' readonly/></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form600px\" value=\"$R1\" readonly/></td>
                                                                       </tr>    
                                                                       <tr>
                                                                           <td><div class=\"txt_titulos_bold\">Resguardante 2:</div></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form100px\" value='$Resguardante2' readonly/></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form600px\" value=\"$R2\" readonly/></td>
                                                                       </tr>
                                                                       <tr>
                                                                           <td><div class=\"txt_titulos_bold\">Resguardante 3:</div></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form100px\" value='$Resguardante3' readonly/></td>
                                                                           <td><input type='text' id='txt' name='txt' class=\"boxes_form600px\" value=\"$R3\" readonly/></td>
                                                                       </tr>
                                                                </table>
                                                                <table>
                                                                      <tr>
                                                                          <td><div class=\"txt_titulos_bold\">Unidad Administrativa:</div></td>
                                                                          <td><input type='text' id='txtIdUaR' name='txtIdUaR' value='$Id_Unidad' readonly class=\"boxes_form100px\"/></td>
                                                                          <td><input type='text' id='txtUaDesR' name='txtUaDesR' value='$UA' readonly class=\"boxes_form400px\"/></td>
                                                                          <td><div class=\"txt_titulos_bold\">Folio:</div></td>
                                                                          <td><input type='text' id='txtFolio' name='txtFolio' class=\"boxes_form100px\" value='$eNumFolio'/></td>
                                                                      </tr>
                                                                </table>
                                                        </fieldset>
														 <script>
														      $(function() {
                                    										 $(\"#txtFecha\").datepicker();
                            											 });
								                              $(\".chzn-select\").chosen(); 
								                              $(\".chzn-select-deselect\").chosen({allow_single_deselect:true});
								                              $(\"#txtNoEmpleado1\").val('$Resguardante1');
								                              $(\"#txtNoEmpleado2\").val('$Resguardante2');
								                              $(\"#txtNoEmpleado3\").val('$Resguardante3');
								                              $(\"#txtEdoMovientoActual\").val('$Id_Bien');
								                              $(\"#txtDes1\").val('$R1');
								                              $(\"#txtDes2\").val('$R2');
								                              $(\"#txtDes3\").val('$R3');
								                               
                    									</script>";
		        echo $frmmovimeintos;
	}
	function modelo_marca_serie($IdCambs,$tipoBien)
	{
		
		switch ($tipoBien)
		{
			case '1':
				$sql="select vNumSerie,vMarca,vModelo from sa_mueble Where Id_CABMS='$IdCambs'";
				break;
		
			case '2':
				$sql="select vNumSerie,vMarca,vModelo from sa_informatico Where Id_CABMS='$IdCambs'";
				break;
		         
			case '3':
				$sql="select vNumSerie,vMarca,vModelo from sa_vehiculo Where Id_CABMS='$IdCambs'";
				break;
			case '4':
				$sql="select vNumSerie,vMarca,vModelo from sa_acervo Where Id_CABMS='$IdCambs'";
				break;
					
		}
		$objModelo =  new poolConnection();
		$objModelo->Conexion();
		$objModelo->BaseDatos();
		$RSetMMS=$objModelo->Query($sql);
		while($fila = mysql_fetch_array($RSetMMS))
		{
			$ArrayDatos[modelo]=$fila[vModelo];
			$ArrayDatos[marca]=$fila[vMarca];
			$ArrayDatos[serie]=$fila[vNumSerie];
		}
		
		return $ArrayDatos;
	}
	public function uaDes($id)
	{
		$objuaDes =  new poolconnection();
		$con=$objuaDes->Conexion();
		$objuaDes->BaseDatos();
		$Sql="Select vDescripcion From  sa_unidadadmva Where Id_Unidad='$id'";
		$Rset=$objuaDes->Query($Sql);
		while($fila=mysql_fetch_array($Rset))
		{
			$vDescripcion = $fila[vDescripcion];
		}
		mysql_free_result($Rset);
		$objuaDes->Cerrar($con);
		return $vDescripcion;
	}
	public function Resguardatente($id)
	{
		$objRes =  new poolconnection();
		$con=$objRes->Conexion();
		$objRes->BaseDatos();
		$Sql="Select Nombres From sa_usuarios Where IdEmpleado='$id'";
		$Rset=$objRes->Query($Sql);
		while($fila=mysql_fetch_array($Rset))
		{
			$Nombres = $fila[Nombres];
		}
		mysql_free_result($Rset);
		$objRes->Cerrar($con);
		return $Nombres;
	}
	public function guardar_mov($info)
	{
		$Id_CABMS=$info->Id_CABMS;
		$Id_ConsecutivoInv=$info->Id_ConsecutivoInv;
		$Resguardante1=$info->Resguardante1;
		$Resguardante2=$info->Resguardante2;
		$Resguardante3=$info->Resguardante3;
		$Id_TipoMovimiento=$info->Id_TipoMovimiento;
		$Id_Unidad=$info->Id_Unidad;
		$eNumFolio=$info-eNumFolio;
		$dFechaResguardo=$info->dFechaResguardo;
		$dFechaMovRegistro=$info->dFechaMovRegistro;
		$vDoctoOficial=$info->vDoctoOficial;
		$Id_EdoBien=$info->Id_EdoBien;
		/*actualizamo registro de sa_inventario */
	    $sqlmovimientosuodate = "update sa_inventario set dFechaModRegistro='$dFechaMovRegistro',Id_EdoBien='$Id_EdoBien' where Id_ConsecutivoInv='$Id_ConsecutivoInv'";
	    
	    $objUpdateInvetario = new poolConnection();
	    $con=$objUpdateInvetario->Conexion();
	    $objUpdateInvetario->BaseDatos();
	    $objUpdateInvetario->Query($sqlmovimientosuodate);
	    $objUpdateInvetario->Cerrar($con);
	    
	    
		
		$sqlmovimientos="INSERT INTO sa_movinventario values(
		'0',
		'$Id_CABMS',
		'$Id_ConsecutivoInv',
		'$Resguardante1',
		'$Id_TipoMovimiento',
		'$Id_Unidad',
		'$Resguardante2',
		'$Resguardante3',
		'$eNumFolio',
		'$dFechaResguardo',
		'$dFechaMovRegistro',
		'$vDoctoOficial',
		'$Id_EdoBien')";
		
		$objMovimiento = new poolConnection();
		$con=$objMovimiento->Conexion();
		$objMovimiento->BaseDatos();
		$objMovimiento->Query($sqlmovimientos);
		$objMovimiento->Cerrar($con);
		return $sqlmovimientosuodate;
	}
	public function historial_movimientos($Id_ConsecutivoInv)
	{
		$objGridHistorial = new poolConnection();
		$con=$objGridHistorial->Conexion();
		$objGridHistorial->BaseDatos();
		$sql="SELECT 
			sa_movinventario.dFechaMovRegistro,
			sa_movinventario.Id_CABMS,
			sa_movinventario.Resguardante1,
			sa_usuarios.Nombres,
			sa_movinventario.Id_Unidad,
			sa_unidadadmva.vDescripcion
			FROM
			sa_movinventario,
			sa_usuarios,
			sa_unidadadmva
			Where
			sa_movinventario.Id_ConsecutivoInv='$Id_ConsecutivoInv' and
			sa_movinventario.Resguardante1=sa_usuarios.IdEmpleado  and
            sa_movinventario.Id_Unidad=sa_unidadadmva.Id_Unidad";
		$RSet=$objGridHistorial->Query($sql);
		$FliexGrid = "<hr><table class=\"flexme1\">
		<tbody>";
		$i=0;
		while($fila=mysql_fetch_array($RSet))
		{
			$i++;
		
			$FliexGrid.="
			<tr>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[dFechaMovRegistro]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_CABMS]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Resguardante1]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Nombres]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[Id_Unidad]</td>
			<td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">$fila[vDescripcion]</td>
		
			</tr>";
		}
		mysql_free_result($RSet);
		$objGridHistorial->Cerrar($con);
		$FliexGrid.="       </tbody>
		</table><script>$('.flexme1').flexigrid({
		title: '',
		colModel : [
			
		{display: 'Fecha Movimiento', name : 'Fecha Movimeiento', width :120, sortable :false, align: 'center'},
		{display: 'Movimiento', name : 'Cambs', width :100, sortable :false, align: 'center'},
		{display: 'Resguardo', name : 'Resguardante', width :100, sortable :false, align: 'center'},
		{display: 'Nombre', name : 'Nombre.', width :200, sortable :false, align: 'center'},	
		{display: 'Unidad Admin.', name : 'Unidad Admin.', width :100, sortable :false, align: 'center'},
		{display: 'Descripcion', name : 'Descripcion', width :300, sortable :false, align: 'center'}
		],
		buttons : [
		{name: '',onpress:saver_Order},
		{separator: true}
		],
		width: 930,
		height: 250
		}
		
		);</script>
		<br>
		<br>
		<a href=\"pdf_historicomovimientos.php?id=$Id_ConsecutivoInv\" target=\"_blank\"><img src=\"../../interfaz_modulos/botones/historico.jpg\" name=\"ImageR\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageR\"  onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageR','','../../interfaz_modulos/botones/historico_over.jpg',1)\" style=\"cursor:pointer\"/></a>";
		return $FliexGrid;
	}
}

?>
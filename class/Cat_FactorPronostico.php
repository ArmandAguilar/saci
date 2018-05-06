<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cat_FactorPronostico
 *
 * @author armand
 */
class Cat_FactorPronostico {
    
    
 public function frm_add_fp()
    {
    
                $FliexGrid = "<form action='' name='frmOrderGrid' method='post'><table class=\"flexme1\">
                                                    <tbody>";

                          $objBuscar = new poolConnection();
                          $con=$objBuscar->Conexion();
                          $objBuscar->BaseDatos();
                          $sql="Select * from sa_factorpronostico";
                          $RSet=$objBuscar->Query($sql);
                          while($fila=  mysql_fetch_array($RSet))
                          {
                              $i++;
                              $FliexGrid.="
                                                <tr>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">
                                                        <span id='lblannio$i' style=\"cursor:pointer;\" ondblclick=\"\$('#lblannio$i').hide();\$('#Anio$i').show();\">$fila[eAnio]</span><input style=\"display:none\" class=\"boxes_form50px validate[required]\" type=\"text\" id=\"Anio$i\" name=\"Anio[$i]\" value=\"$fila[eAnio]\"><input type=\"hidden\" name=\"txtid[$i]\" value=\"$fila[Id]\">
                                                    </td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">
                                                             <span id='lblmes$i' style=\"cursor:pointer;\" ondblclick=\"\$('#lblmes$i').hide();\$('#Mes$i').show();\">$fila[eMes]</span>
                                                                 
                                                                  <select style=\"display:none\" id=\"Mes$i\" name=\"Mes[$i]\" class=\"validate[required]\">
                                                                        <option value='$fila[eMes]'>$fila[eMes]</option>
                                                                        <option value='Enero'>Enero</option>
                                                                        <option value='Febrero'>Febrero</option>
                                                                        <option value='Marzo'>Marzo</option>
                                                                        <option value='Abril'>Abril</option>
                                                                        <option value='Mayo'>Mayo</option>
                                                                        <option value='Junio'>Junio</option>
                                                                        <option value='Julio'>Julio</option>
                                                                        <option value='Agosto'>Agosto</option>
                                                                        <option value='Septiembre'>Septiembre</option>
                                                                        <option value='Octubre'>Octubre</option>
                                                                        <option value='Noviembre'>Noviembre</option>
                                                                        <option value='Diciembre'>Diciembre</option>
                                                               </select>   
                                                    </td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">
                                                              <span id='lblfactor$i' style=\"cursor:pointer;\" ondblclick=\"\$('#lblfactor$i').hide();\$('#Factor$i').show();\">$fila[eFactor]</span><input style=\"display:none\" class=\"boxes_form50px validate[required]\" type=\"text\" id=\"Factor$i\" name=\"Factor[$i]\" value=\"$fila[eFactor]\">
                                                    </td>
                                                    <td style=\"font-family: Arial, Helvetica, sans-serif;font-size: 11px;\">&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/eliminar.jpg\"  name=\"ImageG$i\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG$i\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG$i','','../../interfaz_modulos/botones/eliminar_over.jpg',1)\" style=\"cursor:pointer\" onclick=\"borrar_factor($fila[Id]);\">&nbsp;&nbsp;</td>    
                                                    
                                                </tr>
                                            ";
                          }
                          mysql_free_result($RSet);
                          $objBuscar->Cerrar($con);
                          $FliexGrid.="       </tbody>
                                                                        </table><script>$('.flexme1').flexigrid({
                                            title: '',
                                            colModel : [
                                                            {display: 'A&ntilde;o', name : 'A&ntilde;o', width :100, sortable :false, align: 'center'},
                                                            {display: 'Mes', name : 'Mes', width :120, sortable :false, align: 'center'},
                                                            {display: 'Factor', name : 'Factor', width :110, sortable :false, align: 'center'},
                                                            {display: 'Accion', name : 'Accion', width :130, sortable :false, align: 'center'},

                                                        ],
                                            buttons : [
                                                            {name: 'Actualizar',onpress:saver_Order},
                                                            {separator: true}
                                                        ],
                                            width: 510,
                                            height: 200
                                            }

                                            );</script><input type=\"hidden\"  name=\"ActGridFactor\" value=\"Si\"></form>";
        
        $frm="<form  id='frmAddfp' name='frmAddfp' mathod='post'><br>
            <fieldset>
                <legend class=\"txt_titulos_bold\">Datos</legend>
                <table>
                        <tr >
                            <td><div class=\"txt_titulos_bold\" >A&ntilde;o</div></td>
                            <td>
                                <select name='cboAnio' id='cboAnio' class=\"validate[required]\">
                                         <option value=''></option>
                                         <option value='2012'>2012</option>
                                         <option value='2013'>2013</option>
                                         <option value='2014'>2014</option>
                                         <option value='2015'>2015</option>
                                         <option value='2016'>2016</option>
                                         <option value='2017'>2017</option>
                                         <option value='2018'>2018</option>
                                         <option value='2019'>2019</option>
                                         <option value='2020'>2020</option>
                                         <option value='2021'>2021</option>
                                         <option value='2022'>2022</option>
                                         
                                </select>
                            </td>
                            <td><div class=\"txt_titulos_bold\" >Mes:</div></td>
                            <td>
                                <select name='cboMes' id='cboMes' class=\"validate[required]\">
                                         <option value=''></option>
                                         <option value='Enero'>Enero</option>
                                         <option value='Febrero'>Febrero</option>
                                         <option value='Marzo'>Marzo</option>
                                         <option value='Abril'>Abril</option>
                                         <option value='Mayo'>Mayo</option>
                                         <option value='Junio'>Junio</option>
                                         <option value='Julio'>Julio</option>
                                         <option value='Agosto'>Agosto</option>
                                         <option value='Septiembre'>Septiembre</option>
                                         <option value='Octubre'>Octubre</option>
                                         <option value='Noviembre'>Noviembre</option>
                                         <option value='Diciembre'>Diciembre</option>
                                </select>
                            </td>
                            <td><div class=\"txt_titulos_bold\" >Factor:</div></td>
                            <td>
                                <input type=\"text\" name=\"txtFactor\" id=\"txtFactor\" value=\"0.0\" class=\"boxes_form50px validate[required,minSize[1]]\"/>
                            </td>
                            <td>
                                &nbsp;&nbsp;&nbsp;<img src=\"../../interfaz_modulos/botones/guardar.jpg\"  name=\"ImageG\" width=\"120\" height=\"45\" border=\"0\" id=\"ImageG\" onmouseout=\"MM_swapImgRestore()\" onmouseover=\"MM_swapImage('ImageG','','../../interfaz_modulos/botones/guardar_over.jpg',1)\" onclick=\"add_fp();\" style=\"cursor:pointer\"/>
                            </td>
                        </tr>
                     </table>
             </fieldset>
              </form>
              <center>
              $FliexGrid
              </center>";
        return $frm;
    }
 public function nuevo_ua($AData)
    {
        $cboAnio=$AData->cboAnio;
        $cboMes=$AData->cboMes;
        $txtFactor=$AData->txtFactor;
        $ObjAdd = new poolConnection();
        $con=$ObjAdd->Conexion();
        $ObjAdd->BaseDatos();
        $sql="insert into sa_factorpronostico values('0','$cboAnio','$cboMes','$txtFactor')";
        $ObjAdd->Query($sql);
        $ObjAdd->Cerrar($con);
    }  
public function borrar_ua($id)
 {
     $objBorrar = new poolConnection();
     $con=$objBorrar->Conexion();
     $objBorrar->BaseDatos();
     $sql="Delete from sa_factorpronostico Where Id='$id'";
     $objBorrar->Query($sql);
     $objBorrar->Cerrar($con);
     
 }  
    
}

?>

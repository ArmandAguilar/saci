<?php
################################################################################
##Autor: Armando Aguilar Lopez                                                ##
##                                                                            ##
##                                                                            ##
################################################################################
##Script : Conexion                                                           ##
##                                                                            ##
##                                                                            ##
################################################################################



class poolConnection
{
      function Conexion()
        {
             #$con =mysql_connect("localhost","root","root");
             $con = mysqli_connect ("localhost","root","root");

              return $con;

        }
    function BaseDatos($con)
            {
                    $Base = mysqli_select_db($con,"saci");
                    $con->query("SET NAMES 'utf8'");
                   return $Base;
            }
   function Query($con,$SQL)
          {
                $result = mysqli_query($con,$SQL);
                mysqli_data_seek ($result, 0);
                return $result;
          }
  function Cerrar($con,$result)
    {
      mysqli_free_result($result);
      mysqli_close($con);

    }
}

?>

<?php
include("../sis.php");
include("$path/class/qrcode/qrlib.php");
QRCode::png('http://www.google.com.mx');
$imageString = base64_encode( ob_get_contents() );



?>

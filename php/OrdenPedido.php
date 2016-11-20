<?php
require_once('../tcpdf/tcpdf.php');
require_once("../clases/class.DataManager.php");
require("../clases/class.EnLetras.php");
$conn = DataManager::getConexion();
//session_start();
$id_pedido= $_GET['id_pedido'];//$_SESSION['idVenta'];
//unset($_SESSION["idVenta"]); 
//session_destroy();
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
//
// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------

$tbl =<<<EOD
<table cellspacing="0" cellpadding="1" style="width:80%;">
    <tr>
        <td align="right"><img src="../img/logo-seliemor.jpg"></td>
        <td align="center"><font size="11">Pedido de Productos</font><br /></td>        
    </tr>
</table><br><br><br><br>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$Importe = 0;
$consulta = "select Importe from vw_detalle_venta where id_venta='$id_pedido'";
$result = $conn->query($consulta);
while ($row = $result->fetch_array()) 
{
   $Importe = $Importe + $row['Importe']; 
}
// ----------------------------------------------------------------------------- 
$consulta = "SELECT id_pedido, fecha, Proveedor, tel, dir from vw_datos_proveedor
where id_pedido='$id_pedido'";
$result = $conn->query($consulta);
$row = $result->fetch_array();
$tbl ='<table cellspacing="0" cellpadding="1" border="0" style="width:100%;font-size:10px;">
          <tr>
                <td align="left">
                EMPRESA: '.utf8_encode($row['Proveedor']).'<br />
                 DIRECCION: <B>'.$row['dir'].'</B> <br />
                 TEL: '.$row['tel'].'<br />
                CLAVE PEDIDO: '.$row['id_pedido'].'<br />
                 FECHA: '.$row['fecha'].'
        
                </td>
          </tr>
        </table>
        <BR />
        <BR />
        <br />
        <p style="font-size:12px;">Estimados Señores:<br />
        Agradecemos tomen nota del pedido que le adjuntamos para su envio a nuestros almacenes</p>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")
$consulta = "SELECT id_pedido, fecha, Proveedor, id_producto, producto, cantidad
from vw_detalle_pedido
where id_pedido='$id_pedido'";
$result = $conn->query($consulta);
$tbl ='<p></p><center>
<table border="1" cellpadding="1" cellspacing="0" style="width:100%;font-size:10px;">
<thead>
 <tr style="background-color:#698C00;color:#FFFFFF;">
  <td align="center" width="20%"><b>Clave Producto</b></td>
  <td align="center" width="60%"><b>Producto</b></td>
  <td align="center" width="15%"><b>Cantidad</b></td>
 </tr> 
</thead>';
while($row = $result->fetch_array())
{
$tbl.='<tr>
  <td align="center" height="20" width="20%">'.$row['id_producto'].'</td>
  <td width="60%" align="center">'.utf8_encode($row['producto']).'</td>
  <td width="15%" align="center">'.$row['cantidad'].'</td>
</tr>';
}
$tbl.='</table>

<br /><br />
<p align="center" style="font-size:12px;">
 En caso de no contar con alguna referencia, les rogamos nos lo comuniquen para contemplar la posibilidad de sustituirla por otra similar, antes del envio del pedido.
 <br />
 <br />
 Sin otro particular por el momento, atentamente les saluda.
 <br /><br />
___________________
<br />
Ing.Oliver Romero Trujillo<br />
Direcctor Seliemor
</p>
 </center>';

 $pdf->writeHTML($tbl, true, false, false, false, '');

//MARCA DE AGUA
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$ImageW = 80; //WaterMark Size
$ImageH = 70;
$myPageWidth = $pdf->getPageWidth();
    $myPageHeight = $pdf->getPageHeight();
    $myX = ( $myPageWidth / 2 ) - 40;  //WaterMark Positioning
    $myY = ( $myPageHeight / 2 ) - 50;

    $pdf->SetAlpha(0.13);
    $pdf->Image('../img/logo-seliemor.jpg', $myX, $myY, $ImageW, $ImageH, '', '', '', true, 150);


//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
<?php
require_once('../tcpdf/tcpdf.php');
require_once("../clases/class.DataManager.php");
require_once("../clases/class.EnLetras.php");
$id_venta = $_GET['id_venta'];
$conn = DataManager::getConexion();
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
        <td align="center"><font size="11">Seliemor  S. de R.L. de C.V. </font><br /><font size="10">R.F.C. EC-690421-8H1</font><br />Calle 25 sur 2539, Col.Centro, 72290 Puebla<br />Tel. 01 222 232 9643</td>        
    </tr>
</table><br><br><br><br>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// ----------------------------------------------------------------------------- 
$consulta = "select id_factura, fecha_expedicion, hora_expedicion, id_usuario, Nombre, Apellidos,direccion,rfc,cp,tel, forma_pago, lugar_expedicion, id_venta
from vw_datos_factura
where id_venta='$id_venta'";
$result = $conn->query($consulta);
$row = $result->fetch_array();
$tbl ='
    <table>
        <tr>
            <td width="45%">
                <table cellspacing="0" cellpadding="1" border="1" style="width:100%;">
                     <tr style="background-color:#698C00;color:#FFFFFF;">
                          <td align="center"><b>CLIENTE</b></td>
                     </tr>
                     <tr>
                            <td align="left">'. utf8_encode('Nombre y Apellidos: '.$row['Nombre'].' '.$row['Apellidos'].'<br />Dirección: '.$row['direccion'].', CP: '.$row['cp'].'<br />RFC: '.$row['rfc']).'</td>
                     </tr>
                </table>   
            </td>
            <td width="10%">
            </td>
            <td width="45%">
                <table cellspacing="0" cellpadding="2" border="1" style="width:100%;">                     
                     <tr>
                            <td align="left">Fecha y hora de Expedicion: '.$row['fecha_expedicion'].'<br />Folio: '.$row['id_venta'].'<br /> Lugar de Expedicion: '.$row['lugar_expedicion'].'<br />Forma de pago: '.$row['forma_pago'].'</td>
                     </tr>
                </table>
            </td>
        </tr>
    </table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// Table with rowspans and THEAD
$tbl ='<p></p>
<table border="1" cellpadding="1" cellspacing="0">
<thead>
 <tr style="background-color:#698C00;color:#FFFFFF;">
  <td align="center" width="10%"><b>Cve Producto</b></td>
  <td align="center" width="50%"><b>Descripcion</b></td>
  <td align="center" width="10%"><b>Cantidad</b></td>
  <td align="center" width="15%"><b>Precio Unitario</b></td>
  <td align="center" width="15%"><b>Importe</b></td>
 </tr> 
</thead>';
$consulta = "select id_venta, fecha, cliente, producto, descripcion, cant, precio, Importe,id_producto
from vw_detalle_venta
where id_venta='$id_venta'";
$result = $conn->query($consulta);
$subtotal = 0;
while ($row = $result->fetch_array()) 
{
  $tbl.='<tr>
  <td align="center" height="20" width="10%">'.$row['id_producto'].'</td>
  <td width="50%">'.utf8_encode($row['producto'].' '.$row['descripcion']).'</td>
  <td width="10%" align="center">'.$row['cant'].'</td>
  <td width="15%" align="center">'.$row['precio'].'</td>
  <td align="center" width="15%">'.$row['Importe'].'</td>
 </tr>';
 $subtotal = $subtotal + $row['Importe'];
}
$tbl.='</table>';
$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

$tbl ='
<table cellpadding="2" cellspacing="2" align="center">
 <tr nobr="true">
     <td align="right"><b>SUBTOTAL: $'.number_format($subtotal,2).'</b></td>
 </tr>
 <tr nobr="true">
     <td align="right"><b>IVA 16%: $'.number_format($subtotal*0.16,2).'</b></td>
 </tr>
 <tr nobr="true">
      <td align="right"><b>TOTAL: $'.number_format($subtotal*1.16,2).'&nbsp;&nbsp;  '.$V->ValorEnLetras(($subtotal*1.16),"Pesos").'</b></td>
 </tr>
</table><p></p><p></p>
<table cellspacing="0" cellpadding="1">
    <tr>        
        <td align="Justify"><font size="10">'. utf8_encode('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Esta Factura se asimila en todos sus efectos legales a una letra de cambio según Art. 772-773 y 774 del código de comercio. El comprador mediante su firma ha autorizado el recibo de la mercancía por un tercero y libera al vendedor del reconocimiento de la firma. Depués de la fecha de vencimiento'
                . 'la presente factura causara intereses de mora mensuales a la tasa máxima legal autorizada por la superbancaria. No aceptamos devoluciones o reclamos después de tres días de recibida la mercancía y/o los servicios. La mercancía y/o los servicios fueron recibidos real y materialmente por el comprador.').'</font></td>
    </tr>    
</table><br><br>';

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

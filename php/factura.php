<?php
require_once('../tcpdf/tcpdf.php');
require_once("../clases/class.DataManager.php");
require("../clases/class.EnLetras.php");
$conn = DataManager::getConexion();
//session_start();
$idventa= $_GET['id_venta'];//$_SESSION['idVenta'];
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
        <td align="center"><font size="11">Orden de Cobro en Ventanilla Bancaria</font><br /></td>        
    </tr>
</table><br><br><br><br>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$Importe = 0;
$consulta = "select Importe from vw_detalle_venta where id_venta='$idventa'";
$result = $conn->query($consulta);
while ($row = $result->fetch_array()) 
{
   $Importe = $Importe + $row['Importe']; 
}
// ----------------------------------------------------------------------------- 
$consulta = "select id_venta, fecha, Nombre, Apellidos, rfc, cp
from vw_datos_orden
where id_venta='$idventa'";
$result = $conn->query($consulta);
$row = $result->fetch_array();
$tbl ='<table cellspacing="0" cellpadding="1" border="1" style="width:100%;">
          <tr style="background-color:#698C00;color:#FFFFFF;">
              <td align="center"><b>CLIENTE</b></td>
          </tr>
          <tr>
                <td align="left">
                NOMBRE Y APELLIDOS: '.utf8_encode($row['Nombre'].' '.$row['Apellidos']).'<br />
                 CLAVE VENTA: '.$row['id_venta'].'<br />
                 No de Referencia: <B>1340021650309856213</B> <br />
                 VIGENCIA DE REFERENCIA: 30/06/2014<br />
                 No DE MOVIMIENTOS: 1 <br /> Importe: $'.number_format($Importe,2).' 
                 <br />Fecha emision: '.date('Y/m/d').'
                </td>
          </tr>
        </table>
        <BR />
        <BR />
        <br />
        <B>ESTIMADO CONTRIBUYENTE:</B> PUEDE REALIZAR SU PAGO EN LAS SIGUIENTES INSTITUCIONES
        , EL CUAL GENERARA UN COSTO POR COMICION, QUE LE DA A CONOCER EN LAS COLUMNAS 
        DE COMICION';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

$tbl ='<p></p>
<table border="1" cellpadding="1" cellspacing="0">
<thead>
 <tr style="background-color:#698C00;color:#FFFFFF;">
  <td align="center" width="20%"><b>INSTITUCION</b></td>
  <td align="center" width="20%"><b>Convenio</b></td>
  <td align="center" width="15%"><b>Cajeros Automaticos</b></td>
  <td align="center" width="15%"> <b>ventanilla</b></td>
  <td align="center" width="30%"><b>Cargo a cuenta de cheques</b></td>
 </tr> 
</thead>
<tr>
  <td align="center" height="20" width="20%">AFIRME</td>
  <td width="20%" align="center">144115503</td>
  <td width="15%" align="center">No aplica</td>
  <td width="15%" align="center">Sin costo</td>
  <td align="center" width="30%">No participa</td>
</tr>
<tr>
  <td align="center" height="20" width="20%">HSBC</td>
  <td width="20%" align="center">7271</td>
  <td width="15%" align="center">Sin costo</td>
  <td width="15%" align="center">4.00 + IVA</td>
  <td align="center" width="30%">Sin costo temporalmente</td>
</tr>
<tr>
  <td align="center" height="20" width="20%">BAJIO</td>
  <td width="20%" align="center">IMPTOS. PUE</td>
  <td width="15%" align="center">No aplica</td>
  <td width="15%" align="center">4.00 + IVA</td>
  <td align="center" width="30%">4.00 + IVA</td>
</tr>
<tr>
  <td align="center" height="20" width="20%">BBVA - BANCOMER</td>
  <td width="20%" align="center">671517</td>
  <td width="15%" align="center">NO APLICA</td>
  <td width="15%" align="center">4.00 + IVA</td>
  <td align="center" width="30%">4.00 + IVA</td>
</tr>
<tr>
  <td align="center" height="20" width="20%">SCOTIABANK</td>
  <td width="20%" align="center">1089</td>
  <td width="15%" align="center">NO APLICA</td>
  <td width="15%" align="center">4.00 + IVA</td>
  <td align="center" width="30%">NO PARTICIPA</td>
</tr>
<tr>
  <td align="center" height="20" width="20%">SANTANDER</td>
  <td width="20%" align="center">4586</td>
  <td width="15%" align="center">NO APLICA</td>
  <td width="15%" align="center">4.00 + IVA</td>
  <td align="center" width="30%">SIN COSTO TEMPORA</td>
</tr>
</table>
<br /><br />
 EL NUMERO DE REFERENCIA, EL NUMERO DE CONVENIO Y EL IMPORTE SON INDISPENSABLES
        PARA REALIZAR SU PAGO EN LA INSTITUCION BANCARIA DE SU PREFERENCIA.
        <BR /><BR />
        <center><B>EVITE REALIZAR EL PAGO DE ESTA ORDEN DE COBRO EN INSTITUCIONES QUE NO SE CITEN 
        EN ESTE DOCUMENTO</B></center>';

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
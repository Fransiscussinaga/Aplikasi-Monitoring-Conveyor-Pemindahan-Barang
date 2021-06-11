<?php
ob_start();
ini_set("display_errors", 1);
date_default_timezone_set('Asia/Jakarta');

session_start();
include "../../3rdparty/engine.php";

$data = $db->query("SELECT b.id AS id,b.warna AS warna,a.tanggal AS tanggal,c.no_lokasi AS lokasi FROM lokasi_barang a JOIN barang b JOIN lokasi c ON a.barang_id=b.id AND b.warna=c.warna WHERE a.tanggal='".date('Y-m-d')."'", 0);

$hijau = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b JOIN lokasi c ON a.barang_id=b.id AND b.warna=c.warna WHERE b.warna='Hijau' AND a.tanggal='".date('Y-m-d')."'", 0);
$merah = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b JOIN lokasi c ON a.barang_id=b.id AND b.warna=c.warna WHERE b.warna='Merah' AND a.tanggal='".date('Y-m-d')."'", 0);
$biru = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b JOIN lokasi c ON a.barang_id=b.id AND b.warna=c.warna WHERE b.warna='Biru' AND a.tanggal='".date('Y-m-d')."'", 0);
                            

$strhtml .= '<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/dist/css/bootstrap.min.css">';
$strhtml .= '<link rel="stylesheet" type="text/css" href="../../assets/css/color/default.css">';

$strhtml .= '<h3 align="center"><b>Laporan Barang Masuk Tanggal  '.date('d F Y').'</b></h3>';

$strhtml .= '
    <table class="table" width="100%" border="1">
        <tr>
            <th style="background-color: lightgrey;padding: 5px 5px 5px 5px;" align="center">
                <b>Hijau</b>
            </th>
            <th style="background-color: lightgrey;padding: 5px 5px 5px 5px;" align="center">
                <b>Merah</b>
            </th>
            <th style="background-color: lightgrey;padding: 5px 5px 5px 5px;" align="center">
                <b>Biru</b>
            </th>
        </tr>
        <tr>
            <td style="padding: 5px 5px 5px 5px;" align="center">
                <b>'.$hijau[0]['jumlah'].'</b>
            </td>
            <td style="padding: 5px 5px 5px 5px;" align="center">
                <b>'.$merah[0]['jumlah'].'</b>
            </td>
            <td style="padding: 5px 5px 5px 5px;" align="center">
                <b>'.$biru[0]['jumlah'].'</b>
            </td>
        </tr>
    </table>';

$strhtml .= '<br>';
$strhtml .= '<br>';

$strhtml .= '
    <table class="table" width="100%" border="1">
        <tr>
            <th style="background-color: lightgrey;padding: 5px 5px 5px 5px;">
                <b>ID</b>
            </th>
			<th style="background-color: lightgrey;padding: 5px 5px 5px 5px;">
                <b>No Barang</b>
            </th>
            <th style="background-color: lightgrey;padding: 5px 5px 5px 5px;">
                <b>Lokasi</b>
            </th>
            <th style="background-color: lightgrey;padding: 5px 5px 5px 5px;">
                <b>Warna</b>
            </th>
            <th style="background-color: lightgrey;padding: 5px 5px 5px 5px;">
                <b>Tanggal</b>
            </th>
        </tr>';
$no = 1;
for ($i = 0; $i < count($data); $i++) {
    $date = date_create($data[$i]['tanggal']);
    $strhtml .= '
        <tr>
            <td style="padding: 5px 5px 5px 5px;">
                '.($no++).'
            </td>
			<td style="padding: 5px 5px 5px 5px;">
                '.$data[$i]['id'].'
            </td>
            <td style="padding: 5px 5px 5px 5px;">
                '.$data[$i]['lokasi'].'
            </td>
            <td style="padding: 5px 5px 5px 5px;">'
                .$data[$i]['warna'].
            '</td>
            <td style="padding: 5px 5px 5px 5px;">'                
                .date_format($date, 'd F Y').
            '</td>
        </tr>
    ';
}

$strhtml .= '</table>';

$strhtml .= 'Mengetahui,';

$strhtml .= '<br>';
$strhtml .= '<br>';
$strhtml .= '<br>';
$strhtml .= '<br>';
$strhtml .= '__________________________________<br>';

$strhtml .= 'Nama    : '.$_SESSION['nama'].'<br>';
$strhtml .= 'Tanggal : '.date('d F Y').'<br>';

include "../../assets/library/mpdf/mpdf.php";
header("Content-type:application/pdf");

$fileName = 'Laporan-'.date('FY').date('his');
header('Content-Disposition: attachment; filename="'.$fileName.'"');

$mpdf = new mPDF('UTF-8', 'A4', 0, '', 10, 10, 5, 1, 1, 1, '');
$mpdf->AddPage('P', // L - landscape, P - portrait 
        '', '', '', '',
        20, // margin_left
        20, // margin right
        20, // margin top
        20, // margin bottom
        0, // margin header
        0); // margin footer
$mpdf->SetTitle('Laporan Barang Masuk');
$mpdf->WriteHTML($strhtml);
ob_clean(); 
//$mpdf->Output();//baca di browser
$mpdf->Output($fileName. '.pdf','D'); //Download file PDF
?>
<?php
$tgl = $_GET['tgl'];
?>
<div class="container-fluid">  
    <div class="row bg-title">
        <div class="col-lg-1 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"></h4> 
        </div>
        <div class="col-lg-11 col-sm-8 col-md-8 col-xs-12">
            <?php
            if ($tgl != '') { ?>
            <a href="pages/laporan/laporan_semua.php?tanggal=<?php echo $tgl?>" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">
            <i class="fa fa-print fa-fw" aria-hidden="true"></i>PRINT</a>

            <a href="r?m=laporan&s=laporan" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">
            <i class="fa fa-undo fa-fw" aria-hidden="true"></i>Kembali</a>
            <?php } ?>
            <!-- <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
            </ol> -->
        </div>
        <!-- /.col-lg-12 -->
    </div>  
    <?php
    $tgl = $_GET['tgl'];
    if ($tgl == '') { ?>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Laporan Barang Masuk</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>TANGGAL</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $data = $db->query(
                                    "SELECT
                                        *,
                                        b.id AS id,b.warna AS warna,a.tanggal AS tanggal,c.no_lokasi AS lokasi
                                        FROM lokasi_barang a
                                        JOIN barang b
                                        JOIN lokasi c ON a.barang_id=b.id AND a.lokasi_id=c.id
                                        JOIN pemilik d ON b.id_pemilik = d.id_pemilik
                                        JOIN user e ON a.id_user = e.id
                                        GROUP BY a.tanggal
                                        ", 0);

                                $no = 1;
                                for ($i = 0; $i < count($data); $i++) {
                                    $date = date_create($data[$i]['tanggal']);
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo date_format($date, 'd F Y') ?> </td>
                                <td>
                                    <a href="r?m=laporan&s=laporan&tgl=<?php echo $data[$i]['tanggal'] ?>" class="btn btn-info pull-left m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-eye fa-fw" aria-hidden="true"></i>Detail
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php } elseif ($tgl != '') {  ?>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Laporan Barang Masuk</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>PEMILIK</th>
                                <th>NO BARANG</th>
                                <th>LOKASI</th>
                                <th>WARNA</th>
                                <th>TANGGAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $data = $db->query(
                                    "SELECT
                                        *,
                                        b.id AS id,b.warna AS warna,a.tanggal AS tanggal,c.no_lokasi AS lokasi
                                        FROM lokasi_barang a
                                        JOIN barang b
                                        JOIN lokasi c ON a.barang_id=b.id AND a.lokasi_id=c.id
                                        JOIN pemilik d ON b.id_pemilik = d.id_pemilik
                                        JOIN user e ON a.id_user = e.id
                                        WHERE a.tanggal = '$tgl'
                                        ", 0);

                                $no = 1;
                                for ($i = 0; $i < count($data); $i++) {
                                    $date = date_create($data[$i]['tanggal']);
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data[$i]['nm_pemilik'] ?></td>
                                <td class="txt-oflo"><?php echo $data[$i]['id'] ?></td>
                                <td><?php echo $data[$i]['lokasi'] ?></td>
                                <td><?php echo $data[$i]['warna'] ?></td>
                                <td><?php echo date_format($date, 'd F Y') ?> (<?php echo $data[$i]['nama'] ?>)</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>
</div>

<script type="text/javascript">
function hariini() {
    var url = "pages/laporan/laporan_hari_ini.php";

    popup = window.open(url,'_self');
}

function bulanini() {
    var url = "pages/laporan/laporan_bulan_ini.php";

    popup = window.open(url,'_self');
}

function tahunini() {
    var url = "pages/laporan/laporan_tahun_ini.php";

    popup = window.open(url,'_self');
}

function semua() {
    var url = "pages/laporan/laporan_semua.php";

    popup = window.open(url,'_self');
}
</script>
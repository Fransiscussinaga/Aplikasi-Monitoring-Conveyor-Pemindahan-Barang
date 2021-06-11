<div class="container-fluid">  
    <div class="row bg-title">
        <div class="col-lg-1 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"></h4> 
        </div>
        <div class="col-lg-11 col-sm-8 col-md-8 col-xs-12">
            <a onclick="semua()" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Download Semua Laporan</a>
            <a onclick="tahunini()" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Download Laporan Tahun ini</a>
            <a onclick="bulanini()" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Download Laporan Bulan ini</a>
            <a onclick="hariini()" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Download Laporan Hari ini</a>
            <!-- <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
            </ol> -->
        </div>
        <!-- /.col-lg-12 -->
    </div>  
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Laporan Barang Masuk</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NO BARANG</th>
                                <th>LOKASI</th>
                                <th>WARNA</th>
                                <th>TANGGAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $data = $db->query(
                                    "SELECT b.id AS id,b.warna AS warna,a.tanggal AS tanggal,c.no_lokasi AS lokasi FROM lokasi_barang a JOIN barang b JOIN lokasi c ON a.barang_id=b.id AND a.lokasi_id=c.id", 0
                                    );
                                $no = 1;
                                for ($i = 0; $i < count($data); $i++) {
                                    $date = date_create($data[$i]['tanggal']);
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td class="txt-oflo"><?php echo $data[$i]['id'] ?></td>
                                <td><?php echo $data[$i]['lokasi'] ?></td>
                                <td><?php echo $data[$i]['warna'] ?></td>
                                <td><?php echo date_format($date, 'd F Y') ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
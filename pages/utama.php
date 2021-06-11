<?php 
    $hijau = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b JOIN lokasi c ON a.barang_id=b.id AND b.warna=c.warna WHERE b.warna='Hijau'", 0); //Menampilkan banyak nya 
    $merah = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b JOIN lokasi c ON a.barang_id=b.id AND b.warna=c.warna WHERE b.warna='Merah'", 0);// jumlah untuk barang dimana warna
    $biru = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b JOIN lokasi c ON a.barang_id=b.id AND b.warna=c.warna WHERE b.warna='Biru'", 0); // nya sama dengan biru
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <!-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a>
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
            </ol> -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Different data widgets -->
    <!-- ============================================================== -->
    <!-- .row -->
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Hijau</h3> 
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php echo $hijau[0]['jumlah'] ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Merah</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-danger"></i> <span class="counter text-danger"><?php echo $merah[0]['jumlah'] ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Biru</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo $biru[0]['jumlah'] ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <!--/.row -->
    <!--row -->
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Report Hari Ini</h3>
                <div id="ct-visitss" style="height: 405px;"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Report Bulan Ini</h3>
                <div id="ct-visitsss" style="height: 405px;"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Report Tahun Ini</h3>
                <div id="ct-visitssss" style="height: 405px;"></div>
            </div>
        </div>
    </div>
</div>
<?php
    $chart_hijau = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b ON a.barang_id=b.id WHERE b.warna='Hijau' AND a.tanggal='".date('Y-m-d')."'", 0);
    $chart_merah = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b ON a.barang_id=b.id WHERE b.warna='Merah' AND a.tanggal='".date('Y-m-d')."'", 0);
    $chart_biru = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b ON a.barang_id=b.id WHERE b.warna='Biru' AND a.tanggal='".date('Y-m-d')."'", 0);

    $date = date_create(date('d-M-Y'));
?>
<?php
    $chart_hijau2 = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b ON a.barang_id=b.id WHERE b.warna='Hijau' AND MONTH(a.tanggal)='".date('m')."'", 0);
    $chart_merah2 = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b ON a.barang_id=b.id WHERE b.warna='Merah' AND MONTH(a.tanggal)='".date('m')."'", 0);
    $chart_biru2 = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b ON a.barang_id=b.id WHERE b.warna='Biru' AND MONTH(a.tanggal)='".date('m')."'", 0);

    $date2 = date_create(date('d-M-Y'));
?>
<?php
    $chart_hijau3 = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b ON a.barang_id=b.id WHERE b.warna='Hijau' AND YEAR(a.tanggal)='".date('Y')."'", 0);
    $chart_merah3 = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b ON a.barang_id=b.id WHERE b.warna='Merah' AND YEAR(a.tanggal)='".date('Y')."'", 0);
    $chart_biru3 = $db->query("SELECT COUNT(*) AS jumlah FROM lokasi_barang a JOIN barang b ON a.barang_id=b.id WHERE b.warna='Biru' AND YEAR(a.tanggal)='".date('Y')."'", 0);

    $date3 = date_create(date('d-M-Y'));
?>
<script type="text/javascript">
$(function () { 
    var myChart = Highcharts.chart('ct-visitss', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Barang Masuk Tanggal <?php echo date_format($date, 'd F Y') ?>'
        },
        xAxis: {
            categories: ['Hijau', 'Merah', 'Biru']
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        series: [{
            name: 'Hasil',
            data: [
                {y: <?php echo $chart_hijau[0]['jumlah'] ?>, color: '#41f470'}, 
                {y: <?php echo $chart_merah[0]['jumlah'] ?>, color: '#f44141'}, 
                {y: <?php echo $chart_biru[0]['jumlah'] ?>, color: '#4286f4'}
            ]
        }]
    });
});
$(function () { 
    var myChart = Highcharts.chart('ct-visitsss', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Barang Masuk Bulan <?php echo date_format($date, 'F') ?>'
        },
        xAxis: {
            categories: ['Hijau', 'Merah', 'Biru']
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        series: [{
            name: 'Hasil',
            data: [
                {y: <?php echo $chart_hijau2[0]['jumlah'] ?>, color: '#41f470'}, 
                {y: <?php echo $chart_merah2[0]['jumlah'] ?>, color: '#f44141'}, 
                {y: <?php echo $chart_biru2[0]['jumlah'] ?>, color: '#4286f4'}
            ]
        }]
    });
});
$(function () { 
    var myChart = Highcharts.chart('ct-visitssss', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Barang Masuk Tahun <?php echo date_format($date, 'Y') ?>'
        },
        xAxis: {
            categories: ['Hijau', 'Merah', 'Biru']
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        series: [{
            name: 'Hasil',
            data: [
                {y: <?php echo $chart_hijau3[0]['jumlah'] ?>, color: '#41f470'}, 
                {y: <?php echo $chart_merah3[0]['jumlah'] ?>, color: '#f44141'}, 
                {y: <?php echo $chart_biru3[0]['jumlah'] ?>, color: '#4286f4'}
            ]
        }]
    });
});
</script>
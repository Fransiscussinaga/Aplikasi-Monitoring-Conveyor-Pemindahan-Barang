<div class="container-fluid">  
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data Barang</h4></div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <!-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a>
            <ol class="breadcrumb">  
                <li><a href="#">Dashboard</a></li>
            </ol> -->
        </div>
        <!-- /.col-lg-12 -->
    </div>  
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Data Barang Masuk</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th>NO BARANG</th>
                                <th>Pemilik</th>
                                <th>LOKASI</th>
                                <th>WARNA</th>
                                <th>OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $data = $db->query(
                                "SELECT *, 
                                    b.id AS barang_id, c.no_lokasi AS no_lokasi, b.warna AS warna, a.id AS id
                                    FROM lokasi_barang a 
                                    JOIN barang b 
                                    JOIN lokasi c ON a.barang_id=b.id AND a.lokasi_id=c.id
                                    JOIN pemilik d ON b.id_pemilik = d.id_pemilik"
                                    , 0);

                                $no = 1;
                                for ($i =0; $i < count($data); $i++) {
                            ?>
                            <tr>
                                
                                <td class="txt-oflo"><?php echo $data[$i]['barang_id'] ?></td>
                                <td><?php echo $data[$i]['nm_pemilik'] ?></td>
                                <td><?php echo $data[$i]['no_lokasi'] ?></td>
                                <td><?php echo $data[$i]['warna'] ?></td>
                                <td><a href="r?m=barang&s=barang_edit&id=<?php echo $data[$i]['id'] ?>&id_barang=<?php echo $data[$i]['barang_id'] ?>" class="btn btn-primary">Edit</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
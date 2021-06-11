<?php
	$data = $db->query("SELECT * FROM lokasi_barang WHERE id='".$_GET['id']."'", 0);
?>
<div class="container-fluid">  
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Barang</h4></div>
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
                <form class="form" method="POST" action="r?m=barang&s=barang_update&id=<?php echo $data[0]['id'] ?>" role="POST">
                	<div class="form-group">
                		<select name="barang" class="form-control" readonly>
            			<?php
            				$barang = $db->query("SELECT * FROM barang WHERE id='".$_GET['id_barang']."'", 0);
            				for ($i=0; $i < count($barang); $i++) { 
            						echo "<option value=".$barang[$i]['id'].">".$barang[$i]['id']." - ".$barang[$i]['warna']."</option>";
            				}
            			?>
                		</select>
                	</div>
                	<div class="form-group">
                		<select name="lokasi" class="form-control">
            			<?php
            				$lokasi = $db->query("SELECT * FROM lokasi", 0);
            				for ($i=0; $i < count($lokasi); $i++) { 
            						echo "<option value=".$lokasi[$i]['id'].">".$lokasi[$i]['no_lokasi']." - ".$lokasi[$i]['warna']."</option>";
            				}
            			?>
                		</select>
                	</div>
                	<div class="form-group">
                		<input type="submit" name="submit" value="Submit" class="btn btn-primary">
                	</div>
                </form>
            </div>
        </div>
    </div>
</div>
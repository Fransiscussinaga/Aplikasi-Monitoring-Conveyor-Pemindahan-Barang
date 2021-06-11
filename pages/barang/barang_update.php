<?php
session_start();
include "../../3rdparty/engine.php";

$update = $db->query("UPDATE lokasi_barang SET barang_id='".$_POST['barang']."',lokasi_id='".$_POST['lokasi']."' WHERE id='".$_GET['id']."'", 0);

echo '<script type="text/javascript">window.location.href = "r?m=barang&s=barang"</script>';

?>
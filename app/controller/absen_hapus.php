<?php
include '../include/koneksi.php';

$id = $_GET['id'];
$sql = "delete from absensi";
$proses = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if ($proses) {
		header('location:../absensi?hapus='.base64_encode('data absen telah dihapus'));
	} else { echo "Data belum dapat di hapus!!"; 
	}
?>
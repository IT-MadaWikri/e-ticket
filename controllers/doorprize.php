<?php
include '../include/koneksi.php';

$nik = $_POST['nik'];
$tanggal = date('Y-m-d');
$masuk = date('Y-m-d H:i:s');
$cek = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT nik from karyawan where nik ='$nik'"));

if ($cek == 1) {
    // Ubah query untuk mengambil data doorprize
    $doorprize_query = "SELECT * FROM absensi WHERE nik ='$nik'";
    $doorprize_result = mysqli_query($GLOBALS["___mysqli_ston"], $doorprize_query);

    if (mysqli_num_rows($doorprize_result) > 0) {
        // Jika data doorprize ditemukan, arahkan pengguna ke halaman suksesd.php
        header('Location: ../suksesd.php?nik=' . $nik . '');
        exit(); // Pastikan untuk keluar dari skrip setelah mengarahkan
    } else {
        echo "<script>alert('Data Doorprize Tidak Ditemukan'); setTimeout(function(){ window.location.href='../index'; }, 0);</script>";
    }

} else {
    echo "<script>alert('Data Tidak Terdaftar'); setTimeout(function(){ window.location.href='../index'; }, 1000);</script>";
}
?>

<?php
// Pastikan request datang melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah parameter NIK telah diterima
    if(isset($_POST['nik'])) {
        // Ambil nilai NIK dari permintaan
        $nik = $_POST['nik'];

        // Lakukan koneksi ke database
        $conn = mysqli_connect("localhost", "username", "password", "nama_database");

        // Periksa koneksi database
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Hapus data absensi berdasarkan NIK dari database
        $sql = "DELETE FROM absensi WHERE nik = '$nik'";

        if (mysqli_query($conn, $sql)) {
            // Jika penghapusan berhasil, kirim respons sukses
            echo "Data absensi dengan NIK $nik berhasil dihapus.";
        } else {
            // Jika terjadi kesalahan dalam penghapusan, kirim respons error
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Tutup koneksi database
        mysqli_close($conn);
    } else {
        // Jika parameter NIK tidak diterima, kirim respons error
        echo "Parameter NIK tidak diterima.";
    }
} else {
    // Jika request bukan melalui metode POST, kirim respons error
    echo "Metode request tidak valid.";
}
?>

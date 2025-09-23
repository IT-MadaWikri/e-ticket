<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>Tiket Gelang</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A400" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tiro+Bangla%3A400" />
    <link rel="stylesheet" href="../css/frame-4.css" />
</head>

<body>
    <?php
    include '../include/koneksi.php';
    // memulai session
    session_start();
    error_reporting(0);
    /**
     * Jika Tidak login atau sudah login tapi bukan sebagai admin
     * maka akan dibawa kembali ke halaman login atau menuju halaman yang seharusnya.
     */
    if (!isset ($_SESSION['level'])) {
        header('location:../login');
        exit();
    }
    ?>
    <?php
    $data_peserta = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM karyawan");
    while ($peserta = mysqli_fetch_array($data_peserta)) {
        ?>
        <div class="frame-4-L3q">

            <img class="mwt-1-asH" src="../images/mwtlogos.png" />

            <div class="auto-group-ylt1-g7h">
                <div class="perbedaan-barcode-dan-qr-code-500x329-1-1-C63">
                    <img src="controller/barcode.php?text=<?php echo $peserta['nik']; ?>"
                        class="perbedaan-barcode-dan-qr-code-500x329-1-1-C63" />
                </div>
                <p class="item-1321007-Grb">
                    <?php echo $peserta['nik']; ?>
                </p>
            </div>

            <div class="container">
                <p class="peserta-qYK">
                    <?php echo ($peserta['area']); ?>
                </p>
                <p class="event-details">
                    27 Maret 2024 | 14.00 - Selesai <br>
                    Gedung FG Plant 4 JBK
                </p>

            </div>



            <p class="no-1321007-nama-fulan-dept-it-plant-3-ZUK">
                <span class="label">Nomor</span>
                <span class="content">
                    <?php echo ": " . $peserta['nik']; ?>
                </span><br />
                <span class="label">Nama</span>
                <span class="content">
                    <?php echo ": " . $peserta['nama']; ?>
                </span><br />
                <span class="label">Dept</span>
                <span class="content">
                    <?php echo ": " . $peserta['job_title']; ?>
                </span><br />
                <span class="label">Plant</span>
                <span class="content">
                    <?php echo ": " . $peserta['lokasi']; ?>
                </span><br />
            </p>


            <p class="item--FM9">
                :
                <br />
                :
                <br />
                :
            </p>
            <div class="auto-group-utnx-nby">
                <p class="kupon-doorprize-8fq">KUPON <br>DOORPRIZE</p>
                <div class="auto-group-zolb-Ty1">
                    <?php echo $peserta['nik']; ?>
                </div>
            </div>
        </div>
    <?php } ?>



</body>

</html>
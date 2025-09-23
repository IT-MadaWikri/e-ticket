<div class="container-fluid">
    <div class="row clearfix">
        <div class="block-header">
            <h2>
                <?php $tanggal = date('d M Y');
                $day = date('D', strtotime($tanggal));
                $dayList = array(
                    'Sun' => 'Minggu',
                    'Mon' => 'Senin',
                    'Tue' => 'Selasa',
                    'Wed' => 'Rabu',
                    'Thu' => 'Kamis',
                    'Fri' => 'Jumat',
                    'Sat' => 'Sabtu'
                );
                echo $dayList[$day] . ", " . $tanggal; ?>
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-blue hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="content">
                        <div class="text">JUMLAH KARYAWAN</div>
                        <div class="number">
                            <?php $s_karyawan = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from karyawan");
                            $karyawan = mysqli_fetch_array($s_karyawan);
                            $t_karyawan = mysqli_num_rows($s_karyawan);
                            echo $t_karyawan; ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="info-box-3 bg-green hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">check_box</i>
                    </div>
                    <div class="content">
                        <div class="text">KARYAWAN HADIR</div>
                        <div class="number">
                            <?php
                            $skr = date('Y-m-d');
                            $s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absensi where tanggal='$skr' and ijin is NULL order by masuk DESC");
                            $t_absen = mysqli_num_rows($s_absen);
                            echo $t_absen; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row clearfix">
        <div class="block-header">
            <h2>
                <?= $d_aplikasi['nama_perusahaan']; ?>
            </h2>
        </div>
        <div class="row">
            <!-- Basic Examples -->

            <!-- #END# Basic Examples -->
            <!-- Badges -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Data Karyawan Hadir Terkini
                        </h2>

                    </div>
                    <div class="body">
                        <div style="overflow: auto; height: 300px;"> <!-- Atur tinggi sesuai kebutuhan -->
                            <ul class="list-group">
                                <?php
                                $s_absen1 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM absensi WHERE tanggal='$skr' AND masuk IS NOT NULL ORDER BY masuk DESC");
                                $nomor = 1; // Inisialisasi nomor pertama
                                while ($d_absen = mysqli_fetch_array($s_absen1)) {
                                    $peg = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM karyawan WHERE nik='$d_absen[nik]'"));
                                    ?>
                                    <li class="list-group-item">
                                        <div class="post-pic-text">
                                            <b style="color:#005288">
                                                <?= $nomor; ?>. <!-- Menambahkan nomor di samping nama -->
                                                <?= $peg['nama']; ?>
                                            </b>
                                            <p>
                                                <?= $peg['job_title']; ?> -
                                                <?= $peg['lokasi']; ?> -
                                                <?= $peg['area']; ?>
                                            </p>
                                        </div>
                                    </li>
                                    <?php
                                    $nomor++; // Tambahkan 1 ke nomor setiap kali ada inputan baru
                                }
                                ?>
                            </ul>
                        </div>



                    </div>
                </div>
            </div>
            <!-- #END# Badges -->
        </div>
    </div>
</div>
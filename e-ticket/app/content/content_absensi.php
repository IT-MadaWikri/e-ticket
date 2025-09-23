<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-fluid">
	<div class="row">
		<div class="block-header">
			<h2>
				<?php
				$tanggal = date('d M Y');
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
				echo $dayList[$day] . ", " . $tanggal;
				?>
			</h2>
		</div>

		<a href="ijin">
			<div class="col-md-12">
				<div class="info-box-3 bg-red hover-zoom-effect">
					<div class="icon">
						<i class="material-icons">highlight_off</i>
					</div>
					<div class="content">
						<div class="text">KARYAWAN TIDAK MASUK</div>
						<?php
						$s_karyawan = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from karyawan");
						$karyawan = mysqli_fetch_array($s_karyawan);
						$t_karyawan = mysqli_num_rows($s_karyawan);
						$skr = date('Y-m-d');
						$s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absensi where tanggal='$skr' and ijin is NULL order by masuk DESC");
						$t_absen = mysqli_num_rows($s_absen);
						?>
						<div class="number">
							<?= $t_karyawan - $t_absen; ?>
						</div>
					</div>
				</div>
			</div>
		</a>

	</div>
	<div class="row clearfix">
		<div class="card">
			<div class="header">
				<h2>
					DATA ABSENSI
					<a href="controller/absen_hapus.php" onclick="return confirm('Apakah Anda yakin ingin mengosongkan semua data absensi?')" style="float: right;">Kosongkan</a>
				</h2>
			</div>
			<div class="body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover dataTable js-exportable">
						<thead>
							<tr>
								<th>NIK</th>
								<th>Nama</th>
								<th>Departemen</th>
								<th>Plant</th>
								<th>Status</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							$s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM absensi, karyawan where absensi.nik=karyawan.nik");
							while ($d_absen = mysqli_fetch_array($s_absen)) {
								?>
								<tr>
									<td><?= $d_absen['nik']; ?></td>
									<td><?= $d_absen['nama']; ?></td>
									<td><?= $d_absen['job_title']; ?></td>
									<td><?= $d_absen['lokasi']; ?></td>
									<td>
										<?php
										$a = $d_absen['area'];
										$d_a = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from area where kode_area ='$a'"));
										echo $d_a['area'];
										?>
									</td>

								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function(){
        $(".btn-delete").click(function(){
            var nik = $(this).data('nik');
            if(confirm("Apakah Anda yakin ingin menghapus data absensi ini?")){
                $.ajax({
                    url: 'controller/hapus_absensi.php',
                    type: 'POST',
                    data: { nik: nik },
                    success: function(response){
                        // Refresh atau hapus baris dari tabel jika diperlukan
                        alert("Data absensi berhasil dihapus");
                        // Contoh: Hapus baris dari tabel setelah penghapusan berhasil
                        $(this).closest('tr').remove();
                    },
                    error: function(xhr, status, error){
                        alert("Terjadi kesalahan: " + error);
                    }
                });
            }
        });
    });
</script>

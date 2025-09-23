<div class="container-fluid">
    <div class="row clearfix">
        <div class="block-header">
            <h2><?php 
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
                echo $dayList[$day].", ".$tanggal;
            ?></h2>
        </div>
        <div class="card col-md-8">
            <div class="body">
                <form method="get">                
                    <div class="col-sm-3 ">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="date" name="date" value="<?= isset($_GET['date']) ? $_GET['date'] : date('Y/m/d');?>" class="datepicker form-control" data-date-format="yyyy/mm/dd" placeholder="Tanggal" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="form-group">
                            <?php 
                                $selectedArea = isset($_GET['area']) ? $_GET['area'] : $_SESSION['area'];
                                if($_SESSION['area'] == 'all') {
                            ?>
                            <select name="area" class="form-control show-tick">
                                <option value="">-- Pilih Area --</option>
                                <?php
                                    $sql_a = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM area");
                                    while($d_a = mysqli_fetch_assoc($sql_a)){
                                        $selected = ($selectedArea == $d_a['kode_area']) ? 'selected' : '';
                                        echo '<option value="'.$d_a['kode_area'].'" '.$selected.'>'.$d_a['area'].'</option>';
                                    }
                                ?>
                            </select>
                            <?php 
                                } else {
                                    echo '<input type="hidden" name="area" value="'.$selectedArea.'">';
                                    echo '<p>'.$selectedArea.'</p>';
                                }
                            ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect">
                        <i class="material-icons">search</i>
                        <span>FILTER</span>
                    </button>
                </form>                       
            </div>    
        </div>
    </div>
    <?php 
        if(isset($_GET['date']) && $_GET['date']){
    ?>
    <div class="row clearfix">
        <div class="card">
            <div class="header">
                <h2>
                    DATA SISWA TIDAK MASUK <?= $_GET['date']; ?>
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Dept</th>
                                <th>Plant</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $date = $_GET['date'];
                                $area = $_GET['area'];
                                $s_karyawan = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from karyawan where nik not in (SELECT nik from absensi where tanggal='$date') AND area LIKE '%$area%'");
                                while ($d_karyawan=mysqli_fetch_array($s_karyawan)){
                            ?>
                            <tr>
                                <td><?= $d_karyawan['nik'];?></td>
                                <td><?= $d_karyawan['nama'];?></td>
                                <td><?= $d_karyawan['job_title'];?></td>
                                <td><?= $d_karyawan['lokasi'];?></td>
                                <td><?= $d_karyawan['area'];?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="col-md-9">
        <!-- Place default content here if necessary -->
    </div>
    <?php } ?>
</div>

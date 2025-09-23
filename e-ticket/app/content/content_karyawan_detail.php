<div class="container-fluid">
    <div class="row clearfix">
        <?php $detail = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from karyawan where nik='$_GET[nik]'")); ?>
        <div id="detail">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <p align="center"> <img src="../images/logo.jpg" width="60%" alt="Logo"></p>
                        </h2>
                    </div>
                    <div class="body">
                        <p align="center"><img src="../app/images/<?= $detail['foto']; ?>" width="70%" alt="Foto"></p>
                    </div>
                    <div class="footer">
                        <h4>
                            <p align="center"><b>
                                    <?= $detail['nama']; ?>
                                </b></p>
                        </h4>
                        <p align="center"><img src="controller/barcode.php?text=<?= $_GET['nik']; ?>&print=true"
                                width="60%" alt="Barcode" /></p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            <?= $detail['nama']; ?> <small>
                                <?= $detail['job_title']; ?>
                            </small>
                        </h2>

                    </div>
                    <div class="body">
                        <ul align="left">
                            <li>NIK :
                                <?= $detail['nik']; ?>
                            </li>
                            <li>Nama :
                                <?= $detail['nama']; ?>
                            </li>
                            <li>Departemen :
                                <?= $detail['job_title']; ?>
                            </li>
                            <li>Plant :
                                <?= $detail['lokasi']; ?>
                            </li>
                            <li>Status :
                                <?= $detail['area']; ?>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
            <script>
                function printContent(el) {
                    var restorepage = document.body.innerHTML;
                    var printcontent = document.getElementById(el).innerHTML;
                    document.body.innerHTML = printcontent;
                    window.print();
                    document.body.innerHTML = restorepage;
                }
            </script>
            <a onClick="printContent('detail')" target="_new" class="btn btn-success"> <i
                    class="material-icons">print</i>
                <span>PRINT</span></a>
        </div>
    </div>
</div>
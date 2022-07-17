<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

            $id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
            $query = mysqli_query($config, "SELECT * FROM tbl_form_kesehatan WHERE id_surat='$id_surat'");
            list($id_surat, $id_user, $no_surat, $nama_istri, $umur_istri, $pekerjaan_istri, $alamat_istri, 
            $bb_istri, $tb_istri, $lila_istri, $td_istri, $hb_istri, $darah_istri, $nama_suami, $umur_suami, 
            $pekerjaan_suami, $alamat_suami, $bb_suami, $tb_suami, $td_suami, $hb_suami, $darah_suami, 
            $screening_imunisasi, $tindakan, $pernyataan, $pelaksana, $tgl_surat, $status ) = mysqli_fetch_array($query);
            
           ?>

                <!-- Row Start -->
                <div class="row">
                    <!-- Secondary Nav START -->
                    <div class="col s12">
                        <nav class="secondary-nav">
                            <div class="nav-wrapper blue-grey darken-1">
                                <ul class="left">
                                    <li class="waves-effect waves-light"><a href="#" class="judul"><i class="material-icons">search</i> Detail Data Form Kesehatan</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- Secondary Nav END -->
                </div>
                <!-- Row END -->

                <?php
                    if(isset($_SESSION['errQ'])){
                        $errQ = $_SESSION['errQ'];
                        echo '<div id="alert-message" class="row">
                                <div class="col m12">
                                    <div class="card red lighten-5">
                                        <div class="card-content notif">
                                            <span class="card-title red-text"><i class="material-icons md-36">clear</i> '.$errQ.'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        unset($_SESSION['errQ']);
                    }
                    if(isset($_SESSION['errEmpty'])){
                        $errEmpty = $_SESSION['errEmpty'];
                        echo '<div id="alert-message" class="row">
                                <div class="col m12">
                                    <div class="card red lighten-5">
                                        <div class="card-content notif">
                                            <span class="card-title red-text"><i class="material-icons md-36">clear</i> '.$errEmpty.'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        unset($_SESSION['errEmpty']);
                    }
                ?>

                <!-- Row form Start -->
                <div class="row jarak-form">

                    <!-- Form START -->
                    <form class="col s12" method="POST" action="?page=tsk&act=detail" enctype="multipart/form-data">

                        <!-- Row in form START -->
                        <div class="row">
                        <h3>Form Kesehatan Calon Istri</h3>
                        <input type="hidden" name="id_surat" value="<?php echo $id_surat ;?>">
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="nama_istri" type="text" class="validate" name="nama_istri" value="<?php echo $nama_istri ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['nama_istrik'])){
                                        $nama_istrik = $_SESSION['nama_istrik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$nama_istrik.'</div>';
                                        unset($_SESSION['nama_istrik']);
                                    }
                                ?>
                            <label for="nama_istri">Nama Istri</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">alarm</i>
                            <input id="umur_istri" type="text" class="validate" name="umur_istri" value="<?php echo $umur_istri ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['umur_istrik'])){
                                        $umur_istrik = $_SESSION['umur_istrik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$umur_istrik.'</div>';
                                        unset($_SESSION['umur_istrik']);
                                    }
                                ?>
                            <label for="umur_istri">Umur Istri</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">work</i>
                            <input id="pekerjaan_istri" type="text" class="validate" name="pekerjaan_istri" value="<?php echo $pekerjaan_istri;?>" readonly>
                                <?php
                                    if(isset($_SESSION['pekerjaan_istrik'])){
                                        $pekerjaan_istrik = $_SESSION['pekerjaan_istrik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$pekerjaan_istrik.'</div>';
                                        unset($_SESSION['pekerjaan_istrik']);
                                    }
                                ?>
                            <label for="pekerjaan_istri">Pekerjaan Istri</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">place</i>
                            <input id="alamat_istri" type="text" class="validate" name="alamat_istri" value="<?php echo $alamat_istri ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['alamat_istrik'])){
                                        $alamat_istrik = $_SESSION['alamat_istrik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$alamat_istrik.'</div>';
                                        unset($_SESSION['alamat_istrik']);
                                    }
                                ?>
                            <label for="alamat_istri">Alamat Istri</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="bb_istri" type="text" class="validate" name="bb_istri" value="<?php echo $bb_istri ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['bb_istrik'])){
                                        $bb_istrik = $_SESSION['bb_istrik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$bb_istrik.'</div>';
                                        unset($_SESSION['bb_istrik']);
                                    }
                                ?>
                            <label for="bb_istri">Berat Badan Istri</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="tb_istri" type="text" class="validate" name="tb_istri" value="<?php echo $tb_istri ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['tb_istrik'])){
                                        $tb_istrik = $_SESSION['tb_istrik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$tb_istrik.'</div>';
                                        unset($_SESSION['tb_istrik']);
                                    }
                                ?>
                            <label for="tb_istri">Tinggi Badan Istri</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="lila_istri" type="text" class="validate" name="lila_istri" value="<?php echo $lila_istri ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['lila_istrik'])){
                                        $lila_istrik = $_SESSION['lila_istrik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$lila_istrik.'</div>';
                                        unset($_SESSION['lila_istrik']);
                                    }
                                ?>
                            <label for="lila_istri">Lingkar Lengan Atas (LILA) Istri</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="td_istri" type="text" class="validate" name="td_istri" value="<?php echo $td_istri ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['td_istrik'])){
                                        $td_istrik = $_SESSION['td_istrik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$td_istrik.'</div>';
                                        unset($_SESSION['td_istrik']);
                                    }
                                ?>
                            <label for="td_istri">Tetanus Difteria (TD) Istri</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="hb_istri" type="text" class="validate" name="hb_istri" value="<?php echo $hb_istri ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['hb_istrik'])){
                                        $hb_istrik = $_SESSION['hb_istrik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$hb_istrik.'</div>';
                                        unset($_SESSION['hb_istrik']);
                                    }
                                ?>
                            <label for="hb_istri">Hemoglobin (HB) Istri</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="darah_istri" type="text" class="validate" name="darah_istri" value="<?php echo $darah_istri ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['darah_istrik'])){
                                        $darah_istrik = $_SESSION['darah_istrik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$darah_istrik.'</div>';
                                        unset($_SESSION['darah_istrik']);
                                    }
                                ?>
                            <label for="darah_istri">Golongan Darah Istri</label>
                        </div>
                </div>
                <div class="row">
                <h3>Form Kesehatan Calon Suami</h3>
                        
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="nama_suami" type="text" class="validate" name="nama_suami" value="<?php echo $nama_suami ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['nama_suamik'])){
                                        $nama_suamik = $_SESSION['nama_suamik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$nama_suamik.'</div>';
                                        unset($_SESSION['nama_suamik']);
                                    }
                                ?>
                            <label for="nama_suami">Nama suami</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">alarm</i>
                            <input id="umur_suami" type="text" class="validate" name="umur_suami" value="<?php echo $umur_suami ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['umur_suamik'])){
                                        $umur_suamik = $_SESSION['umur_suamik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$umur_suamik.'</div>';
                                        unset($_SESSION['umur_suamik']);
                                    }
                                ?>
                            <label for="umur_suami">Umur suami</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">work</i>
                            <input id="pekerjaan_suami" type="text" class="validate" name="pekerjaan_suami" value="<?php echo $pekerjaan_suami ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['pekerjaan_suamik'])){
                                        $pekerjaan_suamik = $_SESSION['pekerjaan_suamik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$pekerjaan_suamik.'</div>';
                                        unset($_SESSION['pekerjaan_suamik']);
                                    }
                                ?>
                            <label for="pekerjaan_suami">Pekerjaan suami</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">place</i>
                            <input id="alamat_suami" type="text" class="validate" name="alamat_suami" value="<?php echo $alamat_suami ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['alamat_suamik'])){
                                        $alamat_suamik = $_SESSION['alamat_suamik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$alamat_suamik.'</div>';
                                        unset($_SESSION['alamat_suamik']);
                                    }
                                ?>
                            <label for="alamat_suami">Alamat suami</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="bb_suami" type="text" class="validate" name="bb_suami" value="<?php echo $bb_suami;?>" readonly>
                                <?php
                                    if(isset($_SESSION['bb_suamik'])){
                                        $bb_suamik = $_SESSION['bb_suamik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$bb_suamik.'</div>';
                                        unset($_SESSION['bb_suamik']);
                                    }
                                ?>
                            <label for="bb_suami">Berat Badan suami</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="tb_suami" type="text" class="validate" name="tb_suami" value="<?php echo $tb_suami ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['tb_suamik'])){
                                        $tb_suamik = $_SESSION['tb_suamik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$tb_suamik.'</div>';
                                        unset($_SESSION['tb_suamik']);
                                    }
                                ?>
                            <label for="tb_suami">Tinggi Badan suami</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="td_suami" type="text" class="validate" name="td_suami" value="<?php echo $td_suami ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['td_suamik'])){
                                        $td_suamik = $_SESSION['td_suamik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$td_suamik.'</div>';
                                        unset($_SESSION['td_suamik']);
                                    }
                                ?>
                            <label for="td_suami">Tetanus Difteria (TD) suami</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="hb_suami" type="text" class="validate" name="hb_suami" value="<?php echo $hb_suami ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['hb_suamik'])){
                                        $hb_suamik = $_SESSION['hb_suamik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$hb_suamik.'</div>';
                                        unset($_SESSION['hb_suamik']);
                                    }
                                ?>
                            <label for="hb_suami">Hemoglobin (HB) suami</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="darah_suami" type="text" class="validate" name="darah_suami" value="<?php echo $darah_suami ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['darah_suamik'])){
                                        $darah_suamik = $_SESSION['darah_suamik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$darah_suamik.'</div>';
                                        unset($_SESSION['darah_suamik']);
                                    }
                                ?>
                            <label for="darah_suami">Golongan Darah suami</label>
                        </div>
                </div>
                <div class="row">
                <h3>Keterangan</h3>
                <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">mail</i>
                            <input id="no_surat" type="text" class="validate" name="no_surat" value="<?php echo $no_surat ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['no_suratk'])){
                                        $no_suratk = $_SESSION['no_suratk'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$no_suratk.'</div>';
                                        unset($_SESSION['no_suratk']);
                                    }
                                    if(isset($_SESSION['errDup'])){
                                        $errDup = $_SESSION['errDup'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$errDup.'</div>';
                                        unset($_SESSION['errDup']);
                                    }
                                ?>
                            <label for="no_surat">Nomor Surat</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">colorize</i>
                            <input id="screening_imunisasi" type="text" class="validate" name="screening_imunisasi" value="<?php echo $screening_imunisasi ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['screening_imunisasik'])){
                                        $screening_imunisasik = $_SESSION['screening_imunisasik'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$screening_imunisasik.'</div>';
                                        unset($_SESSION['screening_imunisasik']);
                                    }
                                ?>
                            <label for="screening_imunisasi">Screening Imunisasi</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">settings</i>
                            <input id="tindakan" type="text" class="validate" name="tindakan" value="<?php echo $tindakan ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['tindakank'])){
                                        $tindakank = $_SESSION['tindakank'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$tindakank.'</div>';
                                        unset($_SESSION['tindakank']);
                                    }
                                ?>
                            <label for="tindakan">Tindakan</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">description</i>
                            <input id="pernyataan" type="text" class="validate" name="pernyataan" value="<?php echo $pernyataan ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['pernyataank'])){
                                        $pernyataank = $_SESSION['pernyataank'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$pernyataank.'</div>';
                                        unset($_SESSION['pernyataank']);
                                    }
                                ?>
                            <label for="pernyataan">Pemeriksaan Kesehatan dan dinyatakan </label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="pelaksana" type="text" class="validate" name="pelaksana" value="<?php echo $pelaksana ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['pelaksanak'])){
                                        $pelaksanak = $_SESSION['pelaksanak'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$pelaksanak.'</div>';
                                        unset($_SESSION['pelaksanak']);
                                    }
                                ?>
                            <label for="pelaksana">Pelaksana Konseling/Konselor</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input id="tgl_surat" type="text" name="tgl_surat" class="datepicker" value="<?php echo $tgl_surat ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['tgl_suratk'])){
                                        $tgl_suratk = $_SESSION['tgl_suratk'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$tgl_suratk.'</div>';
                                        unset($_SESSION['tgl_suratk']);
                                    }
                                ?>
                            <label for="tgl_surat">Tanggal Surat</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">check</i>
                            <input id="status" type="text" name="status" value="<?php echo $status ;?>" readonly>
                                <?php
                                    if(isset($_SESSION['statusk'])){
                                        $statusk = $_SESSION['statusk'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$statusk.'</div>';
                                        unset($_SESSION['statusk']);
                                    }
                                ?>
                            <label for="statusk">Status</label>
                        </div>
                        
                    </div>
                        <!-- Row in form END -->

                        <div class="row">
                            
                            <div class="col 6">
                                <a href="?page=tsk" class="btn-large deep-orange waves-effect waves-light">Kembali </a>
                            </div>
                        </div>

                    </form>
                    <!-- Form END -->

                </div>
                <!-- Row form END -->

<?php
            
        
    }
?>

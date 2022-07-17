<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_REQUEST['submit'])){

            //validasi form kosong
            if($_REQUEST['tgl_daftar'] == "" || $_REQUEST['no_daftar'] == "" || $_REQUEST['nama_suami'] == ""|| $_REQUEST['nama_istri'] == ""|| $_REQUEST['tgl_akad'] == "" ){
                $_SESSION['errEmpty'] = 'ERROR! Semua form wajib diisi';
                echo '<script language="javascript">window.history.back();</script>';
            } else {
                $tgl_daftar = $_REQUEST['tgl_daftar'];
                $no_daftar = $_REQUEST['no_daftar'];
                $nama_suami = $_REQUEST['nama_suami'];
                $nama_istri = $_REQUEST['nama_istri'];
                $tgl_akad = $_REQUEST['tgl_akad'];
                $status = $_REQUEST['status'];
              
            }

             //jika form file kosong akan mengeksekusi script dibawah ini
             $id_jadwal = $_REQUEST['id_jadwal'];

             $query = mysqli_query($config, "UPDATE tbl_jadwal_akad SET tgl_daftar='$tgl_daftar', no_daftar='$no_daftar',nama_suami='$nama_suami',nama_istri='$nama_istri',tgl_akad='$tgl_akad',status='$status' WHERE id_jadwal='$id_jadwal'");

             if($query == true){
             $_SESSION['succEdit'] = 'SUKSES! Data berhasil diupdate';
             header("Location: ./admin.php?page=tja");
             die();
             } else {
             $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
             echo '<script language="javascript">window.history.back();</script>';
            }
            }
            
                                    else {

        $id_jadwal = mysqli_real_escape_string($config, $_REQUEST['id_jadwal']);
        $query = mysqli_query($config, "SELECT id_jadwal, tgl_daftar, no_daftar, nama_suami, nama_istri,tgl_akad,status FROM tbl_jadwal_akad WHERE id_jadwal='$id_jadwal'");
        list($id_jadwal,$tgl_daftar, $no_daftar, $nama_suami,$nama_istri, $tgl_akad, $status) = mysqli_fetch_array($query);

       ?>

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper blue-grey darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="#" class="judul"><i class="material-icons">edit</i> Edit Data Jadwal Akad</a></li>
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
                <form class="col s12" method="POST" action="?page=tja&act=edit" enctype="multipart/form-data">

                    <!-- Row in form START -->
                    <div class="row">
                    <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal ;?>">    
                    
                    <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input id="tgl_daftar" type="text" class="datepicker" name="tgl_daftar" value="<?php echo $tgl_daftar ;?>" required>
                                <?php
                                    if(isset($_SESSION['etgl_daftar'])){
                                        $etgl_daftar = $_SESSION['etgl_daftar'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$etgl_daftar.'</div>';
                                        unset($_SESSION['etgl_daftar']);
                                    }
                                ?>
                            <label for="tgl_daftar">Tanggal Pendaftaran</label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="nama_suami" type="text" class="validate" name="nama_suami" value="<?php echo $nama_suami ;?>" required>
                                <?php
                                    if(isset($_SESSION['enama_suami'])){
                                        $enama_suami = $_SESSION['enama_suami'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$enama_suami.'</div>';
                                        unset($_SESSION['enama_suami']);
                                    }
                                ?>
                            <label for="nama_suami">Nama Suami</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="nama_istri" type="text" class="validate" name="nama_istri" value="<?php echo $nama_istri ;?>" required>
                                <?php
                                    if(isset($_SESSION['enama_istri'])){
                                        $enama_istri = $_SESSION['enama_istri'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$enama_istri.'</div>';
                                        unset($_SESSION['enama_istri']);
                                    }
                                ?>
                            <label for="nama_istri">Nama Istri</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">looks_two</i>
                            <input id="no_daftar" type="text" class="validate" name="no_daftar" value="<?php echo $no_daftar ;?>" required>
                                <?php
                                    if(isset($_SESSION['eno_daftar'])){
                                        $eno_daftar = $_SESSION['eno_daftar'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$eno_daftar.'</div>';
                                        unset($_SESSION['eno_daftar']);
                                    }
                                ?>
                            <label for="no_daftar">Nomor Surat</label>
                        </div>  
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input id="tgl_akad" type="text" class="datepicker" name="tgl_akad" value="<?php echo $tgl_akad ;?>" required>
                                <?php
                                    if(isset($_SESSION['etgl_akad'])){
                                        $etgl_akad = $_SESSION['etgl_akad'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$etgl_akad.'</div>';
                                        unset($_SESSION['etgl_akad']);
                                    }
                                ?>
                            <label for="tgl_akad">Tanggal Akad</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">check</i>
                            <input id="status" type="text" class="validate" name="status" value="<?php echo $status ;?>" required>
                                <?php
                                    if(isset($_SESSION['estatus'])){
                                        $estatus = $_SESSION['estatus'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$estatus.'</div>';
                                        unset($_SESSION['estatus']);
                                    }
                                ?>
                            <label for="status">Status</label>  
                        </div>
                    </div>
                    <!-- Row in form END -->

                    <div class="row">
                        <div class="col 6">
                            <button type="submit" name="submit" class="btn-large blue waves-effect waves-light">SIMPAN <i class="material-icons">done</i></button>
                        </div>
                        <div class="col 6">
                            <a href="?page=tja" class="btn-large deep-orange waves-effect waves-light">BATAL <i class="material-icons">clear</i></a>
                        </div>
                    </div>

                </form>
                <!-- Form END -->

            </div>
            <!-- Row form END -->

<?php
            
        }
    }
?>

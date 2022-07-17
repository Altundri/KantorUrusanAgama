<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_REQUEST['submit'])){

            //validasi form kosong
            if($_REQUEST['no_surat'] == "" || $_REQUEST['nama_suami'] == ""|| $_REQUEST['nama_istri'] == ""|| $_REQUEST['alamat'] == "" ){
                $_SESSION['errEmpty'] = 'ERROR! Semua form wajib diisi';
                echo '<script language="javascript">window.history.back();</script>';
            } else {
                $no_surat = $_REQUEST['no_surat'];
                $nama_suami = $_REQUEST['nama_suami'];
                $nama_istri = $_REQUEST['nama_istri'];
                $alamat = $_REQUEST['alamat'];
                $status = $_REQUEST['status'];
              
            }

             //jika form file kosong akan mengeksekusi script dibawah ini
             $id_surat = $_REQUEST['id_surat'];

             $query = mysqli_query($config, "UPDATE tbl_surat_pengantar SET no_surat='$no_surat',nama_suami='$nama_suami',nama_istri='$nama_istri',alamat='$alamat',status='$status' WHERE id_surat='$id_surat'");

             if($query == true){
             $_SESSION['succEdit'] = 'SUKSES! Data berhasil diupdate';
             header("Location: ./admin.php?page=tsm");
             die();
             } else {
             $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
             echo '<script language="javascript">window.history.back();</script>';
            }
            }
            
                                    else {

        $id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
        $query = mysqli_query($config, "SELECT id_surat, no_surat, nama_suami, nama_istri,alamat,status FROM tbl_surat_pengantar WHERE id_surat='$id_surat'");
        list($id_surat, $no_surat, $nama_suami,$nama_istri, $alamat, $status) = mysqli_fetch_array($query);

       ?>

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper blue-grey darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="#" class="judul"><i class="material-icons">edit</i> Edit Data Surat Pengantar</a></li>
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
                <form class="col s12" method="POST" action="?page=tsm&act=edit" enctype="multipart/form-data">

                    <!-- Row in form START -->
                    <div class="row">
                    <input type="hidden" name="id_surat" value="<?php echo $id_surat ;?>">    
                    
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
                            <input id="no_surat" type="text" class="validate" name="no_surat" value="<?php echo $no_surat ;?>" required>
                                <?php
                                    if(isset($_SESSION['eno_surat'])){
                                        $eno_surat = $_SESSION['eno_surat'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$eno_surat.'</div>';
                                        unset($_SESSION['eno_surat']);
                                    }
                                ?>
                            <label for="no_surat">Nomor Surat</label>
                        </div>  
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">place</i>
                            <input id="alamat" type="text" class="validate" name="alamat" value="<?php echo $alamat ;?>" required>
                                <?php
                                    if(isset($_SESSION['ealamat'])){
                                        $ealamat = $_SESSION['ealamat'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$ealamat.'</div>';
                                        unset($_SESSION['ealamat']);
                                    }
                                ?>
                            <label for="alamat">Alamat</label>
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
                            <a href="?page=tsm" class="btn-large deep-orange waves-effect waves-light">BATAL <i class="material-icons">clear</i></a>
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

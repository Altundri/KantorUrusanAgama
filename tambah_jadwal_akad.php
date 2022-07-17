<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_REQUEST['submit'])){

            //validasi form kosong
            if($_REQUEST['tgl_daftar'] == "" || $_REQUEST['no_daftar'] == "" || $_REQUEST['nama_suami'] == "" || $_REQUEST['nama_istri'] == "" || $_REQUEST['tgl_akad'] == "" || $_REQUEST['status'] == ""){
                $_SESSION['errEmpty'] = 'ERROR! Semua form wajib diisi';
                echo '<script language="javascript">window.history.back();</script>';
            } else {

                $tgl_daftar = $_REQUEST['tgl_daftar'];
                $no_daftar = $_REQUEST['no_daftar'];
                $nama_suami = $_REQUEST['nama_suami'];
                $nama_istri = $_REQUEST['nama_istri'];
                $tgl_akad = $_REQUEST['tgl_akad'];
                $status = $_REQUEST['status'];
                
                //validasi input data
               $cek = mysqli_query($config, "SELECT * FROM tbl_jadwal_akad");
               $result = mysqli_num_rows($cek);
            
               

                        
                $query = mysqli_query($config, "INSERT INTO tbl_jadwal_akad(tgl_daftar,no_daftar,nama_suami,nama_istri,tgl_akad,status)
                VALUES('$tgl_daftar','$no_daftar','$nama_suami','$nama_istri','$tgl_akad','$status')");

                if($query == true){
                    echo "<script>alert('Sukses ! , Data Berhasil Ditambahkan! ');
                    window.location.href ='./admin.php?page=tja';</script>";
                    die();
                } else {
                    echo "<script>alert('Error , Ada Masalah dengan Query! ');
    		        window.location.href ='./admin.php?page=tja';</script>";
                    }
                                                    
                 
                 
            }
            }else {?>

            <!-- Row Start -->
            <div class="row">
                <!-- Secondary Nav START -->
                <div class="col s12">
                    <nav class="secondary-nav">
                        <div class="nav-wrapper blue-grey darken-1">
                            <ul class="left">
                                <li class="waves-effect waves-light"><a href="?page=tja&act=add" class="judul"><i class="material-icons">mail</i> Tambah Jadwal Akad</a></li>
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
                <form class="col s12" method="POST" action="?page=tja&act=add" enctype="multipart/form-data">

                    <!-- Row in form START -->
                    <div class="row">
                        
                    <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input id="tgl_daftar" type="date" name="tgl_daftar" class="datepicker" required>
                                <?php
                                    if(isset($_SESSION['tgl_daftar'])){
                                        $tgl_daftark = $_SESSION['tgl_daftar'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$tgl_daftar.'</div>';
                                        unset($_SESSION['tgl_daftar']);
                                    }
                                ?>
                            <label for="tgl_daftar">Tanggal Pendaftaran</label>
                        </div>

                    <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">looks_two</i>
                            <input id="no_daftar" type="text" class="validate" name="no_daftar" required>
                                <?php
                                    if(isset($_SESSION['no_daftar'])){
                                        $no_daftar = $_SESSION['no_daftar'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$no_daftar.'</div>';
                                        unset($_SESSION['no_daftar']);
                                    }
                                ?>
                            <label for="nama_istri">Nomor daftar </label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="nama_suami" type="text" class="validate" name="nama_suami" required>
                                <?php
                                    if(isset($_SESSION['nama_suami'])){
                                        $nama_suami = $_SESSION['nama_suami'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$nama_suami.'</div>';
                                        unset($_SESSION['nama_suami']);
                                    }
                                ?>
                            <label for="nama_suami">Nama Suami</label>
                        </div>
                        
                        
                        
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="nama_istri" type="text" class="validate" name="nama_istri" required>
                                <?php
                                    if(isset($_SESSION['nama_istri'])){
                                        $nama_istri = $_SESSION['nama_istri'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$nama_istri.'</div>';
                                        unset($_SESSION['nama_istri']);
                                    }
                                ?>
                            <label for="nama_istri">Nama Istri </label>
                        </div>
                        
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input id="tgl_akad" type="text" name="tgl_akad" class="datepicker" required>
                                <?php
                                    if(isset($_SESSION['tgl_akad'])){
                                        $tgl_akadk = $_SESSION['tgl_akad'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$tgl_akad.'</div>';
                                        unset($_SESSION['tgl_akad']);
                                    }
                                ?>
                            <label for="tgl_akad">Tanggal Akad</label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">place</i>
                            <input id="status" type="text" class="validate" name="status" required>
                                <?php
                                    if(isset($_SESSION['status'])){
                                        $status = $_SESSION['status'];
                                        echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$status.'</div>';
                                        unset($_SESSION['status']);
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

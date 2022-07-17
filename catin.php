<?php
    ob_start();
    //cek session
    session_start();

    if(empty($_SESSION['id_catin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ../catin.php");
        die();
    } else {
?>

<!doctype html>
<html lang="en">

<!-- Include Head START -->
<?php include('include/head.php'); ?>
<!-- Include Head END -->

<!-- Body START -->
<body class="bg">

<!-- Header START -->
<header>

<!-- Include Navigation START -->
<?php include('include/menu.php'); ?>
<!-- Include Navigation END -->

</header>
<!-- Header END -->

<!-- Main START -->
<main>

    <!-- container START -->
    <div class="container">

    <?php
        if(isset($_REQUEST['page'])){
            $page = $_REQUEST['page'];
            switch ($page) {
                case 'tsm':
                    include "transaksi_surat_pengantar.php";
                    break;
                case 'ctk':
                    include "cetak_pengantar.php";
                    break;
                case 'tsk':
                    include "transaksi_form_kesehatan.php";
                    break;
                case 'asm':
                    include "laporan_surat_pengantar.php";
                    break;
                case 'ask':
                    include "laporan_form_kesehatan.php";
                    break;
                case 'ref':
                    include "data_catin.php";
                    break;
                case 'sett':
                    include "pengaturan.php";
                    break;
                case 'pro':
                    include "profil.php";
                    break;
                
            }
        } else {
    ?>
        <!-- Row START -->
        <div class="row">

            <!-- Include Header Instansi START -->
            <?php include('include/header_instansi.php'); ?>
            <!-- Include Header Instansi END -->

            <!-- Welcome Message START -->
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <h4>Selamat Datang <?php echo $_SESSION['nama_suami']; ?></h4>
                        <p class="description">Anda login sebagai <strong>Calon Pengantin</strong>. 
                        
                    </div>
                </div>
            </div>
            <!-- Welcome Message END -->

            

        </div>
        <?php
        $id_catin = $_SESSION['id_catin'];
        $query = mysqli_query($config, "SELECT * FROM tbl_catin WHERE id_catin='$id_catin'");
        $data = mysqli_fetch_array($query);
        ?>
        <!-- Row END -->
        <div class="row jarak-form">

                    <!-- Form START -->
                    <form class="col s12" method="POST" action="?page=tsk&act=detail" enctype="multipart/form-data">

                        <!-- Row in form START -->
                        <div class="row">
                        <h3>Form Data Calon Suami</h3>
                        
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input id="nama_suami" type="text" class="validate" name="nama_suami" value="<?php echo $data['nama_suami'] ;?>" readonly>
                            <label for="nama_suami">Nama suami</label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input  type="text" class="datepicker" value="<?php echo $data['ttl_suami'] ;?>" readonly>
                            <label for="tgl_surat">Tanggal Lahir</label>
                        </div>
                        
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">place</i>
                            <input type="text" class="validate" value="<?php echo $data['alamat_suami'] ;?>" readonly>
                            <label for="alamat_suami">Alamat suami</label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">work</i>
                            <input  type="text" class="validate" value="<?php echo $data['pekerjaan_suami'] ;?>" readonly>
                            <label for="pekerjaan_suami">Pekerjaan suami</label>
                        </div>

                        <div class="input-field col">
                        <i class="material-icons prefix md-prefix">image</i>
                        </div>
                        <div class="input-field col s6">
                        
                            <img class="foto" src="upload/<?php echo $data['foto_suami']; ?>"/>
                        </div>
                       
                </div>
                        <div class="row">
                        <h3>Form Data Calon Istri</h3>

                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input  type="text" class="validate" value="<?php echo $data['nama_istri'] ;?>" readonly>
                            <label for="nama_istri">Nama Istri</label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">date_range</i>
                            <input  type="text" class="datepicker" value="<?php echo $data['ttl_istri'] ;?>" readonly>
                            <label for="ttl_istri">Tanggal Lahir</label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">place</i>
                            <input type="text" class="validate" value="<?php echo $data['alamat_istri'] ;?>" readonly>
                            <label for="alamat_suami">Alamat Istri</label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">work</i>
                            <input  type="text" class="validate" value="<?php echo $data['pekerjaan_istri'] ;?>" readonly>
                            <label for="pekerjaan_suami">Pekerjaan Istri</label>
                        </div>

                        <div class="input-field col">
                        <i class="material-icons prefix md-prefix">image</i>
                        </div>
                        <div class="input-field col s6">
                        
                            <img class="foto" src="upload/<?php echo $data['foto_istri']; ?>"/>
                        </div>

                        
                </div>
                
                <div class="row">
                <h3>Keterangan</h3>
                
                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">person</i>
                            <input  type="text" class="validate"  value="<?php echo $data['username_catin'] ;?>" readonly>
                            <label>Username </label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">mail</i>
                            <input  type="text" class="validate"  value="<?php echo $data['email_catin'] ;?>" readonly>
                            <label>Email </label>
                        </div>

                        <div class="input-field col s6">
                            <i class="material-icons prefix md-prefix">call</i>
                            <input  type="text" class="validate"  value="<?php echo $data['nohp_catin'] ;?>" readonly>
                            <label>No. Handphone </label>
                        </div>

                        
                    </div>
                        <!-- Row in form END -->
    <?php
        }
    ?>
    </div>
    <!-- container END -->

</main>
<!-- Main END -->

<!-- Include Footer START -->
<?php include('include/footer.php'); ?>
<!-- Include Footer END -->

</body>
<!-- Body END -->

</html>

<?php
    }
?>

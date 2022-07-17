<?php
    ob_start();
    //cek session
    session_start();

    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ../admin.php");
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
                case 'tja':
                    include "transaksi_jadwal_akad.php";
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
                        <h4>Selamat Datang <?php echo $_SESSION['nama']; ?></h4>
                        <p class="description">Anda login sebagai
                        <?php
                            if($_SESSION['admin'] == 1){
                                echo "<strong>Super Admin</strong>. Anda memiliki akses penuh terhadap sistem.";
                            } elseif($_SESSION['admin'] == 2){
                                echo "<strong>Administrator KUA</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                            } else {
                                echo "<strong>Administrator Puskesmas</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
                            }?></p>
                    </div>
                </div>
            </div>
            <!-- Welcome Message END -->

            <?php
                //menghitung jumlah Surat Pengantar
                $count1 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_surat_pengantar"));

                //menghitung jumlah Surat Pengantar
                $count2 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_form_kesehatan"));

                //menghitung jumlah jadwal akad
                $count3 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_jadwal_akad"));

                //menghitung jumlah calon pengantin
                $count4 = mysqli_num_rows(mysqli_query($config, "SELECT * FROM tbl_catin"));

            ?>

            <!-- Info Statistic START -->
            <div class="col s12 m4">
                <div class="card cyan">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">mail</i> Jumlah Surat Pengantar</span>
                        <?php echo '<h5 class="white-text link">'.$count1.' Surat Pengantar</h5>'; ?>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card lime darken-1">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">drafts</i> Jumlah Form Kesehatan</span>
                        <?php echo '<h5 class="white-text link">'.$count2.' Form Kesehatan</h5>'; ?>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card deep-orange">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">list</i> Jumlah Jadwal Akad</span>
                        <?php echo '<h5 class="white-text link">'.$count3.' Jadwal Akad</h5>'; ?>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card deep-orange">
                    <div class="card-content">
                        <span class="card-title white-text"><i class="material-icons md-36">person</i> Jumlah Calon Pengantin</span>
                        <?php echo '<h5 class="white-text link">'.$count4.' Calon Pengantin</h5>'; ?>
                    </div>
                </div>
            </div>

    

        </div>
        <!-- Row END -->
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

<?php
    //cek session
    if(!empty($_SESSION['admin'])){
?>

<nav class="blue-grey darken-1">
    <div class="nav-wrapper">
        <a href="admin.php" class="brand-logo center hide-on-large-only"><img src="asset/img/logo_kua.png" alt="" width="50px" height="50px"> </a>
        <ul id="slide-out" class="side-nav" data-simplebar-direction="vertical">
            <li class="no-padding">
                <div class="logo-side center blue-grey darken-3">
                    <?php
                        $query = mysqli_query($config, "SELECT * FROM tbl_instansi");
                        while($data = mysqli_fetch_array($query)){
                            if(!empty($data['logo'])){
                                echo '<img class="logoside" src="./upload/'.$data['logo'].'"/>';
                            } else {
                                echo '<img class="logoside" src="./asset/img/logo.png"/>';
                            }
                            if(!empty($data['nama'])){
                                echo '<h5 class="smk-side">'.$data['nama'].'</h5>';
                            } else {
                                echo '<h5 class="smk-side">Kantor Urusan Agama Kecamatan Way Tuba</h5>';
                            }
                            if(!empty($data['alamat'])){
                                echo '<p class="description-side">'.$data['alamat'].'</p>';
                            } else {
                                echo '<p class="description-side">Jl. Jend. Rya Cudu No. 461 Kp. Way Tuba Kec. Way Tuba Kab. Way Kanan Prov. Lampung</p>';
                            }
                        }
                    ?>
                </div>
            </li>
            <li class="no-padding blue-grey darken-4">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">account_circle</i><?php echo $_SESSION['nama']; ?></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=pro">Profil</a></li>
                                <li><a href="?page=pro&sub=pass">Ubah Password</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li><a href="../admin.php"><i class="material-icons middle">dashboard</i> Beranda</a></li>
            <li class="no-padding">
            <?php
                if($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2 || $_SESSION['admin'] == 3){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="transaksi">Transaksi Surat <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='transaksi' class='dropdown-content'>
                    <li><a href="?page=tsm">Surat Pengantar</a></li>
                    <li><a href="?page=tsk">Form Kesehatan</a></li>
                    <li><a href="?page=tja">Jadwal Akad</a></li>
                </ul>
            <?php
                }
            ?>
            
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">assignment</i> Buku Laporan</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=asm">Surat Pengantar</a></li>
                                <li><a href="?page=ask">Form Kesehatan</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            
            <?php
                if($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2 ){ ?>
            <li><a href="?page=ref">Data Catin</a></li>
            <?php
                }
            ?>
            <?php
                if($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2 ){ ?>
            <li><a href="?page=tja">Jadwal Akad</a></li> 
            <?php
                }
            ?>

            <li class="no-padding">
            <?php
                if($_SESSION['admin'] == 1){ ?>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">settings</i> Pengaturan</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=sett">Instansi</a></li>
                                <li><a href="?page=sett&sub=usr">User</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            <?php
                }
            ?>
            
            </li>
        </ul>
        <!-- Menu on medium and small screen END -->

        <!-- Menu on large screen START -->
        <ul class="center hide-on-med-and-down" id="nv">
            <li><a href="admin.php" class="ams hide-on-med-and-down"><img src="asset/img/logo_kua.png" alt="" width="50px" height="50px">  </a></li>
            <li><div class="grs"></></li>
            <li><a href="admin.php"><i class="material-icons"></i>&nbsp; Beranda</a></li>
            <?php
                if($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2 || $_SESSION['admin'] == 3){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="transaksi">Transaksi Surat <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='transaksi' class='dropdown-content'>
                    <li><a href="?page=tsm">Surat Pengantar</a></li>
                    <li><a href="?page=tsk">Form Kesehatan</a></li>
                </ul>
            <?php
                }
            ?>
            
            <li><a class="dropdown-button" href="#!" data-activates="agenda">Laporan<i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='agenda' class='dropdown-content'>
                    <li><a href="?page=asm">Surat Pengantar</a></li>
                    <li><a href="?page=ask">Form Kesehatan</a></li>
                </ul>
            <?php
                if($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2 ){ ?>
            <li><a href="?page=ref">Data Catin</a></li>
            <?php
                }
            ?>
            <?php
                if($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2 ){ ?>
            <li><a href="?page=tja">Jadwal Akad</a></li> 
            <?php
                }
            ?>
            <?php
                if($_SESSION['admin'] == 1){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="pengaturan">Pengaturan <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='pengaturan' class='dropdown-content'>
                    <li><a href="?page=sett">Instansi</a></li>
                    <li><a href="?page=sett&sub=usr">User</a></li>
                </ul>
            <?php
                }
            ?>
            
            <li class="right" style="margin-right: 10px;"><a class="dropdown-button" href="#!" data-activates="logout"><i class="material-icons">account_circle</i> <?php echo $_SESSION['nama']; ?><i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='logout' class='dropdown-content'>
                    <li><a href="?page=pro">Profil</a></li>
                    <li><a href="?page=pro&sub=pass">Ubah Password</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="material-icons">settings_power</i> Logout</a></li>
                </ul>
        </ul>
        <!-- Menu on large screen END -->
        <a href="#" data-activates="slide-out" class="button-collapse" id="menu"><i class="material-icons">menu</i></a>
    </div>
</nav>

<?php
    } else {
     ?>   

<nav class="blue-grey darken-1">
<div class="nav-wrapper">
    <a href="catin.php" class="brand-logo center hide-on-large-only"><img src="asset/img/logo_kua.png" alt="" width="50px" height="50px"> </a>
    <ul id="slide-out" class="side-nav" data-simplebar-direction="vertical">
        <li class="no-padding">
            <div class="logo-side center blue-grey darken-3">
                <?php
                    $query = mysqli_query($config, "SELECT * FROM tbl_instansi");
                    while($data = mysqli_fetch_array($query)){
                        if(!empty($data['logo'])){
                            echo '<img class="logoside" src="./upload/'.$data['logo'].'"/>';
                        } else {
                            echo '<img class="logoside" src="./asset/img/logo.png"/>';
                        }
                        if(!empty($data['nama'])){
                            echo '<h5 class="smk-side">'.$data['nama'].'</h5>';
                        } else {
                            echo '<h5 class="smk-side">Kantor Urusan Agama Kecamatan Way Tuba</h5>';
                        }
                        if(!empty($data['alamat'])){
                            echo '<p class="description-side">'.$data['alamat'].'</p>';
                        } else {
                            echo '<p class="description-side">Jl. Jend. Rya Cudu No. 461 Kp. Way Tuba Kec. Way Tuba Kab. Way Kanan Prov. Lampung</p>';
                        }
                    }
                ?>
            </div>
        </li>
        <li class="no-padding blue-grey darken-4">
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a class="collapsible-header"><i class="material-icons">account_circle</i><?php echo $_SESSION['nama_suami']; ?></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        
    </ul>
    <!-- Menu on medium and small screen END -->

    <!-- Menu on large screen START -->
    <ul class="center hide-on-med-and-down" id="nv">
        <li><a href="catin.php" class="ams hide-on-med-and-down"><img src="asset/img/logo_kua.png" alt="" width="50px" height="50px">  </a></li>
        <li><div class="grs"></></li>
        <li><a href="catin.php"><i class="material-icons"></i>&nbsp; Beranda</a></li>
       
        
        <li class="right" style="margin-right: 10px;"><a class="dropdown-button" href="#!" data-activates="logout"><i class="material-icons">account_circle</i> <?php echo $_SESSION['nama_suami']; ?><i class="material-icons md-18">arrow_drop_down</i></a></li>
            <ul id='logout' class='dropdown-content'>
               
                <li><a href="logout.php"><i class="material-icons">settings_power</i> Logout</a></li>
            </ul>
    </ul>
    <!-- Menu on large screen END -->
    <a href="#" data-activates="slide-out" class="button-collapse" id="menu"><i class="material-icons">menu</i></a>
</div>
</nav>
<?php
    }
?>

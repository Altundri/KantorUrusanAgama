<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_REQUEST['act'])){
            $act = $_REQUEST['act'];
            switch ($act) {
                case 'add':
                    include "tambah_catin.php";
                    break;
                case 'edit':
                    include "edit_catin.php";
                    break;
                case 'del':
                    include "hapus_catin.php";
                    break;
                case 'imp':
                    include "upload_data_catin.php";
                    break;
            }
        } else {

            $query = mysqli_query($config, "SELECT data_catin FROM tbl_sett");
            list($data_catin) = mysqli_fetch_array($query);

            //pagging
            $limit = $data_catin;
            $pg = @$_GET['pg'];
                if(empty($pg)){
                    $curr = 0;
                    $pg = 1;
                } else {
                    $curr = ($pg - 1) * $limit;
                }

                echo '<!-- Row Start -->
                <div class="row">
                    <!-- Secondary Nav START -->
                    <div class="col s12">
                        <div class="z-depth-1">
                            <nav class="secondary-nav">
                                <div class="nav-wrapper blue-grey darken-1">
                                    <div class="col m7">
                                        <ul class="left">
                                            <li class="waves-effect waves-light hide-on-small-only"><a href="?page=ref" class="judul"><i class="material-icons">class</i> Data Calon Pengantin</a></li>';
                                             echo '
                                        </ul>
                                    </div>
                                    <div class="col m5 hide-on-med-and-down">
                                        <form method="post" action="?page=ref">
                                            <div class="input-field round-in-box">
                                                <input id="search" type="search" name="cari" placeholder="Ketik dan tekan enter mencari data..." required>
                                                <label for="search"><i class="material-icons">search</i></label>
                                                <input type="submit" name="submit" class="hidden">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- Secondary Nav END -->
                </div>
                <!-- Row END -->';

                if(isset($_SESSION['succAdd'])){
                    $succAdd = $_SESSION['succAdd'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card green lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title green-text"><i class="material-icons md-36">done</i> '.$succAdd.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['succAdd']);
                }
                if(isset($_SESSION['succEdit'])){
                    $succEdit = $_SESSION['succEdit'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card green lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title green-text"><i class="material-icons md-36">done</i> '.$succEdit.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['succEdit']);
                }
                if(isset($_SESSION['succDel'])){
                    $succDel = $_SESSION['succDel'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card green lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title green-text"><i class="material-icons md-36">done</i> '.$succDel.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['succDel']);
                }
                if(isset($_SESSION['succUpload'])){
                    $succUpload = $_SESSION['succUpload'];
                    echo '<div id="alert-message" class="row">
                            <div class="col m12">
                                <div class="card green lighten-5">
                                    <div class="card-content notif">
                                        <span class="card-title green-text"><i class="material-icons md-36">done</i> '.$succUpload.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    unset($_SESSION['succUpload']);
                }

                echo '
                <!-- Row form Start -->
                <div class="row jarak-form">';

                if(isset($_REQUEST['submit'])){
                $cari = mysqli_real_escape_string($config, $_REQUEST['cari']);
                    echo '
                    <div class="col s12" style="margin-top: -18px;">
                        <div class="card blue lighten-5">
                            <div class="card-content">
                                <p class="description">Hasil pencarian untuk kata kunci <strong>"'.stripslashes($cari).'"</strong><span class="right"><a href="?page=ref"><i class="material-icons md-36" style="color: #333;">clear</i></a></span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col m12" id="colres">
                        <table class="bordered" id="tbl">
                            <thead class="blue lighten-4" id="head">
                                <tr>
                                <th width="10%">Id</th>
                                <th width="20%">Nama Calon Suami<br/><hr/> Nama Calon Istri</th>
                                <th width="20%">Tanggal Lahir</th>
                                <th width="15%">Pekerjaan</th>
                                <th width="20%">Alamat</th>
                                <th width="15%">Foto</th>
                                </tr>
                            </thead>
                            <tbody>';

                            //script untuk menampilkan data
                            $query = mysqli_query($config, "SELECT * FROM tbl_catin WHERE nama_suami LIKE '%$cari%' ORDER BY id_catin DESC LIMIT 15");
                            if(mysqli_num_rows($query) > 0){
                                while($row = mysqli_fetch_array($query)){
                                echo '
                                <tr>
                                    <td>'.$row['id_catin'].'</td>
                                    <td>'.$row['nama_suami'].'<br/><hr/>'.$row['nama_istri'].'</td>
                                    <td>'.$row['ttl_suami'].'<br/><hr/>'.$row['ttl_istri'].'</td>
                                    <td>'.$row['pekerjaan_suami'].'<br/><hr/>'.$row['pekerjaan_istri'].'</td>
                                    <td>'.$row['alamat_suami'].'<br/><hr/>'.$row['alamat_istri'].'</td>
                                    <td>'.$row['foto_suami'].'<br/><hr/>'.$row['foto_istri'].'</td>
                                </tr>';
                                }
                            } else {
                                echo '<tr><td colspan="5"><center><p class="add">Tidak ada data yang ditemukan</p></center></td></tr>';
                            }
                          echo '</tbody></table><br/><br/>
                            </div>
                        </div>
                        <!-- Row form END -->';

                    } else {

                        echo '<div class="col m12" id="colres">
                                <table class="bordered" id="tbl">
                                    <thead class="blue lighten-4" id="head">
                                        <tr>
                                        <th width="10%">Id</th>
                                        <th width="20%">Nama Calon Suami<br/><hr/> Nama Calon Istri</th>
                                        <th width="20%">Tanggal Lahir</th>
                                        <th width="15%">Pekerjaan</th>
                                        <th width="20%">Alamat</th>
                                        <th width="15%">Foto</th>

                                                <div id="modal" class="modal">
                                                    <div class="modal-content white">
                                                        <h5>Jumlah data yang ditampilkan per halaman</h5>';
                                                        $query = mysqli_query($config, "SELECT id_sett,data_catin FROM tbl_sett");
                                                        list($id_sett,$data_catin) = mysqli_fetch_array($query);
                                                        echo '
                                                        <div class="row">
                                                            <form method="post" action="">
                                                                <div class="input-field col s12">
                                                                    <input type="hidden" value="'.$id_sett.'" name="id_sett">
                                                                    <div class="input-field col s1" style="float: left;">
                                                                        <i class="material-icons prefix md-prefix">looks_one</i>
                                                                    </div>
                                                                    <div class="input-field col s11 right" style="margin: -5px 0 20px;">
                                                                        <select class="browser-default validate" name="data_catin" required>
                                                                            <option value="'.$data_catin.'">'.$data_catin.'</option>
                                                                            <option value="5">5</option>
                                                                            <option value="10">10</option>
                                                                            <option value="20">20</option>
                                                                            <option value="50">50</option>
                                                                            <option value="100">100</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="modal-footer white">
                                                                        <button type="submit" class="modal-action waves-effect waves-green btn-flat" name="simpan">Simpan</button>';
                                                                        if(isset($_REQUEST['simpan'])){
                                                                            $id_sett = "1";
                                                                            $data_catin = $_REQUEST['data_catin'];                                                                    $id_user = $_SESSION['id_user'];

                                                                            $query = mysqli_query($config, "UPDATE tbl_sett SET data_catin='$data_catin',id_user='$id_user' WHERE id_sett='$id_sett'");
                                                                            if($query == true){
                                                                                header("Location: ./admin.php?page=ref");
                                                                                die();
                                                                            }
                                                                        } echo '
                                                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Batal</a>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                        </tr>
                                    </thead>
                                    <tbody>';

                                    //script untuk menampilkan data
                                    $query = mysqli_query($config, "SELECT * FROM tbl_catin ORDER BY id_catin DESC LIMIT $curr, $limit");
                                    if(mysqli_num_rows($query) > 0){
                                        while($row = mysqli_fetch_array($query)){
                                          echo '
                                          <tr>
                                                <td>'.$row['id_catin'].'</td>
                                                <td>'.$row['nama_suami'].'<br/><hr/>'.$row['nama_istri'].'</td>
                                                <td>'.$row['ttl_suami'].'<br/><hr/>'.$row['ttl_istri'].'</td>
                                                <td>'.$row['pekerjaan_suami'].'<br/><hr/>'.$row['pekerjaan_istri'].'</td>
                                                <td>'.$row['alamat_suami'].'<br/><hr/>'.$row['alamat_istri'].'</td>
                                                <td> <img src="upload/'.$row['foto_suami'].'" width="80" height="80"/><br/><hr/><img src="upload/'.$row['foto_istri'].'" width="80" height="80"/></td>
                                                
                                            </tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="5"><center><p class="add">Tidak ada data yang ditemukan. <u><a href="?page=ref&act=add">Tambah data baru</a></u></p></center></td></tr>';
                                    }
                                  echo '</tbody></table><br/><br/>
                            </div>
                        </div>
                        <!-- Row form END -->';

                        $query = mysqli_query($config, "SELECT * FROM tbl_catin");
                        $cdata = mysqli_num_rows($query);
                        $cpg = ceil($cdata/$limit);

                        echo '<!-- Pagination START -->
                              <ul class="pagination">';

                        if($cdata > $limit ){

                            //first and previous pagging
                            if($pg > 1){
                                $prev = $pg - 1;
                                echo '<li><a href="?page=ref&pg=1"><i class="material-icons md-48">first_page</i></a></li>
                                      <li><a href="?page=ref&pg='.$prev.'"><i class="material-icons md-48">chevron_left</i></a></li>';
                            } else {
                                echo '<li class="disabled"><a href="#"><i class="material-icons md-48">first_page</i></a></li>
                                      <li class="disabled"><a href="#"><i class="material-icons md-48">chevron_left</i></a></li>';
                            }

                            for ($i = 1; $i <= $cpg; $i++) {
                                if ((($i >= $pg - 3) && ($i <= $pg + 3)) || ($i == 1) || ($i == $cpg)) {
                                    if ($i == $pg) echo '<li class="active waves-effect waves-dark"><a href="?page=ref&pg='.$i.'"> '.$i.' </a></li>';
                                    else echo '<li class="waves-effect waves-dark"><a href="?page=ref&pg='.$i.'"> '.$i.' </a></li>';
                                }
                            }

                            //last and next pagging
                            if($pg < $cpg){
                                $next = $pg + 1;
                                echo '<li><a href="?page=ref&pg='.$next.'"><i class="material-icons md-48">chevron_right</i></a></li>
                                      <li><a href="?page=ref&pg='.$cpg.'"><i class="material-icons md-48">last_page</i></a></li>';
                            } else {
                                echo '<li class="disabled"><a href="#"><i class="material-icons md-48">chevron_right</i></a></li>
                                      <li class="disabled"><a href="#"><i class="material-icons md-48">last_page</i></a></li>';
                            }
                            echo '
                            </ul>';
                    } else {
                        echo '';
                    }
            }
        }
    }
?>

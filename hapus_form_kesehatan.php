<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if(isset($_SESSION['errQ'])){
            $errQ = $_SESSION['errQ'];
            echo '<div id="alert-message" class="row jarak-card">
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

    	$id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
    	$query = mysqli_query($config, "SELECT * FROM tbl_form_kesehatan WHERE id_surat='$id_surat'");

    	if(mysqli_num_rows($query) > 0){
            $no = 1;
            while($row = mysqli_fetch_array($query)){

            if($_SESSION['id_user'] != $row['id_user'] AND $_SESSION['id_user'] != 1){
                echo '<script language="javascript">
                        window.alert("ERROR! Anda tidak memiliki hak akses untuk menghapus data ini");
                        window.location.href="./admin.php?page=tsk";
                      </script>';
            } else {

    		  echo '<!-- Row form Start -->
				<div class="row jarak-card">
				    <div class="col m12">
                        <div class="card">
                            <div class="card-content">
        				        <table>
        				            <thead class="red lighten-5 red-text">
        				                <div class="confir red-text"><i class="material-icons md-36">error_outline</i>
        				                Apakah Anda yakin akan menghapus data ini?</div>
        				            </thead>

        				            <tbody>
        				                <tr>
        				                    <td width="20%">Id Surat</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['id_surat'].'</td>
        				                </tr>
        				                <tr>
        				                    <td width="20%">Id User</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['id_user'].'</td>
        				                </tr>
        				                <tr>
        				                    <td width="20%">No. Surat</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['no_surat'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%" colspan="3"> <center><h3>Data Calon Istri<h3> </td>
        				                </tr>
        				                <tr>
        				                    <td width="20%">Nama Istri </td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['nama_istri'].'</td>
        				                </tr>
        				                <tr>
        				                    <td width="20%">Umur Istri</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['umur_istri'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Pekerjaan Istri</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['pekerjaan_istri'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Alamat Istri</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['alamat_istri'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Berat Badan</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['bb_istri'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Tinggi Badan</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['tb_istri'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">LILA </td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['lila_istri'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">TD</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['td_istri'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Hemoglobin</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['hb_istri'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Golongan Darah</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['darah_istri'].'</td>
        				                </tr>
                                        <tr>
                                        <td width="20%" colspan="3"> <center><h3>Data Calon Suami<h3> </td>
                                    </tr>
                                        <tr>
        				                    <td width="20%">Nama Suami</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['nama_suami'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Umur Suami</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['umur_suami'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Pekerjaan Suami</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['pekerjaan_suami'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Alamat Suami</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['alamat_suami'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Berat Badan</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['bb_suami'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Tinggi Badan</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['tb_suami'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">TD</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['td_suami'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Hemoglobin </td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['hb_suami'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Golongan Darah</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['darah_suami'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Screening Imunisasi</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['screening_imunisasi'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Tindakan</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['tindakan'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Pemeriksaan Kesehatan dan dinyatakan</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['pernyataan'].'</td>
        				                </tr>
                                        <tr>
        				                    <td width="20%">Pelaksana Konseling</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['pelaksana'].'</td>
        				                </tr>
        				                <tr>
        				                    <td width="20%">Tanggal Surat</td>
        				                    <td width="1%">:</td>
        				                    <td width="86%">'.$row['tgl_surat'].'</td>
        				                </tr>
                                        <tr>
                                            <td width="20%">Status</td>
                                            <td width="1%">:</td>
                                            <td width="86%">'.$row['status'].'</td>
                                        </tr>
        				            </tbody>
    				   		    </table>
				            </div>
                            <div class="card-action">
        		                <a href="?page=tsk&act=del&submit=yes&id_surat='.$row['id_surat'].'" class="btn-large deep-orange waves-effect waves-light white-text">HAPUS <i class="material-icons">delete</i></a>
        		                <a href="?page=tsk" class="btn-large blue waves-effect waves-light white-text">BATAL <i class="material-icons">clear</i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row form END -->';

            	if(isset($_REQUEST['submit'])){
            		$id_surat = $_REQUEST['id_surat'];

                    
                        $query = mysqli_query($config, "DELETE FROM tbl_form_kesehatan WHERE id_surat='$id_surat'");

                        if($query == true){
                            $_SESSION['succDel'] = 'SUKSES! Data berhasil dihapus<br/>';
                            header("Location: ./admin.php?page=tsk");
                            die();
                        } else {
                            $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                            echo '<script language="javascript">
                                    window.location.href="./admin.php?page=tsk&act=del&id_surat='.$id_surat.'";
                                  </script>';
                        }
                    
                }
		    }
	    }
    }
}
?>

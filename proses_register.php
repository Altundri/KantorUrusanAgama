<?php 
require_once 'include/config.php';
$config = mysqli_connect($host, $username, $password, $database);


            $id_catin = $_POST['id_catin'];
            $nama_suami = $_POST['nama_suami'];
            $ttl_suami = $_POST['ttl_suami'];
            $alamat_suami = $_POST['alamat_suami'];
            $pekerjaan_suami = $_POST['pekerjaan_suami'];

            $nama_istri = $_POST['nama_istri'];
            $ttl_istri = $_POST['ttl_istri'];
            $alamat_istri = $_POST['alamat_istri'];
            $pekerjaan_istri = $_POST['pekerjaan_istri'];

            $username_catin = $_POST['username_catin'];
            $email_catin = $_POST['email_catin'];
            $nohp_catin = $_POST['nohp_catin'];
            $pass_catin = $_POST['pass_catin'];
            
            $foto_suami = $_FILES['foto_suami']['name'];
            $foto_istri = $_FILES['foto_istri']['name'];

            $tmp_foto_suami = $_FILES['foto_suami']['tmp_name'];
            $tmp_foto_istri = $_FILES['foto_istri']['tmp_name'];

            $uk_foto = $_FILES['foto_suami']['size'];
            $uk_foto2 = $_FILES['foto_istri']['size'];

            $type_foto = $_FILES['foto_suami']['type'];
            $type_foto2 = $_FILES['foto_istri']['type'];

            // echo var_dump($_FILES);
            // die();


              if ($uk_foto > 2000000) {
                die("File tidak boleh lebih dari 2MB");
              }

              if ($uk_foto2 > 2000000) {
                die("File tidak boleh lebih dari 2MB");
              }

              if ($type_foto != 'image/jpeg') {
                die("File foto harus jpeg!");
              }

              if ($type_foto2 != 'image/jpeg') {
                die("File foto harus jpeg!");
              }

              $uploadFotoSukses = move_uploaded_file(
                $tmp_foto_suami, "upload/$foto_suami"
              );
              
              $uploadFotoSukses2 = move_uploaded_file(
                $tmp_foto_istri, "upload/$foto_istri"
              );
            

            $cek = mysqli_query($config, "SELECT * FROM tbl_catin WHERE username_catin='$username_catin'");
            $result = mysqli_num_rows($cek);
                           
            if($result > 0){
                echo "<script>alert('Username sudah terpakai! , gunakan yang lain ');
    		    window.location.href ='register.php';</script>";
            } else {

                if(strlen($username_catin) < 5){
                    echo "<script>alert('Username minimal 5 karakter! ');
    		    window.location.href ='register.php';</script>";
                } else {

                    if(strlen($pass_catin) < 5){
                        echo "<script>alert('Password minimal 5 karakter! ');
    		            window.location.href ='register.php';</script>";
                    } else {

            $query = mysqli_query($config, "INSERT INTO tbl_catin(id_catin,nama_suami,ttl_suami,alamat_suami,pekerjaan_suami,foto_suami,nama_istri,ttl_istri,alamat_istri,pekerjaan_istri,foto_istri,username_catin,email_catin,nohp_catin,pass_catin) VALUES('$id_catin','$nama_suami','$ttl_suami','$alamat_suami','$pekerjaan_suami','$foto_suami','$nama_istri','$ttl_istri','$alamat_istri','$pekerjaan_istri','$foto_istri','$username_catin','$email_catin','$nohp_catin',MD5('$pass_catin'))");
                                       
            if($query != false){
            echo "<script>alert('User Berhasil Ditambahkan! ');
    		window.location.href ='index.php';</script>";
            die();
            } else {
            echo "<script>alert('Error , Ada Masalah dengan Query! ');
    		window.location.href ='register.php';</script>";
                }
            }  
        }
    }             


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <script src="https://kit.fontawesome.com/dc1e769554.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/materialize.css">
    <script type="text/javascript" src="asset/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="asset/js/materialize.min.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="asset/js/jquery.autocomplete.min.js"></script>
    <script data-pace-options='{ "ajax": false }' src='asset/js/pace.min.js'></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    
  <div class="container">
    <div class="button2">
          <a href="index.php"><i class="fa-solid fa-circle-chevron-left"></i> Kembali Ke Halaman Utama</a>
    </div>
    <div class="title">Registrasi</div>
    <div class="content">
      <form action="proses_register.php" method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
          <input type="hidden" name="id_catin" >
            <span class="details">Nama Calon Suami</span>
            <input type="text" name="nama_suami" placeholder="Masukkan Nama Calon Suami" required>
          </div>
          <div class="input-box">
            <span class="details">Nama Calon Istri</span>
            <input type="text" name="nama_istri" placeholder="Masukkan Nama Calon Istri" required>
          </div>
          <div class="input-box">
            <span class="details">TTL</span>
            <input type="date"  name="ttl_suami" required>
          </div>
          <div class="input-box">
            <span class="details">TTL</span>
            <input type="date" name="ttl_istri" required>
          </div>
          <div class="input-box">
            <span class="details">Alamat</span>
            <input type="text" name="alamat_suami" placeholder="Masukkan Alamat Suami" required>
          </div>
          <div class="input-box">
            <span class="details">Alamat</span>
            <input type="text" name="alamat_istri" placeholder="Masukkan Alamat Istri" required>
          </div>
          <div class="input-box">
            <span class="details">Pekerjaan</span>
            <input type="text" name="pekerjaan_suami" placeholder="Masukkan Pekerjaan Suami" required>
          </div>
          <div class="input-box">
            <span class="details">Pekerjaan</span>
            <input type="text" name="pekerjaan_istri" placeholder="Masukkan Pekerjaan Istri" required>
          </div>
          <div class="input-box">
            <span class="details">Foto Suami</span>
            <input type="file" name="foto_suami">
          </div>
          <div class="input-box">
            <span class="details">Foto Istri</span>
            <input type="file" name="foto_istri">
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username_catin" placeholder="Masukkan Username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email_catin" placeholder="Masukkan Email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="nohp_catin" placeholder="Masukkan Nomor Handphone" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="pass_catin" placeholder="Masukkan Password" required>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" value="Register">
        </div>
        
      </form>
    </div>
  </div>
  

</body>
</html>

<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header("Location: ./");
        die();
    } else {

        echo '
        <style type="text/css">
            table , td , tr{
                vertical-align: top !important;
            }
            #right {
                border-right: none !important;
            }
            #left {
                border-left: none !important;
            }
            .isi {
                height: 300px!important;
            }
            .disp {
                text-align: center;
                padding: 1.5rem 0;
                margin-bottom: .5rem;
            }
            .logodisp {
                float: left;
                position: relative;
                width: 110px;
                height: 110px;
                margin: 0 0 0 1rem;
            }
            #lead {
                width: auto;
                position: relative;
                margin: 25px 0 0 75%;
            }
            .lead {
                font-weight: bold;
                text-decoration: underline;
                margin-bottom: -10px;
            }
            #tgh {
                text-align: center;
                
            }
            #garis{
                text-decoration:overline;
            }
            #nama {
                font-size: 2.1rem;
                margin-bottom: -1rem;
            }
            #alamat {
                font-size: 16px;
            }
            .up {
                text-transform: uppercase;
                margin: 0;
                line-height: 2.2rem;
                font-size: 1.5rem;
            }
            .up2 {
                text-transform: uppercase;
                margin: 0;
                line-height: 2.2rem;
                font-size: 1.5rem;
            }
            .status {
                margin: 0;
                font-size: 1.3rem;
                margin-bottom: .5rem;
            }
            #lbr {
                font-size: 20px;
                font-weight: bold;
            }
            .noBorder {
                border:none !important;
            }
            .separator {
                border-bottom: 2px solid #616161;
                margin: -1.3rem 0 1.5rem;
            }
            @media print{
                body {
                    font-size: 12px;
                    color: #212121;
                }
                nav {
                    display: none;
                }
                table,td,tr{
                    vertical-align: top;
                }
                #lbr {
                    font-size: 20px;
                }
                .isi {
                    height: 200px!important;
                }
                .tgh {
                    text-align: center;
                }
                .disp {
                    text-align: center;
                    margin: -.5rem 0;
                }
                .logodisp {
                    float: left;
                    position: relative;
                    width: 80px;
                    height: 80px;
                    margin: .5rem 0 0 .5rem;
                }
                #lead {
                    width: auto;
                    position: relative;
                    margin: 15px 0 0 75%;
                }
                .lead {
                    font-weight: bold;
                    text-decoration: underline;
                    margin-bottom: -10px;
                }
                #nama {
                    font-size: 20px!important;
                    font-weight: bold;
                    text-transform: uppercase;
                    
                }
                .up {
                    font-size: 17px!important;
                    font-weight: normal;
                }
                .up2 {
                    font-size: 17px!important;
                    font-weight: normal;
                    margin-bottom: -1rem;
                }
                .status {
                    font-size: 17px!important;
                    font-weight: normal;
                    margin-bottom: -.1rem;
                }
                .noBorder {
                    border:none !important;
                }
                #alamat {
                    margin-top: -15px;
                    font-size: 13px;
                }
                
                #lbr {
                    font-size: 17px;
                    font-weight: bold;
                }
                .separator {
                    border-bottom: 2px solid #616161;
                    margin: -1rem 0 1rem;
                }

            }
        </style>

        <body >

        <!-- Container START -->
            <div id="colres">
                <div class="disp">';
                    $query2 = mysqli_query($config, "SELECT institusi, nama, status, alamat, logo FROM tbl_instansi");
                    list($institusi, $nama, $status, $alamat, $logo) = mysqli_fetch_array($query2);
                        echo '<img class="logodisp" src="./upload/'.$logo.'"/>';
                        echo '<h6 class="up" id="nama">'.$nama.'</h6>';
                        echo '<h5 class="up2">KANTOR KEMENTERIAN AGAMA KABUPATEN WAY KANAN</h5>';
                        echo '<h5 class="up" >'.$institusi.'</h5>';
                        echo '<span id="alamat">'.$alamat.'</span>';

                    echo '
                </div>
                <div class="separator"></div>';

                $id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
                $query = mysqli_query($config, "SELECT * FROM tbl_surat_pengantar WHERE id_surat='$id_surat'");

                if(mysqli_num_rows($query) > 0){
                $no = 0;
                while($row = mysqli_fetch_array($query)){

                echo '
                <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="noBorder" id="tgh" colspan="5">
                                SURAT PENGANTAR <br>
                                <div id="garis">NOMOR:'.$row['no_surat'].'</div>
                                </td>
                            </tr>
                            
                            <tr >
                                <td class="noBorder"id="right" width="5px">Dasar</td>
                                <td class="noBorder"width="1px">:</td>
                                <td class="noBorder"> 
                                1. Undang-Undang Nomor 1 Tahun 1974 tentang Perkawinan <br>
                                2. Peraturan Menteri Kesehatan RI Nomor 97 Tahun 2013 tentang Pelayanan Kesehatan Reproduksi.                                     
                                </td>
                            </tr>
                            <tr>
                                <td class="noBorder" id="right">Dari</td>
                                <td class="noBorder">:</td>
                                <td class="noBorder"> 
                                KEPALA KUA Kec. Way Tuba.                   
                                </td>
                            </tr>
                            <tr>
                                <td class="noBorder" id="right">Kepada</td>
                                <td class="noBorder">:</td>
                                <td class="noBorder"> 
                                Kepala PUSKESMAS Kec. Way Tuba.                   
                                </td>
                            </tr>
                            <tr>
                                <td class="noBorder" id="right">Perihal</td>
                                <td class="noBorder">:</td>
                                <td class="noBorder"> 
                                Pelayanan Kesehatan Bagi Calon Pengantin (Catin).                  
                                </td>
                            </tr>
                            <tr>
                            <td class="noBorder"id="right">Untuk</td>
                            <td class="noBorder">:</td>
                            <td class="noBorder"> 
                            Di Mohon Pemeriksaan Kesehatan Reproduksi kepada calon Pengantin (Catin) bernama Sdr.'.$row['nama_suami'].' dg Sdri.'.$row['nama_istri'].' <br>
                            Alamat:  '.$row['alamat'].'                 
                            </td>
                            </tr>
                            <tr>
                                <td class="noBorder" colspan="5"> 
                                Demikian surat pengantar ini kami buat untuk dipergunakan sebagaimana mestinya dan atas kerjasama yang baik diucapkan terimakasih. 
                                </td>
                            </tr>
                            
                            ';
                            
                            
                        } echo '
                </table>
            <div id="lead">
                <p>Way Tuba, </p>
                <p>Kepala,</p>
                <div style="height: 50px;"></div>';
                $query = mysqli_query($config, "SELECT kepala, nip FROM tbl_instansi");
                list($kepala,$nip) = mysqli_fetch_array($query);
                if(!empty($kepala)){
                    echo '<p class="lead">'.$kepala.'</p>';
                } else {
                    echo '<p class="lead">Muhammad Kosim, S. Pd. I.</p>';
                }
                if(!empty($nip)){
                    echo '<p>NIP. '.$nip.'</p>';
                } else {
                    echo '<p>NIP. -</p>';
                }
                echo '
            </div>
        </div>
        <div class="jarak2"></div>
    <!-- Container END -->

    </body>';
    }
}
?>

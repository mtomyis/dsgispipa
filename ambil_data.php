<?php 

    if(isset($_GET['savejarak'])) {
        savejarak();
    }
    
    if(isset($_GET['select'])) {
        select();
    }
    if(isset($_GET['hippam'])) {
        hippam();
    }
    if(isset($_GET['map'])) {
        map();
    }
    if(isset($_GET['editmap'])) {
        editmap();
    }
    if(isset($_GET['showmap'])) {
        showmap();
    }
    if(isset($_GET['editmapdetail'])) {
        editmapdetail();
    }
    if(isset($_GET['showmapdetail'])) {
        showmapdetail();
    }
    if(isset($_GET['rasio'])) {
        rasio();
    }
    
    function savejarak()
    {
        require_once "admin/class/class_db.php";
        // include 'admin/script_awal.php';
        $db = new database();

        $idh = $_POST['idh'];
        $idp = $_POST['idp'];
        $jarak_ku = $_POST['jarak_ku'];
        
        // echo $idp;

        $sql = "UPDATE pipa SET jarak = '$jarak_ku' WHERE id='$idp'";
        if(!$res = $db->sqlquery($sql)){
            echo "Terjadi Kesalahan";
        }else{
            // setelah save perpipa, sekarang save semuajenis pipa yang sama
            // ambil pipa jenisnya dari get id
            $sql = "SELECT pipa_jenis_id
                    FROM pipa
                    WHERE id='$idp'";
            $data = $db->fetchdata($sql);
            $jenis_pipa=0;
            $jenispipa="pipa_pvc_0";

            foreach($data as $dat){
                $jenis_pipa = $dat['pipa_jenis_id'];
                switch($jenis_pipa){
                    //pvc atom
                    case '0900' : $jenispipa = 'pipa_pvc_10'; break;
                    case '0800' : $jenispipa = 'pipa_pvc_8'; break;
                    case '0600' : $jenispipa = 'pipa_pvc_6'; break;
                    case '0400' : $jenispipa = 'pipa_pvc_4'; break;
                    case '0300' : $jenispipa = 'pipa_pvc_3'; break;
                    case '0200' : $jenispipa = 'pipa_pvc_2'; break;
                    case '0150' : $jenispipa = 'pipa_pvc_15'; break;
                    case '0100' : $jenispipa = 'pipa_pvc_1'; break;
                    case '0075' : $jenispipa = 'pipa_pvc_34'; break;

                    //gl besi
                    case '1900' : $jenispipa = 'pipa_gl_10'; break;
                    case '1800' : $jenispipa = 'pipa_gl_8'; break;
                    case '1600' : $jenispipa = 'pipa_gl_6'; break;
                    case '1400' : $jenispipa = 'pipa_gl_4'; break;
                    case '1300' : $jenispipa = 'pipa_gl_3'; break;
                    case '1200' : $jenispipa = 'pipa_gl_2'; break;
                    case '1150' : $jenispipa = 'pipa_gl_15'; break;
                    case '1100' : $jenispipa = 'pipa_gl_1'; break;
                    case '1075' : $jenispipa = 'pipa_gl_34'; break;
                }
            }

            // jumlahkan jarak semua from pipa jenisnya dan idhippam
            $sqljarak = "SELECT SUM(jarak) as jml_jarak
                    FROM `pipa`
                    WHERE hippam_id = '$idh' AND pipa_jenis_id = '$jenis_pipa'";
            $datajarak = $db->fetchdata($sqljarak);
            foreach($datajarak as $datajarak){
                $jml_jarak = $datajarak['jml_jarak'];
            }

            // update table hippam set jarak pipa per jenis
            $sql = "UPDATE hippam SET $jenispipa = '$jml_jarak' WHERE id='$idh'";
            if(!$res  = $db->sqlquery($sql)){
                // echo "Tersimpan";
                echo "Terjadi Kesalahan";   
            }else{
                echo "".number_format($jarak_ku, 2)." Meter";
            }
        }
    }

    function showmap()
    {
        # menampilkan map setyelah klik selesai
        $id = $_POST['id'];

        include('config.php');
        include($doc_root_class.'class_custom.php');
        $cst = new custom;

        require_once "admin/class/class_db.php";
        $db = new database();

        $id = $_POST['id'];
        $sql = "SELECT * 
                FROM hippam 
                WHERE id='$id'";
        $dat = $db->datasql($sql);

        echo "
        <div id='map-canvas'></div>

        <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        ";
        require_once "admin/class/class_db.php";
        $db = new database();
        
        $hippam_id = $_POST['id'];

        //DRAW PIPA
        $sql_pipa = "SELECT * 
                FROM pipa 
                WHERE hippam_id='$hippam_id'";
        $data_pipa = $db->fetchdata($sql_pipa);
        $i = 0;
        foreach($data_pipa as $dat_pipa){
            echo "var flightPlanCoordinates_".$i." = [";
            $sql_koor = "SELECT * FROM pipa_koordinat
                        WHERE pipa_id='".$dat_pipa['id']."' ORDER BY `id_urut` ";
            $jml_koor = $db->jumrec($sql_koor);
            $data_koor = $db->fetchdata($sql_koor);
            $j = 0;
            $k = 0;
          
            foreach ($data_koor as $dat_koor) {
                echo "new google.maps.LatLng(".$dat_koor['latitude'].",".$dat_koor['longitude'].")";
                if($j<$jml_koor)
                    echo ",";
                $center_lat = $dat_koor['latitude'];
                $center_long = $dat_koor['longitude'];
                $j++;
            }

            switch($dat_pipa['pipa_jenis_id']){
                //pvc
                case '0900' : $color = '#663300'; break; //coklat
                case '0800' : $color = '#ff9900'; break; //oren
                case '0600' : $color = '#0000FF'; break; //biru
                case '0400' : $color = '#00FF00'; break; //ijo
                case '0300' : $color = '#6600cc'; break; //ungu
                case '0200' : $color = '#FFFF00'; break; //kuning
                case '0150' : $color = '#FF0000'; break; //merah
                case '0100' : $color = '#000000'; break; //hitam
                case '0075' : $color = '#8A8A8A'; break; //abu
                case '0050' : $color = '#669999'; break; //cyan tua
                
                //gl
                case '1900' : $color = '#cc9900'; break; //coklat muda
                case '1800' : $color = '#66ffff'; break; //cyan
                case '1600' : $color = '#66ccff'; break; //biru muda
                case '1400' : $color = '#99ffcc'; break; //ijo muda
                case '1300' : $color = '#9999ff'; break; //ungu muda
                case '1200' : $color = '#FF00FF'; break; //purple
                case '1150' : $color = '#ff3399'; break; //merah muda
                case '1100' : $color = '#999966'; break; //butek
                case '1075' : $color = '#993333'; break; //merah hitam
                case '1050' : $color = '#006600'; break; //ijo hitam
            }

            echo "];
  
                var flightPath_".$i." = new google.maps.Polyline({
                  path: flightPlanCoordinates_".$i.",
                  geodesic: true,
                  strokeColor: '$color',
                  strokeOpacity: 1.0,
                  strokeWeight: 2
                }); 
              flightPath_".$i.".setMap(map);
              ";

            $i++;

        }

        //DRAW BRONCAP
        $sql_broncap = "SELECT nama, latitude, longitude 
                        FROM broncap 
                        WHERE hippam_id='$hippam_id'";
        $data_broncap = $db->fetchdata($sql_broncap);
        foreach($data_broncap as $dat_broncap){
        echo "
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(".$dat_broncap['latitude'].", ".$dat_broncap['longitude']."),
            title: '".$dat_broncap['nama']."',
            map: map,
            icon: 'http://ds.gispipa.genteng.konseparsitek.com/assets/pics/broncap.png'
        });";
        }

        //DRAW TANDON
        $sql_tandon = "SELECT nama, latitude, longitude 
        FROM tandon 
        WHERE hippam_id='$hippam_id'";
        $data_tandon = $db->fetchdata($sql_tandon);
        foreach($data_tandon as $dat_tandon){
        echo "
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(".$dat_tandon['latitude'].", ".$dat_tandon['longitude']."),
            title: '".$dat_tandon['nama']."',
            map: map,
            icon: 'http://ds.gispipa.genteng.konseparsitek.com/assets/pics/tandon.png'
        });";
        }

        echo "
        }
        // ini penutup initialize
        
        var mapOptions = {
            zoom: 15,
            center: {lat: ". $center_lat .", lng: ". $center_long ."}
        };

        </script>
        
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20&callback=initMap'></script>
    ";
    }
    function select(){
        require_once "admin/class/class_db.php";
        $db = new database();

        $getid = $_GET['id'];

        $hippam = "<option selected=''>Pilih Hippam</option>";
        
        $sql_hp = "SELECT HP.id, HP.nama, DS.kode
            FROM hippam HP
            JOIN desa DS ON HP.desa_kode=DS.kode 
            WHERE DS.kecamatan_id='".$getid."' 
            ORDER BY DS.kode, HP.nama";
        $data_hp = $db->fetchdata($sql_hp);

        foreach($data_hp as $dat_hp){
            $hippam.= "<option value='".$dat_hp['id']."'>".$dat_hp['nama']."</option>";
            // $hippam.= "<option selected=''>Pilih s</option>";
        }
        
        echo $hippam;
    }

    function hippam(){
        include('config.php');
        include('template/head.php');
        include($doc_root_class.'class_custom.php');
        $cst = new custom;

        require_once "admin/class/class_db.php";
        $db = new database();

        $id = $_GET['id'];

        $sql = "SELECT * 
                FROM hippam 
                WHERE id='$id'";
        $dat = $db->datasql($sql);

        // <script src='http://ds.gispipa.genteng.konseparsitek.com/assets/js/jquery.min.js'></script>
        // <script src='http://ds.gispipa.genteng.konseparsitek.com/assets/js/bootstrap.min.js'></script>
        // <script src='http://ds.gispipa.genteng.konseparsitek.com/assets/js/gis.js'></script>

        echo "
        <link href='http://ds.gispipa.genteng.konseparsitek.com/assets/css/bootstrap.min.css' rel='stylesheet'>
        <link href='http://ds.gispipa.genteng.konseparsitek.com/assets/css/gis.css' rel='stylesheet'>
        <link href='http://ds.gispipa.genteng.konseparsitek.com/assets/font-awesome-4.1.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

        
        "."
        <section class='dorne-about-area section-padding-0-0' style='background-image: url(dorne/img/bg-img/pipa3.jpg);'>
            <div class='container'>
                <div class='row'>
                    <div class='col-12'>

        <div class='row' style='padding-top: 20px;'>
                <div class='col-md-5'>
                    <div class='well well-sm'>
                        <div class='box'>
                        <h4 class='section-subheading'>". $dat['nama']."</h4>
                            <table class='table text-left table-condensed'>
                                <tr>
                                    <td>Nama Pengelola</td>
                                    <td>: </td><td>". $dat['nama']."</td>
                                </tr>
                                <tr>
                                    <td>Bentuk Usaha</td>
                                    <td>: </td><td>HIPPAM</td>
                                </tr>
                                <tr>
                                    <td>Alamat Lengkap</td>
                                    <td>: </td><td>". $dat['alamat']."</td>
                                </tr>
                                <tr>
                                    <td>SK Penetapan</td>
                                    <td>: </td><td>". $dat['no_sk']."</td>
                                </tr>
                                <tr>
                                    <td>Yang Menetapkan</td>
                                    <td>: </td><td>". $dat['menetapkan']."</td>
                                </tr>
                                <tr>
                                    <td>Jml Pengurus</td>
                                    <td>: </td><td>". $dat['jml_pengurus']." orang</td>
                                </tr>
                                <tr>
                                    <td>Tahun Berdiri</td>
                                    <td>: </td><td>". $dat['thn_berdiri']."</td>
                                </tr>
                                <tr>
                                    <td><b>KETUA</b></td>
                                    <td></td><td></td>
                                </tr>
                                <tr>
                                    <td>Nama Ketua</td>
                                    <td>: </td><td>". $dat['ketua_nama']."</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td><td>". $dat['ketua_alamat']."</td>
                                </tr>
                                <tr>
                                    <td>No.Telp/HP</td>
                                    <td>: </td><td>". $dat['ketua_telp']."</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: </td><td>". $dat['ketua_email']."</td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <div class='col-md-7'>
                    <div class='well text-left well-sm'>
                        <div class=''>
                            <div class='panel-group' id='accordion'>
                                <!-- start panel data teknis -->
                                <div class='panel panel-gis'>
                                    <div class='panel-heading'>
                                      <h4 class='panel-title'>
                                        <a data-toggle='collapse' data-parent='#accordion' href='#data_teknis'>
                                          DATA TEKNIS
                                        </a>
                                      </h4>
                                    </div>
                                    <div id='data_teknis' class='panel-collapse collapse'>
                                      <div class='panel-body'>
                                        <ol type='1'>
                                            <li>Mata Air</li>
                                                <ol type='a'>
                                                    <div class='col-xs-8'><li>Kapasitas sumber air </li></div><div class='col-xs-4'>: ". $dat['ma_kap_sumber'] ." Lt/det</div>
                                                    <div class='col-xs-8'><li>Kapasitas terpasang </li></div><div class='col-xs-4'>: ". $dat['ma_kap_terpasang']." Lt/det</div>
                                                    <div class='col-xs-12'><li>Bangunan broncaptering</li></div>
                                                        <ol type='1'>
                                                            <div class='col-xs-offset-4 col-xs-4'><li>Jumlah</li></div><div class='col-xs-4 padding-rata'>: ". $dat['ma_broncap_jml']."</div>
                                                            <div class='col-xs-offset-4 col-xs-4'><li>Ukuran</li></div><div class='col-xs-4 padding-rata'>: ". $dat['ma_broncap_ukuran']."</div>
                                                        </ol>
                                                    
                                                    <div class='col-xs-12'><li>Bangunan tandon</li></div>
                                                        <ol type='1'>
                                                            <div class='col-xs-offset-4 col-xs-4'><li>Jumlah</li></div><div class='col-xs-4 padding-rata'>: ". $dat['ma_tandon_jml']."</div>
                                                            <div class='col-xs-offset-4 col-xs-4'><li>Ukuran</li></div><div class='col-xs-4 padding-rata'>: ". $dat['ma_tandon_ukuran']."</div>
                                                        </ol>
                                                    <div class='col-xs-8'><li>Tahun pembangunan </li></div><div class='col-xs-4'>: ". $dat['ma_thn_buat']."</div>
                                                    <div class='col-xs-8'><li>Sumber dana </li></div><div class='col-xs-4'>: ". $dat['ma_sumber_dana']."</div>
                                                </ol>
                                            <div class='col-xs-12'><li>Sumur Bor</li></div>
                                                <ol type='a'>
                                                    <div class='col-xs-8'><li>Kapasitas sumber air (Lt/det) </li></div><div class='col-xs-4'>: ". $dat['sb_kap_sumber']."</div>
                                                    <div class='col-xs-8'><li>Kapasitas terpasang (Lt/det) </li></div><div class='col-xs-4'>: ". $dat['sb_kap_terpasang']."</div>
                                                    <div class='col-xs-12'><li>Bangunan tandon</li></div>
                                                        <ol type='1'>
                                                            <div class='col-xs-offset-4 col-xs-4'><li>Jumlah</li></div><div class='col-xs-4 padding-rata'>: ". $dat['sb_tandon_jml']."</div>
                                                            <div class='col-xs-offset-4 col-xs-4'><li>Ukuran</li></div><div class='col-xs-4 padding-rata'>: ". $dat['sb_tandon_ukuran']."</div>
                                                        </ol>
                                                    <div class='col-xs-12'><li>Sumber tenaga pompa</li></div>
                                                        
                                                            <div class='col-xs-11'>1. Genset</div>
                                                            <ol type='1'>
                                                                <div class='col-xs-offset-4 col-xs-4'><li>Jumlah</li></div><div class='col-xs-4 padding-rata'>: ". $dat['sb_genset_jml']."</div>
                                                                <div class='col-xs-offset-4 col-xs-4'><li>Ukuran</li></div><div class='col-xs-4 padding-rata'>: ". $dat['sb_genset_ukuran']."</div>
                                                            </ol>
                                                            <div class='col-xs-11'>2. PLN</div>
                                                            <ol type='1'>
                                                                <div class='col-xs-offset-4 col-xs-4'><li>Jumlah</li></div><div class='col-xs-4 padding-rata'>: ". $dat['sb_pln_jml']."</div>
                                                                <div class='col-xs-offset-4 col-xs-4'><li>Ukuran</li></div><div class='col-xs-4 padding-rata'>: ". $dat['sb_pln_ukuran']."</div>
                                                            </ol>
                                                        
                                                    <div class='col-xs-8'><li>Jumlah panel pompa </li></div><div class='col-xs-4'>: ". $dat['sb_jml_panel_pompa']."</div>
                                                    <div class='col-xs-8'><li>Tahun pembangunan </li></div><div class='col-xs-4'>: ". $dat['sb_thn_buat']."</div>
                                                    <div class='col-xs-8'><li>Sumber dana </li></div><div class='col-xs-4'>: ". $dat['sb_sumber_dana']."</div>
                                                </ol>

                                            <div class='col-xs-8'><li>Kapasitas Produksi Total (liter/detik) </li></div><div class='col-xs-3 padding-tambah'>: ". $dat['kap_produksi']."</div>
                                            <div class='col-xs-8'><li>Jumlah air yang didistribusikan perhari (M3) </li></div><div class='col-xs-3 padding-tambah'>: ". $dat['jml_air']."</div>
                                            <div class='col-xs-12'><li>Sistem pengaliran/pelayanan</li></div>
                                                <ol type='a'>
                                                    <div class='col-xs-8'><li>Sumber air ke reservoar </li></div><div class='col-xs-4'>: ". $dat['sistem_reservoir']."</div>
                                                    <div class='col-xs-8'><li>Produksi/reservoar ke pelanggan </li></div><div class='col-xs-4'>: ". $dat['sistem_pelanggan']."</div>
                                                </ol>
                                            <div class='col-xs-12'><li>Sarana Tranmisi/Distribusi</li></div>
                                                <ol type='a'>
                                                    <div class='col-sm-6'>
                                                        <div class='col-xs-6'><li>Pipa Gl &Oslash; 10' (m)</li></div><div class='col-xs-6'>: ". $dat['pipa_gl_10']."</div>
                                                        <div class='col-xs-6'>Pipa Gl &Oslash; 8' (m)</div><div class='col-xs-6'>: ". $dat['pipa_gl_8']."</div>
                                                        <div class='col-xs-6'>Pipa Gl &Oslash; 6' (m)</div><div class='col-xs-6'>: ". $dat['pipa_gl_6']."</div>
                                                        <div class='col-xs-6'>Pipa Gl &Oslash; 4' (m)</div><div class='col-xs-6'>: ". $dat['pipa_gl_4']."</div>
                                                        <div class='col-xs-6'>Pipa Gl &Oslash; 3' (m)</div><div class='col-xs-6'>: ". $dat['pipa_gl_3']."</div>
                                                        <div class='col-xs-6'>Pipa Gl &Oslash; 2' (m)</div><div class='col-xs-6'>: ". $dat['pipa_gl_2']."</div>
                                                        <div class='col-xs-6'>Pipa Gl &Oslash; 1,5' (m)</div><div class='col-xs-6'>: ". $dat['pipa_gl_15']."</div>
                                                        <div class='col-xs-6'>Pipa Gl &Oslash; 1' (m)</div><div class='col-xs-6'>: ". $dat['pipa_gl_1']."</div>
                                                        <div class='col-xs-6'>Pipa Gl &Oslash; 3/4' (m)</div><div class='col-xs-6'>: ". $dat['pipa_gl_34']."</div>
                                                        <div class='col-xs-6'>Pipa Gl &Oslash; 1/2' (m)</div><div class='col-xs-6'>: ". $dat['pipa_gl_12']."</div>
                                                    </div>
                                                    <div class='col-sm-6'>
                                                        <div class='col-xs-8'><li>Pipa PVC &Oslash; 10' (m)</li></div><div class='col-xs-4'>: ". $dat['pipa_pvc_10']."</div>
                                                        <div class='col-xs-8'>Pipa PVC &Oslash; 8' (m)</div><div class='col-xs-4'>: ". $dat['pipa_pvc_8']."</div>
                                                        <div class='col-xs-8'>Pipa PVC &Oslash; 6' (m)</div><div class='col-xs-4'>: ". $dat['pipa_pvc_6']."</div>
                                                        <div class='col-xs-8'>Pipa PVC &Oslash; 4' (m)</div><div class='col-xs-4'>: ". $dat['pipa_pvc_4']."</div>
                                                        <div class='col-xs-8'>Pipa PVC &Oslash; 3' (m)</div><div class='col-xs-4'>: ". $dat['pipa_pvc_3']."</div>
                                                        <div class='col-xs-8'>Pipa PVC &Oslash; 2' (m)</div><div class='col-xs-4'>: ". $dat['pipa_pvc_2']."</div>
                                                        <div class='col-xs-8'>Pipa PVC &Oslash; 1,5' (m)</div><div class='col-xs-4'>: ". $dat['pipa_pvc_15']."</div>
                                                        <div class='col-xs-8'>Pipa PVC &Oslash; 1' (m)</div><div class='col-xs-4'>: ". $dat['pipa_pvc_1']."</div>
                                                        <div class='col-xs-8'>Pipa PVC &Oslash; 3/4' (m)</div><div class='col-xs-4'>: ". $dat['pipa_pvc_34']."</div>
                                                        <div class='col-xs-8'>Pipa PVC &Oslash; 1/2' (m)</div><div class='col-xs-4'>: ". $dat['pipa_pvc_12']."</div>
                                                    </div>
                                                </ol>
                                        </ol>
                                      </div>
                                    </div>
                                </div>
                                <!-- end panel data teknis -->
                                <!-- start panel data pelayanan -->
                                <div class='panel panel-gis'>
                                    <div class='panel-heading'>
                                      <h4 class='panel-title'>
                                        <a data-toggle='collapse' data-parent='#accordion' href='#data_pelayanan'>
                                          DATA PELAYANAN
                                        </a>
                                      </h4>
                                    </div>
                                    <div id='data_pelayanan' class='panel-collapse collapse'>
                                      <div class='panel-body'>
                                        <ol type='1'>
                                            <li>Jumlah Sambungan/Pelanggan
                                                <ol type='a'>
                                                    <div class='col-xs-7'><li>Sambungan Rumah (SR) </li></div><div class='col-xs-4'>: ". $dat['sbg_rumah']."</div>
                                                    <div class='col-xs-12'><li>Sambungan Sosial :</li></div>
                                                        <ul type='square'>
                                                            <div class='col-xs-7'><li>Sambungan Masjid/Musholla </li></div><div class='col-xs-4 padding-rata2'>: ". $dat['sbg_masjid']."</div>
                                                            <div class='col-xs-7'><li>Sambungan Gereja </li></div><div class='col-xs-4 padding-rata2'>: ". $dat['sbg_gereja']."</div>
                                                            <div class='col-xs-7'><li>Sambungan Pura </li></div><div class='col-xs-4 padding-rata2'>: ". $dat['sbg_pura']."</div>
                                                            <div class='col-xs-7'><li>Sambungan Wihara </li></div><div class='col-xs-4 padding-rata2'>: ". $dat['sbg_wihara']."</div>
                                                            <div class='col-xs-7'><li>Sambungan Sekolah </li></div><div class='col-xs-4 padding-rata2'>: ". $dat['sbg_sekolah']."</div>
                                                        </ul>
                                                    <div class='col-xs-7'><li>Kran Umum </li></div><div class='col-xs-4'>: ". $dat['sbg_umum']."</div>
                                                </ol>
                                            </li>
                                            <div class='col-xs-7'><li>Jumlah Jiwa Terlayani </li></div><div class='col-xs-3 padding-tambah2'>: ". $dat['terlayani']."</div>
                                            <div class='col-xs-7'><li>Jumlah Jiwa Belum Terlayani </li></div><div class='col-xs-3 padding-tambah2'>: ". $dat['belum_terlayani']."</div>
                                            <div class='col-xs-12'><li>Sistem Pembayaran yang Ditetapkan</li></div>
                                                <ol type='a'>
                                                    <div class='col-xs-7'><li>Tarif Per M<sup>3</sup> </li></div><div class='col-xs-4'>: ". $dat['tarif']."</div>
                                                    <div class='col-xs-7'><li>Iuran Tetap/Bulan </li></div><div class='col-xs-4'>: ". $dat['iuran']."</div>
                                                </ol>
                                        </ol>
                                      </div>
                                    </div>
                                </div>
                                <!-- end panel data pelayanan -->
                                <!-- start panel data potensi SDA -->
                                <div class='panel panel-gis'>
                                    <div class='panel-heading'>
                                      <h4 class='panel-title'>
                                        <a data-toggle='collapse' data-parent='#accordion' href='#data_potensi_sda'>
                                          DATA POTENSI SUMBER DAYA AIR
                                        </a>
                                      </h4>
                                    </div>
                                    <div id='data_potensi_sda' class='panel-collapse collapse'>
                                      <div class='panel-body'>
                                        <ol type='1'>
                                            <div class='col-xs-7'><li>Jumlah Sumber Mata Air </li></div><div class='col-xs-4'>: ". $dat['jml_sma']."</div>
                                            <div class='col-xs-7'><li>Total Debit Mata Air (Liter/Detik) </li></div><div class='col-xs-4'>: ". $dat['total_debit_sma']."</div>
                                            <div class='col-xs-7'><li>Jarak Terdekat Sumber Mata Air ke Desa </li></div><div class='col-xs-4'>: ". $dat['jarak_sma']."</div>
                                        </ol>
                                      </div>
                                    </div>
                                </div>
                                <!-- end panel data potensi SDA -->
                                <!-- start panel data fasilitas sosial -->
                                <div class='panel panel-gis'>
                                    <div class='panel-heading'>
                                      <h4 class='panel-title'>
                                        <a data-toggle='collapse' data-parent='#accordion' href='#data_fasilitas_sos'>
                                          DATA FASILITAS SOSIAL
                                        </a>
                                      </h4>
                                    </div>
                                    <div id='data_fasilitas_sos' class='panel-collapse collapse'>
                                      <div class='panel-body'>
                                        <ol type='1'>
                                            <div class='col-xs-7'><li>Jumlah Sekolah </li></div><div class='col-xs-4'>: ". $dat['jml_sekolah']."</div>
                                            <div class='col-xs-7'><li>Jumlah Tempat Ibadah </li></div><div class='col-xs-4'>: ". $dat['jml_t_ibadah']."</div>
                                            <div class='col-xs-7'><li>Jumlah Rumah Sakit / Puskesmas </li></div><div class='col-xs-4'>: ". $dat['jml_rs_puskesmas']."</div>
                                            <div class='col-xs-7'><li>Jumlah Kantor Pemerintah </li></div><div class='col-xs-4'>: ". $dat['jml_kantor_pemda']."</div>
                                            <div class='col-xs-7'><li>Jumlah Fasilitas Sosial Lainnya </li></div><div class='col-xs-4'>: ". $dat['jml_fasos_lain']."</div>
                                        </ol>
                                      </div>
                                    </div>
                                </div>
                                <!-- end panel data fasilitas sosial -->
                                <!-- start panel data kependudukan berdasarkan wilayah -->
                                <div class='panel panel-gis'>
                                    <div class='panel-heading'>
                                      <h4 class='panel-title'>
                                        <a data-toggle='collapse' data-parent='#accordion' href='#data_kep_n_pelayanan'>
                                          DATA KEPENDUDUKAN DAN PELAYANAN HIPPAM BERDASARKAN WILAYAH
                                        </a>
                                      </h4>
                                    </div>
                                    <div id='data_kep_n_pelayanan' class='panel-collapse collapse'>
                                      <div class='panel-body'>
                                        <ol type='A'>
                                            <li>DESA HIPPAM YANG BERSANGKUTAN
                                                <div class='table-responsive'>
                                                    <table class='table table-condensed table-heading table-striped table-bordered'>
                                                        <thead>
                                                            <tr>
                                                                <th rowspan='3'>No</th>
                                                                <th rowspan='3'>Uraian</th>
                                                                <th rowspan='3'>Jml RW</th>
                                                                <th rowspan='3'>Jml RT</th>
                                                                <th colspan='4'>Pelayanan Air Minum HIPPAM</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan='2'>Sudah Terlayani</th>
                                                                <th colspan='2'>Sudah Terlayani</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Jml KK</th>
                                                                <th>Jml Jiwa</th>
                                                                <th>Jml KK</th>
                                                                <th>Jml Jiwa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        ";
                                                        // echo "hohohehe";
                                                        $sql_hd = "SELECT * FROM hippam_desa HD WHERE hippam_id='".$dat['id']."'";
                                                        $data_hd = $db->fetchdata($sql_hd);

                                                        $i = 0;
                                                        $tot_rw = 0;
                                                        $tot_rt = 0;
                                                        $tot_terlayani_kk = 0;
                                                        $tot_terlayani_jiwa = 0;
                                                        $tot_belum_terlayani_kk = 0;
                                                        $tot_belum_terlayani_jiwa = 0;

                                                            foreach($data_hd as $dat_hd){
                                                                $i++;
                                                                $tot_rw+= $dat_hd['rw'];
                                                                $tot_rt+= $dat_hd['rt'];
                                                                $tot_terlayani_kk+= $dat_hd['terlayani_kk'];
                                                                $tot_terlayani_jiwa+= $dat_hd['terlayani_jiwa'];
                                                                $tot_belum_terlayani_kk+= $dat_hd['belum_terlayani_kk'];
                                                                $tot_belum_terlayani_jiwa+= $dat_hd['belum_terlayani_jiwa'];

                                                                echo "
                                                                <tr>
                                                                    <td>". $i.".</td>
                                                                    <td>". $dat_hd['uraian']."</td>
                                                                    <td class='align_right'>". $cst->currency($dat_hd['rw'],0)."</td>
                                                                    <td class='align_right'>". $cst->currency($dat_hd['rt'],0)."</td>
                                                                    <td class='align_right'>". $cst->currency($dat_hd['terlayani_kk'],0)."</td>
                                                                    <td class='align_right'>". $cst->currency($dat_hd['terlayani_jiwa'],0)."</td>
                                                                    <td class='align_right'>". $cst->currency($dat_hd['belum_terlayani_kk'],0)."</td>
                                                                    <td class='align_right'>". $cst->currency($dat_hd['belum_terlayani_jiwa'],0)."</td>
                                                                </tr>
                                                                ";
                                                            }

                                                        echo "
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan='2' class='text-center'>JUMLAH TOTAL</td>
                                                                <td class='align_right'>". $cst->currency($tot_rw,0)."</td>
                                                                <td class='align_right'>". $cst->currency($tot_rt,0)."</td>
                                                                <td class='align_right'>". $cst->currency($tot_terlayani_kk,0)."</td>
                                                                <td class='align_right'>". $cst->currency($tot_terlayani_jiwa,0)."</td>
                                                                <td class='align_right'>". $cst->currency($tot_belum_terlayani_kk,0)."</td>
                                                                <td class='align_right'>". $cst->currency($tot_belum_terlayani_jiwa,0)."</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </li>
                                            <li>DESA SEKITAR YANG DILAYANI HIPPAM YANG BERSANGKUTAN
                                                <div class='table-responsive'>
                                                    <table class='table table-condensed table-heading table-striped table-bordered'>
                                                        <thead>
                                                            <tr>
                                                                <th rowspan='3'>No</th>
                                                                <th rowspan='3'>Uraian</th>
                                                                <th rowspan='3'>Jml RW</th>
                                                                <th rowspan='3'>Jml RT</th>
                                                                <th colspan='4'>Pelayanan Air Minum HIPPAM</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan='2'>Sudah Terlayani</th>
                                                                <th colspan='2'>Belum Terlayani</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Jml KK</th>
                                                                <th>Jml Jiwa</th>
                                                                <th>Jml KK</th>
                                                                <th>Jml Jiwa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>";
                                                        
                                                        $sql_hd = "SELECT * 
                                                                    FROM hippam_desa_sekitar HD
                                                                    WHERE hippam_id='".$dat['id']."'";
                                                        $data_hd = $db->fetchdata($sql_hd);

                                                        $i = 0;
                                                        $tot_rw = 0;
                                                        $tot_rt = 0;
                                                        $tot_terlayani_kk = 0;
                                                        $tot_terlayani_jiwa = 0;
                                                        $tot_belum_terlayani_kk = 0;
                                                        $tot_belum_terlayani_jiwa = 0;
                                                        foreach($data_hd as $dat_hd){
                                                            $i++;
                                                            $tot_rw+= $dat_hd['rw'];
                                                            $tot_rt+= $dat_hd['rt'];
                                                            $tot_terlayani_kk+= $dat_hd['terlayani_kk'];
                                                            $tot_terlayani_jiwa+= $dat_hd['terlayani_jiwa'];
                                                            $tot_belum_terlayani_kk+= $dat_hd['belum_terlayani_kk'];
                                                            $tot_belum_terlayani_jiwa+= $dat_hd['belum_terlayani_jiwa'];

                                                            echo "
                                                            <tr>
                                                                <td class='align_right'>". $i.".</td>
                                                                <td class='align_right'>". $dat_hd['uraian']."</td>
                                                                <td class='align_right'>". $cst->currency($dat_hd['rw'],0)."</td>
                                                                <td class='align_right'>". $cst->currency($dat_hd['rt'],0)."</td>
                                                                <td class='align_right'>". $cst->currency($dat_hd['terlayani_kk'],0)."</td>
                                                                <td class='align_right'>". $cst->currency($dat_hd['terlayani_jiwa'],0)."</td>
                                                                <td class='align_right'>". $cst->currency($dat_hd['belum_terlayani_kk'],0)."</td>
                                                                <td class='align_right'>". $cst->currency($dat_hd['belum_terlayani_jiwa'],0)."</td>
                                                            </tr>
                                                            ";
                                                        }
                                                        echo "
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan='2' class='text-center'>JUMLAH TOTAL</td>
                                                                <td class='align_right'>". $cst->currency($tot_rw,0)."</td>
                                                                <td class='align_right'>". $cst->currency($tot_rt,0)."</td>
                                                                <td class='align_right'>". $cst->currency($tot_terlayani_kk,0)."</td>
                                                                <td class='align_right'>". $cst->currency($tot_terlayani_jiwa,0)."</td>
                                                                <td class='align_right'>". $cst->currency($tot_belum_terlayani_kk,0)."</td>
                                                                <td class='align_right'>". $cst->currency($tot_belum_terlayani_jiwa,0)."</td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </li>
                                        </ol>
                                      </div>
                                    </div>
                                </div>
                                <!-- end panel data kependudukan berdasarkan wilayah -->
                            </div>
                            <!-- end collapse panel -->
                            <!-- <h2 class='text-center box'><a href='jalur_dist.php?id=". $dat['id']."'>Jalur Distribusi Air Bersih</a></h2> -->
                            <input type='hidden' name='jalurku' id='jalurku' value='".$dat['id']."'>
                            <h2 class='text-center box'><a href='#mip' id='jalur' >Jalur Distribusi Air Bersih</a></h2>
                            
                            <script type='text/javascript'>
                            $(document).ready(function() {
                                $('#jalur').on('click', function() {
                                    var id_hippam = document.getElementById('jalurku').value;
                                    $.ajax({
                                        url: 'ambil_data.php?map',
                                        type: 'post',
                                        data: {id:id_hippam},             
                                        success: function(data) {               
                                        $('#mip').html(data);
                                        var elmnt = document.getElementById('mip');
                                        elmnt.scrollIntoView();
                                        console.log(data);
                                        }
                                    });
                                });
                            })
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            </div>
            </div>
        </div>
    </section>
        ";
    }

    function map(){

        $id = $_POST['id'];


        
        // echo "
        // <div style='height: 600px' id='map'></div>
        // <script>
        //     var map;
        //     var infowindow;
        //     function initMap() {
        //         var koordinat_terakhir = {lat: -8.094601, lng: 114.363472};
                
        //         infowindow = new google.maps.InfoWindow();
        //         map = new google.maps.Map(document.getElementById('map'), {
        //             center : koordinat_terakhir,
        //             zoom: 15
        //         });
        //     }
        // </script>
        // <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        // <script defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20&callback=initMap'></script>
        // ";

        include('config.php');
        include($doc_root_class.'class_custom.php');
        $cst = new custom;

        require_once "admin/class/class_db.php";
        $db = new database();

        $id = $_POST['id'];
        $sql = "SELECT * 
                FROM hippam 
                WHERE id='$id'";
        $dat = $db->datasql($sql);

        echo "

        <style>
        #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
        }
        </style>

        <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        ";
        require_once "admin/class/class_db.php";
        $db = new database();
        
        $hippam_id = $_POST['id'];

        //DRAW PIPA
        $sql_pipa = "SELECT * 
                FROM pipa 
                WHERE hippam_id='$hippam_id'";
        $data_pipa = $db->fetchdata($sql_pipa);
        $i = 0;
        foreach($data_pipa as $dat_pipa){
            echo "var flightPlanCoordinates_".$i." = [";
            $sql_koor = "SELECT * FROM pipa_koordinat
                        WHERE pipa_id='".$dat_pipa['id']."' ORDER BY `id_urut` ";
            $jml_koor = $db->jumrec($sql_koor);
            $data_koor = $db->fetchdata($sql_koor);
            $j = 0;
            $k = 0;
          
            foreach ($data_koor as $dat_koor) {
                echo "new google.maps.LatLng(".$dat_koor['latitude'].",".$dat_koor['longitude'].")";
                if($j<$jml_koor)
                    echo ",";
                $center_lat = $dat_koor['latitude'];
                $center_long = $dat_koor['longitude'];
                $j++;
            }

            switch($dat_pipa['pipa_jenis_id']){
                //pvc
                case '0900' : $color = '#663300'; break; //coklat
                case '0800' : $color = '#ff9900'; break; //oren
                case '0600' : $color = '#0000FF'; break; //biru
                case '0400' : $color = '#00FF00'; break; //ijo
                case '0300' : $color = '#6600cc'; break; //ungu
                case '0200' : $color = '#FFFF00'; break; //kuning
                case '0150' : $color = '#FF0000'; break; //merah
                case '0100' : $color = '#000000'; break; //hitam
                case '0075' : $color = '#8A8A8A'; break; //abu
                case '0050' : $color = '#669999'; break; //cyan tua
                
                //gl
                case '1900' : $color = '#cc9900'; break; //coklat muda
                case '1800' : $color = '#66ffff'; break; //cyan
                case '1600' : $color = '#66ccff'; break; //biru muda
                case '1400' : $color = '#99ffcc'; break; //ijo muda
                case '1300' : $color = '#9999ff'; break; //ungu muda
                case '1200' : $color = '#FF00FF'; break; //purple
                case '1150' : $color = '#ff3399'; break; //merah muda
                case '1100' : $color = '#999966'; break; //butek
                case '1075' : $color = '#993333'; break; //merah hitam
                case '1050' : $color = '#006600'; break; //ijo hitam
            }

            echo "];
  
                var flightPath_".$i." = new google.maps.Polyline({
                  path: flightPlanCoordinates_".$i.",
                  geodesic: true,
                  strokeColor: '$color',
                  strokeOpacity: 1.0,
                  strokeWeight: 2
                }); 
              flightPath_".$i.".setMap(map);
              ";

            $i++;

        }

        //DRAW BRONCAP
        $sql_broncap = "SELECT nama, latitude, longitude 
                        FROM broncap 
                        WHERE hippam_id='$hippam_id'";
        $data_broncap = $db->fetchdata($sql_broncap);
        foreach($data_broncap as $dat_broncap){
        echo "
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(".$dat_broncap['latitude'].", ".$dat_broncap['longitude']."),
            title: '".$dat_broncap['nama']."',
            map: map,
            icon: 'http://ds.gispipa.genteng.konseparsitek.com/assets/pics/broncap.png'
        });";
        }

        //DRAW TANDON
        $sql_tandon = "SELECT nama, latitude, longitude 
        FROM tandon 
        WHERE hippam_id='$hippam_id'";
        $data_tandon = $db->fetchdata($sql_tandon);
        foreach($data_tandon as $dat_tandon){
        echo "
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(".$dat_tandon['latitude'].", ".$dat_tandon['longitude']."),
            title: '".$dat_tandon['nama']."',
            map: map,
            icon: 'http://ds.gispipa.genteng.konseparsitek.com/assets/pics/tandon.png'
        });";
        }

        echo "
        }
        // ini penutup initialize
        
        var mapOptions = {
            zoom: 10,
            center: {lat: ". $center_lat .", lng: ". $center_long ."}
        };

        </script>
        
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20&callback=initMap'></script>
    ";

    echo "
    <div class='row  box'>
            <div class='col-md-9' style='height:600px;border:0px solid black'>
                <div id='map-canvas'></div>
            </div>
            <div class='col-md-3' style='margin-bottom:-10px'>
                <h3>LEGENDA</h3>
                <table width='95%' cellspacing='2' cellpadding='2' border='0' >
                          <tr valign='middle' align='left'>
                                <td width='50'><div style='background-color: #663300; height: 5px'>&nbsp;</div></td>
                                <td width='110'>&nbsp;&nbsp;Pipa PVC &Oslash; 10'</td>
                                <td width='5'>:</td>
                                <td align='right'>". $cst->currency($dat['pipa_pvc_10'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #ff9900; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 8'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_pvc_8'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #0000FF; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 6'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_pvc_6'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #00FF00; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 4'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_pvc_4'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #6600cc; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 3'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_pvc_3'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #FFFF00; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 2'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_pvc_2'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #FF0000; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 1.5'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_pvc_15'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #000000; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 1'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_pvc_1'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #8A8A8A; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 3/4'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_pvc_34'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #669999; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa PVC &Oslash; 1/2'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_pvc_12'],0) ." m</td>
                          </tr>
                          <tr><td>&nbsp;</td></tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #cc9900; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa GI &Oslash; 10'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_gl_10'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #66ffff; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa GI &Oslash; 8'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_gl_8'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #66ccff; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa GI &Oslash; 6'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_gl_6'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #99ffcc; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa GI &Oslash; 4'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_gl_4'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #9999ff; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa GI &Oslash; 3'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_gl_3'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #FF00FF; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa GI &Oslash; 2'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_gl_2'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #ff3399; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa GI &Oslash; 1.5'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_gl_15'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #999966; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa GI &Oslash; 1'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_gl_1'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #993333; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa GI &Oslash; 3/4'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_gl_34'],0) ." m</td>
                          </tr>
                          <tr valign='middle' align='left'>
                              <td><div style='background-color: #006600; height: 5px'>&nbsp;</div></td>
                              <td>&nbsp;&nbsp;Pipa GI &Oslash; 1/2'</td>
                              <td>:</td>
                              <td align='right'>". $cst->currency($dat['pipa_gl_12'],0) ." m</td>
                          </tr>
                    <tr valign='middle' align='left'>
                        <td><img src='http://ds.gispipa.genteng.konseparsitek.com/assets/pics/broncap.png'  width='15px'></td>
                        <td>&nbsp;&nbsp;Broncaptering</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr valign='middle' align='left'>
                        <td><img src='http://ds.gispipa.genteng.konseparsitek.com/assets/pics/tandon.png' width='15px'></td>
                        <td>&nbsp;&nbsp;Tandon</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        ";
    }

    function editmap(){

        $id = $_POST['id'];
        
        // echo "<script>alert('".$id."')</script>";
        // echo "
        // <div id='map-canvas'></div>
        // <script>
        //     var map;
        //     var infowindow;
        //     function initMap() {
        //         var koordinat_terakhir = {lat: -8.094601, lng: 114.363472};
                
        //         infowindow = new google.maps.InfoWindow();
        //         map = new google.maps.Map(document.getElementById('map-canvas'), {
        //             center : koordinat_terakhir,
        //             zoom: 15
        //         });
        //     }
        // </script>
        // <script defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20&callback=initMap'></script>
        // ";

        // include_once 'template/js.php';
        

        include('config.php');
        include($doc_root_class.'class_custom.php');
        $cst = new custom;

        require_once "admin/class/class_db.php";
        $db = new database();

        $id = $_POST['id'];
        $sql = "SELECT * 
                FROM hippam 
                WHERE id='$id'";
        $dat = $db->datasql($sql);

        echo "

        <div id='map-canvas'></div>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

        <style>
        #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
        }
        </style>

        <script>
        var map;
        var marker;
        var infowindow;

        //penambahan variable dan funsi marker
        var markers = {};
        var getMarkerUniqueId= function(lat, lng) {
            return lat + '_' + lng;
        };
        var getLatLng = function(lat, lng) {
            return new google.maps.LatLng(lat, lng);
        };
        //penambahan variable dan funsi marker

        function initMap() {
            infowindow = new google.maps.InfoWindow();
            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        ";
        require_once "admin/class/class_db.php";
        $db = new database();
        
        $hippam_id = $_POST['id'];

        //DRAW PIPA
        $sql_pipa = "SELECT * 
                FROM pipa 
                WHERE hippam_id='$hippam_id'";
        $data_pipa = $db->fetchdata($sql_pipa);
        $i = 0;
        foreach($data_pipa as $dat_pipa){
            echo "var flightPlanCoordinates_".$i." = [";
            $sql_koor = "SELECT * FROM pipa_koordinat
                        WHERE pipa_id='".$dat_pipa['id']."' ORDER BY `id_urut` ";
            $jml_koor = $db->jumrec($sql_koor);
            $data_koor = $db->fetchdata($sql_koor);
            $j = 0;
            $k = 0;
          
            foreach ($data_koor as $dat_koor) {
                echo "new google.maps.LatLng(".$dat_koor['latitude'].",".$dat_koor['longitude'].")";
                if($j<$jml_koor)
                    echo ",";
                $center_lat = $dat_koor['latitude'];
                $center_long = $dat_koor['longitude'];
                $j++;
            }

            switch($dat_pipa['pipa_jenis_id']){
                //pvc
                case '0900' : $color = '#663300'; break; //coklat
                case '0800' : $color = '#ff9900'; break; //oren
                case '0600' : $color = '#0000FF'; break; //biru
                case '0400' : $color = '#00FF00'; break; //ijo
                case '0300' : $color = '#6600cc'; break; //ungu
                case '0200' : $color = '#FFFF00'; break; //kuning
                case '0150' : $color = '#FF0000'; break; //merah
                case '0100' : $color = '#000000'; break; //hitam
                case '0075' : $color = '#8A8A8A'; break; //abu
                case '0050' : $color = '#669999'; break; //cyan tua
                
                //gl
                case '1900' : $color = '#cc9900'; break; //coklat muda
                case '1800' : $color = '#66ffff'; break; //cyan
                case '1600' : $color = '#66ccff'; break; //biru muda
                case '1400' : $color = '#99ffcc'; break; //ijo muda
                case '1300' : $color = '#9999ff'; break; //ungu muda
                case '1200' : $color = '#FF00FF'; break; //purple
                case '1150' : $color = '#ff3399'; break; //merah muda
                case '1100' : $color = '#999966'; break; //butek
                case '1075' : $color = '#993333'; break; //merah hitam
                case '1050' : $color = '#006600'; break; //ijo hitam
            }

            echo "];
  
                var flightPath_".$i." = new google.maps.Polyline({
                  path: flightPlanCoordinates_".$i.",
                  geodesic: true,
                  strokeColor: '$color',
                  strokeOpacity: 1.0,
                  strokeWeight: 2
                }); 
              flightPath_".$i.".setMap(map);
              ";

              foreach ($data_koor as $dat_koor) {
                    if($k<$jml_koor)
                    echo "
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(".$dat_koor['latitude'].",".$dat_koor['longitude']."),
                            map: map,
                            label: '".$k."',
                            html: document.getElementById('form2')
                        });
            
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                $('#idd').val('".$dat_koor['id']."');
                                $('#pipa_id').val('".$dat_koor['pipa_id']."');
                                $('#form2').show();
                                infowindow.setContent(marker.html);
                                infowindow.open(map, marker);
                            }
                        })(marker, ".$k."));
                        ";
                    $k++;
                    // ini perulangan foreach marker
                }

            $i++;

        }

        echo "
        }
        // ini penutup initialize
        
        var mapOptions = {
            zoom: 15,
            center: {lat: ". $center_lat .", lng: ". $center_long ."}
        };

        //penambahan funsi setelah klik edit
            function editData() {
                // infowindow.close();
                var id_old = document.getElementById('idd').value;

                google.maps.event.addListener(map, 'click', function(e) {
                    console.log(id_old);

                    var lat = e.latLng.lat(); // lat of clicked point
                    var lng = e.latLng.lng(); // lng of clicked point
                    var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
                    var marker = new google.maps.Marker({
                        position: getLatLng(lat, lng),
                        map: map,
                        animation: google.maps.Animation.DROP,
                        id: 'marker_' + markerId,
                        html: '    <div id=\"info_'+markerId+'\">' +
                        '        <table class=\"map1\">' +
                        '<tr><input value=\"'+id_old+'\" name=\"idd\" type=\"text\" id=\"idd\"/></tr>'+
                        '            <tr><td></td><td><input type=\"button\" value=\"Save\" onclick=\"saveEditData('+lat+','+lng+')\"/></td></tr>' +
                        '        </table>' +
                        '    </div>'
                    });
                    markers[markerId] = marker; // cache marker in markers object
                    bindMarkerEvents(marker); // bind right click event to marker
                    bindMarkerinfo(marker); // bind infowindow with click event to marker
                });
                // remove markernya
                
            }
            //penambahan funsi setelah klik edit
        
            //penambahan funsi insert marker
            function insertData() {
                // infowindow.close();
                var id = document.getElementById('idd').value;

                google.maps.event.addListener(map, 'click', function(e) {

                    var lat = e.latLng.lat(); // lat of clicked point
                    var lng = e.latLng.lng(); // lng of clicked point
                    var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
                    var marker = new google.maps.Marker({
                        position: getLatLng(lat, lng),
                        map: map,
                        animation: google.maps.Animation.DROP,
                        id: 'marker_' + markerId,
                        html: '    <div id=\"info_'+markerId+'\">' +
                        '        <table class=\"map1\">' +
                        '<tr><input value=\"'+id+'\" name=\"idd\" type=\"text\" id=\"idd\"/></tr>'+
                        '            <tr><td></td><td><input type=\"button\" value=\"Save\" onclick=\"saveInsertData('+lat+','+lng+')\"/></td></tr>' +
                        '        </table>' +
                        '    </div>'
                    });
                    markers[markerId] = marker; // cache marker in markers object
                    bindMarkerEvents(marker); // bind right click event to marker
                    bindMarkerinfo(marker); // bind infowindow with click event to marker
                });
                // remove markernya
            }
            //penambahan funsi insert marker

            //penambahan funsi setelah klik new
            function newData() {
                // infowindow.close();
                var pipa_id = document.getElementById('pipa_id').value;

                google.maps.event.addListener(map, 'click', function(e) {

                    var lat = e.latLng.lat(); // lat of clicked point
                    var lng = e.latLng.lng(); // lng of clicked point
                    var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
                    var marker = new google.maps.Marker({
                        position: getLatLng(lat, lng),
                        map: map,
                        animation: google.maps.Animation.DROP,
                        id: 'marker_' + markerId,
                        html: '    <div id=\"info_'+markerId+'\">' +
                        '        <table class=\"map1\">' +
                        '<tr><input value=\"'+pipa_id+'\" name=\"pipa_id\" type=\"text\" id=\"pipa_id\"/></tr>'+
                        '            <tr><td></td><td><input type=\"button\" value=\"Save\" onclick=\"saveNewData('+lat+','+lng+')\"/></td></tr>' +
                        '        </table>' +
                        '    </div>'
                    });
                    markers[markerId] = marker; // cache marker in markers object
                    bindMarkerEvents(marker); // bind right click event to marker
                    bindMarkerinfo(marker); // bind infowindow with click event to marker
                });
                // remove markernya
                
            }
            //penambahan funsi setelah klik new


            // penambahan funsi tambahan marker
            var bindMarkerinfo = function(marker) {
                google.maps.event.addListener(marker, 'click', function (point) {
                    var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
                    var marker = markers[markerId]; // find marker
                    infowindow = new google.maps.InfoWindow();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                    // removeMarker(marker, markerId); // remove it
                });
            };
            var bindMarkerEvents = function(marker) {
                google.maps.event.addListener(marker, 'rightclick', function (point) {
                    var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
                    var marker = markers[markerId]; // find marker
                    removeMarker(marker, markerId); // remove it
                });
            };

            var removeMarker = function(marker, markerId) {
                marker.setMap(null); // set markers setMap to null to remove it from map
                delete markers[markerId]; // delete marker instance from markers object
            };
            // penambahan funsi tambahan marker


            // penambahan fun editLine
            function editLine() {
                var id = document.getElementById('idd').value;
                var pipa_id = document.getElementById('pipa_id').value;
                var jumlah
                //ambil jumlah rownya
                var url = '../../../../locations_model.php?jumlah_row&pipa_id=' + pipa_id+ '&id=' + id;
                console.log(url);
                downloadUrl(url, function(data, responseCode) {
                    if (responseCode === 200  && data.length > 0) {
                        var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '../../../../ambil_data.php?editmap',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });
                        // infowindow.close();
                        // window.location.reload(true);
                    }else{
                        console.log(responseCode);
                        console.log(data);
                    }
                });
            }
            // penambahan fun editLine

            //penambahan save edit setelah pilih markerbaru
            function saveEditData(lat,lng) {
                // var description = document.getElementById('manual_description').value;
                var id_old = document.getElementById('idd').value;

                var url = '../../../../locations_model.php?confirm_location&id=' + id_old + '&lat=' + lat + '&lng=' + lng;
                console.log(url);
                downloadUrl(url, function(data, responseCode) {
                    if (responseCode === 200  && data.length > 1) {
                        var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '../../../../ambil_data.php?editmap',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });
                        // infowindow.close();
                        // window.location.reload(true);
                    }else{
                        console.log(responseCode);
                        console.log(data);
                        infowindow.setContent('<div style=\"color: red; font-size: 25px;\">Updating Errors</div>');
                    }
                });
            }
            //penambahan save edit setelah pilih markerbaru

            //penambahan save Insert setelah pilih insert markerbaru
            function saveInsertData(lat,lng) {
                // var description = document.getElementById('manual_description').value;
                var id = document.getElementById('idd').value;

                var url = '../../../../locations_model.php?insert_location&id=' + id + '&lat=' + lat + '&lng=' + lng;
                // console.log(url);
                downloadUrl(url, function(data, responseCode) {
                    if (responseCode === 200) {
                        var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '../../../../ambil_data.php?editmap',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });
                        // infowindow.close();
                        // window.location.reload(true);
                    }else{
                        console.log(responseCode);
                        console.log(data);
                        infowindow.setContent('<div style=\"color: red; font-size: 25px;\">Updating Errors</div>');
                    }
                });
            }
            //penambahan save Insert setelah pilih insert markerbaru

            //penambahan save new setelah pilih markerbaru
            function saveNewData(lat,lng) {
                var pipa_id = document.getElementById('pipa_id').value;

                var url = '../../../../locations_model.php?confirm_new_location&pipa_id=' + pipa_id + '&lat=' + lat + '&lng=' + lng;
                console.log(url);
                downloadUrl(url, function(data, responseCode) {
                    if (responseCode === 200) {
                        var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '../../../../ambil_data.php?editmap',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });
                        // infowindow.close();
                        // window.location.reload(true);
                    }else{
                        console.log(responseCode);
                        console.log(data);
                    }
                });
            }
            //penambahan save new setelah pilih markerbaru

            //penambahan delete marker
            function deleteData() {
                var id = document.getElementById('idd').value;

                var url = '../../../../locations_model.php?delete_location&id=' + id;
                console.log(url);
                downloadUrl(url, function(data, responseCode) {
                    if (responseCode === 200) {
                        var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '../../../../ambil_data.php?editmap',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });
                        // infowindow.close();
                        // window.location.reload(true);
                    }else{
                        console.log(responseCode);
                        console.log(data);
                    }
                });
            }
            //penambahan delete marker

            function downloadUrl(url, callback) {
                var request = window.ActiveXObject ?
                    new ActiveXObject('Microsoft.XMLHTTP') :
                    new XMLHttpRequest;

                request.onreadystatechange = function() {
                    if (request.readyState == 4) {
                        callback(request.responseText, request.status);
                    }
                };

                request.open('GET', url, true);
                request.send(null);
            }

            </script>

            <div style='display: none' id='form2'>
                <table class='map1'>
                    <tr>
                        <input name='idd' type='text' id='idd'/>
                        <input name='pipa_id' type='text' id='pipa_id'/>
                    </tr>

                    <tr>
                        <td><input type='button' value='New Line' onclick='editLine()'/></td>
                        <td><input type='button' value='Insert Marker' onclick='insertData()'/></td>
                        <td><input type='button' value='Edit Marker' onclick='editData()'/></td>
                        <td><input type='button' value='New Marker' onclick='newData()'/></td>
                        <td><input type='button' value='Delete Marker' onclick='deleteData()'/></td>
                    </tr>
                </table>
            </div>
        
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20&callback=initMap'></script>

    ";
    }

    function editmapdetail(){

        include('config.php');
        include($doc_root_class.'class_custom.php');
        $cst = new custom;

        echo "

        <div id='map-canvas'></div>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

        <style>
        #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
        }
        </style>

        <script>
        var map;
        var marker;
        var infowindow;

        //penambahan variable dan funsi marker
        var markers = {};
        var getMarkerUniqueId= function(lat, lng) {
            return lat + '_' + lng;
        };
        var getLatLng = function(lat, lng) {
            return new google.maps.LatLng(lat, lng);
        };
        //penambahan variable dan funsi marker

        function initMap() {
            infowindow = new google.maps.InfoWindow();
            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        ";
        require_once "admin/class/class_db.php";
        $db = new database();
        
        $id_pipa = $_POST['id'];

        //DRAW PIPA
        $sql_pipa = "SELECT * 
              FROM pipa 
              WHERE id='$id_pipa'";
        $data_pipa = $db->fetchdata($sql_pipa);
        $i = 0;
        foreach($data_pipa as $dat_pipa){
            echo "var flightPlanCoordinates_".$i." = [";
            $sql_koor = "SELECT * FROM pipa_koordinat
                        WHERE pipa_id='".$dat_pipa['id']."' ORDER BY `id_urut` ";
            $jml_koor = $db->jumrec($sql_koor);
            $data_koor = $db->fetchdata($sql_koor);
            $j = 0;
            $k = 0;
          
            foreach ($data_koor as $dat_koor) {
                echo "new google.maps.LatLng(".$dat_koor['latitude'].",".$dat_koor['longitude'].")";
                if($j<$jml_koor)
                    echo ",";
                $center_lat = $dat_koor['latitude'];
                $center_long = $dat_koor['longitude'];
                $j++;
            }

            switch($dat_pipa['pipa_jenis_id']){
                //pvc
                case '0900' : $color = '#663300'; break; //coklat
                case '0800' : $color = '#ff9900'; break; //oren
                case '0600' : $color = '#0000FF'; break; //biru
                case '0400' : $color = '#00FF00'; break; //ijo
                case '0300' : $color = '#6600cc'; break; //ungu
                case '0200' : $color = '#FFFF00'; break; //kuning
                case '0150' : $color = '#FF0000'; break; //merah
                case '0100' : $color = '#000000'; break; //hitam
                case '0075' : $color = '#8A8A8A'; break; //abu
                case '0050' : $color = '#669999'; break; //cyan tua
                
                //gl
                case '1900' : $color = '#cc9900'; break; //coklat muda
                case '1800' : $color = '#66ffff'; break; //cyan
                case '1600' : $color = '#66ccff'; break; //biru muda
                case '1400' : $color = '#99ffcc'; break; //ijo muda
                case '1300' : $color = '#9999ff'; break; //ungu muda
                case '1200' : $color = '#FF00FF'; break; //purple
                case '1150' : $color = '#ff3399'; break; //merah muda
                case '1100' : $color = '#999966'; break; //butek
                case '1075' : $color = '#993333'; break; //merah hitam
                case '1050' : $color = '#006600'; break; //ijo hitam
            }

            echo "];
  
                var flightPath_".$i." = new google.maps.Polyline({
                  path: flightPlanCoordinates_".$i.",
                  geodesic: true,
                  strokeColor: '$color',
                  strokeOpacity: 1.0,
                  strokeWeight: 2
                }); 
              flightPath_".$i.".setMap(map);
              ";

              foreach ($data_koor as $dat_koor) {
                    if($k<$jml_koor)
                    echo "
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(".$dat_koor['latitude'].",".$dat_koor['longitude']."),
                            map: map,
                            label: '".$k."',
                            html: document.getElementById('form2')
                        });
            
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                $('#idd').val('".$dat_koor['id']."');
                                $('#pipa_id').val('".$dat_koor['pipa_id']."');
                                $('#form2').show();
                                infowindow.setContent(marker.html);
                                infowindow.open(map, marker);
                            }
                        })(marker, ".$k."));
                        ";
                    $k++;
                    // ini perulangan foreach marker
                }

            $i++;

        }

        echo "
        }
        // ini penutup initialize
        
        var mapOptions = {
            zoom: 15,
            center: {lat: ". $center_lat .", lng: ". $center_long ."}
        };

        //penambahan funsi setelah klik edit
            function editData() {
                // infowindow.close();
                var id_old = document.getElementById('idd').value;

                google.maps.event.addListener(map, 'click', function(e) {
                    console.log(id_old);

                    var lat = e.latLng.lat(); // lat of clicked point
                    var lng = e.latLng.lng(); // lng of clicked point
                    var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
                    var marker = new google.maps.Marker({
                        position: getLatLng(lat, lng),
                        map: map,
                        animation: google.maps.Animation.DROP,
                        id: 'marker_' + markerId,
                        html: '    <div id=\"info_'+markerId+'\">' +
                        '        <table class=\"map1\">' +
                        '<tr><input value=\"'+id_old+'\" name=\"idd\" type=\"text\" id=\"idd\"/></tr>'+
                        '            <tr><td></td><td><input type=\"button\" value=\"Save\" onclick=\"saveEditData('+lat+','+lng+')\"/></td></tr>' +
                        '        </table>' +
                        '    </div>'
                    });
                    markers[markerId] = marker; // cache marker in markers object
                    bindMarkerEvents(marker); // bind right click event to marker
                    bindMarkerinfo(marker); // bind infowindow with click event to marker
                });
                // remove markernya
                
            }
            //penambahan funsi setelah klik edit
        
            //penambahan funsi insert marker
            function insertData() {
                // infowindow.close();
                var id = document.getElementById('idd').value;

                google.maps.event.addListener(map, 'click', function(e) {

                    var lat = e.latLng.lat(); // lat of clicked point
                    var lng = e.latLng.lng(); // lng of clicked point
                    var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
                    var marker = new google.maps.Marker({
                        position: getLatLng(lat, lng),
                        map: map,
                        animation: google.maps.Animation.DROP,
                        id: 'marker_' + markerId,
                        html: '    <div id=\"info_'+markerId+'\">' +
                        '        <table class=\"map1\">' +
                        '<tr><input value=\"'+id+'\" name=\"idd\" type=\"text\" id=\"idd\"/></tr>'+
                        '            <tr><td></td><td><input type=\"button\" value=\"Save\" onclick=\"saveInsertData('+lat+','+lng+')\"/></td></tr>' +
                        '        </table>' +
                        '    </div>'
                    });
                    markers[markerId] = marker; // cache marker in markers object
                    bindMarkerEvents(marker); // bind right click event to marker
                    bindMarkerinfo(marker); // bind infowindow with click event to marker
                });
                // remove markernya
            }
            //penambahan funsi insert marker

            //penambahan funsi setelah klik new
            function newData() {
                // infowindow.close();
                var pipa_id = document.getElementById('pipa_id').value;

                google.maps.event.addListener(map, 'click', function(e) {

                    var lat = e.latLng.lat(); // lat of clicked point
                    var lng = e.latLng.lng(); // lng of clicked point
                    var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
                    var marker = new google.maps.Marker({
                        position: getLatLng(lat, lng),
                        map: map,
                        animation: google.maps.Animation.DROP,
                        id: 'marker_' + markerId,
                        html: '    <div id=\"info_'+markerId+'\">' +
                        '        <table class=\"map1\">' +
                        '<tr><input value=\"'+pipa_id+'\" name=\"pipa_id\" type=\"text\" id=\"pipa_id\"/></tr>'+
                        '            <tr><td></td><td><input type=\"button\" value=\"Save\" onclick=\"saveNewData('+lat+','+lng+')\"/></td></tr>' +
                        '        </table>' +
                        '    </div>'
                    });
                    markers[markerId] = marker; // cache marker in markers object
                    bindMarkerEvents(marker); // bind right click event to marker
                    bindMarkerinfo(marker); // bind infowindow with click event to marker
                });
                // remove markernya
                
            }
            //penambahan funsi setelah klik new


            // penambahan funsi tambahan marker
            var bindMarkerinfo = function(marker) {
                google.maps.event.addListener(marker, 'click', function (point) {
                    var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
                    var marker = markers[markerId]; // find marker
                    infowindow = new google.maps.InfoWindow();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                    // removeMarker(marker, markerId); // remove it
                });
            };
            var bindMarkerEvents = function(marker) {
                google.maps.event.addListener(marker, 'rightclick', function (point) {
                    var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
                    var marker = markers[markerId]; // find marker
                    removeMarker(marker, markerId); // remove it
                });
            };

            var removeMarker = function(marker, markerId) {
                marker.setMap(null); // set markers setMap to null to remove it from map
                delete markers[markerId]; // delete marker instance from markers object
            };
            // penambahan funsi tambahan marker


            // penambahan fun editLine
            function editLine() {
                var id = document.getElementById('idd').value;
                var pipa_id = document.getElementById('pipa_id').value;
                var jumlah
                //ambil jumlah rownya
                var url = '../../../../locations_model.php?jumlah_row&pipa_id=' + pipa_id+ '&id=' + id;
                console.log(url);
                downloadUrl(url, function(data, responseCode) {
                    if (responseCode === 200  && data.length > 0) {
                        var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '../../../../ambil_data.php?editmapdetail',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });
                        // infowindow.close();
                        // window.location.reload(true);
                    }else{
                        console.log(responseCode);
                        console.log(data);
                    }
                });
            }
            // penambahan fun editLine

            //penambahan save edit setelah pilih markerbaru
            function saveEditData(lat,lng) {
                // var description = document.getElementById('manual_description').value;
                var id_old = document.getElementById('idd').value;

                var url = '../../../../locations_model.php?confirm_location&id=' + id_old + '&lat=' + lat + '&lng=' + lng;
                console.log(url);
                downloadUrl(url, function(data, responseCode) {
                    if (responseCode === 200  && data.length > 1) {
                        var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '../../../../ambil_data.php?editmapdetail',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });
                        // infowindow.close();
                        // window.location.reload(true);
                    }else{
                        console.log(responseCode);
                        console.log(data);
                        infowindow.setContent('<div style=\"color: red; font-size: 25px;\">Updating Errors</div>');
                    }
                });
            }
            //penambahan save edit setelah pilih markerbaru

            //penambahan save Insert setelah pilih insert markerbaru
            function saveInsertData(lat,lng) {
                // var description = document.getElementById('manual_description').value;
                var id = document.getElementById('idd').value;

                var url = '../../../../locations_model.php?insert_location&id=' + id + '&lat=' + lat + '&lng=' + lng;
                // console.log(url);
                downloadUrl(url, function(data, responseCode) {
                    if (responseCode === 200) {
                        var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '../../../../ambil_data.php?editmapdetail',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });
                        // infowindow.close();
                        // window.location.reload(true);
                    }else{
                        console.log(responseCode);
                        console.log(data);
                        infowindow.setContent('<div style=\"color: red; font-size: 25px;\">Updating Errors</div>');
                    }
                });
            }
            //penambahan save Insert setelah pilih insert markerbaru

            //penambahan save new setelah pilih markerbaru
            function saveNewData(lat,lng) {
                var pipa_id = document.getElementById('pipa_id').value;

                var url = '../../../../locations_model.php?confirm_new_location&pipa_id=' + pipa_id + '&lat=' + lat + '&lng=' + lng;
                console.log(url);
                downloadUrl(url, function(data, responseCode) {
                    if (responseCode === 200) {
                        var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '../../../../ambil_data.php?editmapdetail',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });
                        // infowindow.close();
                        // window.location.reload(true);
                    }else{
                        console.log(responseCode);
                        console.log(data);
                    }
                });
            }
            //penambahan save new setelah pilih markerbaru

            //penambahan delete marker
            function deleteData() {
                var id = document.getElementById('idd').value;

                var url = '../../../../locations_model.php?delete_location&id=' + id;
                console.log(url);
                downloadUrl(url, function(data, responseCode) {
                    if (responseCode === 200) {
                        var id_hippam = document.getElementById('idhippam').value;
                          $.ajax({
                              url: '../../../../ambil_data.php?editmapdetail',
                              type: 'post',
                              data: {id:id_hippam},             
                              success: function(data) {               
                              $('#mapview').html(data);
                              console.log(data);
                              }
                          });
                        // infowindow.close();
                        // window.location.reload(true);
                    }else{
                        console.log(responseCode);
                        console.log(data);
                    }
                });
            }
            //penambahan delete marker

            function downloadUrl(url, callback) {
                var request = window.ActiveXObject ?
                    new ActiveXObject('Microsoft.XMLHTTP') :
                    new XMLHttpRequest;

                request.onreadystatechange = function() {
                    if (request.readyState == 4) {
                        callback(request.responseText, request.status);
                    }
                };

                request.open('GET', url, true);
                request.send(null);
            }

            </script>

            <div style='display: none' id='form2'>
                <table class='map1'>
                    <tr>
                        <input name='idd' type='text' id='idd'/>
                        <input name='pipa_id' type='text' id='pipa_id'/>
                    </tr>

                    <tr>
                        <td><input type='button' value='New Line' onclick='editLine()'/></td>
                        <td><input type='button' value='Insert Marker' onclick='insertData()'/></td>
                        <td><input type='button' value='Edit Marker' onclick='editData()'/></td>
                        <td><input type='button' value='New Marker' onclick='newData()'/></td>
                        <td><input type='button' value='Delete Marker' onclick='deleteData()'/></td>
                    </tr>
                </table>
            </div>
        
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20&callback=initMap'></script>

    ";
    }

    function showmapdetail()
    {
        echo "
        <div id='map-canvas'></div>

        <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        ";
        require_once "admin/class/class_db.php";
        $db = new database();
        
        $id_pipa = $_POST['id'];

        //DRAW PIPA
        $sql_pipa = "SELECT * 
              FROM pipa 
              WHERE id='$id_pipa'";
        $data_pipa = $db->fetchdata($sql_pipa);
        $i = 0;
        foreach($data_pipa as $dat_pipa){
            echo "var flightPlanCoordinates_".$i." = [";
            $sql_koor = "SELECT * FROM pipa_koordinat
                        WHERE pipa_id='".$dat_pipa['id']."' ORDER BY `id_urut` ";
            $jml_koor = $db->jumrec($sql_koor);
            $data_koor = $db->fetchdata($sql_koor);
            $j = 0;
            $k = 0;
          
            foreach ($data_koor as $dat_koor) {
                echo "new google.maps.LatLng(".$dat_koor['latitude'].",".$dat_koor['longitude'].")";
                if($j<$jml_koor)
                    echo ",";
                $center_lat = $dat_koor['latitude'];
                $center_long = $dat_koor['longitude'];
                $j++;
            }

            switch($dat_pipa['pipa_jenis_id']){
                //pvc
                case '0900' : $color = '#663300'; break; //coklat
                case '0800' : $color = '#ff9900'; break; //oren
                case '0600' : $color = '#0000FF'; break; //biru
                case '0400' : $color = '#00FF00'; break; //ijo
                case '0300' : $color = '#6600cc'; break; //ungu
                case '0200' : $color = '#FFFF00'; break; //kuning
                case '0150' : $color = '#FF0000'; break; //merah
                case '0100' : $color = '#000000'; break; //hitam
                case '0075' : $color = '#8A8A8A'; break; //abu
                case '0050' : $color = '#669999'; break; //cyan tua
                
                //gl
                case '1900' : $color = '#cc9900'; break; //coklat muda
                case '1800' : $color = '#66ffff'; break; //cyan
                case '1600' : $color = '#66ccff'; break; //biru muda
                case '1400' : $color = '#99ffcc'; break; //ijo muda
                case '1300' : $color = '#9999ff'; break; //ungu muda
                case '1200' : $color = '#FF00FF'; break; //purple
                case '1150' : $color = '#ff3399'; break; //merah muda
                case '1100' : $color = '#999966'; break; //butek
                case '1075' : $color = '#993333'; break; //merah hitam
                case '1050' : $color = '#006600'; break; //ijo hitam
            }

            echo "];
  
                var flightPath_".$i." = new google.maps.Polyline({
                  path: flightPlanCoordinates_".$i.",
                  geodesic: true,
                  strokeColor: '$color',
                  strokeOpacity: 1.0,
                  strokeWeight: 2
                }); 
              flightPath_".$i.".setMap(map);
              ";

        //     $i++;

        // }

        //DRAW BRONCAP
        $sql_broncap = "SELECT nama, latitude, longitude 
                        FROM broncap 
                        WHERE hippam_id='".$dat_pipa['hippam_id']."'";
        $data_broncap = $db->fetchdata($sql_broncap);
        foreach($data_broncap as $dat_broncap){
        echo "
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(".$dat_broncap['latitude'].", ".$dat_broncap['longitude']."),
            title: '".$dat_broncap['nama']."',
            map: map,
            icon: 'http://ds.gispipa.genteng.konseparsitek.com/assets/pics/broncap.png'
        });";
        }

        //DRAW TANDON
        $sql_tandon = "SELECT nama, latitude, longitude 
        FROM tandon 
        WHERE hippam_id='".$dat_pipa['hippam_id']."'";
        $data_tandon = $db->fetchdata($sql_tandon);
        foreach($data_tandon as $dat_tandon){
        echo "
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(".$dat_tandon['latitude'].", ".$dat_tandon['longitude']."),
            title: '".$dat_tandon['nama']."',
            map: map,
            icon: 'http://ds.gispipa.genteng.konseparsitek.com/assets/pics/tandon.png'
        });";
        }

        $i++;

        }

        echo "
        }
        // ini penutup initialize
        
        var mapOptions = {
            zoom: 15,
            center: {lat: ". $center_lat .", lng: ". $center_long ."}
        };

        </script>
        
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCXBLaqWSYNMi2hJFeHZZcaotrPlveGL20&callback=initMap'></script>
    ";
    }
    
    function rasio(){
        
        require_once "admin/class/class_db.php";
        $db = new database();

        $id = $_GET['id'];

        $sql = "SELECT * 
                FROM hippam 
                WHERE id='$id'";
        $dat = $db->datasql($sql);
        
        $terlayani=$dat['terlayani'];
        $b_terlayani=$dat['belum_terlayani'];
        $jml=$terlayani+$b_terlayani;
        
        // $persen_terlayani=round($terlayani);
        // $persen_b_terlayani=round($b_terlayani);
        
        $persen_terlayani=number_format(($terlayani/$jml)* 100, 1);
        $persen_b_terlayani=number_format(($b_terlayani/$jml)* 100, 1);
        $persen_jml=$persen_terlayani+$persen_b_terlayani;

        echo "
        <div class='row'>
            <div class='col-lg-6'>
                <div class='content-panel'>
                    <p style='text-align: center;'>RASIO JUMLAH JIWA TERLAYANI</p>
                    <br>
                    <table class='table table-hover'>
                        <tr>
                            <td>Jumlah Jiwa Terlayani</td>
                            <td>:</td>
                            <td>".$persen_terlayani." %</td>
                        </tr>
                        <tr>
                            <td>Jumlah Jiwa Belum Terlayani</td>
                            <td>:</td>
                            <td>". $persen_b_terlayani." %</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>:</td>
                            <td>".$persen_jml." %</td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td></td><td></td><td></td>
                        </tr>
                        <tr>
                            <td>Jumlah Jiwa Terlayani</td>
                            <td>:</td>
                            <td>". $terlayani." Orang</td>
                        </tr>
                        <tr>
                            <td>Jumlah Jiwa Belum Terlayani</td>
                            <td>:</td>
                            <td>". $b_terlayani." Orang</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>:</td>
                            <td>".$jml." Orang</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class='col-lg-6'>
                <div class='content-panel'>
                <style>
                #chartdiv {
                  width: 100%;
                  height: 500px;
                }
                
                </style>
                
                <!-- Resources -->
                <script src='https://cdn.amcharts.com/lib/4/core.js'></script>
                <script src='https://cdn.amcharts.com/lib/4/charts.js'></script>
                <script src='https://cdn.amcharts.com/lib/4/themes/animated.js'></script>
                
                <!-- Chart code -->
                <script>
                am4core.ready(function() {
                
                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end
                
                // Create chart instance
                var chart = am4core.create('chartdiv', am4charts.PieChart);
                
                // Add data
                chart.data = [ {
                  'country': 'Terlayani',
                  'litres': ".$terlayani.",
                  'color': am4core.color('#55efc4')
                }, {
                  'country': 'Belum Terlayani',
                  'litres': ".$b_terlayani.",
                  'color': am4core.color('#ff7675')
                } ];
                
                // Add and configure Series
                var pieSeries = chart.series.push(new am4charts.PieSeries());
                pieSeries.dataFields.value = 'litres';
                pieSeries.dataFields.category = 'country';
                pieSeries.slices.template.stroke = am4core.color('#fff');
                pieSeries.slices.template.strokeWidth = 2;
                pieSeries.slices.template.strokeOpacity = 1;
                
                // This creates initial animation
                pieSeries.hiddenState.properties.opacity = 1;
                pieSeries.hiddenState.properties.endAngle = -90;
                pieSeries.hiddenState.properties.startAngle = -90;
                
                pieSeries.labels.template.disabled = true;
                pieSeries.ticks.template.disabled = true;
            
                pieSeries.slices.template.propertyFields.fill = 'color';
                chart.legend = new am4charts.Legend();
                }); // end am4core.ready()
                </script>
                
                <!-- HTML -->
                <div id='chartdiv'></div>
                </div>
            </div>
        </div>
        ";
    }
    
?>
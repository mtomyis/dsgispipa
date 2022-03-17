<?php

// require("db.php");

// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}
if(isset($_GET['confirm_location'])) {
    confirm_location();
}
if(isset($_GET['confirm_new_location'])) {
    confirm_new_location();
}
if(isset($_GET['delete_location'])) {
    delete_location();
}
if(isset($_GET['insert_location'])) {
    insert_location();
}
if(isset($_GET['jumlah_row'])) {
    jumlah_row();
}


function add_location(){
    $con=mysqli_connect ("localhost", 'arsitek_root', '11021980','arsitek_gispipa');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $description =$_GET['description'];
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO locations " .
        " (id, lat, lng, description) " .
        " VALUES (NULL, '%s', '%s', '%s');",
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng),
        mysqli_real_escape_string($con,$description));

    $result = mysqli_query($con,$query);
    echo"Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}
function confirm_location(){
    $con=mysqli_connect ("localhost", 'arsitek_root', '11021980','arsitek_gispipa');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $id =$_GET['id'];
    $lat =$_GET['lat'];
    $lng =$_GET['lng'];
//     echo "<script type='text/javascript'> 
//     console.log('hehe');
//  </script>"; 
    // update location with confirm if admin confirm.
    $query = "update pipa_koordinat set latitude = $lat, longitude = $lng WHERE id = '$id' ";
    // $query = "update pipa_koordinat set upd = 'hehe' WHERE id = '$id' ";

    $result = mysqli_query($con,$query);
    echo "Updated Successfully";
        if (!$result) {
            die('Invalid query: ' . mysqli_error($con));
        }
    }

function confirm_new_location(){
    require_once "admin/class/class_db.php";
    $db = new database();
    
    $pipa_id = $_GET['pipa_id'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];

    $sql = "SELECT MAX(id) as id FROM pipa_koordinat ORDER BY id";
    $dat = $db->datasql($sql);
    if($dat['id']=='')
            $dat['id'] = 0;
    $id = (int) $dat['id'];
    $id++;
    while(strlen($id)<11){
        $id = '0'.$id;
    }

    $sql = "SELECT MAX(id_urut) as id FROM pipa_koordinat ORDER BY id_urut";
    $dat = $db->datasql($sql);
    if($dat['id']=='')
            $dat['id'] = 0;
    $id_urut = (int) $dat['id'];
    $id_urut++;
    while(strlen($id_urut)<11){
        $id_urut = '0'.$id_urut;
    }

    // echo "".$pipa_id." ".$lat." ".$lng;
    $sqlinsert = "INSERT INTO pipa_koordinat 
    (id,pipa_id,latitude,longitude,crt,id_urut)
    VALUES (
    '$id','$pipa_id','$lat','$lng','admin','$id_urut'
    )";
    $db->sqlquery($sqlinsert);
}

function delete_location(){
    require_once "admin/class/class_db.php";
    $db = new database();
    
    $id = $_GET['id'];

    $sqlinsert = "DELETE from pipa_koordinat where id = '$id' ";
    $db->sqlquery($sqlinsert);
    // echo $sqlinsert;

}

// function get_confirmed_locations(){
//     $con=mysqli_connect ("localhost", 'arsitek_root', '','demo');
//     if (!$con) {
//         die('Not connected : ' . mysqli_connect_error());
//     }
//     // update location with location_status if admin location_status.
//     $sqldata = mysqli_query($con,"
// select id ,lat,lng,description,location_status as isconfirmed
// from locations WHERE  location_status = 1
//   ");

//     $rows = array();

//     while($r = mysqli_fetch_assoc($sqldata)) {
//         $rows[] = $r;

//     }

//     $indexed = array_map('array_values', $rows);
//     //  $array = array_filter($indexed);

//     echo json_encode($indexed);
//     if (!$rows) {
//         return null;
//     }
// }
// function get_all_locations(){
//     $con=mysqli_connect ("localhost", 'arsitek_root', '','demo');
//     if (!$con) {
//         die('Not connected : ' . mysqli_connect_error());
//     }
//     // update location with location_status if admin location_status.
//     $sqldata = mysqli_query($con,"
// select id ,lat,lng,description,location_status as isconfirmed
// from locations
//   ");

//     $rows = array();
//     while($r = mysqli_fetch_assoc($sqldata)) {
//         $rows[] = $r;

//     }
//   $indexed = array_map('array_values', $rows);
//   //  $array = array_filter($indexed);

//     echo json_encode($indexed);
//     if (!$rows) {
//         return null;
//     }
// }
function jumlah_row(){
    
    require_once "admin/class/class_db.php";
    $db = new database();
    
    $pipa_id = $_GET['pipa_id'];
    $id = $_GET['id'];

    $sql_pipa = "SELECT * 
    FROM pipa_koordinat
    WHERE pipa_id='$pipa_id' ORDER BY id_urut";
    $jml_koor = $db->jumrec($sql_pipa);
    $data_koor = $db->fetchdata($sql_pipa);
    $j=1;
    $no_marker = 0;
    // cari markernya di nomer berapa
    foreach ($data_koor as $dat_koor) {
        // echo "$id ".$dat_koor['id'];
        if ($dat_koor['id'] == $id){
            $no_marker = $j;
        }
        // if ($j<$jml_koor)
        $j++;
    }
    // echo $no_marker;
    //ambil id urut dari pipa
    $sql = "SELECT MAX(id) as id FROM pipa ORDER BY id";
    $dat = $db->datasql($sql);
    if($dat['id']=='')
            $dat['id'] = 0;
    $idurut = (int) $dat['id'];
    $idurut++;
    while(strlen($idurut)<5){
        $idurut = '0'.$idurut;
    }
    // echo $idurut;
    //select pipa sesuai id dari marker
    $sqlid = "SELECT * FROM pipa WHERE id = '$pipa_id'";
    $dat = $db->datasql($sqlid);
    // echo $dat['nama'];
    //insert
    $sqlinsert = "INSERT INTO pipa 
    (id,hippam_id,nama,pipa_jenis_id,keterangan,crt)
    VALUES (
    '$idurut','".$dat['hippam_id']."','".$dat['nama']."','".$dat['pipa_jenis_id']."','".$dat['keterangan']."','".$dat['crt']."'
    )";
    $db->sqlquery($sqlinsert);

    //looping update pipa idnya jika array id koordinate melebihi marker yang diklik
    $arr=1;
    foreach ($data_koor as $dat_koor) {
        if ($arr>=$no_marker) {
            $sql = "UPDATE pipa_koordinat SET pipa_id='$idurut' WHERE id='".$dat_koor['id']."'";
            $db->sqlquery($sql);
            echo $dat_koor['id'];
        }
        $arr++;
    }
}

function insert_location(){
    require_once "admin/class/class_db.php";
    $db = new database();
    
    $getid = $_GET['id'];
    $getlat = $_GET['lat'];
    $getlng = $_GET['lng'];


    $sql_pipa = "SELECT * 
    FROM pipa_koordinat ORDER BY `id_urut`";
    $jml_koor = $db->jumrec($sql_pipa);
    $data_koor = $db->fetchdata($sql_pipa);
    $j=1;
    $no_marker = 0;
    // cari markernya di nomer berapa
    foreach ($data_koor as $dat_koor) {
        // echo "$id ".$dat_koor['id'];
        if ($dat_koor['id'] == $getid){
            $no_marker = $j;
        }
        // if ($j<$jml_koor)
        $j++;
    }
    // echo $no_marker;

    //penambahan jika >= array marker maka di update tambah 1 angka id urutnya
    $arr=1;
    foreach ($data_koor as $dat_koor) {
        if ($arr>=$no_marker) {
            //select id urutnya dan tambahkan 1 angka
            $sql = "SELECT id_urut as id_urutkan FROM pipa_koordinat WHERE id = '".$dat_koor['id']."' ";
            $dat = $db->datasql($sql);
            if($dat['id_urutkan']=='')
                    $dat['id_urutkan'] = 0;
            $id_urut = (int) $dat['id_urutkan'];
            $id_urut++;
            while(strlen($id_urut)<11){
                $id_urut = '0'.$id_urut;
            }

            //update sesuai id pipa koordinat nya
            $sql = "UPDATE pipa_koordinat SET id_urut='$id_urut' WHERE id='".$dat_koor['id']."'";
            $db->sqlquery($sql);
        }
        $arr++;
    }
    
    // setelah di update maka insert replace
    //ambil id dari pipa koordinat
    $sql = "SELECT MAX(id) as id FROM pipa_koordinat ORDER BY id";
    $dat = $db->datasql($sql);
    if($dat['id']=='')
            $dat['id'] = 0;
    $id = (int) $dat['id'];
    $id++;
    while(strlen($id)<11){
        $id = '0'.$id;
    }

    //ambil id urut untuk digantikan
    $sql = "SELECT * FROM pipa_koordinat where id = '$getid'";
    $data = $db->datasql($sql);
    if($data['id_urut']=='')
            $data['id_urut'] = 0;
    $id_urut_insrt = (int) $data['id_urut']-1;
    while(strlen($id_urut_insrt)<11){
        $id_urut_insrt = '0'.$id_urut_insrt;
    }
    $crt_insrt = $data['crt'];
    $pipa_id_insrt = $data['pipa_id'];

    $sqlinsert = "INSERT INTO pipa_koordinat 
    (id,pipa_id,latitude,longitude,crt,id_urut)
    VALUES (
    '$id','$pipa_id_insrt',$getlat,$getlng,'$crt_insrt','$id_urut_insrt'
    )";
    $db->sqlquery($sqlinsert);
    echo $sqlinsert;
}

function array_flatten($array) {
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        }
        else {
            $result[$key] = $value;
        }
    }
    return $result;
}

?>
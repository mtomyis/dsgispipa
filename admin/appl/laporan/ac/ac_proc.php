<?php
include '../../../script_awal.php';
include $doc_root."log.php";
include $doc_root_class.'class_input_form.php';
$frm = new input_form();
include $doc_root_class.'class_no_doc.php';
$no_doc  = new no_document();
include $doc_root_class.'class_custom.php';
$cst = new custom(); 
include $doc_root_class.'class_date.php';
$date  = new date();

//============================ CHAIN COMBOBOX ======================================
if($_GET['action'] == "unit" && isset($_GET['action'])){
    $perusahaan_id = $_GET['perusahaan_id'];
        
    $sql = "SELECT * FROM unit WHERE perusahaan_id='".$perusahaan_id."' ORDER BY nama";
    $data = $db->fetchdata($sql);
    echo "<option value=''>Pilih</option>";
    foreach ($data as $dat) {
        echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";
    }
}
if($_GET['action'] == "gedung" && isset($_GET['action'])){
    $unit_id = $_GET['unit_id'];
        
    $sql = "SELECT * FROM gedung WHERE unit_id='".$unit_id."' ORDER BY nama";
    $data = $db->fetchdata($sql);
    echo "<option value=''>Pilih</option>";
    foreach ($data as $dat) {
        echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";
    }
}
if($_GET['action'] == "ruang" && isset($_GET['action'])){
    $gedung_id = $_GET['gedung_id'];
        
    $sql = "SELECT * FROM ruang WHERE gedung_id='".$gedung_id."' ORDER BY nama";
    $data = $db->fetchdata($sql);
    echo "<option value=''>Pilih</option>";
    foreach ($data as $dat) {
        echo "<option value='".$dat['id']."'>".$dat['nama']."</option>";
    }
}


?>
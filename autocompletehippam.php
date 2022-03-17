<?php
// require_once "admin/class/class_db.php";
// $db = new database();

$host="localhost";
$user="root";
$password="";
$db="gis_pipa";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	  die("Koneksi gagal:".mysqli_connect_error());
}

// include "koneksi.php"; //Include file koneksi
$searchTerm = $_GET['term']; // Menerima kiriman data dari inputan pengguna

// SELECT HP.id, HP.nama, DS.kode FROM hippam HP JOIN desa DS ON HP.desa_kode=DS.kode WHERE DS.kecamatan_id='".$dat['id']."

$sql="SELECT HP.id, HP.nama, DS.kode FROM hippam HP JOIN desa DS ON HP.desa_kode=DS.kode where DS.kecamatan_id = '$getid_kecamatan'"; // query sql untuk menampilkan data mahasiswa dengan operator LIKE

$hasil=mysqli_query($kon,$sql); //Query dieksekusi

//Disajikan dengan menggunakan perulangan
while ($row = mysqli_fetch_array($hasil)) {
    $data[] = $row['nama'];
}
//Nilainya disimpan dalam bentuk json
echo json_encode($data);
?>
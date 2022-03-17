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

$sql="SELECT KC.id, KC.kode, KC.nama FROM kecamatan KC where KC.nama LIKE '%".$searchTerm."%' ORDER BY nama ASC"; // query sql untuk menampilkan data mahasiswa dengan operator LIKE

$hasil=mysqli_query($kon,$sql); //Query dieksekusi

//Disajikan dengan menggunakan perulangan
while ($row = mysqli_fetch_array($hasil)) {
    $data[] = $row['nama'];
}
//Nilainya disimpan dalam bentuk json
echo json_encode($data);
?>
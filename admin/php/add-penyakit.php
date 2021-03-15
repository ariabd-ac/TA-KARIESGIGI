<?php
include '../../config/koneksi.php';
// $name = $_POST['name'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
// $city = $_POST['city'];
$kode_penyakit = $_POST['kode-penyakit'];
$nama_penyakit = $_POST['nama-penyakit'];
$keterangan    = $_POST['keterangan'];
$solusi        = $_POST['solusi'];
$sql = "INSERT INTO tabel_penyakit (kode_penyakit, nama_penyakit, keterangan,solusi) VALUES ('$kode_penyakit', '$nama_penyakit', '$keterangan', '$solusi')";
if (mysqli_query($conn, $sql)) {
  echo json_encode(array("statusCode" => 200));
} else {
  echo json_encode(array("statusCode" => 201));
}
mysqli_close($conn);

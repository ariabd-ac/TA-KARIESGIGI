<?php
include_once "../config/koneksi.php";
$kode_penyakit = $_GET['kode'];
// var_dump($kode_penyakit);
// die();
mysqli_query($conn, "DELETE FROM tabel_rules WHERE kode_penyakit = '$kode_penyakit'") or die(mysqli_error($conn));
?>

<script>
  window.location = 'rules.php'
</script>
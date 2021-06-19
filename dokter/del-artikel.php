<?php
include_once "../config/koneksi.php";
$id = $_GET['id'];
// var_dump($kode_penyakit);
// die();
mysqli_query($conn, "DELETE FROM tabel_artikel WHERE id_artikel = '$id'") or die(mysqli_error($conn));
?>

<script>
  window.location = 'artikel.php'
</script>
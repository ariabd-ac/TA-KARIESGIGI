<?php
include_once "../config/koneksi.php";
$username = $_GET['username'];
// var_dump($username);
// die();
mysqli_query($conn, "DELETE FROM hasil_konsul WHERE username = '$username'") or die(mysqli_error($conn));
?>

<script>
  window.location = 'history.php'
</script>
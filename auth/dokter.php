<?php
session_start();

if (isset($_SESSION['unique_id']) && $_SESSION['level']  == 'user') {
  // var_dump($_SESSION['unique_id']);
  // die();
  header("location: ../users/index.php");
  // header("location: tes.php");
} else if (isset($_SESSION['unique_id']) && $_SESSION['level']  == 'admin') {
  header("location: ../admin/index.php");
}

// if (isset($_SESSION['level'])) {
//   // var_dump($_SESSION);
//   // die();
//   header("location: ../users/index.php");
// }
?>

<?php include_once "./header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Registrasi Dokter</header>
      <a class="btn btn-primary" href="./index.php">Registrasi Users</a>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Nomor STR</label>
          <input type="number" name="username" placeholder="Masukan NIP">
        </div>
        <div class="name-details">
          <div class="field input">
            <label>Nama Depan</label>
            <input type="text" name="fname" placeholder="Nama Depan">
          </div>
          <div class="field input">
            <label>Nama Belakang</label>
            <input type="text" name="lname" placeholder="Nama Belakang">
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Masukan email">
        </div>
        <div class="field input">
          <label>Usia</label>
          <input type="number" name="usia" placeholder="Masukan usia">
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password">
          <i class="fas fa-eye"></i>
        </div>
        <div class="field input">
          <label>Alamat</label>
          <input type="textarea" name="alamat" placeholder="Masukan alamat">
        </div>
        <div class="field image">
          <label>Pasfoto</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <div class="field image">
          <label>Surat Izin Praktik</label>
          <input type="file" name="sip" accept="image/x-png,image/gif,image/jpeg,image/jpg">
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Submit">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="./assets/js/pass-show-hide.js"></script>
  <script src="./assets/js/signup_dokter.js"></script>

</body>

</html>
<?php
session_start();

if (isset($_SESSION['unique_id']) && $_SESSION['level']  == 'user') {
  header("location: ../users/index.php");
} else if (isset($_SESSION['unique_id']) && $_SESSION['level']  == 'admin') {
  header("location: ../admin/index.php");
} else if (isset($_SESSION['unique_id']) && $_SESSION['level']  == 'doctor') {
  header("location: ../dokter/index.php");
} else if (isset($_SESSION['unique_id']) && $_SESSION['level']  == 'isDoctor') {
  header("location: ../dokter/index.php");
}

?>

<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form login">
      <header>Sign Now</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required autocomplete="off">
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
  </div>

  <script src="./assets/js/pass-show-hide.js"></script>
  <script src="./assets/js/login.js"></script>
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <!-- <script src="../libs/node_modules/sweetalert2/dist/sweetalert2.all.js"></script> -->

</body>

</html>
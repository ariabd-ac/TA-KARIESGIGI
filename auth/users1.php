<?php
session_start();
// include_once "../config/koneksi.php";
// if (!isset($_SESSION['unique_id'])) {
//   header("location: login.php");
// }
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php

          ?>
          <img src="./php/images/1614007818cs.jpg" alt="">
          <div class="details">
            <span>Ari</span>
            <p>live now</p>
          </div>
        </div>
        <a href=#" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>

  <script src="./assets/js/user.js"></script>

</body>

</html>
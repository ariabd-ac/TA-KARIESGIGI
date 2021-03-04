<?php
session_start();
include_once "../config/koneksi.php";

if ($_SESSION['level']  != 'user') {
  header("location: 404.php");
}
?>



<?php
include './_partials/head.php';
?>
<div class="container-fluid">
  <div class="row">
    <!-- Main Sidebar -->
    <?php
    include './_partials/aside.php';
    ?>
    <!-- End Main Sidebar -->
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
      <?php
      include './_partials/nav.php';
      ?>
      <!-- / .main-navbar -->
      <div class="main-content-container container-fluid px-4">
        <!-- Small Stats Blocks -->
        <div class="row mt-4" style="">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <h2>
            Hai <?php echo $row['fname'] . " " . $row['lname'] ?>
          </h2>


        </div>
        <!-- End Small Stats Blocks -->
      </div>
      <?php
      include './_partials/footer.php';
      ?>
    </main>
  </div>
</div>
<?php
include './_partials/script.php';
?>
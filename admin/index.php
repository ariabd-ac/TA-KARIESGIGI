<?php
session_start();
include_once "../config/koneksi.php";
// if (!isset($_SESSION['unique_id'])) {
//   header("location: 404.php");
// }
// var_dump($_SESSION);
// die();

if ($_SESSION['level'] != 'admin') {
  // if (empty($_SESSION['unique_id']) && empty($_SESSION['admin']) || empty($_SESSION['level'])) {
  //   header("location: 404.php");
  // }
  header("location: 404.php");
  // if (isset($_SESSION['unique_id'])) {
  //   header("location: 404.php");
  // }
}
?>


<?php
include './_partials/head.php';
?>
<div class="container-fluid" style="height: 100vh;overflow: scroll;">
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

          <div class="row text-center m-b-10">

            <div class="col-lg-3 col-md-6 col-sm-3 col-xs-3 m-b-40 m-t-30">
              <div class="card card-outline-inverse" style="background-color:#189bed; border-color:#189bed;">
                <div class="card-body">
                  <p style="color: #fafafa">Data Gejala</p>
                  <a href="./gejala.php" class="btn waves-effect btn-lg btn-secondary" style="background-color:#1693e0; border-color:#1693e0; margin: 5px;" title="Data gejala"><i class="fa fa-heartbeat"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3 col-xs-3 m-t-30">
              <div class="card card-outline-inverse" style="background-color: #35db64; border-color: #35db64;">
                <div class="card-body">
                  <p style="color: #fafafa">Data Penyakit</p>
                  <a href="./penyakit.php" class="btn waves-effect waves-light btn-lg btn-secondary" style="background-color:#32d15f; border-color:#32d15f; margin: 5px;" title="Data penyakit"><i class="fas fa-viruses"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3 col-xs-3 m-t-30">
              <div class="card card-outline-inverse" style="background-color: #eb964b; border-color: #eb964b;">
                <div class="card-body">
                  <p style="color: #fafafa">Rules</p>
                  <a href="./rules.php" class="btn waves-effect waves-light btn-lg btn-secondary" style="background-color:#de8e47; border-color:#de8e47; margin: 5px;" title="Rules"><i class="fa fa-bar-chart-o"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3 col-xs-3 m-t-30">
              <div class="card card-outline-inverse" style="background-color: #39ccd4; border-color: #39ccd4;">
                <div class="card-body">
                  <p style="font-size: 14.5px; color: #fafafa">Approve Dokter</p>
                  <a href="./management.php" class="btn waves-effect waves-light btn-lg btn-secondary" style="background-color:#31b5bd; border-color:#31b5bd; margin: 5px;" title="Approve Dokter"><i class="fa fa-users"></i></a>
                </div>
              </div>
            </div>

          </div>


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
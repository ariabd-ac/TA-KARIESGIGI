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
          <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            <strong>Selamat datang!</strong> <?= $row['fname'] . " " . $row['lname'] ?>
          </div>

          <div class="row">
            <div class="col-lg col-md-6 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                      <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                      <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                  </div>
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">Artikel</span>
                      <?php
                      $qc = mysqli_query($conn, "SELECT COUNT(id_artikel) AS CArtikel FROM tabel_artikel");
                      $row = mysqli_fetch_assoc($qc);
                      // var_dump($row); 
                      ?>
                      <h6 class="stats-small__value count my-3"><?= $row['CArtikel']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg col-md-6 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                      <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                      <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                  </div>
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">Pengguna</span>
                      <?php
                      $qc = mysqli_query($conn, "SELECT COUNT(user_id) AS CUsers FROM users");
                      $row = mysqli_fetch_assoc($qc);
                      // var_dump($row); 
                      ?>
                      <h6 class="stats-small__value count my-3"><?= $row['CUsers']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg col-md-6 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                      <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                      <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                  </div>
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                      <span class="stats-small__label text-uppercase">Rules</span>
                      <?php
                      $qc = mysqli_query($conn, "SELECT COUNT(kode_penyakit) AS CRules FROM tabel_rules");
                      $row = mysqli_fetch_assoc($qc);
                      // var_dump($row); 
                      ?>
                      <h6 class="stats-small__value count my-3"><?= $row['CRules']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg col-md-6 col-sm-6 mb-4">
              <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                  <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                      <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                      <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                  </div>
                  <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">

                      <span class="stats-small__label text-uppercase">Hasil berkonsultasi</span>
                      <?php
                      $qc = mysqli_query($conn, "SELECT COUNT(pakar) AS CHasil FROM hasil_konsul");
                      $row = mysqli_fetch_assoc($qc);
                      // var_dump($row); 
                      ?>
                      <h6 class="stats-small__value count my-3"><?= $row['CHasil']; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- <button onclick="chekDiagnosa()">Click</button>
          <script>
            function chek() {
              setTimeout(function() {
                iziToast.warning({
                  title: 'Caution',
                  message: 'You forgot important data',
                  position: 'center',
                  onOpening: function() {
                    setTimeout(function() {
                      window.location = "./diagnosa-mandiri.php";
                    }, 2000)
                  }
                });

              }, )

            }
          </script> -->


          <!-- <a href="" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</a> -->

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
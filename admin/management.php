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
  header("location: ./404.php");
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
    <div class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

      <?php
      include './_partials/nav.php';
      ?>

      <!-- / .main-navbar -->
      <div class="main-content-container container-fluid px-4" style="">
        <!-- Small Stats Blocks -->
        <div class="row mt-6" style="">
          <div class="col-md-12">
            <div class="card mt-4">
              <div class="card-header">
                <h4 class="card-title">Management Users</h4>
                <!-- <div class="update pull-right">
                  <a href="" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</a>
                </div> -->
              </div>
              <div class="card-body">
                <div class="">
                  <table class="table table-striped table-bordered" id="table">
                    <thead class=" text-primary">
                      <th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      <th class="text-center">Nomer STR</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Usia</th>
                      <th class="text-center"> Option </th>
                      <th class="text-center"> Option </th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      // $sqls = mysqli_query($conn, "SELECT * FROM tabel_penyakit") or die(mysqli_error($conn));
                      $sqls = mysqli_query($conn, "SELECT * FROM users WHERE level = 'doctor'") or die(mysqli_error($conn));
                      foreach ($sqls as $sql) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?></td>
                          <td class="text-center"><?= $sql['username'] ?></td>
                          <td class="text-center"><?= $sql['fname'] ?> <?= $sql['lname'] ?></td>
                          <td class="text-center"><?= $sql['email'] ?></td>
                          <td class="text-center"><?= $sql['usia'] ?></td>
                          <td class="text-center">
                            <a href="#" class="btn btn-primary btn-round btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $sql['unique_id']; ?>">Lihat SIP</a>
                          </td>
                          <td>
                            <a href="#" class="btn btn-danger btn-round btn-sm" data-bs-toggle="modal" data-bs-target="#aktifkanModal<?php echo $sql['unique_id']; ?>">Aktifkan </a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- </div> -->
            </div>
          </div>
          <!-- End Small Stats Blocks -->

        </div>
        <!-- modals add gejala -->
        <!-- <div class="modal fade" id="aktifkanModal<?php echo $sql['unique_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h3 style="color: brown; text-align: center;text-transform: uppercase;">Ingin Aktifkan Dokter?</h3>
                <button type="submit" name="aktif-dokter" class="btn btn-primary">Aktifkan</button>
              </div>
            </div>
          </div>
        </div> -->
      </div>

      <?php
      $no = 1;
      $sqls = mysqli_query($conn, "SELECT * FROM users WHERE level = 'doctor'") or die(mysqli_error($conn));
      foreach ($sqls as $sql) { ?>
        <div class="modal fade" id="aktifkanModal<?php echo $sql['unique_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="mb-3">
                    <!-- <label for="kodeGejala" class="form-label">Uniqid</label> -->
                    <input type="hidden" class="form-control" id="unique_id" aria-describedby="kode-gejala" name="unique_id" placeholder="Contoh: G01, G02 ..." value="<?= $sql['unique_id'] ?>" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="kodeGejala" class="form-label">Nama Dokter</label>
                    <input type="text" class="form-control" id="kode-penyakit" aria-describedby="kode-gejala" name="kode-penyakit" placeholder="Contoh: G01, G02 ..." value="<?= $sql['fname'] ?> <?= $sql['lname'] ?>" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="kodeGejala" class="form-label">No. STR</label>
                    <input type="text" class="form-control" id="kode-penyakit" aria-describedby="kode-gejala" name="kode-penyakit" placeholder="Contoh: G01, G02 ..." value="<?= $sql['username'] ?>" readonly>
                  </div>
                  <button type="submit" name="aktif-dokter" class="btn btn-primary">Aktifkan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php
      $no = 1;
      $sqls = mysqli_query($conn, "SELECT * FROM users WHERE level = 'doctor'") or die(mysqli_error($conn));
      foreach ($sqls as $sql) { ?>
        <div class="modal fade" id="editModal<?php echo $sql['unique_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div id="carouselExample" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="../auth/php/images/<?php echo $sql['sip']; ?>">
                      <!-- <?php
                            var_dump($sql['sip']);
                            echo $sql['sip'];
                            ?> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php
      include './_partials/footer.php';
      ?>
    </div>
  </div>
</div>
</div>
<?php
include './_partials/script.php';
?>

<!-- add gejala -->



<?php
if (isset($_POST['aktif-dokter'])) {
  include_once "../config/koneksi.php";
  $aktifkan = "isDoctor";
  $unique_id = trim(mysqli_real_escape_string($conn, $_POST['unique_id']));
  // var_dump($aktifkan);
  // die();
  mysqli_query($conn, "UPDATE users SET level = '$aktifkan' WHERE	unique_id = '$unique_id'") or die(mysqli_error($conn)); ?>

  <script>
    window.location = 'management.php'
  </script>
<?php } ?>
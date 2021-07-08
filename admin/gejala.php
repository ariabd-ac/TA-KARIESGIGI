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
                <h4 class="card-title"> Tabel Gejala Penyakit Gigi dan Mulut</h4>
                <div class="update pull-right">
                  <a href="" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</a>
                </div>
              </div>
              <div class="card-body">
                <div class="">
                  <table class="table table-striped table-bordered" id="table">
                    <thead class=" text-primary">
                      <th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      <th class="text-center">Kode Gejala </th>
                      <th class="text-center"> Nama Gejala </th>
                      <th class="text-center"> Option </th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $sqls = mysqli_query($conn, "SELECT * FROM tabel_gejala") or die(mysqli_error($conn));
                      foreach ($sqls as $sql) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?></td>
                          <td class="text-center"><?= $sql['kode_gejala'] ?></td>
                          <td class="text-center"><?= $sql['nama_gejala'] ?></td>
                          <td class="text-center">
                            <a href="#" class="btn btn-primary btn-round btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $sql['kode_gejala']; ?>">Edit</a>
                            <hr>
                            <a href="#" class="btn btn-danger btn-round btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $sql['kode_gejala']; ?>">Del</a>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="mb-3">
                    <label for="kodeGejala" class="form-label">Kode Gejala</label>
                    <input type="text" class="form-control" id="kode-gejala" aria-describedby="kode-gejala" name="kode-gejala" placeholder="Contoh: G01, G02 ..." required>
                  </div>
                  <div class="mb-3">
                    <label for="nama_gejala" class="form-label">Nama Gejala</label>
                    <input type="text" class="form-control" id="nama-gejala" name="nama-gejala" required>
                  </div>
                  <button type="submit" name="simpan-gejala" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- modals edit gejala -->
        <?php
        $no = 1;
        $sqls = mysqli_query($conn, "SELECT * FROM tabel_gejala") or die(mysqli_error($conn));
        foreach ($sqls as $sql) { ?>
          <div class="modal fade" id="editModal<?php echo $sql['kode_gejala']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="post">
                    <div class="mb-3">
                      <label for="kodeGejala" class="form-label">Kode Gejala</label>
                      <input type="text" class="form-control" id="kode-gejala" aria-describedby="kode-gejala" name="kode-gejala" placeholder="Contoh: G01, G02 ..." value="<?= $sql['kode_gejala'] ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="nama_gejala" class="form-label">Nama Gejala</label>
                      <input type="text" class="form-control" id="nama-gejala" name="nama-gejala" value="<?= $sql['nama_gejala'] ?>" required>
                    </div>
                    <button type="submit" name="update-gejala" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

        <!-- hapus modal -->
        <?php
        $no = 1;
        $sqls = mysqli_query($conn, "SELECT * FROM tabel_gejala") or die(mysqli_error($conn));
        foreach ($sqls as $sql) { ?>
          <div class="modal fade" id="hapusModal<?php echo $sql['kode_gejala']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="post">
                    <div class="mb-3">
                      <label for="kodeGejala" class="form-label">Kode Gejala</label>
                      <input type="text" class="form-control" id="kode-gejala" aria-describedby="kode-gejala" name="kode-gejala" placeholder="Contoh: G01, G02 ..." value="<?= $sql['kode_gejala'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="nama_gejala" class="form-label">Nama Gejala</label>
                      <input type="text" class="form-control" id="nama-gejala" name="nama-gejala" value="<?= $sql['nama_gejala'] ?>" readonly>
                    </div>
                    <button type="submit" name="hapus-gejala" class="btn btn-primary">Hapus</button>
                  </form>
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
if (isset($_POST['simpan-gejala'])) {
  include_once "../config/koneksi.php";

  $kode_gejala = trim(mysqli_real_escape_string($conn, $_POST['kode-gejala']));
  $nama_gejala = trim(mysqli_real_escape_string($conn, $_POST['nama-gejala']));

  $query = mysqli_query($conn, "SELECT kode_gejala FROM tabel_gejala WHERE kode_gejala = '$kode_gejala'");
  if ($query->num_rows > 0) {
?>
    <script>
      // alert('Data sudah ada boiii')
      Swal.fire({
        position: 'top-end',
        type: 'warning',
        title: 'Kode gejala sudah ada',
        showConfirmButton: false,
        timer: 3000
      })
    </script>
  <?php } else {
    mysqli_query($conn, "INSERT INTO tabel_gejala (kode_gejala, nama_gejala) VALUES ('$kode_gejala', '$nama_gejala') ") or die(mysqli_error($conn));
  } ?>



  <script>
    window.location = 'gejala.php'
  </script>

<?php } ?>

<!-- edit gejala -->

<!-- PROSES UPDATE GEJALA -->
<?php
if (isset($_POST['update-gejala'])) {
  include_once "../config/koneksi.php";
  $kode_gejala = trim(mysqli_real_escape_string($conn, $_POST['kode-gejala']));
  $nama_gejala = trim(mysqli_real_escape_string($conn, $_POST['nama-gejala']));

  mysqli_query($conn, "UPDATE tabel_gejala SET nama_gejala = '$nama_gejala' WHERE kode_gejala = '$kode_gejala'") or die(mysqli_error($conn)); ?>

  <script>
    window.location = 'gejala.php'
  </script>
<?php } ?>

<?php
if (isset($_POST['hapus-gejala'])) {
  include_once "../config/koneksi.php";
  $kode_gejala = trim(mysqli_real_escape_string($conn, $_POST['kode-gejala']));
  $nama_gejala = trim(mysqli_real_escape_string($conn, $_POST['nama-gejala']));

  mysqli_query($conn, "DELETE FROM tabel_gejala WHERE kode_gejala = '$kode_gejala'") or die(mysqli_error($conn)); ?>

  <script>
    window.location = 'gejala.php'
  </script>
<?php } ?>
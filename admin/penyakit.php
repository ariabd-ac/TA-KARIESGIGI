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
                <h4 class="card-title"> Tabel Penyakit Gigi dan Mulut</h4>
                <div class="update pull-right">
                  <a href="" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</a>
                </div>
              </div>
              <div class="card-body">
                <div class="">
                  <table class="table table-striped table-bordered" id="table">
                    <thead class=" text-primary">
                      <th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      <th class="text-center">Kode Penyakit </th>
                      <th class="text-center"> Nama Penyakit </th>
                      <th class="text-center"> Keterangan </th>
                      <th class="text-center"> Solusi </th>
                      <th class="text-center"> Option </th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $sqls = mysqli_query($conn, "SELECT * FROM tabel_penyakit") or die(mysqli_error($conn));
                      foreach ($sqls as $sql) { ?>
                        <tr>
                          <td class="text-center"><?= $no++ ?></td>
                          <td class="text-center"><?= $sql['kode_penyakit'] ?></td>
                          <td class="text-center"><?= $sql['nama_penyakit'] ?></td>
                          <td class="text-center"><?= $sql['keterangan'] ?></td>
                          <td class="text-center"><?= $sql['solusi'] ?></td>
                          <td class="text-center">
                            <a href="#" class="btn btn-primary btn-round btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $sql['kode_penyakit']; ?>">Edit</a>
                            <hr>
                            <a href="#" class="btn btn-danger btn-round btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $sql['kode_penyakit']; ?>">Del</a>
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
                    <label for="kodeGejala" class="form-label">Kode Penyakit</label>
                    <input type="text" class="form-control" id="kode-penyakit" aria-describedby="kode-penyakit" name="kode-penyakit" placeholder="Contoh: P01, P02 ...">
                  </div>
                  <div class="mb-3">
                    <label for="nama_gejala" class="form-label">Nama Penyakit</label>
                    <input type="text" class="form-control" id="nama-penyakit" name="nama-penyakit">
                  </div>
                  <div class="mb-3">
                    <label for="nama_gejala" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" id="floatingTextarea2" style="height: 100px"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="nama_gejala" class="form-label">Solusi</label>
                    <textarea class="form-control" id="solusi" name="solusi" id="floatingTextarea2" style="height: 100px"></textarea>
                  </div>
                  <button type="submit" name="simpan-penyakit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- modals edit gejala -->
        <?php
        $no = 1;
        $sqls = mysqli_query($conn, "SELECT * FROM tabel_penyakit") or die(mysqli_error($conn));
        foreach ($sqls as $sql) { ?>
          <div class="modal fade" id="editModal<?php echo $sql['kode_penyakit']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="post">
                    <div class="mb-3">
                      <label for="nama_penyakit" class="form-label">Kode Penyakit</label>
                      <input type="text" class="form-control" id="nama-penyakit" name="kode-penyakit" value="<?= $sql['kode_penyakit'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
                      <input type="text" class="form-control" id="nama-penyakit" name="nama-penyakit" value="<?= $sql['nama_penyakit'] ?>">
                    </div>
                    <div class="mb-3">
                      <label for="nama_penyakit" class="form-label">Keterangan</label>
                      <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $sql['keterangan'] ?>">
                    </div>
                    <div class="mb-3">
                      <label for="nama_penyakit" class="form-label">Solusi</label>
                      <input type="text" class="form-control" id="solusi" name="solusi" value="<?= $sql['solusi'] ?>">
                    </div>
                    <button type="submit" name="update-penyakit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

        <!-- hapus modal -->
        <?php
        $no = 1;
        $sqls = mysqli_query($conn, "SELECT * FROM tabel_penyakit") or die(mysqli_error($conn));
        foreach ($sqls as $sql) { ?>
          <div class="modal fade" id="hapusModal<?php echo $sql['kode_penyakit']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <input type="text" class="form-control" id="kode-penyakit" aria-describedby="kode-gejala" name="kode-penyakit" placeholder="Contoh: G01, G02 ..." value="<?= $sql['kode_penyakit'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="nama_penyakit" class="form-label">Nama penyakit</label>
                      <input type="text" class="form-control" id="nama-penyakit" name="nama-penyakit" value="<?= $sql['nama_penyakit'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="nama_penyakit" class="form-label">Keterangan</label>
                      <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $sql['keterangan'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="nama_penyakit" class="form-label">Solusi</label>
                      <input type="text" class="form-control" id="solusi" name="solusi" value="<?= $sql['solusi'] ?>" readonly>
                    </div>
                    <button type="submit" name="hapus-penyakit" class="btn btn-primary">Hapus</button>
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
if (isset($_POST['simpan-penyakit'])) {
  include_once "../config/koneksi.php";
  $kode_penyakit = trim(mysqli_real_escape_string($conn, $_POST['kode-penyakit']));
  $nama_penyakit = trim(mysqli_real_escape_string($conn, $_POST['nama-penyakit']));
  $keterangan    = trim(mysqli_real_escape_string($conn, $_POST['keterangan']));
  $solusi        = trim(mysqli_real_escape_string($conn, $_POST['solusi']));

  $query = mysqli_query($conn, "SELECT kode_penyakit FROM tabel_penyakit WHERE kode_penyakit = '$kode_penyakit'");


  if ($query->num_rows > 0) {
    # code...
?>
    <script>
      // alert('Data sudah ada boiii')
      Swal.fire({
        position: 'top-end',
        type: 'warning',
        title: 'Kode penyakit sudah ada',
        showConfirmButton: false,
        timer: 3000
      })
    </script>
  <?php } else {
    mysqli_query($conn, "INSERT INTO tabel_penyakit (kode_penyakit, nama_penyakit, keterangan,solusi) VALUES ('$kode_penyakit', '$nama_penyakit', '$keterangan', '$solusi')") or die(mysqli_error($conn));
  } ?>




  <script>
    window.location = 'penyakit.php'
  </script>

<?php } ?>

<!-- edit gejala -->

<!-- PROSES UPDATE GEJALA -->
<?php
if (isset($_POST['update-penyakit'])) {
  include_once "../config/koneksi.php";
  $kode_penyakit = trim(mysqli_real_escape_string($conn, $_POST['kode-penyakit']));
  $nama_penyakit = trim(mysqli_real_escape_string($conn, $_POST['nama-penyakit']));
  $keterangan    = trim(mysqli_real_escape_string($conn, $_POST['keterangan']));
  $solusi        = trim(mysqli_real_escape_string($conn, $_POST['solusi']));

  mysqli_query($conn, "UPDATE tabel_penyakit SET nama_penyakit = '$nama_penyakit', keterangan = '$keterangan', solusi = '$solusi' WHERE kode_penyakit = '$kode_penyakit'") or die(mysqli_error($conn)); ?>

  <script>
    window.location = 'penyakit.php'
  </script>
<?php } ?>

<?php
if (isset($_POST['hapus-penyakit'])) {
  include_once "../config/koneksi.php";
  $kode_penyakit = trim(mysqli_real_escape_string($conn, $_POST['kode-penyakit']));
  $nama_penyakit = trim(mysqli_real_escape_string($conn, $_POST['nama-penyakit']));
  $keterangan    = trim(mysqli_real_escape_string($conn, $_POST['keterangan']));
  $solusi        = trim(mysqli_real_escape_string($conn, $_POST['solusi']));

  mysqli_query($conn, "DELETE FROM tabel_penyakit WHERE kode_penyakit = '$kode_penyakit'") or die(mysqli_error($con)); ?>

  <script>
    window.location = 'penyakit.php'
  </script>
<?php } ?>
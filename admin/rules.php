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
                <h4 class="card-title"> Tambahkan Rules</h4>
                <div class="update pull-right">
                  <a href="" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</a>
                </div>
              </div>
              <div class="card-body">
                <div class="">
                  <table class="table table-striped  table-bordered" id="">
                    <thead class=" text-primary">
                      <!-- <th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                      <th class="text-center">Kode Penyakit </th>
                      <th class="text-center"> Nama Penyakit </th>
                      <th class="text-center"> Gejala </th>
                      <th class="text-center"> Option </th>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $query = "SELECT tr.kode_penyakit, tp.nama_penyakit, tg.nama_gejala FROM tabel_rules tr, tabel_penyakit tp, tabel_gejala tg WHERE tr.kode_penyakit = tp.kode_penyakit AND tr.kode_gejala = tg.kode_gejala ORDER BY tr.kode_penyakit ASC";
                      $sqls = mysqli_query($conn, $query) or die(mysqli_error($conn));
                      // var_dump($sqls);
                      // die();
                      foreach ($sqls as $sql) { ?>
                        <tr>
                          <!-- <td class="text-center"><?= $no++ ?></td> -->
                          <td class="text-center"><?= $sql['kode_penyakit'] ?></td>
                          <td class="text-center"><?= $sql['nama_penyakit'] ?></td>
                          <td class="text-center"><?= $sql['nama_gejala'] ?></td>
                          <td class="text-center">
                            <!-- <a href="#" class="btn btn-primary btn-round btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $sql['kode_penyakit']; ?>">Edit</a> -->
                            <!-- <hr> -->
                            <!-- <a href="#" class="btn btn-danger btn-round btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?php echo $sql['kode_penyakit']; ?>">Del</a> -->
                            <a href="del-rules.php?kode=<?= $sql['kode_penyakit'] ?>" class="btn btn-danger btn-round btn-sm">Del</a>
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
        <!-- modals add rules -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rules</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="mb-3">
                    <label for="nama_gejala" class="form-label">Nama Penyakit</label>
                    <?php
                    $sqls = mysqli_query($conn, "SELECT * FROM tabel_penyakit") or die(mysqli_error($conn)); ?>
                    <select name="kode-penyakit" id="kode-penyakit" class="form-control">
                      <option value=""> Pilih Penyakit </option>
                      <?php while ($sql = mysqli_fetch_array($sqls)) { ?>
                        <option value="<?= $sql['kode_penyakit'] ?>"><?= $sql['kode_penyakit'] ?> - <?= $sql['nama_penyakit'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="nama_gejala" class="form-label">Pilih Gejala Penyakit</label>
                    <!-- <textarea class="form-control" id="keterangan" name="keterangan" id="floatingTextarea2" style="height: 100px"></textarea> -->
                    <?php
                    $sqls = mysqli_query($conn, "SELECT * FROM tabel_gejala") or die(mysqli_error($con));
                    while ($sql = mysqli_fetch_array($sqls)) { ?>
                      <div class="row">
                        <div class="col-md-1 offset-1">
                          <input type="checkbox" name="kode-gejala[]" value="<?= $sql['kode_gejala'] ?>">
                        </div>
                        <div class="col-md-10">
                          <?= $sql['kode_gejala'] ?> - <?= $sql['nama_gejala'] ?> <br>
                        </div>
                      </div>
                      <hr>
                    <?php } ?>
                  </div>
                  <button type="submit" name="simpan-rule" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-warning btn-round">Reset</button>
                </form>
              </div>
            </div>
          </div>
        </div>

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
if (isset($_POST['simpan-rule'])) {
  $kode_penyakit = trim(mysqli_real_escape_string($conn, $_POST['kode-penyakit']));
  $kode_gejala   = $_POST['kode-gejala'];
  $jumlah        = count($_POST['kode-gejala']);

  for ($i = 0; $i < $jumlah; $i++) {
    mysqli_query($conn, "INSERT INTO tabel_rules (kode_penyakit, kode_gejala) VALUES ('$kode_penyakit', '$kode_gejala[$i]')") or die(mysqli_error($con));
  }

  echo "<script>
    window.location='rules.php'
        </script>";
}
?>
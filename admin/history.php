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
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Riwayat Konsultasi User</h4>
              <div class="update pull-right">
                <a href="./history.php" class="btn btn-primary btn-round">Refresh</a>
              </div>
            </div>
            <div class="card-body">
              <div class="">
                <table class="table table-hover" id="">
                  <thead class=" text-primary">
                    <!-- <th class="text-center">&nbsp;&nbsp;&nbsp;&nbsp;#&nbsp;&nbsp;&nbsp;&nbsp;</th> -->
                    <!-- <th class="text-center"> Tanggal Konsul  </th> -->
                    <th class="text-center"> Nama User </th>
                    <th class="text-center"> Usia </th>
                    <th class="text-center"> Alamat </th>
                    <th class="text-center"> Gejala Yang Di pilih</th>
                    <!-- <th class="text-center"> Gejala Yang dipilih </th> -->
                    <th class="text-center"> Hasil Diagnosa </th>
                    <th class="text-center"> Option </th>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $sqls = mysqli_query($conn, "SELECT h.username, h.nama_lengkap, h.nama_penyakit, h.nama_gejala, h.tanggal, t.usia, t.alamat FROM hasil_konsul h, users t WHERE h.username = t.username") or die(mysqli_error($conn));
                    foreach ($sqls as $sql) { ?>
                      <tr>
                        <!-- <td class="text-center"><//?= $no++ ?></td> -->
                        <!-- <td class="text-center"><//?= $sql['tanggal'] ?></td> -->
                        <td class="text-center"><?= $sql['nama_lengkap'] ?></td>
                        <td class="text-center"><?= $sql['usia'] ?></td>
                        <td class="text-center"><?= $sql['alamat'] ?></td>
                        <td><?= $sql['nama_gejala'] ?></td>
                        <!-- <td class="text-center"><//?= $sql['nama_gejala'] ?></td> -->
                        <td class="text-center">
                          <?php
                          if ($sql['nama_penyakit'] == 'Kelainan Dentofacial' || $sql['nama_penyakit'] == 'Kista dalam Rongga Mulut') {
                            $penyakit = '-';
                          } else {
                            $penyakit =  $sql['nama_penyakit'];
                          }
                          ?>
                          <?= $penyakit ?></td>
                        <td class="text-center">
                          <!-- <?= $sql['username'] ?> -->
                          <!-- <a href="pakar.php?a=del-history&username=<?= $sql['username'] ?>" class="btn btn-danger btn-round btn-sm">Del</a> -->
                          <a href="del-history.php?username=<?= $sql['username'] ?>" class="btn btn-danger btn-round btn-sm">Del</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
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
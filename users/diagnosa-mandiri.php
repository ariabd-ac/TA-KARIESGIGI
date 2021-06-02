<?php
session_start();
include_once "../config/koneksi.php";

if ($_SESSION['level']  != 'user') {
  header("location: 404.php");
}

// var_dump($_SESSION);
// die();

?>


<?php
if (!isset($_POST['periksa'])) { ?>

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
          <div class="row mt-4 col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <div class="card card-user" style="width: 100%;">
              <div class="card-header">
                <h5 class="card-title">Pilih Gejala yang dirasakan</h5>
              </div>
              <div class="card-body">
                <form method="post">
                  <!-- <div class="" style="height: 40px; width: 50;background-color: brown;"></div>
                  <div class="" style="height: 40px; width: 50;background-color: red;"></div>
                  <div class="" style="height: 40px; width: 50;background-color: pink;"></div>
                  <div class="" style="height: 40px; width: 50;background-color: blue;"></div>
                  <div class="" style="height: 40px; width: 50;background-color: yellow;"></div> -->
                  <div class="row">
                    <div class="col-md-5">
                      <?php
                      $sqls = mysqli_query($conn, "SELECT * FROM tabel_gejala WHERE kode_gejala BETWEEN 'G1' AND 'G17'") or die(mysqli_error($conn));
                      while ($sql = mysqli_fetch_array($sqls)) { ?>
                        <div class="row" style="">
                          <div class="col-md-1" style="margin-left: 10px;">
                            <input type="checkbox" name="nama-gejala[]" value="<?= $sql['nama_gejala'] ?>" id="nama_gejala">
                          </div>
                          <div class="col-md-9" style="">
                            <!-- <?= $sql['kode_gejala'] ?> - -->
                            <?= $sql['nama_gejala'] ?> <br>
                          </div>
                        </div>
                        <hr>
                      <?php } ?>
                    </div>
                    <div class="col-md-7">
                      <?php
                      $sqls = mysqli_query($conn, "SELECT * FROM tabel_gejala WHERE kode_gejala BETWEEN 'G18' AND 'G9'") or die(mysqli_error($conn));
                      while ($sql = mysqli_fetch_array($sqls)) { ?>
                        <div class="row" style="">
                          <div class="col-md-1" style="margin-left: 10px;">
                            <input type="checkbox" name="nama-gejala[]" value="<?= $sql['nama_gejala'] ?>" id="nama_gejala">
                          </div>
                          <div class="col-md-9" style="">
                            <!-- <?= $sql['kode_gejala'] ?> - -->
                            <?= $sql['nama_gejala'] ?> <br>
                          </div>
                        </div>
                        <hr>
                      <?php } ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="reset" class="btn btn-info btn-round">Reset</button>
                      <button type="submit" id="submitbtn" name="periksa" class="btn btn-success btn-round">Periksa</button>
                    </div>
                  </div>
                </form>
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


<?php } else if (isset($_POST['periksa'])) {
  $tanggal     = date("Y/m/d h:i:s");
  $gejala      = $_POST['nama-gejala'];
  $jumlah      = count($_POST['nama-gejala']);
  // $nama_gejala = $_POST['nama-gejala'];
  if ($jumlah == null) {
    echo "<script>
            alert('Pilih lah gejala');
            window.location='./diagnosa-mandiri.php';
        </script>";
    exit;
  } elseif ($jumlah < 2) {
    echo "<script>
            alert('Gejala yang di pilih minimal 2');
            window.location='./diagnosa-mandiri.php';
        </script>";
    exit;
  } elseif ($jumlah > 10) {
    echo "<script>
            alert('Gejala yang di pilih maximal 10');
              window.location='./diagnosa-mandiri.php';
          </script>";
    exit;
  }

  // for ($i = 0; $i < $jumlah; $i++) {
  //   var_dump($gejala[$i]);
  //   die;
  // }

  for ($i = 0; $i < $jumlah; $i++) {
    $query = "SELECT DISTINCT tr.kode_penyakit, tr.kode_gejala, tg.nama_gejala, tp.nama_penyakit, tp.keterangan, tp.solusi FROM tabel_penyakit tp, tabel_rules tr, tabel_gejala tg WHERE tg.nama_gejala = '$gejala[$i]' AND tr.kode_penyakit = tp.kode_penyakit AND tr.kode_gejala = tg.kode_gejala";
    $hasils = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $hasil = mysqli_fetch_array($hasils);
    // var_dump($hasil);
    // die;
  } ?>

  <?php
  $resultFLname = $_SESSION['fname']  . ' ' . $_SESSION['lname'];
  $tanggal     = date("Y/m/d h:i:s");
  $username      = $_SESSION['username'];
  $nama_lengkap  = $resultFLname;
  $nama_penyakit = $hasil['nama_penyakit'];
  for ($i = 0; $i < $jumlah; $i++) {

    mysqli_query($conn, "INSERT INTO hasil_konsul (username, nama_lengkap, nama_gejala, nama_penyakit, tanggal) VALUES ('$username', '$nama_lengkap', '$gejala[$i]', '$nama_penyakit', '$tanggal')") or die(mysqli_error($conn));
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
          <div class="row mt-4 col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <div class="" style="width: 100%;">
              <div class="card-body">
                <div class="col-md-12" style="">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="card-title">Hasil Konsultasi : <?= $_SESSION['fname']  . ' ' . $_SESSION['lname']  ?></h5>
                    </div>
                    <div class="card-body">
                      <div class="row" style="">
                        <div class="col-md-6">
                          <div class="card card-plain">
                            <div class="card-header">
                              <h5 class="card-title">Gejala Yang dipilih</h5>
                            </div>
                            <div class="card-body">
                              <?php
                              for ($i = 0; $i < $jumlah; $i++) { ?>
                                <div class="alert alert-info">
                                  <span><?= $gejala[$i] ?></span>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card card-plain">
                            <div class="card-header">
                              <h5 class="card-title">Hasil Diagnosa</h5>
                            </div>
                            <div class="card-body">
                              <div class="alert alert-success">
                                <?php
                                if ($hasil['nama_penyakit'] == '' || $hasil['nama_penyakit'] == '') {
                                  $diagnosa = 'Tidak Ditemukan Hasil Diagnosa, silahkan berkonsultasi dengan Dokter anda untuk info lebih lanjut';
                                } else {
                                  $diagnosa = $hasil['nama_penyakit'];
                                }
                                ?>
                                <span><?= $diagnosa ?></span>
                              </div>
                              <div class="card-header">
                                <h5 class="card-title">Keterangan</h5>
                              </div>
                              <div class="alert alert-primary">
                                <?php
                                if ($hasil['nama_penyakit'] == '' || $hasil['nama_penyakit'] == '') {
                                  $keterangan = 'Tidak Ditemukan Hasil, silahkan berkonsultasi dengan Dokter anda untuk info lebih lanjut';
                                } else {
                                  $keterangan = $hasil['keterangan'];
                                }
                                ?>
                                <span><?= $keterangan ?></span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12" style="margin-top: 30px;">
                          <div class="card card-plain">
                            <div class="card-header">
                              <h5 class="card-title">Solusi</h5>
                            </div>
                            <div class="alert alert-primary">
                              <?php
                              if ($hasil['nama_penyakit'] == '' || $hasil['nama_penyakit'] == '') {
                                $solusi = 'Silahkan berkonsultasi dengan Dokter anda untuk info lebih lanjut';
                              } else {
                                $solusi = $hasil['solusi'];
                              }
                              ?>
                              <span><?= $solusi ?></span>
                            </div>

                          </div>
                          <br />
                          <a href="" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModal">HITUNG AKURASI</a>
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="akurasi.php" method="post">
                                    <div class="mb-3">
                                      <select name="t_keyakinan" class="form-select" aria-label="Default select example">
                                        <option selected>PILIH YAKIN ATAU TIDAK YAKIN</option>
                                        <option value="0">TIDAK</option>
                                        <option value="1">YAKIN</option>
                                      </select>
                                    </div>
                                    <hr />
                                    <button type="submit" name="submit_yakin" class="btn btn-primary">Submit</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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


  <!-- </div> -->


<?php } ?>

<?php
if (isset($_POST['update-keyakinan'])) {
  include_once "../config/koneksi.php";
  $username      = $_SESSION['username'];
  $t_keyakinan = $_POST['t_keyakinan'];

  $q = "UPDATE hasil_konsul SET t_keyakinan = '$t_keyakinan' WHERE username = '$username'";

  $insert = mysqli_query($conn, $q);

  if ($insert) {
    header("location:index.php");
  } else {
    echo "gabisa";
  }
}
?>
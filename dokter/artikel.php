<?php
ob_start();
session_start();
include_once "../config/koneksi.php";

if ($_SESSION['level'] != 'isDoctor') {

  header("location: ./404.php");
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
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 col-xl-12 mt-3">
            <h3>Artikel</h3>
            <hr>
            <div class="row" style="padding: 10px">
              <div class="row mb-4">
                <div class="col-6 col-md-6 col-lg-6">
                  <a href="./add-artikel.php" class="btn btn-primary btn-sm">
                    Tambah Data
                  </a>
                </div>
              </div>
              <div class="row">
                <?php
                $no = 1;
                $sqls = mysqli_query($conn, "SELECT * FROM tabel_artikel");
                foreach ($sqls as $sql) : ?>
                  <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card card-small card-post card-post--1">
                      <div class="card-post__image" style="background-image: url('../admin/assets/images/artikel/<?= $sql['img'] ?>');">
                        <a href="#" style="text-decoration: none;" class="card-post__category badge badge-pill badge-warning">Health</a>
                        <div class="card-post__author d-flex">
                          <!-- <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('images/avatars/0.jpg');">Written by Anna Kunis</a> -->
                          <h4 style="margin-top: 50px;"><?= $sql['author'] ?></h4>
                        </div>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">
                          <a class="text-fiord-blue" style="text-decoration:none;" href="#"><?= $sql['title'] ?></a>
                        </h5>
                        <p class="card-text d-inline-block mb-3" style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 100%;"><?= $sql['content'] ?></p>
                        <span class="text-muted"><?= $sql['created_at'] ?></span>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>


        </div>

      </div>

      <?php
      $no = 1;
      $sqls = mysqli_query($conn, "SELECT * FROM tabel_artikel");
      foreach ($sqls as $sql) : ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= $sql['id_artikel'] ?>" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" style="z-index: 5;">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p><?= $sql['content'] ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach; ?>






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
if (isset($_POST['submit'])) {
  include_once "../config/koneksi.php";


  // $img = 'hahhhh';
  $judul = trim(mysqli_real_escape_string($conn, $_POST['title']));
  $content = trim(mysqli_real_escape_string($conn, $_POST['content']));
  $author = trim(mysqli_real_escape_string($conn, $_POST['author']));
  $created_at = date("Y-m-d H:i:s");

  $rand = rand();
  $ekstensi =  array('png', 'jpg', 'jpeg',);
  $filename = $_FILES['img']['name'];
  $ukuran = $_FILES['img']['size'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);

  if (!in_array($ext, $ekstensi)) { ?>
    <script>
      alert('Gagal, ekstensi harus png jpg jpeg')
    </script>
    <?php } else {
    if ($ukuran < 9044070) {
      $img = $rand . '_' . $filename;
      move_uploaded_file($_FILES['img']['tmp_name'], 'assets/images/artikel' . $rand . '_' . $filename);
      // mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$kontak','$alamat','$xx')");
      mysqli_query($conn, "INSERT INTO tabel_artikel (img, title, content, author,created_at) VALUES ('$img','$judul', '$content', '$author', '$created_at') "); ?>

      <script>
        // alert('succes')
        // location.href
        Swal.fire(
          'Good job!',
          'Berhasil menambahkan',
          'success'
        )
        window.location = "artikel.php";
      </script>
  <?php
    } else {
      header("location: artikel.php");
    }
  }




  // var_dump($data);
  // die();
  // mysqli_query($conn, "INSERT INTO tabel_artikel (img, title, content, author,created_at) VALUES ('$img','$judul', '$content', '$author', '$created_at') ") or die(mysqli_error($conn));

  ?>


<?php } ?>
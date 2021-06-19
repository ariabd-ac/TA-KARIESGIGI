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
            <h3>Tambah Artikel</h3>
            <hr>
            <div class="row">
              <div class="row mb-4">
                <div class="col-6 col-md-6 col-lg-6">
                  <a href="./artikel.php" class="btn btn-primary btn-sm">
                    Go Back
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-lg-12 col-12 col-sm-12 col-xs-12 col-xl-12 mb-4">
                  <div class="card" style="padding: 10px;">
                    <?php

                    if (isset($_GET['id'])) {
                      $id = $_GET['id'];
                      // ambil data berdasarkan id_produk
                      $q = $conn->query("SELECT * FROM tabel_artikel WHERE id_artikel = '$id'");

                      foreach ($q as $dt) :

                    ?>
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                          <label for="basic-url">Judul Atikel</label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" name="title" id="title" value="<?= $dt['author'] ?>" placeholder="Dengan cara ini merawat kesehatan gigi" aria-label="title" aria-describedby="basic-addon1">
                          </div>

                          <label for="basic-url">Content</label>
                          <div class="input-group mb-3">
                            <textarea class="form-control" name="content" id="content">
                            <?= $dt['content'] ?>
                            </textarea>
                          </div>

                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <!-- <span class="input-group-text">Upload Photo</span> -->
                            </div>
                            <div class="custom-file">
                              <input type="file" class="form-control" id="img" name="img" value="<?= $dt['img'] ?>">
                              <!-- <label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
                            </div>
                          </div>

                          <label for="basic-url">Author</label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" name="author" id="author" placeholder="Drg. Vicky" value="<?= $dt['author'] ?>" aria-label="title" aria-describedby="basic-addon1">
                          </div>

                          <div class="d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>





                    <?php
                      endforeach;
                    } ?>


                  </div>
                </div>
              </div>
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
      move_uploaded_file($_FILES['img']['tmp_name'], '../admin/assets/images/artikel/' . $rand . '_' . $filename);
      // mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$kontak','$alamat','$xx')");
      // mysqli_query($conn, "INSERT INTO tabel_artikel (img, title, content, author,created_at) VALUES ('$img','$judul', '$content', '$author', '$created_at') "); 
      mysqli_query($conn, "UPDATE tabel_artikel SET img = '$img', title = '$judul', content = '$content' , author = '$author', created_at = '$created_at' WHERE id_artikel = '$id'"); ?>

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
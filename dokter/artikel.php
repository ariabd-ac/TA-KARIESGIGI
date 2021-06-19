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
              <div class="row" style="background-color: blue;overflow: hidden;">

                <?php
                $no = 1;
                $sqls = mysqli_query($conn, "SELECT * FROM tabel_artikel");
                foreach ($sqls as $sql) : ?>
                  <div class="col-md-6 col-lg-6 col-6 col-sm-6 col-xs-6 col-xl-6 mb-4">
                    <div class="card" style="padding: 10px;">
                      <div class="img" style="">
                        <img src="../admin/assets/images/artikel/<?= $sql['img'] ?>" alt="img-artikel" style="height:100%; width: 100%">
                      </div>
                      <h3><?= $sql['title'] ?></h3>
                      <div class="content-article">
                        <p><?= $sql['content'] ?></p>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa non autem dolore quis suscipit aspernatur ipsum? Reiciendis cumque sequi tempore nam dignissimos eum ipsa! Hic praesentium atque cumque veritatis modi, eum in vel excepturi magnam similique deserunt sed earum omnis enim quidem rerum rem quas dolor! Vero dolorum maiores beatae natus sint. Qui, earum. Ipsam, blanditiis aliquid ad laudantium tempora quis, ullam, quisquam vero aliquam tenetur maxime natus molestias quasi in officiis corrupti ex enim voluptatibus nostrum minus iusto quo odit deserunt iste? Nam est consequuntur enim cumque libero quo iusto voluptatem aspernatur architecto fugit suscipit porro accusantium iure, nesciunt sed consequatur quam odit. Fuga, vel distinctio obcaecati quam molestiae dignissimos autem libero modi tenetur iste possimus doloremque sequi sit. Adipisci ducimus laudantium maiores autem quia necessitatibus, quas odio aperiam, soluta minus omnis blanditiis sunt placeat ad mollitia pariatur ut unde nulla molestias modi quo esse! Soluta, delectus debitis, deserunt earum minima, eum fuga dolores possimus fugit obcaecati laboriosam quae sapiente ullam ad nisi natus facilis aliquam animi velit repudiandae sed ut dicta repellendus asperiores? Quisquam praesentium tempore culpa quo. Dolores quod voluptas consequatur molestiae quam earum ratione atque, rerum nobis nisi magnam officiis, quis placeat tempore neque ullam minima vitae ab quae esse! Fugit nobis quia et alias? Impedit maxime nostrum accusantium corporis cupiditate? Distinctio consectetur velit provident sed amet quam at eligendi delectus, facere placeat ex ea mollitia expedita, veritatis doloremque voluptatibus autem vel atque dicta accusamus ratione? Facere officiis illo facilis laudantium quae autem vitae soluta fuga exercitationem, mollitia architecto atque placeat quisquam dignissimos doloribus nam labore eius suscipit! Nisi voluptate similique ipsum rem illo ab asperiores deleniti dolorum accusantium animi laudantium fugiat repellat cupiditate sunt vero sequi, quidem ipsa vel facere aliquam amet quibusdam nesciunt? Totam sint excepturi aperiam consequatur quasi quod nulla exercitationem ducimus inventore.</p> -->
                      </div>
                      <h6 style="text-align:right"><?= $sql['author'] ?></h6>
                      <h6 style="text-align:right"><?= $sql['created_at'] ?></h6>
                      <div class="action">
                        <a href='./edit-artikel.php?id=<?= $sql['id_artikel'] ?>' class="btn btn-secondary btn-sm" title="edit">
                          <i class="material-icons">edit</i>
                        </a>
                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $sql['id_artikel'] ?>" title="detail">
                          <i class="material-icons">zoom_in</i>
                        </a>
                        <a href="./del-artikel.php?id=<?= $sql['id_artikel'] ?>" class="btn btn-danger btn-sm" title="detail">
                          <i class="material-icons">delete</i>
                        </a>

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
<div id="artikel" class="container">
  <br>
  <div class="section">
    <div class="right-align">
      <h4 class="light-blue-text text-lighten-2 mb-0 main-judul">Artikel Gigi</h4>
      <p class="light-text mt-0">Artikel Kesehatan Gigi</p>
    </div>
    <div class="row center" id="article2">
      <!-- DIISI MELALUI API.JS -->
      <?php
      include_once "./config/koneksi.php";
      $no = 1;
      $sqls = mysqli_query($conn, "SELECT * FROM tabel_artikel");
      foreach ($sqls as $sql) : ?>
        <div class="col s12 m4 article2">
          <div class="card z-depth-2">
            <div class="card-image">
              <img src="./admin/assets/images/artikel/<?= $sql['img'] ?>" height="130px">
            </div>
            <div class="card-content left-align light">
              <h6 class="mt-0 judul-artikel"><?= $sql['title'] ?></h6>
              <small>
                <p class="right-align m-0"><?= $sql['author'] ?></p>
                <p class="right-align m-0"><?= $sql['created_at'] ?></p>
              </small>
              <p class="isi-artikel"><?= $sql['content'] ?></p>
            </div>
            <div class="card-action right-align">
              <!-- <a class="m-0 waves-effect waves-light" href="#modal1">Baca Lebih Lanjut <i class="material-icons right">chevron_right</i></a> -->
              <a class="waves-effect waves-light btn modal-trigger" href="#modal<?= $sql['id_artikel'] ?>">Baca Lebih Detail <i class="material-icons right">chevron_right</i></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
    <!-- <div class="center m-3">
      <button type="button" class="btn light-blue text-lighten-2 waves-effect waves-light my-3" id="tampil2">Tampilkan Lebih Banyak <i class="material-icons right">queue_play_next</i></button> -->
    <!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a> -->
    <!-- </div> -->
  </div>
</div>


<?php
include_once "./config/koneksi.php";
$sqls = mysqli_query($conn, "SELECT * FROM tabel_artikel") or die(mysqli_error($conn));

// var_dump($sqls);
// die;
foreach ($sqls as $sql) : ?>

  <!-- Modal Structure -->
  <div id="modal<?= $sql['id_artikel']; ?>" class="modal">
    <div class="modal-content">
      <div class="card-image">
        <img src="./admin/assets/images/artikel/<?= $sql['img'] ?>" height="130px">
      </div>
      <h4><?= $sql['title']; ?></h4>
      <p>Penulis : <b><?= $sql['author']; ?></b></p>
      <p><?= $sql['content']; ?></p>
      <hr />
      <p>Diterbitkan : <b> <?= $sql['created_at']; ?></b></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    </div>
  </div>

<?php endforeach; ?>
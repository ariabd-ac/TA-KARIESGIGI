<?php
session_start();
include_once "../config/koneksi.php";
// if (!isset($_SESSION['unique_id'])) {
//   header("location: 404.php");
// }
// var_dump($_SESSION);
// die();

if ($_SESSION['level']  != 'user') {
  header("location: 404.php");
}

if (isset($_POST['submit_yakin'])) {
  include_once "../config/koneksi.php";
  $username      = $_SESSION['username'];
  $t_keyakinan = $_POST['t_keyakinan'];

  $q = "UPDATE hasil_konsul SET t_keyakinan = '$t_keyakinan' WHERE username = '$username'";

  $insert = mysqli_query($conn, $q);

  if ($insert) {
    header("location:akurasi.php");
  } else {
    echo "gabisa";
  }
}

?>


<?php
include './_partials/head.php';
?>
<div class="container-fluid">
  <div class="row">
    <?php
    include './_partials/aside.php';
    ?>
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
      <?php
      include './_partials/nav.php';
      ?>
      <!-- / .main-navbar -->
      <div class="main-content-container container-fluid px-4">
        <!-- Small Stats Blocks -->


        <div class="row mt-4" style="">
          <div class="card mt-4">
            <div class="card-header">
              <h4 class="card-title">Nilai akurasi</h4>
              <div class="update pull-right">
                <!-- <a href="" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#exampleModal">HITUNG AKURASI</a> -->
              </div>
            </div>
            <div class="card-body">
              <div class="">
                <h3>Halo</h3>

                <?php
                include_once "../config/koneksi.php";
                // $q_jml_data = "SELECT COUNT(*) AS jml_data FROM hasil_konsul";
                // $q_jml_data_smdg_pakar = "SELECT COUNT(t_keyakinan) AS sama_pakar FROM hasil_konsul WHERE pakar = 1 AND t_keyakinan = 1;";


                // $q2_jml_data = mysqli_query($conn, $q_jml_data);
                // $q2_jml_data_smdg_pakar = mysqli_query($conn, $q_jml_data_smdg_pakar);
                // $res_jml_data = mysqli_fetch_array($q2_jml_data);
                // $res_jml_smdg_pakar = mysqli_fetch_array($q2_jml_data_smdg_pakar);
                $sqls = mysqli_query($conn, "SELECT COUNT(*) AS jml_data FROM hasil_konsul") or die(mysqli_error($conn));
                $sqls2 = mysqli_query($conn, "SELECT COUNT(t_keyakinan) AS sama_pakar FROM hasil_konsul WHERE pakar = 1 AND t_keyakinan = 1;") or die(mysqli_error($conn));
                // var_dump($sqls);
                // die;
                foreach ($sqls as $sql) { ?>

                  <p>JUMLAH DATA : <span for="kodeGejala" id="jml_data" class="form-label"> <?= $sql['jml_data'] ?></span></p><br />
                <?php   }

                foreach ($sqls2 as $sql2) { ?>
                  <p>SAMADENGAN PAKAR <span id="sm_pakar"><?= $sql2['sama_pakar'] ?></span></p> <br />
                  <p for="kodeGejala" class="form-label">RUMUS : data yg sama pakar / jumlah data * 100%</p> <br />
                  <p>HASIL: <span id="hasil"></span></label> <br />
                  <?php  }
                  ?>

              </div>
            </div>
            <!-- </div> -->
          </div>

        </div>
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h3>dari modal</h3>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <!-- <div class="content-chat">
        <div class="wrapper-chat">
          <section class="chat-area">
            <header>
              <a href="list-users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
              <img src="../auth/php/images/1614007818cs.jpg" alt="">
              <div class="details">
                <span>BOT JENGKELIN</span>
                <p>SMART OR LAZY BOOT</p>
              </div>
            </header>
            <div class="chat-box messages">
              <div class="messages-content"></div>
            </div>
            <form action="#" class="typing-area message-box" id="mymsg" method="POST">
              <input type="text" id="MSG" name="MSG" class="message-input" placeholder="Type message...">
              <button type="submit" class="message-submit"><i class="fab fa-telegram-plane" id="start-record-btn"></i></button>
            </form>
            <h3 class="no-browser-support" hidden>Sorry, Your Browser Doesn't Support the Web Speech API. Try Opening This Demo In Google Chrome.</h3>
        </div>
        </section>
      </div> -->




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
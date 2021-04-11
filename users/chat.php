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
?>


<?php
include './_partials/head.php';
?>
<div class="container-fluid" style="height: 100vh;overflow: scroll;">
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

        <div class="row" style="">
          <div class="content-chat">
            <div class="wrapper-chat">
              <section class="chat-area">
                <header>
                  <?php
                  $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                  if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                  } else {
                    header("location: list-users.php");
                  }
                  ?>
                  <a href="list-users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                  <img src="../auth/php/images/<?php echo $row['img']; ?>" alt="">
                  <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                    <p><?php echo $row['status']; ?></p>
                  </div>
                </header>
                <div class="chat-box">

                </div>
                <form action="#" class="typing-area">
                  <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                  <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                  <button><i class="fab fa-telegram-plane"></i></button>
            </div>
            </section>
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
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

          <div class="chat-wrapper">
            <div class="chat-title">
              <h1>Jengkelin Bot</h1>
              <!-- <h2>i am customer support chat bot</h2> -->
              <figure class="avatar">
                <img src="assets/css/bot.png" />
              </figure>
            </div>
            <div class="messages">
              <div class="messages-content"></div>
            </div>
            <form class="message-box" id="mymsg" method="POST" autocomplete="off">
              <input type="text" id="MSG" name="MSG" class="message-input" placeholder="Type message...">

              <i class="fas fa-microphone" id="start-record-btn"></i>
              <button type="submit" class="message-submit">Send</button>
            </form>
            <h3 class="no-browser-support" hidden>Sorry, Your Browser Doesn't Support the Web Speech API. Try Opening This Demo In Google Chrome.</h3>
          </div>
        </div>
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
<?php
session_start();
include_once "../config/koneksi.php";
// if (!isset($_SESSION['unique_id'])) {
//   header("location: 404.php");
// }
// var_dump($_SESSION);
// die();

// if ($_SESSION['level'] != 'admin') {
//   // if (empty($_SESSION['unique_id']) && empty($_SESSION['admin']) || empty($_SESSION['level'])) {
//   //   header("location: 404.php");
//   // }
//   header("location: ./404.php");
//   // if (isset($_SESSION['unique_id'])) {
//   //   header("location: 404.php");
//   // }
// }
if ($_SESSION['level']  != 'users') {
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
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        }
        ?>
        <div class="row mt-4" style="">
          <div class="content-msg">

            <div class="wrapper">
              <section class="users">
                <header>
                  <div class="content">
                    <img src="../auth/php/images/<?php echo $row['img']; ?>" alt="">
                    <div class="details">
                      <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                      <p><?php echo $row['status']; ?></p>
                    </div>
                  </div>
                </header>
                <div class="search">
                  <span class="text">Select an user to start chat</span>
                  <input type="text" placeholder="Enter name to search...">
                  <button><i class="fas fa-search"></i></button>
                </div>
                <div class="users-list">

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
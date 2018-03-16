<?php
include('header/header.php');
require_once('auth.php');
?>
<section class="section">
    <div class="container">
      <h1 class="title">
        Hallo
      </h1>
      <p class="subtitle">
        Nama saya <strong>Kholis</strong>!
      </p>
    </div>
  </section>
  <!-- notification message -->
<?php
if (isset($_SESSION['success'])) :?>
  <div class="error success">
    <h3>
    <?php
      echo $_SESSION['success'];
      unset($_SESSION['success']);
?>
</h3>
</div>
<?php endif ?>

<!-- logged in user information -->
<?php if (isset($_SESSION['username'])) :?>
<p>welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
<p> <a href="home.php?logout='1'" style="color:red;">Logout</a></p>
<?php endif ?>
</body>
</html>


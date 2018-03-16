<?php
include('header/header.php');
require_once("server.php");

    //add login
    if (isset($_POST['login_user'])){
      $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


      $query = "SELECT * FROM register WHERE username=:username OR email=:email";
      $stmt = $db->prepare($query);

      //bind parameter ke query
      $params = array(
          ":username" => $username,
          ":email"    => $username
      );
      
      $stmt->execute($params);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      //jika user terdaftar
      if($user){
          //verifikasi password
          if(password_verify($password, $user["password"])){
              //buat session
              session_start();
              $_SESSION["user"] = $user;
              //login sukses, alihkan halaman ke home
              header("location: home.php");
          }
      }
  }
?>

 
 <form method="POST" action="">
  	<?php include('errors.php'); ?>
      <div class="field">
  <label class="label">Username</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-success" type="text" placeholder="Text input" name="username">
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
  <p class="help is-success">This username is available</p>
</div>

<div class="field">
  <p class="control has-icons-left">
    <input class="input" type="password" placeholder="Password" name="password">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>

<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
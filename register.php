<?php
include('header/header.php');
require_once('server.php');

if (isset($_POST['reg_user'])) {
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    echo $fullname;
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    echo $username;
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    echo $email;
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if (empty($username)) { array_push($errors, "username is required"); }
    if (empty($email)) { array_push($errors, "email is required"); }
    if (empty($password)) { array_push($errors, "password is required"); }
   

        $query = "INSERT INTO register (fullname, username, email, password)
                  VALUES(:fullname, :username, :email, :password)";
        $stmt = $db->prepare($query);
        
        //bind parameter ke query
        $params = array(
            ":fullname" => $fullname,
            ":username" => $username,
            ":email"    => $email,
            ":password" => $password
        );
        
        //eksekusi query untuk menyimpan ke database
        $saved = $stmt->execute($params);
        if($saved) header('location: login.php');
    }
?>
  <form method="POST" action="register.php">
  	<?php include('errors.php'); ?>
<div class="field">
  <label class="label">Full Name</label>
  <div class="control">
    <input class="input" type="text" placeholder="Text input" name="fullname">
  </div>
</div>

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
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-danger" type="email" placeholder="Email input" name="email">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
  </div>
  <p class="help is-danger">This email is invalid</p>
</div>

<div class="field">
  <p class="control has-icons-left">
    <input class="input" type="password" placeholder="Password" name="password">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>


<?php 
/* div class="field">
  <div class="control">
    <label class="checkbox">
      <input type="checkbox">
      I agree to the <a href="#">terms and conditions</a>
    </label>
  </div>
</div>

<div class="field">
  <div class="control">
    <label class="radio">
      <input type="radio" name="question">
      Yes
    </label>
    <label class="radio">
      <input type="radio" name="question">
      No
    </label>
  </div>
</div> */ ?>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-link" name="reg_user">Register</button>
  </div>
</div>
<p> Already a member? <a href="login.php"> Sign in</a>
</form>
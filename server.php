<?php
session_start();

$fullname  ="";
$username  ="";
$email     ="";
$errors    =array();

$db = mysqli_connect('localhost', 'root', '', 'holis');


// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

if (isset($_POST['reg_user'])) {
    $fullname = mysqli_real_escape_string($db, $_POST["fullname"]);
    echo $fullname;
    $username = mysqli_real_escape_string($db, $_POST["username"]);
    echo $username;
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    echo $email;
    $password_1 = mysqli_real_escape_string($db, $_POST["password_1"]);
    $password_2 = mysqli_real_escape_string($db, $_POST["password_2"]);
    var_dump($_POST);
    print_r($_POST);
    if (empty($fullname)) { array_push($errors, "Full name is required");}
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required");}
    if (empty($password_1)) { array_push($errors,"Password is required");}
    if ($password_1 != $password_2) {
        array_push($errors, "The two password do not match");
    }

    $user_check_query = "SELECT * FROM `register` WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if($user) {
        if ($user['username'] === $username){
            array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email){
            array_push($errors, "Email already exists");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password_1);

        $query = "INSERT INTO register (fullname, username, email, password)
                  VALUES('$fullname', '$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: home.php');
    }
    //add login

    if (isset($_POST['login_user'])){
        $username = mysqli_real_secape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(empty($username)){
            array_push($error, "username is required");
        }
        if(empty($password)){
            array_push($error, "Password is required");
        }

        if(count($error) == 0){
            $password = md5($password);
            $query = "SELECT * FROM register WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1){
                $_SESSION['username '] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: home.php');
            }else{
                array_push($errors, "Wrong username/password combination");
            }
        }
    }
}
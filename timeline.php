<?php
include('header/header.php');
require_once("auth.php");
?>

<div class="container mt-5">
 <div class="row">
    <div class="col-md-4">

        <div class="card">
            <div class="card-body text-center">

                <img class="img img-responsive rounded-circle mb-3" width="160" src="img/<?php echo $_SESSION['user']['photo']?>"/>

                <h3><?php echo $_SESSION["user"]["fullname"]?></h3>
                <p><?php echo $_SESSION["user"]["email"]?></p>

            </div>
        </div>


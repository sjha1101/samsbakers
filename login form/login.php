<?php
include_once('../config/dbconnect.php');
session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are alrady logged in";
    header('Location: ../index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../Images/LOGO.png" type="image/x-icon">
    <title>Login to The Sams Bakers - Cake And Bake</title>
    <link rel="stylesheet" href="../login form/css/style.css">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .forms .btn {
            box-shadow: 0 .5rem 1rem rgba(255, 255, 255, 0.1);
            color: #fff;
            margin-top: 25px;
        }

        .forms .btn {
            width: 100%;
            height: 100%;
            color: #fff;
            background: #c98d83;
            border: none;
            border-radius: 8px;
            padding: 0;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .forms .btn:hover {
            background: #783b31;
        }
    </style>
</head>

<body>

    <div class="container">

        <?php
        if (isset($_SESSION['message'])) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show " role="alert">
                <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['message']);
        }
        ?>
        <div class="cover">
            <div class="front">
                <img src="../Images/img1.jpg">
                <div class="text-1">
                    <p>Order delicious cake for any occasion<br>
                        or Send fresh cake to your loved ones.<br>
                        Buy now!</p>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title heading">
                        <span>Log </span>in
                    </div>

                    <form action="./authcode.php" method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Enter your email" required name="email">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Enter your password" required name="password">
                            </div>
                            <div class="input-box">
                                <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                            </div>

                            <div class="text sign-up-text">Don't have an account? <a href="./registration.php">Sigup now</a>
                            </div>
                        </div>
                </div>

                </form>
            </div>
        </div>

</body>

</html>
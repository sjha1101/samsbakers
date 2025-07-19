<?php
session_start();
include_once "./config/dbconnect.php";

?>
<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #c98d83;">
    <a class="navbar-brand ml-5" href="./index.php">
        <img src="../images/LOGO.png" width="80" height="80" alt="Sams Bakery">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>

    <div class="user-cart">
        <?php
        if (isset($_SESSION['user_id'])) {
        ?>
            <a href="../login form/logout.php" style="text-decoration:none;">
                <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

        <?php
        } ?>
    </div>
</nav>
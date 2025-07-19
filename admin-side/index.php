<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="../Images/LOGO.png" type="image/x-icon">
    <title>The Sams Bakers - Cake And Bake</title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
        <!-- swiper link  -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        </link>

    </head>
</head>

<body>
    <?php
    include "./adminHeader.php";
    include "./sidebar.php";
    include_once "./config/dbconnect.php";
    ?>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js">
    </script>

    <?php if (isset($_SESSION['message'])) {
    ?>
        <script>
            alertify.set('notifier', 'position', 'top-center');
            alertify.success('Welcome to dashboard');
        </script>
    <?php
        unset($_SESSION['message']);
    }
    ?>
    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card" style="background-color: #c98d83; border-radius: 15px;">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4>Total Users</h4>
                    <h5>

                        <?php
                        $sql = "SELECT * from users where is_admin=0";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style=" background-color: #c98d83; border-radius: 15px;">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4>Total Categories</h4>
                    <h5>

                        <?php
                        $sql = "SELECT * from category";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            <br>
            <div class="col-sm-3">
                <div class="card" style=" background-color: #c98d83; border-radius: 15px;">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4>Total Products</h4>
                    <h5>

                        <?php
                        $sql = "SELECT * from product";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style=" background-color: #c98d83; border-radius: 15px;">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4>Total orders</h4>
                    <h5>

                        <?php
                        $sql = "SELECT * from orders";
                        $result = $conn->query($sql);
                        $count = 0;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $count = $count + 1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['category']) && $_GET['category'] == "success") {
        echo '<script> alert("Category Successfully Added")</script>';
    } else if (isset($_GET['category']) && $_GET['category'] == "error") {
        echo '<script> alert("Adding Unsuccess")</script>';
    }
    ?>
    <script src="../js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
<?php
session_start();
include('./config/dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./Images/LOGO.png" type="image/x-icon">
    <title>The Sams Bakers - Cake And Bake</title>
    <link rel="stylesheet" href="./user-side/css/style.css">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- swiper link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- cdn icon link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Dancing+Script&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Roboto&display=swap" rel="stylesheet">

    <style>
        .dropbtn {
            display: block;
            background-color: #c98d83;
            color: white;
            padding: 16px;
            width: 50px;
            height: 50px;
            font-size: 16px;
            border-radius: 50%;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #783b31;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #c98d83;
        }
    </style>
</head>

<body>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js">
    </script>

    <?php
    if (isset($_SESSION['auth'])) {
        if (isset($_SESSION['message'])) {
    ?>
            <script>
                alertify.set('notifier', 'position', 'top-center');
                alertify.success('Login Successfully');
            </script>
    <?php
            unset($_SESSION['message']);
        }
    }
    ?>

    <!-- header section start here  -->

    <header class="header">
        <div class="logoContent">
            <a href="#" class="logo"><img src="images/logo.png" alt=""></a>
            <h1 class="logoName">Sams Bakers </h1>
        </div>
        <nav class="navbar">
            <a href="#home">HOME</a>
            <a href="#service">SERVICES</a>
            <a href="#product">MENU</a>
            <a href="#about">ABOUT US</a>
            <a href="#order">ORDER</a>
            <a href="#contact">CONTACT US</a>
        </nav>
        <div class="dropdown">
            <button class="dropbtn"><i class='fas fa-portrait' style='font-size:26px'></i></button>
            <div class="dropdown-content">
                <?php if (isset($_SESSION['auth'])) : ?>
                    <a href="./login form/logout.php">Logout </a>
                <?php else : ?>
                    <a href="./login form/registration.php">Sign-up</a>
                    <a href="./login form/login.php">Login</a>
                <?php endif; ?>

            </div>
        </div>
        <div class="icon">
            <i class="fas fa-bars" id="menu-bar"></i>
        </div>

    </header>

    <!-- header section end here  -->

    <!-- home section start here  -->

    <section class="home" id="home">
        <div class="homeContent">
            <h2>Delicious Cake for Everyone </h2>
            <p> Order delicious cake for any occasion
                <br>
                or Send fresh cake to your loved ones.
                Buy now!
            </p>
            <div class="home-btn">
                <a href="#order"><button>Order Now</button></a>
            </div>
        </div>
    </section>

    <!-- home section end here  -->

    <!-- services section starts here  -->
    <div class="services-container mt-5" id="service">
        <section class="services-container">
            <h1 class="h-primary heading center font ft-1"><span>Our</span> Services</h1>
            <div id="services">
                <div class="box">
                    <img src="Images/Img10.jpg" class="w-1" alt="Opps,Please wait for sometime image is loading...">
                    <h2 class="h-secondary center mt-2">Types of cake</h2>
                    <p class="center mt-2">“Cake is happiness! If you know the way of the cake, you know the way of
                        happiness!Cake is one of the most popular sweets. It is served on most special occasions
                        such as weddings, birthdays, anniversaries, and holidays.
                        All types of cake are avaliable here...
                    </p>
                </div>
                <div class="box">
                    <img src="Images/img11.png" class="w-1">
                    <h2 class="h-secondary center mt-2">Bulk Ordering</h2>
                    <p class="center mt-2">It is a way to get food conveniently delivered to their doorstep without
                        having to
                        make an extra decision or cook. It's easy, fast, and it feels like you get what you deserve.
                        Make your any occasion more special with your favourite falvour cake.
                        So,what you are waiting for order Now !</p>
                </div>
                <div class="box">
                    <img src="Images/3.png" class="w">
                    <h2 class="h-secondary center mt-2">Fast Delivery</h2>
                    <p class="center mt-2">Looking for online cake delivery in India? Your search ends here. Order
                        delicious
                        cake for any occasion or Send fresh cake to your loved ones. Buy now! It's easy, fast, and it
                        feels like you get what you deserve.So,what you are waiting just place an Order by a click.</p>
                </div>
            </div>
        </section>
    </div>

    <!-- services section end here  -->

    <!-- parallax -->
    <h1 class="heading mt-5" id="product">Our <span>Products</span></h1>
    <section class="parallax">
        <p>
            Make your any occasion more special with your favourite falvour cake.
            <br>
            So,what you are waiting for order Now !
        </p>
        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="../samsbakers/uploads/10.jpg" alt="Opps,Please wait for sometime...">
                </div>
                <div class="content">
                    <a href="./user-side/birthday-cake.php" class="center">BIRTHDAY CAKE</a>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="../samsbakers/uploads/20.png" alt="Opps,Please wait for sometime...">
                </div>
                <div class="content">
                    <a href="./user-side/Wedding-cake.php" class="center">WEDDING CAKE</a>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="../samsbakers/uploads/30.jpg" alt="Opps,Please wait for sometime...">
                </div>
                <div class="content">
                    <a href="./user-side/Custom-cake.php" class="center">CUSTOM CAKE</a>
                </div>
            </div>
        </div>

    </section>

    <!-- parallax -->

    <!-- product starts-->
    <section class="product" id="product">
        <h1 class="heading">Birthday<span>-Cake</span></h1>
        <?php
        include_once "./config/dbconnect.php";
        $sql = "SELECT * from product WHERE category_id=1";
        $result = $conn->query($sql);
        $count = 1;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <?php
                if ($count % 3 == 1) {
                ?>

                    <div class="box-container">
                    <?php
                }
                    ?>
                    <div class="Product-box">
                        <div class="image">
                            <img src="uploads/<?= $row["product_image"]; ?>">
                        </div>
                        <div class="content">
                            <h3><?= $row["product_name"] ?></h3>
                            <span class="price"><?= $row["price"] ?></span>
                            <br>
                            <a href="#order" class="btn">Buy Now</a>
                        </div>
                    </div>
                    <?php
                    if ($count % 3 == 0) {
                    ?>
                    </div>
                <?php
                    }
                ?>
        <?php
                $count++;
            }
        }
        ?>
    </section>

    <!-- product end-->

    <!-- about us starts-->

    <section class="about  mt-5" id="about">
        <h1 class="heading center ft-1"> <span>about</span> us </h1>
        <div class="row mt-1">
            <div class="image">
                <img src="Images/about.jpg" alt="">
            </div>
            <div class="content">
                <h3>good things come to those <span><br>who bake </span> for others</h3>
                <p> A cake is a type of (usually) sweet dessert which is baked. Originally, it was a bread-like
                    food,
                    but no
                    longer. Cakes are often made to celebrate special occasions like birthdays or weddings. There
                    are many kinds of cakes.Cake symbolizes joy, love, appreciation, and even accomplishments. It is
                    served during
                    weddings,birthdays,and many different party settings. The cakes are almost always made to honor
                    or
                    mean
                    something to
                    the recipient.They are edible art, to be viewed and consumed with love and happiness on the most
                    joyous
                    occasions.Most cakes for these types of special occasions are ordered in a cake bakery. This
                    process
                    can seem
                    daunting to someone that is looking for the prefect cake. Whether it is a simple birthday cake,
                    or a
                    grand
                    six-tiered wedding cake,it is a always a good idea to turn this over to a professional.
                    <span id="dots">...</span><span id="more">From start to finish, this cake will have gone
                        through several steps and stages before it is on a table and ready to be served. The first
                        step
                        towards getting a cake is to place an order with a cake bakery. The baker will go over the
                        size
                        of the
                        desired
                        cake,the price per slice, as well as the art and decorating charge specific to the cake that
                        is
                        being
                        ordered.
                        Normally during this time, pictures of previously done cakes are shown and ideas are
                        discussed
                        to allow the
                        baker to have a full understanding of what is wanted from the customer.</span>
                </p>
                <button onclick="myFunction()" id="myBtn" class="btn">Read more</button>

            </div>
        </div>
    </section>

    <!-- about us end-->

    <!-- order -->

    <section class="order" id="order">
        <h1 class="heading"><span>order</span> now </h1>
        <div class="row">
            <div class="image">
                <img src="./Images/order.gif" alt="">
            </div>
            <form action="./user-side/function.php" method="post" autocomplete="off">
                <div class="inputBox">
                    <input type="text" placeholder="name" required name="name">
                    <input type="email" placeholder="email address" required name="email">
                </div>
                <div class="inputBox">
                    <input type="number" placeholder="phone number" name="contact" required>
                    <select onchange="fetchProduct(this)" name="category">
                        <?php
                        include('./config/dbconnect.php');
                        $category = mysqli_query($conn, "SELECT * from category");
                        while ($c = mysqli_fetch_array($category)) {
                        ?>
                            <option value="<?php echo $c['category_id'] ?>"><?php echo $c['category_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="inputBox">
                    <select id="cakes" name="cake" onchange="fetchPrice(this)">
                        <?php
                        include('./config/dbconnect.php');
                        $product = mysqli_query($conn, "SELECT * from product WHERE category_id=1");
                        while ($c = mysqli_fetch_array($product)) {
                        ?>
                            <option value="<?php echo $c['product_id'] ?>"><?php echo $c['product_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <span id="price">
                    </span>
                </div>
                <textarea placeholder="your address" name="address" id="" cols="30" rows="10" required></textarea>
                <input type="submit" value="order now" class="btn" name="order_btn">
            </form>
        </div>
    </section>

    <!-- order end -->

    <!-- Footer section starts here  -->
    <footer class="footer" id="contact">
        <div class="box-container">
            <div class="mainBox">
                <div class="content">
                    <a href="#"><img src="images/logo.png" class="w3" alt=""></a>
                </div>
                <h1 class="logoName">Sams Bakers</h1>
                <p>Order delicious cake for any occasion<br>
                    or Send fresh cake to your loved ones.<br>
                    Buy now!</p>
            </div>
            <div class="box">
                <h3>Quick link</h3>
                <a href="#product"><i class="fas fa-arrow-right"></i>Type of cake</a>
                <a href="birthday-cake.php"><i class="fas fa-arrow-right"></i>Birthday - Cake</a>
                <a href="Wedding-cake.php"><i class="fas fa-arrow-right"></i>Wedding - Cake</a>
                <a href="Custom-cake.php"> <i class="fas fa-arrow-right"></i>Custom - Cake</a>
            </div>
            <div class="box">
                <h3>Extra link</h3>
                <a href="#home"><i class="fas fa-arrow-right"></i>Home</a>
                <a href="#about"> <i class="fas fa-arrow-right"></i>About Us</a>
                <a href="#services"> <i class="fas fa-arrow-right"></i>Our Services</a>
                <a href="#contact"> <i class="fas fa-arrow-right"></i>Contact Us</a>
            </div>
            <div class="box">
                <h3>Contact Info</h3>
                <a href="#"> <i class="fas fa-phone"></i>+91 12222 34444</a>
                <a href="#"> <i class="fas fa-envelope"></i>samsbakers@gmail.com</a>
            </div>
        </div>
        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>
        <div class="credit">
            |all rights are reserved !
        </div>
    </footer>

    <!-- footer section ends here  -->

    <!-- JavaScript -->

    <script>
        function fetchProduct(e) {
            var catId = e.value;
            $.ajax({
                url: "./user-side/fetchproduct.php?catId=" + catId,
                method: "GET",
                success: function(res) {
                    $("#cakes").html(res);
                }
            });
        }

        function fetchPrice(e) {
            var prodId = e.value;
            $.ajax({
                url: "./user-side/fetchprice.php?prodId=" + prodId,
                method: "GET",
                success: function(res) {
                    $("#price").html(res);
                }
            });
        }
    </script>
    <script src="./js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
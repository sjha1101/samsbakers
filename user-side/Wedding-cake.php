<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Images/LOGO.png" type="image/x-icon">
    <title>The Sams Bakers - Cake And Bake</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Dancing+Script&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- product starts-->

    <section class="product" id="product">

        <h1 class="heading">Wedding<span>-Cake</span></h1>
        <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT * from product WHERE category_id=2";
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
                            <img src="<?= $row["product_image"]; ?>">
                        </div>
                        <div class="content">
                            <h3><?= $row["product_name"] ?></h3>
                            <span class="price"><?= $row["price"] ?></span>
                            <br>
                            <a href="../index.php#order" class="btn">Buy Now</a>
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

</body>

</html>
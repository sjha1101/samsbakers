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
        </link>
    </head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="mySidebar">
        <div class="side-header">
            <img src="../Images/LOGO.png" width="60" height="60" alt="Sams Bakery">
            <span style="font-size: 20px;">
                Sams Bakery
            </span>
        </div>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="./index.php"><i class="fa fa-home"></i> Dashboard</a>
        <a href="#customer" onclick="showCustomers()"><i class="fa fa-users"></i> Customers</a>
        <a href="#category" onclick="showCategory()"><i class="fa fa-th-large"></i> Category</a>
        <a href="#products" onclick="showProductItems()"><i class="fa fa-th"></i> Products</a>
        <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> Orders</a>


    </div>
    <div id="main">
        <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.getElementById("main-content").style.marginLeft = "250px";
            document.getElementById("main").style.display = "none";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.getElementById("main").style.display = "block";
        }

        //view order
        function showOrders() {
            $.ajax({
                url: "./adminView/viewAllOrders.php",
                method: "post",
                data: {
                    record: 1
                },
                success: function(data) {
                    $('.allContent-section').html(data);
                }
            });
        }

        //view products
        function showProductItems() {
            $.ajax({
                url: "./adminView/viewAllProducts.php",
                method: "post",
                data: {
                    record: 1
                },
                success: function(data) {
                    $('.allContent-section').html(data);
                }
            });
        }

        //view customer
        function showCustomers() {
            $.ajax({
                url: "./adminView/viewCustomers.php",
                method: "post",
                data: {
                    record: 1
                },
                success: function(data) {
                    $('.allContent-section').html(data);
                }
            });
        }

        //view category
        function showCategory() {
            $.ajax({
                url: "./adminView/viewCategories.php",
                method: "post",
                data: {
                    record: 1
                },
                success: function(data) {
                    $('.allContent-section').html(data);
                }
            });
        }
    </script>
    <script src="../js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
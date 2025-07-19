<?php
session_start();
include("../config/dbconnect.php");

$total = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../Images/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <title>The Sams Bakers - Cake And Bake</title>
    <style>
        .result {
            color: red;

        }

        td {
            text-align: center;
        }

        section {
            margin-top: 200px;
            margin-left: 450px;
        }
    </style>
</head>

<body>
    <section class="print">
        <div class="row">
            <div class="col-md-7  mt-4" style="background-color: #c2c2c2;">

                <div class="p-4">
                    <div class="text-center">
                        <div class="logoContent">
                            <a href="#" class="logo"><img src="../Images/LOGO.png" alt="" style="height: 50px;"></a>
                            <h4 class="logoName">Sams Bakers </h4>
                        </div>
                    </div>
                    <span class="mt-4"> Time : </span><span class="mt-4" id="time"></span>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 ">
                            <span id="day"></span> : <span id="year"></span>
                        </div>
                    </div>
                    <br>
                    <div>
                        <h4 class="text-center">Thank You For Placing The Order...</h4>
                        <br>
                        <h5 class="text-center">In any case, you want to cancel the order than contact us on : 6354841068
                        </h5>
                    </div>
                    <div class="text-center">
                        <a href="../index.php">
                            <input type="submit" value="Back To Home" class="btn" name="order_btn">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>

</html>
<script>
    // Code for year 

    var currentdate = new Date();
    var datetime = currentdate.getDate() + "/" +
        (currentdate.getMonth() + 1) + "/" +
        currentdate.getFullYear();
    $('#year').text(datetime);

    // Code for extract Weekday     
    function myFunction() {
        var d = new Date();
        var weekday = new Array(7);
        weekday[0] = "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";

        var day = weekday[d.getDay()];
        return day;
    }
    var day = myFunction();
    $('#day').text(day);
</script>

<!-- // Code for TIME -->
<script>
    window.onload = displayClock();

    function displayClock() {
        var time = new Date().toLocaleTimeString();
        document.getElementById("time").innerHTML = time;
        setTimeout(displayClock, 1000);
    }
</script>
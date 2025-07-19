<?php
session_start();
include('../config/dbconnect.php');

if (isset($_SESSION['auth'])) {
    if (isset($_POST['order_btn'])) {

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $cake = mysqli_real_escape_string($conn, $_POST['cake']);
        $Price = mysqli_real_escape_string($conn, $_POST['Price']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        $insert_query = "INSERT INTO orders (order_id,user_id,name,email,contact,category,cake,address,Price) VALUES('$_SESSION[id]',' $_SESSION[auth]','$name','$email','$contact','$category','$cake','$address','$Price')";
        $insert_query_run = mysqli_query($conn, $insert_query);
        header('Location: ./print.php?order_id');
    }
} else {
    $_SESSION['message'] = "Please Login your id";
    header('Location: ../login form/login.php');
}

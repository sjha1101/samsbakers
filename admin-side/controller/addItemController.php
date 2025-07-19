<?php
include_once "../config/dbconnect.php";
session_start();

if (isset($_POST['upload'])) {

    $ProductName = $_POST['p_name'];
    $price = $_POST['p_price'];
    $category = $_POST['category'];

    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];


    $location = "../uploads/";
    $image = $location . $name;

    $target_dir = "./uploads/";
    $finalImage = $target_dir . $name;

    $insert = mysqli_query($conn, "INSERT INTO product
         (product_name,product_image,price,category_id) 
         VALUES ('$ProductName','$image',$price,'$category')");

    if (!$insert) {
        echo mysqli_error($conn);
    } else {
        header('Location: ../index.php#products');
    }
}

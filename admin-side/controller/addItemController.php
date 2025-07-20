<?php
session_start();
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {

    $ProductName = $_POST['p_name'];
    $price       = $_POST['p_price'];
    $category    = $_POST['category'];

    $origName = $_FILES['file']['name'];
    $tmpPath  = $_FILES['file']['tmp_name'];

    // Correct upload directory
    $uploadDir = dirname(__DIR__, 2) . "/uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $ext      = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
    $base     = pathinfo($origName, PATHINFO_FILENAME);
    $safeBase = preg_replace('/[^a-z0-9-_]/i', '_', $base);
    $newName  = time() . '_' . $safeBase . '.' . $ext;

    $serverPath = $uploadDir . $newName;
    $dbPath     = "../uploads/" . $newName;

    if (move_uploaded_file($tmpPath, $serverPath)) {
        $insert = mysqli_query(
            $conn,
            "INSERT INTO product (product_name, product_image, price, category_id)
             VALUES ('$ProductName', '$dbPath', $price, '$category')"
        );

        if (!$insert) {
            echo "Database error: " . mysqli_error($conn);
        } else {
            header('Location: ../index.php#products');
            exit;
        }
    } else {
        echo "Image upload failed! Tried path: $serverPath";
    }
}

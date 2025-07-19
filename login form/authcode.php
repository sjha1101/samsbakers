<?php
session_start();
include_once('../config/dbconnect.php');


if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if ((mysqli_num_rows($check_email_query_run) > 0)) {
        $_SESSION['message'] = "Email already exist";
        header('Location: ./registration.php');
    } else {
        if ($password == $cpassword) {
            $insert_query = "INSERT INTO users (name,email,contact,password) VALUES('$name','$email','$contact','$password')";
            $insert_query_run = mysqli_query($conn, $insert_query);

            if ($insert_query_run) {
                $_SESSION['message'] = "Register Successfully";
                header('Location: ./login.php');
            } else {
                $_SESSION['message'] = "Something went wrong.Please try again";
                header('Location: ./registration.php');
            }
        } else {
            $_SESSION['message'] = "Password do not match";
            header('Location: ./registration.php');
        }
    }
} else if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {

        $_SESSION['auth'] = true;

        $_userdata = mysqli_fetch_array($login_query_run);
        $username = $_userdata['name'];
        $useremail = $_userdata['email'];
        $is_admin = $_userdata['is_admin'];

        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['is_admin'] = $is_admin;

        if ($is_admin ==  1) {

            $_SESSION['message'] = "Welcome to dashboard";
            header('Location:../admin-side/index.php');
        } else {
            $_SESSION['message'] = "Logged In Sucessfully";
            header('Location: ../index.php');
        }
    } else {

        $_SESSION['message'] = "Invalid Credentials";
        header('Location: ./login.php');
    }
}
